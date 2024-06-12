<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\Models\Format;

class FormatController extends Controller
{
    public function index()
    {
        try {
            return view('admin.formats.formatsList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'FormatController >> index >> Failed to get formats: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_formats(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = Format::count();
            
            // Query for filtered records
            $formatsQuery = Format::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $formatsQuery->where(function ($query) use ($searchValue) {
                    $query->where('name', 'like', '%' . $searchValue . '%');
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
                        $formatsQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $formatsQuery->count();
            $formats = $formatsQuery->skip($start)->take($length)->get();
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $formats,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'FormatController >> get_all_formats >> Failed to get formats: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'resolution' => 'required|string|max:255',
                'aspect_ratio' => 'nullable',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $format = new Format();
            $format->name = $request->input('name');
            $format->resolution = $request->input('resolution');
            $format->aspect_ratio = $request->input('aspect_ratio');

            $format->save();

            return response()->json(['message' => 'Format created successfully', 'format' => $format], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'FormatController >> store >> Failed to create format: ' . $e->getMessage()], 500);
        }
    }
}