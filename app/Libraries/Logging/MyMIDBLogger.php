<?php

namespace App\Libraries\Logging;

use Config\Database;

class MyMIDBLogger
{
    public static function log($level, $message, $context = [])
    {
        try {
            $db = Database::connect();

            $db->table('bf_error_logs')->insert([
                'level'      => $level,
                'message'    => $message,
                'context'    => json_encode($context),
                'uri'        => service('request')->getUri()->getPath(),
                'created_at' => date('Y-m-d H:i:s')
            ]);
        } catch (\Throwable $e) {
            self::phpFallback($e->getMessage());
        }
    }

    private static function phpFallback($message)
    {
        error_log('[MyMI-Fallback] ' . $message);
    }
}