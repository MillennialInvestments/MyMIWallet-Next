<?php

namespace Config;

use CodeIgniter\Database\Query as CIQuery;
use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use Config\Services;
use Throwable;

/**
 * Application event hooks
 */

Events::on('pre_system', static function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($b) => $b);
    }

    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\\Debug\\Toolbar\\Collectors\\Database::collect');
        Services::toolbar()->respond();

        if (ENVIRONMENT === 'development') {
            Services::routes()->get('__hot-reload', static function () {
                (new HotReloader())->run();
            });
        }
    }
});

// Sentry (safe-guarded)
Events::on('pre_system', static function () {
    $dsn = getenv('SENTRY_DSN');
    if ($dsn && class_exists('\\Sentry\init')) {
        \Sentry\init([
            'dsn'         => $dsn,
            'environment' => getenv('SENTRY_ENV') ?: 'production',
            'release'     => getenv('SENTRY_RELEASE') ?: 'unknown',
            'error_types' => E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED,
        ]);
    }
});

/** Accepts either string SQL or CIQuery object */
Events::on('DBQuery', static function ($payload) {
    $sql       = '';
    $durationS = 0.0;
    $connLabel = 'default';

    if ($payload instanceof CIQuery) {
        $sql = method_exists($payload, 'getOriginalQuery') && $payload->getOriginalQuery()
            ? $payload->getOriginalQuery()
            : (method_exists($payload, 'getQuery') ? $payload->getQuery() : '');
        $durationS = method_exists($payload, 'getDuration') && $payload->getDuration() !== null
            ? (float) $payload->getDuration() : 0.0;
    } else {
        $sql = (string) $payload;
    }

    $ms = (int) round($durationS * 1000);
    if (class_exists(\App\Libraries\Observability\Metrics::class)) {
        \App\Libraries\Observability\Metrics::observe('db_query_ms', $ms, ['conn' => $connLabel]);
    }
});

/** Minimal custom error logging, do not replace CI exception handler entirely */
Events::on('post_controller_constructor', static function () {
    $request   = Services::request();
    $url       = (string) $request->getUri();
    $ipAddress = $request->getIPAddress();

    set_error_handler(static function ($severity, $message, $file, $line) use ($url, $ipAddress) {
        log_message('error', "Error: {$message} in {$file} on line {$line} | URL: {$url} | IP: {$ipAddress}");
    });

    set_exception_handler(static function (Throwable $e) use ($url, $ipAddress) {
        log_message('critical', "Exception: {$e->getMessage()} in {$e->getFile()} on line {$e->getLine()} | URL: {$url} | IP: {$ipAddress}");
        if (getenv('SENTRY_DSN') && function_exists('\\Sentry\\captureException')) {
            \Sentry\captureException($e);
        }
        // Let CI's default handlers continue
    });
});

