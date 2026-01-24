<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ForecastRefresh extends BaseCommand
{
    protected $group = 'Forecasts';
    protected $name = 'forecasts:refresh';
    protected $description = 'Refresh forecasts for open alerts.';

    public function run(array $params)
    {
        $limit = (int) ($params[0] ?? 50);
        $limit = max(1, min(200, $limit));

        CLI::write('Forecast refresh starting...', 'green');
        log_message('info', 'FORECAST: CLI refresh started', ['limit' => $limit]);

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
    }
}
