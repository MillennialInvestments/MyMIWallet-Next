<?php

namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class LogsTest extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'logs:test';
    protected $description = 'Writes test log entries to verify file/db logging.';

    public function run(array $params)
    {
        log_message('debug', '[logs:test] debug test {time}', ['time' => date('c')]);
        log_message('info',  '[logs:test] info test {time}',  ['time' => date('c')]);
        log_message('error', '[logs:test] error test {time}', ['time' => date('c')]);

        CLI::write('Wrote log entries. Check writable/logs/log-' . date('Y-m-d') . '.php', 'green');
    }
}
