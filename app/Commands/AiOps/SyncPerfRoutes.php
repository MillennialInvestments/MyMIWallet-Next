<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SyncPerfRoutes extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:sync-perf';
    protected $description = 'Scan Routes.php and sync perf_urls.txt automatically';

    public function run(array $params)
    {
        $routesFile = APPPATH . 'Config/Routes.php';
        $perfFile   = ROOTPATH . 'perf_urls.txt';

        if (!file_exists($routesFile)) {
            CLI::error('Routes.php not found.');
            return;
        }

        $content = file_get_contents($routesFile);

        preg_match_all('/\$routes->(get|post|add|match)\([\'"]([^\'"]+)[\'"]/', $content, $matches);

        $routes = $matches[2] ?? [];

        $cleaned = [];

        foreach ($routes as $route) {

            if (str_contains($route, '(:')) {
                continue; // skip dynamic placeholders
            }

            if (!str_starts_with($route, '/')) {
                $route = '/' . ltrim($route, '/');
            }

            $cleaned[] = $route;
        }

        $cleaned = array_unique($cleaned);
        sort($cleaned);

        file_put_contents($perfFile, implode("\n", $cleaned));

        CLI::write('perf_urls.txt synced.');
        CLI::write('Total routes: ' . count($cleaned));
    }
}
