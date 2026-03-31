<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use App\Libraries\Platform\CommandRunner;
use App\Libraries\Platform\PlatformReportWriter;
use CodeIgniter\CLI\CLI;

class RunPlatform extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:run';
    protected $description = 'Run deterministic platform lifecycle orchestration with safe failure isolation.';

    protected $usage = 'platform:run [--strict=1] [--repair=1] [--apply=1] [--ops=1] [--ai=1] [--codex=1] [--sync-docs=1] [--repair-routes=1] [--patch-validate=1] [--subsystems=alerts,marketing,api] [--profile=light|nightly|predeploy]';

    protected $options = [
        '--strict' => 'Fail hard on first command failure when set to 1.',
        '--repair' => 'Run safe remediation stage when set to 1.',
        '--apply' => 'Allow patch apply command in remediation stage when set to 1.',
        '--ops' => 'Run infra/environment stage when set to 1.',
        '--ai' => 'Run AI layer checks when set to 1.',
        '--codex' => 'Run Codex review pipeline when set to 1.',
        '--sync-docs' => 'Run docs:sync-all in stage 1 when set to 1.',
        '--repair-routes' => 'Run routes:repair after routes:reconcile when set to 1.',
        '--patch-validate' => 'Run patch validation and risk scoring commands when set to 1.',
        '--subsystems' => 'Comma-separated subsystem list: alerts,marketing,api,auth,wallets,research',
        '--profile' => 'Profile mapping: light, nightly, predeploy',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $runner = new CommandRunner();
        $writer = new PlatformReportWriter();

        $strict = $this->isEnabled($flags, 'strict');
        $profile = strtolower((string) ($flags['profile'] ?? ''));
        $profileFlags = $this->resolveProfileFlags($profile);
        $flags = array_merge($profileFlags, $flags);

        CLI::write('Starting platform orchestration...', 'yellow');
        log_message('info', 'platform:run started', ['flags' => $flags]);

        $stages = $this->buildStages($flags);
        $stageResults = [];
        $failedCommands = [];
        $skippedCommands = [];

        $start = microtime(true);

        foreach ($stages as $stageName => $commands) {
            $stageStart = microtime(true);
            CLI::write('Stage: ' . $stageName, 'cyan');
            log_message('info', 'platform:run stage start', ['stage' => $stageName]);

            $results = [];
            $stageOk = true;

            foreach ($commands as $commandDef) {
                $cmd = $commandDef['cmd'];
                $enabled = $commandDef['enabled'] ?? true;
                $skipReason = $commandDef['skip_reason'] ?? 'Flag not enabled';

                if (! $enabled) {
                    $result = $runner->skipped($cmd, $skipReason);
                    $results[] = $result;
                    $skippedCommands[] = $cmd;
                    continue;
                }

                if ($cmd === $this->name) {
                    $result = $runner->skipped($cmd, 'Recursive command call prevented');
                    $results[] = $result;
                    $skippedCommands[] = $cmd;
                    continue;
                }

                CLI::write('  > ' . $cmd, 'light_gray');
                $result = $runner->run('php spark ' . $cmd, 600);
                $results[] = $result;

                if (! $result['success']) {
                    $stageOk = false;
                    $failedCommands[] = [
                        'stage' => $stageName,
                        'command' => $cmd,
                        'exit_code' => $result['exit_code'],
                        'stderr' => $result['stderr'],
                    ];

                    log_message('error', 'platform:run command failure', [
                        'stage' => $stageName,
                        'command' => $cmd,
                        'exit_code' => $result['exit_code'],
                    ]);

                    if ($strict) {
                        break 2;
                    }
                }
            }

            $stageResults[] = [
                'stage' => $stageName,
                'duration_seconds' => round(microtime(true) - $stageStart, 3),
                'success' => $stageOk,
                'results' => $results,
            ];

            log_message('info', 'platform:run stage complete', [
                'stage' => $stageName,
                'success' => $stageOk,
            ]);
        }

        $report = [
            'timestamp' => gmdate(DATE_ATOM),
            'hostname' => php_uname('n'),
            'repo' => basename(ROOTPATH),
            'git_branch' => $this->gitBranch(),
            'flags' => $flags,
            'summary' => [
                'strict_mode' => $strict,
                'duration_seconds' => round(microtime(true) - $start, 3),
                'stages_total' => count($stageResults),
                'stages_failed' => count(array_filter($stageResults, static fn ($stage) => ! $stage['success'])),
                'failed_commands_count' => count($failedCommands),
                'skipped_commands_count' => count($skippedCommands),
            ],
            'stage_results' => $stageResults,
            'failed_commands' => $failedCommands,
            'skipped_commands' => array_values(array_unique($skippedCommands)),
            'suggested_next_actions' => $this->nextActions($failedCommands),
        ];

        $paths = $writer->writeRunReport($report, 30);

        log_message('info', 'platform:run completed', ['report' => $paths, 'summary' => $report['summary']]);

        CLI::write('Completed platform orchestration.', 'green');
        CLI::write('Report JSON: ' . $paths['latest_json'], 'green');
        CLI::write('Report MD: ' . $paths['latest_md'], 'green');
    }

    private function buildStages(array $flags): array
    {
        $repair = $this->isEnabled($flags, 'repair');
        $apply = $this->isEnabled($flags, 'apply');
        $patchValidate = $this->isEnabled($flags, 'patch-validate');
        $ops = $this->isEnabled($flags, 'ops');
        $ai = $this->isEnabled($flags, 'ai');
        $codex = $this->isEnabled($flags, 'codex');
        $syncDocs = $this->isEnabled($flags, 'sync-docs');
        $repairRoutes = $this->isEnabled($flags, 'repair-routes');

        $subsystems = $this->parseSubsystems((string) ($flags['subsystems'] ?? ''));

        $stages = [
            'Stage 0 — Preflight' => [
                ['cmd' => 'runtime:spark-doctor'],
                ['cmd' => 'logs:healthcheck'],
                ['cmd' => 'health:services'],
                ['cmd' => 'env:doctor'],
            ],
            'Stage 1 — Documentation / structural memory' => [
                ['cmd' => 'docs:inventory'],
                ['cmd' => 'docs:generate-architecture-map'],
                ['cmd' => 'docs:generate-knowledge-graph'],
                ['cmd' => 'docs:sync-all', 'enabled' => $syncDocs, 'skip_reason' => '--sync-docs not enabled'],
            ],
            'Stage 2 — Core application integrity' => [
                ['cmd' => 'master:health:controllers'],
                ['cmd' => 'master:health:models'],
                ['cmd' => 'master:health:services'],
                ['cmd' => 'routes:reconcile'],
                ['cmd' => 'routes:repair', 'enabled' => $repairRoutes, 'skip_reason' => '--repair-routes not enabled'],
            ],
            'Stage 3 — Log intelligence' => [
                ['cmd' => 'logs:summarize-all'],
                ['cmd' => 'app:logs:consolidate'],
                ['cmd' => 'aiops:observe'],
                ['cmd' => 'aiops:observe:snapshot'],
            ],
            'Stage 4 — Safe remediation' => [
                ['cmd' => 'aiops:repair:run_safe', 'enabled' => $repair, 'skip_reason' => '--repair not enabled'],
                ['cmd' => 'aiops:patch:validate', 'enabled' => $patchValidate, 'skip_reason' => '--patch-validate not enabled'],
                ['cmd' => 'aiops:patch:risk_score', 'enabled' => $patchValidate, 'skip_reason' => '--patch-validate not enabled'],
                ['cmd' => 'aiops:patch:apply', 'enabled' => $apply, 'skip_reason' => '--apply not enabled'],
            ],
            'Stage 5 — Product subsystem checks' => $this->subsystemStage($subsystems),
            'Stage 6 — Infra / environment' => [
                ['cmd' => 'ops:doctor:full', 'enabled' => $ops, 'skip_reason' => '--ops not enabled'],
                ['cmd' => 'ops:vps:snapshot', 'enabled' => $ops, 'skip_reason' => '--ops not enabled'],
                ['cmd' => 'ops:network:matrix', 'enabled' => $ops, 'skip_reason' => '--ops not enabled'],
            ],
            'Stage 7 — AI layer' => [
                ['cmd' => 'ollama:health', 'enabled' => $ai, 'skip_reason' => '--ai not enabled'],
                ['cmd' => 'ollama:queue:stats', 'enabled' => $ai, 'skip_reason' => '--ai not enabled'],
                ['cmd' => 'codex:review', 'enabled' => $codex, 'skip_reason' => '--codex not enabled'],
                ['cmd' => 'codex:review:publish', 'enabled' => $codex, 'skip_reason' => '--codex not enabled'],
            ],
        ];

        return $stages;
    }

    private function subsystemStage(array $subsystems): array
    {
        $map = [
            'alerts' => ['alerts:audit', 'aiops:alerts-health'],
            'marketing' => ['marketing:automation-audit', 'maintenance:news:audit'],
            'api' => ['api:audit', 'api:filters-check', 'api:rate-limit-check'],
            'auth' => ['auth:audit', 'auth:flow-smoke'],
            'wallets' => ['ops:integrity:wallet', 'wallets:warm-summary-cache'],
            'research' => ['research:pipeline:run', 'research:reports:daily'],
        ];

        $selected = $subsystems === [] ? array_keys($map) : $subsystems;

        $commands = [];
        foreach ($map as $subsystem => $cmds) {
            $enabled = in_array($subsystem, $selected, true);
            foreach ($cmds as $cmd) {
                $commands[] = [
                    'cmd' => $cmd,
                    'enabled' => $enabled,
                    'skip_reason' => sprintf('Subsystem "%s" not selected', $subsystem),
                ];
            }
        }

        return $commands;
    }

    private function parseSubsystems(string $raw): array
    {
        if (trim($raw) === '') {
            return [];
        }

        $allowed = ['alerts', 'marketing', 'api', 'auth', 'wallets', 'research'];
        $items = array_map('trim', explode(',', strtolower($raw)));
        $items = array_values(array_intersect($allowed, $items));

        return array_values(array_unique($items));
    }

    private function isEnabled(array $flags, string $key): bool
    {
        if (! array_key_exists($key, $flags)) {
            return false;
        }

        $value = $flags[$key];
        if ($value === true || $value === '1' || $value === 1 || $value === 'true') {
            return true;
        }

        return false;
    }

    private function resolveProfileFlags(string $profile): array
    {
        if ($profile === 'nightly') {
            return [
                'sync-docs' => '1',
                'repair-routes' => '1',
                'ops' => '1',
                'ai' => '1',
                'codex' => '1',
                'subsystems' => 'alerts,marketing,api,auth,wallets,research',
            ];
        }

        if ($profile === 'light') {
            return [
                'subsystems' => '',
            ];
        }

        if ($profile === 'predeploy') {
            return [
                'sync-docs' => '1',
                'repair-routes' => '1',
                'ops' => '1',
                'subsystems' => 'api,auth',
            ];
        }

        return [];
    }

    private function gitBranch(): string
    {
        $head = @shell_exec('git rev-parse --abbrev-ref HEAD 2>/dev/null');

        return trim((string) $head) ?: 'unknown';
    }

    private function nextActions(array $failedCommands): array
    {
        if ($failedCommands === []) {
            return ['No immediate action required.'];
        }

        return [
            'Review failed commands in docs/_platform/latest_run.json.',
            'Re-run with --strict=1 during CI validation.',
            'Use targeted profile: php spark platform:run --profile=light.',
        ];
    }
}
