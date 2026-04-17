<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Sets PHP development error reporting and CI debug bootstrap flags.
 */


/**
 * Development Boot
 * IMPORTANT: Boot files run very early. Do not reference Config\Services here.
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('html_errors', '1');

defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', true);

$cliRuntime = PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg';
defined('CI_DEBUG') || define('CI_DEBUG', ! $cliRuntime);
defined('CI_KINT') || define('CI_KINT', false);

/**
 * Spark/CLI safety: never initialize Kint/toolbar while in CLI.
 * (Kint can still work in browser requests.)
 */
if ($cliRuntime) {
    $GLOBALS['CI_DEBUG'] = false;
    $GLOBALS['CI_KINT']  = false;
}
