<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Log\Handlers\FileHandler;

class LogSummarize extends BaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'logs:summarize';
    protected $description = 'Summarize CI4 logs for a given date (default today).';
    protected $usage       = 'logs:summarize [date|yesterday]';
    protected $arguments   = [
        'date' => 'Optional: "yesterday" or YYYY-MM-DD (defaults to today).',
    ];

    public function run(array $params)
    {
        // Determine target date
        $arg = $params[0] ?? null;

        if ($arg === 'yesterday') {
            $targetDate = date('Y-m-d', strtotime('-1 day'));
        } elseif ($arg && preg_match('/^\d{4}-\d{2}-\d{2}$/', $arg)) {
            $targetDate = $arg;
        } else {
            $targetDate = date('Y-m-d'); // server date
        }

        $this->summarizeForDate($targetDate);
    }

    /**
     * Core logic to summarize a log file for a specific date.
     *
     * Now timestamp-aware:
     * - Tracks last processed timestamp in summary-YYYY-MM-DD.state
     * - Adds a "HERE'S THE NEW STUFF" section for entries after that timestamp.
     */
    protected function summarizeForDate(string $date): void
    {
        $logFile = $this->resolveDailyLogPath($date);

        if ($logFile === null) {
            $candidates = $this->resolveDailyLogCandidates($date);
            CLI::error("No log file found for {$date}. Checked: " . implode(', ', $candidates));
            return;
        }

        $logDir    = rtrim(dirname($logFile), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $outFile   = $logDir . "summary-{$date}.log";
        $stateFile = $logDir . "summary-{$date}.state";

        if (! is_file($logFile)) {
            CLI::error("No log file found for {$date}: {$logFile}");
            return;
        }

        $levels = ['DEBUG', 'INFO', 'NOTICE', 'WARNING', 'ERROR', 'CRITICAL'];

        // key: "LEVEL|message" => total count
        $entries = [];

        // key: "LEVEL|message" => count of NEW entries (after lastProcessedTs)
        $newEntries = [];

        // Load last processed timestamp (if any)
        $lastProcessedTs = null;
        if (is_file($stateFile)) {
            $raw = trim((string) file_get_contents($stateFile));
            if ($raw !== '') {
                $lastProcessedTs = $raw; // format: Y-m-d H:i:s
            }
        }

        $lines       = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $pattern     = '/^(DEBUG|INFO|NOTICE|WARNING|ERROR|CRITICAL)\s*-\s*' .
                       '(\d{4}-\d{2}-\d{2}\s+\d{2}:\d{2}:\d{2})\s*-->\s*(.*)$/';
        $maxTsString = $lastProcessedTs; // track the latest timestamp we see

        foreach ($lines as $line) {
            if (! preg_match($pattern, $line, $matches)) {
                // skip non-standard lines (stack traces, etc.)
                continue;
            }

            $level     = strtoupper(trim($matches[1]));
            $timestamp = trim($matches[2]); // "YYYY-MM-DD HH:MM:SS"
            $message   = trim($matches[3]);

            if (! in_array($level, $levels, true)) {
                continue;
            }

            // normalize whitespace to group similar messages
            $message = preg_replace('/\s+/', ' ', $message);

            $key = $level . '|' . $message;

            // ----- total occurrences -----
            if (! isset($entries[$key])) {
                $entries[$key] = 0;
            }
            $entries[$key]++;

            // ----- NEW occurrences since lastProcessedTs -----
            $isNew = false;
            if ($lastProcessedTs === null) {
                // first run for this date => treat everything as "old" by default
                // If you want first run to count as "new", flip this logic.
                $isNew = false;
            } else {
                // safe lexicographical comparison for "YYYY-MM-DD HH:MM:SS"
                if ($timestamp > $lastProcessedTs) {
                    $isNew = true;
                }
            }

            if ($isNew) {
                if (! isset($newEntries[$key])) {
                    $newEntries[$key] = 0;
                }
                $newEntries[$key]++;
            }

            // Track the maximum timestamp we see
            if ($maxTsString === null || $timestamp > $maxTsString) {
                $maxTsString = $timestamp;
            }
        }

        // Group by level for nicer output
        $groupedByLevel    = [];
        $newGroupedByLevel = [];

        foreach ($entries as $key => $count) {
            [$level, $message] = explode('|', $key, 2);
            if (! isset($groupedByLevel[$level])) {
                $groupedByLevel[$level] = [];
            }
            $groupedByLevel[$level][$message] = $count;
        }

        foreach ($newEntries as $key => $count) {
            [$level, $message] = explode('|', $key, 2);
            if (! isset($newGroupedByLevel[$level])) {
                $newGroupedByLevel[$level] = [];
            }
            $newGroupedByLevel[$level][$message] = $count;
        }

        // Build summary output
        $summary   = [];
        $summary[] = "===============================================";
        $summary[] = "   MyMI Wallet — Log Summary for {$date}";
        $summary[] = "   Auto-generated by logs:summarize command";
        $summary[] = "   Grouped by (LEVEL + message)";
        $summary[] = "===============================================";
        $summary[] = "";

        if ($lastProcessedTs !== null) {
            $summary[] = "Last processed up to: {$lastProcessedTs}";
        } else {
            $summary[] = "Last processed up to: <none> (first run for this date)";
        }
        $summary[] = "";

        // ---- Full grouped summary (all occurrences) ----
        foreach ($levels as $level) {
            if (empty($groupedByLevel[$level])) {
                continue;
            }

            $summary[] = "---------------------------";
            $summary[] = "LEVEL: {$level}";
            $summary[] = "---------------------------";
            $summary[] = "";

            foreach ($groupedByLevel[$level] as $message => $count) {
                $summary[] = "[{$count} occurrence(s)]";
                $summary[] = "{$level} --> {$message}";
                $summary[] = "";
            }

            $summary[] = "";
        }

        // ---- "HERE'S THE NEW STUFF" delta section ----
        $summary[] = "===============================================";
        $summary[] = "   HERE'S THE NEW STUFF";
        if ($lastProcessedTs !== null) {
            $summary[] = "   (Entries logged AFTER {$lastProcessedTs})";
        } else {
            $summary[] = "   (No previous timestamp recorded – nothing treated as new)";
        }
        $summary[] = "===============================================";
        $summary[] = "";

        $hasNew = false;

        foreach ($levels as $level) {
            if (empty($newGroupedByLevel[$level])) {
                continue;
            }

            $hasNew = true;

            $summary[] = "---------------------------";
            $summary[] = "LEVEL: {$level} (NEW)";
            $summary[] = "---------------------------";
            $summary[] = "";

            foreach ($newGroupedByLevel[$level] as $message => $count) {
                $summary[] = "[{$count} NEW occurrence(s)]";
                $summary[] = "{$level} --> {$message}";
                $summary[] = "";
            }

            $summary[] = "";
        }

        if (! $hasNew && $lastProcessedTs !== null) {
            $summary[] = "No NEW log entries found after {$lastProcessedTs}.";
            $summary[] = "";
        }

        file_put_contents($outFile, implode(PHP_EOL, $summary));

        // Update state file with the latest timestamp we saw
        if ($maxTsString !== null) {
            file_put_contents($stateFile, $maxTsString);
        }

        CLI::write("Summary generated for {$date}: {$outFile}", 'green');
        if ($maxTsString !== null) {
            CLI::write("Last processed timestamp updated to: {$maxTsString}", 'yellow');
        }
    }

    private function resolveDailyLogCandidates(string $date): array
    {
        $loggerConfig = config('Logger');
        $fileConfig   = $loggerConfig->handlers[FileHandler::class] ?? [];

        $path = $fileConfig['path'] ?? WRITEPATH . 'logs/';
        $path = $path === '' ? WRITEPATH . 'logs/' : rtrim($path, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        $ext = $fileConfig['fileExtension'] ?? 'php';
        $ext = $ext === '' ? 'php' : $ext;

        $candidates = [
            $path . 'log-' . $date . '.' . $ext,
            $path . 'log-' . $date . '.php',
            $path . 'log-' . $date . '.log',
        ];

        // Unique, preserve order
        return array_values(array_unique($candidates));
    }

    private function resolveDailyLogPath(string $date): ?string
    {
        foreach ($this->resolveDailyLogCandidates($date) as $file) {
            if (is_file($file) && filesize($file) > 0) {
                return $file;
            }
        }

        return null;
    }

}
