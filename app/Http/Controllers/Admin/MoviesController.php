<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Director;
use App\Models\TopCast;
use App\Models\Language;
use App\Models\Format;
use Validator;
use Exception;
use App\Services\CurlService;
use Illuminate\Support\Facades\Storage;

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
            $directors = Director::select('id', 'name')->get();
            $top_casts = TopCast::select('id', 'name')->get();
            $categories = Category::select('id', 'category')->get();
            $languages = Language::select('id', 'language')->get();

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
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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
            $movie->directors()->sync($request->input('director'));
            $movie->categories()->sync($request->input('category'));
            $movie->languages()->sync($request->input('language'));
            $movie->top_casts()->sync($request->input('top_cast'));

            return redirect()->back()->with('success', 'Movie Added successfully!');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> addMovie >> Failed to get addMovie: ' . $e->getMessage()
            ], 500);
        }
    }

    public function addFile()
    {
        try {
            $movies = Movie::select('id', 'title')->get();
            $formats = Format::select('id', 'name')->get();
            return view('admin.movies.addFile', compact('movies', 'formats'));
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> addFile >> Failed to get movie: ' . $e->getMessage()
            ], 500);
        }
    }

    public function add_movie_file(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'movie' => 'required|string',
                'format' => 'required|string',
                'disk_space' => 'required|string',
                'file' => 'nullable|file|mimes:torrent|max:2048',
                'sub_seeds' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed', 'errors' => $validator->errors()], 422);
            }

            $movie = new Movie();

            $movie->id = $request->input('movie');
            $movie->disk_space = $request->input('disk_space');
            $movie->sub_seeds = $request->input('sub_seeds');

            if ($request->hasFile('file')) {
                $format = Format::findOrFail($request->input('format'));
                $fileName = $request->input('movie') . '_' . 'movie_' . $format->name . '_' . $format->resolution;
                $fileName = str_replace('.', '_', $fileName);
                $fileName = str_replace('*', '_', $fileName);
                $fileName = $fileName . '.' . $request->file('file')->getClientOriginalExtension();

                $filePath = $request->file('file')->storeAs('file/movie_file', $fileName, 'public');
                $movie->file = 'assets/' . $filePath;
            }
            
            $syncData = [
                $request->input('format') => [
                    'disk_space' => $movie->disk_space,
                    'sub_seeds' => $movie->sub_seeds,
                    'file' => $movie->file,
                ]
            ];
            
            $movie->formats()->syncWithoutDetaching($syncData);
            
            return redirect()->back()->with('success', 'Movie file updated successfully');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'MoviesController >> addFile >> Failed to get movie: ' . $e->getMessage()
            ], 500);
        }
    }
}