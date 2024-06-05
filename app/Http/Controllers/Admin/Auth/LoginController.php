<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        try {
            return view('admin.login.index');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'LoginController >> index >> Failed to login: ' . $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $admin = Admin::where('email', $request->email)->first();
            
            if (!$admin || !Hash::check($request->password, $admin->password)) {
                return redirect()->back()->with('fail', 'Operation failed. Please try again.');
            }
        
            Auth::login($admin);
        
            $expirationTime = now()->addHour();
            $token = $admin->createToken('adminToken', ['*'], $expirationTime)->plainTextToken;

            Session::put('token', $token);
            Session::put('token_expires_at', $expirationTime);
        
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'LoginController >> index >> Failed to login: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function logout(Request $request)
    {
        try {
            Session::forget('token');
            Session::forget('token_expires_at');
            return redirect()->route('login');
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message' => 'LoginController >> index >> Failed to login: ' . $e->getMessage()
            ], 500);
        }
    }
}