<?php

declare(strict_types=1);

namespace App\Services\Options;

/**
 * Black-Scholes-Merton Options Pricing & Greeks Calculation Engine.
 *
 * Implements exact closed-form analytical solutions for European option pricing,
 * first-order Greeks (Delta, Theta, Vega, Rho), second-order Greeks (Gamma),
 * and Newton-Raphson implied volatility inversion.
 */
class BlackScholesGreeks
{
    public const DEFAULT_RISK_FREE_RATE = 0.045; // 4.5% annualized risk-free rate

    /**
     * Compute comprehensive Black-Scholes pricing and Greeks for a single leg.
     *
     * @param float $spot Spot underlying price (S)
     * @param float $strike Strike price (K)
     * @param float $dte Days to expiration (DTE)
     * @param float $volatility Annualized implied volatility (e.g. 0.35 for 35%)
     * @param string $type Option type: 'call' or 'put'
     * @param float $rate Annualized risk-free rate (r, default 0.045)
     * @param float $dividend Annualized continuous dividend yield (q, default 0.0)
     * @return array{
     *   price: float,
     *   delta: float,
     *   gamma: float,
     *   theta_daily: float,
     *   vega_point: float,
     *   rho_point: float,
     *   intrinsic_value: float,
     *   time_value: float,
     *   d1: float,
     *   d2: float
     * }
     */
    public function calculate(
        float $spot,
        float $strike,
        float $dte,
        float $volatility,
        string $type = 'call',
        float $rate = self::DEFAULT_RISK_FREE_RATE,
        float $dividend = 0.0
    ): array {
        $type = strtolower(trim($type));
        $isCall = ($type === 'call');

        $t = max(0.00001, $dte / 365.0);
        $s = max(0.01, $spot);
        $k = max(0.01, $strike);
        $sigma = max(0.0001, $volatility);

        $sqrtT = sqrt($t);
        $d1 = (log($s / $k) + ($rate - $dividend + 0.5 * ($sigma ** 2)) * $t) / ($sigma * $sqrtT);
        $d2 = $d1 - ($sigma * $sqrtT);

        $nd1 = $this->stdNormCdf($d1);
        $nd2 = $this->stdNormCdf($d2);
        $npd1 = $this->stdNormPdf($d1);

        $expDividend = exp(-$dividend * $t);
        $expRate = exp(-$rate * $t);

        if ($isCall) {
            $price = ($s * $expDividend * $nd1) - ($k * $expRate * $nd2);
            $delta = $expDividend * $nd1;
            $intrinsic = max(0.0, $s - $k);
            $thetaAnnual = -($s * $sigma * $expDividend * $npd1) / (2.0 * $sqrtT)
                + ($dividend * $s * $expDividend * $nd1)
                - ($rate * $k * $expRate * $nd2);
            $rhoAnnual = $k * $t * $expRate * $nd2;
        } else {
            $nMinusD1 = $this->stdNormCdf(-$d1);
            $nMinusD2 = $this->stdNormCdf(-$d2);
            $price = ($k * $expRate * $nMinusD2) - ($s * $expDividend * $nMinusD1);
            $delta = -$expDividend * $nMinusD1;
            $intrinsic = max(0.0, $k - $s);
            $thetaAnnual = -($s * $sigma * $expDividend * $npd1) / (2.0 * $sqrtT)
                - ($dividend * $s * $expDividend * $nMinusD1)
                + ($rate * $k * $expRate * $nMinusD2);
            $rhoAnnual = -$k * $t * $expRate * $nMinusD2;
        }

        $price = max(0.0, $price);
        $timeValue = max(0.0, $price - $intrinsic);

        // Gamma (identical for calls and puts)
        $gamma = ($expDividend * $npd1) / ($s * $sigma * $sqrtT);

        // Vega: change per 1% change in IV
        $vegaAnnual = $s * $expDividend * $sqrtT * $npd1;
        $vegaPoint = $vegaAnnual / 100.0;

        // Daily Theta
        $thetaDaily = $thetaAnnual / 365.0;

        // Rho: change per 1% change in interest rates
        $rhoPoint = $rhoAnnual / 100.0;

        return [
            'price'           => round($price, 4),
            'delta'           => round($delta, 4),
            'gamma'           => round($gamma, 6),
            'theta_daily'     => round($thetaDaily, 4),
            'vega_point'      => round($vegaPoint, 4),
            'rho_point'       => round($rhoPoint, 4),
            'intrinsic_value' => round($intrinsic, 4),
            'time_value'      => round($timeValue, 4),
            'd1'              => round($d1, 4),
            'd2'              => round($d2, 4),
        ];
    }

