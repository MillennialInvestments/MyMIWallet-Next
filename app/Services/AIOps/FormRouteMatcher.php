<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use CodeIgniter\Router\DefinedRouteCollector;

/**
 * GT-FORM-HARNESS-001: maps a form action + HTTP method to a defined CI4 route.
 *
 * Route keys from RouteCollection already have placeholders replaced by regex
 * (for example "Wallets/Edit/([0-9]+)"), so matching uses the same anchored,
 * case-sensitive regex the CI4 router uses. The old service used a substring
 * check that matched almost anything.
 */
final class FormRouteMatcher
{
    /** Route filters that need a service credential a browser session does not have. */
    public const TOKEN_FILTERS = ['apiToken', 'cronKey'];

    /** @var list<array{method:string, route:string, handler:string, filters:list<string>}> */
    private array $routes;

    /**
     * @param list<array{method:string, route:string, handler:mixed}>|null $routes
     *        Inject for tests; null loads the application's defined routes.
     */
    public function __construct(?array $routes = null)
    {
        $this->routes = array_map(static fn (array $r) => [
            'method'  => strtoupper((string) $r['method']),
            'route'   => (string) $r['route'],
            'handler' => is_string($r['handler'] ?? null) ? $r['handler'] : '(Closure)',
            'filters' => array_values(array_map(static fn ($f) => explode(':', (string) $f, 2)[0], (array) ($r['filters'] ?? []))),
        ], $routes ?? self::loadDefinedRoutes());
    }

    /** @return list<array{method:string, route:string, handler:mixed}> */
    public static function loadDefinedRoutes(): array
    {
        $collection = service('routes')->loadRoutes();
        $out = [];
        foreach ((new DefinedRouteCollector($collection))->collect() as $route) {
            $filters = [];
            try {
                $filters = $collection->getFiltersForRoute($route['route'], $route['method']);
            } catch (\Throwable) {
                // older framework or odd route key: no filter data
            }
            $out[] = ['method' => $route['method'], 'route' => $route['route'], 'handler' => $route['handler'], 'filters' => $filters];
        }

        return $out;
    }

    public function count(): int
    {
        return count($this->routes);
    }

    /**
     * @param string $path   Action path, already resolved (leading slash, no host/query).
     * @param string $method Form method; "ANY" matches every verb (used for JS calls
     *                       whose method could not be read from source).
     *
     * @return array{matched:bool, status:string, route:?string, handler:?string, controller:?string, verbs:list<string>, note:?string}
     */
    public function match(string $path, string $method): array
    {
        $method = strtoupper($method === '' ? 'GET' : $method);
        $uri    = trim($path, '/');

        $exact = [];
        $caseOnly = [];
        foreach ($this->routes as $r) {
            $key = trim($r['route'], '/');
            if ($key === '' && $uri === '') {
                $hit = true;
            } else {
                $pattern = '#\A' . str_replace('#', '\#', $key) . '\z#u';
                $hit = @preg_match($pattern, $uri) === 1;
                if (! $hit && @preg_match($pattern . 'i', $uri) === 1) {
                    $caseOnly[] = $r;
                    continue;
                }
            }
            if ($hit) {
                $exact[] = $r;
            }
        }

        $verbs = array_values(array_unique(array_map(static fn ($r) => $r['method'], $exact)));
        sort($verbs);

        $chosen = null;
        foreach ($exact as $r) {
            if ($method === 'ANY' || $r['method'] === $method || $r['method'] === '*') {
                $chosen = $r;
                break;
            }
        }

        if ($chosen !== null) {
            if (! self::handlerExists($chosen['handler'])) {
                return $this->result(false, 'handler_missing', $chosen, $verbs,
                    'Route exists but its controller method does not: ' . $chosen['handler']);
            }

            return $this->result(true, 'matched', $chosen, $verbs, null);
        }

        if ($exact !== []) {
            return $this->result(false, 'verb_mismatch', $exact[0], $verbs,
                sprintf('Route exists for %s but the form uses %s.', implode('/', $verbs), $method));
        }

        if ($caseOnly !== []) {
            return $this->result(false, 'case_mismatch', $caseOnly[0], [],
                'Only a case-insensitive match exists; the CI4 router is case-sensitive and would 404.');
        }

        return $this->result(false, 'no_route', null, [], 'No defined route matches /' . $uri);
    }

    /** Closures and views count as existing; "Class::method/$1" must resolve. */
    public static function handlerExists(string $handler): bool
    {
        if (! str_contains($handler, '::')) {
            return true;
        }
        [$class, $method] = explode('::', $handler, 2);
        $class  = ltrim($class, '\\');
        $method = (string) preg_replace('#/.*$#', '', $method);

        return class_exists($class) && (method_exists($class, $method) || method_exists($class, '_remap'));
    }

    private function result(bool $matched, string $status, ?array $route, array $verbs, ?string $note): array
    {
        $handler = $route['handler'] ?? null;
        $controller = null;
        if (is_string($handler) && str_contains($handler, '::')) {
            $controller = ltrim(explode('::', $handler, 2)[0], '\\');
        }

        return [
            'matched'    => $matched,
            'status'     => $status,
            'route'      => $route['route'] ?? null,
            'handler'    => $handler,
            'controller' => $controller,
            'verbs'      => $verbs,
            'filters'    => $route['filters'] ?? [],
            'note'       => $note,
        ];
    }
}
