<?php

namespace App\Commands\Gtm;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class BrokerRouteClassificationAudit extends SafeBaseCommand
{
    protected $group = 'GTM';
    protected $name = 'gtm:broker:route-classification';
    protected $description = 'GT-001E read-only Broker API route classification audit.';
    protected $usage = 'gtm:broker:route-classification [routes-output-file]';

    public function run(array $params)
    {
        $routesPath = APPPATH . 'Config/Routes.php';

        if (! is_file($routesPath)) {
            CLI::error('FAIL: app/Config/Routes.php not found.');
            return;
        }

        $routesText = file_get_contents($routesPath);
        $lines = preg_split('/\R/', (string) $routesText);

        $block = $this->extractBrokerRouteBlock($lines);
        $routes = $this->parseBrokerRoutes($block);

        [$sparkRoutesText, $sparkRoutesFile, $sparkExitCode] = $this->loadSparkRoutes($params[0] ?? null);

        $registeredBrokerCount = 0;
        if (preg_match_all('/\|\s+(GET|POST|PUT|PATCH|DELETE)\s+\|\s+API\/Broker\//i', $sparkRoutesText, $matches)) {
            $registeredBrokerCount = count($matches[0]);
        }

        $summary = [
            'routes_php_broker_routes' => count($routes),
            'spark_registered_broker_routes' => $registeredBrokerCount,
            'explicit_guarded_routes' => 0,
            'explicit_unguarded_routes' => 0,
            'missing_handler_files' => 0,
            'budget_cross_controller_routes' => 0,
            'external_fetch_review_routes' => 0,
            'mutation_review_routes' => 0,
            'user_auth_read_routes' => 0,
        ];

        $rows = [];

        foreach ($routes as $route) {
            $handlerInfo = $this->resolveHandler($route['handler']);
            $classification = $this->classifyRoute($route['uri'], $route['handler']);

            if ($route['filter'] !== '') {
                $summary['explicit_guarded_routes']++;
            } else {
                $summary['explicit_unguarded_routes']++;
            }

            if (! $handlerInfo['file_exists']) {
                $summary['missing_handler_files']++;
            }

            if ($classification === 'budget-user-auth-required-cross-controller-review') {
                $summary['budget_cross_controller_routes']++;
            }

            if ($classification === 'api-token-or-internal-token-external-fetch-review') {
                $summary['external_fetch_review_routes']++;
            }

            if ($classification === 'owner-approved-mutation-or-user-auth-post-only') {
                $summary['mutation_review_routes']++;
            }

            if ($classification === 'user-auth-required-read') {
                $summary['user_auth_read_routes']++;
            }

            $rows[] = [
                'line' => $route['line'],
                'method' => strtoupper($route['method']),
                'uri' => 'API/Broker/' . $route['uri'],
                'handler' => $handlerInfo['fqcn'] . '::' . $handlerInfo['method'],
                'filter' => $route['filter'] !== '' ? $route['filter'] : 'NONE',
                'handler_file_exists' => $handlerInfo['file_exists'] ? 'YES' : 'NO',
                'classification' => $classification,
            ];
        }

        $status = 'PASS';
        $evidence = [];

        if (count($routes) === 0) {
            $status = 'FAIL';
            $evidence[] = 'FAIL: No Broker route definitions were parsed from Routes.php.';
        }

        if ($registeredBrokerCount > 0 && $summary['missing_handler_files'] > 0) {
            $status = 'FAIL';
            $evidence[] = 'FAIL: Registered API/Broker routes reference missing handler files.';
        }

        if ($summary['explicit_unguarded_routes'] > 0) {
            if ($status !== 'FAIL') {
                $status = 'WARN';
            }
            $evidence[] = 'WARN: Broker routes do not have explicit route-level auth/api/internal filters.';
        }

        if ($summary['external_fetch_review_routes'] > 0) {
            $evidence[] = 'WARN: Plaid/Robinhood external-fetch routes require API_TOKEN/internal-token classification before guard patching.';
        }

        if ($summary['mutation_review_routes'] > 0) {
            $evidence[] = 'WARN: Link/unlink/refresh routes require mutation-safe method and guard review.';
        }

        $report = $this->buildMarkdownReport($status, $summary, $rows, $evidence, $sparkRoutesFile, $sparkExitCode);

        $reportDir = WRITEPATH . 'gtm';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        $reportPath = $reportDir . '/gt001e-broker-route-classification-' . date('Ymd-His') . '.md';
        file_put_contents($reportPath, $report);

        CLI::write('===== GT-001E BROKER ROUTE CLASSIFICATION =====');
        CLI::write('STATUS=' . $status);
        CLI::write('ROUTES_PHP_BROKER_ROUTES=' . $summary['routes_php_broker_routes']);
        CLI::write('SPARK_REGISTERED_BROKER_ROUTES=' . $summary['spark_registered_broker_routes']);
        CLI::write('EXPLICIT_GUARDED_ROUTES=' . $summary['explicit_guarded_routes']);
        CLI::write('EXPLICIT_UNGUARDED_ROUTES=' . $summary['explicit_unguarded_routes']);
        CLI::write('MISSING_HANDLER_FILES=' . $summary['missing_handler_files']);
        CLI::write('BUDGET_CROSS_CONTROLLER_ROUTES=' . $summary['budget_cross_controller_routes']);
        CLI::write('EXTERNAL_FETCH_REVIEW_ROUTES=' . $summary['external_fetch_review_routes']);
        CLI::write('MUTATION_REVIEW_ROUTES=' . $summary['mutation_review_routes']);
        CLI::write('USER_AUTH_READ_ROUTES=' . $summary['user_auth_read_routes']);

        CLI::newLine();

        foreach ($evidence as $item) {
            CLI::write($item);
        }

        CLI::newLine();
        CLI::write('REPORT=' . $reportPath);
    }

