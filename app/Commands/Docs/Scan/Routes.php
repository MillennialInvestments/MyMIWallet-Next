<?php

namespace App\Commands\Docs\Scan;

use App\Commands\SafeBaseCommand;

class Routes extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:scan-routes';
    protected $description = 'Scan all routes and validate controllers';

    public function run(array $params)
    {
        $routes = service('routes')->getRoutes();

        $report = [];

        foreach ($routes as $route => $handler) {
            if (! is_string($handler) || ! str_contains($handler, '::')) {
                continue;
            }

            [$controller, $method] = explode('::', $handler);

            if (! class_exists($controller)) {
                $report[] = "[MISSING CONTROLLER] $controller";
                log_message('error', "[MISSING CONTROLLER] $controller");
                continue;
            }

            if (! method_exists($controller, $method)) {
                $report[] = "[MISSING METHOD] $controller::$method";
                log_message('error', "[MISSING METHOD] $controller::$method");
            }
        }

        file_put_contents(
            WRITEPATH . 'logs/route_scan.json',
            json_encode($report, JSON_PRETTY_PRINT)
        );

        echo "Route scan complete.\n";
    }
}
