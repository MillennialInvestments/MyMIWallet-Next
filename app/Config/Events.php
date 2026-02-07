<?php

namespace Config;

use App\Libraries\DevHotReload;
use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HTTP\IncomingRequest;
use Config\Services;

/*
|--------------------------------------------------------------------------
| Application Events
|--------------------------------------------------------------------------
| IMPORTANT:
| This file must be CONFIG CACHE SAFE.
| Do not execute runtime logic while CI is building config cache.
|--------------------------------------------------------------------------
*/

// 🚨 HARD STOP during config cache generation
if (defined('CI_BUILDING_CONFIG_CACHE')) {
    return;
}

Events::on('pre_system', static function (): void {

    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        // Runtime output buffering callback delegated to named method.
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

    /*
     * Debug Toolbar + Hot Reload
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on(
            'DBQuery',
            'CodeIgniter\\Debug\\Toolbar\\Collectors\\Database::collect'
        );

        service('toolbar')->respond();

        if (ENVIRONMENT === 'development') {
            DevHotReload::register();
        }
    }
});
