<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Validator;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        try {
            return view('admin.categories.categoriesList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'CategoryController >> index >> Failed to get categories: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_categories(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = Category::count();
            
            // Query for filtered records
            $categoriesQuery = Category::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $categoriesQuery->where(function ($query) use ($searchValue) {
                    $query->where('category', 'like', '%' . $searchValue . '%');
                });
            }
            
            // Check if $order is not null before accessing its elements
            if ($order !== null) {
                $orderByColumnIndex = $order['column'] ?? null;
                $orderByDirection = $order['dir'] ?? 'asc';
                if ($orderByColumnIndex !== null) {
                    $orderByColumnName = $request->input('columns')[$orderByColumnIndex]['data'] ?? null;
                    if ($orderByColumnName !== null) {
                        $orderByColumnName = $columnMappings[$orderByColumnIndex] ?? 'id';
                        $categoriesQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $categoriesQuery->count();
            $categories = $categoriesQuery->skip($start)->take($length)->get();
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $categories,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'CategoryController >> get_all_categories >> Failed to get categories: ' . $e->getMessage()
            ], 500);
        }
    }

    public function addCategory()
    {
        try {
            return view('admin.categories.addCategorie');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'CategoryController >> addCategory >> Failed to get addCategory: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add_new_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $category = new Category();
            $category->category = $request->input('category');
            $category->save();

            return redirect()->back()->with('success', 'Category Added successfully!');
        } catch (Exception $e) {
            return response()->json(['message' => 'CategoryController >> store >> Failed to create category: ' . $e->getMessage()], 500);
        }
    }
}