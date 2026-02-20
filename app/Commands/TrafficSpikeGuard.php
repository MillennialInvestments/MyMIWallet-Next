<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class TrafficSpikeGuard extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'spark:traffic-spike-guard';
    protected $description = 'Detect traffic/error spikes that commonly lead to 503 and alert Discord.';
    protected $usage       = 'spark:traffic-spike-guard [--lines=500] [--threshold=15] [--discord]';
    protected $options     = [
        '--lines' => 'Number of log lines to scan (default 500)',
        '--threshold' => 'Spike threshold per metric (default 15)',
        '--discord' => 'Send alert to Discord if spike detected',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $lines = 500;
        $threshold = 15;
        $discord = isset($flags['discord']);

        foreach ($params as $p) {
            if (preg_match('/^--lines=(\d+)$/', $p, $m)) $lines = (int) $m[1];
            if (preg_match('/^--threshold=(\d+)$/', $p, $m)) $threshold = (int) $m[1];
        }

        $home = rtrim(env('HOME') ?: $_SERVER['HOME'] ?? '', '/');
        $ngErr = $home . '/nginx/logs/error.log';
        $ci4Log = WRITEPATH . 'logs/log-' . date('Y-m-d') . '.log';

        $patterns = [
            'upstream_refused' => 'controller.sock failed (111: Connection refused)',
            'upstream_connect' => 'while connecting to upstream',
            'gateway_503'      => ' 503 ',
        ];

        $counts = [
            'nginx_upstream_refused' => 0,
            'nginx_upstream_connect' => 0,
            'ci4_critical'           => 0,
            'ci4_error'              => 0,
        ];

        // nginx tail scan
        if (is_file($ngErr)) {
            $tail = @shell_exec('tail -n ' . (int)$lines . ' ' . escapeshellarg($ngErr) . ' 2>/dev/null');
            if ($tail) {
                $counts['nginx_upstream_refused'] = substr_count($tail, $patterns['upstream_refused']);
                $counts['nginx_upstream_connect'] = substr_count($tail, $patterns['upstream_connect']);
            }
        }

        // ci4 scan
        if (is_file($ci4Log)) {
            $tail = @shell_exec('tail -n ' . (int)$lines . ' ' . escapeshellarg($ci4Log) . ' 2>/dev/null');
            if ($tail) {
                $counts['ci4_critical'] = preg_match_all('/^CRITICAL\s*-\s*/m', $tail);
                $counts['ci4_error']    = preg_match_all('/^ERROR\s*-\s*/m', $tail);
            }
        }

        CLI::write('Traffic Spike Guard', 'yellow');
        CLI::write(str_repeat('-', 40), 'yellow');
        foreach ($counts as $k => $v) {
            CLI::write("{$k}: {$v}", $v >= $threshold ? 'red' : 'green');
        }

        $spike = (
            $counts['nginx_upstream_refused'] >= $threshold ||
            $counts['ci4_critical'] >= $threshold
        );

        if ($spike) {
            CLI::newLine();
            CLI::write('⚠ Spike detected. Recommended immediate actions:', 'red');
            CLI::write('- php spark logs:full-report today --fix-hints --save', 'white');
            CLI::write('- php spark spark:diagnose-503 --discord', 'white');
            CLI::write('- php spark spark:restart-safe', 'white');

            if ($discord) {
                $msg = "🚨 Spike detected\n"
                    . "nginx_upstream_refused={$counts['nginx_upstream_refused']}\n"
                    . "ci4_critical={$counts['ci4_critical']}\n"
                    . "Run: logs:full-report today --fix-hints --save";
                $this->sendDiscord($msg);
                CLI::write('Discord sent (if configured).', 'green');
            }
        }
    }

    private function sendDiscord(string $message): void
    {
        $webhook = env('DISCORD_ALERT_WEBHOOK');
        if (!$webhook) return;

        @file_get_contents($webhook, false, stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json\r\n",
                'content' => json_encode(['content' => $message]),
                'timeout' => 5,
            ]
        ]));
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
