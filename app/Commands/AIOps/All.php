<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Config\Services;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Throwable;

class All extends SafeBaseCommand
{
    protected $group       = 'AIOps';
    protected $name        = 'aiops:all';
    protected $description = 'Run a full AIOps scan and generate unified Markdown and JSON reports in docs/_aiops.';

    protected array $errorPatterns = [
        'fatal error',
        'uncaught exception',
        'exception',
        'warning',
        'deprecated',
        'undefined',
        'memory exhausted',
        'allowed memory size',
        'mysqli_sql_exception',
        'query exception',
        'permissionexception',
        '404',
        '500',
        '504',
    ];

    public function run(array $params)
    {
        $startTime = microtime(true);

        $flags = $this->parseFlags($params);
        $reportDir = ROOTPATH . 'docs/_aiops/';

        CLI::write('Starting AIOps Full Scan...', 'yellow');

        $this->ensureDirectory($reportDir);

        try {
            $logs = $this->getLogs(
                (int) ($flags['log-lines'] ?? 2000),
                (int) ($flags['max-log-files'] ?? 25)
            );

            $report = [
                'timestamp'    => date('Y-m-d H:i:s'),
                'generated_at' => date(DATE_ATOM),
                'command'      => 'php spark aiops:all',
                'flags'        => $flags,
                'system'       => $this->getSystemInfo(),
                'logs'         => $logs,
                'errors'       => $this->extractErrors($logs, (int) ($flags['max-errors'] ?? 250)),
                'routes'       => $flags['logs-only'] ? [] : $this->getRoutes(),
                'architecture' => $flags['logs-only'] ? [] : $this->getArchitecture(),
                'database'     => $flags['logs-only'] ? [] : $this->getDatabaseInfo(),
                'commands'     => $flags['logs-only'] ? [] : $this->getCommandHealth(),
                'performance'  => $this->getPerformanceInsights($startTime),
                'security'     => $this->getSecurityInsights(),
                'summary'      => [],
            ];

            $report['summary'] = $this->buildSummary($report);

            $this->writeReports($report, $reportDir);

            CLI::write('AIOps Scan Complete.', 'green');
            CLI::write('Markdown: ' . $reportDir . '_aiops_all.md', 'light_gray');
            CLI::write('JSON: ' . $reportDir . '_aiops_all.json', 'light_gray');
        } catch (Throwable $e) {
            CLI::error('AIOps scan failed: ' . $e->getMessage());

            $failureReport = [
                'timestamp'    => date('Y-m-d H:i:s'),
                'generated_at' => date(DATE_ATOM),
                'command'      => 'php spark aiops:all',
                'status'       => 'failed',
                'error'        => [
                    'message' => $e->getMessage(),
                    'file'    => $e->getFile(),
                    'line'    => $e->getLine(),
                    'trace'   => $e->getTraceAsString(),
                ],
            ];

            $this->writeFailureReport($failureReport, $reportDir);
        }
    }

    protected function parseFlags(array $params): array
    {
        $flags = [
            'logs-only'     => false,
            'log-lines'     => 2000,
            'max-log-files' => 25,
            'max-errors'    => 250,
        ];

        foreach ($params as $param) {
            if ($param === '--logs-only') {
                $flags['logs-only'] = true;
                continue;
            }

            if (strpos($param, '--log-lines=') === 0) {
                $flags['log-lines'] = max(100, (int) substr($param, 12));
                continue;
            }

            if (strpos($param, '--max-log-files=') === 0) {
                $flags['max-log-files'] = max(1, (int) substr($param, 16));
                continue;
            }

            if (strpos($param, '--max-errors=') === 0) {
                $flags['max-errors'] = max(10, (int) substr($param, 13));
            }
        }

        return $flags;
    }

