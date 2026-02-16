<?php

namespace App\Commands\App;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Test extends BaseCommand
{
    protected $group       = 'App';
    protected $name        = 'app:test';
    protected $description = 'Run PHPUnit test suite';

    public function run(array $params)
    {
        CLI::write('Running PHPUnit...');

        exec(ROOTPATH . 'vendor/bin/phpunit 2>&1', $output, $resultCode);

        foreach ($output as $line) {
            CLI::write($line);
        }

        CLI::write("\nExit Code: " . $resultCode);

        if ($resultCode !== 0) {
            CLI::error('Tests failed.');
        } else {
            CLI::write('All tests passed.');
        }
    }
}
