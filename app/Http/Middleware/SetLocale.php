<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Routes that must NOT be localized
        if (
            $request->is('login') ||
            $request->is('logout') ||
            $request->is('register') ||
            $request->is('password/*') ||
            $request->is('admin') ||
            $request->is('admin/*')
        ) {
            return $next($request);
        }

        $supportedLocales = ['vi', 'en'];
        $locale = $request->segment(1);

        if (!in_array($locale, $supportedLocales)) {
            $locale = config('app.fallback_locale', 'vi');

            return redirect("/{$locale}/" . ltrim($request->path(), '/'));
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return $next($request);
    }
}
