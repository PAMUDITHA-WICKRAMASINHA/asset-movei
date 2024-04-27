<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie; 

class MovieController extends Controller
{
    public function index($id)
    {
        $movie = Movie::with('categories', 'top_casts', 'directors', 'formats', 'languages')->findOrFail($id);
        $latestMovies = Movie::orderBy('created_at', 'desc')
                             ->take(4)
                             ->get();
                             
        return view('movie.index', compact('movie', 'latestMovies'));
        
    }
}