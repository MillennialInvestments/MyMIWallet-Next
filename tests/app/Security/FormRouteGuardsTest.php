<?php

declare(strict_types=1);

use CodeIgniter\Test\CIUnitTestCase;

/**
 * Form routes wired up in #717 that change shared data must keep their guard.
 *
 * @internal
 */
final class FormRouteGuardsTest extends CIUnitTestCase
{
    /** @return list<string> */
    private function filtersFor(string $path): array
    {
        $routes = service('routes');
        $routes->loadRoutes();
        $filters = $routes->getFiltersForRoute($path, 'POST');

        return array_map('strval', (array) $filters);
    }

    public function testEarningsUpdateIsAdminOnly(): void
    {
        foreach (['earnings/update', 'Blog/Earnings/update'] as $path) {
            $this->assertContains('role:admin,team', $this->filtersFor($path), "{$path} must be admin/team only");
        }
    }

    public function testProjectRevenueRequiresOwnership(): void
    {
        $src = (string) file_get_contents(APPPATH . 'Modules/User/Controllers/ProjectsController.php');
        $start = strpos($src, 'function reportRevenue');
        $body = substr($src, $start, (int) strpos($src, 'function ensurePost') - $start);
        $this->assertStringContainsString("'created_by' => \$userId", $body, 'reportRevenue must check the project belongs to the user');
        $this->assertLessThan(strpos($body, 'bf_projects_fund_distributions\')->insert'), strpos($body, 'created_by'));
    }
}
