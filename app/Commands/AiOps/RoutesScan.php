<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RoutesScan extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:routes:scan';
    protected $description = 'Scan Routes.php, curl each route, generate CSV + JSON report';

    public function run(array $params)
    {
        $routesFile = APPPATH . 'Config/Routes.php';

        if (!file_exists($routesFile)) {
            CLI::error('Routes.php not found.');
            return;
        }

        $baseURL = rtrim(env('app.baseURL'), '/');
        if (!$baseURL) {
            CLI::error('app.baseURL not set.');
            return;
        }

        $routesContent = file_get_contents($routesFile);

        preg_match_all(
            '/\$routes->get\(\s*[\'"]([^\'"]+)[\'"]\s*,/',
            $routesContent,
            $matches
        );

        $routes = $matches[1] ?? [];

        if (empty($routes)) {
            CLI::write('No GET routes found.');
            return;
        }

        $results = [];
        $csvRows = [];

        $csvRows[] = [
            'Route',
            'Full URL',
            'HTTP Status',
            'Response Time (ms)',
            'Content Length',
            'Redirect URL',
            'Curl Error'
        ];

        foreach ($routes as $route) {

            $route = '/' . ltrim($route, '/');
            $url = $baseURL . $route;

            CLI::write("Scanning: {$url}");

            $start = microtime(true);

            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_TIMEOUT => 15,
                CURLOPT_CONNECTTIMEOUT => 10,
                CURLOPT_HEADER => false,
            ]);

            $response = curl_exec($ch);
            $error = curl_error($ch);
            $info = curl_getinfo($ch);
            curl_close($ch);

            $end = microtime(true);
            $timeMs = round(($end - $start) * 1000, 2);

            $status = $info['http_code'] ?? 0;
            $length = strlen($response ?? '');
            $redirect = $info['redirect_url'] ?? '';

            $results[] = [
                'route' => $route,
                'url' => $url,
                'status' => $status,
                'response_time_ms' => $timeMs,
                'content_length' => $length,
                'redirect' => $redirect,
                'error' => $error ?: null,
            ];

            $csvRows[] = [
                $route,
                $url,
                $status,
                $timeMs,
                $length,
                $redirect,
                $error
            ];
        }

        // Write JSON
        $jsonPath = WRITEPATH . 'audit/routes_scan.json';
        @is_dir(dirname($jsonPath)) || @mkdir(dirname($jsonPath), 0775, true);
        file_put_contents($jsonPath, json_encode($results, JSON_PRETTY_PRINT));

        // Write CSV
        $csvPath = WRITEPATH . 'audit/routes_scan.csv';
        $fp = fopen($csvPath, 'w');
        foreach ($csvRows as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);

        CLI::write('');
        CLI::write("Scan complete.");
        CLI::write("JSON: {$jsonPath}");
        CLI::write("CSV: {$csvPath}");

        // Optional hard failure if critical status
        foreach ($results as $r) {
            if ($r['status'] >= 500) {
                CLI::error("Critical failure on {$r['route']} ({$r['status']})");
                exit(1);
            }
        }
    }
}
