<?php

declare(strict_types=1);

namespace Tests\Unit\Sports;

use App\Modules\Sports\Libraries\BettingCalculators;
use CodeIgniter\Test\CIUnitTestCase;

final class BettingCalculatorsTest extends CIUnitTestCase
{
    public function testOddsConversions(): void
    {
        // American to Decimal
        $this->assertEqualsWithDelta(1.9091, BettingCalculators::americanToDecimal(-110), 0.001);
        $this->assertEqualsWithDelta(2.5000, BettingCalculators::americanToDecimal(150), 0.001);
        $this->assertEqualsWithDelta(1.5000, BettingCalculators::americanToDecimal(-200), 0.001);
        $this->assertSame(1.0, BettingCalculators::americanToDecimal(0));

        // Decimal to American
        $this->assertSame(-110, BettingCalculators::decimalToAmerican(1.9091));
        $this->assertSame(150, BettingCalculators::decimalToAmerican(2.50));
        $this->assertSame(-200, BettingCalculators::decimalToAmerican(1.50));

        // American to Implied Probability
        $this->assertEqualsWithDelta(0.5238, BettingCalculators::americanToImpliedProb(-110), 0.001);
        $this->assertEqualsWithDelta(0.4000, BettingCalculators::americanToImpliedProb(150), 0.001);
        $this->assertEqualsWithDelta(0.6667, BettingCalculators::americanToImpliedProb(-200), 0.001);
    }

    public function testPayoutAndPnl(): void
    {
        // Payout on -110 with $110 stake = $210 (stake $110 + profit $100)
        $payout = BettingCalculators::calculatePayout(110.0, -110);
        $this->assertEqualsWithDelta(210.0, $payout, 0.01);

        // P&L calculation
        $this->assertEqualsWithDelta(100.0, BettingCalculators::calculatePnl(110.0, -110, 'won'), 0.01);
        $this->assertEqualsWithDelta(-110.0, BettingCalculators::calculatePnl(110.0, -110, 'lost'), 0.01);
        $this->assertSame(0.00, BettingCalculators::calculatePnl(110.0, -110, 'push'));
        $this->assertSame(0.00, BettingCalculators::calculatePnl(110.0, -110, 'open'));
    }

    public function testKellyCriterion(): void
    {
        // Example: Bankroll $1000, +100 odds (even money), model probability 55%
        // Full Kelly = (1 * 0.55 - 0.45) / 1 = 10%
        $result = BettingCalculators::kelly(1000.0, 100, 0.55, 0.5);

        $this->assertTrue($result['has_edge']);
        $this->assertEqualsWithDelta(10.0, $result['full_kelly_pct'], 0.1);
        $this->assertEqualsWithDelta(5.0, $result['half_kelly_pct'], 0.1);
        $this->assertEqualsWithDelta(2.5, $result['quarter_kelly_pct'], 0.1);
        $this->assertEqualsWithDelta(50.0, $result['recommended_stake'], 1.0);
        $this->assertEqualsWithDelta(10.0, $result['expected_value_pct'], 0.1);

        // Negative edge should yield recommended stake of 0
        $noEdge = BettingCalculators::kelly(1000.0, -110, 0.45, 0.5);
        $this->assertFalse($noEdge['has_edge']);
        $this->assertSame(0.0, $noEdge['recommended_stake']);
    }

    public function testTwoWayArbitrage(): void
    {
        // Book A: +120 (Dec 2.20), Book B: -105 (Dec 1.9524)
        // 1/2.20 + 1/1.9524 = 0.4545 + 0.5122 = 0.9667 < 1.0 (Arbitrage!)
        $arb = BettingCalculators::arbitrage(1000.0, 120, -105);

        $this->assertTrue($arb['is_arbitrage']);
        $this->assertGreaterThan(0, $arb['guaranteed_profit']);
        $this->assertGreaterThan(0, $arb['roi_pct']);
        $this->assertEqualsWithDelta(1000.0, $arb['stake_a'] + $arb['stake_b'], 0.05);

        // Standard juice market: -110 both sides (no arbitrage)
        $noArb = BettingCalculators::arbitrage(1000.0, -110, -110);
        $this->assertFalse($noArb['is_arbitrage']);
        $this->assertLessThan(0, $noArb['guaranteed_profit']);
    }

    public function testNoVigCalculator(): void
    {
        // -110 / -110 standard two-way line
        $noVig = BettingCalculators::noVig(-110, -110, 0.58);

        $this->assertEqualsWithDelta(4.76, $noVig['market_vig_pct'], 0.1);
        $this->assertEqualsWithDelta(0.50, $noVig['fair_prob_a'], 0.01);
        $this->assertEqualsWithDelta(0.50, $noVig['fair_prob_b'], 0.01);
        $this->assertSame(100, $noVig['fair_odds_a']);
        $this->assertSame(100, $noVig['fair_odds_b']);
        $this->assertTrue($noVig['has_model_prob']);
        $this->assertGreaterThan(0, $noVig['ev_pct']);
    }

    public function testClosingLineValueEdge(): void
    {
        // Bet taken at +150 (implied 40%), closed at +110 (implied 47.6%) -> positive CLV
        $clv = BettingCalculators::clvEdge(150, 110);
        $this->assertGreaterThan(0, $clv);

        // Bet taken at -110 (implied 52.38%), closed at +110 (implied 47.6%) -> negative CLV
        $badClv = BettingCalculators::clvEdge(-110, 110);
        $this->assertLessThan(0, $badClv);
    }
}
