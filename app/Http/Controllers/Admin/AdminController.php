<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Director;
use App\Models\TopCast;
use App\Models\Format; 
use Validator;
use Exception;
use App\Services\CurlService;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // $directors = Director::all();
            // $top_casts = TopCast::all();
            // $categories = Category::all();
            return view('admin.layouts.master');
        } catch (Exception $e) {
            return response()->json(['message' => 'AdminController >> index >> Failed to get movie: ' . $e->getMessage()], 500);
        }
    }

    public function get_all()
    {
        try {
            $movies = Movie::with('categories', 'top_casts', 'directors', 'formats', 'languages')->get();

            foreach ($movies as $movie) {
                $movie->image = url($movie->image);
            }

            return response()->json([
                'message' => 'Movies retrieved successfully', 
                'movies' => $movies,
            ], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'AdminController >> get_all >> Failed to get movies: ' . $e->getMessage()], 500);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'duration' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'release_date' => 'required|date',
                'director' => 'required|string',
                'category' => 'required|string',
                'language' => 'required|string',
                'top_cast' => 'required|string',
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

            return response()->json(['message' => 'Movie created successfully', 'movie' => $movie], 201);

        } catch (Exception $e) {
            return response()->json(['message' => 'AdminController >> store >> Failed to create movie: ' . $e->getMessage()], 500);
        }
    }

    public function addFormat(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'movie' => 'required|string',
                'format' => 'required|string',
                'disk_space' => 'required|string',
                'file' => 'nullable|file|mimes:torrent|max:2048',
                'sub_seeds' => 'required|int',
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
            
            return response()->json(['message' => 'Movie file updated successfully', 'movie' => $movie], 201);
            
        } catch (Exception $e) {
            return response()->json(['message' => 'AdminController >> addFormat >> Failed to add format: ' . $e->getMessage()], 500);
        }
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}