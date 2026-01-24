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
    protected $usage       = 'logs:summarize [date|yesterday]';
    protected $arguments   = [
        'date' => 'Optional: "yesterday" or YYYY-MM-DD (defaults to today).',
    ];
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--force'   => 'Required for destructive actions',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:logs:summarize] Started');
        CLI::write('Starting logs:summarize', 'yellow');

        $targetDate = $this->resolveTargetDate($params[0] ?? null);
        $dryRun = $this->option('dry-run') !== null || ! $this->option('force');

        $service = new LogSummarizeService();
        $result = $service->summarizeForDate($targetDate, $dryRun);

        if (! $result['ok']) {
            $message = $result['message'] ?? 'Unable to summarize logs.';
            $candidates = $result['candidates'] ?? [];
            if ($candidates !== []) {
                $message .= ' Checked: ' . implode(', ', $candidates);
            }
            CLI::error($message);
            log_message('error', '[spark:logs:summarize] Failed', ['message' => $message]);
            return EXIT_ERROR;
        }

        if ($dryRun) {
            CLI::write("Dry-run: would write summary to {$result['out_file']}", 'yellow');
            CLI::write("Dry-run: would update state to {$result['state_file']}", 'yellow');
        } else {
            CLI::write("Summary generated for {$targetDate}: {$result['out_file']}", 'green');
            if ($result['max_ts'] !== null) {
                CLI::write('Last processed timestamp updated to: ' . $result['max_ts'], 'yellow');
            }
        }

        CLI::write('total_entries=' . $result['total']);
        CLI::write('new_entries=' . $result['new_total']);

        log_message('info', '[spark:logs:summarize] Completed', [
            'date'       => $targetDate,
            'total'      => $result['total'],
            'new_total'  => $result['new_total'],
            'dry_run'    => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

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
