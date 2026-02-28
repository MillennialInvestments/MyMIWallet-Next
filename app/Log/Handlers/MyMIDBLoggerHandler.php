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

        static $handling = false;
        if ($handling) {
            return false;
        }

        $handling = true;

        try {
            $db = Database::connect();
            $request = service('request');

            $uri = null;
            $ip = null;
            $userAgent = null;

            if (is_object($request)) {
                if (method_exists($request, 'getUri')) {
                    $uriObject = $request->getUri();
                    $uri = is_object($uriObject) && method_exists($uriObject, 'getPath')
                        ? $uriObject->getPath()
                        : null;
                }

                if (method_exists($request, 'getIPAddress')) {
                    $ip = $request->getIPAddress();
                }

                if (method_exists($request, 'getUserAgent')) {
                    $agent = $request->getUserAgent();
                    $userAgent = is_object($agent) && method_exists($agent, 'getAgentString')
                        ? $agent->getAgentString()
                        : (string) $agent;
                }
            }

            $context = [
                'uri' => $uri,
                'ip' => $ip,
                'userAgent' => $userAgent,
            ];

            $db->table($this->table)->insert([
                'level'      => (string) $level,
                'message'    => is_string($message) ? $message : json_encode($message),
                'context'    => json_encode($context),
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return true;
        } catch (\Throwable $e) {
            // Hard fallback — NEVER throw here
            error_log('[MyMIDBLoggerHandler Fallback] ' . $e->getMessage());

            return false;
        } finally {
            $handling = false;
        }
    }
}