    protected function getSystemInfo(): array
    {
        $appConfig = config('App');
        $securityConfig = config('Security');

        return [
            'php_version'        => PHP_VERSION,
            'php_sapi'           => PHP_SAPI,
            'ci_version'         => \CodeIgniter\CodeIgniter::CI_VERSION,
            'environment'        => defined('ENVIRONMENT') ? ENVIRONMENT : 'unknown',
            'base_url'           => $appConfig->baseURL ?? null,
            'index_page'         => $appConfig->indexPage ?? null,
            'memory_limit'       => ini_get('memory_limit'),
            'max_execution_time' => ini_get('max_execution_time'),
            'post_max_size'      => ini_get('post_max_size'),
            'upload_max_filesize'=> ini_get('upload_max_filesize'),
            'timezone'           => date_default_timezone_get(),
            'csrf_enabled'       => property_exists($securityConfig, 'csrfProtection')
                ? (bool) $securityConfig->csrfProtection
                : null,
            'extensions'         => get_loaded_extensions(),
        ];
    }

    protected function getLogs(int $maxLines = 2000, int $maxFiles = 25): array
    {
        $logFiles = glob(WRITEPATH . 'logs/*.log') ?: [];
        rsort($logFiles);

        $logFiles = array_slice($logFiles, 0, $maxFiles);
        $logs = [];

        foreach ($logFiles as $file) {
            $lines = $this->tailFile($file, $maxLines);

            $logs[] = [
                'file'         => basename($file),
                'path'         => $file,
                'size_bytes'   => is_file($file) ? filesize($file) : 0,
                'modified_at'  => is_file($file) ? date(DATE_ATOM, filemtime($file)) : null,
                'line_count'   => count($lines),
                'preview'      => $lines,
            ];
        }

        return $logs;
    }

    protected function tailFile(string $file, int $lines = 2000): array
    {
        if (! is_file($file) || ! is_readable($file)) {
            return [];
        }

        $handle = fopen($file, 'rb');
        if ($handle === false) {
            return [];
        }

        $buffer = '';
        $result = [];
        $position = -1;

        fseek($handle, 0, SEEK_END);
        $fileSize = ftell($handle);

        if ($fileSize === 0) {
            fclose($handle);
            return [];
        }

        while (count($result) < $lines && abs($position) <= $fileSize) {
            fseek($handle, $position, SEEK_END);
            $char = fgetc($handle);

            if ($char === "\n") {
                if ($buffer !== '') {
                    $result[] = strrev($buffer);
                    $buffer = '';
                }
            } elseif ($char !== "\r" && $char !== false) {
                $buffer .= $char;
            }

            $position--;
        }

        if ($buffer !== '') {
            $result[] = strrev($buffer);
        }

        fclose($handle);

        $result = array_reverse($result);
        $result = array_values(array_filter($result, static fn ($line) => trim($line) !== ''));

        return $result;
    }

    protected function extractErrors(array $logs, int $maxErrors = 250): array
    {
        $errors = [];

        foreach ($logs as $log) {
            $file = $log['file'] ?? 'unknown.log';
            $lines = $log['preview'] ?? [];

            foreach ($lines as $index => $line) {
                $normalized = strtolower($line);

                foreach ($this->errorPatterns as $pattern) {
                    if (strpos($normalized, $pattern) !== false) {
                        $errors[] = [
                            'file'    => $file,
                            'line_no' => $index + 1,
                            'pattern' => $pattern,
                            'line'    => $line,
                        ];
                        break;
                    }
                }

                if (count($errors) >= $maxErrors) {
                    return $errors;
                }
            }
        }

        return $errors;
    }

    protected function getRoutes(): array
    {
        try {
            $collection = Services::routes(true);
            $routes = $collection->getRoutes();

            $normalized = [];

            foreach ($routes as $from => $to) {
                $normalized[] = [
                    'route'      => is_string($from) ? $from : (string) $from,
                    'handler'    => is_string($to) ? $to : json_encode($to),
                ];
            }

            usort($normalized, static function ($a, $b) {
                return strcmp($a['route'], $b['route']);
            });

            return $normalized;
        } catch (Throwable $e) {
            return [
                [
                    'route'   => '__route_scan_failed__',
                    'handler' => $e->getMessage(),
                ],
            ];
        }
    }

    protected function getArchitecture(): array
    {
        return [
            'controllers' => $this->scanPhpFiles(APPPATH . 'Controllers'),
            'models'      => $this->scanPhpFiles(APPPATH . 'Models'),
            'services'    => $this->scanPhpFiles(APPPATH . 'Services'),
            'libraries'   => $this->scanPhpFiles(APPPATH . 'Libraries'),
            'modules'     => $this->scanModuleArchitecture(APPPATH . 'Modules'),
        ];
    }

