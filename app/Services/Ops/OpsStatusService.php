<?php

declare(strict_types=1);

namespace App\Services\Ops;

use Closure;
use Throwable;

/**
 * Read-only MyMI Wallet operations snapshot for the TBI AIOps watch layer.
 *
 * It only reads: a database ping, the tail of emergency.log and of today's
 * CodeIgniter log, the last-run files written by `php spark ops:job:run`, and
 * the docs gap list. It never runs spark, writes files or rows, or returns
 * file paths, environment values or raw log lines (messages are shortened and
 * scrubbed of emails, long numbers and token-like strings).
 */
class OpsStatusService
{
    /** Bytes read from the end of each log file. */
    public const TAIL_BYTES = 2_000_000;

    /** Jobs the timers run, with the longest healthy gap in hours. */
    public const JOB_MAX_GAP_HOURS = [
        'ops.health.check'          => 26,
        'ops.logs.triage_daily'     => 26,
        'ops.routes.smoke_test'     => 26,
        'ops.security.headers_scan' => 26,
        'ops.db.maintenance'        => 8 * 24,
    ];

    private string $writePath;
    private string $rootPath;
    /** @var Closure():bool|null */
    private ?Closure $dbPing;
    private int $now;

    /**
     * @param Closure():bool|null $dbPing returns true when the database answers
     */
    public function __construct(?string $writePath = null, ?string $rootPath = null, ?Closure $dbPing = null, ?int $now = null)
    {
        $this->writePath = rtrim($writePath ?? WRITEPATH, '/\\') . '/';
        $this->rootPath  = rtrim($rootPath ?? ROOTPATH, '/\\') . '/';
        $this->dbPing    = $dbPing;
        $this->now       = $now ?? time();
    }

    public function snapshot(): array
    {
        return [
            'schema'       => 'mymi_ops_status_v1',
            'generated_at' => gmdate('Y-m-d\TH:i:s\Z', $this->now),
            'revision'     => $this->revision(),
            'db'           => $this->db(),
            'emergency'    => $this->emergency(),
            'app_log'      => $this->appLog(),
            'jobs'         => $this->jobs(),
            'docs_gaps'    => $this->docsGaps(),
        ];
    }

    private function revision(): ?string
    {
        $raw = @file_get_contents($this->rootPath . 'REVISION');
        if (! is_string($raw)) {
            return null;
        }
        $sha = strtolower(trim($raw));

        return preg_match('/^[0-9a-f]{7,40}$/', $sha) ? substr($sha, 0, 12) : null;
    }

    private function db(): array
    {
        $started = microtime(true);
        try {
            $ok = $this->dbPing ? (bool) ($this->dbPing)() : $this->defaultPing();
        } catch (Throwable $e) {
            $ok = false;
        }

        return ['ok' => $ok, 'ms' => (int) round((microtime(true) - $started) * 1000)];
    }

    private function defaultPing(): bool
    {
        $db = \Config\Database::connect();
        $row = $db->query('SELECT 1 AS ok')->getRowArray();

        return is_array($row) && (int) ($row['ok'] ?? 0) === 1;
    }

    /** emergency.log holds JSON lines {timestamp, message, context}. */
    private function emergency(): array
    {
        $since15 = $this->now - 900;
        $since24 = $this->now - 86400;
        $last15 = 0;
        $last24 = 0;
        $groups = [];
        $lastAt = null;
        foreach ($this->tailLines($this->writePath . 'logs/emergency.log') as $line) {
            $row = json_decode($line, true);
            if (! is_array($row)) {
                continue;
            }
            $ts = strtotime((string) ($row['timestamp'] ?? ''));
            if ($ts === false || $ts < $since24) {
                continue;
            }
            $last24++;
            if ($ts >= $since15) {
                $last15++;
            }
            $lastAt = max($lastAt ?? 0, $ts);
            $this->group($groups, (string) ($row['message'] ?? ''));
        }

        return [
            'last_15m' => $last15,
            'last_24h' => $last24,
            'last_at'  => $lastAt ? gmdate('Y-m-d\TH:i:s\Z', $lastAt) : null,
            'top'      => $this->top($groups),
        ];
    }

    /** CodeIgniter lines look like "ERROR - 2026-11-23 14:05:01 --> message". */
    private function appLog(): array
    {
        $date = date('Y-m-d', $this->now);
        $counts = ['critical' => 0, 'error' => 0, 'warning' => 0];
        $lastHour = 0;
        $groups = [];
        $hourAgo = $this->now - 3600;
        foreach ($this->tailLines($this->appLogFile($date)) as $line) {
            if (! preg_match('/^(CRITICAL|ALERT|EMERGENCY|ERROR|WARNING) - (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}) --> (.*)$/', $line, $m)) {
                continue;
            }
            $level = $m[1] === 'WARNING' ? 'warning' : ($m[1] === 'ERROR' ? 'error' : 'critical');
            $counts[$level]++;
            if ($level === 'warning') {
                continue;
            }
            $ts = strtotime($m[2]);
            if ($ts !== false && $ts >= $hourAgo) {
                $lastHour++;
            }
            $this->group($groups, $m[3]);
        }
        $midnight = strtotime($date . ' 00:00:00') ?: $this->now;
        // In the first hour after midnight the rolling hour also covers the end
        // of yesterday's log; daily counts and top messages stay today's only.
        if ($hourAgo < $midnight) {
            foreach ($this->tailLines($this->appLogFile(date('Y-m-d', $midnight - 1))) as $line) {
                if (preg_match('/^(CRITICAL|ALERT|EMERGENCY|ERROR) - (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}) --> /', $line, $m)) {
                    $ts = strtotime($m[2]);
                    if ($ts !== false && $ts >= $hourAgo && $ts < $midnight) {
                        $lastHour++;
                    }
                }
            }
        }

        return [
            'date'              => $date,
            'critical'          => $counts['critical'],
            'error'             => $counts['error'],
            'warning'           => $counts['warning'],
            'errors_last_hour'  => $lastHour,
            'hours_today'       => round(max(0, $this->now - $midnight) / 3600, 2),
            'top'               => $this->top($groups),
        ];
    }

