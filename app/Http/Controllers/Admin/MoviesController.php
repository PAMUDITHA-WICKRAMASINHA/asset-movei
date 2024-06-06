<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Director;
use App\Models\TopCast;
use App\Models\Language;
use Validator;
use Exception;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.movies.moviesList');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> index >> Failed to get movie: ' . $e->getMessage()
            ], 500);
        }
    }

    public function get_all_movies(Request $request)
    {
        try {
            // Read the request parameters for DataTables
            $draw = $request->input('draw');
            $start = $request->input('start');
            $length = $request->input('length');
            $searchValue = $request->input('search')['value'];
            $order = $request->input('order')[0] ?? null;
            
            // Total records
            $totalRecords = Movie::count();
            
            // Query for filtered records
            $moviesQuery = Movie::query();
            
            // Filter by search value
            if (!empty($searchValue)) {
                $moviesQuery->where(function ($query) use ($searchValue) {
                    $query->where('title', 'like', '%' . $searchValue . '%')
                        ->orWhere('download_count', 'like', '%' . $searchValue . '%')
                        ->orWhere('duration', 'like', '%' . $searchValue . '%')
                        ->orWhere('release_date', 'like', '%' . $searchValue . '%')
                        ->orWhere('rate', 'like', '%' . $searchValue . '%');
                });
            }

            $moviesQuery->with('categories', 'top_casts', 'directors', 'formats', 'languages');
            
            // Check if $order is not null before accessing its elements
            if ($order !== null) {
                $orderByColumnIndex = $order['column'] ?? null;
                $orderByDirection = $order['dir'] ?? 'asc';
                if ($orderByColumnIndex !== null) {
                    $orderByColumnName = $request->input('columns')[$orderByColumnIndex]['data'] ?? null;
                    if ($orderByColumnName !== null) {
                        $orderByColumnName = $columnMappings[$orderByColumnIndex] ?? 'id';
                        $moviesQuery->orderBy($orderByColumnName, $orderByDirection);
                    }
                }
            }

            
            // Get filtered and paginated records
            $filteredRecords = $moviesQuery->count();
            $movies = $moviesQuery->skip($start)->take($length)->get();

            foreach ($movies as $movie) {
                $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
            }
            
            return response()->json([
                'draw' => intval($draw),
                'recordsTotal' => intval($totalRecords),
                'recordsFiltered' => intval($filteredRecords),
                'data' => $movies,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> get_all_movies >> Failed to get movies: ' . $e->getMessage()
            ], 500);
        }
    }
    
    public function addMovie()
    {
        try {
            $directors = Director::all();
            $top_casts = TopCast::all();
            $categories = Category::all();
            $languages = Language::all();

            return view('admin.movies.addMovie', compact('directors', 'top_casts', 'categories', 'languages'));
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> addMovie >> Failed to get addMovie: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add_new_movie(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'duration' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'release_date' => 'required|date',
                'director' => 'required|array',
                'category' => 'required|array',
                'language' => 'required|array',
                'top_cast' => 'required|array',
                'rate' => 'required|string',
                'trailer' => 'required|url',
                'description' => 'required|string',
            ]);
   
            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $movie = new Movie();

            $movie->title = $request->input('title');
            $movie->duration = $request->input('duration');
            $movie->release_date = $request->input('release_date');
            $movie->rate = $request->input('rate');
            $movie->trailer = $request->input('trailer');
            $movie->description = $request->input('description');
        
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $request->input('title') . '_movie';
                $imageName = str_replace(' ', '_', $imageName);
                $imageName = str_replace(':', '_', $imageName);
                // $imageName = $imageName . '.' . $image->getClientOriginalExtension();
                $curlService = new CurlService();
                $response = $curlService->getWebpImage($image, $imageName);
  
                if(!$response['success']){
                    return response()->json(['message' => "Can't convert image to webp", 'response' => $response], 400);
                }
                
                $image = file_get_contents($response['optimized_image_url']);
                $imagePath = 'img/movie_images/' . $imageName . '.webp';
                
                Storage::disk('public')->put($imagePath, $image);

                $movie->image = 'assets/' . $imagePath;
            }
            
            $movie->save();
            $movie->directors()->sync(json_decode($request->input('director'), true));
            $movie->categories()->sync(json_decode($request->input('category'), true));
            $movie->languages()->sync(json_decode($request->input('language'), true));
            $movie->top_casts()->sync(json_decode($request->input('top_cast'), true));

            return redirect()->back()->with('success', 'Movie Added successfully!');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> addMovie >> Failed to get addMovie: ' . $e->getMessage()
            ], 500);
        }
    }
}