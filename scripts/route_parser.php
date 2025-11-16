<?php
declare(strict_types=1);

namespace {

if (!defined('ENVIRONMENT')) {
    define('ENVIRONMENT', 'production');
}
if (!defined('APPPATH')) {
    define('APPPATH', realpath(__DIR__ . '/../app/') . '/');
}

class RouteCollector
{
    public array $routes = [];
    private string $defaultNamespace = 'App\\Controllers';
    private array $groupStack = [];

    public function setDefaultNamespace(string $namespace): void
    {
        $this->defaultNamespace = trim($namespace, '\\');
    }

    public function setDefaultController(string $controller): void {}
    public function setDefaultMethod(string $method): void {}
    public function setTranslateURIDashes($value): void {}
    public function set404Override($arg = null): void {}
    public function addRedirect($from, $to, $code = 302): void {}
    public function setAutoRoute($value): void {}

    private function pushGroup(string $prefix, array $options): void
    {
        $this->groupStack[] = [
            'prefix' => $prefix,
            'namespace' => $options['namespace'] ?? null,
            'options' => $options,
        ];
    }

    private function popGroup(): void
    {
        array_pop($this->groupStack);
    }

    public function group(string $name, $options, $callback = null): void
    {
        if (is_callable($options) && $callback === null) {
            $callback = $options;
            $options = [];
        }
        if (!is_callable($callback)) {
            return;
        }
        $this->pushGroup($name, $options);
        $callback($this);
        $this->popGroup();
    }

    private function resolveNamespace(): string
    {
        for ($i = count($this->groupStack) - 1; $i >= 0; $i--) {
            $ns = $this->groupStack[$i]['namespace'] ?? null;
            if (!empty($ns)) {
                return trim($ns, '\\');
            }
        }
        return $this->defaultNamespace;
    }

    private function resolvePrefix(): string
    {
        $parts = [];
        foreach ($this->groupStack as $ctx) {
            $prefix = trim($ctx['prefix'], '/');
            if ($prefix !== '') {
                $parts[] = $prefix;
            }
        }
        return implode('/', $parts);
    }

    private function normalizePath(?string $uri): string
    {
        $uri = $uri ?? '';
        $uri = trim($uri);
        if ($uri === '' || $uri === '/') {
            $uri = '';
        }
        $prefix = $this->resolvePrefix();
        $segments = [];
        if ($prefix !== '') {
            $segments[] = $prefix;
        }
        if ($uri !== '') {
            $segments[] = ltrim($uri, '/');
        }
        $path = implode('/', $segments);
        if ($path === '') {
            return '/';
        }
        return '/' . $path;
    }

    private function normalizeHandler($handler): array
    {
        if (!is_string($handler)) {
            return ['controller' => 'closure', 'method' => null];
        }
        $handler = trim($handler);
        if ($handler === '') {
            return ['controller' => 'closure', 'method' => null];
        }
        if (strpos($handler, '::') === false) {
            $controller = $handler;
            $method = 'index';
        } else {
            [$controller, $method] = explode('::', $handler, 2);
        }
        if (str_contains($method, '/')) {
            [$method, ] = explode('/', $method, 2);
        }
        $controller = trim($controller, '\\');
        if (str_contains($controller, '\\')) {
            $class = $controller;
        } else {
            $namespace = $this->resolveNamespace();
            $class = rtrim($namespace, '\\') . '\\' . $controller;
        }
        return ['controller' => $class, 'method' => $method];
    }

    private function addRoute(array $methods, $from, $to, $options = null): void
    {
        $path = $this->normalizePath($from);
        $handler = $this->normalizeHandler($to);
        $this->routes[] = [
            'methods' => $methods,
            'path' => $path,
            'controller' => $handler['controller'],
            'method' => $handler['method'],
            'options' => $options,
        ];
    }

    public function get($from, $to, $options = null): void
    {
        $this->addRoute(['GET'], $from, $to, $options);
    }
    public function post($from, $to, $options = null): void
    {
        $this->addRoute(['POST'], $from, $to, $options);
    }
    public function put($from, $to, $options = null): void
    {
        $this->addRoute(['PUT'], $from, $to, $options);
    }
    public function delete($from, $to, $options = null): void
    {
        $this->addRoute(['DELETE'], $from, $to, $options);
    }
    public function patch($from, $to, $options = null): void
    {
        $this->addRoute(['PATCH'], $from, $to, $options);
    }
    public function match(array $methods, $from, $to, $options = null): void
    {
        $this->addRoute($methods, $from, $to, $options);
    }
    public function cli($from, $to, $options = null): void
    {
        $this->addRoute(['CLI'], $from, $to, $options);
    }
}

function service($name)
{
    return new class {
        public function setJSON($data) { return $data; }
        public function setStatusCode($code) { return $this; }
    };
}

function redirect()
{
    return new class {
        public function to($path) { return $path; }
    };
}

function site_url($path)
{
    return $path;
}

}

namespace Config {
    class Services
    {
        private static ?\RouteCollector $instance = null;
        public static function routes()
        {
            if (self::$instance === null) {
                self::$instance = new \RouteCollector();
            }
            return self::$instance;
        }
    }
}

namespace {
    require __DIR__ . '/../app/Config/Routes.php';
    $collector = Config\Services::routes();
    $routes = $collector->routes;
    file_put_contents('route_dump.json', json_encode($routes, JSON_PRETTY_PRINT));
}
