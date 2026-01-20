<?php

declare(strict_types=1);

if (! function_exists('sanitize_cache_key')) {
    /**
     * Sanitize a cache key to satisfy PSR-16 / CI cache restrictions.
     */
    function sanitize_cache_key(string $key): string
    {
        $key = preg_replace('/[^a-zA-Z0-9_\-]/', '_', $key);

        // Collapse multiple underscores and trim
        $key = preg_replace('/_+/', '_', $key);
        $key = trim($key, '_');

        // Enforce max length
        if (strlen($key) > 64) {
            $key = substr($key, 0, 64);
        }

        return $key !== '' ? $key : 'cache_key';
    }
}

if (! function_exists('sanitizedCacheKey')) {
    /**
     * Normalize cache keys to keep them compatible across different cache backends.
     *
     * @param string $key Raw cache key value to sanitize.
     */
    function sanitizedCacheKey(string $key): string
    {
        return sanitize_cache_key($key);
    }
}

if (! function_exists('sanitizeCacheKey')) {
    /**
     * Backwards-compatible camelCase helper used across the codebase.
     */
    function sanitizeCacheKey(string $key): string
    {
        return sanitize_cache_key($key);
    }
}
