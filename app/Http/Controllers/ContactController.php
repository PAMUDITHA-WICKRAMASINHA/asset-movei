<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language; 

class ContactController extends Controller
{
    public function index()
    {
        try {
            $languages = Language::all();
            
            return view('contact.index', compact('languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'ContactController >> index >> Failed to get contact: ' . $e->getMessage()], 500);
        }
    }
}