<?php

namespace App\Controllers;

use App\Services\Env\EnvInspector;

class OpsHealth extends UserController
{
    public function index()
    {
        $inspector = new EnvInspector();
        $report = $inspector->loadLatestReport();

        $summary = $report['summary'] ?? ['score' => 0, 'counts' => ['ok' => 0, 'warning' => 0, 'critical' => 0]];
        $status = $report['status'] ?? 'unknown';
        $score = (int) ($summary['score'] ?? 0);
        $colorState = match ($status) {
            'ok' => 'green',
            'warning' => 'yellow',
            'critical' => 'red',
            default => 'gray',
        };

        $data = [
            'pageTitle' => 'Server Health | MyMI Wallet',
            'healthScore' => $score,
            'healthStatus' => $status,
            'colorState' => $colorState,
            'latestTimestamp' => $report['generated_at'] ?? null,
            'topFindings' => $report ? $inspector->topFindings($report, 5) : [],
        ];

        return $this->renderTheme('admin/health/index', $data);
    }

    public function run()
    {
        $inspector = new EnvInspector();
        $report = $inspector->inspect();
        $markdown = $inspector->formatMarkdown($report);
        $inspector->persistReport($report, $markdown, false);

        return redirect()->to(site_url('admin/ops/health'))->with('message', 'Env Doctor run completed.');
    }

    public function score()
    {
        $home = rtrim(getenv('HOME') ?: $_SERVER['HOME'] ?? '', '/');
        $ngErr = $home . '/nginx/logs/error.log';
        $ci4Log = WRITEPATH . 'logs/log-' . date('Y-m-d') . '.log';

        $ngRefused = 0;
        if (is_file($ngErr)) {
            $tail = @shell_exec('tail -n 600 ' . escapeshellarg($ngErr) . ' 2>/dev/null');
            if ($tail) $ngRefused = substr_count($tail, 'controller.sock failed (111: Connection refused)');
        }

        $crit = 0; $err = 0;
        if (is_file($ci4Log)) {
            $tail = @shell_exec('tail -n 800 ' . escapeshellarg($ci4Log) . ' 2>/dev/null');
            if ($tail) {
                $crit = preg_match_all('/^CRITICAL\s*-\s*/m', $tail);
                $err  = preg_match_all('/^ERROR\s*-\s*/m', $tail);
            }
        }

        // scoring (simple + effective)
        $score = 100;
        $score -= min(60, $ngRefused * 3);
        $score -= min(30, $crit * 4);
        $score -= min(20, $err * 1);

        $score = max(0, min(100, $score));

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'score' => $score,
                'nginx_upstream_refused' => $ngRefused,
                'ci4_critical' => $crit,
                'ci4_error' => $err,
                'timestamp' => date('c'),
            ]
        ]);
    }
}
