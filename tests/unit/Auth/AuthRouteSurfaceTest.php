<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

final class AuthRouteSurfaceTest extends CIUnitTestCase
{
    public function testAuthRoutesPointToActiveAuthController(): void
    {
        $routes = file_get_contents(APPPATH . 'Config/Routes.php');
        $this->assertIsString($routes);

        $this->assertStringContainsString('$routes->get(\'login\', \'AuthController::login\'', $routes);
        $this->assertStringContainsString('$routes->post(\'login\', \'AuthController::attemptLogin\'', $routes);
        $this->assertStringContainsString('$routes->get(\'index.php/login\', \'AuthController::login\'', $routes);
        $this->assertStringContainsString('$routes->post(\'index.php/login\', \'AuthController::attemptLogin\'', $routes);
        $this->assertStringContainsString('$routes->post(\'register\', \'AuthController::attemptRegister\'', $routes);
        $this->assertStringNotContainsString('App\\Legacy\\Auth\\Controllers\\AuthController', $routes);
    }
}
