<?php

declare(strict_types=1);

namespace Tests\Unit\Options;

use App\Services\Options\BlackScholesGreeks;
use CodeIgniter\Test\CIUnitTestCase;

final class BlackScholesGreeksTest extends CIUnitTestCase
{
    private BlackScholesGreeks $bs;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bs = new BlackScholesGreeks();
    }

    /**
     * Test normal distribution functions CDF and PDF properties.
     */
    public function testNormalDistributionProperties(): void
    {
        // N(0) = 0.5
        $this->assertEqualsWithDelta(0.5, $this->bs->stdNormCdf(0.0), 0.0001);

        // N(3) ~ 0.9987, N(-3) ~ 0.0013
        $this->assertEqualsWithDelta(0.99865, $this->bs->stdNormCdf(3.0), 0.0001);
        $this->assertEqualsWithDelta(0.00135, $this->bs->stdNormCdf(-3.0), 0.0001);

        // PDF at 0: 1 / sqrt(2 * pi) ~ 0.3989
        $this->assertEqualsWithDelta(0.39894, $this->bs->stdNormPdf(0.0), 0.0001);
    }

    /**
     * Test textbook Black-Scholes pricing benchmark.
     * S = 100, K = 100, T = 1.0 (365 DTE), r = 0.05, sigma = 0.20.
     * Textbook benchmark: Call ~ $10.45, Put ~ $5.57.
     */
    public function testTextbookBlackScholesBenchmark(): void
    {
        $call = $this->bs->calculate(100.0, 100.0, 365.0, 0.20, 'call', 0.05);
        $put  = $this->bs->calculate(100.0, 100.0, 365.0, 0.20, 'put', 0.05);

        $this->assertEqualsWithDelta(10.45, $call['price'], 0.05);
        $this->assertEqualsWithDelta(5.57, $put['price'], 0.05);

        // Put-Call Parity: C - P = S - K * exp(-r * T)
        $expectedParity = 100.0 - (100.0 * exp(-0.05 * 1.0)); // ~ 4.877
        $actualParity = $call['price'] - $put['price'];
        $this->assertEqualsWithDelta($expectedParity, $actualParity, 0.02);
    }

    /**
     * Test Greeks behaviors and boundaries.
     */
    public function testGreeksSignAndBoundaries(): void
    {
        $call = $this->bs->calculate(145.0, 140.0, 30.0, 0.35, 'call');
        $put  = $this->bs->calculate(145.0, 140.0, 30.0, 0.35, 'put');

        // Call Delta in (0, 1), ITM call delta > 0.5
        $this->assertGreaterThan(0.5, $call['delta']);
        $this->assertLessThanOrEqual(1.0, $call['delta']);

        // Put Delta in (-1, 0), OTM put delta > -0.5
        $this->assertLessThan(0.0, $put['delta']);
        $this->assertGreaterThan(-0.5, $put['delta']);

        // Gamma > 0 for both call and put
        $this->assertGreaterThan(0.0, $call['gamma']);
        $this->assertEqualsWithDelta($call['gamma'], $put['gamma'], 0.0001);

        // Daily Theta < 0 (decay)
        $this->assertLessThan(0.0, $call['theta_daily']);
        $this->assertLessThan(0.0, $put['theta_daily']);

        // Vega > 0
        $this->assertGreaterThan(0.0, $call['vega_point']);
        $this->assertGreaterThan(0.0, $put['vega_point']);
    }

    /**
     * Test Implied Volatility solver accuracy.
     */
    public function testImpliedVolatilitySolver(): void
    {
        $knownSigma = 0.32;
        $call = $this->bs->calculate(220.0, 225.0, 14.0, $knownSigma, 'call', 0.045);

        $solvedSigma = $this->bs->solveImpliedVolatility(
            $call['price'],
            220.0,
            225.0,
            14.0,
            'call',
            0.045
        );

        $this->assertEqualsWithDelta($knownSigma, $solvedSigma, 0.005);
    }
}
