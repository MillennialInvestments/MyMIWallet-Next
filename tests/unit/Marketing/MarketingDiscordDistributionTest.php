<?php

declare(strict_types=1);

use App\Libraries\MyMIDiscord;
use App\Models\MarketingDistributionTargetModel;
use App\Models\MarketingModel;
use App\Services\Marketing\Distribution\DiscordMessageBuilder;
use App\Services\MarketingDistributionService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;
use Config\MarketingDistribution;

final class MarketingDiscordDistributionTest extends CIUnitTestCase
{
    private MarketingDistributionService $service;
    private TestDiscordClient $discord;

    protected function setUp(): void
    {
        parent::setUp();
        $db = Database::connect();

        $db->query('CREATE TABLE IF NOT EXISTS bf_marketing_generated_content (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            story_id INTEGER NULL,
            source_type VARCHAR(50) NULL,
            content_type VARCHAR(64) NULL,
            primary_category VARCHAR(64) NULL,
            secondary_tags TEXT NULL,
            approval_status VARCHAR(50) NULL,
            distribution_status VARCHAR(50) NULL,
            status VARCHAR(50) NULL,
            title VARCHAR(255) NULL,
            summary TEXT NULL,
            content_json TEXT NULL,
            keywords TEXT NULL,
            updated_at DATETIME NULL
        )');

        $db->query('CREATE TABLE IF NOT EXISTS bf_marketing_distribution_targets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            generated_content_id INTEGER NOT NULL,
            story_id INTEGER NULL,
            channel VARCHAR(50) NOT NULL,
            destination VARCHAR(100) NOT NULL,
            payload_json TEXT NULL,
            idempotency_key VARCHAR(64) NULL,
            status VARCHAR(50) NOT NULL,
            attempt_count INTEGER DEFAULT 0,
            max_attempts INTEGER DEFAULT 3,
            queued_at DATETIME NULL,
            next_retry_at DATETIME NULL,
            last_attempt_at DATETIME NULL,
            http_status INTEGER NULL,
            failure_class VARCHAR(80) NULL,
            response_excerpt TEXT NULL,
            response_headers TEXT NULL,
            response_body TEXT NULL,
            sent_at DATETIME NULL,
            failed_at DATETIME NULL,
            response_json TEXT NULL,
            external_id VARCHAR(255) NULL,
            external_uri VARCHAR(500) NULL,
            error_message TEXT NULL,
            retry_count INTEGER DEFAULT 0,
            created_on DATETIME NULL,
            modified_on DATETIME NULL,
            UNIQUE(generated_content_id, channel, destination)
        )');

        $db->query('DELETE FROM bf_marketing_distribution_targets');
        $db->query('DELETE FROM bf_marketing_generated_content');

        $cfg = new MarketingDistribution();
        $cfg->enabledDestinations['blog'] = false;
        $cfg->enabledDestinations['in_app'] = false;
        $cfg->enabledDestinations['email'] = false;
        $cfg->enabledDestinations['discord'] = true;
        $cfg->routingRulesBySourceType['default'] = ['discord'];
        $cfg->discord['enabled'] = true;
        $cfg->discord['stream_enabled'] = true;
        $cfg->discord['channels'] = [
            'community_news' => '111',
            'announcements' => '222',
            'mymi_news' => '333',
            'crypto_news' => '444',
            'financial_news' => '555',
            'stock_news' => '666',
        ];

        $this->discord = new TestDiscordClient();
        $this->service = new MarketingDistributionService(
            new MarketingModel(),
            new MarketingDistributionTargetModel(),
            $cfg,
            null,
            null,
            null,
            null,
            $this->discord,
            new DiscordMessageBuilder($cfg),
        );
    }

    public function testChannelMappingAndTargetCreationAndDuplicatePrevention(): void
    {
        $id = $this->seedApprovedContent('crypto_news', ['stock_news']);

        $first = $this->service->ensureTargetsForContentId($id);
        $second = $this->service->ensureTargetsForContentId($id);

        $this->assertSame(2, $first['created']);
        $this->assertSame(2, $second['existing']);

        $targets = (new MarketingDistributionTargetModel())->where('generated_content_id', $id)->findAll();
        $this->assertCount(2, $targets);
        $this->assertSame(['crypto_news', 'stock_news'], array_values(array_unique(array_column($targets, 'destination'))));
        $this->assertSame('discord', $targets[0]['channel']);
    }

    public function testSuccessfulSendHandling(): void
    {
        $id = $this->seedApprovedContent('community_news', []);
        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();

        $this->service->distributeGeneratedContent($record ?: []);

        $target = (new MarketingDistributionTargetModel())->where('generated_content_id', $id)->first();
        $this->assertSame('sent', $target['status']);
        $this->assertSame('msg-123', $target['external_id']);
        $this->assertSame(204, (int) $target['http_status']);
    }

