<?php
// app/Helpers/cache_helper.php

if (! function_exists('sanitizeCacheKey')) {
    /**
     * Normalize a string into a cache-safe key.
     * - lowercases
     * - strips accents
     * - replaces non [a-z0-9:_-] with ':'
     * - trims to $max bytes; if too long, uses a hashed tail
     */
    function sanitizeCacheKey(string $key, int $max = 120): string
    {
        // strip accents → ASCII
        $ascii = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $key) ?: $key;
        $ascii = strtolower($ascii);

        // keep safe chars only
        $safe = preg_replace('/[^a-z0-9:_-]+/', ':', $ascii) ?? $ascii;

        // collapse duplicate separators and trim
        $safe = trim(preg_replace('/[:_-]{2,}/', ':', $safe), ':_-');

        // enforce length
        if (strlen($safe) > $max) {
            $hash = substr(hash('sha256', $safe), 0, 16);
            // keep head and append hash tail
            $head = substr($safe, 0, max(8, $max - 1 - strlen($hash)));
            $safe = rtrim($head, ':_-') . ':' . $hash;
        }

        return $safe !== '' ? $safe : 'k:' . substr(hash('sha256', $key), 0, 16);
    }
}
