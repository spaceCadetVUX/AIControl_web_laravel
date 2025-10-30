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
