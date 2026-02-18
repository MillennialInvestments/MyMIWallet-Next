<?php

namespace App\Commands\AIOps\Patch;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\PatchHallucinationDetector;

class Hallucination extends SafeBaseCommand
{
    protected $group = 'AIOps - Patch';
    protected $name = 'aiops:patch:hallucination';
    protected $description = 'Detect hallucinated symbols in aiops_generated_patch.diff before apply';

    public function run(array $params)
    {
        $diffPath = ROOTPATH . 'aiops_generated_patch.diff';
        $detector = new PatchHallucinationDetector();

        $result = $detector->analyzeDiff($diffPath);

        $outJson = WRITEPATH . 'audit/patch_hallucination_report.json';
        $outMd   = WRITEPATH . 'audit/patch_hallucination_report.md';

        @is_dir(dirname($outJson)) || @mkdir(dirname($outJson), 0775, true);

        file_put_contents($outJson, json_encode($result, JSON_PRETTY_PRINT));

        $md = "# Patch Hallucination Report\n\n";
        if (!$result['ok']) {
            $md .= "**ERROR:** " . ($result['error'] ?? 'unknown') . "\n";
            file_put_contents($outMd, $md);
            CLI::error('Hallucination scan failed: ' . ($result['error'] ?? 'unknown'));
            exit(1);
        }

        $sum = $result['summary'] ?? [];
        $md .= "- HIGH: " . ($sum['HIGH'] ?? 0) . "\n";
        $md .= "- MEDIUM: " . ($sum['MEDIUM'] ?? 0) . "\n";
        $md .= "- LOW: " . ($sum['LOW'] ?? 0) . "\n\n";

        if (empty($result['issues'])) {
            $md .= "✅ No hallucination indicators detected.\n";
            file_put_contents($outMd, $md);
            CLI::write('Hallucination gate passed.');
            return;
        }

        $md .= "## Issues\n\n";
        foreach ($result['issues'] as $i) {
            $md .= "- **{$i['severity']}** `{$i['type']}`: {$i['message']}\n";
        }

        file_put_contents($outMd, $md);

        // Fail hard if any HIGH exists
        $high = (int)($sum['HIGH'] ?? 0);
        if ($high > 0) {
            CLI::error('Hallucination gate failed: HIGH issues present.');
            exit(1);
        }

        CLI::write('Hallucination gate passed (no HIGH issues).');
    }
}
