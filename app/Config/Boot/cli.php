<?php

use Config\Console;

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
