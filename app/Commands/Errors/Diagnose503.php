<?php

namespace App\Commands\Errors;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Diagnose503 extends SafeBaseCommand
{
    protected $group = 'maintenance';
    protected $name = 'spark:diagnose-503';
    protected $description = 'Diagnose common 503 causes (cache, maintenance, upstream).';

    public function run(array $params)
    {
        CLI::write('503 Diagnostics', 'yellow');
        CLI::write(str_repeat('-', 40), 'yellow');

        $checks = [];

        $checks[] = ['Writable directory', is_writable(WRITEPATH)];
        $checks[] = ['Cache directory exists', is_dir(WRITEPATH . 'cache')];
        $checks[] = ['Logs directory exists', is_dir(WRITEPATH . 'logs')];
        $checks[] = ['Index file exists', is_file(FCPATH . 'index.php')];

        $bad = 0;

        foreach ($checks as [$label, $ok]) {

            if (!$ok) $bad++;

            CLI::write(
                $label . ': ' . ($ok ? 'OK' : 'FAIL'),
                $ok ? 'green' : 'red'
            );
        }

        CLI::newLine();

        CLI::write('Suggested Actions:', 'yellow');

        CLI::write(
            '- Clear cache: rm -rf writable/cache/*',
            'white'
        );

        CLI::write(
            '- Restart PHP-FPM if upstream is overloaded',
            'white'
        );

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}