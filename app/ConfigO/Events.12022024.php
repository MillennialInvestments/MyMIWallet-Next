<?php

namespace Config;

use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use Throwable;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 */

Events::on('pre_system', static function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();

        if (ENVIRONMENT === 'development') {
            Services::routes()->get('__hot-reload', static function () {
                (new HotReloader())->run();
            });
        }
    }
});

/*
 * --------------------------------------------------------------------
 * Custom Error Logging for URL and IP
 * --------------------------------------------------------------------
 */
Events::on('post_controller_constructor', static function () {
    $request = \Config\Services::request();
    $url = (string) $request->getUri();
    $ipAddress = $request->getIPAddress();

    set_error_handler(static function ($severity, $message, $file, $line) use ($url, $ipAddress) {
        log_message('error', "Error: {$message} in {$file} on line {$line} | URL: {$url} | IP: {$ipAddress}");
    });

    set_exception_handler(static function (Throwable $exception) use ($url, $ipAddress) {
        log_message('critical', "Exception: {$exception->getMessage()} in {$exception->getFile()} on line {$exception->getLine()} | URL: {$url} | IP: {$ipAddress}");
    
        // Restore CodeIgniter's default exception handling
        $config = config('App');
        $renderer = Services::exceptions($config, true);
        $renderer->showException($exception); // Display the error page with stack trace and error line
    });
    
});
