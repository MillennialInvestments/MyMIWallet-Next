<?php

namespace App\Commands\AIOps\Patch;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DryRun extends SafeBaseCommand
{
    protected $group = 'AIOps - Patch';
    protected $name = 'aiops:patch:dry_run';
    protected $description = 'Apply patch in temporary branch';

    public function run(array $params)
    {
        $branch = 'aiops-dryrun-' . date('YmdHis');

        exec("git checkout -b {$branch}", $o1, $c1);
        if ($c1 !== 0) {
            CLI::error('Failed to create branch.');
            return;
        }

        exec('php spark aiops:patch:apply', $o2, $c2);
        if ($c2 !== 0) {
            CLI::error('Patch apply failed.');
            exec('git checkout -');
            exec("git branch -D {$branch}");
            return;
        }

        CLI::write("Dry run branch created: {$branch}");
    }
}
