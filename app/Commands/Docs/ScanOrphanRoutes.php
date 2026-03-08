<?php

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ScanOrphanRoutes extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:scan-orphan-routes';
    protected $description = 'Detect routes that do not map to existing controller methods.';

    public function run(array $params)
    {
        $routes = $this->scanRoutes();
        $controllerMethods = $this->scanControllerMethods();
        $orphans = [];

        foreach ($routes as $route) {
            if (empty($route['controller']) || empty($route['method'])) {
                continue;
            }

            $methods = $controllerMethods[$route['controller']] ?? [];
            if (! in_array($route['method'], $methods, true)) {
                $orphans[] = $route;
            }
        }

        $out = [
            'generated_at' => date(DATE_ATOM),
            'orphanRoutes' => $orphans,
        ];

        file_put_contents(ROOTPATH . 'docs/_orphan_routes.json', json_encode($out, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Orphan routes report: docs/_orphan_routes.json', 'green');
        CLI::write('Orphan routes found: ' . count($orphans));
    }

    private function scanControllerMethods(): array
    {
        $index = [];
        foreach (glob(APPPATH . 'Controllers/*.php') ?: [] as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match('/namespace\s+([^;]+);/', $content, $ns);
            $namespace = trim($ns[1] ?? 'App\\Controllers');
            $class = basename($path, '.php');
            preg_match_all('/function\s+([A-Za-z0-9_]+)\s*\(/', $content, $mm);
            $index[$namespace . '\\' . $class] = array_values(array_unique($mm[1] ?? []));
        }

        foreach (glob(APPPATH . 'Modules/*/Controllers/*.php') ?: [] as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match('/namespace\s+([^;]+);/', $content, $ns);
            $namespace = trim($ns[1] ?? 'App\\Modules');
            $class = basename($path, '.php');
            preg_match_all('/function\s+([A-Za-z0-9_]+)\s*\(/', $content, $mm);
            $index[$namespace . '\\' . $class] = array_values(array_unique($mm[1] ?? []));
        }

        return $index;
    }

    private function scanRoutes(): array
    {
        $files = [ROOTPATH . 'app/Config/Routes.php'];
        foreach (glob(APPPATH . 'Modules/*/Config/Routes.php') ?: [] as $routeFile) {
            $files[] = $routeFile;
        }

        $routes = [];
        foreach (array_unique($files) as $file) {
            if (! is_file($file)) {
                continue;
            }

            $content = file_get_contents($file) ?: '';
            preg_match_all('/\$routes->(?:get|post|put|delete|patch|match|add)\(\s*[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches, PREG_SET_ORDER);

            foreach ($matches as $match) {
                $controller = null;
                $method = null;
                if (str_contains($match[2], '::')) {
                    [$controller, $method] = explode('::', $match[2], 2);
                    $controller = trim($controller, '\\');
                    $method = explode('/', $method)[0];
                }

                $routes[] = [
                    'file' => $this->relativePath($file),
                    'uri' => '/' . ltrim($match[1], '/'),
                    'controller' => $controller,
                    'method' => $method,
                ];
            }
        }

        return $routes;
    }

    private function relativePath(string $path): string
    {
        $path = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        return str_starts_with($path, $root . '/') ? substr($path, strlen($root) + 1) : $path;
    }
}
