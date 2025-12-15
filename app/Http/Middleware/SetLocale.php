<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class SetLocale
{
   public function handle(Request $request, Closure $next)
{
    $supportedLocales = ['vi', 'en'];
    $firstSegment = $request->segment(1);

    // English routes: /en/...
    if ($firstSegment === 'en') {
        app()->setLocale('en');
        session(['locale' => 'en']);
    }
    // Default Vietnamese routes: NO prefix
    else {
        app()->setLocale('vi');
        session(['locale' => 'vi']);
    }

    return $next($request);
}

}
