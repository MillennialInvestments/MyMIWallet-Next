<?php

namespace App\Services\Spark;

use CodeIgniter\Log\Handlers\FileHandler;
use Config\Database;
use Throwable;

class LogHealthcheckService
{
    public function run(bool $dryRun = false): array
    {
        $marker = bin2hex(random_bytes(6));
        $logPath = $this->resolveLogPath();
        $beforeSz = is_file($logPath) ? filesize($logPath) : 0;

        $context = [
            'marker' => $marker,
            'source' => 'logs:healthcheck',
            'cli'    => is_cli(),
        ];

        $logWritten = false;
        if (! $dryRun) {
            log_message('debug', 'Log healthcheck DEBUG {marker}', $context);
            log_message('info', 'Log healthcheck INFO {marker}', $context);
            log_message('error', 'Log healthcheck ERROR {marker}', $context);
            $logWritten = true;
        }

        clearstatcache(false, $logPath);
        $afterSz = is_file($logPath) ? filesize($logPath) : 0;
        $fileLogOk = $dryRun
            ? is_dir(dirname($logPath))
            : (is_file($logPath) && $afterSz > $beforeSz);

        $dbStatus = $this->checkDatabase($marker, $dryRun);
        $fallbackStatus = $this->checkFallback($marker, $dryRun);

        $dbOrFallbackOk = $dbStatus['ok'] || $fallbackStatus['ok'];

        $overall = $dryRun
            ? ($fileLogOk && $dbStatus['checked'])
            : ($fileLogOk && $dbOrFallbackOk);

        return [
            'marker'       => $marker,
            'log_path'     => $logPath,
            'file_log_ok'  => $fileLogOk,
            'db_checked'   => $dbStatus['checked'],
            'db_log_ok'    => $dbStatus['ok'],
            'db_rows'      => $dbStatus['rows'],
            'db_error'     => $dbStatus['error'],
            'fallback_checked' => $fallbackStatus['checked'],
            'fallback_log_ok' => $fallbackStatus['ok'],
            'fallback_path' => $fallbackStatus['path'],
            'dry_run'      => $dryRun,
            'log_written'  => $logWritten,
            'overall'      => $overall,
        ];
    }

    private function checkDatabase(string $marker, bool $dryRun): array
    {
        try {
            $db = Database::connect();
        } catch (Throwable $exception) {
            return [
                'ok'      => false,
                'checked' => false,
                'rows'    => 0,
                'error'   => $exception->getMessage(),
            ];
        }

        try {
            if (method_exists($db, 'tableExists') && ! $db->tableExists('bf_error_logs')) {
                return [
                    'ok'      => false,
                    'checked' => true,
                    'rows'    => 0,
                    'error'   => 'bf_error_logs table missing',
                ];
            }

            if ($dryRun) {
                return [
                    'ok'      => true,
                    'checked' => true,
                    'rows'    => 0,
                    'error'   => null,
                ];
            }

            $builder = $db->table('bf_error_logs');
            $builder->where('created_at >=', date('Y-m-d H:i:s', time() - 120));
            $builder->like('message', $marker, 'both', false);
            $rows = (int) $builder->countAllResults();

            return [
                'ok'      => $rows > 0,
                'checked' => true,
                'rows'    => $rows,
                'error'   => null,
            ];
        } catch (Throwable $exception) {
            return [
                'ok'      => false,
                'checked' => false,
                'rows'    => 0,
                'error'   => $exception->getMessage(),
            ];
        }
    }


    private function checkFallback(string $marker, bool $dryRun): array
    {
        $path = WRITEPATH . 'logs/db_logger_fallback.log';

        if ($dryRun) {
            return [
                'ok' => is_dir(dirname($path)),
                'checked' => true,
                'path' => $path,
            ];
        }

        if (! is_file($path)) {
            return [
                'ok' => false,
                'checked' => true,
                'path' => $path,
            ];
        }

        $content = @file_get_contents($path);

        return [
            'ok' => is_string($content) && str_contains($content, $marker),
            'checked' => true,
            'path' => $path,
        ];
    }
    private function resolveLogPath(): string
    {
        $loggerConfig = config('Logger');
        $fileConfig = $loggerConfig->handlers[FileHandler::class] ?? [];

        $path = $fileConfig['path'] ?? WRITEPATH . 'logs/';
        $path = $path === '' ? WRITEPATH . 'logs/' : rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $extension = $fileConfig['fileExtension'] ?? 'php';
        $extension = $extension === '' ? 'php' : $extension;

        return $path . 'log-' . date('Y-m-d') . '.' . $extension;
    }
}
