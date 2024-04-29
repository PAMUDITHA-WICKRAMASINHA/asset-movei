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
}