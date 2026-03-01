<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class GtmLaunchAudit extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:launch:audit';
    protected $description = 'Generate go-live launch readiness audit for Phase A user surfaces.';

    public function run(array $params)
    {
        $routes = $this->parseRoutesFile();
        $integrity = $this->scanRouteTargets($routes);
        $commands = $this->commandInventory();

        $features = config('Features')->all();
        $apiPolicy = config('ExternalApiPolicy');
        $logger = config('Logger');

        $included = array_values(array_filter($routes, fn(array $r): bool => $this->isPhaseARoute($r['path'])));
        $excluded = array_values(array_filter($routes, fn(array $r): bool => ! $this->isPhaseARoute($r['path'])));

        $blockers = [];
        if ($integrity['missing'] !== []) {
            $blockers[] = 'Missing route targets detected: ' . count($integrity['missing']);
        }

        foreach (['FEATURE_BUDGET', 'FEATURE_INVESTMENTS', 'FEATURE_WATCHLIST'] as $key) {
            if (($features[$key] ?? false) !== true) {
                $blockers[] = $key . ' is disabled.';
            }
        }

        foreach (['gtm:health:snapshot', 'gtm:cron:validate-security'] as $requiredCommand) {
            if (! in_array($requiredCommand, $commands, true)) {
                $blockers[] = 'Missing expected command: ' . $requiredCommand;
            }
        }

        $decision = $blockers === [] ? 'PASS' : 'HOLD';

        $lines = [
            '# Launch Readiness Audit (Phase A)',
            '',
            '## run_meta',
            '- timestamp_utc: `' . gmdate('c') . '`',
            '- git_commit: `' . $this->gitCommit() . '`',
            '- env: `' . (string) (ENVIRONMENT ?? 'unknown') . '`',
            '- command: `php spark gtm:launch:audit`',
            '',
            '## route scan summary',
            '- total routes discovered: ' . count($routes),
            '- Phase A routes included: ' . count($included),
            '- Excluded routes: ' . count($excluded),
            '',
            '### Included user-facing routes (Phase A)',
        ];

        foreach ($included as $route) {
            $lines[] = '- `' . $route['verb'] . ' ' . $route['path'] . '` => `' . $route['target'] . '`';
        }

        $lines[] = '';
        $lines[] = '### Excluded route samples';
        foreach (array_slice($excluded, 0, 40) as $route) {
            $lines[] = '- `' . $route['verb'] . ' ' . $route['path'] . '` => `' . $route['target'] . '`';
        }

        $lines[] = '';
        $lines[] = '## route->controller integrity scan';
        $lines[] = '- scanned: ' . count($integrity['checked']);
        $lines[] = '- missing targets: ' . count($integrity['missing']);
        if ($integrity['missing'] === []) {
            $lines[] = '- no missing controller/method targets found in parsed routes.';
        } else {
            foreach ($integrity['missing'] as $missing) {
                $lines[] = '- ❌ `' . $missing . '`';
            }
        }

        $lines[] = '';
        $lines[] = '## feature toggles state summary';
        foreach ($features as $key => $value) {
            $lines[] = '- ' . $key . ': `' . ($value ? 'enabled' : 'disabled') . '`';
        }

        $lines[] = '';
        $lines[] = '## ExternalApiPolicy caps summary';
        foreach (($apiPolicy->providerCaps ?? []) as $provider => $cap) {
            $lines[] = '- ' . $provider . ': `' . $cap . '`';
        }
        $lines[] = '- enableBackoff: `' . (($apiPolicy->enableBackoff ?? false) ? 'true' : 'false') . '`';
        $lines[] = '- microSleepBackoffUs: `' . (string) ($apiPolicy->microSleepBackoffUs ?? 0) . '`';

        $lines[] = '';
        $lines[] = '## logger handler summary';
        foreach (($logger->handlers ?? []) as $handler => $meta) {
            $handles = is_array($meta['handles'] ?? null) ? implode(',', $meta['handles']) : '';
            $lines[] = '- `' . $handler . '` handles `' . $handles . '`';
        }

        $lines[] = '';
        $lines[] = '## CRON command existence check';
        foreach (['gtm:health:snapshot', 'gtm:cron:validate-security', 'gtm:launch:audit', 'gtm:launch:smoke'] as $name) {
            $lines[] = '- ' . $name . ': `' . (in_array($name, $commands, true) ? 'present' : 'missing') . '`';
        }

        $lines[] = '';
        $lines[] = '## blockers list';
        if ($blockers === []) {
            $lines[] = '- none';
        } else {
            foreach ($blockers as $blocker) {
                $lines[] = '- ' . $blocker;
            }
        }

        $lines[] = '';
        $lines[] = '## decision';
        $lines[] = '- **' . $decision . '**';

        $outputPath = ROOTPATH . 'docs/launch/launch_readiness_audit.md';
        if (! is_dir(dirname($outputPath))) {
            mkdir(dirname($outputPath), 0775, true);
        }

        file_put_contents($outputPath, implode(PHP_EOL, $lines) . PHP_EOL);
        CLI::write('Launch readiness audit written: ' . $outputPath, 'green');

        return EXIT_SUCCESS;
    }

    /** @return list<array{verb:string,path:string,target:string}> */
    private function parseRoutesFile(): array
    {
        $file = ROOTPATH . 'app/Config/Routes.php';
        if (! is_file($file)) {
            return [];
        }

        $lines = file($file, FILE_IGNORE_NEW_LINES) ?: [];
        $routes = [];

        foreach ($lines as $line) {
            $trim = trim($line);
            if ($trim === '' || str_starts_with($trim, '//')) {
                continue;
            }

            if (preg_match('/\$routes->(get|post|put|delete|patch|options|cli|match)\((.+)\);/i', $trim, $m) !== 1) {
                continue;
            }

            $verb = strtoupper($m[1]);
            $args = $m[2];
            if (preg_match('/^[\'\"]([^\'\"]+)[\'\"]\s*,\s*[\'\"]([^\'\"]+)[\'\"]/i', $args, $a) !== 1) {
                continue;
            }

            $path = '/' . ltrim($a[1], '/');
            $target = $a[2];

            if ($verb === 'MATCH') {
                $verb = 'GET|POST';
            }

            $routes[] = ['verb' => $verb, 'path' => $path, 'target' => $target];
        }

        return $routes;
    }

    /** @param list<array{verb:string,path:string,target:string}> $routes */
    private function scanRouteTargets(array $routes): array
    {
        $checked = [];
        $missing = [];

        foreach ($routes as $route) {
            if (! str_contains($route['target'], '::')) {
                continue;
            }

            [$controller, $method] = explode('::', $route['target'], 2);
            $method = preg_replace('/\/.+$/', '', $method) ?: $method;

            [$controllerFile, $exists] = $this->resolveControllerFile($controller);
            $checked[] = $route['target'] . ' => ' . ($controllerFile ?? 'unresolved');

            if (! $exists || ! $this->controllerFileHasMethod((string) $controllerFile, $method)) {
                $missing[] = $route['verb'] . ' ' . $route['path'] . ' => ' . $route['target'];
            }
        }

        return ['checked' => $checked, 'missing' => array_values(array_unique($missing))];
    }

    /** @return array{0:?string,1:bool} */
    private function resolveControllerFile(string $controller): array
    {
        $relativeCandidates = [
            'app/Controllers/' . $controller . '.php',
            'app/Modules/User/Controllers/' . $controller . '.php',
            'app/Modules/APIs/Controllers/' . $controller . '.php',
            'app/Modules/Management/Controllers/' . $controller . '.php',
        ];

        foreach ($relativeCandidates as $relativePath) {
            $absolute = ROOTPATH . $relativePath;
            if (is_file($absolute)) {
                return [$absolute, true];
            }
        }

        return [null, false];
    }

    private function controllerFileHasMethod(string $filePath, string $method): bool
    {
        $contents = file_get_contents($filePath);
        if (! is_string($contents) || $contents === '') {
            return false;
        }

        return preg_match('/public\s+function\s+' . preg_quote($method, '/') . '\s*\(/i', $contents) === 1;
    }

    private function isPhaseARoute(string $path): bool
    {
        $needle = strtolower($path);

        foreach (['/login', '/register', '/logout', '/reset', '/forgot', '/budget', '/investments', '/watchlist'] as $segment) {
            if (str_contains($needle, $segment)) {
                return true;
            }
        }

        return false;
    }

    /** @return list<string> */
    private function commandInventory(): array
    {
        $commands = service('commands')->getCommands();

        return array_values(array_keys(is_array($commands) ? $commands : []));
    }

    private function gitCommit(): string
    {
        $hash = trim((string) shell_exec('git rev-parse --short HEAD 2>/dev/null'));

        return $hash !== '' ? $hash : 'unknown';
    }
}
