<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

if (!function_exists('assets')) {
    /**
     * Generate an asset path for the application (alias for asset()).
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function assets(string $path, ?bool $secure = null): string
    {
        return asset($path, $secure);
    }
}

if (!function_exists('page_title')) {
    /**
     * Generate page title with site name.
     *
     * @param  string  $title
     * @return string
     */
    function page_title(string $title): string
    {
        return $title . ' | ' . config('app.name', 'AIControl');
    }
}

if (!function_exists('current_locale')) {
    /**
     * Get the current application locale.
     *
     * @return string
     */
    function current_locale(): string
    {
        return App::getLocale();
    }
}

if (!function_exists('switch_locale_url')) {
    /**
     * Generate a URL for the target locale, preserving the current page.
     *
     * Works with prefixed routes like "vi.solution.lighting" / "en.solution.lighting".
     *
     * @param string $targetLocale
     * @return string
     */
    function switch_locale_url(string $targetLocale): string
    {
        $route = request()->route();

        // If there is no route, fallback to target locale home
        if (!$route || !$route->getName()) {
            return url($targetLocale);
        }

        $currentRouteName = $route->getName(); // e.g., "vi.solution.lighting"
        $parameters = $route->parameters();

        // Remove current locale prefix from route name
        $routeParts = explode('.', $currentRouteName);
        if (in_array($routeParts[0], ['vi', 'en'])) {
            array_shift($routeParts);
        }

        // Build target route name
        $targetRouteName = $targetLocale . '.' . implode('.', $routeParts);

        // If route exists, generate URL
        if (Route::has($targetRouteName)) {
            return route($targetRouteName, $parameters);
        }

        // Fallback to target locale home
        return url($targetLocale);
    }
}
