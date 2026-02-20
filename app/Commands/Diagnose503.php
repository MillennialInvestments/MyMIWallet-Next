<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class Diagnose503 extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'spark:diagnose-503';
    protected $description = 'Diagnose common 503 causes (cache, maintenance filter, upstream, writable).';
    protected $usage       = 'spark:diagnose-503 [--discord]';
    protected $options     = [
        '--discord' => 'Send failures to Discord if configured',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $discord = isset($flags['discord']);
        $ciMode = $this->isCiRuntime();

        if ($ciMode) {
            CLI::write('CI mode: running report-only 503 diagnostics.', 'yellow');
            $this->ciSummary([
                'command' => $this->name,
                'ci_mode' => true,
                'would_check' => [
                    'nginx/php-fpm upstream health',
                    'writable/cache permissions',
                    'maintenance mode flags',
                    'recent application and web server error logs',
                ],
                'php_version' => PHP_VERSION,
                'modules_count' => count(get_loaded_extensions()),
                'writable' => [
                    'writepath' => is_writable(WRITEPATH),
                    'cache_dir_exists' => is_dir(WRITEPATH . 'cache'),
                    'logs_dir_exists' => is_dir(WRITEPATH . 'logs'),
                ],
            ]);
            return EXIT_SUCCESS;
        }

        $results = [];

        $results[] = ['Writable', is_writable(WRITEPATH)];
        $results[] = ['Writable/cache exists', is_dir(WRITEPATH . 'cache')];
        $results[] = ['public/index.php exists', is_file(FCPATH . 'index.php')];
        $results[] = ['CI4 log today exists', is_file(WRITEPATH . 'logs/log-' . date('Y-m-d') . '.log')];

        // quick scan for upstream refused in nginx error log (your logs show controller.sock refused)
        $home = rtrim(env('HOME') ?: $_SERVER['HOME'] ?? '', '/');
        $ngErr = $home . '/nginx/logs/error.log';

        $upstreamRefused = false;
        if (is_file($ngErr)) {
            $tail = @shell_exec('tail -n 200 ' . escapeshellarg($ngErr) . ' 2>/dev/null');
            if ($tail && stripos($tail, 'controller.sock failed (111: Connection refused)') !== false) {
                $upstreamRefused = true;
            }
        }
        $results[] = ['Upstream socket refused detected', !$upstreamRefused];

        CLI::write('503 Diagnostics', 'yellow');
        CLI::write(str_repeat('-', 40), 'yellow');

        $bad = 0;
        foreach ($results as [$label, $ok]) {
            if (!$ok) $bad++;
            CLI::write($label . ': ' . ($ok ? 'OK' : 'FAIL'), $ok ? 'green' : 'red');
        }

        CLI::newLine();
        CLI::write('Suggested Actions:', 'yellow');

        if ($upstreamRefused) {
            CLI::write('- Your web server is still pointing at php-pm controller.sock (refused). Run: php spark spark:purge-fastcgi --approve', 'white');
            CLI::write('- Then restart the site stack in DreamHost panel (Apache/PHP-FPM).', 'white');
        }

        CLI::write('- Clear cache: rm -rf writable/cache/*', 'white');

        if ($discord && $bad > 0) {
            $msg = "🚨 503 Diagnostics FAIL count: {$bad}\n";
            foreach ($results as [$label, $ok]) {
                if (!$ok) $msg .= "- {$label}: FAIL\n";
            }
            $this->sendDiscord($msg);
            CLI::write('Discord alert sent (if configured).', 'green');
        }

        return EXIT_SUCCESS;
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
