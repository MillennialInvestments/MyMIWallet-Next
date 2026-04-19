<?php

declare(strict_types=1);

namespace App\Services;

use Config\Services;

class AuthBaselineService
{
    public const BASE_DIR = 'docs/_baseline/auth';

    /**
     * @return array<int, string>
     */
    public function criticalFiles(): array
    {
        return [
            'app/Config/App.php',
            'app/Config/Auth.php',
            'app/Config/Services.php',
            'app/Config/Session.php',
            'app/Config/Filters.php',
            'app/Config/Routes.php',
            'app/Config/Toolbar.php',
            'app/Controllers/AuthController.php',
            'app/Legacy/Auth/Config/Auth.php',
            'app/Auth/CompatAuthAdapter.php',
            'app/Helpers/auth_helper.php',
            'app/Helpers/redirect_url_helper.php',
            'app/Filters/AuthCheckFilter.php',
            'app/Filters/LoginFilter.php',
            'app/Filters/PermissionFilter.php',
            'app/Filters/RoleFilter.php',
            'app/Views/Auth/login.php',
            'app/Views/Auth/register.php',
            'app/Views/Auth/layout.php',
            'public/assets/js/login-init.js',
            'public/.htaccess',
        ];
    }

    /**
     * @return array<int, string>
     */
    public function existingCriticalFiles(): array
    {
        return array_values(array_filter(
            $this->criticalFiles(),
            static fn (string $path): bool => is_file(ROOTPATH . $path)
        ));
    }

    public function timestamp(): string
    {
        return gmdate('Ymd-His');
    }

