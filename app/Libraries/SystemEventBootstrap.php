<?php

namespace App\Libraries;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HTTP\IncomingRequest;
use Config\Services;

class SystemEventBootstrap
{
    public static function preSystem(): void
    {
        if (ENVIRONMENT !== 'testing') {
            if (ini_get('zlib.output_compression')) {
                throw FrameworkException::forEnabledZlibOutputCompression();
            }

            while (ob_get_level() > 0) {
                ob_end_flush();
            }

            ob_start([DevHotReload::class, 'passThroughBuffer']);
        }

        helper('uri_guard');

        $request = Services::request();

        if ($request instanceof IncomingRequest) {
            try {
                guard_uri_placeholders($request, 'pre_system');
            } catch (\Throwable $e) {
                log_message('error', 'pre_system URI guard failed: {msg}', [
                    'msg' => $e->getMessage(),
                ]);
            }
        } else {
            log_message('debug', 'pre_system URI guard skipped (non-HTTP request).');
        }

        if (CI_DEBUG && ! is_cli()) {
            Events::on(
                'DBQuery',
                'CodeIgniter\\Debug\\Toolbar\\Collectors\\Database::collect'
            );

            service('toolbar')->respond();
        }
    }
}
