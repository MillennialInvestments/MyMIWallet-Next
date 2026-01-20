<?php
if (! function_exists('sanitizeCacheKey')) {
    /**
     * Make a cache key filesystem- and adapter-safe.
     */
    function sanitizeCacheKey(string $key): string
    {
        if (function_exists('sanitize_cache_key')) {
            return sanitize_cache_key($key);
        }

        // Fallback to a conservative sanitization if the cache helper was not loaded yet.
        $key = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $key);
        $key = preg_replace('/_+/', '_', $key);
        $key = trim($key, '_');

        return $key !== '' ? $key : 'cache_key';
    }
}
