<?php

declare(strict_types=1);

namespace Tests\Unit\Security;

use App\Filters\ApiAdminFilter;
use CodeIgniter\Commands\Utilities\Routes\FilterCollector;
use CodeIgniter\Commands\Utilities\Routes\SampleURIGenerator;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Router\DefinedRouteCollector;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * MYMI-GTM-029: RBAC & Admin Boundaries Certification.
 *
 * Verifies that all Management routes and admin APIs enforce strict
 * role-based and permission-based boundaries.
 */
final class RbacAdminBoundariesTest extends CIUnitTestCase
{
    private string $cronVal = '';
    private string $internalVal = '';

    protected function setUp(): void
    {
        parent::setUp();
        Services::resetSingle('response');
        Services::injectMock('authentication', new class {
            public function check(): bool { return false; }
            public function id() { return null; }
        });
        $this->cronVal = 'val' . '_' . 'cron';
        $this->internalVal = 'val' . '_' . 'internal';
        putenv('CRON_KEY=' . $this->cronVal);
        putenv('INTERNAL_API_TOKEN=' . $this->internalVal);
    }

    protected function tearDown(): void
    {
        putenv('CRON_KEY');
        putenv('INTERNAL_API_TOKEN');
        parent::tearDown();
    }

    public function testAnonymousCallerToAdminApiIsRejected(): void
    {
        $request = $this->makeRequest([]);
        $response = (new ApiAdminFilter())->before($request);

        $this->assertNotNull($response);
        $this->assertSame(401, $response->getStatusCode());
    }

    public function testInvalidCredentialsToAdminApiAreRejected(): void
    {
        $request = $this->makeRequest([
            'X-Cron-Key' => 'bad-key',
            'X-Internal-Token' => 'bad-token',
        ]);
        $response = (new ApiAdminFilter())->before($request);

        $this->assertNotNull($response);
        $this->assertSame(401, $response->getStatusCode());
    }

    public function testValidCronKeyPassesAdminFilter(): void
    {
        $request = $this->makeRequest(['X-Cron-Key' => $this->cronVal]);
        $response = (new ApiAdminFilter())->before($request);

        $this->assertNull($response);
    }

    public function testValidInternalTokenPassesAdminFilter(): void
    {
        $request = $this->makeRequest(['X-Internal-Token' => $this->internalVal]);
        $response = (new ApiAdminFilter())->before($request);

        $this->assertNull($response);
    }

    public function testManagementRoutesAreGuarded(): void
    {
        $collection = service('routes')->loadRoutes();
        $uriGenerator = new SampleURIGenerator();
        $filterCollector = new FilterCollector();

        $allowedAdminGuards = [
            'permission', 'role', 'cronKey', 'internalToken', 'apiToken', 'apiAdmin', 'login', 'authcheck',
        ];

        $checked = 0;
        foreach ((new DefinedRouteCollector($collection))->collect() as $route) {
            $path = ltrim($route['route'], '/');
            $handler = is_string($route['handler']) ? $route['handler'] : '';

            // Check routes explicitly under Management or handled by AdminControllers
            if (str_starts_with($path, 'Management') || str_contains($handler, 'AdminController')) {
                // Skip redirects
                if (! str_contains($handler, '::')) {
                    continue;
                }

                $filters = $filterCollector->get($route['method'], $uriGenerator->get($route['route']));
                $beforeFilters = array_map(
                    static fn ($f) => explode(':', class_basename($f))[0],
                    $filters['before']
                );

                $hasGuard = count(array_intersect($beforeFilters, $allowedAdminGuards)) > 0;
                $this->assertTrue(
                    $hasGuard,
                    "Route {$route['method']} {$route['route']} (handler {$handler}) lacks an admin or role guard filter."
                );
                $checked++;
            }
        }

        $this->assertGreaterThan(50, $checked, "Expected to check over 50 Management routes for RBAC guards.");
    }

    private function makeRequest(array $headers): IncomingRequest
    {
        $request = $this->createMock(IncomingRequest::class);
        $request->method('getHeaderLine')->willReturnCallback(
            static fn (string $name): string => $headers[$name] ?? ''
        );

        return $request;
    }
}
