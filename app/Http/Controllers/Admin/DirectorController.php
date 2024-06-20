<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Exception;
use App\Models\Director;
use App\Services\CurlService;
use Illuminate\Support\Facades\Storage;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.directors.directorsList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'DirectorController >> index >> Failed to get director: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_directors(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = Director::count();
            
            // Query for filtered records
            $directorsQuery = Director::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $directorsQuery->where(function ($query) use ($searchValue) {
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
                        $directorsQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $directorsQuery->count();
            $directors = $directorsQuery->skip($start)->take($length)->get();

            foreach ($directors as $director) {
                $director->image = route('showDirectorsImage', ['filename' => basename($director->image)]);
            }
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $directors,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'DirectorController >> get_all_directors >> Failed to get directors: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function addDirector()
    {
        try {
            return view('admin.directors.addDirector');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'DirectorController >> addDirector >> Failed to get addDirector: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add_new_director(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $validator->sometimes('image', 'required|image|mimes:jpeg,png,jpg|max:2048', function ($input) {
                return !$input->has('no-image') || !$input->get('no-image');
            });

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $director = new Director();
            $director->name = $request->input('name');

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
                $imagePath = 'img/director_images/' . $imageName . '.webp';
                
                Storage::disk('public')->put($imagePath, $image);
                
                $director->image = 'assets/' . $imagePath;
            }else{
                $director->image = 'assets/img/director_images/profile.webp';
            }

            $director->save();

            return redirect()->back()->with('success', 'Director Added successfully!');
        } catch (Exception $e) {
            return response()->json(['message' => 'DirectorController >> store >> Failed to create director: ' . $e->getMessage()], 500);
        }
    }
}