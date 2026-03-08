<?php

declare(strict_types=1);

namespace App\Commands\Master;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class KnowledgeGraphBuild extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:knowledge-graph:build';
    protected $description = 'Build a CI4 knowledge graph from controllers, routes, models, services, views, and commands.';

    protected $usage = 'php spark master:knowledge-graph:build';

    public function run(array $params)
    {
        CLI::write('Building CI4 knowledge graph...', 'yellow');

        try {
            $graph = [
                'generated_at' => date('Y-m-d H:i:s'),
                'app_path'      => APPPATH,
                'root_path'     => ROOTPATH,
                'controllers'   => $this->scanControllers(),
                'models'        => $this->scanModels(),
                'services'      => $this->scanServices(),
                'commands'      => $this->scanCommands(),
                'routes'        => $this->scanRoutes(),
                'modules'       => $this->scanModules(),
                'edges'         => [],
            ];

            $graph['edges'] = $this->buildEdges($graph);

            $outputFile = ROOTPATH . 'docs/_ci4_knowledge_graph.json';
            file_put_contents($outputFile, json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            CLI::write('Knowledge graph generated: docs/_ci4_knowledge_graph.json', 'green');
            CLI::write('Controllers: ' . count($graph['controllers']), 'cyan');
            CLI::write('Models: ' . count($graph['models']), 'cyan');
            CLI::write('Services: ' . count($graph['services']), 'cyan');
            CLI::write('Commands: ' . count($graph['commands']), 'cyan');
            CLI::write('Routes: ' . count($graph['routes']), 'cyan');
            CLI::write('Edges: ' . count($graph['edges']), 'cyan');

            log_message('info', 'Knowledge graph built successfully: {file}', [
                'file' => $outputFile
            ]);
        } catch (\Throwable $e) {
            CLI::error('Knowledge graph build failed: ' . $e->getMessage());

            log_message('error', 'Knowledge graph build failed: {message}', [
                'message' => $e->getMessage(),
                'trace'   => $e->getTraceAsString(),
            ]);
        }
    }

    protected function scanControllers(): array
    {
        $files = $this->findPhpFiles([
            APPPATH . 'Controllers',
            APPPATH . 'Modules',
        ], function (string $path): bool {
            return strpos($path, DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR) !== false
                || strpos($path, APPPATH . 'Controllers' . DIRECTORY_SEPARATOR) === 0;
        });

        $controllers = [];
        foreach ($files as $file) {
            $content = file_get_contents($file);

            $controllers[] = [
                'name'         => basename($file, '.php'),
                'path'         => $this->relativePath($file),
                'namespace'    => $this->extractNamespace($content),
                'class'        => $this->extractClass($content),
                'extends'      => $this->extractExtends($content),
                'uses_models'  => $this->extractModelReferences($content),
                'uses_views'   => $this->extractViewReferences($content),
                'uses_services'=> $this->extractServiceReferences($content),
                'methods'      => $this->extractPublicMethods($content),
            ];
        }

        usort($controllers, fn ($a, $b) => strcmp($a['path'], $b['path']));
        return $controllers;
    }

    protected function scanModels(): array
    {
        $files = $this->findPhpFiles([
            APPPATH . 'Models',
            APPPATH . 'Modules',
        ], function (string $path): bool {
            return strpos($path, DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR) !== false
                || strpos($path, APPPATH . 'Models' . DIRECTORY_SEPARATOR) === 0;
        });

        $models = [];
        foreach ($files as $file) {
            $content = file_get_contents($file);

            $models[] = [
                'name'      => basename($file, '.php'),
                'path'      => $this->relativePath($file),
                'namespace' => $this->extractNamespace($content),
                'class'     => $this->extractClass($content),
                'table'     => $this->extractProtectedProperty($content, 'table'),
            ];
        }

        usort($models, fn ($a, $b) => strcmp($a['path'], $b['path']));
        return $models;
    }

    protected function scanServices(): array
    {
        $files = $this->findPhpFiles([
            APPPATH . 'Services',
            APPPATH . 'Modules',
        ], function (string $path): bool {
            return strpos($path, DIRECTORY_SEPARATOR . 'Services' . DIRECTORY_SEPARATOR) !== false
                || strpos($path, APPPATH . 'Services' . DIRECTORY_SEPARATOR) === 0;
        });

        $services = [];
        foreach ($files as $file) {
            $content = file_get_contents($file);

            $services[] = [
                'name'      => basename($file, '.php'),
                'path'      => $this->relativePath($file),
                'namespace' => $this->extractNamespace($content),
                'class'     => $this->extractClass($content),
            ];
        }

        usort($services, fn ($a, $b) => strcmp($a['path'], $b['path']));
        return $services;
    }

    protected function scanCommands(): array
    {
        $files = $this->findPhpFiles([APPPATH . 'Commands']);

        $commands = [];
        foreach ($files as $file) {
            $content = file_get_contents($file);

            $commands[] = [
                'name'        => basename($file, '.php'),
                'path'        => $this->relativePath($file),
                'namespace'   => $this->extractNamespace($content),
                'class'       => $this->extractClass($content),
                'group'       => $this->extractProtectedProperty($content, 'group'),
                'command'     => $this->extractProtectedProperty($content, 'name'),
                'description' => $this->extractProtectedProperty($content, 'description'),
            ];
        }

        usort($commands, fn ($a, $b) => strcmp($a['path'], $b['path']));
        return $commands;
    }

    protected function scanRoutes(): array
    {
        $routeFiles = [];
        $coreRoutes = APPPATH . 'Config/Routes.php';
        if (is_file($coreRoutes)) {
            $routeFiles[] = $coreRoutes;
        }

        $moduleRoutes = $this->findPhpFiles([APPPATH . 'Modules'], function (string $path): bool {
            return preg_match('#/Config/Routes\.php$#', str_replace('\\', '/', $path)) === 1;
        });

        $routeFiles = array_merge($routeFiles, $moduleRoutes);

        $routes = [];
        foreach ($routeFiles as $file) {
            $content = file_get_contents($file);

            preg_match_all(
                '/\$routes->(get|post|add|match|resource|group)\((.*?)\);/s',
                $content,
                $matches,
                PREG_SET_ORDER
            );

            foreach ($matches as $match) {
                $routes[] = [
                    'file'       => $this->relativePath($file),
                    'method'     => trim($match[1]),
                    'definition' => trim(preg_replace('/\s+/', ' ', $match[2])),
                ];
            }
        }

        return $routes;
    }

    protected function scanModules(): array
    {
        $modulesPath = APPPATH . 'Modules';
        if (!is_dir($modulesPath)) {
            return [];
        }

        $dirs = glob($modulesPath . '/*', GLOB_ONLYDIR) ?: [];
        $modules = [];

        foreach ($dirs as $dir) {
            $modules[] = [
                'name'        => basename($dir),
                'path'        => $this->relativePath($dir),
                'controllers' => count($this->findPhpFiles([$dir], fn ($p) => strpos($p, '/Controllers/') !== false || strpos($p, '\Controllers\\') !== false)),
                'models'      => count($this->findPhpFiles([$dir], fn ($p) => strpos($p, '/Models/') !== false || strpos($p, '\Models\\') !== false)),
                'views'       => count($this->findFiles([$dir], fn ($p) => strpos($p, '/Views/') !== false || strpos($p, '\Views\\') !== false)),
                'services'    => count($this->findPhpFiles([$dir], fn ($p) => strpos($p, '/Services/') !== false || strpos($p, '\Services\\') !== false)),
            ];
        }

        usort($modules, fn ($a, $b) => strcmp($a['name'], $b['name']));
        return $modules;
    }

    protected function buildEdges(array $graph): array
    {
        $edges = [];

        foreach ($graph['controllers'] as $controller) {
            foreach ($controller['uses_models'] as $model) {
                $edges[] = [
                    'from_type' => 'controller',
                    'from'      => $controller['name'],
                    'to_type'   => 'model',
                    'to'        => $model,
                    'relation'  => 'uses_model',
                ];
            }

            foreach ($controller['uses_views'] as $view) {
                $edges[] = [
                    'from_type' => 'controller',
                    'from'      => $controller['name'],
                    'to_type'   => 'view',
                    'to'        => $view,
                    'relation'  => 'renders_view',
                ];
            }

            foreach ($controller['uses_services'] as $service) {
                $edges[] = [
                    'from_type' => 'controller',
                    'from'      => $controller['name'],
                    'to_type'   => 'service',
                    'to'        => $service,
                    'relation'  => 'uses_service',
                ];
            }
        }

        foreach ($graph['models'] as $model) {
            if (!empty($model['table'])) {
                $edges[] = [
                    'from_type' => 'model',
                    'from'      => $model['name'],
                    'to_type'   => 'table',
                    'to'        => $model['table'],
                    'relation'  => 'maps_table',
                ];
            }
        }

        return $edges;
    }

    protected function findPhpFiles(array $paths, ?callable $filter = null): array
    {
        return $this->findFiles($paths, function (string $path) use ($filter): bool {
            if (pathinfo($path, PATHINFO_EXTENSION) !== 'php') {
                return false;
            }

            return $filter ? $filter($path) : true;
        });
    }

    protected function findFiles(array $paths, ?callable $filter = null): array
    {
        $files = [];

        foreach ($paths as $path) {
            if (!is_dir($path) && !is_file($path)) {
                continue;
            }

            if (is_file($path)) {
                if ($filter === null || $filter($path)) {
                    $files[] = $path;
                }
                continue;
            }

            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS)
            );

            foreach ($iterator as $file) {
                if ($file->isDir()) {
                    continue;
                }

                $pathname = $file->getPathname();

                if ($filter === null || $filter($pathname)) {
                    $files[] = $pathname;
                }
            }
        }

        sort($files);
        return array_values(array_unique($files));
    }

    protected function extractNamespace(string $content): ?string
    {
        return preg_match('/namespace\s+([^;]+);/', $content, $m) ? trim($m[1]) : null;
    }

    protected function extractClass(string $content): ?string
    {
        return preg_match('/class\s+([A-Za-z0-9_]+)/', $content, $m) ? trim($m[1]) : null;
    }

    protected function extractExtends(string $content): ?string
    {
        return preg_match('/class\s+[A-Za-z0-9_]+\s+extends\s+([A-Za-z0-9_\\\\]+)/', $content, $m) ? trim($m[1]) : null;
    }

    protected function extractProtectedProperty(string $content, string $property): ?string
    {
        $pattern = '/protected\s+\$' . preg_quote($property, '/') . '\s*=\s*[\'"]([^\'"]+)[\'"]\s*;/';
        return preg_match($pattern, $content, $m) ? trim($m[1]) : null;
    }

    protected function extractModelReferences(string $content): array
    {
        $refs = [];

        preg_match_all('/new\s+([A-Za-z0-9_]+Model)\s*\(/', $content, $a);
        preg_match_all('/\$this->([A-Za-z0-9_]+Model)\b/', $content, $b);

        $refs = array_merge($refs, $a[1] ?? [], $b[1] ?? []);

        return array_values(array_unique(array_filter($refs)));
    }

    protected function extractViewReferences(string $content): array
    {
        $refs = [];

        preg_match_all('/return\s+view\(\s*[\'"]([^\'"]+)[\'"]/', $content, $a);
        preg_match_all('/echo\s+view\(\s*[\'"]([^\'"]+)[\'"]/', $content, $b);

        $refs = array_merge($refs, $a[1] ?? [], $b[1] ?? []);

        return array_values(array_unique(array_filter($refs)));
    }

    protected function extractServiceReferences(string $content): array
    {
        $refs = [];

        preg_match_all('/service\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $content, $a);
        preg_match_all('/Services::([A-Za-z0-9_]+)\s*\(/', $content, $b);

        $refs = array_merge($refs, $a[1] ?? [], $b[1] ?? []);

        return array_values(array_unique(array_filter($refs)));
    }

    protected function extractPublicMethods(string $content): array
    {
        preg_match_all('/public\s+function\s+([A-Za-z0-9_]+)\s*\(/', $content, $matches);
        return array_values(array_unique($matches[1] ?? []));
    }

    protected function relativePath(string $path): string
    {
        return str_replace(ROOTPATH, '', $path);
    }
}