<?php

use Config\Discord as DiscordConfig;
use App\Libraries\MyMIDiscord;
use App\Models\DiscordModel;
use CodeIgniter\Test\CIUnitTestCase;

class FakeDiscordModel extends DiscordModel
{
    public array $templates = [];
    public array $channels = [];
    public array $queue = [];
    public array $history = [];
    public array $events = [];
    public array $duplicates = [];

    public function __construct()
    {
        // Intentionally skip parent constructor to avoid DB connections.
    }

    public function getTemplate(string $templateKey): ?array
    {
        return $this->templates[$templateKey] ?? null;
    }

    public function getChannel(string $channelKey): ?array
    {
        return $this->channels[$channelKey] ?? null;
    }

    public function enqueue(string $channelKey, array $payload, int $priority = 5, ?string $dedupeKey = null, ?string $coalesceKey = null): bool
    {
        $id = count($this->queue) + 1;
        $this->queue[] = [
            'id'           => $id,
            'channel_key'  => $channelKey,
            'payload_json' => json_encode($payload),
            'dedupe_hash'  => hash('sha256', $channelKey . json_encode($payload)),
            'dedupe_key'   => $dedupeKey,
            'coalesce_key' => $coalesceKey,
            'priority'     => $priority,
            'status'       => 'queued',
            'available_at' => null,
            'scheduled_at' => date('Y-m-d H:i:s'),
        ];
        return true;
    }

    public function claimBatch(int $limit, \DateTimeInterface $now): array
    {
        return array_slice($this->queue, 0, $limit);
    }

    public function skip(int $id, string $reason): void
    {
        foreach ($this->queue as &$row) {
            if ($row['id'] === $id) {
                $row['status'] = 'failed';
                $row['error']  = $reason;
            }
        }
    }

    public function rescheduleLater(int $id, \DateTimeInterface $at): void
    {
        foreach ($this->queue as &$row) {
            if ($row['id'] === $id) {
                $row['available_at'] = $at->format('Y-m-d H:i:s');
            }
        }
    }

    public function rescheduleAfter(int $id, int $seconds): void
    {
        foreach ($this->queue as &$row) {
            if ($row['id'] === $id) {
                $row['available_at'] = date('Y-m-d H:i:s', time() + $seconds);
            }
        }
    }

    public function isDuplicate(array $queueRow): bool
    {
        return in_array($queueRow['id'], $this->duplicates, true);
    }

    public function markSent(int $id, \DateTimeInterface $now): void
    {
        foreach ($this->queue as &$row) {
            if ($row['id'] === $id) {
                $row['status'] = 'sent';
                $row['sent_at'] = $now->format('Y-m-d H:i:s');
            }
        }
    }

    public function touchLastSent(string $channelKey, \DateTimeInterface $now): void
    {
        if (isset($this->channels[$channelKey])) {
            $this->channels[$channelKey]['last_sent_at'] = $now->format('Y-m-d H:i:s');
        }
    }

    public function backoff(int $id): void
    {
        foreach ($this->queue as &$row) {
            if ($row['id'] === $id) {
                $row['attempts'] = (int)($row['attempts'] ?? 0) + 1;
                $row['status'] = 'dead';
            }
        }
    }

    public function logEvent(string $level, string $message, array $context = []): void
    {
        $this->events[] = compact('level', 'message', 'context');
    }
}

class StubMyMIDiscord extends MyMIDiscord
{
    public array $sentPayloads = [];

    public function __construct(FakeDiscordModel $model, DiscordConfig $cfg)
    {
        $this->model = $model;
        $this->cfg   = $cfg;
        $this->tz    = new \DateTimeZone($cfg->timezone ?? 'UTC');
    }

    protected function coalesceQueue(): void
    {
        // Skip DB-driven coalescing during unit tests.
    }

    protected function deliver(array $chan, array $payload): bool
    {
        $this->sentPayloads[] = ['channel' => $chan, 'payload' => $payload];
        return true;
    }
}

class SendRoutingMyMIDiscord extends MyMIDiscord
{
    public array $calls = [];

    public function __construct(FakeDiscordModel $model, DiscordConfig $cfg)
    {
        $this->model = $model;
        $this->cfg   = $cfg;
        $this->tz    = new \DateTimeZone($cfg->timezone ?? 'UTC');
    }

    protected function postJSONWithResult(string $url, array $body): array
    {
        $this->calls[] = ['method' => 'webhook', 'url' => $url, 'body' => $body];
        return [
            'success' => true,
            'external_message_id' => 'w-1',
            'response_json' => ['id' => 'w-1'],
            'error_message' => null,
        ];
    }

    protected function postBotMessageWithResult(string $channelId, array $body): array
    {
        $this->calls[] = ['method' => 'bot', 'channel_id' => $channelId, 'body' => $body];
        return [
            'success' => true,
            'external_message_id' => 'b-1',
            'response_json' => ['id' => 'b-1'],
            'error_message' => null,
        ];
    }
}

