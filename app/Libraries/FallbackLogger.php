<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Provides a simple fallback logger sink for file-based emergency logging.
 */


namespace App\Libraries;

class FallbackLogger
{
    protected string $path;

    public function __construct()
    {
        $this->path = WRITEPATH . 'logs/server_fallback.log';
    }

    public function log(string $level, string $message, array $context = []): void
    {
        $date = date('Y-m-d H:i:s');
        $entry = sprintf(
            "[%s] [%s] %s %s\n",
            $date,
            strtoupper($level),
            $message,
            !empty($context) ? json_encode($context) : ''
        );

        file_put_contents($this->path, $entry, FILE_APPEND | LOCK_EX);
    }

    public function emergency(string $message, array $context = [])
    {
        $this->log('EMERGENCY', $message, $context);
    }
}
