<?php

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

class Audit extends SafeBaseCommand
{
    protected $group       = 'Diagnostics';
    protected $name        = 'route:audit';
    protected $description = 'Audit routes for duplicates, lowercase methods, and invalid controllers.';

    public function run(array $params)
    {
        $routes = Services::routes();
        $routes->loadRoutes();

        $collection = $routes->getRoutes();

        $uriMap = [];
        $errors = [];

        foreach ($collection as $uri => $route) {

            foreach ($route as $method => $handler) {

                $methodUpper = strtoupper($method);

                // Detect lowercase HTTP method
                if ($method !== $methodUpper) {
                    $errors[] = "Lowercase HTTP method detected: {$method} for URI {$uri}";
                }

                $key = "{$methodUpper}::{$uri}";

                if (isset($uriMap[$key])) {
                    $errors[] = "Duplicate route detected: {$methodUpper} {$uri}";
                }

                $uriMap[$key] = true;

                // Validate controller
                if (is_string($handler) && str_contains($handler, '::')) {

                    [$controller, $methodName] = explode('::', $handler);

                    if (! class_exists($controller)) {
                        $errors[] = "Missing controller: {$controller}";
                        continue;
                    }

                    if (! method_exists($controller, $methodName)) {
                        $errors[] = "Missing method {$methodName} in {$controller}";
                    }
                }
            }
        }

        if (empty($errors)) {
            CLI::write("✔ No route issues detected.", 'green');
        } else {
            CLI::write("Route Audit Issues:", 'red');
            foreach ($errors as $error) {
                CLI::write("- {$error}", 'yellow');
            }
        }
    }
}
