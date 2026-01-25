<?php namespace App\Commands;

use App\Libraries\MyMIDiscord;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DiscordProcessQueue extends SafeBaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:process-queue';
    protected $description = 'Process queued Discord messages respecting quiet hours and pacing.';
    protected $usage       = 'php spark discord:process-queue [limit]';
    protected $arguments   = [
        'limit' => 'Optional: max messages to process (default 25).',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without processing the queue',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:discord:process-queue] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $limit = (int) ($args[0] ?? 25);
        if ($limit <= 0) {
            $limit = 25;
        }

        CLI::write("Processing up to {$limit} queued messages...", 'yellow');
        if ($dryRun) {
            CLI::write('Dry-run enabled. Queue will not be processed.', 'yellow');
            log_message('info', '[spark:discord:process-queue] Completed', [
                'limit' => $limit,
                'dry_run' => true,
            ]);
            return EXIT_SUCCESS;
        }

        $discord = new MyMIDiscord();
        $stats   = $discord->processQueue($limit);

        $summary = sprintf('Sent: %d | Skipped: %d | Failed: %d', $stats['sent'] ?? 0, $stats['skipped'] ?? 0, $stats['failed'] ?? 0);
        CLI::write($summary, 'green');

        log_message('info', 'discord:process-queue completed', [
            'limit'   => $limit,
            'summary' => $summary,
            'stats'   => $stats,
        ]);

        log_message('info', '[spark:discord:process-queue] Completed', [
            'limit' => $limit,
            'sent' => $stats['sent'] ?? 0,
            'skipped' => $stats['skipped'] ?? 0,
            'failed' => $stats['failed'] ?? 0,
            'dry_run' => false,
        ]);

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
