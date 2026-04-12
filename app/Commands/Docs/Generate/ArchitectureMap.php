<?php

namespace App\Commands\Docs\Generate;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ArchitectureMap extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:generate-architecture-map';
    protected $description = 'Generate docs/_architecture_map.json from read-only repository scans.';

    public function run(array $params)
    {
        $controllers = $this->scanControllers();
        $services = $this->scanServices();
        $models = $this->scanModels();
        $routes = $this->scanRoutes();
        $views = $this->scanViews();
        $docs = $this->scanDocs();
        $commands = $this->scanCommands();
        $tables = $this->scanTables($models);

        $architectureMap = [
            'generated_at' => date(DATE_ATOM),
            'scan_mode' => 'read-only',
            'controllers' => $controllers,
            'services' => $services,
            'models' => $models,
            'routes' => $routes,
            'views' => $views,
            'docs' => $docs,
            'commands' => $commands,
            'tables' => $tables,
            'libraries' => array_values(array_filter($services, static fn(array $s): bool => str_contains($s['path'], 'app/Libraries/'))),
            'relationships' => $this->buildRelationships($controllers, $services, $models, $routes, $views, $docs, $commands),
        ];

        file_put_contents(ROOTPATH . 'docs/_architecture_map.json', json_encode($architectureMap, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Architecture map generated: docs/_architecture_map.json', 'green');
        CLI::write(sprintf('controllers=%d services=%d models=%d routes=%d views=%d docs=%d commands=%d tables=%d', count($controllers), count($services), count($models), count($routes), count($views), count($docs), count($commands), count($tables)));
    }

    private function scanControllers(): array
    {
        $controllers = [];
        $files = array_merge(
            $this->collectFiles(APPPATH . 'Controllers', 'php'),
            $this->collectFiles(APPPATH . 'Modules', 'php')
        );

        foreach ($files as $path) {
            $normalizedPath = str_replace('\\', '/', $path);
            if (!str_contains($normalizedPath, '/Controllers/')) {
                continue;
            }

            $content = file_get_contents($path) ?: '';
            preg_match('/namespace\s+([^;]+);/', $content, $ns);
            preg_match_all('/function\s+([A-Za-z0-9_]+)\s*\(/', $content, $methodMatches);
            preg_match_all('/(?:view|respondWithRendered|renderTheme)\(\s*[\'\"]([^\'\"]+)[\'\"]/m', $content, $viewMatches);
            preg_match_all('/service\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)|Services::([A-Za-z0-9_]+)/', $content, $serviceMatches, PREG_SET_ORDER);

            $servicesUsed = [];
            foreach ($serviceMatches as $match) {
                $servicesUsed[] = strtolower((string) ($match[1] ?: $match[2]));
            }

            $controllers[] = [
                'name' => basename($path, '.php'),
                'module' => $this->extractModuleFromPath($normalizedPath),
                'path' => $this->relativePath($path),
                'namespace' => $ns[1] ?? null,
                'methods' => array_values(array_unique($methodMatches[1] ?? [])),
                'viewsRendered' => array_values(array_unique(array_map(static fn(string $v): string => str_replace('\\', '/', $v), $viewMatches[1] ?? []))),
                'servicesUsed' => array_values(array_unique($servicesUsed)),
            ];
        }

        return $controllers;
    }

    private function scanServices(): array
    {
        $services = [];
        $files = array_merge(
            $this->collectFiles(APPPATH . 'Services', 'php'),
            $this->collectFiles(APPPATH . 'Libraries', 'php')
        );

        foreach ($files as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match_all('/^use\s+([^;]+);/m', $content, $useMatches);
            preg_match_all('/new\s+([A-Za-z0-9_\\\\]+)/', $content, $newMatches);

            $services[] = [
                'name' => basename($path, '.php'),
                'path' => $this->relativePath($path),
                'dependencies' => array_values(array_unique(array_merge($useMatches[1] ?? [], $newMatches[1] ?? []))),
            ];
        }

        return $services;
    }

    private function scanModels(): array
    {
        $models = [];
        $files = array_merge(
            $this->collectFiles(APPPATH . 'Models', 'php'),
            $this->collectFiles(APPPATH . 'Modules', 'php')
        );

        foreach ($files as $path) {
            $normalizedPath = str_replace('\\', '/', $path);
            if (!str_contains($normalizedPath, '/Models/')) {
                continue;
            }

            $content = file_get_contents($path) ?: '';
            preg_match('/protected\s+\$table\s*=\s*[\'\"]([^\'\"]+)[\'\"]\s*;/', $content, $tableMatch);
            preg_match('/protected\s+\$primaryKey\s*=\s*[\'\"]([^\'\"]+)[\'\"]\s*;/', $content, $pkMatch);

            $models[] = [
                'model' => basename($path, '.php'),
                'path' => $this->relativePath($path),
                'module' => $this->extractModuleFromPath($normalizedPath),
                'table' => $tableMatch[1] ?? null,
                'primaryKey' => $pkMatch[1] ?? null,
            ];
        }

        return $models;
    }

    private function scanRoutes(): array
    {
        $routes = [];
        $routeFiles = array_merge(
            [ROOTPATH . 'app/Config/Routes.php'],
            glob(APPPATH . 'Modules/*/Config/Routes.php') ?: []
        );

        foreach (array_unique($routeFiles) as $routeFile) {
            if (!is_file($routeFile)) {
                continue;
            }

            $content = file_get_contents($routeFile) ?: '';
            preg_match_all('/\$routes->(?:get|post|put|delete|patch|match|add)\((.+?)\);/i', $content, $routeCalls);
            foreach ($routeCalls[1] ?? [] as $callArgs) {
                preg_match('/[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/', $callArgs, $targetMatch);
                if (!isset($targetMatch[1], $targetMatch[2])) {
                    continue;
                }

                $controller = null;
                $method = null;
                if (str_contains($targetMatch[2], '::')) {
                    [$controller, $method] = explode('::', $targetMatch[2], 2);
                    $controller = trim($controller, '\\');
                    $method = explode('/', $method)[0];
                }

                preg_match('/[\'\"]filter[\'\"]\s*=>\s*[\'\"]([^\'\"]+)[\'\"]/', $callArgs, $filterMatch);

                $routes[] = [
                    'file' => $this->relativePath($routeFile),
                    'uri' => '/' . ltrim($targetMatch[1], '/'),
                    'controller' => $controller,
                    'method' => $method,
                    'filters' => $filterMatch[1] ?? null,
                ];
            }
        }

        return $routes;
    }

    private function scanViews(): array
    {
        $views = [];
        $files = array_merge(
            $this->collectFiles(APPPATH . 'Views', 'php'),
            $this->collectFiles(APPPATH . 'Modules', 'php')
        );

        foreach ($files as $path) {
            $normalizedPath = str_replace('\\', '/', $path);
            if (!str_contains($normalizedPath, '/Views/')) {
                continue;
            }

            $views[] = [
                'view' => basename($path, '.php'),
                'module' => $this->extractModuleFromPath($normalizedPath),
                'path' => $this->relativePath($path),
            ];
        }

        return $views;
    }

    private function scanDocs(): array
    {
        $docs = [];
        foreach ($this->collectFiles(ROOTPATH . 'docs', 'md') as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match('/^#\s+(.+)$/m', $content, $titleMatch);
            $title = $titleMatch[1] ?? pathinfo($path, PATHINFO_FILENAME);
            $slug = $this->slugify(pathinfo($path, PATHINFO_FILENAME));

            if (preg_match('/^---\R(.*?)\R---\R?/s', $content, $frontMatterMatch)) {
                foreach (preg_split('/\R/', trim($frontMatterMatch[1])) ?: [] as $line) {
                    if (!str_contains($line, ':')) {
                        continue;
                    }
                    [$key, $value] = explode(':', $line, 2);
                    if (trim(strtolower($key)) === 'slug') {
                        $slug = $this->slugify(trim($value, " \t\n\r\0\x0B\"'"));
                    }
                    if (trim(strtolower($key)) === 'title') {
                        $title = trim($value, " \t\n\r\0\x0B\"'");
                    }
                }
            }

            $docs[] = [
                'doc' => $this->relativePath($path),
                'title' => $title,
                'slug' => $slug,
            ];
        }

        return $docs;
    }

    private function scanCommands(): array
    {
        $commands = [];
        foreach ($this->collectFiles(APPPATH . 'Commands', 'php') as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match('/protected\s+\$name\s*=\s*[\'\"]([^\'\"]+)[\'\"]\s*;/', $content, $nameMatch);
            if (!isset($nameMatch[1])) {
                continue;
            }

            preg_match('/protected\s+\$group\s*=\s*[\'\"]([^\'\"]+)[\'\"]\s*;/', $content, $groupMatch);
            preg_match('/protected\s+\$description\s*=\s*[\'\"]([^\'\"]*)[\'\"]\s*;/', $content, $descMatch);

            $commands[] = [
                'command' => $nameMatch[1],
                'group' => $groupMatch[1] ?? null,
                'description' => $descMatch[1] ?? null,
                'path' => $this->relativePath($path),
            ];
        }

        usort($commands, static fn(array $a, array $b): int => strcmp($a['command'], $b['command']));

        return $commands;
    }

    private function scanTables(array $models): array
    {
        $tables = [];
        foreach ($models as $model) {
            if (!empty($model['table'])) {
                $tables[$model['table']] = [
                    'table' => $model['table'],
                    'model' => $model['model'],
                    'source' => 'model',
                ];
            }
        }

        foreach ($this->collectFiles(APPPATH . 'Database/Migrations', 'php') as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match_all('/createTable\(\s*[\'\"]([^\'\"]+)[\'\"]/', $content, $matches);
            foreach ($matches[1] ?? [] as $table) {
                if (!isset($tables[$table])) {
                    $tables[$table] = [
                        'table' => $table,
                        'model' => null,
                        'source' => 'migration',
                    ];
                }
            }
        }

        foreach ($this->collectFiles(ROOTPATH . 'docs/sql', 'md') as $path) {
            $content = file_get_contents($path) ?: '';
            preg_match_all('/\b(?:CREATE\s+TABLE|ALTER\s+TABLE)\s+`?([a-zA-Z0-9_]+)`?/i', $content, $matches);
            foreach ($matches[1] ?? [] as $table) {
                if (!isset($tables[$table])) {
                    $tables[$table] = [
                        'table' => $table,
                        'model' => null,
                        'source' => 'sql-doc',
                    ];
                }
            }
        }

        return array_values($tables);
    }

    private function buildRelationships(array $controllers, array $services, array $models, array $routes, array $views, array $docs, array $commands): array
    {
        $relationships = [];

        $viewBySlug = [];
        foreach ($views as $view) {
            $viewBySlug[$this->slugify($view['view'])] = $view;
        }

        foreach ($docs as $doc) {
            $view = $viewBySlug[$doc['slug']] ?? null;
            $route = $this->findRouteBySlug($doc['slug'], $routes);

            $relationships[] = [
                'doc' => $doc['doc'],
                'view' => $view['path'] ?? null,
                'route' => $route['uri'] ?? null,
                'controller' => $route['controller'] ?? null,
                'method' => $route['method'] ?? null,
            ];
        }

        foreach ($controllers as $controller) {
            foreach ($controller['servicesUsed'] as $serviceName) {
                $relationships[] = [
                    'controller' => $controller['name'],
                    'service' => $serviceName,
                    'type' => 'controller-service',
                ];
            }
        }

        foreach ($models as $model) {
            if (!empty($model['table'])) {
                $relationships[] = [
                    'model' => $model['model'],
                    'table' => $model['table'],
                    'type' => 'model-table',
                ];
            }
        }

        foreach ($commands as $command) {
            $relationships[] = [
                'command' => $command['command'],
                'path' => $command['path'],
                'type' => 'command-functionality',
            ];
        }

        return $relationships;
    }

    private function findRouteBySlug(string $slug, array $routes): ?array
    {
        $target = '/How-It-Works/' . $slug;
        foreach ($routes as $route) {
            if (strcasecmp((string) ($route['uri'] ?? ''), $target) === 0) {
                return $route;
            }
        }

        return null;
    }

    private function extractModuleFromPath(string $path): ?string
    {
        if (preg_match('#/Modules/([^/]+)/#', $path, $match)) {
            return $match[1];
        }

        return null;
    }

    /** @return string[] */
    private function collectFiles(string $basePath, string $extension): array
    {
        if (!is_dir($basePath)) {
            return [];
        }

        $files = [];
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($basePath));
        foreach ($iterator as $file) {
            if (!$file->isFile()) {
                continue;
            }
            if (strtolower($file->getExtension()) !== strtolower($extension)) {
                continue;
            }
            $files[] = $file->getPathname();
        }

        sort($files);
        return $files;
    }

    private function slugify(string $value): string
    {
        $value = str_replace('_', '-', $value);
        $value = preg_replace('/[^a-zA-Z0-9-]+/', '-', $value);
        $value = preg_replace('/-+/', '-', $value);
        return strtolower(trim((string) $value, '-'));
    }

    private function relativePath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        return str_starts_with($normalized, $root . '/') ? substr($normalized, strlen($root) + 1) : $normalized;
    }
}
