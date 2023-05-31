<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaliKelasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::user()->role == 1) {
            return redirect()->back()->with('status', 'Access Denied. You are not Wali Kelas!');
        } elseif (Auth::user()->role == 0) {
            return redirect()->back()->with('status', 'Access Denied. You are not Wali Kelas!');
        } else {
            return $next($request);
        }
    }
}
