<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class SessionTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $lastActivity = session('last_activity', now());
            
            // Timeout after 2 minutes
            if (now()->diffInMinutes($lastActivity) >= 2) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route('login')
                    ->with('status', 'Your session has expired. Please login again.');
            }

            // Update last activity time
            session(['last_activity' => now()]);
        }

        return $next($request);
    }
}