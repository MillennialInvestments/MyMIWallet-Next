<?php

declare(strict_types=1);

use CodeIgniter\Router\DefinedRouteCollector;
use CodeIgniter\Commands\Utilities\Routes\FilterCollector;
use CodeIgniter\Commands\Utilities\Routes\SampleURIGenerator;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * GTM-027 / GTM-028: every state-changing route (POST, PUT, PATCH, DELETE)
 * must either pass the CSRF filter or carry a guard filter. Routes that rely
 * on a guard inside the controller (webhook signature, API key, in-method
 * admin check) are listed in tests/baseline/mutation-guard-matrix.txt with
 * the policy that protects them. A new unguarded mutation fails this test
 * until someone guards it or classifies it, so unclassified mutation
 * defaults to deny.
 *
 * @internal
 */
final class MutationRouteGuardMatrixTest extends CIUnitTestCase
{
    /** Filters that run on every request and do not authenticate anyone. */
    private const NON_GUARD_FILTERS = [
        'maintenance', 'botBlocker', 'requestLifecycle', 'observability', 'ratelimit',
        'throttle', 'sessionRevoked', 'twofactor', 'pagecache', 'noStore',
        'securityHeaders', 'sessionTracker', 'jsonException', 'toolbar', 'responsecache',
    ];

    private const BASELINE = ROOTPATH . 'tests/baseline/mutation-guard-matrix.txt';

    public function testEveryUnguardedMutationRouteIsClassified(): void
    {
        $unguarded = $this->unguardedMutations();
        $baseline = $this->baseline();

        $unclassified = array_values(array_diff(array_keys($unguarded), array_keys($baseline)));
        sort($unclassified);

        $this->assertSame(
            [],
            $unclassified,
            "These state-changing routes have no CSRF and no guard filter. Add a filter,\n"
            . "or list them in tests/baseline/mutation-guard-matrix.txt with the policy that guards them:\n  "
            . implode("\n  ", $unclassified)
        );
    }

    public function testBaselineHasNoStaleOrUnexplainedEntries(): void
    {
        $unguarded = $this->unguardedMutations();
        $baseline = $this->baseline();

        $stale = array_values(array_diff(array_keys($baseline), array_keys($unguarded)));
        $this->assertSame([], $stale, "Remove these lines from the baseline, they are now guarded or gone:\n  " . implode("\n  ", $stale));

        foreach ($baseline as $route => $reason) {
            $this->assertNotSame('', $reason, "Baseline entry '{$route}' needs a policy after '#'.");
        }
    }

    public function testSensitiveRoutesCarryGuardFilters(): void
    {
        $this->assertContains('permission', $this->filtersFor('GET', 'ops/health'));
        $this->assertContains('permission', $this->filtersFor('GET', 'API/Ops/health-score'));
        $this->assertContains('login', $this->filtersFor('POST', 'API/Alerts/sign'));
        $this->assertSame([], $this->routesMatching('GET', 'API/Alerts/sign'), 'API/Alerts/sign must not accept GET.');
    }

    /**
     * @return array<string, true> "METHOD route" => true
     */
    private function unguardedMutations(): array
    {
        $out = [];
        foreach ($this->collectRoutes() as $route) {
            $method = strtoupper($route['method']);
            if (! in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                continue;
            }
            // addRedirect() routes have a plain path as handler and never run code.
            if (! is_string($route['handler']) || ! str_contains($route['handler'], '::')) {
                continue;
            }
            if (str_starts_with($route['route'], 'index.php/')) {
                continue;
            }

            $filters = $route['filters'];
            if (in_array('csrf', $filters, true)) {
                continue;
            }
            $guards = array_diff($filters, self::NON_GUARD_FILTERS);
            if ($guards !== []) {
                continue;
            }

            $out[$method . ' ' . $route['route']] = true;
        }

        return $out;
    }

    /**
     * @return list<array{method:string, route:string, handler:mixed, filters:list<string>}>
     */
    private function collectRoutes(): array
    {
        static $cache = null;
        if ($cache !== null) {
            return $cache;
        }

        $collection = service('routes')->loadRoutes();
        $uriGenerator = new SampleURIGenerator();
        $filterCollector = new FilterCollector();
        $cache = [];

        foreach ((new DefinedRouteCollector($collection))->collect() as $route) {
            $filters = $filterCollector->get($route['method'], $uriGenerator->get($route['route']));
            $cache[] = [
                'method' => $route['method'],
                'route' => $route['route'],
                'handler' => $route['handler'],
                'filters' => array_map(static fn ($f) => explode(':', class_basename($f))[0], $filters['before']),
            ];
        }

        return $cache;
    }

    /** @return list<string> */
    private function filtersFor(string $method, string $path): array
    {
        $matches = $this->routesMatching($method, $path);
        $this->assertNotSame([], $matches, "Route {$method} {$path} is not defined.");

        return array_merge(...array_map(static fn ($r) => $r['filters'], $matches));
    }

    private function routesMatching(string $method, string $path): array
    {
        return array_values(array_filter(
            $this->collectRoutes(),
            static fn ($r) => strcasecmp($r['method'], $method) === 0 && $r['route'] === $path
        ));
    }

    /**
     * @return array<string, string> "METHOD route" => policy
     */
    private function baseline(): array
    {
        $out = [];
        foreach (file(self::BASELINE, FILE_IGNORE_NEW_LINES) ?: [] as $line) {
            $line = trim($line);
            if ($line === '' || str_starts_with($line, '#')) {
                continue;
            }
            [$route, $reason] = array_pad(explode('#', $line, 2), 2, '');
            $out[trim($route)] = trim($reason);
        }

        return $out;
    }
}
