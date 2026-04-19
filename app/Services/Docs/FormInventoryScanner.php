<?php

declare(strict_types=1);

namespace App\Services\Docs;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class FormInventoryScanner
{
    /** @var array<int, array<string, mixed>> */
    private array $routes = [];

    /** @var array<string, array<string, mixed>> */
    private array $controllers = [];

    /** @var array<int, array<string, mixed>> */
    private array $jsHandlers = [];

    /** @param array<string, mixed> $options */
    public function scan(array $options = []): array
    {
        $moduleFilter = isset($options['module']) ? (string) $options['module'] : null;
        $withJs = (bool) ($options['with_js'] ?? false);
        $withControllerAnalysis = (bool) ($options['with_controller_analysis'] ?? false);

        $this->routes = $this->scanRoutes();
        if ($withControllerAnalysis) {
            $this->controllers = $this->scanControllers();
        }
        if ($withJs) {
            $this->jsHandlers = $this->scanJsHandlers();
        }

        $forms = [];
        foreach ($this->collectViewFiles($moduleFilter) as $viewFile) {
            $forms = array_merge($forms, $this->scanFormsInView($viewFile, $withJs, $withControllerAnalysis));
        }

        $relationships = [];
        $riskReport = [];
        foreach ($forms as $form) {
            $formId = (string) ($form['id'] ?? $this->fallbackFormId($form));

            if (! empty($form['route_match']['uri'])) {
                $relationships[] = ['from' => $formId, 'to' => (string) $form['route_match']['uri'], 'type' => 'form_to_route'];
            }
            if (! empty($form['controller'])) {
                $relationships[] = ['from' => $formId, 'to' => (string) $form['controller'], 'type' => 'form_to_controller'];
            }
            foreach ((array) ($form['services_used'] ?? []) as $service) {
                $relationships[] = ['from' => $formId, 'to' => (string) $service, 'type' => 'form_to_service'];
            }
            foreach ((array) ($form['models_used'] ?? []) as $model) {
                $relationships[] = ['from' => $formId, 'to' => (string) $model, 'type' => 'form_to_model'];
            }
            foreach ((array) ($form['js_dependencies'] ?? []) as $jsDep) {
                $relationships[] = ['from' => $formId, 'to' => (string) ($jsDep['file'] ?? 'unknown'), 'type' => 'form_to_js_handler'];
            }
            foreach ((array) ($form['risks'] ?? []) as $risk) {
                $relationships[] = ['from' => $formId, 'to' => (string) $risk, 'type' => 'form_to_risk'];
            }

            $riskReport[] = [
                'id' => $formId,
                'file' => $form['file'],
                'module' => $form['module'],
                'action' => $form['action'],
                'method' => $form['method'],
                'risks' => $form['risks'],
            ];
        }

        return [
            'generated_at' => date(DATE_ATOM),
            'forms' => $forms,
            'formRelationships' => $relationships,
            'risks' => $riskReport,
        ];
    }

    /** @return string[] */
    private function collectViewFiles(?string $moduleFilter = null): array
    {
        $base = APPPATH . 'Modules';
        if (! is_dir($base)) {
            return [];
        }

        $files = [];
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($base, RecursiveDirectoryIterator::SKIP_DOTS));
        foreach ($it as $file) {
            if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
                continue;
            }

            $path = str_replace('\\', '/', $file->getPathname());
            if (! str_contains($path, '/Views/')) {
                continue;
            }
            if ($moduleFilter !== null && ! str_contains($path, '/Modules/' . $moduleFilter . '/')) {
                continue;
            }