    /**
     * Today's CodeIgniter log. FileHandler names it log-<date>.<fileExtension>
     * (MyMI's Config\Logger uses 'php'); fall back to .php then .log.
     */
    private function appLogFile(string $date): string
    {
        $exts = [];
        try {
            $handlers = config('Logger')->handlers ?? [];
            foreach ($handlers as $class => $settings) {
                if (str_ends_with((string) $class, 'FileHandler') && ! empty($settings['fileExtension'])) {
                    $exts[] = ltrim((string) $settings['fileExtension'], '.');
                }
            }
        } catch (Throwable $e) {
            // keep the defaults below
        }
        foreach (array_unique(array_merge($exts, ['php', 'log'])) as $ext) {
            $file = $this->writePath . 'logs/log-' . $date . '.' . $ext;
            if (is_file($file)) {
                return $file;
            }
        }

        return $this->writePath . 'logs/log-' . $date . '.php';
    }

    /** Last-run files from `php spark ops:job:run` (writable/ops/last-run/<job>.json). */
    private function jobs(): array
    {
        $out = [];
        foreach (self::JOB_MAX_GAP_HOURS as $key => $maxGap) {
            $file = $this->writePath . 'ops/last-run/' . $key . '.json';
            $row = is_file($file) ? json_decode((string) @file_get_contents($file, false, null, 0, 65536), true) : null;
            if (! is_array($row)) {
                $out[] = ['job' => $key, 'last_status' => null, 'finished_at' => null, 'hours_since' => null, 'max_gap_hours' => $maxGap];
                continue;
            }
            $finished = strtotime((string) ($row['finished_at'] ?? ''));
            $status = in_array($row['status'] ?? null, ['ok', 'degraded', 'error'], true) ? $row['status'] : 'unknown';
            $out[] = [
                'job'           => $key,
                'last_status'   => $status,
                'finished_at'   => $finished ? gmdate('Y-m-d\TH:i:s\Z', $finished) : null,
                'hours_since'   => $finished ? round(($this->now - $finished) / 3600, 1) : null,
                'max_gap_hours' => $maxGap,
            ];
        }

        return $out;
    }

    private function docsGaps(): array
    {
        $file = $this->rootPath . 'docs/_aiops/gaps/doc-coverage.csv';
        $handle = is_file($file) ? @fopen($file, 'rb') : false;
        if ($handle === false) {
            return ['count' => 0, 'high' => 0, 'top' => []];
        }
        $headers = fgetcsv($handle) ?: [];
        $count = 0;
        $high = 0;
        $top = [];
        while (($line = fgetcsv($handle)) !== false && $count < 5000) {
            if (count($line) !== count($headers)) {
                continue;
            }
            $row = array_combine($headers, $line);
            $count++;
            if (($row['priority'] ?? '') === 'high') {
                $high++;
                if (count($top) < 5) {
                    $top[] = ['module' => $this->clean((string) ($row['module'] ?? '')), 'doc' => $this->clean((string) ($row['suggested_doc_path'] ?? ''))];
                }
            }
        }
        fclose($handle);

        return ['count' => $count, 'high' => $high, 'top' => $top];
    }

    /** @return list<string> */
    private function tailLines(string $file): array
    {
        if (! is_file($file) || ! is_readable($file)) {
            return [];
        }
        $size = (int) @filesize($file);
        $handle = @fopen($file, 'rb');
        if ($handle === false) {
            return [];
        }
        $offset = max(0, $size - self::TAIL_BYTES);
        fseek($handle, $offset);
        $data = (string) stream_get_contents($handle);
        fclose($handle);
        $lines = preg_split('/\r?\n/', $data) ?: [];
        if ($offset > 0) {
            array_shift($lines); // first line may be cut
        }

        return array_values(array_filter($lines, static fn ($l) => $l !== ''));
    }

    private function group(array &$groups, string $message): void
    {
        $key = $this->clean($message);
        if ($key === '') {
            return;
        }
        $groups[$key] = ($groups[$key] ?? 0) + 1;
    }

    private function top(array $groups): array
    {
        arsort($groups);
        $out = [];
        foreach (array_slice($groups, 0, 3, true) as $message => $count) {
            $out[] = ['count' => $count, 'message' => (string) $message];
        }

        return $out;
    }

    /** Shorten and scrub a message so it can leave the server. */
    public function clean(string $text): string
    {
        $text = preg_replace('/[\x00-\x1F\x7F]+/', ' ', $text) ?? '';
        $text = preg_replace('/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/', '[email]', $text) ?? '';
        $text = preg_replace('#(/[\w.@-]+){2,}#', '[path]', $text) ?? '';
        $text = preg_replace('/\b[A-Za-z0-9_\-]{24,}\b/', '[token]', $text) ?? '';
        $text = preg_replace('/\d+/', 'N', $text) ?? '';
        $text = trim(preg_replace('/\s+/', ' ', $text) ?? '');

        return mb_substr($text, 0, 140);
    }
}
