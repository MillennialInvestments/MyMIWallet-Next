<?php

namespace App\Commands\Logs;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class FullReport extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'logs:full-report';
    protected $description = 'Summarize CI4 + Apache + PHP logs for a given date.';
    protected $usage       = 'logs:full-report [today|yesterday|YYYY-MM-DD] [--save] [--fix-hints] [--discord]';
    protected $arguments   = [
        'date' => 'Optional: today|yesterday|YYYY-MM-DD (defaults to today).',
    ];
    protected $options     = [
        '--save' => 'Write the report to docs/aiops/logs',
        '--fix-hints' => 'Include fix hints in the report',
        '--discord' => 'Send a condensed summary to Discord',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        if ($this->isCiRuntime()) {
            CLI::write('CI mode: report-only logs summary.', 'yellow');
            $this->ciSummary([
                'command' => $this->name,
                'ci_mode' => true,
                'requested_params' => $params,
                'would_check' => ['writable/logs', '~/logs/*error*.log', '~/nginx/logs/*error*.log'],
                'writable_logs_exists' => is_dir(WRITEPATH . 'logs'),
                'php_version' => PHP_VERSION,
            ]);
            return EXIT_SUCCESS;
        }

        $arg = $args[0] ?? 'today';
        $date = $this->resolveDate($arg);

        $save     = isset($flags['save']);
        $fixHints = isset($flags['fix-hints']);
        $discord  = isset($flags['discord']);

        $records = [];

        // 1) CI4 log
        $ci4Path = WRITEPATH . 'logs/log-' . $date . '.log';
        $records = array_merge($records, $this->parseCi4Log($ci4Path));

        // 2) Apache / server error logs (DreamHost typical)
        $home = rtrim(env('HOME') ?: $_SERVER['HOME'] ?? '', '/');
        $records = array_merge($records, $this->parseGenericLogs(glob($home . '/logs/*error*.log') ?: [], 'apache', $date));

        // 3) PHP logs
        $records = array_merge($records, $this->parseGenericLogs(glob($home . '/logs/php*.log') ?: [], 'php', $date));

        // Also include nginx logs if present (you clearly have them) — helpful for 503 upstream errors
        $records = array_merge($records, $this->parseGenericLogs(glob($home . '/nginx/logs/*error*.log') ?: [], 'nginx', $date));

        $grouped = $this->groupRecords($records);

        $md = $this->renderMarkdown($date, $grouped, $fixHints);

        // terminal view
        $this->renderTerminal($date, $grouped);

        // write snapshot
        if ($save) {
            $resolved = ArtifactHelper::resolveArtifactDirs($this->name, null);
            if (isset($resolved['error'])) {
                CLI::error($resolved['error']);
                return EXIT_ERROR;
            }

            $report = [
                'command' => $this->name,
                'timestamp' => $resolved['timestamp'],
                'date' => $date,
                'fix_hints' => $fixHints,
                'grouped' => $grouped,
            ];

            if (! ArtifactHelper::writeArtifacts($resolved['dir'], $md, $report)) {
                return EXIT_ERROR;
            }
            CLI::newLine();
            CLI::write('Saved: ' . $resolved['dir'], 'green');
        }

        // optional discord blast
        if ($discord) {
            $summary = $this->renderDiscordSummary($date, $grouped);
            $this->sendDiscord($summary);
            CLI::newLine();
            CLI::write("Discord: sent (if webhook configured).", 'green');
        }

        return EXIT_SUCCESS;
    }

    private function resolveDate(string $arg): string
    {
        $arg = strtolower(trim($arg));
        if ($arg === 'today') {
            return date('Y-m-d');
        }
        if ($arg === 'yesterday') {
            return date('Y-m-d', strtotime('-1 day'));
        }
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $arg)) {
            return $arg;
        }
        // fallback
        return date('Y-m-d');
    }

    private function parseCi4Log(string $path): array
    {
        if (!is_file($path)) {
            return [[
                'source'  => 'ci4',
                'level'   => 'INFO',
                'message' => "CI4 log missing: {$path}",
                'file'    => '',
                'line'    => '',
                'count'   => 1,
            ]];
        }

        $lines = @file($path, FILE_IGNORE_NEW_LINES);
        if (!$lines) return [];

        $out = [];
        foreach ($lines as $ln) {
            // Example: "CRITICAL - 2026-01-25 06:57:33 --> Error: ..."
            if (preg_match('/^(DEBUG|INFO|NOTICE|WARNING|ERROR|CRITICAL)\s*-\s*\d{4}-\d{2}-\d{2}\s+[\d:]+\s+-->\s+(.*)$/', $ln, $m)) {
                $level = $this->normalizeLevel($m[1], 'ci4');
                $msg = trim($m[2]);

                // try to extract file:line if present
                $file = '';
                $lineNo = '';
                if (preg_match('/\bin\s+([^\s]+\.php)\s+on\s+line\s+(\d+)/i', $msg, $fm)) {
                    $file = $fm[1];
                    $lineNo = $fm[2];
                }

                $out[] = [
                    'source'  => 'ci4',
                    'level'   => $level,
                    'message' => $msg,
                    'file'    => $file,
                    'line'    => $lineNo,
                    'count'   => 1,
                ];
            }
        }
        return $out;
    }

    private function parseGenericLogs(array $paths, string $source, string $date): array
    {
        $out = [];
        foreach ($paths as $path) {
            if (!is_file($path)) continue;

            $lines = @file($path, FILE_IGNORE_NEW_LINES);
            if (!$lines) continue;

            foreach ($lines as $ln) {
                // Filter by date if log contains YYYY/MM/DD or YYYY-MM-DD
                $matchesDate = (str_contains($ln, $date) || str_contains($ln, str_replace('-', '/', $date)));
                if (!$matchesDate) continue;

                $level = $this->guessLevel($ln, $source);

                $file = '';
                $lineNo = '';
                if (preg_match('/\b([A-Za-z0-9_\/\.-]+\.php)\b.*\bline\b\s*(\d+)/i', $ln, $m)) {
                    $file = $m[1];
                    $lineNo = $m[2];
                }

                $out[] = [
                    'source'  => $source,
                    'level'   => $level,
                    'message' => trim($ln),
                    'file'    => $file,
                    'line'    => $lineNo,
                    'count'   => 1,
                ];
            }
        }
        return $out;
    }

    private function groupRecords(array $records): array
    {
        $bucket = [];
        foreach ($records as $r) {
            $key = $r['source'] . '|' . $r['level'] . '|' . $r['message'];
            if (!isset($bucket[$key])) {
                $bucket[$key] = $r;
                $bucket[$key]['count'] = 1;
            } else {
                $bucket[$key]['count']++;
            }
        }

        // reshape: source -> level -> rows
        $out = [];
        foreach ($bucket as $row) {
            $out[$row['source']][$row['level']][] = $row;
        }

        // sort levels by severity
        $order = ['CRITICAL', 'ERROR', 'WARNING', 'INFO', 'DEBUG'];
        foreach ($out as $source => $levels) {
            uksort($out[$source], function ($a, $b) use ($order) {
                return array_search($a, $order, true) <=> array_search($b, $order, true);
            });
        }

        return $out;
    }

    private function renderTerminal(string $date, array $grouped): void
    {
        CLI::newLine();
        CLI::write(str_repeat('=', 40), 'white');
        CLI::write(" MyMI Wallet — Full Log Report ({$date})", 'white');
        CLI::write(str_repeat('=', 40), 'white');
        CLI::newLine();

        foreach ($grouped as $source => $levels) {
            CLI::write("SOURCE: " . strtoupper($source), 'yellow');
            CLI::write(str_repeat('-', 40), 'yellow');

            foreach ($levels as $level => $rows) {
                $color = match ($level) {
                    'CRITICAL' => 'red',
                    'ERROR'    => 'light_red',
                    'WARNING'  => 'light_yellow',
                    default    => 'green',
                };

                CLI::write("{$level} (" . count($rows) . " group(s))", $color);

                // show top 6 by count
                usort($rows, fn($a,$b) => $b['count'] <=> $a['count']);
                $top = array_slice($rows, 0, 6);

                foreach ($top as $r) {
                    $suffix = $r['count'] > 1 ? " ({$r['count']}x)" : '';
                    CLI::write("- {$r['message']}{$suffix}", 'white');
                }
                CLI::newLine();
            }

            CLI::newLine();
        }
    }

    private function renderMarkdown(string $date, array $grouped, bool $fixHints): string
    {
        $md = [];
        $md[] = "========================================";
        $md[] = " MyMI Wallet — Full Log Report ({$date})";
        $md[] = "========================================";
        $md[] = "";

        foreach ($grouped as $source => $levels) {
            $md[] = "## SOURCE: " . strtoupper($source);
            $md[] = "";

            foreach ($levels as $level => $rows) {
                usort($rows, fn($a,$b) => $b['count'] <=> $a['count']);
                $md[] = "### {$level}";
                foreach ($rows as $r) {
                    $suffix = $r['count'] > 1 ? " ({$r['count']}x)" : '';
                    $md[] = "- {$r['message']}{$suffix}";
                }
                $md[] = "";
            }
        }

        if ($fixHints) {
            $md[] = "## Suggested Fix Hints";
            $md[] = $this->buildFixHints($grouped);
            $md[] = "";
        }

        return implode("\n", $md);
    }

    private function buildFixHints(array $grouped): string
    {
        $hints = [];

        $flat = [];
        foreach ($grouped as $source => $levels) {
            foreach ($levels as $lvl => $rows) {
                foreach ($rows as $r) $flat[] = $r;
            }
        }

        $joined = implode("\n", array_map(fn($r) => $r['message'], $flat));

        if (stripos($joined, 'Allowed memory size') !== false) {
            $hints[] = "- Memory exhaustion detected: batch heavy jobs (Marketing digest, large email summaries) and avoid loading large HTML into memory.";
        }
        if (stripos($joined, 'controller.sock failed (111: Connection refused)') !== false) {
            $hints[] = "- Upstream socket refused: you still have php-pm / fastcgi sock references in webserver config. Run `php spark spark:purge-fastcgi --approve` and restart web stack in DreamHost panel.";
        }
        if (stripos($joined, 'FactoriesCache') !== false || stripos($joined, 'FileVarExportHandler') !== false) {
            $hints[] = "- Config cache corruption: delete `writable/cache/FactoriesCache_*` and re-test.";
        }
        if (!$hints) {
            $hints[] = "- No automatic hints matched. Review top CRITICAL/ERROR groups first.";
        }

        return implode("\n", $hints);
    }

    private function renderDiscordSummary(string $date, array $grouped): string
    {
        $lines = [];
        $lines[] = "📄 **MyMI Wallet — Full Log Report ({$date})**";

        foreach ($grouped as $source => $levels) {
            $crit = count($levels['CRITICAL'] ?? []);
            $err  = count($levels['ERROR'] ?? []);
            $warn = count($levels['WARNING'] ?? []);
            if (($crit + $err + $warn) === 0) continue;

            $lines[] = "";
            $lines[] = "**" . strtoupper($source) . "** → CRIT: {$crit}, ERR: {$err}, WARN: {$warn}";
            $top = $levels['CRITICAL'] ?? ($levels['ERROR'] ?? []);
            if ($top) {
                usort($top, fn($a,$b) => $b['count'] <=> $a['count']);
                $lines[] = "Top: " . $this->truncate($top[0]['message'], 160);
            }
        }

        return implode("\n", $lines);
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

    private function guessLevel(string $line, string $source): string
    {
        $l = strtolower($line);

        if (str_contains($l, '[crit]') || str_contains($l, 'critical') || str_contains($l, 'emerg')) return 'CRITICAL';
        if (str_contains($l, '[error]') || str_contains($l, ' error ') || str_contains($l, 'failed')) return 'ERROR';
        if (str_contains($l, 'warning') || str_contains($l, '[warn]')) return 'WARNING';

        // nginx upstream refused is basically ERROR
        if ($source === 'nginx' && str_contains($l, 'connection refused')) return 'ERROR';

        return 'INFO';
    }

    private function normalizeLevel(string $level, string $source): string
    {
        $level = strtoupper($level);
        return match ($level) {
            'NOTICE' => 'INFO',
            default  => $level,
        };
    }

    private function truncate(string $s, int $n): string
    {
        $s = trim($s);
        if (mb_strlen($s) <= $n) return $s;
        return mb_substr($s, 0, $n - 1) . '…';
    }

    /**
     * Write a CI-safe diagnostic summary for report-only log commands.
     *
     * @param mixed ...$payload
     */
    protected function ciSummary(...$payload): void
    {
        if (! getenv('CI')) {
            return;
        }

        $dir = defined('WRITEPATH')
            ? WRITEPATH . 'ci' . DIRECTORY_SEPARATOR
            : ROOTPATH . 'writable' . DIRECTORY_SEPARATOR . 'ci' . DIRECTORY_SEPARATOR;

        if (! is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }

        $summary = [
            'timestamp' => date('c'),
            'command' => static::class,
            'payload' => $payload,
        ];

        @file_put_contents(
            $dir . str_replace('\\', '_', static::class) . '-summary.json',
            json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL
        );
    }

}
