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
    protected $usage       = 'routes:docs [--mode=all|issues|missing-targets|invalid-handler] [--out=docs/routes/routes.md]';

    public function run(array $params)
    {
        $out = $this->getOptionValue($params, '--out', 'docs/routes/routes.md');
        $mode = $this->getOptionValue($params, '--mode', 'all');
        $limit = max(0, (int) $this->getOptionValue($params, '--limit', '0'));
        $timestamp = $this->getOptionValue($params, '--timestamp', '1') === '1';

        $root = rtrim((string) realpath(ROOTPATH), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $fullOut = $this->resolvePath($root, $out);
        $jsonOut = preg_replace('/\.md$/', '.json', $fullOut) ?: ($fullOut . '.json');

        $dir = dirname($fullOut);
        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $router = service('router');
        $routes = service('routes');

        $collection = $routes->getRoutes();

        if (! self::looksLikeVerbMap($collection)) {
            $collection = self::readVerbMapViaReflection($routes);
        }

        $items = $this->normalizeRoutes($collection, $mode, $limit);
        $summary = $this->buildSummary($items);

        $payload = [
            'generated_utc' => gmdate('Y-m-d\TH:i:s\Z'),
            'environment'   => ENVIRONMENT,
            'mode'          => $mode,
            'limit'         => $limit,
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
        $md[] = '- Limit: `' . (string) $limit . '`';
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
            $md[] = '| '
                . $this->escTable((string) $item['method']) . ' | '
                . $this->escTable((string) $item['route']) . ' | '
                . $this->escTable((string) $item['handler']) . ' | '
                . $this->escTable((string) $item['surface']) . ' | '
                . $this->escTable(implode(',', $item['issues'])) . ' |';
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

    private function normalizeRoutes(array $routeTable, string $mode, int $limit): array
    {
        $rows = [];
        $seen = [];

        foreach ($routeTable as $method => $routesForMethod) {

            if (! is_array($routesForMethod)) {
                continue;
            }

            foreach ($routesForMethod as $routeKey => $handler) {

                $route = (string) $routeKey;

                $parsed = $this->parseHandler($handler);
                $issues = $parsed['issues'];

                if ($this->isMissingTarget($parsed['class'], $parsed['method']) && ! $this->isMaintenanceStub($route)) {
                    $issues[] = 'missing_target';
                }

                $dupKey = $method . ':' . $route;

                if (isset($seen[$dupKey])) {
                    $issues[] = 'duplicate_route';
                }

                $seen[$dupKey] = true;

                $issues = array_values(array_unique($issues));

                if (! $this->isIncludedByMode($mode, $issues)) {
                    continue;
                }

                $rows[] = [
                    'method'  => (string) $method,
                    'route'   => $route,
                    'handler' => $parsed['raw'],
                    'surface' => $this->detectSurface($route),
                    'issues'  => $issues,
                ];

                if ($limit > 0 && count($rows) >= $limit) {
                    break 2;
                }
            }
        }

        usort($rows, static fn(array $a, array $b): int => strcmp($a['route'], $b['route']));

        return $rows;
    }

    private function parseHandler($handler): array
    {
        $raw = $this->handlerToString($handler);

        if ($raw === 'closure' || $raw === 'object') {
            return ['raw' => $raw, 'class' => null, 'method' => null, 'issues' => []];
        }

        if (strpos($raw, '/') !== false && strpos($raw, '\\') !== false) {
            return ['raw' => $raw, 'class' => null, 'method' => null, 'issues' => ['invalid_handler']];
        }

        $rawNorm = ltrim($raw, '\\');

        if (strpos($rawNorm, '::') !== false) {

            [$class, $method] = explode('::', $rawNorm, 2);

            $method = preg_replace('#/.*$#', '', $method);

            return [
                'raw' => $raw,
                'class' => $class,
                'method' => $method,
                'issues' => []
            ];
        }

        if (preg_match('#^[A-Za-z0-9_\\\\]+:[A-Za-z0-9_]+#', $rawNorm)) {
            return ['raw' => $raw, 'class' => null, 'method' => null, 'issues' => ['invalid_handler']];
        }

        return ['raw' => $raw, 'class' => null, 'method' => null, 'issues' => []];
    }

    private function isIncludedByMode(string $mode, array $issues): bool
    {
        if ($mode === 'issues') {
            return count($issues) > 0;
        }

        if ($mode === 'missing-targets') {
            return in_array('missing_target', $issues, true);
        }

        if ($mode === 'invalid-handler') {
            return in_array('invalid_handler', $issues, true);
        }

        return true;
    }

    private function detectSurface(string $route): string
    {
        if (stripos($route, 'API/') === 0 || stripos($route, 'api/') === 0) {
            return 'API';
        }

        if (stripos($route, 'Ops') === 0 || stripos($route, '/Ops') === 0) {
            return 'Ops';
        }

        if (stripos($route, 'Admin/') === 0) {
            return 'Admin';
        }

        return 'Public/User';
    }

    private function buildSummary(array $items): array
    {
        $methods = ['GET'=>0,'POST'=>0,'PUT'=>0,'DELETE'=>0,'PATCH'=>0,'OPTIONS'=>0,'CLI'=>0,'OTHER'=>0];
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

        return [
            'total' => count($items),
            'methods' => $methods,
            'surfaces' => $surfaces
        ];
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {

            if (! is_string($p)) {
                continue;
            }

            if (strpos($p, $key . '=') === 0) {
                return substr($p, strlen($key) + 1);
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

        if (is_array($handler) && isset($handler[0], $handler[1])) {

            $class = $handler[0];

            if (is_string($class) && class_exists($class)) {
                $class = ltrim($class, '\\');
            }

            if (is_object($class)) {
                $class = get_class($class);
            }

            return $class . '::' . $handler[1];
        }

        if ($handler instanceof \Closure) {
            return 'closure';
        }

        if (is_object($handler)) {
            return 'object';
        }

        return 'unknown_handler';
    }

    private function escTable(string $s): string
    {
        return trim(str_replace(['|', "\n", "\r"], ['\\|', ' ', ' '], $s));
    }

    private static function looksLikeVerbMap($collection): bool
    {
        if (! is_array($collection) || $collection === []) {
            return false;
        }

        $verbs = ['GET','POST','PUT','DELETE','PATCH','OPTIONS','HEAD'];

        foreach (array_keys($collection) as $k) {
            if (! in_array((string) $k, $verbs, true)) {
                return false;
            }
        }

        return true;
    }

    private static function readVerbMapViaReflection($routes): array
    {
        try {

            $ref = new \ReflectionObject($routes);

            if ($ref->hasProperty('routes')) {

                $prop = $ref->getProperty('routes');

                $prop->setAccessible(true);

                $val = $prop->getValue($routes);

                return is_array($val) ? $val : [];
            }

        } catch (\Throwable $e) {
        }

        return [];
    }

    private function isMissingTarget(?string $class, ?string $method): bool
    {
        if (! $class || ! $method) {
            return false;
        }

        if (! class_exists($class)) {
            return true;
        }

        return ! method_exists($class, $method);
    }

    private function isMaintenanceStub(string $route): bool
    {
        return trim($route, '/') === 'Maintenance';
    }
}