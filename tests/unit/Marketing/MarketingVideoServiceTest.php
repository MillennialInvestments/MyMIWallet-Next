<?php

declare(strict_types=1);

use App\Services\Marketing\MarketingVideoService;
use CodeIgniter\Test\CIUnitTestCase;

final class MarketingVideoServiceTest extends CIUnitTestCase
{
    public function testGenerateVideoContentReturnsExpectedShape(): void
    {
        $service = new MarketingVideoService();
        $payload = $service->generateVideoContent([
            'content_source_type' => 'manual_topic',
            'topic' => 'TSLA delivery surprise',
            'symbol' => 'TSLA',
            'target_platform' => 'tiktok',
            'target_audience' => 'retail traders',
            'tone' => 'bold',
            'cta_objective' => 'drive engagement',
            'duration_target' => '20s',
            'notes' => 'Deliveries beat estimates and traders are watching momentum.',
        ]);

        $this->assertSame('tiktok', $payload['platform']);
        $this->assertNotEmpty($payload['hook']);
        $this->assertNotEmpty($payload['caption']);
        $this->assertNotEmpty($payload['voiceover_script']);
        $this->assertStringContainsString('#', $payload['hashtags']);
        $this->assertJson($payload['scene_plan_json']);
        $this->assertJson($payload['overlay_text_json']);
    }

    public function testGenerateHashtagsIncludesSymbol(): void
    {
        $service = new MarketingVideoService();
        $hashtags = $service->generateHashtags([
            'symbol' => 'AAPL',
            'keywords' => ['earnings', 'iphone'],
            'target_platform' => 'tiktok',
        ]);

        $this->assertContains('#aapl', $hashtags);
        $this->assertContains('#earnings', $hashtags);
    }
}
