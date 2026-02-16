<?php

namespace App\Commands\App;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class CoverageGate extends SafeBaseCommand
{
    protected $group = 'App';
    protected $name = 'app:gate:coverage';
    protected $description = 'Gate on PHPUnit coverage if available (coverage-text).';

    public function run(array $params)
    {
        $minPct = (float)($params[0] ?? 60.0);
        $mode   = (string)($params[1] ?? 'warn'); // warn|fail

        CLI::write("Coverage minimum: {$minPct}%");
        CLI::write("Mode: {$mode}");

        // Try to run phpunit with coverage-text; may fail if no driver
        $cmd = 'cd ' . escapeshellarg(ROOTPATH) . ' && vendor/bin/phpunit --coverage-text 2>&1';
        exec($cmd, $out, $code);

        $text = implode("\n", $out);

        if ($code !== 0 && str_contains(strtolower($text), 'no code coverage driver')) {
            if ($mode === 'fail') {
                CLI::error('No coverage driver available (xdebug/pcov). Failing due to mode=fail.');
                exit(1);
            }
            CLI::write('No coverage driver available; passing due to mode=warn.');
            return;
        }

        // Extract the first "Lines:" percentage
        if (preg_match('/Lines:\s+(\d+(?:\.\d+)?)%/i', $text, $m)) {
            $pct = (float)$m[1];
            CLI::write("Detected coverage Lines: {$pct}%");

            if ($pct < $minPct) {
                CLI::error("Coverage gate failed: {$pct}% < {$minPct}%");
                exit(1);
            }

            CLI::write('Coverage gate passed.');
            return;
        }

        // If we can't parse coverage but phpunit ran, treat as warn/fail
        if ($mode === 'fail') {
            CLI::error('Coverage not parseable. Failing due to mode=fail.');
            exit(1);
        }

        CLI::write('Coverage not parseable. Passing due to mode=warn.');
    }
}
