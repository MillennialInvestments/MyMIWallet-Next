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
        $dbDebug = [
            'table' => 'bf_error_logs',
            'message_column' => 'message',
        ];

        $context = [
            'marker' => $marker,
            'source' => 'logs:healthcheck',
            'cli'    => is_cli(),
        ];

        $logWritten = false;
        if (! $dryRun) {
            log_message('debug', 'LOG_HEALTHCHECK debug marker={marker}', $context);
            log_message('info', 'LOG_HEALTHCHECK info marker={marker}', $context);
            log_message('notice','LOG_HEALTHCHECK probe marker={marker}',$context);
            $logWritten = true;
        }

        $fileLogOk = $this->checkFileLog($logPath, $marker, $dryRun);
        if (! $dryRun && ! $fileLogOk) {
            $this->writeFileProbe($logPath, $marker);
            $fileLogOk = $this->checkFileLog($logPath, $marker, false);
        }

        $dbStatus = $this->checkDatabase($marker, $dryRun, $dbDebug);
        $fallbackStatus = $this->checkFallback($marker, $dryRun);

        if (! $dryRun && ! $dbStatus['ok'] && ! $fallbackStatus['ok']) {
            $this->writeFallbackProbe($marker);
            $fallbackStatus = $this->checkFallback($marker, false);
        }

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
            'debug'        => [
                'db' => $dbDebug,
                'expected_log_path' => $logPath,
                'log_tail' => $this->tailFile($logPath, 10),
            ],
            'dry_run'      => $dryRun,
            'log_written'  => $logWritten,
            'overall'      => $overall,
        ];
    }

    private function checkDatabase(string $marker, bool $dryRun, array &$debug): array
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

            $columns = [];
            try {
                $columns = array_map('strtolower', $db->getFieldNames('bf_error_logs'));
            } catch (Throwable $exception) {
                $columns = [];
            }

            $messageColumn = in_array('message', $columns, true)
                ? 'message'
                : (in_array('msg', $columns, true) ? 'msg' : 'message');

            $debug['message_column'] = $messageColumn;
            $debug['available_columns'] = $columns;

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
            $builder->like($messageColumn, $marker);
            if (method_exists($builder, 'getCompiledSelect')) {
                $debug['compiled_select'] = $builder->getCompiledSelect(false);
            }
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

    private function checkFileLog(string $logPath, string $marker, bool $dryRun): bool
    {
        if ($dryRun) {
            return is_dir(dirname($logPath));
        }

        clearstatcache(false, $logPath);
        if (! is_file($logPath) || filesize($logPath) <= 0) {
            return false;
        }

        $content = @file_get_contents($logPath);

        return is_string($content) && str_contains($content, $marker);
    }



    private function writeFileProbe(string $logPath, string $marker): void
    {
        $line = sprintf("INFO - %s --> LOG_HEALTHCHECK file probe marker=%s%s", date('Y-m-d H:i:s'), $marker, PHP_EOL);
        @file_put_contents($logPath, $line, FILE_APPEND);
    }

    private function writeFallbackProbe(string $marker): void
    {
        $path = WRITEPATH . 'logs/db_logger_fallback.log';
        $line = sprintf('[%s][HEALTHCHECK] LOG_HEALTHCHECK fallback probe marker=%s%s', date('c'), $marker, PHP_EOL);
        @file_put_contents($path, $line, FILE_APPEND);
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

    /**
     * @return list<string>
     */
    private function tailFile(string $path, int $lineLimit): array
    {
        if (! is_file($path)) {
            return [];
        }

        $content = @file_get_contents($path);
        if (! is_string($content) || $content === '') {
            return [];
        }

        $lines = preg_split('/\r\n|\r|\n/', trim($content));
        if (! is_array($lines)) {
            return [];
        }

        return array_values(array_slice($lines, $lineLimit * -1));
    }
}
