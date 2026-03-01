<?php

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class Debug extends SafeBaseCommand
{
    protected $group       = 'Diagnostics';
    protected $name        = 'routes:debug';
    protected $description = 'Resolve a route and verify controller, method, and HTTP method coverage.';

    public function run(array $params)
    {
        $this->beginSparkTrace();

        try {
            $target = $params[0] ?? '';
            if ($target === '') {
                CLI::error('Usage: php spark debug:route <uri>');
                return;
            }

            $routes = Services::routes();
        $routes->loadRoutes();

        $collection = $routes->getRoutes();
        $matches = [];

        foreach ($collection as $uri => $route) {
            if (strcasecmp(trim((string) $uri, '/'), trim($target, '/')) !== 0) {
                continue;
            }

            foreach ($route as $method => $handler) {
                $matches[] = [strtoupper((string) $method), $handler];
            }
        }

        if ($matches === []) {
            CLI::error('No route definitions matched: ' . $target);
            return;
        }

            foreach ($matches as [$method, $handler]) {
            CLI::write($method . ' => ' . (is_string($handler) ? $handler : json_encode($handler)), 'yellow');

            if (! is_string($handler) || ! str_contains($handler, '::')) {
                CLI::write('  - Handler is not controller::method format; skipping method check.', 'red');
                continue;
            }

            [$controller, $methodName] = explode('::', $handler, 2);
            $controllerExists = class_exists($controller);
            $methodExists = $controllerExists ? method_exists($controller, $methodName) : false;

            CLI::write('  - Controller exists: ' . ($controllerExists ? 'YES' : 'NO'), $controllerExists ? 'green' : 'red');
            CLI::write('  - Method exists: ' . ($methodExists ? 'YES' : 'NO'), $methodExists ? 'green' : 'red');
                CLI::write('  - HTTP method allowed: ' . $method, 'green');
            }
        } finally {
            $this->finishSparkTrace();
        }
    }
}
