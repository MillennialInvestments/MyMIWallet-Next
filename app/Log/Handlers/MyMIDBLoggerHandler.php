<?php

namespace App\Log\Handlers;

use CodeIgniter\Log\Handlers\BaseHandler;
use Config\Database;

class MyMIDBLoggerHandler extends BaseHandler
{
    protected $table = 'bf_error_logs';

    public function handle($level, $message): bool
    {
        if (! $this->canHandle($level)) {
            return false;
        }

        try {
            $db = Database::connect();

            $context = service('request') ? [
                'uri'        => service('request')->getUri()->getPath(),
                'ip'         => service('request')->getIPAddress(),
                'userAgent'  => service('request')->getUserAgent()->getAgentString(),
            ] : [];

            $db->table($this->table)->insert([
                'level'      => $level,
                'message'    => is_string($message) ? $message : json_encode($message),
                'context'    => json_encode($context),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return true;

        } catch (\Throwable $e) {

            // Hard fallback — NEVER throw here
            error_log('[MyMIDBLoggerHandler Fallback] ' . $e->getMessage());

            return false;
        }
    }
}