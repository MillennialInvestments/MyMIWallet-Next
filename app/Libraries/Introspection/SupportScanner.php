<?php

namespace App\Libraries\Introspection;

use Config\Services;

/**
 * SupportScanner builds an inventory of support-related
 * routes, controllers, and views within the application.
 *
 * It can be executed via the SupportInventory command to
 * generate a human readable inventory and a machine
 * readable manifest.
 */
#[\AllowDynamicProperties]
class SupportScanner
{
    /**
     * Path to the application directory.
     */
    protected string $appPath;

    public function __construct(?string $appPath = null)
    {
        $this->appPath = rtrim($appPath ?? APPPATH, '/');
    }

    /**
     * Perform a full scan and write outputs to disk.
     *
     * @return array Manifest array
     */
    public function scan(): array
    {
        $routes      = $this->scanRoutes();
        $controllers = $this->scanControllers();
        $articles    = $this->scanViews();

        $manifest = [
            'routes'      => $routes,
            'articles'    => $articles,
            'controllers' => $controllers,
            'forms'       => [], // placeholder for future enhancement
        ];

        $this->writeManifest($manifest);
        $this->writeInventory($manifest);

        return $manifest;
    }

    /**
     * Locate support routes in the application route collection.
     */
    protected function scanRoutes(): array
    {
        $collection = Services::routes(true);
        $verbs      = ['get', 'post', 'put', 'delete', 'patch'];
        $routes     = [];

        foreach ($verbs as $verb) {
            foreach ($collection->getRoutes($verb) as $uri => $handler) {
                if (stripos($uri, 'support') === false) {
                    continue;
                }

                [$controller, $method] = $this->parseHandler($handler);

                $routes[] = [
                    'verb'       => strtoupper($verb),
                    'uri'        => $uri,
                    'controller' => $controller,
                    'method'     => $method,
                ];
            }
        }

        return $routes;
    }

    /**
     * Discover controllers with "Support" in their class name.
     */
    protected function scanControllers(): array
    {
        $controllers = [];
        $modulesPath = $this->appPath . '/Modules';

        foreach (glob($modulesPath . '/*', GLOB_ONLYDIR) as $moduleDir) {
            $controllerPath = $moduleDir . '/Controllers';
            if (! is_dir($controllerPath)) {
                continue;
            }

            foreach (glob($controllerPath . '/*Support*.php') as $file) {
                $module     = basename($moduleDir);
                $class      = basename($file, '.php');
                $namespace  = 'App\\Modules\\' . $module . '\\Controllers\\' . $class;
                $controllers[] = [
                    'class' => $namespace,
                    'path'  => trim(str_replace($this->appPath . '/', '', $file)),
                ];
            }
        }

        return $controllers;
    }

    /**
     * Enumerate support view files and derive article data.
     */
    protected function scanViews(): array
    {
        $articles    = [];
        $modulesPath = $this->appPath . '/Modules';

        foreach (glob($modulesPath . '/*', GLOB_ONLYDIR) as $moduleDir) {
            $viewsPath = $moduleDir . '/Views';
            if (! is_dir($viewsPath)) {
                continue;
            }

            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($viewsPath)
            );

            foreach ($iterator as $file) {
                if (! $file->isFile()) {
                    continue;
                }

                $pathName = $file->getPathname();
                if (stripos($pathName, 'Support') === false && stripos($pathName, 'support') === false) {
                    continue;
                }

                $relative   = trim(str_replace($this->appPath . '/', '', $pathName), '/');
                $slug       = strtolower(preg_replace('/\.(php|md)$/', '', str_replace('Views/', '', $relative)));
                $title      = $this->extractTitle($pathName) ?: $slug;
                $modified   = gmdate('c', $file->getMTime());

                $articles[] = [
                    'slug'         => $slug,
                    'title'        => $title,
                    'type'         => 'Page',
                    'src'          => $relative,
                    'lastModified' => $modified,
                ];
            }
        }

        return $articles;
    }

    /**
     * Parse a route handler into controller and method parts.
     */
    protected function parseHandler(string $handler): array
    {
        if (strpos($handler, '::') !== false) {
            [$controller, $method] = explode('::', $handler, 2);
        } else {
            $controller = $handler;
            $method     = 'index';
        }

        return [$controller, $method];
    }

    /**
     * Extract the first H1 from a file to use as the title.
     */
    protected function extractTitle(string $path): ?string
    {
        $contents = @file_get_contents($path);
        if ($contents === false) {
            return null;
        }

        if (preg_match('/<h1[^>]*>([^<]+)<\/h1>/i', $contents, $match)) {
            return trim($match[1]);
        }

        if (preg_match('/^#\s*(.+)$/m', $contents, $match)) {
            return trim($match[1]);
        }

        return null;
    }

    /**
     * Write manifest JSON file.
     */
    public function writeManifest(array $manifest): void
    {
        $path = WRITEPATH . 'checklists/support-manifest.json';
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }
        file_put_contents($path, json_encode($manifest, JSON_PRETTY_PRINT));
    }

    /**
     * Write inventory markdown file.
     */
    public function writeInventory(array $manifest): void
    {
        $path = FCPATH . 'assets/documents/support-inventory.md';
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0777, true);
        }

        $md  = "# Support Inventory\n\n";
        $md .= "## Routes\n";
        foreach ($manifest['routes'] as $route) {
            $md .= sprintf("- %s %s (%s::%s)\n", $route['verb'], $route['uri'], $route['controller'], $route['method']);
        }
        $md .= "\n## Articles\n";
        foreach ($manifest['articles'] as $article) {
            $md .= sprintf("- [%s](%s) — %s\n", $article['title'], $article['slug'], $article['src']);
        }

        file_put_contents($path, $md);
    }
}
?>
