<?php

/**
 * Custom helper functions for the application
 * * NOTE: This file assumes you have a routing structure where the locale 
 * is the first parameter for all localized routes, e.g.,
 * Route::group(['prefix' => '{locale}', 'middleware' => 'setlocale', ...], function() { ... });
 */

if (!function_exists('assets')) {
    /**
     * Generate an asset path for the application (alias for asset()).
     * This is a compatibility function for templates using assets() instead of asset()
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function assets($path, $secure = null)
    {
        return asset($path, $secure);
    }
}

if (!function_exists('page_title')) {
    /**
     * Generate page title with site name
     *
     * @param  string  $title
     * @return string
     */
    function page_title($title)
    {
        return $title . ' | ' . config('app.name', 'AIControl');
    }
}

// --- Localization Helpers ---

if (!function_exists('localized_route')) {
    /**
     * Generate a localized URL for a named route.
     * * This function ensures the correct 'locale' parameter is passed 
     * to the route generator, regardless of the current locale.
     *
     * @param  string  $name The name of the route (e.g., 'home', 'products.show').
     * @param  array   $parameters Optional route parameters (e.g., model IDs).
     * @param  string|null  $locale The target locale (defaults to current app locale).
     * @return string
     */
    function localized_route($name, $parameters = [], $locale = null)
    {
        // Use the specified locale or the current application locale
        $locale = $locale ?? app()->getLocale();
        
        // Ensure the locale parameter is always included in the route parameters array.
        // If the route doesn't have a {locale} parameter, Laravel will ignore this.
        // If it does, this handles the prefix creation correctly.
        $parameters = array_merge(['locale' => $locale], $parameters);
        
        // Generate the URL using Laravel's native route helper.
        return route($name, $parameters);
    }
}

if (!function_exists('switch_locale_url')) {
    /**
     * Get the current URL in a different locale by regenerating the route.
     * * This is the robust solution that preserves existing route parameters (like model IDs) 
     * and query parameters (like ?page=2 or ?sort=price).
     *
     * @param  string  $locale The target locale to switch to (e.g., 'en', 'vi').
     * @return string
     */
    function switch_locale_url($locale)
    {
        $route = request()->route();
        
        // Safety check: If no route is matched (e.g., 404), redirect to home with new locale.
        if (!$route || !$route->getName()) {
             // **CRITICAL:** Ensure you have a route named 'home' or change this fallback.
            return localized_route('home', [], $locale); 
        }

        $routeName = $route->getName();
        $routeParameters = $route->parameters();
        
        // Get all current query string parameters (e.g., ?page=2)
        $queryParameters = request()->query();

        // 1. Remove the current 'locale' key from the route parameters 
        //    to avoid double-injecting it, as it's handled by localized_route.
        unset($routeParameters['locale']); 

        // 2. Combine route parameters and query parameters
        $allParameters = array_merge($routeParameters, $queryParameters);

        // 3. Regenerate the full URL using the new locale
        return localized_route($routeName, $allParameters, $locale);
    }
}