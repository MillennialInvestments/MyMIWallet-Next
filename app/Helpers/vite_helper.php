<?php
// app/Helpers/vite_helper.php

use CodeIgniter\HTTP\URI;

if (! function_exists('vite_is_dev')) {
    /**
     * Should we use the dev server? (HMR)
     * You can force this via .env: VITE_USE_DEV=true
     */
    function vite_is_dev(): bool
    {
        $force = env('VITE_USE_DEV');
        if ($force !== null) {
            return filter_var($force, FILTER_VALIDATE_BOOL);
        }

        // Default to false on servers without Node.
        return false;
    }
}

if (! function_exists('vite_dev_url')) {
    /**
     * Dev server URL (for HMR).
     * .env: VITE_DEV_SERVER=http://127.0.0.1:5173
     */
    function vite_dev_url(): string
    {
        return rtrim((string) (env('VITE_DEV_SERVER') ?? 'http://127.0.0.1:5173'), '/');
    }
}

if (! function_exists('vite_manifest_path')) {
    /**
     * Absolute path to manifest.json for built assets.
     * .env: VITE_MANIFEST=/full/path/to/public/assets/build/manifest.json
     */
    function vite_manifest_path(): string
    {
        $env = env('VITE_MANIFEST');
        if ($env) return $env;

        // Default location under public/
        return FCPATH . 'assets/build/manifest.json';
    }
}

if (! function_exists('vite_manifest')) {
    /**
     * Load and decode manifest.json (production build)
     */
    function vite_manifest(): array
    {
        static $manifest = null;
        if ($manifest !== null) return $manifest;

        $path = vite_manifest_path();
        if (! is_file($path)) return $manifest = [];

        $json = @file_get_contents($path);
        if ($json === false) return $manifest = [];

        $data = json_decode($json, true);
        return $manifest = is_array($data) ? $data : [];
    }
}

if (! function_exists('vite_tag_nonce_attr')) {
    /**
     * Accepts either a raw nonce (e.g. "abc") or an attribute (e.g. 'nonce="abc"')
     * and returns the normalized attribute string:  nonce="abc"  or ''.
     */
    function vite_tag_nonce_attr(?string $nonce): string
    {
        $nonce = (string) ($nonce ?? '');
        if ($nonce === '') return '';
        // Already looks like an attribute?
        if (stripos($nonce, 'nonce=') !== false) return $nonce;
        // Otherwise treat as raw token
        return 'nonce="' . esc($nonce, 'attr') . '"';
    }
}

if (! function_exists('vite_tags')) {
    /**
     * Emit tags for an entrypoint.
     *
     * $entry can be a key like 'app' or a path like 'resources/js/app.js'.
     * In prod, we look up the manifest; in dev we hit the dev server.
     *
     * @param string      $entry  Entrypoint key or path
     * @param string|null $nonce  Raw nonce ('abc') or full attr ('nonce="abc"')
     * @param array       $opts   ['css' => true] to also include CSS tags from manifest
     */
    function vite_tags(string $entry = 'app', ?string $nonce = null, array $opts = []): string
    {
        $attr = vite_tag_nonce_attr($nonce);
        $includeCss = $opts['css'] ?? true;

        // Normalize entry to something we can find in manifest keys
        $normalized = $entry;
        if (! str_contains($entry, '.')) {
            // Treat as logical key, assume JS entry
            $normalized = "resources/js/{$entry}.js";
        }

        // Dev: use Vite dev server
        if (vite_is_dev()) {
            $dev = vite_dev_url();
            // Client (HMR)
            $out  = '<script type="module" src="' . $dev . '/@vite/client" ' . $attr . '></script>' . PHP_EOL;
            // Entrypoint
            $out .= '<script type="module" src="' . $dev . '/' . ltrim($normalized, '/') . '" ' . $attr . '></script>' . PHP_EOL;
            return $out;
        }

        // Prod: read manifest
        $man = vite_manifest();
        if ($man === []) {
            // No manifest yet: fail silently (or emit fallback if you prefer)
            return '';
        }

        // Find the right record
        $record = $man[$normalized] ?? null;
        if (! $record) {
            // Sometimes the manifest keys are just filenames, try basename fallback
            $basename = basename($normalized);
            $record = $man[$basename] ?? null;
        }
        if (! $record) return '';

        $out = '';

        // CSS first (if any)
        if ($includeCss && ! empty($record['css']) && is_array($record['css'])) {
            foreach ($record['css'] as $css) {
                $href = site_url('assets/build/' . ltrim($css, '/'));
                $out .= '<link rel="stylesheet" href="' . esc($href, 'attr') . '">' . PHP_EOL;
            }
        }

        // Then JS file for the entry
        if (! empty($record['file'])) {
            $src = site_url('assets/build/' . ltrim($record['file'], '/'));
            $out .= '<script type="module" src="' . esc($src, 'attr') . '" ' . $attr . '></script>' . PHP_EOL;
        }

        return $out;
    }
}
