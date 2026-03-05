<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class Docs extends SafeBaseCommand
{
    protected $group       = 'Routes';
    protected $name        = 'routes:docs';
    protected $description = 'Export active routes to Markdown + JSON under docs/routes/.';
    protected $usage       = 'routes:docs [--out=docs/routes/routes.md] [--mode=all|missing-targets|invalid-handler] [--timestamp=1]';

    public function run(array $params)
    {
        $out = $this->getOptionValue($params, '--out', 'docs/routes/routes.md');
        $mode = $this->getOptionValue($params, '--mode', 'all');
        $timestamp = $this->getOptionValue($params, '--timestamp', '1') === '1';

        $root = rtrim((string) realpath(ROOTPATH), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $fullOut = $this->resolvePath($root, $out);
        $jsonOut = preg_replace('/\.md$/', '.json', $fullOut) ?: ($fullOut . '.json');

        $dir = dirname($fullOut);
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $router = service('router');

        /** @var \CodeIgniter\Router\RouteCollection|null $collection */
        $collection = null;
        if (method_exists($router, 'getRoutes')) {
            $collection = $router->getRoutes();
        }

        if (! $collection instanceof \CodeIgniter\Router\RouteCollection) {
            $collection = (function () {
                return $this->collection ?? null;
            })->call($router);
        }

        if (! $collection instanceof \CodeIgniter\Router\RouteCollection) {
            $collection = service('routes');
        }

        $routeTable = $collection->getRoutes();

        $items = $this->normalizeRoutes($routeTable, $mode);
        $summary = $this->buildSummary($items);

        $payload = [
            'generated_utc' => gmdate('Y-m-d\TH:i:s\Z'),
            'environment'   => ENVIRONMENT,
            'mode'          => $mode,
            'summary'       => $summary,
            'routes'        => $items,
        ];

        $md = [];
        $md[] = '# Routes Export';
        if ($timestamp) {
            $md[] = '';
            $md[] = '- Generated (UTC): `' . $payload['generated_utc'] . '`';
            $md[] = '- Environment: `' . ENVIRONMENT . '`';
        }
        $md[] = '- Mode: `' . $mode . '`';
        $md[] = '';
        $md[] = '## Summary';
        $md[] = '- Total routes: `' . (string) $summary['total'] . '`';
        $md[] = '- Methods: `' . json_encode($summary['methods'], JSON_UNESCAPED_SLASHES) . '`';
        $md[] = '- Surface groups: `' . json_encode($summary['surfaces'], JSON_UNESCAPED_SLASHES) . '`';
        $md[] = '';
        $md[] = '## Routes';
        $md[] = '';
        $md[] = '| Method | Route | Handler | Surface | Issues |';
        $md[] = '|---|---|---|---|---|';
        foreach ($routeTable as $method => $routesForMethod) {
            if (! is_array($routesForMethod)) {
                continue;
            }

            foreach ($routesForMethod as $routeKey => $handler) {
                $route = (string) $routeKey;
                $handlerStr = $this->handlerToString($handler);
                $issues = $this->detectIssues($handlerStr);

                if (! $this->isIncludedByMode($mode, $issues)) {
                    continue;
                }

                $md[] = '| '
                    . $this->escTable((string) $method) . ' | '
                    . $this->escTable($route) . ' | '
                    . $this->escTable($handlerStr) . ' | '
                    . $this->escTable($this->detectSurface($route)) . ' | '
                    . $this->escTable($issues) . ' |';
            }
        }

        if (@file_put_contents($fullOut, implode("\n", $md) . "\n") === false) {
            CLI::error('Failed to write routes Markdown doc: ' . $fullOut);
            return;
        }

        if (@file_put_contents($jsonOut, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n") === false) {
            CLI::error('Failed to write routes JSON doc: ' . $jsonOut);
            return;
        }

        CLI::write('Wrote routes docs: ' . $fullOut . ' and ' . $jsonOut, 'green');
    }

    private function normalizeRoutes(array $routeTable, string $mode): array
    {
        $rows = [];
        foreach ($routeTable as $method => $routesForMethod) {
            if (! is_array($routesForMethod)) {
                continue;
            }

            foreach ($routesForMethod as $routeKey => $handler) {
                $route = (string) $routeKey;
                $handlerStr = $this->handlerToString($handler);
                $issue = $this->detectIssues($handlerStr);

                if (! $this->isIncludedByMode($mode, $issue)) {
                    continue;
                }

                $rows[] = [
                    'method' => (string) $method,
                    'route' => $route,
                    'handler' => $handlerStr,
                    'surface' => $this->detectSurface($route),
                    'issues' => $issue !== '' ? [$issue] : [],
                ];
            }
        }

        usort($rows, static fn(array $a, array $b): int => strcmp($a['route'], $b['route']));

        return $rows;
    }

    private function detectIssues(string $handler): string
    {
        if (strpos($handler, '::') === false) {
            return 'invalid_handler';
        }

        [$class, $method] = explode('::', $handler);

        if (! class_exists($class)) {
            return 'missing_controller';
        }

        if (! method_exists($class, $method)) {
            return 'missing_method';
        }

        return '';
    }

    private function isIncludedByMode(string $mode, string $issue): bool
    {
        if ($mode === 'missing-targets') {
            return in_array($issue, ['missing_controller', 'missing_method'], true);
        }

        if ($mode === 'invalid-handler') {
            return $issue === 'invalid_handler';
        }

        return true;
    }

    private function detectSurface(string $route): string
    {
        if (stripos($route, 'API/') === 0) {
            return 'API';
        }

        if (stripos($route, 'Admin/') === 0) {
            return 'Admin';
        }

        if (stripos($route, 'Ops/') === 0) {
            return 'Ops';
        }

        return 'Public';
    }

    private function buildSummary(array $items): array
    {
        $methods = ['GET' => 0, 'POST' => 0, 'PUT' => 0, 'DELETE' => 0, 'PATCH' => 0, 'OPTIONS' => 0, 'CLI' => 0, 'OTHER' => 0];
        $surfaces = [];

        foreach ($items as $item) {
            $method = strtoupper($item['method']);
            if (! array_key_exists($method, $methods)) {
                $methods['OTHER']++;
            } else {
                $methods[$method]++;
            }

            $surface = $item['surface'];
            $surfaces[$surface] = ($surfaces[$surface] ?? 0) + 1;
        }

        return ['total' => count($items), 'methods' => $methods, 'surfaces' => $surfaces];
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {
            if (! is_string($p)) {
                continue;
            }
            if (strpos($p, $key . '=') === 0) {
                return (string) substr($p, strlen($key) + 1);
            }
        }

        return $default;
    }

    private function resolvePath(string $root, string $path): string
    {
        if ($path !== '' && ($path[0] === '/' || preg_match('#^[A-Za-z]:[\\/]#', $path))) {
            return $path;
        }

        return $root . ltrim($path, '/\\');
    }

    private function handlerToString($handler): string
    {
        if (is_string($handler)) {
            return $handler;
        }

        if (is_array($handler)) {
            if (isset($handler[0]) && isset($handler[1])) {
                return $handler[0] . '::' . $handler[1];
            }

            foreach ($handler as $v) {
                if (is_string($v)) {
                    return $v;
                }
            }
        }

        if (is_object($handler)) {
            return get_class($handler);
        }

        return 'unknown_handler';
    }

    private function escTable(string $s): string
    {
        return trim(str_replace(['|', "\n", "\r"], ['\\|', ' ', ' '], $s));
    }
}
