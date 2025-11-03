<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Record failed login attempt if user exists
            $user = \App\Models\User::where('email', $request->email)->first();
            if ($user && method_exists($user, 'recordFailedLogin')) {
                $user->recordFailedLogin();
            }
            
            // Log failed login attempt
            \Illuminate\Support\Facades\Log::warning('Failed login attempt', [
                'email' => $request->email,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'user_found' => $user ? 'yes' : 'no'
            ]);
            
            throw $e;
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Check if user is active
        if (!$user->is_active) {
            Auth::logout();
            \Illuminate\Support\Facades\Log::warning('Login attempt by inactive user', [
                'user_id' => $user->id,
                'email' => $user->email,
                'ip' => $request->ip()
            ]);
            return back()->withErrors([
                'email' => 'Your account has been deactivated. Please contact the administrator.',
            ]);
        }

        // Record successful login
        if (method_exists($user, 'recordLogin')) {
            $user->recordLogin($request->ip());
        }
      
        // Log successful login
        \Illuminate\Support\Facades\Log::info('Successful login', [
            'user_id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        // Redirect based on user role
        $intendedUrl = $request->session()->get('url.intended');
        
        if ($user->role === 'admin') {
            // If there's an intended URL and it's an admin route, go there
            if ($intendedUrl && strpos($intendedUrl, '/admin') !== false) {
                return redirect()->intended();
            }
            // Otherwise, go to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        
        // Determine logout type
        $logoutType = 'manual';
        if ($request->has('auto_logout')) {
            $logoutType = 'auto_tab_close';
        } elseif ($request->has('inactivity_logout')) {
            $logoutType = 'inactivity_timeout';
        }
        
        // Log logout event
        if ($user) {
            \Illuminate\Support\Facades\Log::info('User logged out', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'logout_type' => $logoutType,
                'session_duration' => $user->last_login_at ? now()->diffInMinutes($user->last_login_at) . ' minutes' : 'unknown'
            ]);
        }

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
