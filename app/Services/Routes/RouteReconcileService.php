<?php

declare(strict_types=1);

namespace App\Services\Routes;

final class RouteReconcileService
{
    public function run(): array
    {
        $routes = service('routes');
        $collection = $routes->getRoutes();

        if (! is_array($collection) || $collection === []) {
            $collection = $this->readVerbMapViaReflection($routes);
        }

        $controllerIndex = $this->buildControllerIndex();

        $issues = [];
        $summary = [
            'scanned' => 0,
            'missing_class' => 0,
            'missing_method' => 0,
            'invalid_handler' => 0,
        ];

        foreach ($collection as $method => $routeMap) {
            if (! is_array($routeMap)) {
                continue;
            }

            foreach ($routeMap as $route => $handler) {
                $summary['scanned']++;

                $parsed = $this->parseHandler($handler);

                if ($parsed['issue'] !== null) {
                    $summary[$parsed['issue']]++;
                    $issues[] = [
                        'method' => (string) $method,
                        'route' => (string) $route,
                        'handler' => $parsed['raw'],
                        'issue' => $parsed['issue'],
                        'suggestion' => $this->suggestFix($parsed, $controllerIndex),
                    ];
                    continue;
                }

                $class = $parsed['class'];
                $methodName = $parsed['method'];

                if (! class_exists($class)) {
                    $summary['missing_class']++;
                    $issues[] = [
                        'method' => (string) $method,
                        'route' => (string) $route,
                        'handler' => $parsed['raw'],
                        'issue' => 'missing_class',
                        'suggestion' => $this->suggestFix($parsed, $controllerIndex),
                    ];
                    continue;
                }

                if (! method_exists($class, $methodName)) {
                    $summary['missing_method']++;
                    $issues[] = [
                        'method' => (string) $method,
                        'route' => (string) $route,
                        'handler' => $parsed['raw'],
                        'issue' => 'missing_method',
                        'suggestion' => $this->suggestFix($parsed, $controllerIndex),
                    ];
                }
            }
        }

        return [
            'summary' => $summary,
            'issues' => $issues,
        ];
    }

    private function parseHandler($handler): array
    {
        $raw = is_string($handler) ? $handler : (is_array($handler) ? implode('::', $handler) : 'unknown');

        $rawNorm = ltrim($raw, '\\');

        if (preg_match('#^[A-Za-z0-9_\\\\]+:[A-Za-z0-9_]+#', $rawNorm)) {
            return ['raw' => $raw, 'class' => null, 'method' => null, 'issue' => 'invalid_handler'];
        }

        if (! str_contains($rawNorm, '::')) {
            return ['raw' => $raw, 'class' => null, 'method' => null, 'issue' => 'invalid_handler'];
        }

        [$class, $method] = explode('::', $rawNorm, 2);
        $method = (string) preg_replace('#/.*$#', '', $method);

        return ['raw' => $raw, 'class' => $class, 'method' => $method, 'issue' => null];
    }

    private function suggestFix(array $parsed, array $index): ?string
    {
        if (empty($parsed['raw'])) {
            return null;
        }

        if (! empty($parsed['class'])) {
            $short = substr($parsed['class'], strrpos($parsed['class'], '\\') + 1);
            if (isset($index[$short]) && count($index[$short]) === 1) {
                return $index[$short][0] . '::' . ($parsed['method'] ?? 'index');
            }
        }

        if (preg_match('#^([A-Za-z0-9_\\\\]+):([A-Za-z0-9_]+)#', $parsed['raw'], $m)) {
            $short = substr($m[1], strrpos($m[1], '\\') + 1);
            if (isset($index[$short]) && count($index[$short]) === 1) {
                return $index[$short][0] . '::' . $m[2];
            }
            return str_replace(':', '::', $parsed['raw']);
        }

        return null;
    }

    private function buildControllerIndex(): array
    {
        $index = [];
        $roots = [ROOTPATH . 'app/Controllers', ROOTPATH . 'app/Modules'];

        foreach ($roots as $root) {
            if (! is_dir($root)) {
                continue;
            }

            $it = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($root));
            foreach ($it as $file) {
                if (! $file->isFile() || substr($file->getFilename(), -4) !== '.php') {
                    continue;
                }

                $src = file_get_contents($file->getPathname());
                if ($src === false) {
                    continue;
                }

                if (! preg_match('/namespace\s+([^;]+);/m', $src, $nsMatch)) {
                    continue;
                }

                if (! preg_match('/class\s+([A-Za-z_][A-Za-z0-9_]*)/m', $src, $classMatch)) {
                    continue;
                }

                $fqcn = trim($nsMatch[1]) . '\\' . trim($classMatch[1]);
                $short = trim($classMatch[1]);
                $index[$short][] = $fqcn;
            }
        }

        return $index;
    }

    private function readVerbMapViaReflection($routes): array
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
}