<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class LoggerTest extends SafeBaseCommand
{
    protected $group = 'Ops';
    protected $name = 'ops:logger:test';
    protected $description = 'Writes test entries to configured logger handlers.';

    public function run(array $params)
    {
        log_message('debug', 'Logger test debug');
        log_message('info', 'Logger test info');
        log_message('error', 'Logger test error');
        log_message('critical', 'Logger test critical');

        CLI::write('ops:logger:test completed.', 'green');

        return EXIT_SUCCESS;
    }
}
