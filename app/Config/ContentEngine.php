<?php

declare(strict_types=1);

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class ContentEngine extends BaseConfig
{
    /**
     * Maximum allowed payload size (in bytes) for incoming scanner payloads.
     */
    public int $maxPayloadBytes = 1048576; // 1 MB safeguard

    /**
     * Optional shared secret used for ingestion endpoints.
     */
    public ?string $ingestToken = null;

    /**
     * Maximum rows accepted per ingest to prevent runaway payloads.
     */
    public int $maxRows = 500;

    /**
     * Maps raw ThinkorSwim / export keys to normalized column names.
     */
    public array $aliasMap = [
        'symbol'           => 'symbol',
        'Symbol'           => 'symbol',
        'ticker'           => 'symbol',
        'Ticker'           => 'symbol',
        'sum'              => 'sum',
        'Sum'              => 'sum',
        'stage'            => 'stage',
        'Stage'            => 'stage',
        'mark'             => 'mark',
        'Mark'             => 'mark',
        'mark_pct_change'  => 'mark_pct_change',
        'Mark %Change'     => 'mark_pct_change',
        'Mark % Change'    => 'mark_pct_change',
        'Mark%Change'      => 'mark_pct_change',
        '%Change'          => 'mark_pct_change',
        '% Change'         => 'mark_pct_change',
        'MarkChg%'         => 'mark_pct_change',
        'pct_chng_5d'      => 'pct_chng_5d',
        '5D %Change'       => 'pct_chng_5d',
        '5D % Change'      => 'pct_chng_5d',
        '%Chng 5 D'        => 'pct_chng_5d',
        'market_cap_m'     => 'market_cap_m',
        'Market Cap (M)'   => 'market_cap_m',
        'Market Cap'       => 'market_cap_m',
        'MarketCap'        => 'market_cap_m',
        'volume'           => 'volume',
        'Volume'           => 'volume',
        'Vol'              => 'volume',
        'dollar_vol_m'     => 'dollar_vol_m',
        '$ Vol'            => 'dollar_vol_m',
        '$Vol'             => 'dollar_vol_m',
        'Dollar Vol'       => 'dollar_vol_m',
        'abvvol'           => 'abvvol',
        'ABV'              => 'abvvol',
        'ABVVol'           => 'abvvol',
        'AbvVol'           => 'abvvol',
        'vol_365'          => 'vol_365',
        'Vol 365'          => 'vol_365',
        'vol365'           => 'vol_365',
        'high_52w'         => 'high_52w',
        '52w High'         => 'high_52w',
        '52High'           => 'high_52w',
        'high52w'          => 'high_52w',
        'low_52w'          => 'low_52w',
        '52w Low'          => 'low_52w',
        '52Low'            => 'low_52w',
        'low52w'           => 'low_52w',
        'pct_1mo_chg'      => 'pct_1mo_chg',
        '1M %Change'       => 'pct_1mo_chg',
        '1M % Change'      => 'pct_1mo_chg',
        'pct_1_Mo_Chg'     => 'pct_1mo_chg',
        'pct_1_Mo_Chng'    => 'pct_1mo_chg',
    ];

    /**
     * Numeric fields we expect on normalized rows.
     */
    public array $numericFields = [
        'stage',
        'mark',
        'mark_pct_change',
        'pct_chng_5d',
        'market_cap_m',
        'volume',
        'dollar_vol_m',
        'abvvol',
        'vol_365',
        'high_52w',
        'low_52w',
        'pct_1mo_chg',
    ];

    /**
     * Scoring configuration, mirrored in docs.
     */
    public array $scoring = [
        'weights'   => [
            'dollar_volume' => 0.4,
            'market_cap'    => 0.2,
            'mark_change'   => 0.15,
            'abvvol'        => 0.15,
            'five_day'      => 0.1,
        ],
        'caps'      => [
            'dollar_volume' => 1500.0,  // scale at $1.5B notional traded
            'market_cap'    => 100000.0, // $100B market cap normalization
            'mark_change'   => 100.0,
            'abvvol'        => 1000.0,
            'five_day'      => 100.0,
        ],
        'penalties' => [
            'microcap_threshold' => 75.0, // <$75m
            'microcap_hit'       => -12.0,
            'extreme_move'       => 80.0,
            'extreme_hit'        => -5.0,
        ],
        'tiers'     => [
            'tier1' => 75.0,
            'tier2' => 55.0,
            'tier3' => 35.0,
        ],
    ];

    /**
     * Platform recommendations by tier.
     */
    public array $recommendedPlatforms = [
        'tier1' => ['tradingview', 'stocktwits', 'tiktok', 'youtube', 'facebook', 'discord'],
        'tier2' => ['tradingview', 'stocktwits', 'facebook', 'discord'],
        'tier3' => ['tradingview', 'stocktwits'],
        'avoid' => [],
    ];

    /**
     * Template lookup for each platform.
     */
    public array $platformTemplates = [
        'tradingview' => 'tradingview.php',
        'stocktwits'  => 'stocktwits.php',
        'tiktok'      => 'tiktok.php',
        'youtube'     => 'youtube.php',
        'facebook'    => 'facebook.php',
        'discord'     => 'discord.php',
    ];

    /**
     * Enables optional AI providers for richer drafts.
     */
    public bool $enableAiDrafts = false;

    /**
     * Distribution feature flags.
     */
    public bool $distributionEnabled = false;
    public ?string $zapierWebhookUrl = null;
    public bool $discordEnabled = false;

    public function __construct()
    {
        parent::__construct();

        $this->distributionEnabled = (bool) env('CONTENTENGINE_DISTRIBUTION_ENABLED', false);
        $this->zapierWebhookUrl = env('CONTENTENGINE_ZAPIER_WEBHOOK_URL');
        $this->discordEnabled = (bool) env('CONTENTENGINE_DISCORD_ENABLED', false);
    }
}