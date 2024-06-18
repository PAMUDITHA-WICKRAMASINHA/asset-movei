<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language; 

class AboutController extends Controller
{
    public function index()
    {
        try {
            $languages = Language::all();
            
            return view('about.index', compact('languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'AboutController >> index >> Failed to get about: ' . $e->getMessage()], 500);
        }
    }
}