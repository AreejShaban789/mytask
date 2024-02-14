<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next,$roles)
    {
        // Check if the user is authenticated and is an admin
      
        $user = $request->user();

        if (!$user || !$user->hasRole($roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
