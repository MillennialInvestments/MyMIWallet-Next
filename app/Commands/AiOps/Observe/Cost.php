<?php

namespace App\Commands\AiOps\Observe;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Cost extends SafeBaseCommand
{
    protected $group = 'AIOps - Observe';
    protected $name = 'aiops:observe:cost';
    protected $description = 'Correlate observability signals with AI cost logs';

    public function run(array $params)
    {
        $statePath = WRITEPATH . 'audit/observability_state.json';
        $costPath  = WRITEPATH . 'audit/cost_log.jsonl';
        $outPath   = WRITEPATH . 'audit/observability_cost_report.md';

        $errors = [];
        if (file_exists($statePath)) {
            $state = json_decode(file_get_contents($statePath), true);
            $errors = $state['errors'] ?? [];
        }

        $costRows = [];
        if (file_exists($costPath)) {
            $lines = file($costPath, FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                $row = json_decode($line, true);
                if (is_array($row)) $costRows[] = $row;
            }
        }

        $today = date('Y-m-d');
        $todayCost = 0.0;
        $todayTokens = 0;

        foreach ($costRows as $r) {
            if (!isset($r['ts'])) continue;
            if (str_starts_with($r['ts'], $today)) {
                $todayCost += (float)($r['cost_estimate_usd'] ?? 0);
                $todayTokens += (int)($r['tokens'] ?? 0);
            }
        }

        $top = array_slice($errors, 0, 10, true);

        $md = "# Observability ↔ Cost Report\n\n";
        $md .= "- Date: {$today}\n";
        $md .= "- AI Tokens Today: {$todayTokens}\n";
        $md .= "- Estimated AI Cost Today (USD): " . number_format($todayCost, 4) . "\n\n";
        $md .= "## Top Error Signatures (Last Scan)\n\n";

        if (empty($top)) {
            $md .= "_No errors recorded._\n";
        } else {
            foreach ($top as $err => $count) {
                $md .= "- {$count}x: " . substr($err, 0, 180) . "\n";
            }
        }

        file_put_contents($outPath, $md);
        CLI::write("Wrote: {$outPath}");
    }
}
