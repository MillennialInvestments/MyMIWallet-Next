<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ControllerProfile extends SafeBaseCommand
{
    protected $group = 'Diagnostics';
    protected $name = 'controller:profile';
    protected $description = 'Profile controller boot performance.';

    public function run(array $params)
    {
        if (empty($params[0])) {
            CLI::error("Provide controller class: php spark controller:profile App\\Modules\\User\\Controllers\\DashboardController");
            return;
        }

        $controllerClass = $params[0];

        if (! class_exists($controllerClass)) {
            CLI::error("Controller not found: {$controllerClass}");
            return;
        }

        $startMemory = memory_get_usage(true);
        $start = microtime(true);

        $controller = new $controllerClass();

        $end = microtime(true);
        $endMemory = memory_get_usage(true);

        CLI::write("Boot Time: " . round(($end - $start) * 1000, 2) . " ms");
        CLI::write("Memory Used: " . round(($endMemory - $startMemory) / 1024 / 1024, 2) . " MB");
    }
}
