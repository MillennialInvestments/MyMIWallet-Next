<?php

/**
 * Testing/CI Boot
 * Keep it quiet and deterministic. No Services access here.
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

defined('CI_DEBUG') || define('CI_DEBUG', false);
defined('SHOW_DEBUG_BACKTRACE') || define('SHOW_DEBUG_BACKTRACE', false);

$GLOBALS['CI_DEBUG'] = false;
$GLOBALS['CI_KINT']  = false;
