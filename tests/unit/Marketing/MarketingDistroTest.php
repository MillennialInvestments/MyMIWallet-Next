<?php

declare(strict_types=1);

namespace Tests\Unit\Marketing;

use App\Services\Marketing\ContentDistroEngine;
use App\Services\Marketing\MultiMailboxIntakeService;
use App\Services\Marketing\VoiceoverService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Database;

/**
 * @internal
 */
final class MarketingDistroTest extends CIUnitTestCase
{
    private VoiceoverService $voiceoverService;
    private MultiMailboxIntakeService $intakeService;
    private ContentDistroEngine $distroEngine;

    protected function setUp(): void
    {
        parent::setUp();
        $this->voiceoverService = new VoiceoverService();
        $this->setupTestDatabaseTables();
        $this->intakeService = new MultiMailboxIntakeService();
        $this->distroEngine = new ContentDistroEngine();
    }

    private function setupTestDatabaseTables(): void
    {
        $db = Database::connect();
        
        $db->query("CREATE TABLE IF NOT EXISTS bf_marketing_temp_scraper (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT,
            content TEXT,
            status VARCHAR(32) DEFAULT 'pending',
            processed INTEGER DEFAULT 0,
            type VARCHAR(64) DEFAULT 'trade_alert',
            source_type VARCHAR(64) DEFAULT 'email_alert',
            ticker VARCHAR(32),
            company_name VARCHAR(128),
            date_scraped DATETIME,
            metadata TEXT
        )");

        $db->query("CREATE TABLE IF NOT EXISTS bf_marketing_generated_content (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            source_type VARCHAR(64),
            source_id INTEGER,
            title TEXT,
            content_json TEXT,
            status VARCHAR(32) DEFAULT 'completed',
            approval_status VARCHAR(32) DEFAULT 'pending_review',
            distribution_status VARCHAR(32) DEFAULT 'ready',
            version INTEGER DEFAULT 1,
            created_at DATETIME,
            updated_at DATETIME
        )");

        $db->query("CREATE TABLE IF NOT EXISTS bf_marketing_video_content (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            source_type VARCHAR(64),
            source_id INTEGER,
            platform VARCHAR(32) DEFAULT 'tiktok',
            video_type VARCHAR(64),
            symbol VARCHAR(32),
            title TEXT,
            hook TEXT,
            intro_text TEXT,
            body_text TEXT,
            cta_text TEXT,
            caption TEXT,
            hashtags TEXT,
            voiceover_script TEXT,
            overlay_text_json TEXT,
            scene_plan_json TEXT,
            duration_target VARCHAR(32),
            status VARCHAR(32) DEFAULT 'Generated',
            created_at DATETIME,
            updated_at DATETIME
        )");

        $db->query("CREATE TABLE IF NOT EXISTS bf_marketing_video_assets (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            video_content_id INTEGER,
            asset_type VARCHAR(64),
            asset_path VARCHAR(255),
            asset_url VARCHAR(255),
            asset_label VARCHAR(255),
            sort_order INTEGER DEFAULT 0,
            created_at DATETIME,
            updated_at DATETIME
        )");

        $db->query("CREATE TABLE IF NOT EXISTS bf_marketing_distribution_log (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            generated_content_id INTEGER,
            platform VARCHAR(64),
            status VARCHAR(32),
            response_payload TEXT,
            error_message TEXT,
            attempted_at DATETIME
        )");

        $db->query("CREATE TABLE IF NOT EXISTS bf_email_outbox (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            to_email VARCHAR(255),
            subject VARCHAR(255),
            body TEXT,
            type VARCHAR(64),
            status VARCHAR(32) DEFAULT 'pending',
            error_message TEXT,
            provider VARCHAR(64) DEFAULT 'smtp',
            meta_json TEXT,
            created_at DATETIME,
            sent_at DATETIME
        )");
    }

    public function testVoiceoverServiceGeneratesValidMp3(): void
    {
        $script = "Boeing weekly options alert. Testing synthetic narration for MyMI Wallet.";
        $res = $this->voiceoverService->generate($script, 'test_unit_vo');

        $this->assertTrue($res['success']);
        $this->assertNotNull($res['file_path']);
        $this->assertFileExists($res['file_path']);
        $this->assertGreaterThan(5000, $res['size_bytes']);
        $this->assertGreaterThan(0.5, $res['duration_est']);
        $this->assertStringContainsString('.mp3', (string) $res['file_url']);
    }

