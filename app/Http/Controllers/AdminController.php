<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Director;
use App\Models\TopCast;
use Validator;
use Exception;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();
        $top_casts = TopCast::all();
        $categories = Category::all();
        return view('admin.body.addMovie', compact('directors', 'top_casts', 'categories'));
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
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'release_date' => 'required|date',
                'director' => 'required|string',
                'category' => 'required|string',
                'top_cast' => 'required|string',
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
            $movie->trailer = $request->input('trailer');
            $movie->description = $request->input('description');
        
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('movie_images', 'public');
                $movie->image = 'assets/img/' . $imagePath;
            }
            
            $movie->save();
            $movie->directors()->sync(json_decode($request->input('director'), true));
            $movie->categories()->sync(json_decode($request->input('category'), true));
            $movie->top_casts()->sync(json_decode($request->input('top_cast'), true));

            return response()->json(['message' => 'Movie created successfully', 'movie' => $movie], 201);

        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to create movie: ' . $e->getMessage()], 500);
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
                $filePath = $request->file('file')->store('movie_file', 'public');
                $movie->file = 'assets/file/' . $filePath;
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
            return response()->json(['message' => 'Failed to add format: ' . $e->getMessage()], 500);
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