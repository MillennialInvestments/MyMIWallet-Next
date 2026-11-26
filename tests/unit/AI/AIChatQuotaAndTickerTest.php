<?php

declare(strict_types=1);

namespace Tests\Unit\AI;

use App\Services\AI\AIChatQuotaService;
use App\Services\AI\TickerIntelligenceService;
use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

/**
 * @internal
 */
final class AIChatQuotaAndTickerTest extends CIUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Services::cache()->clean();
    }

    public function testAuthenticatedUserHasUnlimitedQuota(): void
    {
        $service = new AIChatQuotaService(5);
        $result = $service->checkQuota(42, '192.168.1.100');

        $this->assertTrue($result['allowed']);
        $this->assertSame('member', $result['quota_type']);
        $this->assertSame('unlimited', $result['quota_remaining']);

        // Incrementing does not burn member quota
        $this->assertSame(0, $service->incrementQuota(42, '192.168.1.100'));
    }

    public function testGuestUserQuotaIsEnforcedAtLimit(): void
    {
        $service = new AIChatQuotaService(3);
        $ip = '10.0.0.55';

        // 1st request
        $res1 = $service->checkQuota(null, $ip);
        $this->assertTrue($res1['allowed']);
        $this->assertSame(3, $res1['quota_remaining']);
        $service->incrementQuota(null, $ip);

        // 2nd request
        $res2 = $service->checkQuota(null, $ip);
        $this->assertTrue($res2['allowed']);
        $this->assertSame(2, $res2['quota_remaining']);
        $service->incrementQuota(null, $ip);

        // 3rd request
        $res3 = $service->checkQuota(null, $ip);
        $this->assertTrue($res3['allowed']);
        $this->assertSame(1, $res3['quota_remaining']);
        $service->incrementQuota(null, $ip);

        // 4th request -> blocked
        $res4 = $service->checkQuota(null, $ip);
        $this->assertFalse($res4['allowed']);
        $this->assertSame(0, $res4['quota_remaining']);
        $this->assertStringContainsString('limit of 3 questions', $res4['message']);
    }

    public function testTickerExtractorIdentifiesSymbols(): void
    {
        $service = new TickerIntelligenceService();

        $tickers1 = $service->extractTickers('What is your price target for $NVDA and $TSLA today?');
        $this->assertContains('NVDA', $tickers1);
        $this->assertContains('TSLA', $tickers1);

        $tickers2 = $service->extractTickers('Can you analyze BTC/USD and AAPL for me?');
        $this->assertContains('BTC', $tickers2);
        $this->assertContains('AAPL', $tickers2);

        // Common stopwords must NOT be extracted as tickers
        $tickers3 = $service->extractTickers('WHAT CAN I DO WITH MY WALLET TODAY');
        $this->assertEmpty($tickers3);
    }

    public function testTickerIntelligenceSummaryFormatting(): void
    {
        $service = new TickerIntelligenceService();

        $mockIntel = [
            'NVDA' => [
                'symbol'            => 'NVDA',
                'price'             => 142.50,
                'sector'            => 'Semiconductors',
                'has_active_alert'  => true,
                'alert'             => [
                    'direction'    => 'BUY',
                    'entry_price'  => 140.00,
                    'target_price' => 155.00,
                    'stop_loss'    => 135.00,
                ],
                'in_user_watchlist' => true,
            ],
        ];

        $summary = $service->formatContextSummary($mockIntel);

        $this->assertStringContainsString('Ticker NVDA:', $summary);
        $this->assertStringContainsString('Price $142.5', $summary);
        $this->assertStringContainsString('Active Alert: [BUY] Entry: $140 Target: $155 Stop: $135', $summary);
        $this->assertStringContainsString('Member Watchlist', $summary);
    }
}
