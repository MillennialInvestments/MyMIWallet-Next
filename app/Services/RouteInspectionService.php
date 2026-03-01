<?php

declare(strict_types=1);

namespace App\Services;

use Config\Services;

class RouteInspectionService
{
    /**
     * @return list<array{method:string,uri:string,handler:string,exists:bool,methodExists:bool,isDuplicate:bool,sourceFile:string,filters:string,namespace:string,priority:string}>
     */
    public function inspect(?string $phase = null): array
    {
        $routes = $phase === null ? $this->inspectBootstrappedRoutes() : $this->inspectPhaseFragments($phase);

        $duplicates = [];
        foreach ($routes as $row) {
            $key = strtoupper($row['method']) . ' ' . $row['uri'];
            $duplicates[$key] = ($duplicates[$key] ?? 0) + 1;
        }

        foreach ($routes as &$row) {
            $key = strtoupper($row['method']) . ' ' . $row['uri'];
            $row['isDuplicate'] = ($duplicates[$key] ?? 0) > 1;
        }
        unset($row);

        return $routes;
    }

    /** @return list<array{method:string,uri:string,handler:string,exists:bool,methodExists:bool,isDuplicate:bool,sourceFile:string,filters:string,namespace:string,priority:string}> */
    private function inspectBootstrappedRoutes(): array
    {
        $routeCollection = Services::routes();
        $routeCollection->loadRoutes();

        $routesMap = $routeCollection->getRoutes();
        $optionsMap = method_exists($routeCollection, 'getRoutesOptions') ? $routeCollection->getRoutesOptions() : [];

        $rows = [];
        foreach ($routesMap as $from => $to) {
            $meta = $optionsMap[$from] ?? [];

            if (is_string($to)) {
                [$exists, $methodExists] = $this->checkTarget($to);
                $rows[] = [
                    'method' => 'GET',
                    'uri' => '/' . ltrim((string) $from, '/'),
                    'handler' => $to,
                    'exists' => $exists,
                    'methodExists' => $methodExists,
                    'isDuplicate' => false,
                    'sourceFile' => 'app/Config/Routes.php(runtime)',
                    'filters' => $this->stringify($meta['filter'] ?? $meta['filters'] ?? ''),
                    'namespace' => (string) ($meta['namespace'] ?? ''),
                    'priority' => isset($meta['priority']) ? (string) $meta['priority'] : '',
                ];
                continue;
            }

            if (! is_array($to)) {
                continue;
            }

            foreach ($to as $method => $handler) {
                if (! is_string($handler)) {
                    continue;
                }

                [$exists, $methodExists] = $this->checkTarget($handler);
                $rows[] = [
                    'method' => strtoupper((string) $method),
                    'uri' => '/' . ltrim((string) $from, '/'),
                    'handler' => $handler,
                    'exists' => $exists,
                    'methodExists' => $methodExists,
                    'isDuplicate' => false,
                    'sourceFile' => 'app/Config/Routes.php(runtime)',
                    'filters' => $this->stringify($meta['filter'] ?? $meta['filters'] ?? ''),
                    'namespace' => (string) ($meta['namespace'] ?? ''),
                    'priority' => isset($meta['priority']) ? (string) $meta['priority'] : '',
                ];
            }
        }

        if (count($rows) < 100) {
            return $this->inspectFromMonolithicFile();
        }

        return $rows;
    }

    /** @return list<array{method:string,uri:string,handler:string,exists:bool,methodExists:bool,isDuplicate:bool,sourceFile:string,filters:string,namespace:string,priority:string}> */
    private function inspectFromMonolithicFile(): array
    {
        $file = ROOTPATH . 'app/Config/Routes.php';
        if (! is_file($file)) {
            return [];
        }

        $rows = [];
        $lines = file($file, FILE_IGNORE_NEW_LINES) ?: [];
        foreach ($lines as $line) {
            $trim = trim($line);
            if ($trim === '' || str_starts_with($trim, '//')) {
                continue;
            }

            if (preg_match('/\$routes->(get|post|put|delete|patch|options|cli|match)\((.+)\);/i', $trim, $m) !== 1) {
                continue;
            }

            if (preg_match('/^[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/i', $m[2], $a) !== 1) {
                continue;
            }

            $method = strtoupper($m[1] === 'match' ? 'GET|POST' : $m[1]);
            $handler = $a[2];
            [$exists, $methodExists] = $this->checkTarget($handler);
            $rows[] = [
                'method' => $method,
                'uri' => '/' . ltrim($a[1], '/'),
                'handler' => $handler,
                'exists' => $exists,
                'methodExists' => $methodExists,
                'isDuplicate' => false,
                'sourceFile' => 'app/Config/Routes.php',
                'filters' => '',
                'namespace' => '',
                'priority' => '',
            ];
        }

        return $rows;
    }

