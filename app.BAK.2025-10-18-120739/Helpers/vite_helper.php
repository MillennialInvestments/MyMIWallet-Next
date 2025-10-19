<?php
if (! function_exists('vite_tags')) {
    /**
     * @param string|array $entries
     * @param ?string      $nonce   (ignored for now; present for API compatibility)
     */
    function vite_tags($entries = ['resources/js/app.js'], ?string $nonce = null): string
    {
        // Normalize to array
        if (is_string($entries)) {
            $entries = [$entries];
        }

        $devServer = getenv('VITE_DEV_SERVER') ?: 'http://127.0.0.1:5173';
        $isDev     = (getenv('CI_ENVIRONMENT') === 'development');

        if ($isDev) {
            $out = '<script type="module" src="' . $devServer . '/@vite/client"></script>';
            foreach ($entries as $e) {
                $out .= '<script type="module" src="' . rtrim($devServer, '/') . '/' . ltrim($e, '/') . '"></script>';
            }
            return $out;
        }

        $manifestPath = FCPATH . 'assets/manifest.json';
        if (! is_file($manifestPath)) {
            return '';
        }
        $manifest = json_decode(file_get_contents($manifestPath), true) ?: [];
        $out = '';

        foreach ($entries as $e) {
            // Try common keys: 'app', 'app.js', 'resources/js/app.js'
            $key = $e;
            if (! isset($manifest[$key])) {
                foreach ([$e . '.js', 'resources/js/' . ltrim($e, '/')] as $alt) {
                    if (isset($manifest[$alt])) { $key = $alt; break; }
                }
            }
            if (! isset($manifest[$key])) { continue; }
            $item = $manifest[$key];

            if (! empty($item['css']) && is_array($item['css'])) {
                foreach ($item['css'] as $css) {
                    $out .= '<link rel="stylesheet" href="' . base_url('assets/' . ltrim($css, '/')) . '">';
                }
            }
            if (! empty($item['file'])) {
                $out .= '<script type="module" src="' . base_url('assets/' . ltrim($item['file'], '/')) . '"></script>';
            }
        }
        return $out;
    }
}
