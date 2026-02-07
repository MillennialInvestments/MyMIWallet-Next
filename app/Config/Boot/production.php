<?php

/**
 * Production Boot
 * IMPORTANT: Boot files run very early. Do not reference Config\Services here.
 */

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '0');

defined('CI_DEBUG') || define('CI_DEBUG', false);
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', false);
defined('CI_KINT') || define('CI_KINT', false);

$_ENV['CI_KINT']    = false;
$_SERVER['CI_KINT'] = false;

if (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') {
    $GLOBALS['CI_DEBUG'] = false;
    $GLOBALS['CI_KINT']  = false;
}