    /**
     * Compute implied volatility from market option price using Newton-Raphson.
     *
     * @param float $targetPrice Market option price
     * @param float $spot Spot underlying price
     * @param float $strike Strike price
     * @param float $dte Days to expiration
     * @param string $type 'call' or 'put'
     * @param float $rate Risk-free rate
     * @param float $dividend Continuous dividend rate
     * @param int $maxIterations Maximum Newton-Raphson iterations
     * @param float $tolerance Price convergence tolerance
     * @return float Estimated implied volatility (e.g. 0.35)
     */
    public function solveImpliedVolatility(
        float $targetPrice,
        float $spot,
        float $strike,
        float $dte,
        string $type = 'call',
        float $rate = self::DEFAULT_RISK_FREE_RATE,
        float $dividend = 0.0,
        int $maxIterations = 50,
        float $tolerance = 0.0001
    ): float {
        $type = strtolower($type);
        $intrinsic = ($type === 'call') ? max(0.0, $spot - $strike) : max(0.0, $strike - $spot);
        if ($targetPrice <= $intrinsic) {
            return 0.05; // intrinsic baseline
        }

        // Initial volatility guess: Brenner-Subrahmanyam approximation
        $t = max(0.00001, $dte / 365.0);
        $sigma = sqrt(2.0 * M_PI / $t) * ($targetPrice / $spot);
        $sigma = max(0.05, min(3.0, $sigma));

        // Newton-Raphson iteration
        for ($i = 0; $i < $maxIterations; $i++) {
            $calc = $this->calculate($spot, $strike, $dte, $sigma, $type, $rate, $dividend);
            $diff = $calc['price'] - $targetPrice;

            if (abs($diff) < $tolerance) {
                return round($sigma, 4);
            }

            // Derivative with respect to sigma is Vega (not point vega)
            $vega = $calc['vega_point'] * 100.0;
            if ($vega < 0.00001) {
                break;
            }

            $step = $diff / $vega;
            $sigma -= $step;

            if ($sigma <= 0.01) {
                $sigma = 0.01;
            } elseif ($sigma >= 5.0) {
                $sigma = 5.0;
            }
        }

        // Bisection fallback if Newton did not converge
        $low = 0.01;
        $high = 4.0;
        for ($j = 0; $j < 30; $j++) {
            $mid = ($low + $high) / 2.0;
            $midPrice = $this->calculate($spot, $strike, $dte, $mid, $type, $rate, $dividend)['price'];
            if (abs($midPrice - $targetPrice) < $tolerance) {
                return round($mid, 4);
            }
            if ($midPrice < $targetPrice) {
                $low = $mid;
            } else {
                $high = $mid;
            }
        }

        return round(($low + $high) / 2.0, 4);
    }

    /**
     * Standard Normal Probability Density Function (PDF): N'(x) = (1 / sqrt(2*pi)) * e^(-x^2 / 2)
     */
    public function stdNormPdf(float $x): float
    {
        return (1.0 / sqrt(2.0 * M_PI)) * exp(-0.5 * ($x ** 2));
    }

    /**
     * Standard Normal Cumulative Distribution Function (CDF): N(x)
     * High-precision Abramowitz & Stegun 7.1.26 polynomial approximation (error < 7.5e-8).
     */
    public function stdNormCdf(float $x): float
    {
        $b1 = 0.319381530;
        $b2 = -0.356563782;
        $b3 = 1.781477937;
        $b4 = -1.821255978;
        $b5 = 1.330274429;
        $p  = 0.2316419;

        if ($x >= 0.0) {
            $k = 1.0 / (1.0 + $p * $x);
            $poly = $k * ($b1 + $k * ($b2 + $k * ($b3 + $k * ($b4 + $k * $b5))));
            return 1.0 - $this->stdNormPdf($x) * $poly;
        }

        $k = 1.0 / (1.0 - $p * $x);
        $poly = $k * ($b1 + $k * ($b2 + $k * ($b3 + $k * ($b4 + $k * $b5))));
        return $this->stdNormPdf($x) * $poly;
    }
}
