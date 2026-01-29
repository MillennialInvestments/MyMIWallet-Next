<?php

namespace App\Commands\Logs;

use App\Services\Spark\LogSummarizeService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Summarize extends SafeBaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:summarize';
    protected $description = 'Summarize CI4 logs for a given date, including new entries since the last run.';
    protected $usage       = 'logs:summarize [date|yesterday] [--dry-run]';

    protected $arguments = [
        'date' => 'Optional: "yesterday" or YYYY-MM-DD (defaults to today).',
    ];

    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
    ];

    public function run(array $params)
    {
        CLI::write('Starting logs:summarize', 'yellow');
        log_message('info', '[spark:logs:summarize] Started', ['params' => $params]);

        // -----------------------------
        // Parse args + flags (CI4-safe)
        // -----------------------------
        [$args, $flags] = $this->parseParams($params);

        $targetDate = $this->resolveTargetDate($args[0] ?? null);

        // -----------------------------
        // Dry-run handling (correct)
        // -----------------------------
        $dryRun = $this->resolveDryRun($flags);

        // -----------------------------
        // Execute service
        // -----------------------------
        $service = new LogSummarizeService();
        $result  = $service->summarizeForDate($targetDate, $dryRun);

        if (! ($result['ok'] ?? false)) {
            $message = $result['message'] ?? 'Unable to summarize logs.';
            if (! empty($result['candidates'])) {
                $message .= ' Checked: ' . implode(', ', $result['candidates']);
            }

            CLI::error($message);
            log_message('error', '[spark:logs:summarize] Failed', [
                'date'    => $targetDate,
                'dryRun'  => $dryRun,
                'message' => $message,
            ]);

            return EXIT_ERROR;
        }

        // -----------------------------
        // Output
        // -----------------------------
        if ($dryRun) {
            CLI::write("Dry-run: would write summary to {$result['out_file']}", 'yellow');
            CLI::write("Dry-run: would update state to {$result['state_file']}", 'yellow');
        } else {
            CLI::write("Summary generated for {$targetDate}: {$result['out_file']}", 'green');
            if (! empty($result['max_ts'])) {
                CLI::write('Last processed timestamp updated to: ' . $result['max_ts'], 'yellow');
            }
        }

        CLI::write('total_entries=' . ($result['total'] ?? 0));
        CLI::write('new_entries=' . ($result['new_total'] ?? 0));

        log_message('info', '[spark:logs:summarize] Completed', [
            'date'      => $targetDate,
            'total'     => $result['total'] ?? 0,
            'new_total' => $result['new_total'] ?? 0,
            'dry_run'   => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    /**
     * Whether this command can destroy or mutate historical data.
     * Override to TRUE in future commands that prune, rewrite, or delete.
     */
    protected function isDestructive(): bool
    {
        return false;
    }

    /**
     * Resolve the target date argument.
     */
    private function resolveTargetDate(?string $arg): string
    {
        if ($arg === 'yesterday') {
            return date('Y-m-d', strtotime('-1 day'));
        }

        if ($arg && preg_match('/^\d{4}-\d{2}-\d{2}$/', $arg)) {
            return $arg;
        }

        return date('Y-m-d');
    }
}
