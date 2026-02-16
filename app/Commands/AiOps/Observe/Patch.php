<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ObservePatch extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:observe:patch';
    protected $description = 'Create patch file from suggestions';

    public function run(array $params)
    {
        $suggestionsPath = WRITEPATH . 'audit/observability_suggestions.md';

        if (!file_exists($suggestionsPath)) {
            CLI::error('Run observe:suggest first.');
            return;
        }

        $patchFile = ROOTPATH . 'aiops_generated_patch.diff';

        $content = file_get_contents($suggestionsPath);

        file_put_contents($patchFile, $content);

        CLI::write("Patch file created: {$patchFile}");
    }
}
