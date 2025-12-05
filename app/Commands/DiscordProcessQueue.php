<?php namespace App\Commands;

use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DiscordProcessQueue extends BaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:process-queue';
    protected $description = 'Process queued Discord messages respecting quiet hours and pacing.';
    protected $usage       = 'php spark discord:process-queue [limit]';

    public function run(array $params)
    {
        $limit = (int)($params[0] ?? CLI::getOption('limit') ?? 25);
        if ($limit <= 0) {
            $limit = 25;
        }

        CLI::write("Processing up to {$limit} queued messages...", 'yellow');
        $discord = new MyMIDiscord();
        $stats   = $discord->processQueue($limit);

        $summary = sprintf('Sent: %d | Skipped: %d | Failed: %d', $stats['sent'] ?? 0, $stats['skipped'] ?? 0, $stats['failed'] ?? 0);
        CLI::write($summary, 'green');

        log_message('info', 'discord:process-queue completed', [
            'limit'   => $limit,
            'summary' => $summary,
            'stats'   => $stats,
        ]);
    }
}
