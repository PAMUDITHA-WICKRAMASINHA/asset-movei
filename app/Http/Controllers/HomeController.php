<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 
use App\Models\Language; 

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = 10;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
    
            $movies = Movie::offset($offset)->limit($perPage)->get();
            $totalMovies = Movie::count();
    
            $languages = Language::all();
    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language;
            }
    
            foreach ($movies as $movie) {
                $metaKeywords .= ', ' . $movie->title;
            }
    
            return view('home.index', [
                'movies' => $movies,
                'languages' => $languages,
                'metaKeywords' => $metaKeywords,
                'totalMovies' => $totalMovies,
                'perPage' => $perPage,
                'currentPage' => $page
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => 'HomeController >> index >> Failed to get movies: ' . $e->getMessage()], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $query = $request->input('query');
            
            if (empty($query)) {
                return redirect()->route('home');
            }

            $movies = Movie::where('title', 'like', '%' . $query . '%')->get();
            if($movies->isEmpty()) { 
                return redirect()->route('home');
            }

            $languages = Language::all();
            
            return view('home.index', compact('movies', 'languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'HomeController >> search >> Failed to search movies: ' . $e->getMessage()], 500);
        }
    }

    public function language($id)
    {
        try {
            $language = Language::findOrFail($id);
            $movies = $language->movies()->get();
            
            $languages = Language::all();
            
            return view('home.index', compact('movies', 'languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'HomeController >> language >> Failed to filter movies: ' . $e->getMessage()], 500);
        }
    }
    
    public function latest(Request $request)
    {
        try {;
            $perPage = 10;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
    
            $movies = Movie::orderBy('created_at', 'desc')->offset($offset)->limit($perPage)->get();
            $totalMovies = Movie::count();
    
            $languages = Language::all();
    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language;
            }
    
            foreach ($movies as $movie) {
                $metaKeywords .= ', ' . $movie->title;
            }
    
            return view('home.index', [
                'movies' => $movies,
                'languages' => $languages,
                'metaKeywords' => $metaKeywords,
                'totalMovies' => $totalMovies,
                'perPage' => $perPage,
                'currentPage' => $page
            ]);
        } catch (Exception $e) {
            return response()->json(['message' => 'HomeController >> latest >> Failed to filter movies: ' . $e->getMessage()], 500);
        }
    }
}