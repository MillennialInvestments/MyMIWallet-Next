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
        'heatmap'        => 300,
        'accuracy'       => 300,
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
