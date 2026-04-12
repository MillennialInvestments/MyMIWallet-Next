<?php

namespace App\Commands\Docs\Generate;

use App\Commands\SafeBaseCommand;
use App\Services\Docs\DocsRendererService;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class KnowledgeGraph extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:generate-knowledge-graph';
    protected $description = 'Generate docs/_knowledge_graph.json linking docs, views, routes, controllers, services, and health scans.';

    public function run(array $params)
    {
        $docs = $this->scanDocs();
        $views = $this->scanViews();
        $routes = $this->scanRoutes();
        $controllers = $this->scanControllers();
        $services = $this->scanServices();
        $relationships = $this->buildRelationships($docs, $views, $routes);

        $graph = [
            'generated_at' => date(DATE_ATOM),
            'docs' => $docs,
            'views' => $views,
            'routes' => $routes,
            'controllers' => $controllers,
            'services' => $services,
            'relationships' => $relationships,
            'health' => [
                'orphanRoutesFile' => 'docs/_orphan_routes.json',
                'orphanViewsFile' => 'docs/_orphan_views.json',
                'undocumentedControllersFile' => 'docs/_undocumented_controllers.json',
                'orphanRoutes' => $this->readJsonFile(ROOTPATH . 'docs/_orphan_routes.json'),
                'orphanViews' => $this->readJsonFile(ROOTPATH . 'docs/_orphan_views.json'),
                'undocumentedControllers' => $this->readJsonFile(ROOTPATH . 'docs/_undocumented_controllers.json'),
            ],
        ];

        file_put_contents(ROOTPATH . 'docs/_knowledge_graph.json', json_encode($graph, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        CLI::write('Knowledge graph generated: docs/_knowledge_graph.json', 'green');
        CLI::write(sprintf('docs=%d views=%d routes=%d controllers=%d services=%d relationships=%d', count($docs), count($views), count($routes), count($controllers), count($services), count($relationships)));
    }

    private function scanDocs(): array
    {
        $docs = [];
        $docsRenderer = new DocsRendererService();
        $howItWorksDocs = [];
        foreach ($docsRenderer->listHowItWorksDocs() as $item) {
            $howItWorksDocs[$item['file']] = $item;
        }

        foreach ($this->collectFiles(ROOTPATH . 'docs', 'md') as $path) {
            $file = $this->relativePath($path);
            $content = file_get_contents($path) ?: '';

            preg_match('/^#\s+(.+)$/m', $content, $titleMatch);
            $title = $titleMatch[1] ?? pathinfo($path, PATHINFO_FILENAME);

            preg_match_all('/^#{1,6}\s+(.+)$/m', $content, $headingMatches);
            $headings = array_values(array_unique(array_map('trim', $headingMatches[1] ?? [])));

            $topics = $this->extractTopics($title . ' ' . implode(' ', $headings));
            $source = str_starts_with($file, 'docs/how-it-works/') ? 'how-it-works' : 'docs';

            $docs[] = [
                'file' => $file,
                'title' => $howItWorksDocs[$file]['title'] ?? $title,
                'slug' => $howItWorksDocs[$file]['slug'] ?? $this->slugify(pathinfo($path, PATHINFO_FILENAME)),
                'category' => $howItWorksDocs[$file]['category'] ?? null,
                'headings' => $headings,
                'topics' => $topics,
                'source' => $source,
            ];
        }

        return $docs;
    }

    private function scanViews(): array
    {
        $views = [];
        foreach ($this->collectFiles(APPPATH . 'Modules', 'php') as $path) {
            if (strpos($path, DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR) === false) {
                continue;
            }

            $relative = $this->relativePath($path);
            if (! preg_match('#app/Modules/([^/]+)/Views/(.+)\.php$#', str_replace('\\', '/', $relative), $match)) {
                continue;
            }

            $views[] = [
                'name' => basename($match[2]),
                'module' => $match[1],
                'path' => $relative,
                'slug' => $this->slugify(basename($match[2])),
            ];
        }

        return $views;
    }

    private function scanRoutes(): array
    {
        $routes = [];
        $routeFiles = [ROOTPATH . 'app/Config/Routes.php'];
        foreach ($this->collectFiles(APPPATH . 'Modules', 'php') as $path) {
            if (preg_match('#/Config/Routes\.php$#', str_replace('\\', '/', $path))) {
                $routeFiles[] = $path;
            }
        }

        foreach (array_unique($routeFiles) as $routeFile) {
            if (! is_file($routeFile)) {
                continue;
            }
            $content = file_get_contents($routeFile) ?: '';
            preg_match_all('/\$routes->(?:get|post|put|delete|patch|match|add)\(\s*[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/i', $content, $matches, PREG_SET_ORDER);
            foreach ($matches as $m) {
                $controller = null;
                $method = null;
                if (str_contains($m[2], '::')) {
                    [$controller, $method] = explode('::', $m[2], 2);
                    $controller = trim($controller, '\\');
                    $method = explode('/', $method)[0];
                }

                $routes[] = [
                    'file' => $this->relativePath($routeFile),
                    'uri' => '/' . ltrim($m[1], '/'),
                    'controller' => $controller,
                    'method' => $method,
                ];
            }
        }

        return $routes;
    }

    private function scanControllers(): array
    {
        $controllers = [];
        foreach ($this->collectFiles(APPPATH . 'Modules', 'php') as $path) {
            if (strpos($path, DIRECTORY_SEPARATOR . 'Controllers' . DIRECTORY_SEPARATOR) === false) {
                continue;
            }

            $content = file_get_contents($path) ?: '';
            preg_match_all('/function\s+([A-Za-z0-9_]+)\s*\(/', $content, $methodMatches);
            preg_match_all('/(?:respondWithRendered|renderTheme|view)\(\s*[\'\"]([^\'\"]+)[\'\"]/m', $content, $viewMatches);
            preg_match_all('/service\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)|Services::([A-Za-z0-9_]+)/', $content, $serviceMatches, PREG_SET_ORDER);

            $services = [];
            foreach ($serviceMatches as $serviceMatch) {
                $services[] = $serviceMatch[1] ?: $serviceMatch[2];
            }

            $controllers[] = [
                'name' => basename($path, '.php'),
                'path' => $this->relativePath($path),
                'methods' => array_values(array_unique($methodMatches[1] ?? [])),
                'renderedViews' => array_values(array_unique($viewMatches[1] ?? [])),
                'servicesUsed' => array_values(array_unique($services)),
            ];
        }

        return $controllers;
    }

    private function scanServices(): array
    {
        $serviceFiles = array_merge($this->collectFiles(APPPATH . 'Services', 'php'), $this->collectFiles(APPPATH . 'Libraries', 'php'));
        $services = [];

        foreach ($serviceFiles as $path) {
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

    private function buildRelationships(array $docs, array $views, array $routes): array
    {
        $relationships = [];
        foreach ($views as $view) {
            if (stripos($view['path'], '/HowItWorks/') === false) {
                continue;
            }

            $doc = $this->matchDocForSlug($view['slug'], $docs);
            $route = $this->matchRouteForSlug($view['slug'], $routes);

            $relationships[] = [
                'doc' => $doc['file'] ?? null,
                'view' => basename($view['path']),
                'route' => $route['uri'] ?? '/How-It-Works/' . $view['slug'],
                'controller' => $route['controller'] ?? 'App\\Modules\\Blog\\Controllers\\HowItWorksController',
                'method' => $route['method'] ?? 'show',
            ];
        }

        foreach ($docs as $doc) {
            if (($doc['source'] ?? '') !== 'how-it-works') {
                continue;
            }
            $route = $this->matchRouteForSlug($doc['slug'], $routes);
            $relationships[] = [
                'doc' => $doc['file'],
                'view' => null,
                'route' => '/How-It-Works/' . $doc['slug'],
                'controller' => $route['controller'] ?? 'App\\Modules\\Blog\\Controllers\\HowItWorksController',
                'method' => $route['method'] ?? 'show',
            ];
        }

        return $relationships;
    }

    private function matchDocForSlug(string $slug, array $docs): ?array
    {
        foreach ($docs as $doc) {
            if (($doc['slug'] ?? '') === $slug) {
                return $doc;
            }
        }

        return null;
    }

    private function matchRouteForSlug(string $slug, array $routes): ?array
    {
        $target = '/How-It-Works/' . $slug;
        foreach ($routes as $route) {
            if (strcasecmp((string) ($route['uri'] ?? ''), $target) === 0) {
                return $route;
            }
        }

        foreach ($routes as $route) {
            if (stripos((string) ($route['uri'] ?? ''), 'How-It-Works') !== false && (($route['method'] ?? '') === 'show')) {
                return $route;
            }
        }

        return null;
    }

    private function extractTopics(string $text): array
    {
        $text = strtolower((string) preg_replace('/[^a-z0-9\s-]+/', ' ', $text));
        $parts = preg_split('/\s+/', $text) ?: [];
        $stopWords = ['the', 'and', 'for', 'with', 'from', 'that', 'this', 'your', 'into', 'how', 'works', 'page', 'guide'];

        $topics = [];
        foreach ($parts as $part) {
            $part = trim($part);
            if ($part === '' || strlen($part) < 4 || in_array($part, $stopWords, true)) {
                continue;
            }
            $topics[] = $part;
        }

        return array_values(array_unique(array_slice($topics, 0, 12)));
    }

    private function slugify(string $value): string
    {
        $value = str_replace('_', '-', $value);
        $value = preg_replace('/[^a-zA-Z0-9-]+/', '-', $value);
        $value = preg_replace('/-+/', '-', $value);

        return strtolower(trim((string) $value, '-'));
    }

    private function readJsonFile(string $path): array
    {
        if (! is_file($path)) {
            return [];
        }

        $decoded = json_decode((string) file_get_contents($path), true);
        return is_array($decoded) ? $decoded : [];
    }

    /** @return string[] */
    private function collectFiles(string $basePath, string $extension): array
    {
        if (! is_dir($basePath)) {
            return [];
        }

        $files = [];
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($basePath));
        foreach ($iterator as $file) {
            if (! $file->isFile()) {
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

    private function relativePath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        return str_starts_with($normalized, $root . '/') ? substr($normalized, strlen($root) + 1) : $normalized;
    }
}
