<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Observe extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:observe';
    protected $description = 'Parse logs and detect recurring error signatures';

    public function run(array $params)
    {
        $logs = [
            '/home/mymiteam/logs/mymiwallet.com/https/error.log',
            WRITEPATH . 'logs/php_fallback.log',
        ];

        $signatures = [];

        foreach ($logs as $log) {
            if (!file_exists($log)) continue;

            $lines = file($log);
            $recent = array_slice($lines, -500);

            foreach ($recent as $line) {
                if (preg_match('/(Exception|Error|Fatal|Warning)/i', $line)) {
                    $key = trim($line);
                    $signatures[$key] = ($signatures[$key] ?? 0) + 1;
                }
            }
        }

        arsort($signatures);

        $report = WRITEPATH . 'audit/observability_report.md';

        $output = "# Observability Report\n\n";

        foreach (array_slice($signatures, 0, 20) as $sig => $count) {
            $output .= "- {$count} occurrences: {$sig}\n";
        }

        file_put_contents($report, $output);

        CLI::write("Observability report generated.");
    }
}
