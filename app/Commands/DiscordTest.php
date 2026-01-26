<?php namespace App\Commands;

use App\Libraries\MyMIDiscord;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class DiscordTest extends SafeBaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:test';
    protected $description = 'Send a test payload through the Discord queue pipeline.';
    protected $arguments   = [
        'channel' => 'Optional channel key (default staging).',
        'message' => 'Optional message text.',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without sending Discord alerts',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:discord:test] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $channelKey = $args[0] ?? 'staging';
        $message    = $args[1] ?? 'MyMI Discord test message';

        CLI::write("Queueing test message to '{$channelKey}' ...", 'yellow');

        if ($dryRun) {
            CLI::write('Dry-run enabled. Message will not be enqueued.', 'yellow');
            log_message('info', '[spark:discord:test] Completed', ['dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $discord = new MyMIDiscord();
        $queued  = $discord->enqueuePlain($channelKey, $message, ['priority' => 1]);

        if (!$queued) {
            CLI::write('Failed to enqueue (sanitization drop or configuration missing).', 'red');
            log_message('error', '[spark:discord:test] Failed', ['reason' => 'Discord enqueue failed']);
            return EXIT_ERROR;
        }

        $stats = $discord->processQueue(5);

        CLI::write('--- Dispatch Results ---', 'green');
        CLI::write('Sent   : ' . ($stats['sent'] ?? 0));
        CLI::write('Skipped: ' . ($stats['skipped'] ?? 0));
        CLI::write('Failed : ' . ($stats['failed'] ?? 0));

        log_message('info', '[spark:discord:test] Completed', [
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
