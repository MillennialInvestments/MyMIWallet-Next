<?php

use CodeIgniter\Config\Services;

if (! function_exists('asset_if_exists')) {
    function asset_if_exists(string $path, ?string $baseUrl = null): string
    {
        $baseUrl = $baseUrl ?? base_url();
        $full = FCPATH . ltrim($path, '/');
        if (is_file($full)) {
            $ver = (string) @filemtime($full);
            return rtrim($baseUrl, '/') . '/' . ltrim($path, '/') . ($ver ? '?v=' . $ver : '');
        }
        return '';
    }
}

if (! function_exists('vite_tags')) {
    /**
     * Emit Vite tags for an entry.
     * $entry: 'app' -> resources/ts/main.ts
     *         'dashboard' -> resources/ts/pages/dashboard.ts
     */
    function vite_tags(string $entry = 'app'): string
    {
        helper('env');

        $env = (string) env('CI_ENVIRONMENT', 'production');
        $isProd = strtolower($env) === 'production';

        // Dev server (e.g., http://localhost:5173)
        $dev = rtrim((string) getenv('VITE_DEV_SERVER'), '/');

        // Only treat the request as "local dev" when the client is localhost.
        $clientIsLocal = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'], true);

        // Resolve logical entry to real path
        $tsEntry = $entry === 'app'
            ? 'resources/ts/main.ts'
            : "resources/ts/pages/{$entry}.ts";

        $resolveNonce = static function (): string {
            $nonceAttr = '';
            try {
                $nonceData = service('renderer')->getData('nonce');
                if (! empty($nonceData['script'])) {
                    // $nonceData['script'] is expected to be like: nonce="abc..."
                    $nonceAttr = ' ' . trim($nonceData['script']);
                }
            } catch (\Throwable $e) {
                // no-op if renderer not available here
            }

            return $nonceAttr;
        };

        // DEV: emit @vite/client + the entry module only for non-production local requests
        if ($dev && ! $isProd && $clientIsLocal) {
            $nonceAttr = $resolveNonce();
            $out  = '<script type="module" src="' . $dev . '/@vite/client"' . $nonceAttr . '></script>' . PHP_EOL;
            $out .= '<script type="module" src="' . $dev . '/' . $tsEntry . '"' . $nonceAttr . '></script>';
            return $out;
        }

        // PROD: read manifest and emit built files
        $manifestPath = FCPATH . 'assets/build/manifest.json';
        if (! is_file($manifestPath)) {
            $manifestPath = FCPATH . 'assets/build/.vite/manifest.json';
        }
        if (! is_file($manifestPath)) {
            return '<!-- vite manifest missing -->';
        }

        $manifest = json_decode((string) file_get_contents($manifestPath), true);
        if (! is_array($manifest)) {
            return '<!-- vite manifest unreadable -->';
        }

        if (! isset($manifest[$tsEntry])) {
            return '<!-- vite entry missing: ' . htmlspecialchars($tsEntry, ENT_QUOTES, 'UTF-8') . ' -->';
        }

        $chunk = $manifest[$tsEntry];
        $out   = '';

        // CSS
        if (! empty($chunk['css']) && is_array($chunk['css'])) {
            foreach ($chunk['css'] as $css) {
                $out .= '<link rel="stylesheet" href="' . base_url('assets/build/' . ltrim($css, '/')) . '">' . PHP_EOL;
            }
        }

        // JS
        if (! empty($chunk['file'])) {
            $out .= '<script type="module" src="'
                 . base_url('assets/build/' . ltrim($chunk['file'], '/'))
                 . '"'
                 . $nonceAttr
                 . '></script>';
        } else {
            $out .= '<!-- vite file missing for ' . htmlspecialchars($tsEntry, ENT_QUOTES, 'UTF-8') . ' -->';
        }

        return $out;
    }
}
