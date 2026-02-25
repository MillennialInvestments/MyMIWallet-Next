<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use CodeIgniter\Config\Services;

class FormIntelligenceService
{
    public function analyze(array $sourceSpec): array
    {
        helper(['url']);

        $html = $this->loadSource($sourceSpec);
        $html = $this->normalizeHtml($html);

        $forms = $this->extractForms($html);

        // Take the first form for v1; expand later to loop all forms.
        $form = $forms[0] ?? null;

        if (!$form) {
            return [
                'ok' => false,
                'error' => 'No <form> found in source.',
                'source' => $sourceSpec,
                'html_preview' => mb_substr($html, 0, 2000),
                'forms' => [],
            ];
        }

        // Map route/controller based on action
        $routeInfo = $this->mapRouteToController($form['action'] ?? '');

        return [
            'ok' => true,
            'source' => $sourceSpec,
            'form' => $form,
            'route' => $routeInfo,
            'html_preview' => mb_substr($html, 0, 2000),
        ];
    }

    private function loadSource(array $sourceSpec): string
    {
        $type  = $sourceSpec['type'] ?? '';
        $value = $sourceSpec['value'] ?? '';

        if ($type === 'text') {
            return (string) $value;
        }

        if ($type === 'file') {
            $real = realpath($value);
            if ($real === false || !is_file($real)) {
                return '';
            }

            // Restrict local file scans to project/application writable scopes.
            $allowedRoots = [
                rtrim(realpath(ROOTPATH) ?: ROOTPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
                rtrim(realpath(APPPATH) ?: APPPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
                rtrim(realpath(WRITEPATH) ?: WRITEPATH, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
            ];

            $withinAllowedRoot = false;
            foreach ($allowedRoots as $root) {
                if (str_starts_with($real, $root)) {
                    $withinAllowedRoot = true;
                    break;
                }
            }

            if (!$withinAllowedRoot) {
                return '';
            }

            $content = @file_get_contents($real);
            return $content === false ? '' : $content;
        }

        // type === 'url'
        // Allow full URL or path
        $url = (string) $value;
        if (!preg_match('#^https?://#i', $url)) {
            // treat as path
            helper(['url']);
            $url = site_url(ltrim($url, '/'));
        }

        $client = Services::curlrequest([
            'timeout' => 20,
            'http_errors' => false,
        ]);

        try {
            $resp = $client->get($url);
            return (string) $resp->getBody();
        } catch (\Throwable $e) {
            return '';
        }
    }

    private function normalizeHtml(string $html): string
    {
        if ($html === '') {
            return '';
        }

        // If user pasted JS snippet only, it's not HTML; still attempt parse.
        // Ensure it has minimal HTML structure so DOMDocument behaves.
        if (!str_contains($html, '<html') && !str_contains($html, '<body')) {
            $html = "<!doctype html><html><head><meta charset='utf-8'></head><body>{$html}</body></html>";
        }

        return $html;
    }

    private function extractForms(string $html): array
    {
        if ($html === '') {
            return [];
        }

        libxml_use_internal_errors(true);

        $dom = new \DOMDocument();
        $dom->loadHTML($html);

        $forms = $dom->getElementsByTagName('form');
        $out = [];

        foreach ($forms as $form) {
            $action = (string) $form->getAttribute('action');
            $method = strtoupper((string) $form->getAttribute('method') ?: 'GET');

            $inputs = [];
            foreach ($form->getElementsByTagName('input') as $input) {
                $name = trim((string) $input->getAttribute('name'));
                if ($name !== '') {
                    $inputs[] = $name;
                }
            }

            foreach ($form->getElementsByTagName('select') as $sel) {
                $name = trim((string) $sel->getAttribute('name'));
                if ($name !== '') {
                    $inputs[] = $name;
                }
            }

            foreach ($form->getElementsByTagName('textarea') as $ta) {
                $name = trim((string) $ta->getAttribute('name'));
                if ($name !== '') {
                    $inputs[] = $name;
                }
            }

            $inputs = array_values(array_unique($inputs));

            $out[] = [
                'action' => $this->normalizeAction($action),
                'method' => $method,
                'inputs' => $inputs,
            ];
        }

        return $out;
    }

    private function normalizeAction(string $action): string
    {
        $action = trim($action);

        if ($action === '' || $action === '#') {
            return '';
        }

        // Strip base URL to get relative path if a full URL is present
        if (preg_match('#^https?://#i', $action)) {
            $parts = parse_url($action);
            $path = $parts['path'] ?? '';
            $query = isset($parts['query']) ? ('?' . $parts['query']) : '';
            return $path . $query;
        }

        return $action;
    }

    public function mapRouteToController(string $action): array
    {
        helper(['url']);

        $actionPath = trim($action);

        // If blank action: could be current URL; no good route mapping in CLI context
        if ($actionPath === '' || $actionPath === '#') {
            return [
                'matched' => false,
                'route' => null,
                'controller' => null,
                'note' => 'Form action was blank. Cannot map route reliably.',
            ];
        }

        // Normalize to path only (strip domain), remove query for matching
        $pathOnly = $actionPath;
        if (preg_match('#^https?://#i', $pathOnly)) {
            $pathOnly = (string) (parse_url($pathOnly, PHP_URL_PATH) ?? $pathOnly);
        }

        $pathOnly = '/' . ltrim($pathOnly, '/');
        $pathOnlyNoQuery = explode('?', $pathOnly, 2)[0];

        // Load CI4 routes
        $routes = Services::routes();
        // In CI4 CLI contexts routes might not be loaded. Ensure app routes file is included.
        $routesFile = APPPATH . 'Config/Routes.php';
        if (is_file($routesFile)) {
            // include_once safe
            include_once $routesFile;
        }

        $all = $routes->getRoutes();
        $bestMatch = null;

        foreach ($all as $routePattern => $handler) {
            $normalizedPattern = '/' . ltrim((string) $routePattern, '/');

            if ($normalizedPattern === $pathOnlyNoQuery) {
                $bestMatch = [$routePattern, $handler, 'exact'];
                break;
            }

            $regex = $this->routePatternToRegex($normalizedPattern);
            if ($regex !== null && preg_match($regex, $pathOnlyNoQuery) === 1) {
                $bestMatch = [$routePattern, $handler, 'regex'];
                break;
            }

            if (str_contains($pathOnlyNoQuery, trim($normalizedPattern, '/')) || str_contains($normalizedPattern, trim($pathOnlyNoQuery, '/'))) {
                if ($bestMatch === null) {
                    $bestMatch = [$routePattern, $handler, 'fuzzy'];
                }
            }
        }

        if (!$bestMatch) {
            return [
                'matched' => false,
                'route' => null,
                'controller' => null,
                'note' => 'No route matched action path: ' . $pathOnlyNoQuery,
            ];
        }

        [$routePattern, $handler, $matchType] = $bestMatch;

        $controllerClass = null;

        // Handler may be "Controller::method" or Closure
        if (is_string($handler) && str_contains($handler, '::')) {
            $controllerClass = explode('::', $handler, 2)[0];
        }

        return [
            'matched' => true,
            'route' => (string) $routePattern,
            'handler' => is_string($handler) ? $handler : gettype($handler),
            'controller' => $controllerClass,
            'match_type' => $matchType,
            'note' => null,
        ];
    }

    private function routePatternToRegex(string $pattern): ?string
    {
        if ($pattern === '') {
            return null;
        }

        $regex = preg_quote($pattern, '#');
        $map = [
            '\(:num\)' => '([0-9]+)',
            '\(:segment\)' => '([^/]+)',
            '\(:any\)' => '(.+)',
            '\(:alpha\)' => '([a-zA-Z]+)',
            '\(:alphanum\)' => '([a-zA-Z0-9]+)',
            '\(:hash\)' => '([^/]+)',
        ];

        $regex = strtr($regex, $map);

        return '#^' . $regex . '$#u';
    }
}
