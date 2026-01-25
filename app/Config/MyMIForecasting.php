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
        'low'    => 40,
        'mid'    => 60,
        'high'   => 75,
        'medium' => 50,
    ];

    /**
     * Cache TTLs in seconds.
     */
    public array $cacheTtls = [
        'latestForecast'  => 300,
        'highlights'      => 60,
        'heatmap'         => 60,
        'accuracySummary' => 120,
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
     * Indicator weights (expanded for aggregation and scoring).
     */
    public array $indicatorWeights = [
        'trend'              => 0.5,
        'momentum'           => 0.3,
        'volatility'         => 0.1,
        'support_resistance' => 0.1,
    ];

    /**
     * Forecast evaluation windows (minutes).
     */
    public array $evaluationWindows = [15, 30, 60, 240, 1440];

    /**
     * Rate limit handling toggles.
     */
    public array $rateLimitHandling = [
        'enabled' => true,
        'sleepSeconds' => 60,
        'maxRetries' => 2,
    ];

    /**
     * Default data source tag.
     */
    public string $defaultDataSource = 'alphavantage';

    /**
     * Feature flags for modular releases.
     */
    public array $features = [
        'forecastDetailUi'   => true,
        'confidenceHeatmaps' => true,
        'accuracyTracking'   => true,
    ];

    /**
     * Confidence heatmap defaults.
     */
    public array $heatmap = [
        'defaultWindow' => '6h',
        'timeframes'    => ['5m', '15m', '1h', '4h', '1d'],
        'requireCache'  => true,
    ];

    /**
     * Forecast accuracy evaluation settings.
     */
    public array $accuracy = [
        'evaluationMinutes' => [15, 30, 60, 240, 1440],
        'batchLimit'        => 200,
        'cacheDays'         => 30,
    ];
}
