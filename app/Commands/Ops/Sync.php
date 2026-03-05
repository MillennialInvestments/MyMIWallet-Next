<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

final class Sync extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:sync';
    protected $description = 'Runs an ops sync pipeline: git guard/pull + routes docs + launch audit + repo health.';
    protected $usage       = 'ops:sync';

    public function run(array $params)
    {
        CLI::write('Running ops:sync pipeline...', 'yellow');

        $cmds = [
            'php spark git:workspace:guard',
            'php spark git:pull:safe',
            'php spark routes:docs --mode=all',
            'php spark gtm:launch:audit',
            'php spark repo:health',
        ];

        foreach ($cmds as $cmd) {
            CLI::write("\n> " . $cmd, 'cyan');
            $out = $this->runShell($cmd);
            CLI::write($out);
        }

        CLI::write("\nops:sync complete.", 'green');
    }

    private function runShell(string $cmd): string
    {
        if (!function_exists('shell_exec')) {
            return "shell_exec disabled; cannot run: {$cmd}\n";
        }
        return (string) shell_exec($cmd . ' 2>&1');
    }
}