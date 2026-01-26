<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ForecastEvaluate extends SafeBaseCommand
{
    protected $group = 'Forecasts';
    protected $name = 'forecasts:evaluate';
    protected $description = 'Evaluate forecasts for accuracy windows.';
    protected $usage = 'forecasts:evaluate [limit] [--dry-run]';
    protected $arguments = [
        'limit' => 'Optional: max forecasts to evaluate (default 100, max 500).',
    ];
    protected $options = [
        '--dry-run' => 'Preview actions without running evaluation',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:forecasts:evaluate] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $limit = (int) ($args[0] ?? 100);
        $limit = max(1, min(500, $limit));

        CLI::write('Forecast accuracy evaluation starting...', 'green');
        log_message('info', 'FORECAST: CLI evaluate started', ['limit' => $limit]);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Forecast evaluation skipped.', 'yellow');
            log_message('info', '[spark:forecasts:evaluate] Completed', ['limit' => $limit, 'dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $evaluator = service('forecastAccuracyEvaluator');
        $summary = $evaluator->evaluateExpiredForecasts($limit);

        CLI::write('Evaluated: ' . $summary['evaluated'], 'yellow');
        CLI::write('Skipped: ' . $summary['skipped'], 'yellow');
        CLI::write('Errors: ' . $summary['errors'], 'red');

        log_message('info', 'FORECAST: CLI evaluate completed', $summary);
        log_message('info', '[spark:forecasts:evaluate] Completed', [
            'evaluated' => $summary['evaluated'] ?? 0,
            'errors' => $summary['errors'] ?? 0,
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
