<?php
use CodeIgniter\Config\Services;

if (! function_exists('vite_tags')) {
    /**
     * Emit Vite asset tags for an entry.
     * @param string $entry Entry name: 'app' or page key like 'dashboard'
     */
    function vite_tags(string $entry): string
    {
        helper('env');
        $dev = getenv('VITE_DEV_SERVER') ?: '';
        $nonceAttr = '';
        try {
            $nonceData = service('renderer')->getData('nonce');
            $nonceAttr = isset($nonceData['script']) ? (' ' . $nonceData['script']) : '';
        } catch (\Throwable $e) {
            // Renderer service may be unavailable; ignore nonce assignment in that case.
        }
        $isProd = function_exists('is_prod') ? is_prod() : (strtolower((string) env('CI_ENVIRONMENT')) === 'production');

        if ($dev && ! $isProd) {
            $dev = rtrim($dev, '/');
            $script = $entry === 'app' ? 'main' : "pages/{$entry}";
            $tags = [];
            $tags[] = vite_tags('app', $nonce['script'] ?? null);
            // $tags[] = '<script type="module" src="'. $dev .'/resources/ts/'. $script .'.ts"'. $nonceAttr .'></script>';
            return implode("\n", $tags);
        }

        $manifestPath = FCPATH . 'assets/build/manifest.json';
        if (! is_file($manifestPath)) {
            $manifestPath = FCPATH . 'assets/build/.vite/manifest.json';
            if (! is_file($manifestPath)) {
                return '<!-- vite manifest missing -->';
            }
            if (! is_file($manifestPath)) return '<!-- vite manifest missing -->';
        }
        $manifest = json_decode(file_get_contents($manifestPath), true);
        $key = $entry === 'app' ? 'resources/ts/main.ts' : "resources/ts/pages/{$entry}.ts";
        if (! isset($manifest[$key])) return '<!-- vite entry missing -->';

        $out = '';
        foreach ($manifest[$key]['css'] ?? [] as $css) {
            $out .= '<link rel="stylesheet" href="'. base_url('assets/build/'.$css) .'">'.PHP_EOL;
        }
        $out .= '<script type="module" src="'. base_url('assets/build/'.$manifest[$key]['file']) . '"'. $nonceAttr .'></script>';
        return $out;
    }
}
