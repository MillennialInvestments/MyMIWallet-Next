<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Services\Ops\ApiHealthService;
use App\Services\Ops\AppSelfTestService;
use App\Services\Ops\ConfigAuditService;
use App\Services\Ops\DatabaseHealthService;
use App\Services\Ops\FilesystemHealthService;
use App\Services\Ops\SnapshotWriter;
use App\Services\Ops\SparkGovernanceService;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\Commands;
use Config\Services;
use Throwable;

class AppUpdate extends SafeBaseCommand
{
    protected $group = 'ops';
    protected $name = 'ops:app:update';
    protected $description = 'Safely update and validate the CI4 application.';
    protected $usage = 'ops:app:update [--dry-run] [--strict] [--migrate] [--migrate-only] [--no-api] [--no-aiops] [--json]';
    protected $options = [
        '--dry-run' => 'Report only (no changes)',
        '--strict' => 'External failures become fatal',
        '--migrate' => 'Run pending migrations',
        '--migrate-only' => 'Run database checks and stop',
        '--no-api' => 'Skip API checks',
        '--no-aiops' => 'Skip AIOps snapshot',
        '--json' => 'Emit JSON output',
        '--allow-ci' => 'Allow running in CI environment',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $dryRun = isset($flags['dry-run']);
        $strict = isset($flags['strict']);
        $migrate = isset($flags['migrate']);
        $migrateOnly = isset($flags['migrate-only']);
        $skipApi = isset($flags['no-api']);
        $skipAiops = isset($flags['no-aiops']);
        $json = isset($flags['json']);
        $allowCi = isset($flags['allow-ci']);

        $start = microtime(true);
        $phaseResults = [];
        $phaseResults[] = $this->runPhase('Phase 0: Environment Guardrails', function () use ($params, $allowCi) {
            $env = defined('ENVIRONMENT') ? ENVIRONMENT : getenv('CI_ENVIRONMENT');
            $hostname = gethostname() ?: 'unknown';
            $timestamp = date('c');

            $phaseWarnings = [];
            $phaseFailures = [];

            log_message('info', 'ops:app:update environment snapshot', [
                'environment' => $env,
                'hostname' => $hostname,
                'timestamp' => $timestamp,
            ]);

            if ($env === 'ci' && ! $allowCi) {
                $phaseFailures[] = 'Running in CI is blocked unless --allow-ci is set.';
            }

            foreach ($params as $param) {
                if (stripos($param, 'optimize') !== false) {
                    $phaseFailures[] = 'spark optimize is forbidden inside ops:app:update.';
                }
            }

            return [
                'details' => [
                    'environment' => $env,
                    'hostname' => $hostname,
                    'timestamp' => $timestamp,
                ],
                'warnings' => $phaseWarnings,
                'failures' => $phaseFailures,
            ];
        });

        $filesystemService = new FilesystemHealthService();
        $phaseResults[] = $this->runPhase('Phase 1: Filesystem & Permissions', function () use ($filesystemService, $dryRun) {
            $paths = [
                WRITEPATH,
                WRITEPATH . 'cache',
                WRITEPATH . 'logs',
                WRITEPATH . 'sessions',
                WRITEPATH . 'aiops',
                WRITEPATH . 'triage',
            ];

            $result = $filesystemService->check($paths, $dryRun);

            return [
                'details' => $result['entries'],
                'warnings' => $result['warnings'],
                'failures' => $result['failures'],
            ];
        });

        $phaseResults[] = $this->runPhase('Phase 2: Cache & Autoload Sanity', function () use ($dryRun) {
            $phaseWarnings = [];
            $phaseFailures = [];
            $details = [];

            if ($dryRun) {
                $phaseWarnings[] = 'Dry-run: cache clear skipped.';
            } else {
                try {
                    $result = Commands::run('cache:clear');
                    $details[] = ['command' => 'cache:clear', 'status' => $result === EXIT_SUCCESS ? 'pass' : 'fail'];
                    if ($result !== EXIT_SUCCESS) {
                        $phaseFailures[] = 'cache:clear reported failure.';
                    }
                } catch (Throwable $e) {
                    $phaseFailures[] = 'cache:clear failed: ' . $e->getMessage();
                }
            }

            $locator = Services::locator();
            if (method_exists($locator, 'reset')) {
                $locator->reset();
                $details[] = ['command' => 'FileLocator::reset', 'status' => 'pass'];
            } else {
                $phaseWarnings[] = 'FileLocator reset unavailable; skipped.';
                $details[] = ['command' => 'FileLocator::reset', 'status' => 'skip'];
            }

            return [
                'details' => $details,
                'warnings' => $phaseWarnings,
                'failures' => $phaseFailures,
            ];
        });

        $databaseService = new DatabaseHealthService();
        $phaseResults[] = $this->runPhase('Phase 3: Database Health', function () use ($databaseService, $migrate, $dryRun) {
            $result = $databaseService->check($migrate, $dryRun);

            return [
                'details' => $result,
                'warnings' => $result['warnings'],
                'failures' => $result['failures'],
            ];
        });

        if ($migrateOnly) {
            return $this->finalizeRun($phaseResults, $start, $json, $dryRun, $skipAiops);
        }

        $configAudit = new ConfigAuditService();
        $phaseResults[] = $this->runPhase('Phase 4: Configuration Audit', function () use ($configAudit) {
            $result = $configAudit->audit();

            return [
                'details' => $result['checks'],
                'warnings' => $result['warnings'],
                'failures' => $result['failures'],
            ];
        });

        if ($skipApi) {
            $phaseResults[] = [
                'name' => 'Phase 5: API & Integration Health',
                'status' => 'skipped',
                'details' => [],
                'warnings' => ['--no-api specified; checks skipped.'],
                'failures' => [],
                'duration_ms' => 0,
            ];
        } else {
            $apiService = new ApiHealthService();
            $baseUrl = rtrim((string) config('App')->baseURL, '/') ?: null;
            $internalRoutes = [
                'system/healthz',
                'API/Health',
            ];
            $externalChecks = $this->buildExternalChecks();

            $phaseResults[] = $this->runPhase('Phase 5: API & Integration Health', function () use ($apiService, $baseUrl, $internalRoutes, $externalChecks, $strict) {
                $result = $apiService->run($baseUrl, $internalRoutes, $externalChecks, $strict);
                $securityAudit = $this->auditSecurityConfig();

                return [
                    'details' => [
                        'internal' => $result['internal'],
                        'external' => $result['external'],
                        'security' => $securityAudit['details'],
                    ],
                    'warnings' => array_merge($result['warnings'], $securityAudit['warnings']),
                    'failures' => array_merge($result['failures'], $securityAudit['failures']),
                ];
            });
        }

        $governance = new SparkGovernanceService();
        $phaseResults[] = $this->runPhase('Phase 6: Spark Command Governance', function () use ($governance) {
            $result = $governance->audit();
            $violations = $result['violations'];
            $warnings = [];
            $failures = [];

            if ($violations !== []) {
                $failures[] = sprintf('Spark governance violations: %d', count($violations));
            }

            return [
                'details' => [
                    'ran_audit' => $result['ran_audit'],
                    'violations' => $violations,
                ],
                'warnings' => $warnings,
                'failures' => $failures,
            ];
        });

        $selfTestService = new AppSelfTestService();
        $phaseResults[] = $this->runPhase('Phase 7: Application Self-Tests', function () use ($selfTestService) {
            $controllers = [
                \App\Controllers\Home::class,
                \App\Controllers\Health::class,
                \App\Controllers\OpsHealth::class,
            ];
            $services = [
                'cache',
                'validation',
                'email',
            ];
            $result = $selfTestService->run($controllers, $services);

            return [
                'details' => $result['checks'],
                'warnings' => $result['warnings'],
                'failures' => $result['failures'],
            ];
        });

        $aiopsWarnings = [];
        if ($skipAiops) {
            $phaseResults[] = [
                'name' => 'Phase 8: AIOps Snapshot',
                'status' => 'skipped',
                'details' => [],
                'warnings' => ['--no-aiops specified; snapshot skipped.'],
                'failures' => [],
                'duration_ms' => 0,
            ];
        } else {
            $snapshotWriter = new SnapshotWriter();
            $phaseResults[] = $this->runPhase('Phase 8: AIOps Snapshot', function () use ($snapshotWriter, $dryRun, &$aiopsWarnings, $phaseResults) {
                $timestamp = date('Ymd-His');
                $path = WRITEPATH . 'aiops/snapshots/app-update-' . $timestamp . '.json';
                $summary = $this->summarizePhases($phaseResults);

                $payload = [
                    'generated_at' => date('c'),
                    'summary' => $summary,
                    'phases' => $phaseResults,
                ];

                $writeResult = $snapshotWriter->write($path, $payload, $dryRun);
                $dispatchWarnings = $snapshotWriter->dispatch($summary, $dryRun);
                $aiopsWarnings = array_merge($writeResult['warnings'], $dispatchWarnings);

                return [
                    'details' => [
                        'path' => $writeResult['path'],
                        'wrote' => $writeResult['wrote'],
                    ],
                    'warnings' => $aiopsWarnings,
                    'failures' => [],
                ];
            });
        }

        return $this->finalizeRun($phaseResults, $start, $json, $dryRun, $skipAiops);
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * @return list<array{label: string, url: string, method?: string, timeout?: int}>
     */
    private function buildExternalChecks(): array
    {
        $checks = [];

        $discord = getenv('DISCORD_WEBHOOK_URL') ?: getenv('DISCORD_WEBHOOK');
        if ($discord) {
            $checks[] = ['label' => 'external:discord', 'url' => $discord, 'method' => 'HEAD'];
        }

        $email = new \Config\Email();
        if (! empty($email->SMTPHost) && ! empty($email->SMTPPort)) {
            $checks[] = [
                'label' => 'external:mail',
                'url' => sprintf('tcp://%s:%s', $email->SMTPHost, $email->SMTPPort),
                'method' => 'HEAD',
            ];
        }

        $marketHost = getenv('MARKET_AUX_BASE_URL') ?: 'https://api.marketaux.com';
        $checks[] = ['label' => 'external:marketaux', 'url' => $marketHost, 'method' => 'HEAD'];

        $checks[] = ['label' => 'external:alphavantage', 'url' => 'https://www.alphavantage.co', 'method' => 'HEAD'];
        $checks[] = ['label' => 'external:coingecko', 'url' => 'https://api.coingecko.com', 'method' => 'HEAD'];

        return $checks;
    }

    /**
     * @param array<string, mixed> $phaseResult
     */
    private function runPhase(string $name, callable $callback): array
    {
        $phaseStart = microtime(true);
        $details = [];
        $warnings = [];
        $failures = [];
        $status = 'passed';

        try {
            $result = $callback();
            $details = $result['details'] ?? [];
            $warnings = $result['warnings'] ?? [];
            $failures = $result['failures'] ?? [];
        } catch (Throwable $e) {
            $failures = ['Unhandled exception: ' . $e->getMessage()];
        }

        if ($failures !== []) {
            $status = 'failed';
        } elseif ($warnings !== []) {
            $status = 'warning';
        }

        $durationMs = (int) round((microtime(true) - $phaseStart) * 1000);

        return [
            'name' => $name,
            'status' => $status,
            'details' => $details,
            'warnings' => $warnings,
            'failures' => $failures,
            'duration_ms' => $durationMs,
        ];
    }

    private function finalizeRun(
        array $phaseResults,
        float $start,
        bool $json,
        bool $dryRun,
        bool $skipAiops
    ) {
        $summary = $this->summarizePhases($phaseResults);
        $exitCode = $summary['failures'] > 0 ? 2 : ($summary['warnings'] > 0 ? 1 : 0);
        $summary['exit_code'] = $exitCode;
        $summary['duration_ms'] = (int) round((microtime(true) - $start) * 1000);
        $summary['dry_run'] = $dryRun;
        $summary['aiops'] = $skipAiops ? 'skipped' : 'enabled';

        if ($json) {
            CLI::write(json_encode([
                'summary' => $summary,
                'phases' => $phaseResults,
            ], JSON_PRETTY_PRINT));
        } else {
            $this->renderSummary($summary, $phaseResults);
        }

        return $exitCode;
    }

    /**
     * @param list<array<string, mixed>> $phases
     * @return array<string, int>
     */
    private function summarizePhases(array $phases): array
    {
        $passed = 0;
        $warned = 0;
        $failed = 0;

        foreach ($phases as $phase) {
            if (($phase['status'] ?? '') === 'failed') {
                $failed++;
            } elseif (($phase['status'] ?? '') === 'warning') {
                $warned++;
            } elseif (($phase['status'] ?? '') === 'passed') {
                $passed++;
            }
        }

        return [
            'passed' => $passed,
            'warnings' => $warned,
            'failures' => $failed,
        ];
    }

    /**
     * @return array{details: array<string, mixed>, warnings: list<string>, failures: list<string>}
     */
    private function auditSecurityConfig(): array
    {
        $warnings = [];
        $failures = [];
        $details = [];

        $security = new \Config\Security();
        $validCsrf = in_array($security->csrfProtection, ['cookie', 'session'], true);

        $details['csrf'] = [
            'protection' => $security->csrfProtection,
            'token_name_set' => $security->tokenName !== '',
            'header_name_set' => $security->headerName !== '',
            'cookie_name_set' => $security->cookieName !== '',
            'valid' => $validCsrf,
        ];

        if (! $validCsrf) {
            $failures[] = 'Invalid CSRF protection mode configured.';
        }

        if ($security->tokenName === '' || $security->headerName === '' || $security->cookieName === '') {
            $warnings[] = 'CSRF token/header/cookie names missing.';
        }

        $filters = new \Config\Filters();
        $authAlias = $filters->aliases['auth'] ?? null;
        $authCheckAlias = $filters->aliases['authcheck'] ?? null;

        $details['auth'] = [
            'auth_alias' => $authAlias ? 'set' : 'missing',
            'authcheck_alias' => $authCheckAlias ? 'set' : 'missing',
        ];

        if (! $authAlias && ! $authCheckAlias) {
            $warnings[] = 'Auth filter aliases missing.';
        }

        if ($authAlias && is_string($authAlias) && ! class_exists($authAlias)) {
            $failures[] = 'Auth filter class not loadable.';
        }

        if ($authCheckAlias && is_string($authCheckAlias) && ! class_exists($authCheckAlias)) {
            $warnings[] = 'Authcheck filter class not loadable.';
        }

        return [
            'details' => $details,
            'warnings' => $warnings,
            'failures' => $failures,
        ];
    }

    /**
     * @param array<string, int> $summary
     * @param list<array<string, mixed>> $phases
     */
    private function renderSummary(array $summary, array $phases): void
    {
        CLI::write('ops:app:update summary', 'green');
        CLI::write(sprintf('✔ Passed: %d', $summary['passed']));
        CLI::write(sprintf('⚠️ Warnings: %d', $summary['warnings']), $summary['warnings'] > 0 ? 'yellow' : 'white');
        CLI::write(sprintf('❌ Failures: %d', $summary['failures']), $summary['failures'] > 0 ? 'red' : 'white');

        foreach ($phases as $phase) {
            $status = $phase['status'] ?? 'unknown';
            $duration = $phase['duration_ms'] ?? 0;
            CLI::write(sprintf('%s — %s (%dms)', $phase['name'], strtoupper($status), $duration));
            foreach (($phase['warnings'] ?? []) as $warning) {
                CLI::write('  ⚠️ ' . $warning, 'yellow');
            }
            foreach (($phase['failures'] ?? []) as $failure) {
                CLI::write('  ❌ ' . $failure, 'red');
            }
        }
    }
}
