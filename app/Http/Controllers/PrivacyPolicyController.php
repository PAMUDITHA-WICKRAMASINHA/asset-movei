<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language; 

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        try {
            $languages = Language::all();
            
            return view('privacy-policy.index', compact('languages'));
        } catch (Exception $e) {
            return response()->json(['message' => 'PrivacyPolicyController >> index >> Failed to get privacy policy: ' . $e->getMessage()], 500);
        }
    }
}