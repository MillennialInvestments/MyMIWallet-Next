<?php

declare(strict_types=1);

namespace App\Services;

use Config\Filters as FiltersConfig;
use Config\Services;
use ReflectionClass;

class ApiGovernanceService
{
    public function scan(?string $runUuid = null): array
    {
        $runUuid ??= bin2hex(random_bytes(8));
        $ts = date('c');
        $env = (string) (ENVIRONMENT ?? 'unknown');

        $routes = Services::routes();
        $routes->loadRoutes();
        $options = $routes->getRoutesOptions();

        $filtersConfig = new FiltersConfig();
        $globalBefore = array_keys($filtersConfig->globals['before'] ?? []);

        $rows = [];
        $bySignature = [];
        foreach (['get', 'post', 'put', 'delete', 'patch', 'options', 'head'] as $verb) {
            $map = $routes->getRoutes($verb);
            foreach ($map as $uri => $handler) {
                $handlerString = is_string($handler) ? $handler : '';
                [$controller, $method] = $this->splitHandler($handlerString);
                $routeKey = $verb . ' ' . $uri;
                $routeOpt = $options[$uri] ?? $options[$routeKey] ?? [];
                $routeFilters = $this->normalizeFilters($routeOpt['filter'] ?? []);
                $effectiveFilters = array_values(array_unique(array_merge($globalBefore, $routeFilters)));
                $version = $this->detectVersion($uri);
                $isApi = str_starts_with(trim($uri, '/'), 'API');
                $signature = strtoupper($verb) . '|' . $uri . '|' . $controller . '::' . $method;

                $row = [
                    'uri' => $uri,
                    'http_methods' => strtoupper($verb),
                    'controller' => $controller,
                    'action' => $method,
                    'module' => $this->moduleFromController($controller),
                    'is_api' => $isApi ? 1 : 0,
                    'version' => $version,
                    'filters' => $effectiveFilters,
                    'auth_required' => $this->isAuthRequired($effectiveFilters),
                    'has_rate_limit' => in_array('ratelimit', $effectiveFilters, true),
                    'is_cron_like' => $this->isCronLike($uri, $controller, $method),
                    'handler_missing' => $this->isHandlerMissing($controller, $method),
                    'severity' => 'LOW',
                    'findings' => [],
                ];

                if ($row['handler_missing']) {
                    $row['severity'] = 'CRITICAL';
                    $row['findings'][] = 'Route points to missing controller or method.';
                }

                if ($isApi && ! $row['auth_required'] && ! $this->isPublicHealthEndpoint($uri)) {
                    $row['severity'] = $this->maxSeverity($row['severity'], 'HIGH');
                    $row['findings'][] = 'API route lacks explicit auth/permission/internal token filter.';
                }

                if ($row['is_cron_like'] && ! in_array('internalToken', $effectiveFilters, true)) {
                    $row['severity'] = $this->maxSeverity($row['severity'], 'CRITICAL');
                    $row['findings'][] = 'Cron-like endpoint missing internalToken filter.';
                }

                if ($isApi && $version === 'none' && ! $this->isPublicHealthEndpoint($uri)) {
                    $row['severity'] = $this->maxSeverity($row['severity'], 'MED');
                    $row['findings'][] = 'Endpoint missing /API/vN version namespace.';
                }

                if ($isApi && ! $row['has_rate_limit']) {
                    $row['severity'] = $this->maxSeverity($row['severity'], 'MED');
                    $row['findings'][] = 'No rate-limit filter discovered in effective chain.';
                }

                $rows[] = $row;
                $bySignature[$signature] = true;
            }
        }

        $controllerMethods = $this->discoverControllerMethods();
        $unrouted = [];
        foreach ($controllerMethods as $cm) {
            $sig = strtoupper($cm['http_guess']) . '|' . $cm['uri_guess'] . '|' . $cm['controller'] . '::' . $cm['action'];
            if (! isset($bySignature[$sig])) {
                $unrouted[] = $cm;
            }
        }

        return [
            'metadata' => [
                'timestamp' => $ts,
                'run_uuid' => $runUuid,
                'environment' => $env,
                'summary' => $this->summary($rows),
            ],
            'routes' => $rows,
            'controllers' => $controllerMethods,
            'unrouted_public_methods' => $unrouted,
            'remediations' => $this->buildRemediations($rows),
        ];
    }

    private function splitHandler(string $handler): array
    {
        if (! str_contains($handler, '::')) {
            return ['', ''];
        }
        return explode('::', $handler, 2);
    }

