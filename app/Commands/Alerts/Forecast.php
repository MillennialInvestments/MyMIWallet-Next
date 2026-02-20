<?php

namespace App\Commands\Alerts;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Forecast extends SafeBaseCommand
{
    protected $group = 'Alerts';
    protected $name = 'alerts:forecast';
    protected $description = 'Refresh forecasts for open alerts.';
    protected $usage = 'forecasts:refresh [limit] [--dry-run] [--approve]';
    protected $arguments = [
        'limit' => 'Optional: max alerts to refresh (default 50, max 200).',
    ];
    protected $options = [
        '--dry-run' => 'Preview actions without running refresh jobs',
        '--approve' => 'Acknowledge and run forecast refresh jobs',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:forecasts:refresh] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $limit = (int) ($args[0] ?? 50);
        $limit = max(1, min(200, $limit));

        CLI::write('Forecast refresh starting...', 'green');
        log_message('info', 'FORECAST: CLI refresh started', ['limit' => $limit]);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Forecast refresh skipped.', 'yellow');
            log_message('info', '[spark:forecasts:refresh] Completed', ['limit' => $limit, 'dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $forecaster = service('mymiForecaster');
        $config = config('MyMIForecasting');
        if ($config && ! $config->runInline) {
            $summary = $forecaster->processQueuedJobs($limit);
        } else {
            $summary = $forecaster->refreshForecastsForOpenAlerts($limit);
        }

        CLI::write('Processed: ' . count($summary['processed']), 'yellow');
        CLI::write('Rate limited: ' . $summary['rate_limited'], 'yellow');

        if (! empty($summary['failures'])) {
            CLI::write('Failures: ' . implode(', ', $summary['failures']), 'red');
        }

        log_message('info', 'FORECAST: CLI refresh completed', $summary);
        log_message('info', '[spark:forecasts:refresh] Completed', [
            'limit' => $limit,
            'processed' => count($summary['processed'] ?? []),
            'rate_limited' => $summary['rate_limited'] ?? 0,
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
