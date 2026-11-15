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

    /**
     * GTM-016/017: test and debug auth surfaces are registered only outside
     * production, and the dead test-create-user route is gone.
     */
    public function testDebugAndShieldTestRoutesAreNotServedInProduction(): void
    {
        $routes = (string) file_get_contents(APPPATH . 'Config/Routes.php');

        $this->assertStringNotContainsString("'test-create-user'", $routes);

        foreach (["'Debug/whoami'", "'debug/register-success-probe'", "'Dev/BitcoinTest'", "'login-shield'", "'register-shield'"] as $route) {
            $pos = strpos($routes, $route);
            $this->assertNotFalse($pos, $route . ' should still exist for local use');
            $guard = strrpos(substr($routes, 0, $pos), "if (ENVIRONMENT !== 'production') {");
            $this->assertNotFalse($guard, $route . ' must sit inside a non-production guard');
            $between = substr($routes, $guard, $pos - $guard);
            $this->assertGreaterThan(substr_count($between, '}'), substr_count($between, '{'),
                $route . ' must be inside the guard block, not after it');
        }
    }

    public function testMassTestCampaignRequiresAdmin(): void
    {
        $filters = new \Config\Filters();
        $this->assertContains('API/Email/sendMassTestCampaign', $filters->filters['apiAdmin']['before']);
    }
}

