<?php

declare(strict_types=1);

if (! function_exists('sanitizedCacheKey')) {
    /**
     * Normalize cache keys to keep them compatible across different cache backends.
     *
     * @param string $key Raw cache key value to sanitize.
     */
    function sanitizedCacheKey(string $key): string
    {
        // Cast to string explicitly to avoid notices when callers pass scalars.
        $key = (string) $key;

        // Replace anything outside the whitelist with underscores.
        $key = preg_replace('/[^A-Za-z0-9:_-]/', '_', $key);

        // Limit the key length to stay within conservative backend limits.
        $maxLength = 120;
        if (strlen($key) > $maxLength) {
            $key = substr($key, 0, $maxLength);
        }

        return $key;
    }
}