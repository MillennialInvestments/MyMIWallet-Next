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
        $collection = null;
        if (is_object($router)) {
            $collection = (function () {
                return $this->collection ?? null;
            })->call($router);
        }

        if (! is_object($collection) || ! method_exists($collection, 'getRoutes')) {
            $collection = service('routes');
        }

        $routeMap = method_exists($collection, 'getRoutes') ? $collection->getRoutes() : [];

        $items = $this->normalizeRoutes($routeMap, $mode);
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
        foreach ($items as $item) {
            $md[] = '| ' . $this->escTable($item['method'])
                . ' | ' . $this->escTable($item['route'])
                . ' | ' . $this->escTable($item['handler'])
                . ' | ' . $this->escTable($item['surface'])
                . ' | ' . $this->escTable(implode('; ', $item['issues']))
                . ' |';
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

    private function normalizeRoutes(array $routeMap, string $mode): array
    {
        $rows = [];
        foreach ($routeMap as $route => $handler) {
            $handlerStr = $this->handlerToString($handler);
            $method = 'CLI';
            $uri = (string) $route;

            if (str_contains((string) $route, '\x00')) {
                [$method, $uri] = explode("\x00", (string) $route, 2);
                $method = strtoupper($method);
            }

            $issues = $this->findIssues($handlerStr);
            if ($mode === 'missing-targets' && ! in_array('missing_target', $issues, true)) {
                continue;
            }
            if ($mode === 'invalid-handler' && ! in_array('invalid_handler_delimiter', $issues, true)) {
                continue;
            }

            $rows[] = [
                'method' => $method,
                'route' => $uri,
                'handler' => $handlerStr,
                'surface' => $this->guessSurface($uri),
                'issues' => $issues,
            ];
        }

        usort($rows, static fn(array $a, array $b): int => strcmp($a['route'], $b['route']));

        return $rows;
    }

    private function findIssues(string $handler): array
    {
        $issues = [];
        if (preg_match('/\\w+:\\w+/', $handler)) {
            $issues[] = 'invalid_handler_delimiter';
        }

        if (str_contains($handler, '::')) {
            [$class, $method] = explode('::', $handler, 2);
            $class = trim($class, '\\');
            if (! class_exists($class) || ! method_exists($class, $method)) {
                $issues[] = 'missing_target';
            }
        }

        return $issues;
    }

    private function guessSurface(string $route): string
    {
        $route = ltrim(strtolower($route), '/');
        if (str_starts_with($route, 'api/')) {
            return 'API';
        }
        if (str_starts_with($route, 'admin/') || str_starts_with($route, 'management/')) {
            return 'Admin';
        }
        if (str_starts_with($route, 'cron/') || str_starts_with($route, 'ops/cron')) {
            return 'Cron';
        }
        if (str_starts_with($route, 'account') || str_starts_with($route, 'dashboard') || str_starts_with($route, 'wallet') || str_starts_with($route, 'profile')) {
            return 'User';
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
        if (is_array($handler) && count($handler) === 2 && is_string($handler[0]) && is_string($handler[1])) {
            return $handler[0] . '::' . $handler[1];
        }

        if (is_scalar($handler)) {
            return (string) $handler;
        }

        $encoded = json_encode($handler, JSON_UNESCAPED_SLASHES);

        return $encoded !== false ? $encoded : 'unknown_handler';
    }

    private function escTable(string $s): string
    {
        return trim(str_replace(['|', "\n", "\r"], ['\\|', ' ', ' '], $s));
    }
}
