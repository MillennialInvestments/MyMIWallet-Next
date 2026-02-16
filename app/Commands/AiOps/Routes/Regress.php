<?php

namespace App\Commands\AiOps\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Regress extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:routes:regress';
    protected $description = 'Detect route scan regressions vs previous snapshot';

    public function run(array $params)
    {
        $histDir = WRITEPATH . 'audit/routes_history';
        $current = WRITEPATH . 'audit/routes_scan.json';
        $report  = WRITEPATH . 'audit/routes_regression_report.md';

        if (!is_file($current)) {
            CLI::error('Missing current scan. Run aiops:routes:scan first.');
            exit(1);
        }

        if (!is_dir($histDir)) {
            CLI::write('No history available. Skipping regression.');
            file_put_contents($report, "# Routes Regression Report\n\nNo history.\n");
            return;
        }

        $files = glob($histDir . '/routes_scan_*.json');
        sort($files);

        // last snapshot before current (best effort)
        $prev = $files[count($files) - 2] ?? null;

        if (!$prev || !is_file($prev)) {
            CLI::write('No previous snapshot. Skipping regression.');
            file_put_contents($report, "# Routes Regression Report\n\nNo previous snapshot.\n");
            return;
        }

        $cur = json_decode(file_get_contents($current), true);
        $prv = json_decode(file_get_contents($prev), true);

        $curMap = [];
        foreach (($cur['results'] ?? []) as $r) $curMap[$r['route']] = $r;

        $prvMap = [];
        foreach (($prv['results'] ?? []) as $r) $prvMap[$r['route']] = $r;

        $regress = [];
        foreach ($curMap as $route => $r) {
            if (!isset($prvMap[$route])) continue;

            $curMs = (float)($r['response_time_ms'] ?? 0);
            $prvMs = (float)($prvMap[$route]['response_time_ms'] ?? 0);

            // flag if increased by 500ms+
            if ($curMs > 0 && $prvMs > 0 && ($curMs - $prvMs) >= 500) {
                $regress[] = "{$route}: {$prvMs}ms → {$curMs}ms (+".round($curMs-$prvMs,2)."ms)";
            }

            $curLen = (int)($r['content_length'] ?? 0);
            $prvLen = (int)($prvMap[$route]['content_length'] ?? 0);

            // content length drop 50%+
            if ($prvLen > 0 && $curLen < ($prvLen * 0.5)) {
                $regress[] = "{$route}: content length {$prvLen} → {$curLen} (drop > 50%)";
            }
        }

        $md = "# Routes Regression Report\n\n";
        $md .= "- Current: routes_scan.json\n";
        $md .= "- Previous: " . basename($prev) . "\n\n";

        if (empty($regress)) {
            $md .= "✅ No regressions detected.\n";
            file_put_contents($report, $md);
            CLI::write("No regressions. Report: {$report}");
            return;
        }

        $md .= "## Regressions\n\n";
        foreach ($regress as $x) $md .= "- {$x}\n";

        file_put_contents($report, $md);

        CLI::error("Regressions detected. Report: {$report}");
        exit(1);
    }
}
