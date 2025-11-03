<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Log;

class LoginRateLimit
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
        // Only apply to POST requests (login attempts)
        if ($request->isMethod('POST')) {
            $key = 'login-attempts:' . $request->ip();
            
            // Allow 5 attempts per 15 minutes per IP
            if (RateLimiter::tooManyAttempts($key, 5)) {
                Log::warning('Login rate limit exceeded', [
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'email' => $request->input('email')
                ]);
                
                $seconds = RateLimiter::availableIn($key);
                return back()->withErrors([
                    'email' => "Too many login attempts. Please try again in " . ceil($seconds / 60) . " minutes."
                ])->withInput($request->only('email'));
            }
            
            // Log the attempt
            Log::info('Login attempt', [
                'ip' => $request->ip(),
                'email' => $request->input('email'),
                'user_agent' => $request->userAgent()
            ]);
            
            RateLimiter::hit($key, 900); // 15 minutes
        }

        return $next($request);
    }
}