    public function capture(string $timestamp, bool $runSmoke = true): array
    {
        $historyDir = ROOTPATH . self::BASE_DIR . '/history/' . $timestamp;
        $currentDir = ROOTPATH . self::BASE_DIR . '/current';

        $this->ensureDir($historyDir . '/files');
        $this->ensureDir($currentDir);

        $capturedFiles = $this->existingCriticalFiles();
        $hashes = [];

        foreach ($capturedFiles as $relativePath) {
            $source = ROOTPATH . $relativePath;
            $destination = $historyDir . '/files/' . $relativePath;
            $this->ensureDir(dirname($destination));
            copy($source, $destination);
            $hashes[$relativePath] = hash_file('sha256', $source) ?: '';
        }

        $missingFromRuntime = array_values(array_diff($this->criticalFiles(), $capturedFiles));

        $routesRaw = $this->captureRoutesRaw();
        $routesAuthOnly = $this->parseAuthRoutes($routesRaw);
        $envSnapshot = $this->captureEnvSnapshot();
        $packageSnapshot = $this->capturePackageSnapshot();
        $surface = $this->scanSurface($routesRaw);
        $smoke = $runSmoke ? $this->runSmokeProbes() : ['status' => 'SKIPPED', 'checks' => []];

        file_put_contents($historyDir . '/routes.snapshot.txt', $routesRaw);
        file_put_contents($historyDir . '/routes.auth.json', json_encode($routesAuthOnly, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($historyDir . '/env.auth.json', json_encode($envSnapshot, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($historyDir . '/packages.auth.json', json_encode($packageSnapshot, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($historyDir . '/surface.scan.json', json_encode($surface, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        file_put_contents($historyDir . '/smoke.report.json', json_encode($smoke, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $manifest = [
            'captured_at_utc' => gmdate('c'),
            'timestamp' => $timestamp,
            'baseline_scope' => $this->criticalFiles(),
            'captured_files' => $capturedFiles,
            'missing_from_runtime' => $missingFromRuntime,
            'file_hashes_sha256' => $hashes,
            'runtime_metadata' => [
                'routes_snapshot_sha256' => hash('sha256', $routesRaw),
                'env_snapshot_sha256' => hash('sha256', json_encode($envSnapshot, JSON_UNESCAPED_SLASHES) ?: '{}'),
                'package_snapshot_sha256' => hash('sha256', json_encode($packageSnapshot, JSON_UNESCAPED_SLASHES) ?: '{}'),
                'surface_snapshot_sha256' => hash('sha256', json_encode($surface, JSON_UNESCAPED_SLASHES) ?: '{}'),
                'smoke_snapshot_sha256' => hash('sha256', json_encode($smoke, JSON_UNESCAPED_SLASHES) ?: '{}'),
                'service_runtime' => [
                    'auth' => $this->serviceClass('auth'),
                    'authentication' => $this->serviceClass('authentication'),
                ],
            ],
            'smoke_status' => $smoke['status'] ?? 'UNKNOWN',
        ];

        file_put_contents($historyDir . '/manifest.json', json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $this->copyTree($historyDir, $currentDir);

        return [
            'history_dir' => $this->relative($historyDir),
            'current_dir' => $this->relative($currentDir),
            'manifest' => $manifest,
            'smoke' => $smoke,
        ];
    }

    public function diffAgainstCurrent(): array
    {
        $currentDir = ROOTPATH . self::BASE_DIR . '/current';
        $manifestPath = $currentDir . '/manifest.json';

        if (! is_file($manifestPath)) {
            return ['error' => 'No baseline found. Run auth:baseline:capture first.'];
        }

        $manifest = json_decode((string) file_get_contents($manifestPath), true) ?: [];
        $expectedHashes = $manifest['file_hashes_sha256'] ?? [];

        $changedFiles = [];
        $missingFiles = [];

        foreach ($expectedHashes as $relativePath => $expectedHash) {
            $fullPath = ROOTPATH . $relativePath;

            if (! is_file($fullPath)) {
                $missingFiles[] = $relativePath;
                continue;
            }

            $actualHash = hash_file('sha256', $fullPath) ?: '';
            if (! hash_equals((string) $expectedHash, $actualHash)) {
                $changedFiles[] = [
                    'file' => $relativePath,
                    'expected' => (string) $expectedHash,
                    'actual' => $actualHash,
                ];
            }
        }

        $baselineEnv = json_decode((string) @file_get_contents($currentDir . '/env.auth.json'), true) ?: [];
        $currentEnv = $this->captureEnvSnapshot();
        $envDrift = $this->buildAssocDrift($baselineEnv, $currentEnv);

        $baselinePackages = json_decode((string) @file_get_contents($currentDir . '/packages.auth.json'), true) ?: [];
        $currentPackages = $this->capturePackageSnapshot();
        $packageDrift = [];
        $allPackages = array_unique(array_merge(array_keys($baselinePackages), array_keys($currentPackages)));
        sort($allPackages);

        foreach ($allPackages as $package) {
            $baselineVersion = $baselinePackages[$package]['version'] ?? null;
            $currentVersion = $currentPackages[$package]['version'] ?? null;
            $baselineReference = $baselinePackages[$package]['reference'] ?? null;
            $currentReference = $currentPackages[$package]['reference'] ?? null;

            if ((string) $baselineVersion !== (string) $currentVersion || (string) $baselineReference !== (string) $currentReference) {
                $packageDrift[$package] = [
                    'baseline' => [
                        'version' => $baselineVersion,
                        'reference' => $baselineReference,
                    ],
                    'current' => [
                        'version' => $currentVersion,
                        'reference' => $currentReference,
                    ],
                ];
            }
        }

        $baselineRoutesRaw = (string) @file_get_contents($currentDir . '/routes.snapshot.txt');
        $currentRoutesRaw = $this->captureRoutesRaw();

        $baselineRoutes = $this->parseAuthRoutes($baselineRoutesRaw);
        $currentRoutes = $this->parseAuthRoutes($currentRoutesRaw);

        $baselineSignatures = $this->routeSignatures($baselineRoutes);
        $currentSignatures = $this->routeSignatures($currentRoutes);

        $routeAdded = array_values(array_diff($currentSignatures, $baselineSignatures));
        $routeMissing = array_values(array_diff($baselineSignatures, $currentSignatures));

        return [
            'changed_files' => $changedFiles,
            'missing_files' => $missingFiles,
            'env_drift' => $envDrift,
            'route_drift' => [
                'changed' => $routeAdded !== [] || $routeMissing !== [],
                'added' => $routeAdded,
                'missing' => $routeMissing,
            ],
            'package_drift' => $packageDrift,
        ];
    }

    public function restore(array $options): array
    {
        $timestamp = trim((string) ($options['from'] ?? ''));
        $singleFile = trim((string) ($options['file'] ?? ''));
        $dryRun = (bool) ($options['dry_run'] ?? false);

        $sourceDir = $timestamp !== ''
            ? ROOTPATH . self::BASE_DIR . '/history/' . $timestamp
            : ROOTPATH . self::BASE_DIR . '/current';

        if (! is_dir($sourceDir . '/files')) {
            return ['error' => 'Baseline source not found: ' . $this->relative($sourceDir)];
        }

        $allowed = $this->criticalFiles();
        $targets = [];

        if ($singleFile !== '') {
            if (! in_array($singleFile, $allowed, true)) {
                return ['error' => '--file is not auth-critical: ' . $singleFile];
            }

            $targets[] = $singleFile;
        } else {
            $targets = $allowed;
        }

        $restored = [];
        $skipped = [];

        foreach ($targets as $relativePath) {
            $source = $sourceDir . '/files/' . $relativePath;
            if (! is_file($source)) {
                $skipped[] = $relativePath;
                continue;
            }

            $target = ROOTPATH . $relativePath;
            $this->ensureDir(dirname($target));

            if (! $dryRun) {
                copy($source, $target);
            }

            $restored[] = $relativePath;
        }

        return [
            'source' => $this->relative($sourceDir),
            'dry_run' => $dryRun,
            'restored' => $restored,
            'skipped' => $skipped,
        ];
    }

    public function scanSurface(?string $routesRaw = null): array
    {
        $routesRaw ??= $this->captureRoutesRaw();
        $authRoutes = $this->parseAuthRoutes($routesRaw);

        $loginRegisterRoutes = array_values(array_filter($authRoutes, static function (array $route): bool {
            $uri = strtolower((string) ($route['uri'] ?? ''));
            return str_contains($uri, 'login') || str_contains($uri, 'register');
        }));

        $dashboardRoutes = array_values(array_filter($authRoutes, static function (array $route): bool {
            $uri = strtolower((string) ($route['uri'] ?? ''));
            $handler = strtolower((string) ($route['handler'] ?? ''));
            return str_contains($uri, 'dashboard') || str_contains($handler, 'dashboard');
        }));

        $filtersPath = ROOTPATH . 'app/Config/Filters.php';
        $filterTouches = [];
        $filtersContent = is_file($filtersPath) ? (string) file_get_contents($filtersPath) : '';

        foreach (preg_split('/\R/', $filtersContent) ?: [] as $lineNo => $line) {
            $lower = strtolower($line);
            if (str_contains($lower, 'auth') || str_contains($lower, 'login') || str_contains($lower, 'dashboard') || str_contains($lower, 'permission') || str_contains($lower, 'role')) {
                $filterTouches[] = [
                    'line' => $lineNo + 1,
                    'content' => trim($line),
                ];
            }
        }

        $views = [
            'app/Views/Auth/login.php',
            'app/Views/Auth/register.php',
            'app/Views/Auth/layout.php',
        ];

        $viewBindings = [];
        foreach ($views as $view) {
            $content = (string) @file_get_contents(ROOTPATH . $view);
            $viewBindings[] = [
                'view' => $view,
                'exists' => is_file(ROOTPATH . $view),
                'has_form' => stripos($content, '<form') !== false,
                'mentions_login_or_register' => stripos($content, 'login') !== false || stripos($content, 'register') !== false,
                'has_csrf_hint' => stripos($content, 'csrf') !== false,
            ];
        }

        $jsPath = 'public/assets/js/login-init.js';
        $jsContent = (string) @file_get_contents(ROOTPATH . $jsPath);

        return [
            'active_login_register_routes' => $loginRegisterRoutes,
            'dashboard_redirect_routes' => $dashboardRoutes,
            'active_auth_controller_namespace' => class_exists(\App\Controllers\AuthController::class)
                ? \App\Controllers\AuthController::class
                : 'not found',
            'filters_touching_auth_and_dashboard' => $filterTouches,
            'service_auth_runtime' => $this->serviceClass('auth'),
            'service_authentication_runtime' => $this->serviceClass('authentication'),
            'views_bound_to_auth_forms' => $viewBindings,
            'js_bound_to_auth_forms' => [
                'file' => $jsPath,
                'exists' => is_file(ROOTPATH . $jsPath),
                'mentions_login' => str_contains(strtolower($jsContent), 'login'),
                'mentions_register' => str_contains(strtolower($jsContent), 'register'),
                'mentions_form' => str_contains(strtolower($jsContent), 'form'),
            ],
        ];
    }

    public function runSmokeProbes(): array
    {
        $base = rtrim((string) config('App')->baseURL, '/');
        $checks = [];

        $checks[] = $this->probe('GET', $base . '/login', null, 'GET /login');
        $checks[] = $this->probe('POST', $base . '/login', [
            'login' => 'invalid@example.com',
            'password' => 'invalid-password',
        ], 'POST /login invalid credentials');
        $checks[] = $this->probe('GET', $base . '/register', null, 'GET /register');
        $checks[] = $this->probe('POST', $base . '/register', [
            'email' => 'invalid-email',
            'password' => 'x',
            'pass_confirm' => 'y',
        ], 'POST /register invalid payload');
        $checks[] = $this->probe('GET', $base . '/activate-account', null, 'activation route probe');
        $checks[] = $this->probe('GET', $base . '/forgot-password', null, 'reset password probe');
        $checks[] = $this->checkCanonicalHost();
        $checks[] = $this->checkCsrfPath($base . '/login');
        $checks[] = $this->checkDashboardDefaultTarget();

        $failed = array_values(array_filter($checks, static fn (array $check): bool => ($check['pass'] ?? false) !== true));

        return [
            'status' => $failed === [] ? 'PASS' : 'FAIL',
            'checked_at_utc' => gmdate('c'),
            'checks' => $checks,
            'failed_count' => count($failed),
        ];
    }

    private function checkCanonicalHost(): array
    {
        $base = (string) config('App')->baseURL;
        $baseHost = parse_url($base, PHP_URL_HOST) ?: '';
        $envBase = (string) (env('app.baseURL') ?: env('APP_BASEURL') ?: $base);
        $envHost = parse_url($envBase, PHP_URL_HOST) ?: '';

        return [
            'key' => 'canonical_host/baseURL_consistency',
            'pass' => $baseHost !== '' && $baseHost === $envHost,
            'details' => [
                'config_baseURL' => $base,
                'env_baseURL' => $envBase,
            ],
        ];
    }

    private function checkCsrfPath(string $url): array
    {
        $probe = $this->probe('GET', $url, null, 'CSRF probe source /login');
        $body = strtolower((string) ($probe['body'] ?? ''));
        $hasCsrf = str_contains($body, 'csrf') || str_contains($body, '_token') || str_contains($body, 'csrf_test_name');

        return [
            'key' => 'csrf_presence_path',
            'pass' => ($probe['pass'] ?? false) === true && $hasCsrf,
            'details' => [
                'status' => $probe['status'] ?? 0,
                'path' => $url,
            ],
        ];
    }

    private function checkDashboardDefaultTarget(): array
    {
        $destination = site_url('Dashboard');

        if (class_exists(\App\Controllers\AuthController::class) && method_exists(\App\Controllers\AuthController::class, 'determineRedirectDestination')) {
            try {
                $controller = new \App\Controllers\AuthController();
                $controller->initController(Services::request(), Services::response(), Services::logger());
                $reflection = new \ReflectionMethod($controller, 'determineRedirectDestination');
                $reflection->setAccessible(true);
                session()->set('redirect_url', '/login');
                $destination = (string) $reflection->invoke($controller);
            } catch (\Throwable $e) {
                return [
                    'key' => 'dashboard_redirect_default_target',
                    'pass' => false,
                    'details' => ['error' => $e->getMessage()],
                ];
            }
        }

        return [
            'key' => 'dashboard_redirect_default_target',
            'pass' => stripos($destination, 'dashboard') !== false,
            'details' => ['destination' => $destination],
        ];
    }

    private function probe(string $method, string $url, ?array $formParams, string $label): array
    {
        $client = Services::curlrequest();
        $options = [
            'http_errors' => false,
            'allow_redirects' => false,
            'headers' => ['Accept' => 'text/html'],
            'timeout' => 10,
        ];

        if ($formParams !== null) {
            $options['form_params'] = $formParams;
        }

        try {
            $response = strtoupper($method) === 'POST'
                ? $client->post($url, $options)
                : $client->get($url, $options);

            $status = $response->getStatusCode();

            return [
                'key' => $label,
                'pass' => in_array($status, [200, 302, 303, 400, 401, 403, 404, 422], true),
                'status' => $status,
                'location' => $response->getHeaderLine('Location'),
                'body' => (string) $response->getBody(),
            ];
        } catch (\Throwable $e) {
            return [
                'key' => $label,
                'pass' => false,
                'status' => 0,
                'error' => $e->getMessage(),
                'body' => '',
            ];
        }
    }

    private function captureRoutesRaw(): string
    {
        $spark = escapeshellarg(ROOTPATH . 'spark');
        $command = escapeshellarg(PHP_BINARY) . ' ' . $spark . ' routes 2>&1';
        $output = shell_exec($command);

        return $this->normalizeRoutesSnapshot(is_string($output) && $output !== '' ? $output : '');
    }

    private function normalizeRoutesSnapshot(string $raw): string
    {
        $lines = preg_split('/\R/', $raw) ?: [];
        $normalized = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '' || str_contains($trimmed, 'Server Time:') || str_starts_with($trimmed, 'stty:')) {
                continue;
            }

            $normalized[] = rtrim($line);
        }

        return implode("\n", $normalized) . "\n";
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function parseAuthRoutes(string $routesRaw): array
    {
        $items = [];

        foreach (preg_split('/\R/', $routesRaw) ?: [] as $line) {
            $trimmed = trim($line);

            if ($trimmed === '' || str_starts_with($trimmed, '+') || str_starts_with($trimmed, '| Method')) {
                continue;
            }

            if (! str_contains($trimmed, '|')) {
                continue;
            }

            $parts = array_values(array_filter(array_map('trim', explode('|', $trimmed)), static fn ($part): bool => $part !== ''));
            if (count($parts) < 3) {
                continue;
            }

            $method = $parts[0] ?? '';
            $uri = $parts[1] ?? '';
            $handler = $parts[2] ?? '';
            $needle = strtolower($method . ' ' . $uri . ' ' . $handler);

            if (! preg_match('/auth|login|register|activate|reset|password|dashboard/', $needle)) {
                continue;
            }

            $items[] = [
                'method' => $method,
                'uri' => $uri,
                'handler' => $handler,
            ];
        }

        return $items;
    }

    /**
     * @return array<string, string>
     */
    private function captureEnvSnapshot(): array
    {
        $keys = [
            'CI_ENVIRONMENT',
            'app.baseURL',
            'APP_BASEURL',
            'app.forceGlobalSecureRequests',
            'app.sessionDriver',
            'session.driver',
            'session.cookieName',
            'security.csrfProtection',
            'security.tokenName',
            'auth.defaultAuthenticator',
            'auth.sessionConfig',
        ];

        $snapshot = [];
        foreach ($keys as $key) {
            $snapshot[$key] = (string) (env($key) ?? '');
        }

        ksort($snapshot);

        return $snapshot;
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function capturePackageSnapshot(): array
    {
        $lockPath = ROOTPATH . 'composer.lock';
        if (! is_file($lockPath)) {
            return [];
        }

        $lock = json_decode((string) file_get_contents($lockPath), true) ?: [];
        $packages = array_merge($lock['packages'] ?? [], $lock['packages-dev'] ?? []);

        $wanted = [
            'codeigniter4/framework',
            'codeigniter4/shield',
            'myth/auth',
        ];

        $snapshot = [];
        foreach ($packages as $package) {
            $name = (string) ($package['name'] ?? '');
            if (! in_array($name, $wanted, true)) {
                continue;
            }

            $snapshot[$name] = [
                'version' => (string) ($package['version'] ?? ''),
                'reference' => (string) ($package['source']['reference'] ?? ''),
            ];
        }

        ksort($snapshot);

        return $snapshot;
    }

    /**
     * @param array<string, mixed> $baseline
     * @param array<string, mixed> $current
     *
     * @return array<string, array<string, mixed>>
     */
    private function buildAssocDrift(array $baseline, array $current): array
    {
        $drift = [];
        $keys = array_unique(array_merge(array_keys($baseline), array_keys($current)));
        sort($keys);

        foreach ($keys as $key) {
            $left = $baseline[$key] ?? null;
            $right = $current[$key] ?? null;
            if ((string) $left !== (string) $right) {
                $drift[$key] = [
                    'baseline' => $left,
                    'current' => $right,
                ];
            }
        }

        return $drift;
    }

    /**
     * @param array<int, array<string, string>> $routes
     *
     * @return array<int, string>
     */
    private function routeSignatures(array $routes): array
    {
        $signatures = [];

        foreach ($routes as $route) {
            $signatures[] = trim(($route['method'] ?? '') . ' ' . ($route['uri'] ?? '') . ' -> ' . ($route['handler'] ?? ''));
        }

        $signatures = array_values(array_unique($signatures));
        sort($signatures);

        return $signatures;
    }

    private function serviceClass(string $serviceName): string
    {
        try {
            $service = service($serviceName);
            if (is_object($service)) {
                return get_class($service);
            }
        } catch (\Throwable $e) {
            return 'error: ' . $e->getMessage();
        }

        return 'unresolved';
    }

    private function ensureDir(string $dir): void
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }

    private function copyTree(string $source, string $target): void
    {
        if (is_dir($target)) {
            $this->deleteTree($target);
        }

        $this->ensureDir($target);

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($source, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            $destination = $target . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
            if ($item->isDir()) {
                $this->ensureDir($destination);
                continue;
            }

            $this->ensureDir(dirname($destination));
            copy($item->getPathname(), $destination);
        }
    }

    private function deleteTree(string $dir): void
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                rmdir($item->getPathname());
            } else {
                unlink($item->getPathname());
            }
        }

        rmdir($dir);
    }

    private function relative(string $path): string
    {
        return str_replace(rtrim(ROOTPATH, '/\\') . DIRECTORY_SEPARATOR, '', $path);
    }
}