class MyMIDiscordTest extends CIUnitTestCase
{
    public function testRenderTemplateReplacesVariablesAndEmbeds()
    {
        $model = new FakeDiscordModel();
        $model->templates['tpl.test'] = [
            'template_key' => 'tpl.test',
            'content'      => 'Hello {{name}}',
            'embed_json'   => '{"title":"Hi {{name}}"}',
            'is_enabled'   => 1,
        ];

        $cfg = new DiscordConfig();
        $discord = new StubMyMIDiscord($model, $cfg);

        $payload = $discord->renderTemplate('tpl.test', ['name' => 'World']);
        $this->assertSame('Hello World', $payload['content']);
        $this->assertSame('Hi World', $payload['embeds'][0]['title']);
    }

    public function testProcessQueueRespectsQuietHours()
    {
        $model = new FakeDiscordModel();
        $model->channels['alerts.liquidity'] = [
            'channel_key'      => 'alerts.liquidity',
            'is_enabled'       => 1,
            'allow_embeds'     => 1,
            'min_interval_sec' => 0,
            'last_sent_at'     => null,
        ];
        $model->queue = [[
            'id'           => 1,
            'channel_key'  => 'alerts.liquidity',
            'payload_json' => json_encode(['content' => 'hi']),
            'dedupe_hash'  => 'abc',
            'status'       => 'queued',
            'scheduled_at' => date('Y-m-d H:i:s'),
        ]];

        $cfg = new DiscordConfig();
        $cfg->quietHoursStart = '00:00';
        $cfg->quietHoursEnd   = '23:59';
        $discord = new StubMyMIDiscord($model, $cfg);

        $stats = $discord->processQueue(5);
        $this->assertSame(0, $stats['sent']);
        $this->assertSame(1, $stats['skipped']);
        $this->assertNotNull($model->queue[0]['available_at']);
    }

    public function testProcessQueueSendsWhenAllowed()
    {
        $model = new FakeDiscordModel();
        $model->channels['alerts.free'] = [
            'channel_key'      => 'alerts.free',
            'is_enabled'       => 1,
            'allow_embeds'     => 1,
            'min_interval_sec' => 0,
            'last_sent_at'     => date('Y-m-d H:i:s', strtotime('-1 hour')),
        ];
        $model->queue = [[
            'id'           => 1,
            'channel_key'  => 'alerts.free',
            'payload_json' => json_encode(['content' => 'ok']),
            'dedupe_hash'  => 'abc',
            'status'       => 'queued',
            'scheduled_at' => date('Y-m-d H:i:s'),
        ]];

        $cfg = new DiscordConfig();
        $cfg->quietHoursStart = '00:00';
        $cfg->quietHoursEnd   = '00:00';
        $discord = new StubMyMIDiscord($model, $cfg);

        $stats = $discord->processQueue(5);
        $this->assertSame(1, $stats['sent']);
        $this->assertCount(1, $discord->sentPayloads);
        $this->assertSame('alerts.free', $discord->sentPayloads[0]['channel']['channel_key']);
    }

    public function testForcedChannelIdIgnoresDefaultWebhookAndUsesBotApiFallback(): void
    {
        $model = new FakeDiscordModel();
        $model->channels['announcements'] = [
            'channel_key' => 'announcements',
            'webhook_url' => '',
            'channel_id' => '',
        ];

        $cfg = new DiscordConfig();
        $cfg->defaultWebhook = 'https://discord.test/default';
        $cfg->botToken = 'token';
        $discord = new SendRoutingMyMIDiscord($model, $cfg);

        $result = $discord->sendToChannel('announcements', ['content' => 'Activation test'], '999999');

        $this->assertTrue($result['success']);
        $this->assertSame('bot_api', $result['transport']);
        $this->assertCount(1, $discord->calls);
        $this->assertSame('bot', $discord->calls[0]['method']);
        $this->assertSame('999999', $discord->calls[0]['channel_id']);
    }

    public function testForcedChannelIdUsesChannelSpecificWebhookBeforeBotApi(): void
    {
        $model = new FakeDiscordModel();
        $model->channels['announcements'] = [
            'channel_key' => 'announcements',
            'webhook_url' => 'https://discord.test/channel',
            'channel_id' => '',
        ];

        $cfg = new DiscordConfig();
        $cfg->defaultWebhook = 'https://discord.test/default';
        $cfg->botToken = 'token';
        $discord = new SendRoutingMyMIDiscord($model, $cfg);

        $result = $discord->sendToChannel('announcements', ['content' => 'Activation test'], '999999');

        $this->assertTrue($result['success']);
        $this->assertSame('channel_webhook', $result['transport']);
        $this->assertCount(1, $discord->calls);
        $this->assertSame('webhook', $discord->calls[0]['method']);
        $this->assertStringContainsString('/channel', $discord->calls[0]['url']);
    }

    public function testForcedChannelIdFailsClearlyWhenNoChannelWebhookOrBotApi(): void
    {
        $model = new FakeDiscordModel();
        $model->channels['announcements'] = [
            'channel_key' => 'announcements',
            'webhook_url' => '',
            'channel_id' => '',
        ];

        $cfg = new DiscordConfig();
        $cfg->defaultWebhook = 'https://discord.test/default';
        $cfg->botToken = '';
        $discord = new SendRoutingMyMIDiscord($model, $cfg);

        $result = $discord->sendToChannel('announcements', ['content' => 'Activation test'], '999999');

        $this->assertFalse($result['success']);
        $this->assertSame('failed', $result['transport']);
        $this->assertStringContainsString('Forced channel send unavailable', (string) $result['error_message']);
        $this->assertCount(0, $discord->calls);
    }
}
