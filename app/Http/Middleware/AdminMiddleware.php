<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        // Check if the user has the 'admin' role
        if (Auth::user()->role !== 'admin') {
            return redirect('/user_dashboard'); // Redirect to home if not an admin
        }

        // Proceed to the next request
        return $next($request);
    }
}
