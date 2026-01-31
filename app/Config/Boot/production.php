<?php

/*
 |--------------------------------------------------------------------------
 | ERROR DISPLAY (PRODUCTION)
 |--------------------------------------------------------------------------
 */
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '0');

/*
 |--------------------------------------------------------------------------
 | CI DEBUG FLAG
 |--------------------------------------------------------------------------
 */
defined('CI_DEBUG') || define('CI_DEBUG', false);

/*
 |--------------------------------------------------------------------------
 | CI ENVIRONMENT SAFETY
 |--------------------------------------------------------------------------
 | Boot files execute BEFORE autoloaders and Services exist.
 | DO NOT reference Config\Services here.
 */
if (is_cli()) {
    $GLOBALS['CI_DEBUG'] = false;
    $GLOBALS['CI_KINT'] = false;
}
