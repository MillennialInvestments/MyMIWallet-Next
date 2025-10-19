<?php
// Null-safe wrappers to prevent SiteURI null path errors.

if (! function_exists('site_url_safe')) {
    function site_url_safe($uri = '', ?string $protocol = null): string
    {
        return site_url($uri ?? '', $protocol);
    }
}

if (! function_exists('base_url_safe')) {
    function base_url_safe($uri = '', ?string $protocol = null): string
    {
        return base_url($uri ?? '', $protocol);
    }
}

if (! function_exists('anchor_safe')) {
    function anchor_safe($uri = '', string $title = '', array $attributes = []): string
    {
        helper('url');

        return anchor($uri ?? '', $title, $attributes);
    }
}

if (! function_exists('redirect_to_safe')) {
    function redirect_to_safe(?string $uri, string $fallback = '/')
    {
        return service('response')->redirect($uri ?? $fallback);
    }
}

if (! function_exists('href_or')) {
    function href_or($maybe, string $fallback = '#'): string
    {
        return (is_string($maybe) && $maybe !== '') ? $maybe : $fallback;
    }
}