<?php

namespace App\Commands\Logs;

use App\Services\Spark\LogSummarizeService;
use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class Summarize extends SafeBaseCommand
{
    protected $group       = 'logs';
    protected $name        = 'logs:summarize';
    protected $description = 'Summarize CI4 logs for a given date, including new entries since the last run.';
    protected $usage       = 'logs:summarize [date|yesterday] [--dry-run] [--pr=1]';

    protected $defaultDryRun = true;

    protected $arguments = [
        'date' => 'Optional: "yesterday" or YYYY-MM-DD (defaults to today).',
    ];

    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--pr'      => 'Enable PR bundle generation (requires --dry-run=0)',
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
        $dryRun = $this->normalizeDryRunOption($params, $dryRun);
        $createPr = $this->resolvePrFlag($params, $flags);

        if ($createPr && $dryRun) {
            CLI::error('PR generation requires --dry-run=0');
            return EXIT_ERROR;
        }

        // -----------------------------
        // Execute service
        // -----------------------------
        $service = new LogSummarizeService();
        $rangeEnd = $this->resolveRangeEnd($args[0] ?? null);
        $result  = $service->summarizeForDate($targetDate, $dryRun, $createPr, $rangeEnd);

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
            CLI::write('Dry-run: would write summary artifacts', 'yellow');
        } else {
            CLI::write("Summary generated for {$targetDate}: {$result['summary_path']}", 'green');
        }

        CLI::write('total_entries=' . ($result['total_entries'] ?? 0));
        CLI::write('deduped_entries=' . ($result['deduped'] ?? 0));

        log_message('info', '[spark:logs:summarize] Completed', [
            'date'      => $targetDate,
            'total'     => $result['total_entries'] ?? 0,
            'new_total' => $result['deduped'] ?? 0,
            'dry_run'   => $dryRun,
        ]);

        $total = (int) ($result['total_entries'] ?? 0);
        $new   = (int) ($result['deduped'] ?? 0);

        if ($total === 0 && $new === 0) {
            CLI::write('✔ Logs are clean. No errors or warnings found.', 'green');
        } else {
            CLI::write("⚠ Log summary: total={$total}, deduped={$new}", 'yellow');
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

    private function resolvePrFlag(array $params, array $flags): bool
    {
        $value = ArtifactHelper::parseOptionValue($params, 'pr');
        if ($value !== null) {
            return in_array(strtolower($value), ['1', 'true', 'yes'], true);
        }

        return isset($flags['pr']);
    }

    private function normalizeDryRunOption(array $params, bool $current): bool
    {
        $value = ArtifactHelper::parseOptionValue($params, 'dry-run');
        if ($value === null) {
            return $current;
        }

        $normalized = strtolower(trim($value));
        if (in_array($normalized, ['0', 'false', 'no'], true)) {
            return false;
        }

        if (in_array($normalized, ['1', 'true', 'yes'], true)) {
            return true;
        }

        return $current;
    }

    private function resolveRangeEnd(?string $arg): ?\DateTimeImmutable
    {
        if ($arg === null || $arg === 'yesterday') {
            return null;
        }

        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $arg)) {
            $timezone = new \DateTimeZone(config('App')->appTimezone ?? 'UTC');
            return new \DateTimeImmutable($arg . ' 23:59:59', $timezone);
        }

        return null;
    }
}
