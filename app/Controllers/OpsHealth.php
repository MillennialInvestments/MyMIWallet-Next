<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class OpsHealth extends Controller
{
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
