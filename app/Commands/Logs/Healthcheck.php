<?php

namespace App\Commands\Logs;

use App\Services\Spark\LogHealthcheckService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Healthcheck extends BaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:healthcheck';
    protected $description = 'Emit test logs and verify file + DB log sinks are functioning.';

    protected $arguments = [];
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--force'   => 'Required for destructive actions',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:logs:healthcheck] Started');
        CLI::write('Starting logs:healthcheck', 'yellow');

        $dryRun = $this->option('dry-run') !== null || ! $this->option('force');

        $service = new LogHealthcheckService();
        $result = $service->run($dryRun);

        CLI::newLine();
        CLI::write('Log healthcheck summary');
        CLI::write('----------------------------------------');
        CLI::write('marker: ' . $result['marker']);
        CLI::write('file_log_path: ' . $result['log_path']);
        CLI::write('file_log_ok=' . ($result['file_log_ok'] ? 'true' : 'false'));

        if ($result['db_checked']) {
            CLI::write('db_log_ok=' . ($result['db_log_ok'] ? 'true' : 'false'));
            CLI::write('db_rows=' . $result['db_rows']);
        } else {
            CLI::error('db_log_ok=false (db not available: ' . $result['db_error'] . ')');
        }

        if ($result['dry_run']) {
            CLI::write('dry_run=true (no log records written)');
        }

        $overall = $result['overall'];
        CLI::write('overall=' . ($overall ? 'PASS' : 'FAIL'));

        log_message('info', '[spark:logs:healthcheck] Completed', [
            'overall'    => $overall ? 'PASS' : 'FAIL',
            'file_ok'    => $result['file_log_ok'],
            'db_ok'      => $result['db_log_ok'],
            'db_rows'    => $result['db_rows'],
            'dry_run'    => $result['dry_run'],
        ]);

        return $overall ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
