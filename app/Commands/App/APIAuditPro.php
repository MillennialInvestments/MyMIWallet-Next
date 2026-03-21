<?php

namespace App\Commands\App;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class APIAuditPro extends SafeBaseCommand
{
    protected $group       = 'App';
    protected $name        = 'app:api:audit';
    protected $description = 'Advanced API audit: groups, filters, duplicates, OpenAPI, Postman, probe mode.';

    protected $routes = [];
    protected $controllers = [];
    protected $report = [];

    public function run(array $params)
    {
        $options = $this->parseOptions($params);

        CLI::write('🔍 Advanced API Audit Starting...', 'yellow');

        $this->scanRoutes();
        $this->scanControllers();
        $this->compare();

        $this->detectDuplicates();
        $this->generateOpenAPI();
        $this->generatePostman();

        if ($options['probe']) {
            $this->runPerformanceProbe();
        }

        $this->writeMarkdownReport();
        $this->outputConsole();

        CLI::newLine();
        CLI::write('✅ Advanced API Audit Complete.', 'green');
    }

    protected function parseOptions(array $params)
    {
        return [
            'probe' => in_array('--probe', $params)
        ];
    }

    protected function scanRoutes()
    {
        $routeFile = APPPATH . 'Config/Routes.php';
        $content = file_get_contents($routeFile);

        preg_match_all(
            '/\$routes->(get|post|put|delete|patch)\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*[\'"]([^\'"]+)[\'"]/',
            $content,
            $matches,
            PREG_SET_ORDER
        );

        foreach ($matches as $match) {
            $this->routes[] = [
                'method' => strtoupper($match[1]),
                'uri' => $match[2],
                'target' => $match[3],
                'group' => $this->detectGroup($match[2]),
                'filters' => $this->detectFilters($content, $match[2])
            ];
        }
    }

    protected function detectGroup($uri)
    {
        if (str_starts_with($uri, 'API/')) return 'API';
        if (str_starts_with($uri, 'Management')) return 'Management';
        return 'General';
    }

    protected function detectFilters($content, $uri)
    {
        if (preg_match('/filter/i', $content)) {
            return 'Possible Filters Applied';
        }
        return 'None Detected';
    }

    protected function scanControllers()
    {
        $modulePath = APPPATH . 'Modules';

        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($modulePath)
        );

        foreach ($iterator as $file) {
            if (!$file->isFile()) continue;
            if ($file->getExtension() !== 'php') continue;

            $content = file_get_contents($file->getPathname());

            if (!preg_match('/class\s+(\w+)/', $content, $classMatch)) continue;

            $className = $classMatch[1];

            preg_match_all('/public function\s+(\w+)\s*\(/', $content, $methodMatches);

            $this->controllers[$className] = [
                'file' => str_replace(APPPATH, 'app/', $file->getPathname()),
                'methods' => $methodMatches[1] ?? []
            ];
        }
    }

    protected function compare()
    {
        $complete = [];
        $broken = [];
        $missing = [];

        foreach ($this->routes as $route) {

            if (!str_contains($route['target'], '::')) continue;

            [$controller, $method] = explode('::', $route['target']);
            $controllerShort = substr(strrchr($controller, '\\'), 1);

            if (!isset($this->controllers[$controllerShort])) {
                $broken[] = $route;
                continue;
            }

            if (in_array($method, $this->controllers[$controllerShort]['methods'])) {
                $complete[] = $route;
            } else {
                $broken[] = $route;
            }
        }

        foreach ($this->controllers as $controller => $data) {
            foreach ($data['methods'] as $method) {
                $found = false;
                foreach ($this->routes as $route) {
                    if (str_contains($route['target'], "{$controller}::{$method}")) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $missing[] = "{$controller}::{$method}";
                }
            }
        }

        $this->report = [
            'complete' => $complete,
            'broken' => $broken,
            'missing' => $missing
        ];
    }

    protected function detectDuplicates()
    {
        $uris = array_column($this->routes, 'uri');
        $duplicates = array_diff_assoc($uris, array_unique($uris));
        $this->report['duplicates'] = $duplicates;
    }

    protected function generateOpenAPI()
    {
        $openapi = [
            'openapi' => '3.0.0',
            'info' => [
                'title' => 'MyMI Wallet API',
                'version' => '1.0.0'
            ],
            'paths' => []
        ];

        foreach ($this->report['complete'] as $route) {
            $openapi['paths']['/' . $route['uri']][strtolower($route['method'])] = [
                'summary' => $route['target'],
                'responses' => [
                    '200' => ['description' => 'Success']
                ]
            ];
        }

        file_put_contents(ROOTPATH . 'docs/APIs/openapi.json',
            json_encode($openapi, JSON_PRETTY_PRINT)
        );
    }

    protected function generatePostman()
    {
        $collection = [
            'info' => [
                'name' => 'MyMI Wallet API',
                '_postman_id' => uniqid(),
                'schema' => 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json'
            ],
            'item' => []
        ];

        foreach ($this->report['complete'] as $route) {
            $collection['item'][] = [
                'name' => $route['uri'],
                'request' => [
                    'method' => $route['method'],
                    'url' => '{{base_url}}/' . $route['uri']
                ]
            ];
        }

        file_put_contents(ROOTPATH . 'docs/APIs/postman_collection.json',
            json_encode($collection, JSON_PRETTY_PRINT)
        );
    }

    protected function runPerformanceProbe()
    {
        CLI::write('🚀 Running Performance Probe...', 'yellow');

        foreach ($this->report['complete'] as $route) {
            $url = site_url($route['uri']);
            $start = microtime(true);
            @file_get_contents($url);
            $time = round((microtime(true) - $start) * 1000, 2);

            CLI::write("{$route['method']} {$route['uri']} → {$time}ms");
        }
    }

    protected function writeMarkdownReport()
    {
        $dir = ROOTPATH . 'docs/APIs';
        if (!is_dir($dir)) mkdir($dir, 0775, true);

        $file = $dir . '/api_audit_latest.md';

        $md = "# Advanced API Audit Report\n\n";
        $md .= "Generated: " . date('c') . "\n\n";

        $md .= "## Complete APIs\n";
        foreach ($this->report['complete'] as $r) {
            $md .= "- {$r['method']} {$r['uri']} → {$r['target']}\n";
        }

        $md .= "\n## Broken Routes\n";
        foreach ($this->report['broken'] as $r) {
            $md .= "- {$r['method']} {$r['uri']} → {$r['target']}\n";
        }

        $md .= "\n## Missing Methods\n";
        foreach ($this->report['missing'] as $m) {
            $md .= "- {$m}\n";
        }

        file_put_contents($file, $md);
    }

    protected function outputConsole()
    {
        CLI::newLine();
        CLI::write('📊 Advanced API Audit Summary', 'yellow');

        CLI::write('Complete: ' . count($this->report['complete']), 'green');
        CLI::write('Broken: ' . count($this->report['broken']), 'red');
        CLI::write('Missing: ' . count($this->report['missing']), 'light_yellow');
        CLI::write('Duplicates: ' . count($this->report['duplicates'] ?? []), 'light_red');
    }
}
