<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        try {
            return view('admin.languages.languagesList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'LanguageController >> index >> Failed to get languages: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_languages(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = Language::count();
            
            // Query for filtered records
            $languagesQuery = Language::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $languagesQuery->where(function ($query) use ($searchValue) {
                    $query->where('language', 'like', '%' . $searchValue . '%');
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
                        $languagesQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $languagesQuery->count();
            $languages = $languagesQuery->skip($start)->take($length)->get();
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $languages,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'LanguageController >> get_all_languages >> Failed to get languages: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function addLanguage()
    {
        try {
            return view('admin.languages.addLanguage');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'LanguageController >> addLanguage >> Failed to get addLanguage: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add_new_languages(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'language' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $language = new Language();
            $language->language = $request->input('language');
            $language->save();

            return redirect()->back()->with('success', 'Language Added successfully!');
        } catch (Exception $e) {
            return response()->json(['message' => 'LanguageController >> store >> Failed to create language: ' . $e->getMessage()], 500);
        }
    }
}