    public function testVoiceoverEmptyScriptFailsGracefully(): void
    {
        $res = $this->voiceoverService->generate("");
        $this->assertFalse($res['success']);
        $this->assertStringContainsString('empty', strtolower((string) $res['error']));
    }

    public function testParseEmailContentExtractsTradeAlertFields(): void
    {
        $subject = "🚨 Trade Alert: \$BA STRANGLE (192.50C / 182.50P)";
        $body = "Underlier price: \$187.53\nTarget profit: +\$200.00\nCatalyst: Delta expansion drives aerospace momentum.";

        $parsed = $this->intakeService->parseEmailContent($subject, $body, 'trade_alert');

        $this->assertSame('BA', $parsed['ticker']);
        $this->assertSame('STRANGLE', $parsed['strategy']);
        $this->assertEquals(192.50, $parsed['call_strike']);
        $this->assertEquals(182.50, $parsed['put_strike']);
        $this->assertEquals(187.53, $parsed['underlier_price']);
        $this->assertEquals(200.00, $parsed['target_profit']);
    }

    public function testInjectTradeAlertStoresRecord(): void
    {
        $res = $this->intakeService->injectTradeAlert([
            'ticker' => 'NVDA',
            'strategy' => 'STRADDLE',
            'underlier_price' => 200.00,
            'call_strike' => 210.00,
            'put_strike' => 150.00,
            'target_profit' => 200.00,
            'headline' => 'NVDA AI Momentum Surge',
        ]);

        $this->assertSame('success', $res['status']);
        $this->assertGreaterThan(0, $res['id']);
        $this->assertSame('NVDA', $res['ticker']);
    }

    public function testContentDistroEngineGeneratesFullPackage(): void
    {
        $package = $this->distroEngine->generatePackage([
            'ticker' => 'BA',
            'type' => 'trade_alert',
            'strategy' => 'STRANGLE',
            'underlier_price' => 187.53,
            'call_strike' => 192.50,
            'put_strike' => 182.50,
            'target_profit' => 200.00,
            'headline' => 'Boeing Weekly Breakout Setup',
            'note' => 'Options volume spikes ahead of aerospace order surge.',
        ]);

        $this->assertSame('success', $package['status']);
        $this->assertGreaterThan(0, $package['generated_content_id']);
        $this->assertSame('BA', $package['ticker']);

        // Video package
        $this->assertNotEmpty($package['video']['hook']);
        $this->assertCount(3, $package['video']['visual_beats']);
        $this->assertNotEmpty($package['video']['narration_script']);

        // Voiceover
        $this->assertTrue($package['voiceover']['success']);
        $this->assertNotNull($package['voiceover']['file_url']);

        // Discord embed
        $this->assertStringContainsString('BA', $package['discord']['title']);
        $this->assertNotEmpty($package['discord']['fields']);

        // Email blast
        $this->assertStringContainsString('BA', $package['email']['subject']);
        $this->assertStringContainsString('html', strtolower($package['email']['html']));

        // n8n payload
        $this->assertSame('mymi_marketing_distro', $package['n8n_payload']['event']);
        $this->assertSame('BA', $package['n8n_payload']['ticker']);
        $this->assertContains('tiktok', $package['n8n_payload']['distribution_targets']);
    }

    public function testDispatchQueuesAndLogsOutputs(): void
    {
        $package = $this->distroEngine->generatePackage([
            'ticker' => 'TSLA',
            'type' => 'trade_alert',
            'strategy' => 'CALL',
            'underlier_price' => 220.00,
            'call_strike' => 230.00,
            'target_profit' => 150.00,
            'headline' => 'Tesla Robotaxi Catalyst Run',
        ]);

        $genId = (int) $package['generated_content_id'];
        $res = $this->distroEngine->dispatch($genId, ['email']);

        $this->assertSame('completed', $res['status']);
        $this->assertTrue($res['destinations']['email']['success']);
        $this->assertGreaterThanOrEqual(1, $res['destinations']['email']['queued_count']);
    }
}
