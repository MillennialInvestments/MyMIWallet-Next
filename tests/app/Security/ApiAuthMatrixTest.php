<?php

declare(strict_types=1);

use CodeIgniter\Commands\Utilities\Routes\FilterCollector;
use CodeIgniter\Commands\Utilities\Routes\SampleURIGenerator;
use CodeIgniter\Router\DefinedRouteCollector;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * API-AUTH-001: every state-changing API/* route must carry a sign-in or
 * service filter. CSRF alone does not count here: it stops cross-site
 * posts but lets any signed-out visitor call the route directly.
 *
 * Routes that check the caller inside the controller (session lookup with
 * a 401, webhook signature, service token) are listed with that policy in
 * tests/baseline/api-auth-matrix.txt. A new API mutation with no auth
 * filter fails this test until it gets a filter or a classified entry.
 *
 * @internal
 */
final class ApiAuthMatrixTest extends CIUnitTestCase
{
    /** Filters that authenticate the caller (user session, admin, or service token). */
    private const AUTH_FILTERS = [
        'apiUser', 'apiAdmin', 'apiToken', 'cronKey', 'internalToken', 'login', 'authcheck',
        'auth', 'permission', 'role', 'marketingZapierIngress', 'AuthCheckFilter',
        'ApiAdminFilter', 'ApiTokenAuthFilter', 'CronKeyFilter', 'InternalTokenFilter',
        'LoginFilter', 'AuthFilter', 'PermissionFilter', 'RoleFilter', 'MarketingZapierIngressFilter',
    ];

    private const BASELINE = ROOTPATH . 'tests/baseline/api-auth-matrix.txt';

    public function testEveryApiMutationWithoutAuthFilterIsClassified(): void
    {
        $open = array_keys($this->openApiMutations());
        $unclassified = array_values(array_diff($open, array_keys($this->baseline())));
        sort($unclassified);

        $this->assertSame(
            [],
            $unclassified,
            "These API routes change data and have no sign-in or service filter. Add one,\n"
            . "or list them in tests/baseline/api-auth-matrix.txt with the policy that guards them:\n  "
            . implode("\n  ", $unclassified)
        );
    }

    public function testBaselineHasNoStaleOrUnexplainedEntries(): void
    {
        $open = $this->openApiMutations();
        $baseline = $this->baseline();

        $stale = array_values(array_diff(array_keys($baseline), array_keys($open)));
        $this->assertSame([], $stale, "Remove these lines from the baseline, they now have a filter or are gone:\n  " . implode("\n  ", $stale));

        foreach ($baseline as $route => $reason) {
            $this->assertNotSame('', $reason, "Baseline entry '{$route}' needs a policy after '#'.");
        }
    }

    public function testSolanaMoneyActionsNeedSignInAndSwitch(): void
    {
        foreach (['API/Solana/transfer', 'API/Solana/swap/execute', 'API/Solana/token/create', 'API/Solana/token/mint'] as $path) {
            $filters = $this->filtersFor('POST', $path);
            $this->assertContains('apiUser', $filters, "{$path} must require sign-in.");
            $this->assertContains('feature', $filters, "{$path} must sit behind FEATURE_SOLANA_TRADING.");
            $this->assertContains('csrf', $filters, "{$path} must keep CSRF.");
        }
        foreach (['API/Solana/swap/quote', 'API/Solana/swap/preview', 'API/Solana/transaction/preview'] as $path) {
            $this->assertContains('apiUser', $this->filtersFor('POST', $path), "{$path} must require sign-in.");
        }
    }

    public function testJobTriggersAreAdminOnly(): void
    {
        foreach ([
            'API/Solana/updatePrices', 'API/Solana/updateTokens',
            'API/Marketing/rankBufferPostsDaily', 'API/Marketing/triggerPostAutogenOnEmpty',
            'API/Marketing/fetchFinalizedSummariesBlock',
        ] as $path) {
            $this->assertContains('apiAdmin', $this->filtersFor('GET', $path), "{$path} must be admin or service only.");
        }
    }

    /** @return array<string, true> */
    private function openApiMutations(): array
    {
        $out = [];
        foreach ($this->collectRoutes() as $route) {
            $method = strtoupper($route['method']);
            if (! in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                continue;
            }
            if (stripos($route['route'], 'API/') !== 0) {
                continue;
            }
            if (! is_string($route['handler']) || ! str_contains($route['handler'], '::')) {
                continue;
            }
            if (array_intersect($route['filters'], self::AUTH_FILTERS) !== []) {
                continue;
            }
            $out[$method . ' ' . $route['route']] = true;
        }

        return $out;
    }

    /** @return list<array{method:string, route:string, handler:mixed, filters:list<string>}> */
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
        $matches = array_values(array_filter(
            $this->collectRoutes(),
            static fn ($r) => strcasecmp($r['method'], $method) === 0 && $r['route'] === $path
        ));
        $this->assertNotSame([], $matches, "Route {$method} {$path} is not defined.");

        return array_merge(...array_map(static fn ($r) => $r['filters'], $matches));
    }

    /** @return array<string, string> */
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
