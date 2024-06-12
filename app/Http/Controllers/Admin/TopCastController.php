<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopCast;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\Services\CurlService;
use Illuminate\Support\Facades\Storage;

class TopCastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.topCasts.topCastsList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'TopCastController >> index >> Failed to get top casts: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_topCasts(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = TopCast::count();
            
            // Query for filtered records
            $topCastsQuery = TopCast::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $topCastsQuery->where(function ($query) use ($searchValue) {
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
                        $topCastsQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $topCastsQuery->count();
            $topCasts = $topCastsQuery->skip($start)->take($length)->get();

            foreach ($topCasts as $topCast) {
                $topCast->image = route('showTopCastsImage', ['filename' => basename($topCast->image)]);
            }
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $topCasts,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'TopCastController >> get_all_topCasts >> Failed to get topCasts: ' . $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:webp|max:2048',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $top_cast = new TopCast();
            $top_cast->name = $request->input('name');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $request->input('name');
                $imageName = str_replace(' ', '_', $imageName);
                // $imageName = $imageName . '.' . $image->getClientOriginalExtension();
                
                $curlService = new CurlService();
                $response = $curlService->getWebpImage($image, $imageName);
  
                if(!$response['success']){
                    return response()->json(['message' => "Can't convert image to webp", 'response' => $response], 400);
                }
                
                $image = file_get_contents($response['optimized_image_url']);
                $imagePath = 'img/top_cast_images/' . $imageName . '.webp';
                
                Storage::disk('public')->put($imagePath, $image);

                $top_cast->image = 'assets/' . $imagePath;
            }

            $top_cast->save();


            return response()->json(['message' => 'Top cast created successfully', 'top_cast' => $top_cast], 201);
        } catch (Exception $e) {
            return response()->json(['message' => 'TopCastController >> store >> Failed to create top cast: ' . $e->getMessage()], 500);
        }
    }

    
}