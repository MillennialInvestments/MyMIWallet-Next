<?php

namespace App\Commands\Errors;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Diagnose502 extends SafeBaseCommand
{
    protected $group = 'maintenance';
    protected $name = 'spark:diagnose-502';
    protected $description = 'Diagnose common 502 causes (php-fpm, nginx, socket).';

    public function run(array $params)
    {
        CLI::write('502 Diagnostics', 'yellow');
        CLI::write(str_repeat('-', 40), 'yellow');

        $checks = [];

        $checks[] = ['Writable directory', is_writable(WRITEPATH)];
        $checks[] = ['CI4 index.php exists', is_file(FCPATH . 'index.php')];

        $home = rtrim(env('HOME') ?: $_SERVER['HOME'] ?? '', '/');
        $ngErr = $home . '/nginx/logs/error.log';

        $socketIssue = false;

        if (is_file($ngErr)) {

            $tail = @shell_exec('tail -n 200 ' . escapeshellarg($ngErr) . ' 2>/dev/null');

            if ($tail && stripos($tail, 'Connection refused') !== false) {
                $socketIssue = true;
            }
        }

        $checks[] = ['Upstream socket responding', !$socketIssue];

        $bad = 0;

        foreach ($checks as [$label, $ok]) {

            if (!$ok) $bad++;

            CLI::write(
                $label . ': ' . ($ok ? 'OK' : 'FAIL'),
                $ok ? 'green' : 'red'
            );
        }

        CLI::newLine();

        CLI::write('Suggested actions:', 'yellow');

        if ($socketIssue) {

            CLI::write(
                '- Restart PHP-FPM in DreamHost panel',
                'white'
            );

            CLI::write(
                '- Verify nginx upstream configuration',
                'white'
            );
        }

        CLI::write(
            '- Clear cache: rm -rf writable/cache/*',
            'white'
        );

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}