    protected function scanPhpFiles(string $directory): array
    {
        if (! is_dir($directory)) {
            return [];
        }

        $files = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile() || strtolower($file->getExtension()) !== 'php') {
                continue;
            }

            $files[] = str_replace(ROOTPATH, '', $file->getPathname());
        }

        sort($files);

        return $files;
    }

    protected function scanModuleArchitecture(string $modulesDir): array
    {
        if (! is_dir($modulesDir)) {
            return [];
        }

        $modules = [];
        $directories = scandir($modulesDir) ?: [];

        foreach ($directories as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            $fullPath = $modulesDir . DIRECTORY_SEPARATOR . $entry;
            if (! is_dir($fullPath)) {
                continue;
            }

            $modules[$entry] = [
                'controllers' => $this->scanPhpFiles($fullPath . DIRECTORY_SEPARATOR . 'Controllers'),
                'models'      => $this->scanPhpFiles($fullPath . DIRECTORY_SEPARATOR . 'Models'),
                'services'    => $this->scanPhpFiles($fullPath . DIRECTORY_SEPARATOR . 'Services'),
                'views'       => $this->scanViewFiles($fullPath . DIRECTORY_SEPARATOR . 'Views'),
                'config'      => $this->scanPhpFiles($fullPath . DIRECTORY_SEPARATOR . 'Config'),
            ];
        }

        ksort($modules);

        return $modules;
    }

    protected function scanViewFiles(string $directory): array
    {
        if (! is_dir($directory)) {
            return [];
        }

        $files = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile()) {
                continue;
            }

            $extension = strtolower($file->getExtension());
            if (! in_array($extension, ['php', 'html', 'js', 'css'], true)) {
                continue;
            }

            $files[] = str_replace(ROOTPATH, '', $file->getPathname());
        }

        sort($files);

        return $files;
    }

    protected function getDatabaseInfo(): array
    {
        try {
            $db = Database::connect();
            $tables = $db->listTables();
            sort($tables);

            $tableSummaries = [];
            foreach ($tables as $table) {
                $fields = [];
                $fieldData = $db->getFieldData($table);

                foreach ($fieldData as $field) {
                    $fields[] = [
                        'name'      => $field->name ?? null,
                        'type'      => $field->type ?? null,
                        'max_length'=> $field->max_length ?? null,
                        'nullable'  => $field->nullable ?? null,
                        'default'   => $field->default ?? null,
                    ];
                }

                $tableSummaries[] = [
                    'table'       => $table,
                    'field_count' => count($fields),
                    'fields'      => $fields,
                ];
            }

            return [
                'connected' => true,
                'database'  => $db->database ?? null,
                'tables'    => $tableSummaries,
            ];
        } catch (Throwable $e) {
            return [
                'connected' => false,
                'error'     => $e->getMessage(),
            ];
        }
    }

    protected function getCommandHealth(): array
    {
        $commandFiles = $this->scanPhpFiles(APPPATH . 'Commands');
        $issues = [];

        foreach ($commandFiles as $relativePath) {
            $fullPath = ROOTPATH . $relativePath;
            $contents = @file_get_contents($fullPath);

            if ($contents === false) {
                $issues[] = [
                    'file'  => $relativePath,
                    'issue' => 'Unreadable command file',
                ];
                continue;
            }

            if (strpos($contents, 'extends BaseCommand') !== false && strpos($contents, 'function run(') === false) {
                $issues[] = [
                    'file'  => $relativePath,
                    'issue' => 'Possible missing run() method',
                ];
            }

            if (strpos($contents, '$description') !== false && strpos($contents, 'protected $description') !== false) {
                $issues[] = [
                    'file'  => $relativePath,
                    'issue' => 'Check for typed/invalid BaseCommand property overrides',
                ];
            }
        }

        return [
            'commands' => $commandFiles,
            'issues'   => $issues,
        ];
    }

    protected function getPerformanceInsights(float $startTime): array
    {
        return [
            'memory_usage_bytes'      => memory_get_usage(true),
            'memory_peak_usage_bytes' => memory_get_peak_usage(true),
            'execution_seconds'       => round(microtime(true) - $startTime, 4),
            'included_files_count'    => count(get_included_files()),
        ];
    }

    protected function getSecurityInsights(): array
    {
        $security = config('Security');
        $app = config('App');

        return [
            'csrf_protection' => property_exists($security, 'csrfProtection') ? $security->csrfProtection : null,
            'force_global_secure_requests' => property_exists($app, 'forceGlobalSecureRequests')
                ? $app->forceGlobalSecureRequests
                : null,
            'session_driver' => config('Session')->driver ?? null,
            'cookie_secure'  => config('Cookie')->secure ?? null,
        ];
    }

    protected function buildSummary(array $report): array
    {
        $databaseTables = $report['database']['tables'] ?? [];
        $commandFiles = $report['commands']['commands'] ?? [];
        $commandIssues = $report['commands']['issues'] ?? [];

        return [
            'error_count'         => count($report['errors'] ?? []),
            'route_count'         => count($report['routes'] ?? []),
            'database_table_count'=> count($databaseTables),
            'command_count'       => count($commandFiles),
            'command_issue_count' => count($commandIssues),
            'controller_count'    => count($report['architecture']['controllers'] ?? []),
            'model_count'         => count($report['architecture']['models'] ?? []),
            'service_count'       => count($report['architecture']['services'] ?? []),
            'module_count'        => count($report['architecture']['modules'] ?? []),
        ];
    }

    protected function writeReports(array $report, string $reportDir): void
    {
        file_put_contents(
            $reportDir . '_aiops_all.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        file_put_contents(
            $reportDir . '_aiops_all.md',
            $this->buildMarkdownReport($report)
        );
    }

    protected function writeFailureReport(array $report, string $reportDir): void
    {
        file_put_contents(
            $reportDir . '_aiops_all.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        $md  = "# AIOps Full Report\n\n";
        $md .= "**Status:** Failed\n\n";
        $md .= "**Generated:** " . ($report['generated_at'] ?? date(DATE_ATOM)) . "\n\n";
        $md .= "## Error\n";
        $md .= "- Message: " . ($report['error']['message'] ?? 'Unknown error') . "\n";
        $md .= "- File: " . ($report['error']['file'] ?? 'Unknown file') . "\n";
        $md .= "- Line: " . ($report['error']['line'] ?? 'Unknown line') . "\n\n";
        $md .= "```text\n" . ($report['error']['trace'] ?? '') . "\n```\n";

        file_put_contents($reportDir . '_aiops_all.md', $md);
    }

    protected function buildMarkdownReport(array $report): string
    {
        $summary = $report['summary'] ?? [];
        $errors = $report['errors'] ?? [];
        $logs = $report['logs'] ?? [];
        $routes = $report['routes'] ?? [];
        $databaseTables = $report['database']['tables'] ?? [];
        $commandIssues = $report['commands']['issues'] ?? [];
        $architecture = $report['architecture'] ?? [];

        $md  = "# AIOps Full Report\n\n";
        $md .= "**Generated:** " . ($report['generated_at'] ?? date(DATE_ATOM)) . "\n\n";
        $md .= "## Executive Summary\n";
        $md .= "- Errors detected: " . ($summary['error_count'] ?? 0) . "\n";
        $md .= "- Routes discovered: " . ($summary['route_count'] ?? 0) . "\n";
        $md .= "- Database tables: " . ($summary['database_table_count'] ?? 0) . "\n";
        $md .= "- Command files: " . ($summary['command_count'] ?? 0) . "\n";
        $md .= "- Command issues: " . ($summary['command_issue_count'] ?? 0) . "\n";
        $md .= "- Root controllers: " . ($summary['controller_count'] ?? 0) . "\n";
        $md .= "- Root models: " . ($summary['model_count'] ?? 0) . "\n";
        $md .= "- Root services: " . ($summary['service_count'] ?? 0) . "\n";
        $md .= "- Modules discovered: " . ($summary['module_count'] ?? 0) . "\n\n";

        $md .= "## System\n```json\n";
        $md .= json_encode($report['system'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $md .= "\n```\n\n";

        $md .= "## Performance\n```json\n";
        $md .= json_encode($report['performance'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $md .= "\n```\n\n";

        $md .= "## Security\n```json\n";
        $md .= json_encode($report['security'] ?? [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $md .= "\n```\n\n";

        $md .= "## Detected Errors\n";
        if (empty($errors)) {
            $md .= "- No matching error patterns found in scanned log previews.\n\n";
        } else {
            foreach ($errors as $error) {
                $md .= "- **{$error['file']}** [pattern: {$error['pattern']}] {$error['line']}\n";
            }
            $md .= "\n";
        }

        $md .= "## Log Files Scanned\n";
        if (empty($logs)) {
            $md .= "- No log files found.\n\n";
        } else {
            foreach ($logs as $log) {
                $md .= "- **{$log['file']}** | size: {$log['size_bytes']} bytes | preview lines: {$log['line_count']}\n";
            }
            $md .= "\n";
        }

        $md .= "## Routes\n";
        if (empty($routes)) {
            $md .= "- No routes scanned.\n\n";
        } else {
            $routePreview = array_slice($routes, 0, 200);
            foreach ($routePreview as $route) {
                $md .= "- `{$route['route']}` => `{$route['handler']}`\n";
            }
            if (count($routes) > 200) {
                $md .= "- ... truncated, total routes: " . count($routes) . "\n";
            }
            $md .= "\n";
        }

        $md .= "## Architecture\n";
        $md .= "### Root Controllers\n";
        $md .= $this->markdownList($architecture['controllers'] ?? []);

        $md .= "### Root Models\n";
        $md .= $this->markdownList($architecture['models'] ?? []);

        $md .= "### Root Services\n";
        $md .= $this->markdownList($architecture['services'] ?? []);

        $md .= "### Root Libraries\n";
        $md .= $this->markdownList($architecture['libraries'] ?? []);

        $md .= "### Modules\n";
        if (empty($architecture['modules'])) {
            $md .= "- No modules found.\n\n";
        } else {
            foreach ($architecture['modules'] as $moduleName => $moduleData) {
                $md .= "#### {$moduleName}\n";
                $md .= "- Controllers: " . count($moduleData['controllers'] ?? []) . "\n";
                $md .= "- Models: " . count($moduleData['models'] ?? []) . "\n";
                $md .= "- Services: " . count($moduleData['services'] ?? []) . "\n";
                $md .= "- Views: " . count($moduleData['views'] ?? []) . "\n";
                $md .= "- Config: " . count($moduleData['config'] ?? []) . "\n\n";
            }
        }

        $md .= "## Database Tables\n";
        if (empty($databaseTables)) {
            $md .= "- No database metadata available.\n\n";
        } else {
            foreach ($databaseTables as $table) {
                $md .= "### {$table['table']}\n";
                $md .= "- Field count: {$table['field_count']}\n";
                foreach (($table['fields'] ?? []) as $field) {
                    $md .= "  - `{$field['name']}` ({$field['type']})";
                    if (! empty($field['max_length'])) {
                        $md .= " length={$field['max_length']}";
                    }
                    $md .= "\n";
                }
                $md .= "\n";
            }
        }

        $md .= "## Command Health\n";
        $md .= "### Command Files\n";
        $md .= $this->markdownList($report['commands']['commands'] ?? []);

        $md .= "### Command Issues\n";
        if (empty($commandIssues)) {
            $md .= "- No obvious command issues found from static scan.\n\n";
        } else {
            foreach ($commandIssues as $issue) {
                $md .= "- **{$issue['file']}**: {$issue['issue']}\n";
            }
            $md .= "\n";
        }

        $md .= "## Recommended Next Actions\n";
        $md .= "- Review the **Detected Errors** section first.\n";
        $md .= "- Prioritize files referenced repeatedly across logs.\n";
        $md .= "- Validate routes whose handlers map to recently changed controllers.\n";
        $md .= "- Review command issues before running large Spark task chains.\n";
        $md .= "- Use this file as the primary Codex input for the next repair pass.\n";

        return $md;
    }

    protected function markdownList(array $items): string
    {
        if (empty($items)) {
            return "- None found.\n\n";
        }

        $output = '';
        foreach ($items as $item) {
            $output .= "- {$item}\n";
        }
        $output .= "\n";

        return $output;
    }

    protected function ensureDirectory(string $directory): void
    {
        if (! is_dir($directory)) {
            mkdir($directory, 0775, true);
        }
    }
}