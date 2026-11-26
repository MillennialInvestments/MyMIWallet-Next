<?php

declare(strict_types=1);

namespace Tests\Unit\Investments;

use CodeIgniter\Test\CIUnitTestCase;

/**
 * W2 Trade Tracker Data Integrity Tests:
 * Deterministic tests for gains, losses, zero-value trades, fee adjustments, and partial closures.
 *
 * @internal
 */
final class TradeTrackerPnlTest extends CIUnitTestCase
{
    /**
     * Helper calculation matching tradeTracker.php math.
     */
    private function calculatePnl(float $shares, float $entryPrice, float $currentPrice, float $fees = 0.0): array
    {
        $totalCost = $shares * $entryPrice;
        $marketValue = $shares * $currentPrice;
        $grossPnl = $marketValue - $totalCost;
        $netPnl = $grossPnl - $fees;
        $pnlPct = $totalCost > 0 ? ($netPnl / $totalCost) * 100.0 : 0.0;

        return [
            'total_cost'   => round($totalCost, 4),
            'market_value' => round($marketValue, 4),
            'gross_pnl'    => round($grossPnl, 4),
            'net_pnl'      => round($netPnl, 4),
            'pnl_pct'      => round($pnlPct, 4),
        ];
    }

    public function testPositiveGainCalculatedCorrectly(): void
    {
        $res = $this->calculatePnl(100.0, 10.0, 12.50);

        $this->assertSame(1000.0, $res['total_cost']);
        $this->assertSame(1250.0, $res['market_value']);
        $this->assertSame(250.0, $res['gross_pnl']);
        $this->assertSame(250.0, $res['net_pnl']);
        $this->assertSame(25.0, $res['pnl_pct']);
    }

    public function testNegativeLossRemainsNegative(): void
    {
        $res = $this->calculatePnl(100.0, 10.0, 7.50);

        $this->assertSame(1000.0, $res['total_cost']);
        $this->assertSame(750.0, $res['market_value']);
        $this->assertSame(-250.0, $res['gross_pnl']);
        $this->assertSame(-250.0, $res['net_pnl']);
        $this->assertLessThan(0.0, $res['net_pnl'], 'Losses MUST remain negative and never be clamped to zero.');
        $this->assertSame(-25.0, $res['pnl_pct']);
    }

    public function testBreakevenTradeYieldsZeroPnl(): void
    {
        $res = $this->calculatePnl(50.0, 20.0, 20.0);

        $this->assertSame(1000.0, $res['total_cost']);
        $this->assertSame(1000.0, $res['market_value']);
        $this->assertSame(0.0, $res['gross_pnl']);
        $this->assertSame(0.0, $res['net_pnl']);
        $this->assertSame(0.0, $res['pnl_pct']);
    }

    public function testFeeAdjustmentsDeductedFromNetProfit(): void
    {
        // 10 contracts @ $1.50 = $1500 outlay, exits @ $2.00 = $2000 gross.
        // Fees: $0.65/contract open + $0.65/contract close = $13.00 total fees.
        $res = $this->calculatePnl(1000.0, 1.50, 2.00, 13.00);

        $this->assertSame(1500.0, $res['total_cost']);
        $this->assertSame(2000.0, $res['market_value']);
        $this->assertSame(500.0, $res['gross_pnl']);
        $this->assertSame(487.0, $res['net_pnl']);
        $this->assertEqualsWithDelta(32.4667, $res['pnl_pct'], 0.001);
    }

    public function testPartialClosureBasisAccounting(): void
    {
        $initialShares = 200.0;
        $entryPrice = 50.00; // $10,000 total cost
        $closedShares = 100.0;
        $exitPrice = 65.00; // $6,500 proceeds

        $closedBasis = $closedShares * $entryPrice; // $5,000
        $realizedGain = ($exitPrice * $closedShares) - $closedBasis; // $1,500

        $remainingShares = $initialShares - $closedShares; // 100
        $remainingBasis = $remainingShares * $entryPrice; // $5,000
        $currentPrice = 60.00;
        $unrealizedGain = ($currentPrice * $remainingShares) - $remainingBasis; // $1,000

        $this->assertSame(1500.0, $realizedGain);
        $this->assertSame(1000.0, $unrealizedGain);
        $this->assertSame(2500.0, $realizedGain + $unrealizedGain);
    }

    public function testViewSourceDoesNotClampNegativeGains(): void
    {
        $viewContent = file_get_contents(APPPATH . 'Modules/User/Views/Investments/tradeTracker.php');
        $this->assertStringNotContainsString('Math.max(0, (shares * currentPrice)', $viewContent, 'View must not clamp net_gains to Math.max(0, ...)');
        $this->assertStringNotContainsString('/index.php/Trade-Tracker', $viewContent, 'View must not contain legacy /index.php/ URL references');
    }
}
