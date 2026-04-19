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
        $files = [
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

        return array_values(array_filter($files, static fn (string $path): bool => is_file(ROOTPATH . $path)));
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

        $files = $this->criticalFiles();
        $fileHashes = [];
        $copied = [];

        foreach ($files as $relativePath) {
            $source = ROOTPATH . $relativePath;
            $dest = $historyDir . '/files/' . $relativePath;
            $this->ensureDir(dirname($dest));
            copy($source, $dest);

            $hash = hash_file('sha256', $source) ?: '';
            $fileHashes[$relativePath] = $hash;
            $copied[] = $relativePath;
        }

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
            'files' => $copied,
            'file_hashes_sha256' => $fileHashes,
            'routes_snapshot_sha256' => hash('sha256', $routesRaw),
            'env_snapshot_sha256' => hash('sha256', json_encode($envSnapshot, JSON_UNESCAPED_SLASHES) ?: '{}'),
            'package_snapshot_sha256' => hash('sha256', json_encode($packageSnapshot, JSON_UNESCAPED_SLASHES) ?: '{}'),
            'smoke_status' => $smoke['status'] ?? 'UNKNOWN',
            'auth_runtime' => [
                'auth_service' => $this->serviceClass('auth'),
                'authentication_service' => $this->serviceClass('authentication'),
            ],
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

        $changed = [];
        $missing = [];

        foreach ($expectedHashes as $relativePath => $expectedHash) {
            $full = ROOTPATH . $relativePath;
            if (! is_file($full)) {
                $missing[] = $relativePath;
                continue;
            }

            $actualHash = hash_file('sha256', $full) ?: '';
            if (! hash_equals((string) $expectedHash, $actualHash)) {
                $changed[] = [
                    'file' => $relativePath,
                    'expected' => (string) $expectedHash,
                    'actual' => $actualHash,
                ];
            }
        }

        $baselineEnv = json_decode((string) file_get_contents($currentDir . '/env.auth.json'), true) ?: [];
        $currentEnv = $this->captureEnvSnapshot();

        $envDrift = [];
        $allEnvKeys = array_unique(array_merge(array_keys($baselineEnv), array_keys($currentEnv)));
        sort($allEnvKeys);
        foreach ($allEnvKeys as $key) {
            $baseline = $baselineEnv[$key] ?? null;
            $actual = $currentEnv[$key] ?? null;
            if ((string) $baseline !== (string) $actual) {
                $envDrift[$key] = ['baseline' => $baseline, 'current' => $actual];
            }
        }

        $baselineRoutes = $this->normalizeRoutesSnapshot((string) @file_get_contents($currentDir . '/routes.snapshot.txt'));
        $currentRoutes = $this->normalizeRoutesSnapshot($this->captureRoutesRaw());
        $routeDrift = hash('sha256', $baselineRoutes) !== hash('sha256', $currentRoutes);

        $baselinePackages = json_decode((string) file_get_contents($currentDir . '/packages.auth.json'), true) ?: [];
        $currentPackages = $this->capturePackageSnapshot();
        $packageDrift = [];
        $allPkg = array_unique(array_merge(array_keys($baselinePackages), array_keys($currentPackages)));
        sort($allPkg);
        foreach ($allPkg as $name) {
            $baseline = $baselinePackages[$name]['version'] ?? null;
            $current = $currentPackages[$name]['version'] ?? null;
            if ((string) $baseline !== (string) $current) {
                $packageDrift[$name] = ['baseline' => $baseline, 'current' => $current];
            }
        }

        return [
            'changed_files' => $changed,
            'missing_files' => $missing,
            'env_drift' => $envDrift,
            'route_drift' => $routeDrift,
            'package_drift' => $packageDrift,
        ];
    }

    public function restore(array $options): array
    {
        $timestamp = (string) ($options['from'] ?? '');
        $singleFile = (string) ($options['file'] ?? '');
        $dryRun = (bool) ($options['dry_run'] ?? false);

        $sourceDir = $timestamp !== ''
            ? ROOTPATH . self::BASE_DIR . '/history/' . $timestamp
            : ROOTPATH . self::BASE_DIR . '/current';

        if (! is_dir($sourceDir . '/files')) {
            return ['error' => 'Baseline source not found: ' . $this->relative($sourceDir)];
        }

        $allowed = $this->criticalFiles();
        $restoreTargets = [];

        if ($singleFile !== '') {
            if (! in_array($singleFile, $allowed, true)) {
                return ['error' => '--file is not auth-critical: ' . $singleFile];
            }

            $restoreTargets[] = $singleFile;
        } else {
            $restoreTargets = $allowed;
        }

        $restored = [];
        $skipped = [];

        foreach ($restoreTargets as $relativePath) {
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
            return str_contains(strtolower((string) ($route['uri'] ?? '')), 'dashboard');
        }));

        $filtersFile = is_file(ROOTPATH . 'app/Config/Filters.php')
            ? (string) file_get_contents(ROOTPATH . 'app/Config/Filters.php')
            : '';
        $filterTouches = [];
        foreach (explode("\n", $filtersFile) as $lineNo => $line) {
            $lineLower = strtolower($line);
            if (str_contains($lineLower, 'auth') || str_contains($lineLower, 'dashboard') || str_contains($lineLower, 'login')) {
                $filterTouches[] = [
                    'line' => $lineNo + 1,
                    'content' => trim($line),
                ];
            }
        }

        $viewBindings = [];
        foreach (['app/Views/Auth/login.php', 'app/Views/Auth/register.php', 'app/Views/Auth/layout.php'] as $view) {
            $contents = (string) @file_get_contents(ROOTPATH . $view);
            $viewBindings[] = [
                'view' => $view,
                'has_form' => stripos($contents, '<form') !== false,
                'has_csrf' => stripos($contents, 'csrf') !== false,
            ];
        }

        $jsFile = 'public/assets/js/login-init.js';
        $jsContents = (string) @file_get_contents(ROOTPATH . $jsFile);

        return [
            'login_register_routes' => $loginRegisterRoutes,
            'dashboard_routes' => $dashboardRoutes,
            'auth_controller_namespace' => class_exists(\App\Controllers\AuthController::class)
                ? \App\Controllers\AuthController::class
                : 'not found',
            'filters_touching_auth_dashboard' => $filterTouches,
            'service_auth_runtime' => $this->serviceClass('auth'),
            'service_authentication_runtime' => $this->serviceClass('authentication'),
            'view_bindings' => $viewBindings,
            'js_binding' => [
                'file' => $jsFile,
                'exists' => is_file(ROOTPATH . $jsFile),
                'binds_login_form' => str_contains(strtolower($jsContents), 'login'),
            ],
        ];
    }

    public function runSmokeProbes(): array
    {
        $base = rtrim((string) config('App')->baseURL, '/');
        $checks = [];

        $checks[] = $this->probe('GET', $base . '/login', null, 'GET /login');
        $checks[] = $this->probe('POST', $base . '/login', ['login' => 'invalid@example.com', 'password' => 'invalid-password'], 'POST /login invalid credentials');
        $checks[] = $this->probe('GET', $base . '/register', null, 'GET /register');
        $checks[] = $this->probe('POST', $base . '/register', ['email' => 'invalid', 'password' => 'x', 'pass_confirm' => 'y'], 'POST /register invalid payload');
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
            'key' => 'canonical_host_baseurl_consistency',
            'pass' => $baseHost !== '' && $baseHost === $envHost,
            'details' => [
                'config_baseURL' => $base,
                'env_baseURL' => $envBase,
            ],
        ];
    }

    private function checkCsrfPath(string $url): array
    {
        $probe = $this->probe('GET', $url, null, 'csrf probe source /login');
        $body = strtolower((string) ($probe['body'] ?? ''));
        $hasCsrf = str_contains($body, 'csrf') || str_contains($body, '_token') || str_contains($body, 'csrf_test_name');

        return [
            'key' => 'csrf_presence_path',
            'pass' => $probe['pass'] === true && $hasCsrf,
            'details' => [
                'status' => $probe['status'] ?? 0,
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
                $method = new \ReflectionMethod($controller, 'determineRedirectDestination');
                $method->setAccessible(true);
                session()->set('redirect_url', '/login');
                $destination = (string) $method->invoke($controller);
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
            $ok = in_array($status, [200, 302, 303, 400, 401, 403, 404, 422], true);

            return [
                'key' => $label,
                'pass' => $ok,
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
        $lines = preg_split('/\r\n|\r|\n/', $raw) ?: [];
        $normalized = [];
        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '') {
                continue;
            }
            if (str_contains($trimmed, 'Server Time:')) {
                continue;
            }
            if (str_starts_with($trimmed, 'stty:')) {
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
        $lines = preg_split('/\r\n|\r|\n/', $routesRaw) ?: [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '' || str_starts_with($trimmed, '+') || str_starts_with($trimmed, '| Method')) {
                continue;
            }

            if (! str_contains($trimmed, '|')) {
                continue;
            }

            $parts = array_values(array_filter(array_map('trim', explode('|', $trimmed)), static fn ($p): bool => $p !== ''));
            if (count($parts) < 3) {
                continue;
            }

            $uri = $parts[1] ?? '';
            $handler = $parts[2] ?? '';
            $needle = strtolower($uri . ' ' . $handler);

            if (! preg_match('/auth|login|register|activate|reset|dashboard/', $needle)) {
                continue;
            }

            $items[] = [
                'method' => $parts[0] ?? '',
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

        return $snapshot;
    }

    /**
     * @return array<string, array<string, string>>
     */
    private function capturePackageSnapshot(): array
    {
        $path = ROOTPATH . 'composer.lock';
        if (! is_file($path)) {
            return [];
        }

        $lock = json_decode((string) file_get_contents($path), true) ?: [];
        $packages = array_merge($lock['packages'] ?? [], $lock['packages-dev'] ?? []);

        $wanted = [
            'codeigniter4/framework',
            'codeigniter4/shield',
            'myth/auth',
        ];

        $snapshot = [];
        foreach ($packages as $pkg) {
            $name = (string) ($pkg['name'] ?? '');
            if (! in_array($name, $wanted, true)) {
                continue;
            }

            $snapshot[$name] = [
                'version' => (string) ($pkg['version'] ?? ''),
                'reference' => (string) ($pkg['source']['reference'] ?? ''),
            ];
        }

        ksort($snapshot);

        return $snapshot;
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
            $dest = $target . DIRECTORY_SEPARATOR . $iterator->getSubPathName();
            if ($item->isDir()) {
                $this->ensureDir($dest);
            } else {
                $this->ensureDir(dirname($dest));
                copy($item->getPathname(), $dest);
            }
        }
    }

    private function deleteTree(string $dir): void
    {
        if (! is_dir($dir)) {
            return;
        }

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
