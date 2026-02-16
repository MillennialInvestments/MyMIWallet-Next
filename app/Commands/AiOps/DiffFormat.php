<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DiffFormat extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:diff:format';
    protected $description = 'Generate a real unified diff from current working tree';

    public function run(array $params)
    {
        $outPath = ROOTPATH . 'aiops_generated_patch.diff';

        // Ensures repo root
        $cmd = 'cd ' . escapeshellarg(ROOTPATH) . ' && git diff --unified=3';

        exec($cmd . ' 2>&1', $output, $code);
        $diff = implode("\n", $output);

        if (trim($diff) === '') {
            CLI::write('No changes detected. Patch not created.');
            return;
        }

        file_put_contents($outPath, $diff);
        CLI::write("Unified diff written: {$outPath}");
    }
}
