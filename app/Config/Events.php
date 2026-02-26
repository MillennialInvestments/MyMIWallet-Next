<?php

namespace Config;

use App\Libraries\DevHotReload;
use App\Libraries\SystemEventBootstrap;
use CodeIgniter\Events\Events;

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
    $reqId = $_SERVER['HTTP_X_REQUEST_ID'] ?? bin2hex(random_bytes(6));
    $_SERVER['HTTP_X_REQUEST_ID'] = $reqId;
    $GLOBALS['__req_start'] = microtime(true);

    log_message('debug', '[REQ_ID=' . $reqId . '] [REQUEST][START] ' . ($_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN') . ' ' . ($_SERVER['REQUEST_URI'] ?? 'UNKNOWN'));
    if (is_cli()) {
        log_message('info', '[SPARK_START] CLI bootstrap');
        log_message('info', '[SPARK_MEMORY] ' . memory_get_usage(true));
    }
    SystemEventBootstrap::preSystem();
});

Events::on('post_system', static function (): void {
    $reqId = $_SERVER['HTTP_X_REQUEST_ID'] ?? 'N/A';
    $start = $GLOBALS['__req_start'] ?? microtime(true);
    $duration = microtime(true) - $start;

    log_message('debug', '[REQ_ID=' . $reqId . '] [REQUEST][END]');
    log_message('info', '[REQ_ID=' . $reqId . '] [PERF] Execution time=' . number_format($duration, 6));
    if (is_cli()) {
        log_message('info', '[SPARK_COMPLETE] CLI bootstrap');
        log_message('info', '[SPARK_MEMORY] ' . memory_get_usage(true));
    }
});

if (ENVIRONMENT === 'development') {
    Events::on('pre_system', static function (): void {
        DevHotReload::register();
    });
}
