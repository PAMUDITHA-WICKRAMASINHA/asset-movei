<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie; 
use App\Models\Language; 

class MovieController extends Controller
{
    public function index($id)
    {
        try {
            $movie = Movie::with('categories', 'top_casts', 'directors', 'formats', 'languages')->findOrFail($id);
            $languages = Language::all();
            $latestMovies = Movie::orderBy('created_at', 'desc')
                                ->take(4)
                                ->get();
                                
            return view('movie.index', compact('movie', 'latestMovies', 'languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'MovieController >> index >> Failed to get movies: ' . $e->getMessage()], 500);
        }
    }
}