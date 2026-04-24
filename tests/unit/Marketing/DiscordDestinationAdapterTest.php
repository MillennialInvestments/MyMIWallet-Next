<?php

declare(strict_types=1);

use App\Libraries\MyMIDiscord;
use App\Services\Marketing\Distribution\Adapters\DiscordDestinationAdapter;
use CodeIgniter\Test\CIUnitTestCase;
use Config\MarketingDistribution;

final class DiscordDestinationAdapterTest extends CIUnitTestCase
{
    public function testMalformedWebhookRejected(): void
    {
        $cfg = new MarketingDistribution();
        $adapter = new DiscordDestinationAdapter(new StubDiscordTransport(), $cfg);

        $result = $adapter->send(['destination' => 'community_news'], [
            'summary' => 'hello',
            'webhook_url' => 'http://not-discord.local/webhook',
        ]);

        $this->assertFalse($result->success);
        $this->assertFalse($result->retryable);
        $this->assertSame('config_invalid_webhook', $result->failureClass);
    }
}

class StubDiscordTransport extends MyMIDiscord
{
    public function __construct()
    {
    }

    public function sendToChannel(string $channelKey, array $payload, ?string $forcedChannelId = null): array
    {
        return ['success' => true, 'external_message_id' => 'ok', 'http_status' => 204, 'response_headers' => [], 'response_body' => ''];
    }
}
