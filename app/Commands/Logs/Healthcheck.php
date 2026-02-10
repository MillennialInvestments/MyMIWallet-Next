<?php

namespace App\Commands\Logs;

use App\Services\Spark\LogHealthcheckService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Healthcheck extends SafeBaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:healthcheck';
    protected $description = 'Emit test logs and verify file + DB log sinks are functioning.';

    protected $arguments = [];
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
    ];

    public function run(array $params)
    {
        log_message('info', '[AIOPS][SPARK][GOVERNANCE][spark:logs:healthcheck] Started', ['params' => $params]);
        CLI::write('Starting logs:healthcheck', 'yellow');

        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

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

        CLI::write('fallback_log_ok=' . ($result['fallback_log_ok'] ? 'true' : 'false'));
        CLI::write('fallback_path=' . $result['fallback_path']);

        $debugMode = filter_var((string) env('LOGS_HEALTHCHECK_DEBUG', false), FILTER_VALIDATE_BOOLEAN);
        if ($debugMode) {
            CLI::newLine();
            CLI::write('debug_mode=true', 'yellow');
            $dbDebug = $result['debug']['db'] ?? [];
            CLI::write('db_table=' . ($dbDebug['table'] ?? 'n/a'));
            CLI::write('db_message_column=' . ($dbDebug['message_column'] ?? 'n/a'));
            if (isset($dbDebug['compiled_select'])) {
                CLI::write('db_compiled_select=' . $dbDebug['compiled_select']);
            }
            CLI::write('expected_log_path=' . ($result['debug']['expected_log_path'] ?? $result['log_path']));
            CLI::write('log_tail_last_10_lines:');
            $tailLines = $result['debug']['log_tail'] ?? [];
            foreach ($tailLines as $line) {
                CLI::write('  ' . $line);
            }
        }

        if ($result['dry_run']) {
            CLI::write('dry_run=true (no log records written)');
        }

        $overall = $result['overall'];
        CLI::write('overall=' . ($overall ? 'PASS' : 'FAIL'));

        log_message('info', '[AIOPS][SPARK][GOVERNANCE][spark:logs:healthcheck] Completed', [
            'overall'    => $overall ? 'PASS' : 'FAIL',
            'file_ok'    => $result['file_log_ok'],
            'db_ok'      => $result['db_log_ok'],
            'db_rows'    => $result['db_rows'],
            'fallback_ok' => $result['fallback_log_ok'],
            'dry_run'    => $result['dry_run'],
        ]);

        return $overall ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
