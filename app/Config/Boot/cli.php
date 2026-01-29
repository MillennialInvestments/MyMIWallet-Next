<?php

use Config\Console;
use Config\Services;

/*
|--------------------------------------------------------------------------
| CLI Boot Override
|--------------------------------------------------------------------------
| Force Spark to load Config\Console::$commands explicitly.
|
| CI4 does NOT do this automatically.
*/
$console = new Console();

foreach ($console->commands as $command) {
    if (class_exists($command)) {
        \CodeIgniter\CLI\CommandRunner::addCommand($command);
    }
}

if (! function_exists('is_ci')) {
    require APPPATH . 'Helpers/ci_guard_helper.php';
}

if (is_ci()) {
    $autoloader = Services::autoloader();
    if (method_exists($autoloader, 'disableCache')) {
        $autoloader->disableCache();
    }

    $locator = Services::locator();
    if (method_exists($locator, 'disableCache')) {
        $locator->disableCache();
    }
}
