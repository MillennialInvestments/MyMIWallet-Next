<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ForecastEvaluate extends BaseCommand
{
    protected $group = 'Forecasts';
    protected $name = 'forecasts:evaluate';
    protected $description = 'Evaluate forecasts for accuracy windows.';

    public function run(array $params)
    {
        $limit = (int) ($params[0] ?? 100);
        $limit = max(1, min(500, $limit));

        CLI::write('Forecast accuracy evaluation starting...', 'green');
        log_message('info', 'FORECAST: CLI evaluate started', ['limit' => $limit]);

        $evaluator = service('forecastAccuracyEvaluator');
        $summary = $evaluator->evaluateExpiredForecasts($limit);

        CLI::write('Evaluated: ' . $summary['evaluated'], 'yellow');
        CLI::write('Skipped: ' . $summary['skipped'], 'yellow');
        CLI::write('Errors: ' . $summary['errors'], 'red');

        log_message('info', 'FORECAST: CLI evaluate completed', $summary);
    }
}
