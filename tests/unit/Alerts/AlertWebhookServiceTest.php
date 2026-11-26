<?php

declare(strict_types=1);

namespace Tests\Unit\Alerts;

use App\Services\Alerts\AlertWebhookService;
use CodeIgniter\Test\CIUnitTestCase;

final class AlertWebhookServiceTest extends CIUnitTestCase
{
    private AlertWebhookService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AlertWebhookService();
    }

    public function testParseTradingViewJsonPayload(): void
    {
        $raw = json_encode([
            'ticker'       => 'AAPL',
            'action'       => 'BUY',
            'price'        => 225.50,
            'strategy'     => 'EMA 21/50 Cross',
            'timeframe'    => '15m',
            'stop_loss'    => 220.00,
            'target_price' => 235.00,
            'message'      => 'Bullish breakout on volume',
        ]);

        $parsed = $this->service->parsePayload($raw, [], 'tradingview');

        $this->assertSame('AAPL', $parsed['ticker']);
        $this->assertSame('BUY', $parsed['action']);
        $this->assertSame(225.50, (float) $parsed['price']);
        $this->assertSame('EMA 21/50 Cross', $parsed['strategy']);
        $this->assertSame('15m', $parsed['timeframe']);
        $this->assertSame(220.00, (float) $parsed['stop_loss']);
        $this->assertSame(235.00, (float) $parsed['target_price']);
    }

    public function testParseTrendSpiderAlternativeKeys(): void
    {
        $raw = json_encode([
            'symbol'    => 'NVDA',
            'direction' => 'LONG',
            'close'     => 145.25,
            'indicator' => 'SuperTrend Bullish',
            'sl'        => 140.00,
            'tp'        => 155.00,
            'provider'  => 'trendspider',
        ]);

        $parsed = $this->service->parsePayload($raw, []);

        $this->assertSame('NVDA', $parsed['ticker']);
        $this->assertSame('BUY', $parsed['action']);
        $this->assertSame(145.25, (float) $parsed['price']);
        $this->assertSame('SuperTrend Bullish', $parsed['strategy']);
        $this->assertSame('trendspider', $parsed['provider']);
    }

    public function testExtractTickerFromPlainText(): void
    {
        $raw = "Alert: BUY \$TSLA at 240.50\nStop: 235.00\nTarget: 255.00";
        $parsed = $this->service->parsePayload($raw, []);

        $this->assertSame('TSLA', $parsed['ticker']);
        $this->assertSame('BUY', $parsed['action']);
    }

    public function testOptionsDirectionMapping(): void
    {
        $rawCall = json_encode(['symbol' => 'SPY', 'signal' => 'BULLISH CALL 590']);
        $parsedCall = $this->service->parsePayload($rawCall, []);
        $this->assertSame('SPY', $parsedCall['ticker']);
        $this->assertSame('CALL', $parsedCall['action']);

        $rawPut = json_encode(['symbol' => 'QQQ', 'signal' => 'BEARISH PUT 500']);
        $parsedPut = $this->service->parsePayload($rawPut, []);
        $this->assertSame('QQQ', $parsedPut['ticker']);
        $this->assertSame('PUT', $parsedPut['action']);
    }
}
