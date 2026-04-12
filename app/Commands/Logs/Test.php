<?php

namespace App\Commands\Logs;

use App\Commands\SafeBaseCommand;
use App\Services\Spark\LogHealthcheckService;
use CodeIgniter\CLI\CLI;

class Test extends SafeBaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:test';
    protected $description = 'Canonical logging test command (writes debug/info/error and validates file + DB sinks).';

    protected $options = [
        '--dry-run' => 'Preview checks without writing records',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $service = new LogHealthcheckService();
        $result = $service->run($dryRun);

        CLI::write('Running canonical logging test: logs:test', 'yellow');
        CLI::write('log_path=' . $result['log_path']);
        CLI::write('file_log_ok=' . ($result['file_log_ok'] ? 'true' : 'false'));

        if ($result['db_checked']) {
            CLI::write('db_log_ok=' . ($result['db_log_ok'] ? 'true' : 'false'));
            CLI::write('db_rows=' . $result['db_rows']);
        } else {
            CLI::error('db_log_ok=false (db not available: ' . $result['db_error'] . ')');
        }

        if ($dryRun) {
            CLI::write('dry_run=true');
        }

        $overall = $result['overall'];
        CLI::write('overall=' . ($overall ? 'PASS' : 'FAIL'), $overall ? 'green' : 'red');

        return $overall ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
