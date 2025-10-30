<?php namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class MyMIAuction extends BaseConfig
{
    /**
     * Default minimum increment in cents of MyMIGold.
     */
    public int $defaultMinIncrementCents = 100;

    /**
     * Number of seconds to extend a lot when anti-sniping triggers.
     */
    public int $antiSnipeSec = 120;

    /**
     * Threshold in seconds before auction end where anti-sniping applies.
     */
    public int $extendThresholdSec = 120;

    /**
     * Platform fee in basis points (1/100th of a percent).
     */
    public int $platformFeeBps = 500;

    /**
     * FMV providers enabled for blending.
     */
    public array $fmvProviders = ['internal_comps', 'msrp', 'external_ebay_sold'];

    /**
     * Minimum confidence threshold for displaying FMV. 0 shows "insufficient data".
     */
    public int $fmvMinimumConfidenceCents = 0;
}