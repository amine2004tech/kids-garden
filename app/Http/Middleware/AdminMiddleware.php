<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('AdminMiddleware is being executed');
        
        if (!auth()->check()) {
            Log::info('User not authenticated');
            return redirect()->route('login');
        }

        if (!auth()->user()->isAdmin()) {
            Log::info('User is not admin');
            return redirect('/')->with('error', 'Unauthorized access.');
        }

        Log::info('User is admin, proceeding');
        return $next($request);
    }
} 