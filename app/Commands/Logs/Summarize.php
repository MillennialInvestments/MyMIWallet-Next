<?php

namespace App\Commands\Logs;

use App\Services\Spark\LogSummarizeService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Summarize extends BaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:summarize';
    protected $description = 'Summarize CI4 logs for a given date, including new entries since the last run.';
    protected $usage       = 'logs:summarize [date|yesterday] [--dry-run] [--force]';

    protected $arguments = [
        'date' => 'Optional: "yesterday" or YYYY-MM-DD (defaults to today).',
    ];

    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--force'   => 'Required for destructive actions',
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
        // Safety guard (future-proof)
        // -----------------------------
        // -----------------------------
        // Dry-run handling (correct)
        // -----------------------------
        $dryRun = isset($flags['dry-run']);

        // -----------------------------
        // Destructive safety guard
        // -----------------------------
        if ($this->isDestructive() && ! isset($flags['force'])) {
            CLI::error('This action is destructive. Re-run with --force to proceed.');
            log_message('warning', '[spark:logs:summarize] Blocked destructive run (missing --force)');
            return EXIT_ERROR;
        }

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

    /**
     * CI4-safe param parser.
     *
     * Returns:
     *   [
     *     array $args,   // positional arguments
     *     array $flags   // ['flag' => true]
     *   ]
     */
    protected function parseParams(array $params): array
    {
        $args  = [];
        $flags = [];

        foreach ($params as $param) {
            if (str_starts_with($param, '--')) {
                $flags[ltrim($param, '-')] = true;
            } else {
                $args[] = $param;
            }
        }

        return [$args, $flags];
    }
}
