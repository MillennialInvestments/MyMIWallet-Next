<?php

declare(strict_types=1);

/**
 * Safe, source-controlled editorial copy for any opted-in view.
 * Every rendered value must still be escaped by the consuming view.
 * This helper never interprets PHP, HTML, JS, filesystem paths, or URLs.
 */
if (! function_exists('mymi_editorial_page')) {
    function mymi_editorial_page(string $page): array
    {
        static $cache = [];

        if (! preg_match('/\A[a-z][a-z0-9_.-]{0,63}\z/D', $page)) {
            return [];
        }

        if (array_key_exists($page, $cache)) {
            return $cache[$page];
        }

        $path = APPPATH . 'Content/editorial/' . $page . '.json';
        if (! is_file($path) || is_link($path) || filesize($path) > 131072) {
            return $cache[$page] = [];
        }

        $source = file_get_contents($path);
        if ($source === false) {
            return $cache[$page] = [];
        }

        try {
            $document = json_decode($source, true, 32, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            return $cache[$page] = [];
        }

        if (! is_array($document)
            || ($document['schema'] ?? null) !== 'mymi.editorial.v1'
            || ($document['page'] ?? null) !== $page
            || ! is_array($document['fields'] ?? null)
        ) {
            return $cache[$page] = [];
        }

        return $cache[$page] = $document['fields'];
    }
}

if (! function_exists('mymi_editorial_text')) {
    function mymi_editorial_text(string $page, string $field, string $fallback = ''): string
    {
        if (! preg_match('/\A[a-z][a-z0-9_.-]{0,79}\z/D', $field)) {
            return $fallback;
        }

        $fields = mymi_editorial_page($page);
        $value = $fields[$field] ?? null;
        if (! is_string($value) || trim($value) === '' || strlen($value) > 4000) {
            return $fallback;
        }

        // Plain text only. View-specific esc() remains mandatory.
        return trim($value);
    }
}
