<?php
if (! function_exists('sanitizeCacheKey')) {
    /**
     * Make a cache key filesystem- and adapter-safe.
     */
    function sanitizeCacheKey(string $key): string
    {
        // Replace unsafe characters and shorten if extremely long
        $key = preg_replace('/[^A-Za-z0-9_\-:.]/', '_', $key);
        return substr($key, 0, 180); // keep under APCu/Redis length limits
    }
}
