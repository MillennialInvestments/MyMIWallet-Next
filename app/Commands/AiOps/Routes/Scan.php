<?php

namespace App\Commands\AiOps\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\MultiCurl;

class Scan extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:routes:scan';
    protected $description = 'Scan Routes.php (GET routes), parallel curl, write JSON+CSV+snapshot';

    public function run(array $params)
    {
        $routesFile = APPPATH . 'Config/Routes.php';
        if (!file_exists($routesFile)) {
            CLI::error('Routes.php not found.');
            return;
        }

        $baseURL = rtrim((string) env('app.baseURL'), '/');
        if (!$baseURL) {
            CLI::error('app.baseURL not set.');
            return;
        }

        $concurrency = (int)($params[0] ?? 10);
        if ($concurrency < 1) $concurrency = 1;

        $routesContent = file_get_contents($routesFile);

        preg_match_all('/\$routes->get\(\s*[\'"]([^\'"]+)[\'"]\s*,/i', $routesContent, $m);
        $routes = $m[1] ?? [];

        // normalize and filter dynamic placeholders
        $urls = [];
        foreach ($routes as $r) {
            if (str_contains($r, '(:')) continue;
            $r = '/' . ltrim($r, '/');
            $urls[] = $baseURL . $r;
        }

        $urls = array_values(array_unique($urls));
        sort($urls);

        if (empty($urls)) {
            CLI::write('No static GET routes found.');
            return;
        }

        CLI::write('Total routes: ' . count($urls));
        CLI::write('Concurrency: ' . $concurrency);

        $mc = new MultiCurl();
        $raw = $mc->run($urls, [
            'concurrency' => $concurrency,
            'timeout' => 15,
            'connect_timeout' => 10,
        ]);

        $results = [];
        $csvRows = [];
        $csvRows[] = ['Route', 'Full URL', 'HTTP Status', 'Response Time (ms)', 'Content Length', 'Redirect URL', 'Curl Error'];

        foreach ($urls as $url) {
            $route = str_replace($baseURL, '', $url);
            $r = $raw[$url] ?? ['status'=>0,'time_ms'=>null,'length'=>0,'redirect'=>'','error'=>'no_result'];

            $results[] = [
                'route' => $route,
                'url' => $url,
                'status' => $r['status'],
                'response_time_ms' => $r['time_ms'],
                'content_length' => $r['length'],
                'redirect' => $r['redirect'],
                'error' => $r['error'],
            ];

            $csvRows[] = [
                $route,
                $url,
                $r['status'],
                $r['time_ms'],
                $r['length'],
                $r['redirect'],
                $r['error'],
            ];
        }

        @mkdir(WRITEPATH . 'audit', 0775, true);

        $jsonPath = WRITEPATH . 'audit/routes_scan.json';
        $csvPath  = WRITEPATH . 'audit/routes_scan.csv';

        file_put_contents($jsonPath, json_encode([
            'generated_at' => date('c'),
            'base_url' => $baseURL,
            'concurrency' => $concurrency,
            'results' => $results,
        ], JSON_PRETTY_PRINT));

        $fp = fopen($csvPath, 'w');
        foreach ($csvRows as $row) fputcsv($fp, $row);
        fclose($fp);

        // snapshot
        $histDir = WRITEPATH . 'audit/routes_history';
        @mkdir($histDir, 0775, true);
        $snap = $histDir . '/routes_scan_' . date('Ymd_His') . '.json';
        copy($jsonPath, $snap);

        CLI::write("JSON: {$jsonPath}");
        CLI::write("CSV: {$csvPath}");
        CLI::write("SNAPSHOT: {$snap}");
    }
}
