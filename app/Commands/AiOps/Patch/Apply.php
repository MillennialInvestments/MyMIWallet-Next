<?php

namespace App\Commands\AiOps\Patch;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\GuardedPatchApplier;

class Apply extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:patch:apply';
    protected $description = 'Safely apply AI-generated patch under guardrails';

    public function run(array $params)
    {
        $diffPath = ROOTPATH . 'aiops_generated_patch.diff';

        $applier = new GuardedPatchApplier();
        $result = $applier->applyDiff($diffPath);

        if (!$result['ok']) {
            CLI::error('Patch failed: ' . $result['error']);
            return;
        }

        CLI::write('Patch successfully applied.');
    }
}
