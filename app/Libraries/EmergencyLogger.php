<?php

namespace App\Libraries;

class EmergencyLogger
{
    public static function write(string $message, array $context = []): void
    {
        $dir = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'writable' . DIRECTORY_SEPARATOR . 'logs';

        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $payload = [
            'timestamp' => date('c'),
            'message'   => $message,
            'context'   => $context,
        ];

        @file_put_contents(
            $dir . DIRECTORY_SEPARATOR . 'emergency.log',
            json_encode($payload, JSON_UNESCAPED_SLASHES) . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }
}
