<?php

declare(strict_types=1);

namespace Tests\Unit\Options;

use App\Services\Options\OptionsCampaignManager;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * W4 Options Campaign Accounting Tests.
 *
 * Validates the 12 campaign metrics, straddle/strangle multi-leg grouping,
 * partial exits, and the core invariant: an economically funded residual option
 * is NEVER reported as risk-free.
 *
 * @internal
 */
final class OptionsCampaignAccountingTest extends CIUnitTestCase
{
    /**
     * Test the exact campaign acceptance example from specification:
     * - One $24 put purchased for $56 ($0.56 x 100)
     * - One $25 call purchased for $42 ($0.42 x 100)
     * - Total original debit = $98.
     * - Put sold for $98 gross credit.
     * - Original debit recovered before fees.
     * - Call remains open, valued independently.
     * - Residual runner is NEVER reported as risk-free.
     */
    public function testCampaignAcceptanceWorkedExample(): void
    {
        $manager = new OptionsCampaignManager();

        $campaign = [
            'ticker'   => 'XYZ',
            'strategy' => 'long_strangle',
            'legs'     => [
                [
                    'leg_id'           => 'leg-put-24',
                    'leg_type'         => 'put',
                    'strike'           => 24.0,
                    'expiry'           => date('Y-m-d', strtotime('+7 days')),
                    'contracts_bought' => 1,
                    'entry_price'      => 0.56, // $56.00
                    'open_fee'         => 0.65,
                    'contracts_sold'   => 1,
                    'exit_price'       => 0.98, // $98.00 gross recovered
                    'close_fee'        => 0.65,
                    'current_bid'      => 0.00,
                ],
                [
                    'leg_id'           => 'leg-call-25',
                    'leg_type'         => 'call',
                    'strike'           => 25.0,
                    'expiry'           => date('Y-m-d', strtotime('+7 days')),
                    'contracts_bought' => 1,
                    'entry_price'      => 0.42, // $42.00
                    'open_fee'         => 0.65,
                    'contracts_sold'   => 0, // Remains open
                    'exit_price'       => 0.00,
                    'close_fee'        => 0.00,
                    'current_bid'      => 0.20, // $20.00 current mark
                ],
            ],
        ];

        $res = $manager->calculateCampaign($campaign);

        // 1. Total original premium debit
        $this->assertEqualsWithDelta(98.00, $res['total_original_premium_debit'], 0.001);

        // 2. Total commissions and fees ($0.65 x 3 = $1.95)
        $this->assertEqualsWithDelta(1.95, $res['total_commissions_and_fees'], 0.001);

        // 3. Cash recovered from independently closed legs ($98.00 gross)
        $this->assertEqualsWithDelta(98.00, $res['cash_recovered'], 0.001);

        // 4. Remaining unrecovered net cost: ($98.00 + $1.95) - $98.00 = $1.95 (fees remaining)
        $this->assertEqualsWithDelta(1.95, $res['remaining_unrecovered_net_cost'], 0.001);

        // 5. Open contract quantities (Call: 1, Put: 0, Total: 1)
        $this->assertSame(1, $res['open_contract_quantities']['calls']);
        $this->assertSame(0, $res['open_contract_quantities']['puts']);
        $this->assertSame(1, $res['open_contract_quantities']['total']);

        // 6. Current executable liquidation value ($0.20 x 100 = $20.00)
        $this->assertEqualsWithDelta(20.00, $res['current_executable_liquidation_value'], 0.001);

        // 7. Realized P&L: $98.00 - $56.00 = +$42.00
        $this->assertEqualsWithDelta(42.00, $res['realized_pnl'], 0.001);

        // 7b. Unrealized P&L: $20.00 - $42.00 = -$22.00
        $this->assertEqualsWithDelta(-22.00, $res['unrealized_pnl'], 0.001);

        // 8. Fee-adjusted campaign net P&L: ($42.00 - $22.00) - $1.95 = +$18.05
        $this->assertEqualsWithDelta(18.05, $res['fee_adjusted_campaign_pnl'], 0.001);

        // 9. Premium recovery percentage: ($98 / $98) * 100 = 100.0%
        $this->assertEqualsWithDelta(100.0, $res['premium_recovery_percentage'], 0.001);

        // 10. Minimum sale proceeds needed to recover remaining cost ($1.95)
        $this->assertEqualsWithDelta(1.95, $res['min_sale_proceeds_to_breakeven'], 0.001);

        // 12. Residual runner accounting & INVARIANT check
        $runner = $res['residual_runner_accounting'];
        $this->assertSame(1, $runner['open_contracts']);
        $this->assertEqualsWithDelta(20.00, $runner['residual_liquidation_value'], 0.001);
        $this->assertEqualsWithDelta(20.00, $runner['opportunity_cost_at_risk'], 0.001);

        // CRITICAL INVARIANT: NEVER REPORTED AS LITERALLY RISK-FREE
        $this->assertFalse(
            $runner['is_literally_risk_free'],
            'Economically funded residual option must NEVER be reported as literally risk-free!'
        );
        $this->assertStringContainsString('Not risk-free', $runner['risk_characterization']);
    }

    /**
     * Test full recovery with zero fees to verify 0.0 remaining unrecovered.
     */
    public function testZeroFeeFullRecoveryMarksZeroRemainingCost(): void
    {
        $manager = new OptionsCampaignManager();

        $campaign = [
            'ticker'   => 'NVDA',
            'strategy' => 'strangle',
            'legs'     => [
                [
                    'leg_type'         => 'call',
                    'strike'           => 145.0,
                    'contracts_bought' => 1,
                    'entry_price'      => 0.95, // $95
                    'contracts_sold'   => 1,
                    'exit_price'       => 2.45, // $245
                ],
                [
                    'leg_type'         => 'put',
                    'strike'           => 140.0,
                    'contracts_bought' => 1,
                    'entry_price'      => 0.95, // $95
                    'contracts_sold'   => 0, // open runner
                    'current_bid'      => 0.15, // $15 mark
                ],
            ],
        ];

        $res = $manager->calculateCampaign($campaign);

        $this->assertEqualsWithDelta(190.00, $res['total_original_premium_debit'], 0.001);
        $this->assertEqualsWithDelta(245.00, $res['cash_recovered'], 0.001);
        $this->assertEqualsWithDelta(0.00, $res['remaining_unrecovered_net_cost'], 0.001);
        $this->assertEqualsWithDelta(100.0, $res['premium_recovery_percentage'], 0.001);
        $this->assertTrue($res['residual_runner_accounting']['has_residual_runner']);
        $this->assertFalse($res['residual_runner_accounting']['is_literally_risk_free']);
    }
}
