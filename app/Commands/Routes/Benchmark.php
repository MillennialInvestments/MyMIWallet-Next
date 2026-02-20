<?php

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class Benchmark extends SafeBaseCommand
{
    protected $group = 'Diagnostics';
    protected $name = 'route:benchmark';
    protected $description = 'Benchmark route loading performance.';

    public function run(array $params)
    {
        $startMemory = memory_get_usage(true);
        $start = microtime(true);

        $routes = Services::routes();
        $routes->loadRoutes();

        $end = microtime(true);
        $endMemory = memory_get_usage(true);

        CLI::write("Route Load Time: " . round(($end - $start) * 1000, 2) . " ms");
        CLI::write("Memory Used: " . round(($endMemory - $startMemory) / 1024 / 1024, 2) . " MB");
    }
}
