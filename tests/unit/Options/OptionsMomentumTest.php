<?php

declare(strict_types=1);

namespace Tests\Unit\Options;

use App\Models\Options\OptionsExitAlertModel;
use App\Models\Options\OptionsPositionHistoryModel;
use App\Models\Options\OptionsPositionLegModel;
use App\Models\Options\OptionsPositionModel;
use App\Models\Options\OptionsSignalEventModel;
use App\Services\Options\OptionsMomentumManager;
use App\Services\Options\OptionsScannerEngine;
use App\Services\Options\TradingViewWebhookService;
use CodeIgniter\Test\CIUnitTestCase;

final class OptionsMomentumTest extends CIUnitTestCase
{
    /**
     * Test the two-sided options scanner calculations, displacement efficiency, and reachability.
     */
    public function testOptionsScannerCalculatesReachabilityAndRanksCandidates(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA', 'TSLA', 'SPY'],
            'target_profit' => 200.0,
            'call_debit' => 0.95,
            'put_debit' => 0.95,
            'dte' => 5,
            'min_rvol' => 0.5,
            'dry_run' => true,
        ]);

        $this->assertSame(3, $result['scanned_count']);
        $this->assertNotEmpty($result['all_results']);

        foreach ($result['all_results'] as $candidate) {
            $this->assertSame('long_strangle', $candidate['strategy']);
            $this->assertEqualsWithDelta(1.90, (float) $candidate['combined_debit'], 0.001);
            $this->assertEqualsWithDelta(200.0, (float) $candidate['target_profit'], 0.001);
            $this->assertEqualsWithDelta(3.90, (float) $candidate['required_exit_value'], 0.001);
            $this->assertGreaterThan(0.0, (float) $candidate['call_strike']);
            $this->assertGreaterThan(0.0, (float) $candidate['put_strike']);
            $this->assertGreaterThanOrEqual((float) $candidate['stock_price'], (float) $candidate['call_strike']);
            $this->assertLessThanOrEqual((float) $candidate['stock_price'], (float) $candidate['put_strike']);
            $this->assertEqualsWithDelta(100.0, (float) $candidate['call_target_balance'], 0.001);
            $this->assertEqualsWithDelta(100.0, (float) $candidate['put_target_balance'], 0.001);
            $this->assertEqualsWithDelta(200.0, (float) $candidate['total_target_balance'], 0.001);
            $this->assertGreaterThan(0.0, (float) $candidate['atr_14']);
            $this->assertGreaterThan(0.0, (float) $candidate['historical_5d_range']);
            $this->assertGreaterThan(0.0, (float) $candidate['reachability_score']);
            $this->assertGreaterThan(0.0, (float) $candidate['ranking_score']);
            $this->assertGreaterThan(0.0, (float) $candidate['price_displacement_efficiency']);
        }
    }

    /**
     * Test scanner with explicit Call/Put strikes and custom target balance settings.
     */
    public function testOptionsScannerWithExplicitStrikesAndTargetBalances(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'call_strike' => 145.0,
            'put_strike' => 140.0,
            'call_target_balance' => 100.0,
            'put_target_balance' => 100.0,
            'call_debit' => 0.95,
            'put_debit' => 0.95,
            'target_profit' => 200.0,
            'dry_run' => true,
        ]);

        $this->assertSame(1, $result['scanned_count']);
        $candidate = $result['all_results'][0];

        $this->assertEqualsWithDelta(145.0, (float) $candidate['call_strike'], 0.001);
        $this->assertEqualsWithDelta(140.0, (float) $candidate['put_strike'], 0.001);
        $this->assertEqualsWithDelta(100.0, (float) $candidate['call_target_balance'], 0.001);
        $this->assertEqualsWithDelta(100.0, (float) $candidate['put_target_balance'], 0.001);
        $this->assertEqualsWithDelta(200.0, (float) $candidate['total_target_balance'], 0.001);
        $this->assertSame(1, $candidate['contracts_call']);
        $this->assertSame(1, $candidate['contracts_put']);
    }

    /**
     * Test straddle economics and exit target math ($0.95 call + $0.95 put).
     */
    public function testStraddleEconomicsMath(): void
    {
        $callDebit = 0.95;
        $putDebit = 0.95;
        $contracts = 1;
        $targetProfit = 200.0;

        $combinedDebit = $callDebit + $putDebit; // $1.90 per share
        $totalCost = $combinedDebit * 100 * $contracts; // $190.00
        $requiredExitValue = $combinedDebit + ($targetProfit / (100 * $contracts)); // $3.90 per share
        $totalExitValue = $requiredExitValue * 100 * $contracts; // $390.00

        $this->assertEqualsWithDelta(1.90, $combinedDebit, 0.0001);
        $this->assertEqualsWithDelta(190.00, $totalCost, 0.0001);
        $this->assertEqualsWithDelta(3.90, $requiredExitValue, 0.0001);
        $this->assertEqualsWithDelta(390.00, $totalExitValue, 0.0001);
        $this->assertEqualsWithDelta(200.00, $totalExitValue - $totalCost, 0.0001);
    }

    /**
     * Test simulated position creation with $100 target balance per leg and explicit strikes.
     */
    public function testOpenSimulatedPositionWithTargetBalanceAndStrikes(): void
    {
        $positionModel = $this->createMock(OptionsPositionModel::class);
        $legModel = $this->createMock(OptionsPositionLegModel::class);
        $historyModel = $this->createMock(OptionsPositionHistoryModel::class);
        $exitAlertModel = $this->createMock(OptionsExitAlertModel::class);

        $positionModel->expects($this->once())
            ->method('insert')
            ->with($this->callback(function (array $data) {
                return $data['ticker'] === 'NVDA'
                    && (float) $data['call_strike'] === 145.0
                    && (float) $data['put_strike'] === 140.0
                    && (float) $data['total_entry_debit'] === 190.0;
            }))
            ->willReturn(1);

        $legModel->expects($this->exactly(2))
            ->method('insert')
            ->willReturn(1);

        $historyModel->expects($this->once())
            ->method('insert')
            ->willReturn(1);

        $manager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel);

        $res = $manager->openSimulatedPosition(
            ticker: 'NVDA',
            callDebit: 0.95,
            putDebit: 0.95,
            stockPrice: 142.50,
            callStrike: 145.0,
            putStrike: 140.0,
            callTargetBalance: 100.0,
            putTargetBalance: 100.0
        );

        $this->assertSame(1, $res['position_id']);
        $this->assertSame(145.0, $res['call_strike']);
        $this->assertSame(140.0, $res['put_strike']);
        $this->assertSame(1, $res['contracts_call']);
        $this->assertSame(1, $res['contracts_put']);
        $this->assertEqualsWithDelta(190.0, $res['total_debit'], 0.001);
    }

    /**
     * Test that momentum manager detects target reached when combined bid >= $3.90.
     */
    public function testMomentumManagerDetectsTargetReached(): void
    {
        $positionModel = $this->createMock(OptionsPositionModel::class);
        $legModel = $this->createMock(OptionsPositionLegModel::class);
        $historyModel = $this->createMock(OptionsPositionHistoryModel::class);
        $exitAlertModel = $this->createMock(OptionsExitAlertModel::class);

        $legModel->method('getLegsForPosition')->willReturn([
            ['leg_type' => 'call', 'current_bid' => 3.20, 'fill_price' => 0.95],
            ['leg_type' => 'put',  'current_bid' => 0.75, 'fill_price' => 0.95], // Combined: $3.95 (Hit $3.90 target)
        ]);

        $exitAlertModel->expects($this->once())
            ->method('insert')
            ->with($this->callback(function (array $data) {
                return $data['alert_type'] === 'profit_target_reached'
                    && $data['recommended_action'] === 'take_profit'
                    && $data['current_profit'] >= 200.0;
            }))
            ->willReturn(101);

        $positionModel->expects($this->once())
            ->method('update')
            ->with(1, $this->callback(function (array $data) {
                return $data['status'] === 'target_reached';
            }));

        $manager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel, null);

        $eval = $manager->evaluatePosition([
            'id' => 1,
            'ticker' => 'NVDA',
            'strategy' => 'long_straddle',
            'contracts_count' => 1,
            'total_entry_debit' => 190.0,
            'target_net_profit' => 200.0,
            'target_combined_exit' => 3.90,
            'peak_unrealized_pnl' => 0.0,
            'status' => 'open',
            'entry_stock_price' => 143.0,
            'expiry' => date('Y-m-d', strtotime('+4 days')),
        ]);

        $this->assertSame('target_reached', $eval['status']);
        $this->assertEqualsWithDelta(3.95, $eval['combined_bid'], 0.001);
        $this->assertEqualsWithDelta(205.00, $eval['unrealized_pnl'], 0.001);
        $this->assertCount(1, $eval['alerts']);
        $this->assertSame('profit_target_reached', $eval['alerts'][0]['type']);
    }

    /**
     * Test peak-profit trailing warning when unrealized profit retraces > 30% from peak.
     */
    public function testMomentumManagerDetectsPeakProfitRetraceWarning(): void
    {
        $positionModel = $this->createMock(OptionsPositionModel::class);
        $legModel = $this->createMock(OptionsPositionLegModel::class);
        $historyModel = $this->createMock(OptionsPositionHistoryModel::class);
        $exitAlertModel = $this->createMock(OptionsExitAlertModel::class);

        // Peak was $150, now dropped to $80 (Retrace > 30%)
        $legModel->method('getLegsForPosition')->willReturn([
            ['leg_type' => 'call', 'current_bid' => 2.20, 'fill_price' => 0.95],
            ['leg_type' => 'put',  'current_bid' => 0.50, 'fill_price' => 0.95], // Combined: $2.70 ($270 value - $190 = +$80 profit)
        ]);

        $exitAlertModel->expects($this->once())
            ->method('insert')
            ->with($this->callback(function (array $data) {
                return $data['alert_type'] === 'peak_profit_trailing'
                    && $data['recommended_action'] === 'tighten_stop';
            }))
            ->willReturn(102);

        $manager = new OptionsMomentumManager($positionModel, $legModel, $historyModel, $exitAlertModel, null);

        $eval = $manager->evaluatePosition([
            'id' => 2,
            'ticker' => 'TSLA',
            'strategy' => 'long_straddle',
            'contracts_count' => 1,
            'total_entry_debit' => 190.0,
            'target_net_profit' => 200.0,
            'target_combined_exit' => 3.90,
            'peak_unrealized_pnl' => 150.0, // High-water mark was +$150
            'status' => 'open',
            'entry_stock_price' => 220.0,
            'expiry' => date('Y-m-d', strtotime('+3 days')),
        ]);

        $this->assertSame('warning_trailing', $eval['status']);
        $this->assertEqualsWithDelta(80.00, $eval['unrealized_pnl'], 0.001);
        $this->assertCount(1, $eval['alerts']);
        $this->assertSame('peak_profit_trailing', $eval['alerts'][0]['type']);
    }

    /**
     * Test webhook idempotency deduplication.
     */
    public function testWebhookIdempotencyDeduplication(): void
    {
        $signalModel = $this->createMock(OptionsSignalEventModel::class);
        $positionModel = $this->createMock(OptionsPositionModel::class);
        $momentumManager = $this->createMock(OptionsMomentumManager::class);

        $signalModel->expects($this->once())
            ->method('isDuplicate')
            ->willReturn(true);

        $service = new TradingViewWebhookService($signalModel, $positionModel, $momentumManager);

        $payload = [
            'ticker' => 'NVDA',
            'signal' => 'momentum_weakening',
            'timeframe' => '5m',
            'price' => 144.20,
            'timestamp' => '2026-10-26 14:00:00',
        ];

        $resp = $service->ingest($payload);
        $this->assertSame('deduplicated', $resp['status']);
        $this->assertArrayHasKey('hash', $resp);
    }

    /**
     * Test scanner when ATM straddle strategy is explicitly requested.
     */
    public function testOptionsScannerWithStraddleStrategy(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'strategy' => 'straddle',
            'dry_run' => true,
        ]);

        $this->assertSame(1, $result['scanned_count']);
        $candidate = $result['all_results'][0];

        $this->assertSame('long_straddle', $candidate['strategy']);
        $this->assertEqualsWithDelta($candidate['call_strike'], $candidate['put_strike'], 0.001);
    }

    /**
     * Test the user's specific scenario: Stock at $200, Put strike $150, Call strike $210 at $100 target balance each.
     */
    public function testUserScenarioStrangleWithSpecificStrikesAndTargetBalance(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'strategy' => 'strangle',
            'call_strike' => 210.0,
            'put_strike' => 150.0,
            'call_target_balance' => 100.0,
            'put_target_balance' => 100.0,
            'call_debit' => 0.95,
            'put_debit' => 0.95,
            'target_profit' => 200.0,
            'dry_run' => true,
        ]);

        $this->assertSame(1, $result['scanned_count']);
        $candidate = $result['all_results'][0];

        $this->assertSame('long_strangle', $candidate['strategy']);
        $this->assertSame(210.0, (float) $candidate['call_strike']);
        $this->assertSame(150.0, (float) $candidate['put_strike']);
        $this->assertSame(100.0, (float) $candidate['call_target_balance']);
        $this->assertSame(100.0, (float) $candidate['put_target_balance']);
        $this->assertSame(200.0, (float) $candidate['total_target_balance']);
        $this->assertSame(1, $candidate['contracts_call']);
        $this->assertSame(1, $candidate['contracts_put']);
    }

    /**
     * Test AlphaVantage catalyst service parses news sentiment and detects earnings catalyst.
     */
    public function testAlphaVantageCatalystServiceParsesPayloadAndComputesBoost(): void
    {
        $mockHttp = new class {
            public function get(string $url): string {
                return json_encode([
                    'items' => '5',
                    'feed' => [
                        [
                            'title' => 'NVIDIA Reports Record Q3 Earnings and Data Center Revenue Growth',
                            'summary' => 'NVIDIA quarterly results exceeded consensus expectations with strong AI momentum.',
                            'url' => 'https://example.com/nvda-earnings',
                            'time_published' => '20261026T120000',
                            'overall_sentiment_score' => 0.45,
                            'overall_sentiment_label' => 'Bullish',
                            'ticker_sentiment' => [
                                [
                                    'ticker' => 'NVDA',
                                    'relevance_score' => '0.90',
                                    'ticker_sentiment_score' => '0.52',
                                    'ticker_sentiment_label' => 'Bullish',
                                ],
                            ],
                        ],
                    ],
                ]);
            }
        };

        $service = new \App\Services\Options\AlphaVantageCatalystService('test-key', $mockHttp);
        $catalyst = $service->getTickerCatalyst('NVDA', false);

        $this->assertTrue($catalyst['available']);
        $this->assertSame('NVDA', $catalyst['ticker']);
        $this->assertTrue($catalyst['catalyst_detected']);
        $this->assertSame('earnings_report', $catalyst['catalyst_type']);
        $this->assertSame('Bullish', $catalyst['sentiment_label']);
        $this->assertGreaterThan(0.30, $catalyst['sentiment_score']);
        $this->assertGreaterThan(5.0, $catalyst['catalyst_momentum_boost']);
        $this->assertStringContainsString('NVIDIA Reports Record', $catalyst['top_headline']);
    }

    /**
     * Test AlphaVantage catalyst service returns graceful neutral fallback when key is missing.
     */
    public function testAlphaVantageCatalystServiceGracefulFallbackWhenNoKey(): void
    {
        \App\Services\Options\AlphaVantageCatalystService::clearCache();
        $service = new \App\Services\Options\AlphaVantageCatalystService('');
        $catalyst = $service->getTickerCatalyst('TSLA', false);

        $this->assertFalse($catalyst['available']);
        $this->assertSame('Neutral', $catalyst['sentiment_label']);
        $this->assertSame(0.0, (float) $catalyst['sentiment_score']);
        $this->assertFalse($catalyst['catalyst_detected']);
        $this->assertSame(0.0, (float) $catalyst['catalyst_momentum_boost']);
    }

    /**
     * Test options scanner integrates AlphaVantage catalyst boost into candidate ranking.
     */
    public function testOptionsScannerIntegratesCatalystServiceBoost(): void
    {
        $mockHttp = new class {
            public function get(string $url): string {
                return json_encode([
                    'feed' => [
                        [
                            'title' => 'AMD Announces Breakthrough AI GPU Partnership and Deal',
                            'summary' => 'Major multi-billion cloud contract partnership announced.',
                            'overall_sentiment_score' => 0.40,
                            'ticker_sentiment' => [
                                ['ticker' => 'AMD', 'relevance_score' => '0.85', 'ticker_sentiment_score' => '0.45'],
                            ],
                        ],
                    ],
                ]);
            }
        };

        $catalystSvc = new \App\Services\Options\AlphaVantageCatalystService('key-123', $mockHttp);
        $scanner = new \App\Services\Options\OptionsScannerEngine(null, null, $catalystSvc);

        $res = $scanner->scan([
            'universe' => ['AMD'],
            'strategy' => 'strangle',
            'dry_run' => true,
        ]);

        $this->assertSame(1, $res['scanned_count']);
        $candidate = $res['all_results'][0];

        $this->assertTrue($candidate['news_catalyst_detected']);
        $this->assertSame('deal_ma', $candidate['news_catalyst_type']);
        $this->assertGreaterThan(0.0, (float) $candidate['news_catalyst_boost']);
    }

    public function testBrentTwoStrikesOtmStrangleSelectionForBoeing(): void
    {
        $scanner = new \App\Services\Options\OptionsScannerEngine();

        // Boeing at $187.53 should automatically select $192.50 Call and $182.50 Put (2 strikes OTM on $2.50 step)
        $res = $scanner->scan([
            'universe' => ['BA'],
            'strategy' => 'strangle',
            'dry_run' => true,
        ]);

        $this->assertSame(1, $res['scanned_count']);
        $candidate = $res['all_results'][0];

        $this->assertSame('BA', $candidate['ticker']);
        $this->assertSame(192.5, (float) $candidate['call_strike']);
        $this->assertSame(182.5, (float) $candidate['put_strike']);
        $this->assertSame('long_strangle', $candidate['strategy']);
        $this->assertSame(100.0, (float) $candidate['call_target_balance']);
        $this->assertSame(100.0, (float) $candidate['put_target_balance']);
    }
}