    public function testDiscord403MarkedPermanentAndNotRetriedEndlessly(): void
    {
        $this->discord->forcedHttpStatus = 403;
        $id = $this->seedApprovedContent('financial_news', []);
        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();

        $this->service->distributeGeneratedContent($record ?: []);
        $first = (new MarketingDistributionTargetModel())->where('generated_content_id', $id)->first();
        $this->assertSame('failed_permanent', $first['status']);
        $this->assertSame(1, (int) $first['retry_count']);
        $this->assertSame('discord_permission_denied', $first['failure_class']);

        $this->service->retryFailedTargets($id, 10);
        $second = (new MarketingDistributionTargetModel())->where('generated_content_id', $id)->first();
        $this->assertSame(1, (int) $second['retry_count']);
    }

    public function testDiscord429CreatesRetrySchedule(): void
    {
        $this->discord->forcedHttpStatus = 429;
        $id = $this->seedApprovedContent('financial_news', []);
        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();

        $this->service->distributeGeneratedContent($record ?: []);
        $target = (new MarketingDistributionTargetModel())->where('generated_content_id', $id)->first();
        $this->assertSame('failed_retryable', $target['status']);
        $this->assertSame('discord_rate_limited', $target['failure_class']);
        $this->assertNotEmpty($target['next_retry_at']);
    }

    public function testIdempotencyPreventsDuplicateResend(): void
    {
        $id = $this->seedApprovedContent('community_news', []);
        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();
        $this->service->distributeGeneratedContent($record ?: []);
        $this->service->distributeGeneratedContent($record ?: []);

        $target = (new MarketingDistributionTargetModel())->where('generated_content_id', $id)->first();
        $this->assertSame(1, $this->discord->sendCallCount);
        $this->assertSame('sent', $target['status']);
    }

    public function testActivationAnnouncementBehavior(): void
    {
        $result = $this->service->sendActivationAnnouncement(true);

        $this->assertTrue($result['result']['success']);
        $this->assertStringStartsWith("@everyone\n\n", (string) $this->discord->lastPayload['content']);
        $this->assertSame(['everyone'], $this->discord->lastPayload['allowed_mentions']['parse']);
        $this->assertStringContainsString('#community-news', $this->discord->lastPayload['content']);
    }

    public function testActivationAnnouncementWithoutEveryoneDoesNotMentionEveryone(): void
    {
        $result = $this->service->sendActivationAnnouncement(false);

        $this->assertTrue($result['result']['success']);
        $this->assertStringNotContainsString('@everyone', (string) $this->discord->lastPayload['content']);
        $this->assertSame([], $this->discord->lastPayload['allowed_mentions']['parse']);
    }

    public function testNormalCategoryMessagesNeverIncludeEveryoneByDefault(): void
    {
        $id = $this->seedApprovedContent('community_news', []);
        $record = Database::connect()->table('bf_marketing_generated_content')->where('id', $id)->get()->getRowArray();
        $record['summary'] = 'Routine stream post for @everyone';

        $this->service->distributeGeneratedContent($record ?: []);

        $this->assertStringNotContainsString('@everyone', (string) $this->discord->lastPayload['content']);
    }

    private function seedApprovedContent(string $primaryCategory, array $secondaryTags): int
    {
        Database::connect()->table('bf_marketing_generated_content')->insert([
            'story_id' => 11,
            'source_type' => 'temp_scraper',
            'content_type' => 'generated_summary',
            'primary_category' => $primaryCategory,
            'secondary_tags' => json_encode($secondaryTags),
            'approval_status' => 'approved',
            'distribution_status' => 'pending',
            'status' => 'approved',
            'title' => 'Test headline',
            'summary' => 'Test summary',
            'content_json' => json_encode(['keywords' => ['alpha']]),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return (int) Database::connect()->insertID();
    }
}

class TestDiscordClient extends MyMIDiscord
{
    public ?int $forcedHttpStatus = null;
    public int $sendCallCount = 0;
    /** @var array<string,mixed> */
    public array $lastPayload = [];

    public function __construct()
    {
    }

    public function sendToChannel(string $channelKey, array $payload, ?string $forcedChannelId = null): array
    {
        $this->lastPayload = $payload;
        $this->sendCallCount++;

        if ($this->forcedHttpStatus !== null && $this->forcedHttpStatus >= 400) {
            return [
                'success' => false,
                'external_message_id' => null,
                'response_json' => ['error' => 'forced_failure'],
                'error_message' => 'forced_failure',
                'http_status' => $this->forcedHttpStatus,
                'response_headers' => $this->forcedHttpStatus === 429 ? ['Retry-After' => ['120']] : [],
                'response_body' => 'forced_failure',
            ];
        }

        return [
            'success' => true,
            'external_message_id' => 'msg-123',
            'response_json' => ['id' => 'msg-123', 'channel_key' => $channelKey, 'channel_id' => $forcedChannelId],
            'error_message' => null,
            'http_status' => 204,
            'response_headers' => [],
            'response_body' => '',
        ];
    }
}
