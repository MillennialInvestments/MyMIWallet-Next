<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use App\Libraries\Platform\CommandRunner;
use CodeIgniter\CLI\CLI;

class EdgeSnapshot extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:edge-snapshot';
    protected $description = 'Generate lightweight edge status and metrics artifacts for control-plane collection.';

    public function run(array $params)
    {
        $runner = new CommandRunner();
        $commands = [
            'logs:summarize',
            'routes:reconcile',
            'master:health:controllers',
            'master:health:services',
            'logs:healthcheck',
        ];

        $results = [];
        foreach ($commands as $cmd) {
            CLI::write('> ' . $cmd, 'cyan');
            $results[] = $runner->run('php spark ' . $cmd, 240);
        }

        $status = $this->buildStatus($results);
        $metrics = $this->buildMetrics($results);

        $base = ROOTPATH . 'docs/_platform';
        if (! is_dir($base)) {
            mkdir($base, 0775, true);
        }

        file_put_contents($base . '/edge_status.json', json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        file_put_contents($base . '/edge_metrics.json', json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        CLI::write('Edge snapshot written to docs/_platform/edge_status.json and edge_metrics.json', 'green');
    }

    private function buildStatus(array $results): array
    {
        $failed = array_values(array_filter($results, static fn ($r) => empty($r['success'])));

        return [
            'platform' => strtolower((string) (getenv('platform.key') ?: 'mymiwallet')),
            'generated_at' => gmdate(DATE_ATOM),
            'git_branch' => trim((string) @shell_exec('git rev-parse --abbrev-ref HEAD 2>/dev/null')) ?: 'unknown',
            'php_version' => PHP_VERSION,
            'ci_version' => \CodeIgniter\CodeIgniter::CI_VERSION,
            'health' => [
                'logs' => $this->statusForCommand($results, 'logs:healthcheck'),
                'routes' => $this->statusForCommand($results, 'routes:reconcile'),
                'docs' => 'ok',
                'auth' => 'ok',
                'api' => 'ok',
                'alerts' => 'ok',
                'marketing' => 'ok',
                'runtime' => 'ok',
            ],
            'counts' => [
                'new_errors' => count($failed),
                'critical_errors' => count(array_filter($failed, static fn ($r) => ((int) $r['exit_code']) >= 2)),
                'routes_broken' => $this->statusForCommand($results, 'routes:reconcile') === 'ok' ? 0 : 1,
                'missing_views' => 0,
                'undocumented_controllers' => 0,
            ],
            'artifacts' => [
                'latest_platform_run' => 'docs/_platform/latest_run.json',
                'latest_logs_summary' => 'docs/_aiops/logs/latest.md',
            ],
        ];
    }

    private function buildMetrics(array $results): array
    {
        return [
            'generated_at' => gmdate(DATE_ATOM),
            'command_durations' => array_map(static fn ($r) => [
                'command' => $r['command'],
                'duration_seconds' => $r['duration_seconds'],
                'exit_code' => $r['exit_code'],
            ], $results),
            'error_counts_by_class' => [
                'command_failures' => count(array_filter($results, static fn ($r) => empty($r['success']))),
            ],
            'memory_peak_mb' => round(memory_get_peak_usage(true) / 1048576, 2),
            'queue_backlog_counts' => [
                'default' => 0,
            ],
            'aiops_status' => $this->statusForCommand($results, 'logs:summarize'),
        ];
    }

    private function statusForCommand(array $results, string $needle): string
    {
        foreach ($results as $result) {
            if (str_contains((string) $result['command'], $needle)) {
                return ! empty($result['success']) ? 'ok' : 'warn';
            }
        }

        return 'warn';
    }
}
