<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * Dashboard console errors (2026-11-15): members without premium access got
 * 403s from the forecast analytics calls, and every member saw the admin
 * Ops Health card (which also 404'd). The view now gates both.
 *
 * @internal
 */
final class DashboardOpsAndPremiumGatingTest extends CIUnitTestCase
{
    private string $view;
    private string $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->view = (string) file_get_contents(APPPATH . 'Modules/User/Views/Dashboard/index.php');
        $this->controller = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/DashboardController.php');
    }

    public function testOpsCardsRenderOnlyForAdmins(): void
    {
        $this->assertStringContainsString("<?php if (! empty(\$showOpsHealth)): // admin-only operational cards ?>", $this->view);
        $this->assertLessThan(
            strpos($this->view, 'data-ops-health>'),
            strpos($this->view, '$showOpsHealth)): // admin-only'),
            'The Ops Health card must sit inside the admin-only block.'
        );
        $this->assertStringContainsString("has_permission('admin.access')", $this->controller);
        $this->assertStringContainsString("\$this->data['showOpsHealth']", $this->controller);
    }

    public function testPremiumForecastCallsAreGated(): void
    {
        $this->assertStringContainsString("premium_feature_enabled('investments.analytics'", $this->controller);
        $this->assertStringContainsString("if (<?= \$forecastAnalyticsAllowed ? 'true' : 'false' ?>) {", $this->view);
        $this->assertStringContainsString('<?php if ($showConfidenceHeatmap && $forecastAnalyticsAllowed): ?>', $this->view);
        $this->assertSame(2, substr_count($this->view, '$showConfidenceHeatmap && $forecastAnalyticsAllowed'));
    }

    public function testHighlightWidgetsHaveUniqueIds(): void
    {
        $this->assertSame(1, substr_count($this->view, 'id="forecastHighlights"'));
        $this->assertSame(1, substr_count($this->view, 'id="forecastHighlightsCompact"'));
    }
}
