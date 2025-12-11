<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
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
        // Supported locales
        $supportedLocales = ['vi', 'en'];
        
        // Get locale from URL segment (first segment after domain)
        $locale = $request->segment(1);
        
        // If locale is in supported list, set it
        if (in_array($locale, $supportedLocales)) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // No locale in URL = Vietnamese (default)
            App::setLocale('vi');
            Session::put('locale', 'vi');
        }
        
        return $next($request);
    }
}