            $files[] = $file->getPathname();
        }

        sort($files);
        return $files;
    }

    /** @return array<int, array<string, mixed>> */
    private function scanFormsInView(string $file, bool $withJs, bool $withControllerAnalysis): array
    {
        $content = (string) file_get_contents($file);
        if ($content === '') {
            return [];
        }

        $forms = [];
        $formOpeners = [];

        if (preg_match_all('/<form\b([^>]*)>/i', $content, $matches, PREG_OFFSET_CAPTURE)) {
            foreach ($matches[0] as $idx => $openMatch) {
                $formOpeners[] = [
                    'open_style' => 'html',
                    'tag' => $openMatch[0],
                    'attrs' => $matches[1][$idx][0] ?? '',
                    'offset' => (int) $openMatch[1],
                ];
            }
        }

        if (preg_match_all('/<?=?\s*form_open(_multipart)?\((.*?)\);?\s*\?>/si', $content, $matches, PREG_OFFSET_CAPTURE)) {
            foreach ($matches[0] as $idx => $openMatch) {
                $multipart = ($matches[1][$idx][0] ?? '') === '_multipart';
                $formOpeners[] = [
                    'open_style' => $multipart ? 'form_open_multipart' : 'form_open',
                    'tag' => $openMatch[0],
                    'attrs' => $matches[2][$idx][0] ?? '',
                    'offset' => (int) $openMatch[1],
                ];
            }
        }

        usort($formOpeners, static fn ($a, $b) => $a['offset'] <=> $b['offset']);

        foreach ($formOpeners as $index => $opener) {
            $form = $this->buildFormObject($file, $content, $opener, $index, $withJs, $withControllerAnalysis);
            $forms[] = $form;
        }

        return $forms;
    }

    /** @return array<string, mixed> */
    private function buildFormObject(string $file, string $viewContent, array $opener, int $index, bool $withJs, bool $withControllerAnalysis): array
    {
        $line = substr_count(substr($viewContent, 0, (int) $opener['offset']), "\n") + 1;
        $module = $this->extractModule($file);
        $relativeFile = $this->relativePath($file);

        $formId = null;
        $formClass = null;
        $method = null;
        $action = null;
        $enctype = null;

        if ($opener['open_style'] === 'html') {
            $attrs = $this->parseHtmlAttributes((string) $opener['attrs']);
            $formId = $attrs['id'] ?? null;
            $formClass = $attrs['class'] ?? null;
            $method = isset($attrs['method']) ? strtoupper($attrs['method']) : null;
            $action = $attrs['action'] ?? null;
            $enctype = $attrs['enctype'] ?? null;
        } else {
            $argsText = (string) $opener['attrs'];
            $args = $this->splitTopLevelArgs($argsText);
            $rawAction = $args[0] ?? '';
            $rawAttrs = $args[1] ?? '';

            $action = $this->resolvePhpExpression($rawAction, $viewContent);
            $kv = $this->parsePhpArrayLiteral($rawAttrs);
            $formId = $kv['id'] ?? null;
            $formClass = $kv['class'] ?? null;
            $method = isset($kv['method']) ? strtoupper((string) $kv['method']) : 'POST';
            $enctype = $opener['open_style'] === 'form_open_multipart' ? 'multipart/form-data' : ($kv['enctype'] ?? null);
        }

        $closeHtmlPos = strpos($viewContent, '</form>', (int) $opener['offset']);
        $closeHelperPos = strpos($viewContent, 'form_close()', (int) $opener['offset']);
        $endPos = strlen($viewContent);
        if ($closeHtmlPos !== false || $closeHelperPos !== false) {
            $candidates = array_filter([$closeHtmlPos, $closeHelperPos], static fn ($v) => $v !== false);
            $endPos = (int) min($candidates);
        }

        $formSegment = substr($viewContent, (int) $opener['offset'], max(0, $endPos - (int) $opener['offset']));

        $inputInfo = $this->extractInputs($formSegment);
        $includedPartials = $this->extractIncludedViews($formSegment, dirname($file));
        foreach ($includedPartials as $partialPath) {
            $partialContent = (string) file_get_contents($partialPath);
            $partialInputs = $this->extractInputs($partialContent);
            $inputInfo['fields'] = array_values(array_unique(array_merge($inputInfo['fields'], $partialInputs['fields'])));
            $inputInfo['hidden_fields'] = array_values(array_unique(array_merge($inputInfo['hidden_fields'], $partialInputs['hidden_fields'])));
            $inputInfo['required_fields'] = array_values(array_unique(array_merge($inputInfo['required_fields'], $partialInputs['required_fields'])));
            $inputInfo['file_fields'] = array_values(array_unique(array_merge($inputInfo['file_fields'], $partialInputs['file_fields'])));
            $inputInfo['submit_buttons'] = array_values(array_unique(array_merge($inputInfo['submit_buttons'], $partialInputs['submit_buttons'])));
        }

        $viewDependencies = $this->extractViewDependencies($formSegment, $viewContent, $includedPartials);
        $csrfMode = $this->detectCsrfMode($formSegment, (string) $method, $opener['open_style']);
        $multipart = ($opener['open_style'] === 'form_open_multipart') || (is_string($enctype) && stripos($enctype, 'multipart/form-data') !== false);

        $routeMatch = $this->matchRoute($action, (string) $method);
        $controller = $routeMatch['controller'] ?? null;
        $controllerMethod = $routeMatch['controller_method'] ?? null;

        $servicesUsed = [];
        $modelsUsed = [];
        $validationUsage = [];
        $expectedPostKeys = [];
        $authDependency = $routeMatch['auth_dependency'] ?? 'unknown';

        if ($withControllerAnalysis && $controller !== null && $controllerMethod !== null) {
            $analysis = $this->analyzeControllerMethod($controller, $controllerMethod);
            $servicesUsed = $analysis['services_used'];
            $modelsUsed = $analysis['models_used'];
            $validationUsage = $analysis['validation_usage'];
            $expectedPostKeys = $analysis['expected_post_keys'];
            $authDependency = $analysis['auth_dependency'];
        }

        $jsDependencies = [];
        $submitHandlers = [];
        if ($withJs) {
            [$submitHandlers, $jsDependencies] = $this->matchJsHandlers($formId, $formClass, $inputInfo['fields'], $action);
        }

        $risks = $this->evaluateRisks([
            'method' => $method,
            'action' => $action,
            'csrf_mode' => $csrfMode,
            'open_style' => $opener['open_style'],
            'form_segment' => $formSegment,
            'route_match' => $routeMatch,
            'controller' => $controller,
            'controller_method' => $controllerMethod,
            'services_used' => $servicesUsed,
            'models_used' => $modelsUsed,
            'validation_usage' => $validationUsage,
            'submit_handlers' => $submitHandlers,
            'js_dependencies' => $jsDependencies,
            'multipart' => $multipart,
            'file_fields' => $inputInfo['file_fields'],
            'hidden_fields' => $inputInfo['hidden_fields'],
            'expected_post_keys' => $expectedPostKeys,
            'form_fields' => $inputInfo['fields'],
            'auth_dependency' => $authDependency,
        ]);

        return [
            'id' => $formId ?: $this->fallbackFormId(['file' => $relativeFile, 'line' => $line, 'index' => $index]),
            'file' => $relativeFile,
            'module' => $module,
            'line' => $line,
            'open_style' => $opener['open_style'],
            'form_class' => $formClass,
            'method' => $method,
            'action' => $action,
            'route_match' => $routeMatch,
            'controller' => $controller,
            'controller_method' => $controllerMethod,
            'services_used' => $servicesUsed,
            'models_used' => $modelsUsed,
            'validation_usage' => $validationUsage,
            'fields' => $inputInfo['fields'],
            'hidden_fields' => $inputInfo['hidden_fields'],
            'required_fields' => $inputInfo['required_fields'],
            'file_fields' => $inputInfo['file_fields'],
            'submit_handlers' => $submitHandlers,
            'submit_buttons' => $inputInfo['submit_buttons'],
            'js_dependencies' => $jsDependencies,
            'view_dependencies' => $viewDependencies,
            'csrf_mode' => $csrfMode,
            'auth_dependency' => $authDependency,
            'enctype' => $enctype,
            'multipart' => $multipart,
            'risks' => $risks,
        ];
    }

    /** @return array<string, string> */
    private function parseHtmlAttributes(string $attrs): array
    {
        $result = [];
        if (preg_match_all('/([a-zA-Z_:][a-zA-Z0-9_:\-]*)\s*=\s*(["\'])(.*?)\2/s', $attrs, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $result[strtolower($match[1])] = trim($match[3]);
            }
        }
        return $result;
    }

    /** @return string[] */
    private function splitTopLevelArgs(string $input): array
    {
        $args = [];
        $buffer = '';
        $depth = 0;
        $quote = null;
        $len = strlen($input);

        for ($i = 0; $i < $len; $i++) {
            $char = $input[$i];
            if ($quote !== null) {
                $buffer .= $char;
                if ($char === $quote && ($i === 0 || $input[$i - 1] !== '\\')) {
                    $quote = null;
                }
                continue;
            }

            if ($char === '"' || $char === "'") {
                $quote = $char;
                $buffer .= $char;
                continue;
            }

            if ($char === '(' || $char === '[' || $char === '{') {
                $depth++;
            } elseif ($char === ')' || $char === ']' || $char === '}') {
                $depth = max(0, $depth - 1);
            }

            if ($char === ',' && $depth === 0) {
                $args[] = trim($buffer);
                $buffer = '';
                continue;
            }

            $buffer .= $char;
        }

        if (trim($buffer) !== '') {
            $args[] = trim($buffer);
        }

        return $args;
    }

    /** @return array<string, string> */
    private function parsePhpArrayLiteral(string $arrayText): array
    {
        $result = [];
        if ($arrayText === '') {
            return $result;
        }

        if (preg_match_all('/[\'\"]([A-Za-z0-9_\-]+)[\'\"]\s*=>\s*[\'\"]([^\'\"]*)[\'\"]/m', $arrayText, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $match) {
                $result[$match[1]] = $match[2];
            }
        }

        return $result;
    }

    private function resolvePhpExpression(string $expression, string $context): ?string
    {
        $expression = trim($expression);
        if ($expression === '') {
            return null;
        }

        if (preg_match('/^[\'\"]([^\'\"]+)[\'\"]$/', $expression, $m)) {
            return $m[1];
        }

        if (preg_match('/site_url\(\s*[\'\"]([^\'\"]+)/', $expression, $m)) {
            return '/' . ltrim($m[1], '/');
        }

        if (preg_match('/\$([A-Za-z_][A-Za-z0-9_]*)/', $expression, $m)) {
            $var = $m[1];
            if (preg_match('/\$' . preg_quote($var, '/') . '\s*=\s*site_url\(\s*[\'\"]([^\'\"]+)/', $context, $m2)) {
                return '/' . ltrim($m2[1], '/');
            }
            return '$' . $var;
        }

        return $expression;
    }

    /** @return array{fields: string[], hidden_fields: string[], required_fields: string[], file_fields: string[], submit_buttons: string[]} */
    private function extractInputs(string $content): array
    {
        $content = (string) preg_replace('/<\\?(?:php|=).*?\\?>/s', '', $content);
        $fields = [];
        $hidden = [];
        $required = [];
        $fileFields = [];
        $submitButtons = [];

        if (preg_match_all('/<input\b([^>]*)>/i', $content, $matches)) {
            foreach ($matches[1] as $attrsText) {
                $attrs = $this->parseHtmlAttributes($attrsText);
                $name = $attrs['name'] ?? null;
                $type = strtolower((string) ($attrs['type'] ?? 'text'));
                if ($name !== null) {
                    $fields[] = $name;
                }
                if ($type === 'hidden' && $name !== null) {
                    $hidden[] = $name;
                }
                if ($type === 'file' && $name !== null) {
                    $fileFields[] = $name;
                }
                if (isset($attrs['required']) && $name !== null) {
                    $required[] = $name;
                }
                if ($type === 'submit') {
                    $submitButtons[] = $attrs['id'] ?? $attrs['name'] ?? ($attrs['value'] ?? 'submit');
                }
            }
        }

        foreach (['select', 'textarea'] as $tag) {
            if (preg_match_all('/<' . $tag . '\b([^>]*)>/i', $content, $matches)) {
                foreach ($matches[1] as $attrsText) {
                    $attrs = $this->parseHtmlAttributes($attrsText);
                    $name = $attrs['name'] ?? null;
                    if ($name !== null) {
                        $fields[] = $name;
                    }
                    if (isset($attrs['required']) && $name !== null) {
                        $required[] = $name;
                    }
                }
            }
        }

        return [
            'fields' => array_values(array_unique($fields)),
            'hidden_fields' => array_values(array_unique($hidden)),
            'required_fields' => array_values(array_unique($required)),
            'file_fields' => array_values(array_unique($fileFields)),
            'submit_buttons' => array_values(array_unique($submitButtons)),
        ];
    }

    /** @return string[] */
    private function extractIncludedViews(string $segment, string $viewDir): array
    {
        $paths = [];
        if (preg_match_all('/view\(\s*[\'\"]([^\'\"]+)[\'\"]/', $segment, $matches)) {
            foreach ($matches[1] as $viewRef) {
                $resolved = $this->resolveViewToPath($viewRef, $viewDir);
                if ($resolved !== null && is_file($resolved)) {
                    $paths[] = $resolved;
                }
            }
        }

        return array_values(array_unique($paths));
    }

    private function resolveViewToPath(string $viewRef, string $viewDir): ?string
    {
        $normalized = str_replace('\\', '/', $viewRef);

        if (str_contains($normalized, 'UserModule/Views/')) {
            $tail = substr($normalized, strpos($normalized, 'UserModule/Views/') + strlen('UserModule/Views/'));
            return APPPATH . 'Modules/User/Views/' . $tail . '.php';
        }

        if (str_contains($normalized, '::')) {
            [$moduleAlias, $tail] = explode('::', $normalized, 2);
            $module = str_replace('Module', '', $moduleAlias);
            return APPPATH . 'Modules/' . $module . '/Views/' . $tail . '.php';
        }

        $candidate = APPPATH . 'Modules/' . $normalized . '.php';
        if (is_file($candidate)) {
            return $candidate;
        }

        $local = $viewDir . '/' . basename($normalized) . '.php';
        if (is_file($local)) {
            return $local;
        }

        return null;
    }

    /** @param string[] $partials */
    private function extractViewDependencies(string $formSegment, string $wholeView, array $partials): array
    {
        $vars = [];
        preg_match_all('/\$[A-Za-z_][A-Za-z0-9_]*/', $formSegment . "\n" . $wholeView, $matches);
        foreach ($matches[0] as $var) {
            $name = ltrim($var, '$');
            if (in_array($name, ['this', '_SESSION', '_POST', '_GET', '_REQUEST', 'GLOBALS'], true)) {
                continue;
            }
            $vars[] = '$' . $name;
        }

        foreach ($partials as $partial) {
            $content = (string) file_get_contents($partial);
            preg_match_all('/\$[A-Za-z_][A-Za-z0-9_]*/', $content, $pMatches);
            foreach ($pMatches[0] as $var) {
                $name = ltrim($var, '$');
                if (in_array($name, ['this', '_SESSION', '_POST', '_GET', '_REQUEST', 'GLOBALS'], true)) {
                    continue;
                }
                $vars[] = '$' . $name;
            }
        }

        return array_values(array_unique($vars));
    }

    private function detectCsrfMode(string $formSegment, string $method, string $openStyle): string
    {
        if (stripos($formSegment, 'csrf_field(') !== false) {
            return 'explicit';
        }
        if ($openStyle === 'form_open' || $openStyle === 'form_open_multipart') {
            return 'helper';
        }
        if (strtoupper($method) === 'POST') {
            return 'missing';
        }
        return 'not_required';
    }

    /** @return array<string, mixed> */
    private function matchRoute(?string $action, string $method): array
    {
        if ($action === null || $action === '' || str_starts_with($action, '$')) {
            return [
                'matched' => false,
                'uri' => null,
                'controller' => null,
                'controller_method' => null,
                'route_method' => null,
                'auth_dependency' => 'unknown',
            ];
        }

        $path = parse_url($action, PHP_URL_PATH) ?: $action;
        $path = '/' . trim((string) $path, '/');

        foreach ($this->routes as $route) {
            $uri = (string) ($route['uri'] ?? '');
            $regex = '#^' . preg_quote($uri, '#') . '$#';
            $regex = str_replace(['\(:segment\)', '\(:num\)', '\(:any\)'], ['[^/]+', '[0-9]+', '.+'], $regex);

            $routeMethod = strtoupper((string) ($route['http_method'] ?? 'ANY'));
            $requestedMethod = strtoupper($method ?: 'GET');
            $methodCompatible = in_array($routeMethod, ['ANY', 'MATCH', 'ADD', $requestedMethod], true)
                || ($requestedMethod === 'POST' && in_array($routeMethod, ['POST', 'MATCH', 'ADD'], true));

            if ($methodCompatible && preg_match($regex, $path) === 1) {
                return [
                    'matched' => true,
                    'uri' => $uri,
                    'controller' => $route['controller'] ?? null,
                    'controller_method' => $route['controller_method'] ?? null,
                    'route_method' => $routeMethod,
                    'auth_dependency' => ! empty($route['filters']) ? implode(',', (array) $route['filters']) : 'unknown',
                ];
            }
        }

        return [
            'matched' => false,
            'uri' => null,
            'controller' => null,
            'controller_method' => null,
            'route_method' => null,
            'auth_dependency' => 'unknown',
        ];
    }

    /** @return array<string, mixed> */
    private function analyzeControllerMethod(string $controllerFqcn, string $method): array
    {
        $controller = $this->controllers[$controllerFqcn] ?? null;
        if ($controller === null) {
            return [
                'services_used' => [],
                'models_used' => [],
                'validation_usage' => [],
                'expected_post_keys' => [],
                'auth_dependency' => 'unknown',
                'exists' => false,
                'mutates_data' => false,
            ];
        }

        $methodBody = $controller['methods'][$method]['body'] ?? null;
        if (! is_string($methodBody)) {
            return [
                'services_used' => [],
                'models_used' => [],
                'validation_usage' => [],
                'expected_post_keys' => [],
                'auth_dependency' => 'unknown',
                'exists' => false,
                'mutates_data' => false,
            ];
        }

        $services = [];
        if (preg_match_all('/service\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)|Services::([A-Za-z0-9_]+)/', $methodBody, $serviceMatches, PREG_SET_ORDER)) {
            foreach ($serviceMatches as $match) {
                $services[] = $match[1] ?: $match[2];
            }
        }

        $models = [];
        if (preg_match_all('/\$this->([A-Za-z0-9_]*Model)\b|new\s+([A-Za-z0-9_\\\\]*Model)\s*\(/', $methodBody, $modelMatches, PREG_SET_ORDER)) {
            foreach ($modelMatches as $match) {
                $models[] = $match[1] ?: $match[2];
            }
        }

        $validation = [];
        if (preg_match_all('/validate(?:Data)?\s*\(([^\)]*)\)/', $methodBody, $validationMatches)) {
            $validation = array_map('trim', $validationMatches[1]);
        }

        $expectedKeys = [];
        if (preg_match_all('/getPost\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)|getVar\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)/', $methodBody, $keyMatches, PREG_SET_ORDER)) {
            foreach ($keyMatches as $match) {
                $expectedKeys[] = $match[1] ?: $match[2];
            }
        }
        if (preg_match_all('/\$postPayload\[[\'\"]([^\'\"]+)[\'\"]\]/', $methodBody, $payloadKeys)) {
            $expectedKeys = array_merge($expectedKeys, $payloadKeys[1]);
        }

        $authDependency = (preg_match('/resolveAuthenticatedUserId\(|filter\s*=>\s*[\'\"]login[\'\"]|Please log in/i', $methodBody) === 1)
            ? 'authenticated'
            : 'unknown';

        $mutates = preg_match('/->(insert|save|update|delete)\s*\(/', $methodBody) === 1;

        return [
            'services_used' => array_values(array_unique($services)),
            'models_used' => array_values(array_unique($models)),
            'validation_usage' => array_values(array_unique(array_filter($validation))),
            'expected_post_keys' => array_values(array_unique($expectedKeys)),
            'auth_dependency' => $authDependency,
            'exists' => true,
            'mutates_data' => $mutates,
        ];
    }

    /** @return array{0: array<int, array<string, mixed>>, 1: array<int, array<string, mixed>>} */
    private function matchJsHandlers(?string $formId, ?string $formClass, array $fields, ?string $action): array
    {
        $submitHandlers = [];
        $dependencies = [];

        foreach ($this->jsHandlers as $handler) {
            $selector = (string) ($handler['selector'] ?? '');
            $matched = false;
            if ($formId !== null && $selector !== '' && (str_contains($selector, '#' . $formId) || $selector === $formId)) {
                $matched = true;
            }
            if ($formClass !== null && $selector !== '' && (str_contains($selector, '.' . $formClass) || str_contains($selector, $formClass))) {
                $matched = true;
            }
            if (! $matched && $action !== null && ! empty($handler['endpoint']) && str_contains((string) $handler['endpoint'], trim($action, '/'))) {
                $matched = true;
            }
            if ($matched) {
                $submitHandlers[] = [
                    'type' => $handler['type'],
                    'selector' => $handler['selector'],
                    'endpoint' => $handler['endpoint'] ?? null,
                ];
                $dependencies[] = $handler;
            }
        }

        return [array_values($submitHandlers), array_values($dependencies)];
    }

    /** @param array<string, mixed> $ctx */
    private function evaluateRisks(array $ctx): array
    {
        $risks = [];

        $method = strtoupper((string) ($ctx['method'] ?? ''));
        $action = (string) ($ctx['action'] ?? '');
        if ($method === '') {
            $risks[] = 'missing_method';
        }
        if ($action === '' || $action === '$formAction') {
            $risks[] = 'missing_action';
        }
        if ($method === 'POST' && ($ctx['csrf_mode'] ?? '') === 'missing') {
            $risks[] = 'post_without_csrf';
        }

        $segment = (string) ($ctx['form_segment'] ?? '');
        if (($ctx['open_style'] ?? '') === 'html' && str_contains($segment, 'form_close()')) {
            $risks[] = 'mixed_html_form_with_form_close';
        }
        if (in_array($ctx['open_style'] ?? '', ['form_open', 'form_open_multipart'], true) && stripos($segment, '</form>') !== false) {
            $risks[] = 'helper_open_with_html_close';
        }

        if (! ($ctx['route_match']['matched'] ?? false)) {
            $risks[] = 'action_no_route_match';
        }

        if (($ctx['route_match']['matched'] ?? false) && (($ctx['controller'] ?? null) === null || ($ctx['controller_method'] ?? null) === null)) {
            $risks[] = 'route_controller_method_missing';
        }

        if (! empty($ctx['controller']) && ! empty($ctx['controller_method'])) {
            $analysis = $this->analyzeControllerMethod((string) $ctx['controller'], (string) $ctx['controller_method']);
            if (! $analysis['exists']) {
                $risks[] = 'controller_method_not_found';
            } elseif (! $analysis['mutates_data'] && strtoupper((string) ($ctx['method'] ?? 'GET')) === 'POST') {
                $risks[] = 'controller_no_insert_update_service_call';
            }
        }

        if (! empty($ctx['submit_handlers']) && empty($ctx['route_match']['matched'])) {
            $risks[] = 'js_submit_no_backend_endpoint';
        }

        if (! empty($ctx['file_fields']) && ! (bool) ($ctx['multipart'] ?? false)) {
            $risks[] = 'file_input_without_multipart';
        }

        $hidden = array_map('strval', (array) ($ctx['hidden_fields'] ?? []));
        $expected = array_map('strval', (array) ($ctx['expected_post_keys'] ?? []));
        if (! empty($hidden) && ! empty($expected)) {
            $unused = array_values(array_diff($hidden, $expected));
            if (! empty($unused)) {
                $risks[] = 'hidden_fields_not_read:' . implode(',', array_slice($unused, 0, 8));
            }

            $missing = array_values(array_diff($expected, (array) ($ctx['form_fields'] ?? [])));
            if (! empty($missing)) {
                $risks[] = 'controller_expected_keys_missing:' . implode(',', array_slice($missing, 0, 8));
            }
        }

        if (! empty($ctx['js_dependencies']) && (($ctx['auth_dependency'] ?? '') === 'authenticated' || str_contains((string) ($ctx['auth_dependency'] ?? ''), 'login'))) {
            $hasCredentials = false;
            foreach ((array) $ctx['js_dependencies'] as $dep) {
                $flags = $dep['flags'] ?? [];
                if (in_array('credentials', (array) $flags, true)) {
                    $hasCredentials = true;
                    break;
                }
            }
            if (! $hasCredentials) {
                $risks[] = 'ajax_auth_endpoint_without_credentials';
            }
        }

        return array_values(array_unique($risks));
    }

    /** @return array<int, array<string, mixed>> */
    private function scanRoutes(): array
    {
        $routes = [];
        $routeFiles = [APPPATH . 'Config/Routes.php'];

        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH . 'Modules', RecursiveDirectoryIterator::SKIP_DOTS));
        foreach ($it as $file) {
            if ($file->isFile() && str_ends_with(str_replace('\\', '/', $file->getPathname()), '/Config/Routes.php')) {
                $routeFiles[] = $file->getPathname();
            }
        }

        foreach (array_unique($routeFiles) as $routeFile) {
            if (! is_file($routeFile)) {
                continue;
            }

            $content = (string) file_get_contents($routeFile);
            $prefix = '';
            $namespace = null;
            $filters = [];

            $lines = preg_split('/\R/', $content) ?: [];
            foreach ($lines as $line) {
                $trim = trim($line);

                if (preg_match('/\$routes->group\(\s*[\'\"]([^\'\"]+)[\'\"]\s*,\s*\[(.*?)\]\s*,\s*function/', $trim, $m)) {
                    $prefix = '/' . trim($m[1], '/');
                    if (preg_match('/[\'\"]namespace[\'\"]\s*=>\s*[\'\"]([^\'\"]+)[\'\"]/', $m[2], $ns)) {
                        $namespace = trim($ns[1], '\\');
                    }
                    if (preg_match('/[\'\"]filter[\'\"]\s*=>\s*(\[[^\]]+\]|[\'\"][^\'\"]+[\'\"])/', $m[2], $fm)) {
                        preg_match_all('/[\'\"]([^\'\"]+)[\'\"]/', $fm[1], $fv);
                        $filters = $fv[1] ?? [];
                    }
                    continue;
                }

                if (str_contains($trim, '});')) {
                    $prefix = '';
                    $namespace = null;
                    $filters = [];
                    continue;
                }

                if (preg_match('/\$routes->(get|post|put|delete|patch|add|match)\(\s*(\[[^\]]+\]\s*,\s*)?[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/i', $trim, $m)) {
                    $httpMethod = strtoupper($m[1]);
                    if ($httpMethod === 'MATCH') {
                        $httpMethod = 'MATCH';
                    }

                    $uri = '/' . trim(trim($prefix, '/') . '/' . trim($m[3], '/'), '/');
                    $target = trim($m[4]);
                    $controller = null;
                    $controllerMethod = null;
                    if (str_contains($target, '::')) {
                        [$ctrl, $meth] = explode('::', $target, 2);
                        $ctrl = trim($ctrl, '\\');
                        if ($namespace !== null && ! str_contains($ctrl, '\\')) {
                            $ctrl = $namespace . '\\' . $ctrl;
                        }
                        $controller = $ctrl;
                        $controllerMethod = explode('/', $meth)[0];
                    }

                    $routes[] = [
                        'file' => $this->relativePath($routeFile),
                        'uri' => $uri,
                        'http_method' => $httpMethod,
                        'controller' => $controller,
                        'controller_method' => $controllerMethod,
                        'filters' => $filters,
                    ];
                }
            }
        }

        return $routes;
    }

    /** @return array<string, array<string, mixed>> */
    private function scanControllers(): array
    {
        $controllers = [];
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH . 'Modules', RecursiveDirectoryIterator::SKIP_DOTS));

        foreach ($it as $file) {
            if (! $file->isFile()) {
                continue;
            }
            $path = str_replace('\\', '/', $file->getPathname());
            if (! str_contains($path, '/Controllers/') || strtolower(pathinfo($path, PATHINFO_EXTENSION)) !== 'php') {
                continue;
            }

            $content = (string) file_get_contents($file->getPathname());
            if (! preg_match('/namespace\s+([^;]+);/', $content, $nsMatch) || ! preg_match('/class\s+([A-Za-z0-9_]+)/', $content, $classMatch)) {
                continue;
            }

            $fqcn = trim($nsMatch[1]) . '\\' . trim($classMatch[1]);
            $methods = [];

            if (preg_match_all('/public\s+function\s+([A-Za-z0-9_]+)\s*\([^\)]*\)\s*\{/', $content, $methodMatches, PREG_OFFSET_CAPTURE)) {
                foreach ($methodMatches[1] as $i => $methodMatch) {
                    $name = $methodMatch[0];
                    $fullOffset = $methodMatches[0][$i][1];
                    $openBrace = strpos($content, '{', $fullOffset);
                    if ($openBrace === false) {
                        continue;
                    }
                    $body = $this->extractBracketBody($content, $openBrace);
                    $methods[$name] = [
                        'body' => $body,
                    ];
                }
            }

            $controllers[$fqcn] = [
                'file' => $this->relativePath($file->getPathname()),
                'methods' => $methods,
            ];
        }

        return $controllers;
    }

    private function extractBracketBody(string $content, int $openBracePos): string
    {
        $depth = 0;
        $len = strlen($content);
        for ($i = $openBracePos; $i < $len; $i++) {
            if ($content[$i] === '{') {
                $depth++;
            } elseif ($content[$i] === '}') {
                $depth--;
                if ($depth === 0) {
                    return substr($content, $openBracePos + 1, $i - $openBracePos - 1);
                }
            }
        }

        return substr($content, $openBracePos + 1);
    }

    /** @return array<int, array<string, mixed>> */
    private function scanJsHandlers(): array
    {
        $handlers = [];
        $files = [];
        $scanDirs = [APPPATH . 'Modules', ROOTPATH . 'public'];

        foreach ($scanDirs as $dir) {
            if (! is_dir($dir)) {
                continue;
            }
            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS));
            foreach ($it as $file) {
                if (! $file->isFile()) {
                    continue;
                }
                $ext = strtolower($file->getExtension());
                if (in_array($ext, ['js', 'ts', 'php'], true)) {
                    $files[] = $file->getPathname();
                }
            }
        }

        foreach (array_unique($files) as $file) {
            $content = (string) file_get_contents($file);
            if (stripos($content, 'submit') === false && stripos($content, 'fetch(') === false && stripos($content, '$.ajax') === false) {
                continue;
            }

            $localHandlers = [];
            if (preg_match_all('/addEventListener\(\s*[\'\"]submit[\'\"]\s*,/i', $content, $m, PREG_OFFSET_CAPTURE)) {
                foreach ($m[0] as $match) {
                    $selector = $this->findNearestSelector($content, (int) $match[1]);
                    $localHandlers[] = ['type' => 'addEventListener', 'selector' => $selector, 'offset' => (int) $match[1]];
                }
            }
            if (preg_match_all('/\.on\(\s*[\'\"]submit[\'\"]\s*,/i', $content, $m, PREG_OFFSET_CAPTURE)) {
                foreach ($m[0] as $match) {
                    $selector = $this->findNearestSelector($content, (int) $match[1]);
                    $localHandlers[] = ['type' => 'jquery_on_submit', 'selector' => $selector, 'offset' => (int) $match[1]];
                }
            }

            if (empty($localHandlers)) {
                continue;
            }

            foreach ($localHandlers as $handler) {
                $window = substr($content, max(0, $handler['offset'] - 500), 1500);
                $endpoint = null;
                if (preg_match('/fetch\(\s*[\'\"]([^\'\"]+)[\'\"]/', $window, $fm)) {
                    $endpoint = $fm[1];
                } elseif (preg_match('/url\s*:\s*[\'\"]([^\'\"]+)[\'\"]/', $window, $am)) {
                    $endpoint = $am[1];
                }

                $flags = [];
                if (preg_match('/credentials\s*:\s*[\'\"][^\'\"]+[\'\"]/i', $window)) {
                    $flags[] = 'credentials';
                }
                if (preg_match('/X-Requested-With/i', $window)) {
                    $flags[] = 'x_requested_with';
                }
                if (preg_match('/Accept\s*[:=]\s*[\'\"]application\/json/i', $window)) {
                    $flags[] = 'accept_json';
                }
                if (preg_match('/FormData\s*\(/', $window)) {
                    $flags[] = 'form_data';
                }
                if (preg_match('/authFetch\s*\(/', $window)) {
                    $flags[] = 'auth_fetch';
                }

                $handlers[] = [
                    'file' => $this->relativePath($file),
                    'type' => $handler['type'],
                    'selector' => $handler['selector'],
                    'endpoint' => $endpoint,
                    'flags' => array_values(array_unique($flags)),
                    'form_data' => in_array('form_data', $flags, true),
                ];
            }
        }

        return $handlers;
    }

    private function findNearestSelector(string $content, int $offset): ?string
    {
        $windowStart = max(0, $offset - 240);
        $window = substr($content, $windowStart, 240);

        if (preg_match('/querySelector\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)/', $window, $m)) {
            return $m[1];
        }
        if (preg_match('/getElementById\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)/', $window, $m)) {
            return '#' . $m[1];
        }
        if (preg_match('/\$\(\s*[\'\"]([^\'\"]+)[\'\"]\s*\)/', $window, $m)) {
            return $m[1];
        }

        return null;
    }

    private function extractModule(string $file): string
    {
        $path = str_replace('\\', '/', $file);
        if (preg_match('#/Modules/([^/]+)/#', $path, $m)) {
            return $m[1];
        }

        return 'App';
    }

    private function relativePath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');

        return str_starts_with($normalized, $root . '/') ? substr($normalized, strlen($root) + 1) : $normalized;
    }

    /** @param array<string, mixed> $form */
    private function fallbackFormId(array $form): string
    {
        $file = str_replace('/', '_', (string) ($form['file'] ?? 'unknown'));
        $line = (string) ($form['line'] ?? '0');
        $index = (string) ($form['index'] ?? '0');
        return 'form_' . md5($file . ':' . $line . ':' . $index);
    }
}
