<?php

declare(strict_types=1);

namespace App\Commands\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Services;

final class Docs extends SafeBaseCommand
{
    protected $group       = 'Routes';
    protected $name        = 'routes:docs';
    protected $description = 'Export all registered routes to a Markdown file under docs/routes/.';
    protected $usage       = 'routes:docs [--out=docs/routes/routes.md] [--timestamp=1] [--include-filters=0]';

    public function run(array $params)
    {
        $out = $this->getOptionValue($params, '--out', 'docs/routes/routes.md');
        $timestamp = $this->getOptionValue($params, '--timestamp', '1') === '1';
        $includeFilters = $this->getOptionValue($params, '--include-filters', '0') === '1';

        $root = rtrim((string) realpath(ROOTPATH), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $fullOut = $this->resolvePath($root, $out);

        $dir = dirname($fullOut);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        // Force routes loading (your modular loader/phase logic runs via Routes.php)
        $routes = Services::routes();

        // Get route collection in a format we can iterate
        $collection = $routes->getRoutes();
        // $collection is usually: [HTTP_METHOD => [routeKey => handler, ...], ...]
        // but exact shape can vary. We'll normalize safely.
        $md = [];

        $md[] = '# Routes Export';
        if ($timestamp) {
            $md[] = '';
            $md[] = '- Generated (UTC): `' . gmdate('Y-m-d\TH:i:s\Z') . '`';
            $md[] = '- Environment: `' . ENVIRONMENT . '`';
        }
        $md[] = '';
        $md[] = '## Summary';
        $md[] = '- Total routes: `' . $this->countRoutes($collection) . '`';
        $md[] = '';
        $md[] = '## Routes';
        $md[] = '';
        $md[] = '| Method | Route | Handler |';
        $md[] = '|---|---|---|';

        foreach ($collection as $method => $routesForMethod) {
            if (!is_array($routesForMethod)) {
                continue;
            }
            foreach ($routesForMethod as $routeKey => $handler) {
                $route = is_string($routeKey) ? $routeKey : '';
                $handlerStr = $this->handlerToString($handler);

                // optional: include filter info if you have a reliable way to read it
                // CI4 doesn't expose filters per route in a simple public API consistently across versions.
                // So default is off.
                if ($includeFilters) {
                    // placeholder column could be added later if you decide to track filters via your own metadata
                }

                $md[] = '| ' . $this->escTable((string) $method) . ' | ' . $this->escTable($route) . ' | ' . $this->escTable($handlerStr) . ' |';
            }
        }

        $content = implode("\n", $md) . "\n";

        if (@file_put_contents($fullOut, $content) === false) {
            CLI::error('Failed to write routes doc: ' . $fullOut);
            return;
        }

        CLI::write('Wrote routes to: ' . $fullOut, 'green');
    }

    private function getOptionValue(array $params, string $key, string $default): string
    {
        foreach ($params as $p) {
            if (strpos($p, $key . '=') === 0) {
                return (string) substr($p, strlen($key) + 1);
            }
        }
        return $default;
    }

    private function resolvePath(string $root, string $path): string
    {
        // allow both absolute and relative output paths
        if ($path !== '' && ($path[0] === '/' || preg_match('#^[A-Za-z]:[\\\\/]#', $path))) {
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
            // e.g. [ControllerClass, 'method']
            if (count($handler) === 2 && is_string($handler[0]) && is_string($handler[1])) {
                return $handler[0] . '::' . $handler[1];
            }
            return json_encode($handler, JSON_UNESCAPED_SLASHES) ?: 'array_handler';
        }
        if (is_object($handler)) {
            return get_class($handler);
        }
        return 'unknown_handler';
    }

    private function escTable(string $s): string
    {
        $s = str_replace(['|', "\n", "\r"], ['\\|', ' ', ' '], $s);
        return trim($s);
    }

    private function countRoutes(array $collection): int
    {
        $count = 0;
        foreach ($collection as $routesForMethod) {
            if (!is_array($routesForMethod)) {
                continue;
            }
            $count += count($routesForMethod);
        }
        return $count;
    }
}