<?php

namespace App\Commands\AiOps\Observe;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Scan extends SafeBaseCommand
{
    protected $group = 'AIOps - Observe';
    protected $name = 'aiops:observe:scan';
    protected $description = 'Scan logs and persist recurring errors';

    public function run(array $params)
    {
        $logs = [
            '/home/mymiteam/logs/mymiwallet.com/https/error.log',
            WRITEPATH . 'logs/php_fallback.log',
        ];

        $errors = [];

        foreach ($logs as $log) {
            if (!file_exists($log)) continue;

            $lines = array_slice(file($log), -1000);

            foreach ($lines as $line) {
                if (preg_match('/(Exception|Error|Fatal|Warning)/i', $line)) {
                    $clean = trim($line);
                    $errors[$clean] = ($errors[$clean] ?? 0) + 1;
                }
            }
        }

        arsort($errors);

        $statePath = WRITEPATH . 'audit/observability_state.json';

        file_put_contents($statePath, json_encode([
            'timestamp' => date('c'),
            'errors' => $errors
        ], JSON_PRETTY_PRINT));

        CLI::write('Observability state updated.');
    }
}
