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
            $latestMovies = Movie::latest()->limit(4)->get();
                    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language;
            }

            foreach ($movie->categories as $category) {
                $metaKeywords .= ', ' . $category->category;
            }

            foreach ($movie->top_casts as $top_cast) {
                $metaKeywords .= ', ' . $top_cast->name;
            }

            foreach ($movie->directors as $director) {
                $metaKeywords .= ', ' . $director->name;
            }
            
            $metaKeywords .= ', ' . $movie->title;
            
            return view('movie.index', compact('movie', 'latestMovies', 'languages', 'metaKeywords'));
        } catch (Exception $e) {
            return response()->json(['message' => 'MovieController >> index >> Failed to get movies: ' . $e->getMessage()], 500);
        }
    }
}