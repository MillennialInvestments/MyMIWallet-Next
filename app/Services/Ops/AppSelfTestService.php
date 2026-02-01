<?php

declare(strict_types=1);

namespace App\Services\Ops;

use CodeIgniter\Router\RouteCollection;
use Config\Services;
use Throwable;

class AppSelfTestService
{
    /**
     * @param list<class-string> $controllers
     * @param list<string> $services
     * @return array{
     *   checks: list<array<string, mixed>>,
     *   warnings: list<string>,
     *   failures: list<string>
     * }
     */
    public function run(array $controllers, array $services): array
    {
        $warnings = [];
        $failures = [];
        $checks = [];

        $routes = $this->loadRoutes();
        if ($routes === null) {
            $failures[] = 'Route collection failed to load.';
            $checks[] = ['name' => 'routes', 'status' => 'fail'];
        } else {
            $checks[] = ['name' => 'routes', 'status' => 'pass', 'count' => count($routes->getRoutes())];
        }

        foreach ($controllers as $controller) {
            try {
                if (! class_exists($controller)) {
                    $warnings[] = sprintf('Controller missing: %s', $controller);
                    $checks[] = ['name' => $controller, 'status' => 'warn'];
                    continue;
                }

                new $controller();
                $checks[] = ['name' => $controller, 'status' => 'pass'];
            } catch (Throwable $e) {
                $failures[] = sprintf('Controller init failed: %s', $controller);
                $checks[] = ['name' => $controller, 'status' => 'fail'];
            }
        }

        foreach ($services as $serviceName) {
            try {
                service($serviceName);
                $checks[] = ['name' => sprintf('service:%s', $serviceName), 'status' => 'pass'];
            } catch (Throwable $e) {
                $failures[] = sprintf('Service resolution failed: %s', $serviceName);
                $checks[] = ['name' => sprintf('service:%s', $serviceName), 'status' => 'fail'];
            }
        }

        return [
            'checks' => $checks,
            'warnings' => $warnings,
            'failures' => $failures,
        ];
    }

    private function loadRoutes(): ?RouteCollection
    {
        try {
            return Services::routes();
        } catch (Throwable $e) {
            return null;
        }
    }
}
