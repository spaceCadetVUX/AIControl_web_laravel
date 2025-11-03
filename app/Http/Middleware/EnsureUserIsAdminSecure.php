<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class EnsureUserIsAdmin
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
        // Rate limiting for admin access attempts
        $key = 'admin-access:' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 10)) {
            Log::warning('Admin access rate limit exceeded', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl()
            ]);
            abort(429, 'Too many admin access attempts. Please try again later.');
        }
        RateLimiter::hit($key, 3600); // 1 hour window

        // Check if user is authenticated
        if (!Auth::check()) {
            Log::info('Unauthenticated admin access attempt', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url' => $request->fullUrl()
            ]);
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access the admin area.');
        }

        $user = Auth::user();

        // Check if user is active
        if (!$user->is_active) {
            Log::warning('Inactive user attempted admin access', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $request->ip()
            ]);
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('login')->with('error', 'Your account has been deactivated. Please contact the administrator.');
        }

        // Check if user has admin role
        if ($user->role !== 'admin') {
            Log::warning('Non-admin user attempted admin access', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'ip' => $request->ip(),
                'url' => $request->fullUrl()
            ]);
            return redirect()->route('home')->with('error', 'Access denied. You do not have permission to access the admin area.');
        }

        // Log successful admin access
        Log::info('Admin access granted', [
            'user_id' => $user->id,
            'email' => $user->email,
            'ip' => $request->ip(),
            'url' => $request->fullUrl()
        ]);

        // Add security headers
        $response = $next($request);
        
        if (method_exists($response, 'headers')) {
            $response->headers->set('X-Frame-Options', 'DENY');
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-XSS-Protection', '1; mode=block');
            $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        }

        return $response;
    }
}