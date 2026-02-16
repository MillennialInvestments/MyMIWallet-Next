<?php

namespace App\Commands\Performance;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class K6Run extends SafeBaseCommand
{
    protected $group = 'Performance';
    protected $name = 'perf:k6';
    protected $description = 'Run k6 load test';

    public function run(array $params)
    {
        $script = getenv('HOME') . '/k6/script.js';

        if (!file_exists($script)) {
            CLI::error('k6 script not found.');
            return;
        }

        exec(getenv('HOME') . '/k6-v0.49.0-linux-amd64/k6 run ' . $script . ' 2>&1', $output);

        foreach ($output as $line) {
            CLI::write($line);
        }

        file_put_contents(
            WRITEPATH . 'audit/k6_report.log',
            implode("\n", $output)
        );
    }
}
