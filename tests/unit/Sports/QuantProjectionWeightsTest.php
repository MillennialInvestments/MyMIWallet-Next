<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\SportsPropsService;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * Tests for SportsPropsService::evaluateQuantProjection:
 * Dynamic weighting over Form, Matchup, Home/Away, and Venue factors.
 */
class QuantProjectionWeightsTest extends CIUnitTestCase
{
    public function testEvaluateQuantProjectionAppliesWeightsCorrectly(): void
    {
        $baseline = 25.0;
        $weights = [
            'quant_form_weight'      => 0.40,
            'quant_matchup_weight'   => 0.30,
            'quant_home_away_weight' => 0.15,
            'quant_venue_weight'     => 0.15,
        ];
        $context = [
            'recent_avg'   => 30.0, // Hot streak (+20% form)
            'season_avg'   => 25.0,
            'def_rank'     => 28,   // Weak opponent defense (+9% matchup boost)
            'is_home'      => true, // Home court (+4%)
            'venue_factor' => 1.05, // Altitude boost (+5%)
        ];

        $res = SportsPropsService::evaluateQuantProjection($baseline, $weights, $context);

        $this->assertTrue($res['active']);
        $this->assertGreaterThan($baseline, (float) $res['personalized_projection']);
        $this->assertGreaterThan(0.0, (float) $res['edge_shift_pct']);
        $this->assertNotEmpty($res['dominant_driver']);
        $this->assertStringContainsString('boost', $res['verdict']);
    }

    public function testEvaluateQuantProjectionAppliesConservativeDiscountOnToughMatchup(): void
    {
        $baseline = 28.0;
        $weights = [
            'quant_form_weight'      => 0.20,
            'quant_matchup_weight'   => 0.60, // Heavy matchup focus
            'quant_home_away_weight' => 0.10,
            'quant_venue_weight'     => 0.10,
        ];
        $context = [
            'recent_avg'   => 22.0, // Slump (-21%)
            'season_avg'   => 28.0,
            'def_rank'     => 2,    // Elite lockdown defense (#2 ranked)
            'is_home'      => false,// Road game
            'venue_factor' => 0.95, // Suppressive venue
        ];

        $res = SportsPropsService::evaluateQuantProjection($baseline, $weights, $context);

        $this->assertTrue($res['active']);
        $this->assertLessThan($baseline, (float) $res['personalized_projection']);
        $this->assertLessThan(0.0, (float) $res['edge_shift_pct']);
        $this->assertStringContainsString('discount', $res['verdict']);
    }

    public function testEvaluateQuantProjectionZeroWeightsDefaultEqually(): void
    {
        $baseline = 20.0;
        $weights = [
            'quant_form_weight'      => 0.0,
            'quant_matchup_weight'   => 0.0,
            'quant_home_away_weight' => 0.0,
            'quant_venue_weight'     => 0.0,
        ];
        $context = [
            'recent_avg' => 20.0,
            'season_avg' => 20.0,
            'def_rank'   => 16, // Neutral
            'is_home'    => true,
        ];

        $res = SportsPropsService::evaluateQuantProjection($baseline, $weights, $context);

        $this->assertSame(25.0, (float) $res['weights']['form']);
        $this->assertSame(25.0, (float) $res['weights']['matchup']);
    }
}
