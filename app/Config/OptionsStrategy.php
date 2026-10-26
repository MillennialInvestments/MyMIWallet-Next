<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * OptionsStrategy Configuration
 *
 * Configurable defaults for the MyMI Weekly Options Opportunity Scanner
 * and Trade Momentum Manager ($100 Call / $100 Put target balance entry).
 */
class OptionsStrategy extends BaseConfig
{
    /**
     * Default options strategy structure: 'strangle' (OTM legs) or 'straddle' (ATM legs).
     */
    public string $defaultStrategy = 'strangle';

    /**
     * Default Out-of-the-Money offset percentage for strangle strikes.
     * E.g. 4.0% puts Call strike at +4% above market and Put strike at -4% below market.
     */
    public float $defaultOtmOffsetPct = 4.0;

    /**
     * AlphaVantage API key for economic news sentiment & ticker catalyst analysis.
     */
    public string $alphaVantageApiKey = '';

    /**
     * Enable AlphaVantage news sentiment & catalyst analysis in scanner.
     */
    public bool $enableAlphaVantageCatalyst = true;

    /**
     * Minimum absolute sentiment score threshold to qualify as a strong catalyst.
     */
    public float $catalystMinSentimentScore = 0.15;

    /**
     * Weight of catalyst score in options candidate ranking.
     */
    public float $catalystWeightInRanking = 15.0;

    /**
     * Target capital balance entry for the Call leg (in USD).
     * Default: $100.00
     */
    public float $callTargetBalance = 100.00;

    /**
     * Target capital balance entry for the Put leg (in USD).
     * Default: $100.00
     */
    public float $putTargetBalance = 100.00;

    /**
     * Target net profit for position exit (in USD).
     * Default: $200.00
     */
    public float $targetNetProfit = 200.00;

    /**
     * Default per-contract entry debit for the Call leg.
     */
    public float $defaultCallDebit = 0.95;

    /**
     * Default per-contract entry debit for the Put leg.
     */
    public float $defaultPutDebit = 0.95;

    /**
     * Trailing retrace warning threshold (%) from peak unrealized profit.
     */
    public float $trailRetracePct = 25.0;

    /**
     * Default days to expiration for weekly options.
     */
    public int $defaultDte = 5;

    /**
     * Minimum RVOL threshold to qualify momentum.
     */
    public float $minRvol = 1.20;

    /**
     * Maximum Implied Volatility to Realized Volatility ratio.
     */
    public float $maxIvRv = 1.80;

    /**
     * Default high-liquidity weekly options universe.
     */
    public array $universe = [
        'NVDA',
        'TSLA',
        'AMD',
        'COIN',
        'SPY',
        'QQQ',
        'IWM',
    ];
}
