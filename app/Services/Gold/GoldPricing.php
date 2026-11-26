<?php

declare(strict_types=1);

namespace App\Services\Gold;

/**
 * Gold Pricing Service:
 *
 * 1 Gold = $1.00 USD of closed-loop in-app service credit.
 * Services/features paid in Gold receive a standard discount
 * (default MYMIGOLD_DISCOUNT_BPS = 1000 bps / 10%).
 */
final class GoldPricing
{
    /** Default 1000 basis points = 10% discount when paying in Gold */
    public const DEFAULT_DISCOUNT_BPS = 1000;

    public function discountBps(): int
    {
        return max(0, min(5000, (int) env('MYMIGOLD_DISCOUNT_BPS', self::DEFAULT_DISCOUNT_BPS)));
    }

    public function discountRate(): float
    {
        return $this->discountBps() / 10000.0;
    }

    /**
     * Compute the Gold price for a given USD list price.
     * Gold Price = USD × (1 - discount_rate)
     */
    public function goldPrice(float $usdPrice): float
    {
        if ($usdPrice <= 0) {
            return 0.0;
        }

        $discounted = $usdPrice * (1.0 - $this->discountRate());
        return round($discounted, 2);
    }

    /**
     * Compute equivalent USD value of a given Gold amount.
     * 1 Gold = $1.00 USD of service credit.
     */
    public function usdValue(float $goldAmount): float
    {
        return round(max(0.0, $goldAmount), 2);
    }
}
