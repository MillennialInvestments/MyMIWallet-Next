<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class AppUpdate extends BaseCommand
{
    protected $group       = 'app';
    protected $name        = 'app:update';
    protected $description = 'Refresh autoload, clear caches, and verify runtime health.';

    public function run(array $params)
    {
        CLI::write('MyMI Wallet – App Update', 'yellow');
        CLI::newLine();

        CLI::write('Running composer dump-autoload…', 'green');
        $this->runShell('composer dump-autoload');

        CLI::newLine();
        CLI::write('Clearing CI4 cache…', 'green');
        $this->runShell('php spark cache:clear');

        CLI::newLine();
        CLI::write('Running runtime:check…', 'green');
        $this->runShell('php spark runtime:check');

        CLI::newLine();
        CLI::write('✅ App update complete.', 'green');
    }

    protected function runShell(string $command): void
    {
        $output = [];
        $code   = 0;

        exec($command . ' 2>&1', $output, $code);

        foreach ($output as $line) {
            CLI::write($line);
        }

        if ($code !== 0) {
            CLI::error("Command failed: {$command}");
        }
    }
}
