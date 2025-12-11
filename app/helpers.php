<?php

/**
 * Custom helper functions for the application
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

if (!function_exists('localized_route')) {
    /**
     * Generate a localized URL for a named route
     *
     * @param  string  $name
     * @param  array  $parameters
     * @param  string|null  $locale
     * @return string
     */
    function localized_route($name, $parameters = [], $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        
        // If locale is 'vi' (default), don't add prefix
        if ($locale === 'vi') {
            return route($name, $parameters);
        }
        
        // For other locales (like 'en'), add locale prefix
        return route($name, array_merge(['locale' => $locale], $parameters));
    }
}

if (!function_exists('switch_locale_url')) {
    /**
     * Get current URL in different locale
     *
     * @param  string  $locale
     * @return string
     */
    function switch_locale_url($locale)
    {
        $currentLocale = app()->getLocale();
        $currentUrl = request()->url();
        $currentPath = request()->path();
        
        // Remove current locale prefix if exists
        if ($currentLocale !== 'vi' && str_starts_with($currentPath, $currentLocale . '/')) {
            $currentPath = substr($currentPath, strlen($currentLocale) + 1);
        }
        
        // Add new locale prefix if not 'vi'
        if ($locale === 'vi') {
            return url($currentPath);
        } else {
            return url($locale . '/' . $currentPath);
        }
    }
}

if (!function_exists('current_locale')) {
    /**
     * Get current application locale
     *
     * @return string
     */
    function current_locale()
    {
        return app()->getLocale();
    }
}
