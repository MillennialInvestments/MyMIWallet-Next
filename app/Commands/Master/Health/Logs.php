<?php

declare(strict_types=1);

namespace App\Commands\Master\Health;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Logs extends SafeBaseCommand
{
    protected $group = 'master';
    protected $name = 'master:health:logs';
    protected $description = 'Inspect writable/logs for current log file health.';

    public function run(array $params)
    {
        $logsPath = WRITEPATH . 'logs';
        $files = glob($logsPath . '/*.php') ?: [];
        $report = [
            'generated_at' => date('Y-m-d H:i:s'),
            'log_files'    => [],
            'issues'       => [],
        ];

        foreach ($files as $file) {
            $size = filesize($file) ?: 0;

            $report['log_files'][] = [
                'file' => str_replace(ROOTPATH, '', $file),
                'size' => $size,
                'date' => date('Y-m-d H:i:s', filemtime($file)),
            ];

            if ($size > 20 * 1024 * 1024) {
                $report['issues'][] = basename($file) . ' exceeds 20MB';
            }
        }

        file_put_contents(
            ROOTPATH . 'docs/_health_logs.json',
            json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
        );

        CLI::write('Log health report written: docs/_health_logs.json', 'green');
    }
}