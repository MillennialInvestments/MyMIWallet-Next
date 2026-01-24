<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MyMIForecasting extends BaseConfig
{
    /**
     * Enable forecasting pipeline.
     */
    public bool $enabled = true;

    /**
     * Run inline during alert processing; if false, enqueue jobs for CRON/CLI.
     */
    public bool $runInline = true;

    /**
     * Default timeframes for v1.
     */
    public array $defaultTimeframes = ['5m', '10m'];

    /**
     * Module weights (must sum to 1.0 for scoring normalization).
     */
    public array $weights = [
        'trend'    => 0.6,
        'momentum' => 0.4,
    ];

    /**
     * Confidence thresholds for UI badges.
     */
    public array $confidenceThresholds = [
        'high'   => 70,
        'medium' => 50,
    ];

    /**
     * Cache TTLs in seconds.
     */
    public array $cacheTtls = [
        'latestForecast' => 300,
        'highlights'     => 60,
    ];

    /**
     * Alpha Vantage API limits and backoff.
     */
    public array $apiLimits = [
        'alphaVantagePerMinute' => 75,
        'backoffSeconds'        => 60,
    ];

    /**
     * Indicator thresholds.
     */
    public array $thresholds = [
        'emaSeparation'   => 0.003,
        'highVolatility'  => 0.04,
    ];

    /**
     * Default data source tag.
     */
    public string $defaultDataSource = 'alphavantage';
}