    private function extractBrokerRouteBlock(array $lines): array
    {
        $block = [];
        $capturing = false;
        $depth = 0;
        $startLine = 0;

        foreach ($lines as $index => $line) {
            $lineNumber = $index + 1;

            if (! $capturing && (str_contains($line, "\$routes->group('Broker'") || str_contains($line, '$routes->group("Broker"'))) {
                $capturing = true;
                $startLine = $lineNumber;
            }

            if (! $capturing) {
                continue;
            }

            $block[] = [
                'line' => $lineNumber,
                'text' => $line,
            ];

            $depth += substr_count($line, '{');
            $depth -= substr_count($line, '}');

            if ($lineNumber > $startLine && $depth <= 0 && str_contains($line, '});')) {
                break;
            }
        }

        return $block;
    }

    private function parseBrokerRoutes(array $block): array
    {
        $routes = [];

        foreach ($block as $item) {
            $line = $item['text'];

            if (! preg_match("/\\\$routes->(get|post|put|patch|delete|match)\\(\\s*'([^']+)'\\s*,\\s*'([^']+)'(.*)\\);/i", $line, $match)) {
                continue;
            }

            $filter = '';

            if (preg_match("/'filter'\\s*=>\\s*'([^']+)'/", $line, $filterMatch)) {
                $filter = $filterMatch[1];
            }

            $routes[] = [
                'line' => $item['line'],
                'method' => strtolower($match[1]),
                'uri' => $match[2],
                'handler' => $match[3],
                'filter' => $filter,
            ];
        }

        return $routes;
    }

    private function resolveHandler(string $handler): array
    {
        $parts = explode('::', $handler, 2);
        $class = $parts[0] ?? '';
        $method = $parts[1] ?? '';

        $method = preg_replace('/\/\$[0-9]+$/', '', $method);
        $class = ltrim($class, '\\');

        if (! str_contains($class, '\\')) {
            $fqcn = 'App\\Modules\\APIs\\Controllers\\' . $class;
        } else {
            $fqcn = $class;
        }

        $file = '';

        if (str_starts_with($fqcn, 'App\\')) {
            $file = APPPATH . str_replace('\\', '/', substr($fqcn, 4)) . '.php';
        }

        return [
            'fqcn' => $fqcn,
            'method' => $method,
            'file' => $file,
            'file_exists' => $file !== '' && is_file($file),
        ];
    }

