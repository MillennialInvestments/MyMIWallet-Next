<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class ForecastEvaluate extends BaseCommand
{
    protected $group = 'Forecasts';
    protected $name = 'forecasts:evaluate';
    protected $description = 'Evaluate forecast accuracy snapshots.';

    public function run(array $params)
    {
        $limit = (int) ($params[0] ?? 200);
        $limit = max(1, min(500, $limit));

        CLI::write('Forecast accuracy evaluation starting...', 'green');

        $evaluator = service('forecastAccuracyEvaluator');
        $summary = $evaluator->evaluateDueForecasts($limit);

        CLI::write('Processed: ' . ($summary['processed'] ?? 0), 'yellow');
        CLI::write('Inserted: ' . ($summary['inserted'] ?? 0), 'yellow');
        CLI::write('Skipped: ' . ($summary['skipped'] ?? 0), 'yellow');

        log_message('info', 'FORECAST: accuracy evaluation completed', $summary);
    }
}
