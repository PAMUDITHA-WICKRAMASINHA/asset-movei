<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 
use App\Models\Language;
use App\Models\Category; 

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $perPage = (int) env('MOVIES_PAGE_PAGINATION', 20);
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;

            $seed = $request->session()->get('random_seed', mt_rand());

            $movies = Movie::inRandomOrder($seed)->offset($offset)->limit($perPage)->get();

            $request->session()->put('random_seed', $seed);
            
            $totalMovies = Movie::count();
    
            $languages = Language::all();
    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language;
            }
    
            foreach ($movies as $movie) {
                $metaKeywords .= ', ' . $movie->title;
                $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
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
            
            $perPage = (int) env('MOVIES_PAGE_PAGINATION', 20);;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
    
            $movies = Movie::where('title', 'like', '%' . $query . '%')->offset($offset)->limit($perPage)->get();
            if($movies->isEmpty()) { 
                return redirect()->route('home');
            }
            
            $totalMovies = Movie::where('title', 'like', '%' . $query . '%')->count();
    
            $languages = Language::all();
    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language;
            }
    
            foreach ($movies as $movie) {
                $metaKeywords .= ', ' . $movie->title;
                $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
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
            return response()->json(['message' => 'HomeController >> search >> Failed to search movies: ' . $e->getMessage()], 500);
        }
    }

    public function language(Request $request)
    {
        try {
            $perPage = (int) env('MOVIES_PAGE_PAGINATION', 20);;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
    
            $id = $request->input('id');
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('home');
            }

            $movies = $language->movies()->offset($offset)->limit($perPage)->get();
            if($movies->isEmpty()) { 
                return redirect()->route('home');
            }
            
            $totalMovies = $language->movies()->count();
            
            $languages = Language::all();
    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language;
            }
    
            foreach ($movies as $movie) {
                $metaKeywords .= ', ' . $movie->title;
                $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
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
            return response()->json(['message' => 'HomeController >> language >> Failed to filter movies: ' . $e->getMessage()], 500);
        }
    }
    
    public function latest(Request $request)
    {
        try {;
            $perPage = (int) env('MOVIES_PAGE_PAGINATION', 20);;
            $page = $request->input('page', 1);
            $offset = ($page - 1) * $perPage;
    
            $movies = Movie::orderBy('created_at', 'desc')->offset($offset)->limit($perPage)->get();
            $totalMovies = Movie::count();
    
            $languages = Language::all();

            $categories = Category::all();
    
            $metaKeywords = '';
            foreach ($languages as $language) {
                $metaKeywords .= ', ' . $language->language . ' movies';
            }

            foreach ($categories as $category) {
                $metaKeywords .= ', ' . $category->category . ' movies';
            }
    
            foreach ($movies as $movie) {
                $metaKeywords .= ', ' . $movie->title;
                $movie->image = route('showMoviesImage', ['filename' => basename($movie->image)]);
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