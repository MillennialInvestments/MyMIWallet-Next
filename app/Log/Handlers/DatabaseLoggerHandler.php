<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Implements a custom database-backed CI4 log handler with fallback sinks.
 */


namespace App\Log\Handlers;

use CodeIgniter\Log\Handlers\BaseHandler;
use CodeIgniter\Log\Handlers\HandlerInterface;
use Config\Database;
use Config\Services;
use Stringable;
use Throwable;

class DatabaseLoggerHandler extends BaseHandler implements HandlerInterface
{
    private const LOCK_KEY = 'MYMI_DB_LOGGER_LOCK';

    private static bool $active = false;

    /**
     * Optional notification email for warning/error alerts.
     */
    private ?string $notificationEmail;

    /**
     * Tracks whether we already attempted an email in this request to avoid loops.
     */
    private bool $emailSent = false;

    /**
     * Whether warning-level events should trigger email notifications.
     */
    private bool $emailWarningLevel = false;

    /**
     * Local fallback file when DB inserts fail.
     */
    private string $fallbackFile;

    /**
     * Cached bf_error_logs columns to avoid repeating schema lookups.
     *
     * @var list<string>
     */
    private array $dbColumns = [];

    public function __construct(array $config = [])
    {
        parent::__construct($config);

        $fallbackPath        = $config['fallbackPath'] ?? (WRITEPATH . 'logs/');
        $this->fallbackFile  = rtrim($fallbackPath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'db_logger_fallback.log';
        $this->notificationEmail = $config['notificationEmail'] ?? null;
        $this->emailWarningLevel = (bool) ($config['emailWarningLevel'] ?? false);

        $this->ensureFallbackPath();
    }

    public function handle($level, $message, array $context = []): bool
    {
        @file_put_contents(WRITEPATH.'logs/lock_debug.log',
            date('c') . ' active=' . (self::$active ? '1' : '0') . PHP_EOL,
            FILE_APPEND
        );

        if (! $this->canHandle($level)) {
            return false;
        }


        if (! $this->acquireLock()) {
            return false; // allow FileHandler to proceed
        }

        try {
            $record = $this->buildRecord($level, $message, $context);
            $this->writeToDatabase($record);
            $this->maybeSendEmail($record);

            return true;
        } catch (Throwable $e) {
            $this->writeFallback($level, $message, $context, $e);

            return true;
        } finally {
            $this->releaseLock();
        }
    }

    private function buildRecord($level, $message, array $context): array
    {
        $stringMessage = $this->stringifyMessage($message);
        $interpolated  = $this->interpolate($stringMessage, $context);
        $origin        = $this->findOrigin();
        $request       = $this->safeRequestData();

        return [
            'level'      => strtolower((string) $level),
            'message'    => $interpolated,
            'context'    => $this->encodeContext($context),
            'file'       => $origin['file'] ?? null,
            'line'       => $origin['line'] ?? null,
            'ip_address' => $request['ip'] ?? null,
            'user_agent' => $request['user_agent'] ?? null,
            'uri'        => $request['uri'] ?? null,
            'method'     => $request['method'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'full_url'   => $request['uri'] ?? null,
            'path' => parse_url($request['uri'] ?? '', PHP_URL_PATH),
            'type'       => 'app',
            'request_id' => $_SERVER['HTTP_X_REQUEST_ID'] ?? bin2hex(random_bytes(8)),
        ];
    }

    private function writeToDatabase(array $record): void
    {
        $db = Database::connect();
        if (!$db->connID) {
            throw new \RuntimeException('Database connection unavailable');
        }

        if (! $db->connID) {
            throw new \RuntimeException('Database connection unavailable');
        }

        $this->primeColumns($db);

        $payload = array_intersect_key($record, array_flip($this->dbColumns));

        if ($payload === []) {
            throw new \RuntimeException('bf_error_logs table is unavailable or has no expected columns.');
        }

        $db->table('bf_error_logs')->insert($payload);
    }

    private function primeColumns($db): void
    {
        if ($this->dbColumns !== []) {
            return;
        }

        try {
            $columns        = $db->getFieldNames('bf_error_logs');
            $this->dbColumns = array_map('strtolower', $columns);
        } catch (Throwable $e) {
            $this->dbColumns = [
                'level',
                'message',
                'context',
                'file',
                'line',
                'ip_address',
                'user_agent',
                'uri',
                'method',
                'created_at',
            ];
        }
    }

    private function maybeSendEmail(array $record): void
    {
        if ($this->emailSent || empty($this->notificationEmail)) {
            return;
        }

        $notifiableLevels = ['emergency', 'alert', 'critical', 'error'];

        if ($this->emailWarningLevel) {
            $notifiableLevels[] = 'warning';
        }

        if (! in_array($record['level'], $notifiableLevels, true)) {
            return;
        }

        try {
            $email = Services::email();
            $email->setTo($this->notificationEmail);
            $email->setSubject('[MyMI Wallet] ' . strtoupper($record['level']) . ' log alert');
            $email->setMessage($this->buildEmailBody($record));
            $email->send();
            $this->emailSent = true;
        } catch (Throwable $e) {
            // Never re-enter the logger; write straight to fallback sinks.
            $this->writeFallback('email', 'Email dispatch failed', ['error' => $e->getMessage()]);
        }
    }

    private function buildEmailBody(array $record): string
    {
        $pieces = [
            'Level: ' . strtoupper($record['level']),
            'Message: ' . $record['message'],
            'File: ' . ($record['file'] ?? 'n/a') . ':' . ($record['line'] ?? 'n/a'),
            'URI: ' . ($record['uri'] ?? 'n/a'),
            'Method: ' . ($record['method'] ?? 'n/a'),
            'IP: ' . ($record['ip_address'] ?? 'n/a'),
            'User-Agent: ' . ($record['user_agent'] ?? 'n/a'),
            'Created: ' . $record['created_at'],
        ];

        if (! empty($record['context'])) {
            $pieces[] = 'Context: ' . $record['context'];
        }

        return implode("\n", $pieces);
    }

    private function findOrigin(): array
    {
        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 15);

        foreach ($trace as $frame) {
            if (! isset($frame['file'])) {
                continue;
            }

            if (str_contains($frame['file'], 'DatabaseLoggerHandler.php')) {
                continue;
            }

            if (isset($frame['function']) && $frame['function'] === 'log_message') {
                continue;
            }

            return [
                'file' => $frame['file'],
                'line' => $frame['line'] ?? null,
            ];
        }

        return [];
    }

    private function safeRequestData(): array
    {
        try {
            $request = service('request');
        } catch (Throwable $e) {
            $request = null;
        }

        $uri    = null;
        $method = null;

        if ($request && method_exists($request, 'getUri')) {
            try {
                $uri = (string) $request->getUri();
            } catch (Throwable $e) {
                $uri = $_SERVER['REQUEST_URI'] ?? null;
            }
        }

        if ($request && method_exists($request, 'getMethod')) {
            try {
                $method = $request->getMethod();
            } catch (Throwable $e) {
                $method = $_SERVER['REQUEST_METHOD'] ?? null;
            }
        }

        return [
            'uri'        => $uri ?? ($_SERVER['REQUEST_URI'] ?? null),
            'method'     => $method ?? ($_SERVER['REQUEST_METHOD'] ?? null),
            'ip'         => $_SERVER['REMOTE_ADDR'] ?? null,
            'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null,
        ];
    }

    private function interpolate(string $message, array $context): string
    {
        if ($context === []) {
            return $message;
        }

        $replace = [];

        foreach ($context as $key => $value) {
            $replace['{' . $key . '}'] = $this->stringifyValue($value);
        }

        return strtr($message, $replace);
    }

    private function encodeContext(array $context): ?string
    {
        if ($context === []) {
            return null;
        }

        try {
            return json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        } catch (Throwable $e) {
            return null;
        }
    }

    private function stringifyMessage($message): string
    {
        if ($message instanceof Stringable) {
            return (string) $message;
        }

        if (is_scalar($message) || $message === null) {
            return (string) $message;
        }

        return print_r($message, true);
    }

    private function stringifyValue($value): string
    {
        if ($value instanceof Stringable) {
            return (string) $value;
        }

        if (is_scalar($value) || $value === null) {
            return (string) $value;
        }

        if (is_array($value)) {
            return '[array]';
        }

        return '[' . gettype($value) . ']';
    }

    private function writeFallback($level, $message, array $context = [], ?Throwable $error = null): void
    {
        $logLine = sprintf(
            '[%s][%s] %s',
            date('c'),
            strtoupper((string) $level),
            $this->interpolate($this->stringifyMessage($message), $context)
        );

        if ($context !== []) {
            $logLine .= ' context=' . ($this->encodeContext($context) ?? '<unserializable>');
        }

        if ($error) {
            $logLine .= ' error=' . $error->getMessage();
        }

        error_log($logLine);
        $this->ensureFallbackPath();
        @file_put_contents($this->fallbackFile, $logLine . PHP_EOL, FILE_APPEND);
    }

    private function ensureFallbackPath(): void
    {
        $dir = dirname($this->fallbackFile);

        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
    }

    private function acquireLock(): bool
    {
        if (self::$active === true) {
            return false;
        }

        if (! empty($_SERVER[self::LOCK_KEY])) {
            return false;
        }

        self::$active               = true;
        $_SERVER[self::LOCK_KEY] = '1';

        return true;
    }

    private function releaseLock(): void
    {
        self::$active = false;
        unset($_SERVER[self::LOCK_KEY]);
    }
}