<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            return view('admin.dashboards.index');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'DashboardController >> index >> Failed to dashboard: ' . $e->getMessage()
            ], 500);
        }
    }
}