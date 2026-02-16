<?php

namespace App\Commands\AiOps\Routes;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Gate extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:routes:gate';
    protected $description = 'Gate based on routes_scan.json thresholds';

    public function run(array $params)
    {
        $file = $params[0] ?? WRITEPATH . 'audit/routes_scan.json';
        $maxMs = (int)($params[1] ?? 1500);
        $avgMax = (int)($params[2] ?? 1200);
        $minLen = (int)($params[3] ?? 50);

        if (!is_file($file)) {
            CLI::error("Missing scan file: {$file}");
            exit(1);
        }

        $data = json_decode(file_get_contents($file), true);
        $results = $data['results'] ?? [];

        if (empty($results)) {
            CLI::error('No results in scan file.');
            exit(1);
        }

        $failures = [];
        $sum = 0.0;
        $count = 0;

        foreach ($results as $r) {
            $status = (int)($r['status'] ?? 0);
            $ms = (float)($r['response_time_ms'] ?? 0);
            $len = (int)($r['content_length'] ?? 0);
            $redirect = (string)($r['redirect'] ?? '');
            $url = (string)($r['url'] ?? '');
            $route = (string)($r['route'] ?? '');

            if ($ms > 0) {
                $sum += $ms;
                $count++;
            }

            if ($status >= 500) {
                $failures[] = "500+ status: {$route} {$status}";
            }

            if ($ms > $maxMs) {
                $failures[] = "Slow route: {$route} {$ms}ms > {$maxMs}ms";
            }

            // Redirect loop heuristic: redirect points to same URL
            if ($redirect && trim($redirect) === trim($url)) {
                $failures[] = "Redirect loop suspected: {$route} redirect={$redirect}";
            }

            // Empty body unexpectedly for 200 responses
            if ($status === 200 && $len < $minLen) {
                $failures[] = "Empty body: {$route} length={$len} < {$minLen}";
            }
        }

        $avg = $count ? round($sum / $count, 2) : 0;
        CLI::write("Average response time: {$avg}ms (max allowed {$avgMax}ms)");

        if ($avg > $avgMax) {
            $failures[] = "Average response too high: {$avg}ms > {$avgMax}ms";
        }

        $outPath = WRITEPATH . 'audit/routes_gate_report.md';
        $md = "# Routes Gate Report\n\n";
        $md .= "- Scan file: {$file}\n";
        $md .= "- maxMs: {$maxMs}\n";
        $md .= "- avgMax: {$avgMax}\n";
        $md .= "- minLen: {$minLen}\n";
        $md .= "- average_ms: {$avg}\n\n";

        if (empty($failures)) {
            $md .= "✅ PASS\n";
            file_put_contents($outPath, $md);
            CLI::write("PASS. Report: {$outPath}");
            return;
        }

        $md .= "## Failures\n\n";
        foreach ($failures as $f) $md .= "- {$f}\n";
        file_put_contents($outPath, $md);

        CLI::error("FAIL. Report: {$outPath}");
        exit(1);
    }
}
