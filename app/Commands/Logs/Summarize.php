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
    protected $usage       = 'logs:summarize [date|yesterday] [--json] [--dry-run]';

    protected $arguments = [
        'date' => 'Optional: "yesterday" or YYYY-MM-DD (defaults to today).',
    ];

    protected $options = [
        '--json' => 'Emit JSON output for AIOps runners',
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

        $json = isset($flags['json']);

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
        $payload = [
            'command' => $this->name,
            'date' => $targetDate,
            'dry_run' => $dryRun,
            'result' => $result,
        ];

        if ($json) {
            CLI::write((string) json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            if ($dryRun) {
                CLI::write("Dry-run: would write summary to {$result['out_file']}", 'yellow');
                CLI::write("Dry-run: would update state to {$result['state_file']}", 'yellow');
                CLI::write("Dry-run: would sync summary to {$result['repo_file']}", 'yellow');
            } else {
                CLI::write("Summary generated for {$targetDate}: {$result['out_file']}", 'green');
                CLI::write('Repo summary: ' . ($result['repo_file'] ?? 'n/a'), 'green');
                CLI::write('Repo sync changed=' . (($result['repo_changed'] ?? false) ? 'yes' : 'no'));
                if (! empty($result['max_ts'])) {
                    CLI::write('Last processed timestamp updated to: ' . $result['max_ts'], 'yellow');
                }
            }

            CLI::write('total_entries=' . ($result['total'] ?? 0));
            CLI::write('new_entries=' . ($result['new_total'] ?? 0));
        }

        log_message('info', '[spark:logs:summarize] Completed', [
            'date'      => $targetDate,
            'total'     => $result['total'] ?? 0,
            'new_total' => $result['new_total'] ?? 0,
            'dry_run'   => $dryRun,
            'repo_file' => $result['repo_file'] ?? null,
            'repo_changed' => $result['repo_changed'] ?? false,
        ]);

        $total = (int) ($result['total'] ?? 0);
        $new   = (int) ($result['new_total'] ?? 0);

        if ($total === 0 && $new === 0) {
            CLI::write('✔ Logs are clean. No errors or warnings found.', 'green');
        } else {
            CLI::write("⚠ Log summary: total={$total}, new={$new}", 'yellow');
        }

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
