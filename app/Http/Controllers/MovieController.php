<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie; 
use App\Models\Language; 
use App\Models\MoviesFormat; 
use Carbon\Carbon;

class MovieController extends Controller
{
    public function index($id)
    {
        try {
            $movie = Movie::with('categories', 'top_casts', 'directors', 'formats', 'languages')->findOrFail($id);
            $languages = Language::all();
            $latestMovies = Movie::latest()->limit(4)->get();
                    
            $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
            $movie->release_date = Carbon::parse($movie->release_date)->format('d F Y');
            
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language . ' movies';
            }

            foreach ($movie->categories as $category) {
                $metaKeywords .= ', ' . $category->category . ' movies';
            }

            foreach ($movie->top_casts as $top_cast) {
                $metaKeywords .= ', ' . $top_cast->name . ' movies';
                $top_cast->image = route('showTopCastsImage', ['filename' => basename($top_cast->image)]);
            }

            foreach ($movie->directors as $director) {
                $metaKeywords .= ', ' . $director->name . ' movies';
                $director->image = route('showDirectorsImage', ['filename' => basename($director->image)]);
            }
            
            foreach ($latestMovies as $latestMovie) {
                $latestMovie->image = route('showMoviesImage', ['filename' => basename($latestMovie->image)]);
            }

            $metaKeywords .= ', ' . $movie->title;
            return view('movies.index', compact('movie', 'latestMovies', 'languages', 'metaKeywords'));
        } catch (Exception $e) {
            return response()->json(['message' => 'MovieController >> index >> Failed to get movies: ' . $e->getMessage()], 500);
        }
    }

    public function download($format_id, $movie_id)
    {
        try {
            $movies_format = MoviesFormat::where('format_id', $format_id)
                                         ->where('movie_id', $movie_id)
                                         ->first();
            if ($movies_format) {
                $file_path = storage_path('app/' . $movies_format->file);
        
                if (file_exists($file_path)) {
                    $movies_format->increment('download_count');
                    $movies_format->save();
                    
                    $movie = $movies_format->movie;
                    $movie->increment('download_count');
                    $movie->save();

                    $file_name = pathinfo($file_path, PATHINFO_FILENAME);
                    $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);
                    
                    $download_name = $movie->title . ' [' . $file_name . '].' . $file_extension;
    
                    return response()->download($file_path, $download_name);
                } else {
                    return redirect()->back()->with('error', 'File not found.');
                }
            } else {
                return redirect()->back()->with('error', 'Movie format not found.');
            }
        } catch (Exception $e) {
            return response()->json(['message' => 'MovieController >> download >> Failed to get movies: ' . $e->getMessage()], 500);
        }
    }    
}