    private function normalizeFilters($filters): array
    {
        if (is_string($filters)) {
            $filters = [$filters];
        }
        $out = [];
        foreach ((array) $filters as $f) {
            $out[] = strtolower(trim((string) explode(':', (string) $f)[0]));
        }
        return array_values(array_filter($out));
    }

    private function detectVersion(string $uri): string
    {
        if (preg_match('#^/?API/(v\d+)#i', $uri, $m) === 1) {
            return strtolower($m[1]);
        }
        if (preg_match('#^/?API/internal#i', $uri) === 1) {
            return 'internal';
        }
        return 'none';
    }

    private function moduleFromController(string $controller): string
    {
        if (str_contains($controller, '\\Modules\\')) {
            $parts = explode('\\', $controller);
            $idx = array_search('Modules', $parts, true);
            return $parts[$idx + 1] ?? 'Unknown';
        }
        return 'Core';
    }

    private function isAuthRequired(array $filters): bool
    {
        foreach (['auth', 'login', 'permission', 'apitoken', 'internaltoken'] as $f) {
            if (in_array($f, $filters, true)) {
                return true;
            }
        }
        return false;
    }

    private function isCronLike(string $uri, string $controller, string $method): bool
    {
        $hay = strtolower($uri . ' ' . $controller . '::' . $method);
        foreach (['cron', 'dispatch', 'worker', 'manual-run', 'ingest', 'export'] as $k) {
            if (str_contains($hay, $k)) {
                return true;
            }
        }
        return false;
    }

    private function isPublicHealthEndpoint(string $uri): bool
    {
        $u = strtolower(trim($uri, '/'));
        return in_array($u, ['health', 'healthz', 'api/health', 'api/status'], true) || str_contains($u, 'health');
    }

    private function isHandlerMissing(string $controller, string $method): bool
    {
        if ($controller === '' || $method === '') {
            return false;
        }
        return ! class_exists($controller) || ! method_exists($controller, $method);
    }

    private function maxSeverity(string $a, string $b): string
    {
        $score = ['LOW' => 1, 'MED' => 2, 'HIGH' => 3, 'CRITICAL' => 4];
        return ($score[$a] ?? 0) >= ($score[$b] ?? 0) ? $a : $b;
    }

    private function summary(array $rows): array
    {
        $summary = ['total' => count($rows), 'critical' => 0, 'high' => 0, 'med' => 0, 'low' => 0];
        foreach ($rows as $r) {
            $s = strtolower($r['severity']);
            if (isset($summary[$s])) {
                $summary[$s]++;
            }
        }
        return $summary;
    }

    private function discoverControllerMethods(): array
    {
        $files = [];
        foreach ([APPPATH . 'Controllers', APPPATH . 'Modules'] as $root) {
            if (! is_dir($root)) {
                continue;
            }
            $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));
            foreach ($it as $file) {
                if ($file->isFile() && strtolower($file->getExtension()) === 'php' && str_contains($file->getPathname(), 'Controllers')) {
                    $files[] = $file->getPathname();
                }
            }
        }
        $out = [];
        foreach ($files as $file) {
            $class = $this->fqcnFromFile($file);
            if ($class === '') {
                continue;
            }
            $src = (string) file_get_contents($file);
            if (preg_match_all('/public\s+function\s+([a-zA-Z0-9_]+)\s*\(/', $src, $matches) !== 1) {
                continue;
            }
            foreach ($matches[1] as $name) {
                if ($name === '__construct' || str_starts_with($name, '__')) {
                    continue;
                }
                $out[] = [
                    'controller' => $class,
                    'action' => $name,
                    'http_guess' => 'GET',
                    'uri_guess' => trim(str_replace('App\\Controllers\\', '', $class), '\\') . '/' . $name,
                ];
            }
        }

        return $out;
    }

    private function fqcnFromFile(string $file): string
    {
        $src = (string) file_get_contents($file);
        preg_match('/namespace\\s+([^;]+);/', $src, $ns);
        preg_match('/class\\s+([a-zA-Z0-9_]+)/', $src, $cl);
        if (! isset($ns[1], $cl[1])) {
            return '';
        }
        return trim($ns[1]) . '\\' . trim($cl[1]);
    }

    private function buildRemediations(array $rows): array
    {
        $items = [];
        foreach ($rows as $r) {
            foreach ($r['findings'] as $finding) {
                $items[] = [
                    'severity' => $r['severity'],
                    'endpoint' => $r['http_methods'] . ' ' . $r['uri'],
                    'remediation' => $finding,
                ];
            }
        }
        return $items;
    }
}
