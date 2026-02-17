<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Rollback extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:rollback';
    protected $description = 'Rollback working tree to clean state (hard reset)';

    public function run(array $params)
    {
        $base = $params[0] ?? 'HEAD';

        $cmd = 'cd ' . escapeshellarg(ROOTPATH) . ' && git reset --hard ' . escapeshellarg($base) . ' && git clean -fd';
        exec($cmd . ' 2>&1', $out, $code);

        foreach ($out as $line) CLI::write($line);

        if ($code !== 0) {
            CLI::error('Rollback failed.');
            exit(1);
        }

        CLI::write('Rollback complete.');
    }
}
