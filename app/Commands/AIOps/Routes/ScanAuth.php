<?php

namespace App\Commands\AIOps\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\MultiCurl;

class ScanAuth extends SafeBaseCommand
{
    protected $group = 'AIOps - Routes';
    protected $name = 'aiops:routes:scan_auth';
    protected $description = 'Authenticated scan using AIOPS_AUTH_COOKIE';

    public function run(array $params)
    {
        $cookie = env('AIOPS_AUTH_COOKIE');
        if (!$cookie) {
            CLI::error('AIOPS_AUTH_COOKIE not set. Example: export AIOPS_AUTH_COOKIE="ci_session=...;"');
            return;
        }

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

        $urls = [];
        foreach ($routes as $r) {
            if (str_contains($r, '(:')) continue;
            $r = '/' . ltrim($r, '/');
            $urls[] = $baseURL . $r;
        }

        $urls = array_values(array_unique($urls));
        sort($urls);

        CLI::write('Total routes: ' . count($urls));
        CLI::write('Concurrency: ' . $concurrency);

        $mc = new MultiCurl();
        $raw = $mc->run($urls, [
            'concurrency' => $concurrency,
            'timeout' => 15,
            'connect_timeout' => 10,
            'cookie' => $cookie,
        ]);

        $results = [];
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
        }

        @mkdir(WRITEPATH . 'audit', 0775, true);

        $jsonPath = WRITEPATH . 'audit/routes_scan_auth.json';
        file_put_contents($jsonPath, json_encode([
            'generated_at' => date('c'),
            'base_url' => $baseURL,
            'concurrency' => $concurrency,
            'results' => $results,
        ], JSON_PRETTY_PRINT));

        CLI::write("JSON: {$jsonPath}");
    }
}
