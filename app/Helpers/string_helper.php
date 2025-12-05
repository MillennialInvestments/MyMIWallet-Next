<?php
if (! function_exists('sanitizeCacheKey')) {
    /**
     * Make a cache key filesystem- and adapter-safe.
     */
    function sanitizeCacheKey(string $key): string
    {
        // Replace reserved characters ({}()/\@:) and anything non-alphanumeric
        // with underscores so the key is PSR-16 compatible.
        $key = preg_replace('/[{}()\/\\@:]+/', '_', $key);
        $key = preg_replace('/[^A-Za-z0-9_-]+/', '_', $key);

        // Collapse duplicate underscores and trim from both ends
        $key = preg_replace('/_+/', '_', $key);
        $key = trim($key, '_');

        // Keep keys short for APCu/Redis and similar backends
        if (strlen($key) > 64) {
            $key = substr($key, 0, 64);
        }

        return $key !== '' ? $key : 'cache_key';
    }
}
