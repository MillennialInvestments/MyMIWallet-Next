<?php
declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

final class RouteParityTest extends CIUnitTestCase
{
    public function testCriticalRoutesResolve(): void
    {
        $mustResolve = [
            '/',                   // Home
            'healthz',
            'Apex/Referral',
            'Corporate-Earnings',
            'Economic-Calendar',
            'Memberships',
            'Privacy-Policy',
            'Terms-Of-Service',
            'login',
            'Dashboard',
            'Wallets',             // group index
            'API/Health',
        ];

        $routes = Services::routes(true);
        $router = Services::router(null, null, $routes);

        foreach ($mustResolve as $uri) {
            $request = Services::request();
            $request->setPath($uri);
            $router->handle($uri);

            $controller = $router->controllerName();
            $method     = $router->methodName();

            $this->assertNotEmpty($controller, "No controller for {$uri}");
            $this->assertTrue(class_exists($controller), "Missing class {$controller} for {$uri}");
            $this->assertTrue(method_exists($controller, $method), "Missing method {$controller}::{$method} for {$uri}");
        }
    }
}
