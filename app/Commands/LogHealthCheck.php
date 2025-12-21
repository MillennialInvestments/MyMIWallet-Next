<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Log\Handlers\FileHandler;
use Config\Database;

class LogHealthcheck extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'logs:healthcheck';
    protected $description = 'Emit test logs and verify file + DB log sinks are functioning.';

    public function run(array $params)
    {
        $marker   = bin2hex(random_bytes(6));
        $logPath  = $this->resolveLogPath();
        $beforeSz = is_file($logPath) ? filesize($logPath) : 0;

        $context = [
            'marker' => $marker,
            'source' => 'logs:healthcheck',
            'cli'    => is_cli(),
        ];

        log_message('debug', 'Log healthcheck DEBUG {marker}', $context);
        log_message('info', 'Log healthcheck INFO {marker}', $context);
        log_message('error', 'Log healthcheck ERROR {marker}', $context);

        clearstatcache(false, $logPath);
        $afterSz   = is_file($logPath) ? filesize($logPath) : 0;
        $fileLogOk = is_file($logPath) && $afterSz > $beforeSz;

        $dbStatus = $this->checkDatabase($marker);

        CLI::newLine();
        CLI::write('Log healthcheck summary');
        CLI::write('----------------------------------------');
        CLI::write('marker: ' . $marker);
        CLI::write('file_log_path: ' . $logPath);
        CLI::write('file_log_ok=' . ($fileLogOk ? 'true' : 'false'));

        if ($dbStatus['checked']) {
            CLI::write('db_log_ok=' . ($dbStatus['ok'] ? 'true' : 'false'));
            CLI::write('db_rows=' . $dbStatus['rows']);
        } else {
            CLI::error('db_log_ok=false (db not available: ' . $dbStatus['error'] . ')');
        }

        $overall = $fileLogOk && $dbStatus['ok'];
        CLI::write('overall=' . ($overall ? 'PASS' : 'FAIL'));

        return $overall ? EXIT_SUCCESS : EXIT_ERROR;
    }

    private function checkDatabase(string $marker): array
    {
        try {
            $db = Database::connect();
        } catch (\Throwable $e) {
            return ['ok' => false, 'checked' => false, 'rows' => 0, 'error' => $e->getMessage()];
        }

        try {
            $builder = $db->table('bf_error_logs');
            $builder->where('created_at >=', date('Y-m-d H:i:s', time() - 120));
            $builder->like('message', $marker, 'both', false);
            $rows = (int) $builder->countAllResults();

            return ['ok' => $rows > 0, 'checked' => true, 'rows' => $rows, 'error' => null];
        } catch (\Throwable $e) {
            return ['ok' => false, 'checked' => false, 'rows' => 0, 'error' => $e->getMessage()];
        }
    }

    private function resolveLogPath(): string
    {
        $loggerConfig = config('Logger');
        $fileConfig   = $loggerConfig->handlers[FileHandler::class] ?? [];

        $path = $fileConfig['path'] ?? WRITEPATH . 'logs/';
        $path = $path === '' ? WRITEPATH . 'logs/' : rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $extension = $fileConfig['fileExtension'] ?? 'log';
        $extension = $extension === '' ? 'log' : $extension;

        return $path . 'log-' . date('Y-m-d') . '.' . $extension;
    }
}