    /** @return list<array{method:string,uri:string,handler:string,exists:bool,methodExists:bool,isDuplicate:bool,sourceFile:string,filters:string,namespace:string,priority:string}> */
    private function inspectPhaseFragments(string $phase): array
    {
        $phaseKey = strtolower(trim($phase));
        $files = [
            ROOTPATH . 'app/Config/Routes/Auth.php',
            ROOTPATH . 'app/Config/Routes/Legal.php',
        ];

        if ($phaseKey === 'phasea') {
            $files[] = ROOTPATH . 'app/Config/Routes/PhaseA.php';
        } elseif ($phaseKey === 'full') {
            $files = array_merge($files, [
                ROOTPATH . 'app/Config/Routes/Budget.php',
                ROOTPATH . 'app/Config/Routes/Investments.php',
                ROOTPATH . 'app/Config/Routes/Watchlist.php',
                ROOTPATH . 'app/Config/Routes/Wallets.php',
                ROOTPATH . 'app/Config/Routes/Marketing.php',
                ROOTPATH . 'app/Config/Routes/Predictions.php',
                ROOTPATH . 'app/Config/Routes/Admin.php',
                ROOTPATH . 'app/Config/Routes/Ops.php',
                ROOTPATH . 'app/Config/Routes/FullModeOnly.php',
            ]);
        }

        $rows = [];
        foreach ($files as $file) {
            if (! is_file($file)) {
                continue;
            }

            $lines = file($file, FILE_IGNORE_NEW_LINES) ?: [];
            foreach ($lines as $line) {
                $trim = trim($line);
                if ($trim === '' || str_starts_with($trim, '//')) {
                    continue;
                }

                if (preg_match('/\$routes->(get|post|put|delete|patch|options|cli|match)\((.+)\);/i', $trim, $m) !== 1) {
                    continue;
                }

                $verb = strtoupper($m[1] === 'match' ? 'GET|POST' : $m[1]);
                if (preg_match('/^[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/i', $m[2], $a) !== 1) {
                    continue;
                }

                $handler = $a[2];
                [$exists, $methodExists] = $this->checkTarget($handler);
                $rows[] = [
                    'method' => $verb,
                    'uri' => '/' . ltrim($a[1], '/'),
                    'handler' => $handler,
                    'exists' => $exists,
                    'methodExists' => $methodExists,
                    'isDuplicate' => false,
                    'sourceFile' => str_replace(ROOTPATH, '', $file),
                    'filters' => '',
                    'namespace' => '',
                    'priority' => '',
                ];
            }
        }

        return $rows;
    }

    /** @return array{0:bool,1:bool} */
    private function checkTarget(string $handler): array
    {
        if (! str_contains($handler, '::')) {
            return [false, false];
        }

        [$controller, $method] = explode('::', $handler, 2);
        $method = preg_replace('/\/.+$/', '', $method) ?: $method;

        [$controllerFile, $exists] = $this->resolveControllerFile($controller);
        if (! $exists || $controllerFile === null) {
            return [false, false];
        }

        return [true, $this->controllerFileHasMethod($controllerFile, $method)];
    }

    /** @return array{0:?string,1:bool} */
    private function resolveControllerFile(string $controller): array
    {
        $normalized = ltrim($controller, '\\');
        $relativeCandidates = [];

        if (str_starts_with($normalized, 'App\\')) {
            $relativeCandidates[] = 'app/' . str_replace('App\\', '', str_replace('\\', '/', $normalized)) . '.php';
        }

        $classBase = basename(str_replace('\\', '/', $normalized));
        $relativeCandidates = array_merge($relativeCandidates, [
            'app/Controllers/' . $classBase . '.php',
            'app/Modules/User/Controllers/' . $classBase . '.php',
            'app/Modules/APIs/Controllers/' . $classBase . '.php',
            'app/Modules/Management/Controllers/' . $classBase . '.php',
        ]);

        foreach ($relativeCandidates as $relativePath) {
            $absolute = ROOTPATH . $relativePath;
            if (is_file($absolute)) {
                return [$absolute, true];
            }
        }

        return [null, false];
    }

    private function controllerFileHasMethod(string $filePath, string $method): bool
    {
        $contents = file_get_contents($filePath);
        if (! is_string($contents) || $contents === '') {
            return false;
        }

        return preg_match('/public\s+function\s+' . preg_quote($method, '/') . '\s*\(/i', $contents) === 1;
    }

    private function stringify($value): string
    {
        if (is_array($value)) {
            return implode(',', array_map('strval', $value));
        }

        return is_scalar($value) ? (string) $value : '';
    }
}
