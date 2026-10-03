<?php

use CodeIgniter\Test\CIUnitTestCase;
use Config\Filters;
use Config\Services;

/**
 * REV-S001 Trade Alerts preview route regression contract.
 */
final class AlertsRoutesTest extends CIUnitTestCase
{
    public function testCanonicalAndLegacyPreviewRoutesRemainRegistered(): void
    {
        $routes = Services::routes();
        $routes->loadRoutes();
        $get = $routes->getRoutes('GET');
        $canonical = 'Alerts/Preview/([^/]+)';
        $legacy = 'Preview/Alert/([^/]+)';

        $this->assertArrayHasKey($canonical, $get, 'Canonical Trade Alerts preview route must remain registered');
        $this->assertArrayHasKey($legacy, $get, 'Legacy Trade Alerts preview route must remain registered');
        $this->assertSame($get[$legacy], $get[$canonical], 'Canonical and legacy preview routes must resolve to the same handler');
        $this->assertStringContainsString('AlertsController::preview/$1', (string) $get[$canonical]);
    }

    public function testCanonicalAndLegacyPreviewRoutesRemainPublic(): void
    {
        $filters = new Filters();
        $except = $filters->globals['before']['authcheck']['except'] ?? [];

        $this->assertContains('/Alerts/Preview/*', $except, 'Canonical Trade Alerts preview must remain public');
        $this->assertContains('/Preview/*', $except, 'Legacy Trade Alerts preview must remain public');
    }
}
