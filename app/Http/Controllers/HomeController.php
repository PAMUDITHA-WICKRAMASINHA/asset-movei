<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 
use App\Models\Language; 

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        $languages = Language::all();

        return view('home.index', compact('movies', 'languages'));
    }

    public function search(Request $request)
    {
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
    }

}