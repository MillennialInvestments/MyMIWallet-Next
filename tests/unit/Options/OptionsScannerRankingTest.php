<?php

declare(strict_types=1);

namespace Tests\Unit\Options;

use App\Services\Options\AlphaVantageCatalystService;
use App\Services\Options\OptionsScannerEngine;
use CodeIgniter\Test\CIUnitTestCase;

final class OptionsScannerRankingTest extends CIUnitTestCase
{
    /**
     * Test the 5-part research ranking calculation and point caps.
     */
    public function testFivePartResearchRankingMathAndCaps(): void
    {
        $scanner = new OptionsScannerEngine(null);

        // Maximum inputs
        $breakdownMax = $scanner->calculate5PartRankingScore([
            'reachability_score' => 100.0,
            'displacement_efficiency' => 1.0,
            'turnover_efficiency' => 0.1,
            'rvol' => 3.0,
            'vol_accel_5m' => 2.5,
            'range_expansion' => 2.5,
            'catalyst_detected' => true,
            'sentiment_score' => 0.9,
            'catalyst_boost' => 5.0,
            'spread_pct' => 0.005,
            'iv_rv_ratio' => 0.8,
            'combined_debit' => 1.00,
            'target_profit' => 250.0,
        ]);

        $this->assertLessThanOrEqual(25.0, $breakdownMax['technical_setup']);
        $this->assertLessThanOrEqual(20.0, $breakdownMax['catalyst_quality']);
        $this->assertLessThanOrEqual(20.0, $breakdownMax['execution_liquidity']);
        $this->assertLessThanOrEqual(25.0, $breakdownMax['risk_reward']);
        $this->assertLessThanOrEqual(10.0, $breakdownMax['capital_suitability']);
        $this->assertLessThanOrEqual(100.0, $breakdownMax['total_score']);
        $this->assertGreaterThanOrEqual(70.0, $breakdownMax['total_score']);

        $expectedSum = round(
            $breakdownMax['technical_setup'] +
            $breakdownMax['catalyst_quality'] +
            $breakdownMax['execution_liquidity'] +
            $breakdownMax['risk_reward'] +
            $breakdownMax['capital_suitability'],
            2
        );
        $this->assertEqualsWithDelta($expectedSum, $breakdownMax['total_score'], 0.01);

        // Minimum / zero catalyst inputs
        $breakdownMin = $scanner->calculate5PartRankingScore([
            'reachability_score' => 20.0,
            'displacement_efficiency' => 0.01,
            'turnover_efficiency' => 0.001,
            'rvol' => 0.5,
            'vol_accel_5m' => 0.6,
            'range_expansion' => 0.5,
            'catalyst_detected' => false,
            'sentiment_score' => 0.0,
            'catalyst_boost' => 0.0,
            'spread_pct' => 0.06,
            'iv_rv_ratio' => 2.5,
            'combined_debit' => 4.50,
            'target_profit' => 50.0,
        ]);

        $this->assertSame(0.0, $breakdownMin['catalyst_quality']);
        $this->assertLessThan(70.0, $breakdownMin['total_score']);
    }

