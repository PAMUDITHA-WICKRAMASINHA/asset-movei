<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language; 

class TermsOfServiceController extends Controller
{
    public function index()
    {
        try {
            $languages = Language::all();
            
            return view('terms-of-service.index', compact('languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'TermsOfServiceController >> index >> Failed to get terms of service: ' . $e->getMessage()], 500);
        }
    }
}