    private function classifyRoute(string $uri, string $handler): string
    {
        $lower = strtolower($uri);

        if (str_contains($handler, 'BudgetController::')) {
            return 'budget-user-auth-required-cross-controller-review';
        }

        if (str_starts_with($lower, 'fetchplaid') || str_starts_with($lower, 'fetchrobinhood')) {
            return 'api-token-or-internal-token-external-fetch-review';
        }

        foreach (['add-', 'remove-', 'link', 'unlink', 'refresh'] as $needle) {
            if (str_contains($lower, $needle)) {
                return 'owner-approved-mutation-or-user-auth-post-only';
            }
        }

        return 'user-auth-required-read';
    }

    private function loadSparkRoutes(?string $providedFile): array
    {
        if ($providedFile !== null && is_file($providedFile)) {
            return [(string) file_get_contents($providedFile), $providedFile, 0];
        }

        $reportDir = WRITEPATH . 'gtm';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        $captureFile = $reportDir . '/gt001e-spark-routes-' . date('Ymd-His') . '.txt';
        $command = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' routes 2>&1';

        $output = [];
        $exitCode = 0;
        exec($command, $output, $exitCode);

        $text = implode(PHP_EOL, $output);
        file_put_contents($captureFile, $text);

        return [$text, $captureFile, $exitCode];
    }

    private function buildMarkdownReport(string $status, array $summary, array $rows, array $evidence, string $sparkRoutesFile, int $sparkExitCode): string
    {
        $out = [];
        $out[] = '# GT-001E Broker Route Classification Audit';
        $out[] = '';
        $out[] = 'Status: `' . $status . '`';
        $out[] = '';
        $out[] = '## Scope';
        $out[] = '';
        $out[] = 'Read-only classification of MyMI `API/Broker/*` route definitions before any route guard implementation.';
        $out[] = '';
        $out[] = 'This audit does not remove routes, add guards, call Plaid, call Robinhood, call SnapTrade, mutate production, or mutate database data.';
        $out[] = '';
        $out[] = '## Summary';
        $out[] = '';

        foreach ($summary as $key => $value) {
            $out[] = '- `' . $key . '`: `' . $value . '`';
        }

        $out[] = '- `spark_routes_file`: `' . $sparkRoutesFile . '`';
        $out[] = '- `spark_routes_exit_code`: `' . $sparkExitCode . '`';
        $out[] = '';
        $out[] = '## Evidence';
        $out[] = '';

        foreach ($evidence as $item) {
            $out[] = '- ' . $item;
        }

        $out[] = '';
        $out[] = '## Route Classification';
        $out[] = '';
        $out[] = '| Line | Method | URI | Handler | Filter | Handler File Exists | Classification |';
        $out[] = '|---:|---|---|---|---|---|---|';

        foreach ($rows as $row) {
            $out[] = '| ' . $row['line']
                . ' | ' . $row['method']
                . ' | `' . $row['uri'] . '`'
                . ' | `' . $row['handler'] . '`'
                . ' | `' . $row['filter'] . '`'
                . ' | `' . $row['handler_file_exists'] . '`'
                . ' | `' . $row['classification'] . '` |';
        }

        $out[] = '';
        $out[] = '## Recommended Next Step';
        $out[] = '';
        $out[] = 'Do not add route guards until handler ownership and liveness are confirmed. If `BrokerAPIController` remains missing while `API/Broker/*` routes are registered, create a follow-up implementation lane to either restore the controller safely or deprecate/guard the registered routes behind an explicit owner-approved plan.';

        return implode(PHP_EOL, $out) . PHP_EOL;
    }
}
