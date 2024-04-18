<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie; 
class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('home.index', compact('movies'));
    }

    public function get_movie($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie.index', compact('movie'));
    }
}