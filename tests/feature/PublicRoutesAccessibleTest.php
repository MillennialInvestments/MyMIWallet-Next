<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\Filters;
use Config\Services;

/**
 * REV-S001 public revenue-route contract.
 *
 * This suite validates routing/filter configuration rather than rendering
 * full pages. Full page rendering depends on unrelated application tables.
 *
 * @internal
 */
final class PublicRoutesAccessibleTest extends CIUnitTestCase
{
    public function testRevenueMvpPublicRoutesRemainRegistered(): void
    {
        $routes = Services::routes();
        $routes->loadRoutes();
        $get = $routes->getRoutes('get');

        foreach ([
            '/',
            'Memberships',
            'register',
            'login',
            'Legal/Terms-And-Conditions',
            'Legal/Privacy-Policy',
            'Alerts/Preview/([^/]+)',
        ] as $route) {
            $this->assertArrayHasKey($route, $get, sprintf('GET %s must remain registered', $route));
        }
    }

    public function testRevenueMvpPublicRoutesBypassGlobalAuthcheck(): void
    {
        $filters = new Filters();
        $except = $filters->globals['before']['authcheck']['except'] ?? [];

        foreach ([
            'login',
            'register',
            '/Memberships',
            '/Legal/Terms-And-Conditions',
            '/Legal/Privacy-Policy',
            '/Alerts/Preview/*',
        ] as $publicPattern) {
            $this->assertContains(
                $publicPattern,
                $except,
                sprintf('%s must remain exempt from global authcheck', $publicPattern)
            );
        }
    }
}