    /**
     * Test candidate screening returns breakdown, recommendation, and exclusion codes.
     */
    public function testCandidateScreeningBreakdownAndExclusionCodes(): void
    {
        $scanner = new OptionsScannerEngine(null);

        // Normal scan
        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'min_rvol' => 0.5,
            'dry_run' => true,
        ]);

        $this->assertSame(1, $result['scanned_count']);
        $candidate = $result['all_results'][0];

        $this->assertArrayHasKey('ranking_breakdown', $candidate);
        $this->assertArrayHasKey('technical_setup', $candidate['ranking_breakdown']);
        $this->assertArrayHasKey('catalyst_quality', $candidate['ranking_breakdown']);
        $this->assertArrayHasKey('execution_liquidity', $candidate['ranking_breakdown']);
        $this->assertArrayHasKey('risk_reward', $candidate['ranking_breakdown']);
        $this->assertArrayHasKey('capital_suitability', $candidate['ranking_breakdown']);
        $this->assertArrayHasKey('total_score', $candidate['ranking_breakdown']);

        $this->assertArrayHasKey('recommendation', $candidate);
        $this->assertContains($candidate['recommendation'], ['TRADE', 'NO TRADE']);
    }

    /**
     * Test exclusion reason RVOL_INSUFFICIENT when RVOL is below threshold.
     */
    public function testExclusionRvolInsufficient(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'min_rvol' => 10.0, // unrealistically high RVOL requirement
            'dry_run' => true,
        ]);

        $candidate = $result['all_results'][0];
        $this->assertSame('rejected', $candidate['scan_status']);
        $this->assertSame('RVOL_INSUFFICIENT', $candidate['exclusion_code']);
        $this->assertSame('NO TRADE', $candidate['recommendation']);
        $this->assertSame('NO TRADE', $result['recommendation']);
    }

    /**
     * Test exclusion reason SPREAD_TOO_WIDE when spread exceeds maximum.
     */
    public function testExclusionSpreadTooWide(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'min_rvol' => 0.5,
            'max_spread_pct' => 0.01, // 1% max spread while typical is 2.5%
            'dry_run' => true,
        ]);

        $candidate = $result['all_results'][0];
        $this->assertSame('rejected', $candidate['scan_status']);
        $this->assertSame('SPREAD_TOO_WIDE', $candidate['exclusion_code']);
        $this->assertSame('NO TRADE', $candidate['recommendation']);
    }

    /**
     * Test exclusion reason IV_RV_OVERPRICED when IV/RV exceeds max ratio.
     */
    public function testExclusionIvRvOverpriced(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'min_rvol' => 0.5,
            'max_iv_rv' => 0.5, // options IV/RV is ~1.12, so 0.5 will reject
            'dry_run' => true,
        ]);

        $candidate = $result['all_results'][0];
        $this->assertSame('rejected', $candidate['scan_status']);
        $this->assertSame('IV_RV_OVERPRICED', $candidate['exclusion_code']);
        $this->assertSame('NO TRADE', $candidate['recommendation']);
    }

    /**
     * Test exclusion reason NO_CATALYST when require_catalyst is set and no catalyst exists.
     */
    public function testExclusionNoCatalyst(): void
    {
        $mockCatalyst = $this->createMock(AlphaVantageCatalystService::class);
        $mockCatalyst->method('getTickerCatalyst')
            ->willReturn([
                'available' => true,
                'sentiment_score' => 0.0,
                'sentiment_label' => 'Neutral',
                'catalyst_detected' => false,
                'catalyst_type' => 'none',
                'catalyst_momentum_boost' => 0.0,
                'top_headline' => '',
            ]);

        $scanner = new OptionsScannerEngine(null, null, $mockCatalyst);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'min_rvol' => 0.5,
            'require_catalyst' => true,
            'dry_run' => true,
        ]);

        $candidate = $result['all_results'][0];
        $this->assertSame('rejected', $candidate['scan_status']);
        $this->assertSame('NO_CATALYST', $candidate['exclusion_code']);
        $this->assertSame('NO TRADE', $candidate['recommendation']);
    }

    /**
     * Test NO TRADE return when score falls below 70 threshold.
     */
    public function testNoTradeWhenScoreBelow70(): void
    {
        $scanner = new OptionsScannerEngine(null);

        $result = $scanner->scan([
            'universe' => ['NVDA'],
            'min_rvol' => 0.5,
            'min_score' => 95.0, // high threshold to force rejection on score
            'dry_run' => true,
        ]);

        $candidate = $result['all_results'][0];
        $this->assertSame('rejected', $candidate['scan_status']);
        $this->assertSame('SCORE_BELOW_THRESHOLD', $candidate['exclusion_code']);
        $this->assertSame('NO TRADE', $candidate['recommendation']);
        $this->assertSame('NO TRADE', $result['recommendation']);
    }
}
