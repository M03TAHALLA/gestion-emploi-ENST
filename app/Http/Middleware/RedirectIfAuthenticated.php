<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::check()) {
            // User is authenticated, redirect to appropriate page
            return redirect('/dashboard/admins'); // Change '/dashboard' to the desired destination
        }

        // User is a guest, continue with the request
        return $next($request);
    }
}
