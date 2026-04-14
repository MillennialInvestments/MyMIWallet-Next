<?php

declare(strict_types=1);

namespace App\Commands;

use App\Libraries\MyMIDiscord;
use App\Models\DiscordManualMessageModel;
use CodeIgniter\CLI\CLI;

class DiscordCustomSend extends SafeBaseCommand
{
    protected $group = 'Discord';
    protected $name = 'discord:custom:send';
    protected $description = 'Send or queue a custom message to a chosen Discord channel key and audit it.';
    protected $usage = 'php spark discord:custom:send --channel-key=custom_messages --message="hello" [--queue]';
    protected $options = [
        '--channel-key' => 'Target channel key',
        '--message' => 'Message content',
        '--recipient-id' => 'Optional recipient ID',
        '--recipient-email' => 'Optional recipient email',
        '--subject' => 'Optional subject',
        '--priority' => 'Optional priority (default 5)',
        '--queue' => 'Queue instead of immediate send',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $channelKey = trim((string) ($flags['channel-key'] ?? ''));
        $message = trim((string) ($flags['message'] ?? ''));
        if ($channelKey === '' || $message === '') {
            CLI::error('--channel-key and --message are required');
            return EXIT_ERROR;
        }

        $cfg = config('MarketingDistribution');
        $known = array_keys((array) ($cfg->discord['channels'] ?? []));
        if (! in_array($channelKey, $known, true)) {
            CLI::error('Unknown channel key: ' . $channelKey);
            return EXIT_ERROR;
        }

        $priority = max(1, (int) ($flags['priority'] ?? 5));
        $subject = trim((string) ($flags['subject'] ?? 'Custom Message'));
        $isQueue = isset($flags['queue']);
        $discord = new MyMIDiscord();
        $payload = ['content' => "📩 **{$subject}**\n{$message}", 'allowed_mentions' => ['parse' => []]];

        $result = ['success' => false, 'external_message_id' => null, 'error_message' => 'not_sent'];
        if ($isQueue) {
            $ok = $discord->enqueuePlain($channelKey, (string) $payload['content'], ['priority' => $priority]);
            $result = ['success' => $ok, 'external_message_id' => null, 'error_message' => $ok ? null : 'queue_failed'];
        } else {
            $channelId = (string) ($cfg->discord['channels'][$channelKey] ?? '');
            $result = $discord->sendToChannel($channelKey, $payload, $channelId !== '' ? $channelId : null);
        }

        (new DiscordManualMessageModel())->insert([
            'sender_identity' => get_current_user() ?: 'spark-cli',
            'channel_key' => $channelKey,
            'recipient_id' => ($flags['recipient-id'] ?? null) !== null ? (int) $flags['recipient-id'] : null,
            'recipient_email' => ($flags['recipient-email'] ?? null) !== null ? (string) $flags['recipient-email'] : null,
            'subject' => $subject,
            'priority' => $priority,
            'message_payload' => json_encode($payload, JSON_UNESCAPED_SLASHES),
            'send_mode' => $isQueue ? 'queue' : 'send',
            'result_status' => ($result['success'] ?? false) ? 'success' : 'failed',
            'result_message' => (string) ($result['error_message'] ?? ''),
            'external_message_id' => (string) ($result['external_message_id'] ?? ''),
            'created_on' => date('Y-m-d H:i:s'),
        ]);

        CLI::write(json_encode([
            'success' => (bool) ($result['success'] ?? false),
            'channel_key' => $channelKey,
            'external_message_id' => $result['external_message_id'] ?? null,
            'mode' => $isQueue ? 'queue' : 'send',
        ], JSON_PRETTY_PRINT));

        return ($result['success'] ?? false) ? EXIT_SUCCESS : EXIT_ERROR;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
