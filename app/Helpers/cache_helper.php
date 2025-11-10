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
        // Hold onto the original for fallbacks before mutating the string value.
        $originalKey = (string) $key;

        // Replace anything outside the whitelist (letters, numbers, dot, dash, underscore) with underscores.
        $sanitized = preg_replace('/[^A-Za-z0-9._-]/', '_', $originalKey) ?? '';

        // Collapse consecutive underscores to a single underscore for readability and shorter keys.
        $sanitized = preg_replace('/_{2,}/', '_', $sanitized) ?? '';

        // Trim leading/trailing underscores introduced during sanitization.
        $sanitized = trim($sanitized, '_');

        // If everything was stripped, fall back to a hash of the original key to keep it deterministic.
        if ($sanitized === '') {
            $sanitized = md5($originalKey !== '' ? $originalKey : microtime(true));
        }

        // Limit the key length to stay within conservative backend limits.
        $maxLength = 120;
        if (strlen($sanitized) > $maxLength) {
            $sanitized = substr($sanitized, 0, $maxLength);
        }

        return $sanitized;
    }
}