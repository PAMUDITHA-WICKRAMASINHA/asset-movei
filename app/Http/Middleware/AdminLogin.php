<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('token')) {
            $expiresAt = Session::get('token_expires_at');
            if (now()->greaterThan($expiresAt)) {
                Session::forget('token');
                Session::forget('token_expires_at');
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }

        return $next($request);
    }
}