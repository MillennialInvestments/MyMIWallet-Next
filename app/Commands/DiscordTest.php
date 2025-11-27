<?php namespace App\Commands;

use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class DiscordTest extends BaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:test';
    protected $description = 'Send a test payload through the Discord queue pipeline.';

    public function run(array $params)
    {
        $channelKey = $params[0] ?? 'staging';
        $message    = $params[1] ?? 'MyMI Discord test message';

        CLI::write("Queueing test message to '{$channelKey}' ...", 'yellow');

        $discord = new MyMIDiscord();
        $queued  = $discord->enqueuePlain($channelKey, $message, ['priority' => 1]);

        if (!$queued) {
            CLI::write('Failed to enqueue (sanitization drop or configuration missing).', 'red');
            return;
        }

        $stats = $discord->processQueue(5);

        CLI::write('--- Dispatch Results ---', 'green');
        CLI::write('Sent   : ' . ($stats['sent'] ?? 0));
        CLI::write('Skipped: ' . ($stats['skipped'] ?? 0));
        CLI::write('Failed : ' . ($stats['failed'] ?? 0));
    }
}