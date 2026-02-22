<?php

declare(strict_types=1);

namespace App\Services;

use CodeIgniter\Database\BaseConnection;
use CodeIgniter\Cache\CacheInterface;
use Config\Database;
use Config\Services;

class ForecastAggregationService
{
    protected BaseConnection $db;
    protected CacheInterface $cache;

    protected int $defaultCacheTtl = 60; // seconds

    public function __construct()
    {
        $this->db    = Database::connect();
        $this->cache = Services::cache();
    }

    /**
     * ================================================================
     * Get Confidence Heatmap
     * Returns matrix: ticker => timeframes => confidence
     * ================================================================
     */
    public function getConfidenceHeatmap(
        string $timeframe = '5m',
        int $windowMinutes = 60,
        bool $useCache = true
    ): array {

        $cacheKey = "forecast_heatmap_{$timeframe}_{$windowMinutes}";

        if ($useCache && $cached = $this->cache->get($cacheKey)) {
            return $cached;
        }

        $cutoff = date('Y-m-d H:i:s', strtotime("-{$windowMinutes} minutes"));

        $builder = $this->db->table('bf_investment_trade_alerts');

        $results = $builder
            ->select([
                'ticker',
                'forecast_confidence',
                'forecast_direction',
                'forecast_updated_at'
            ])
            ->where('forecast_updated_at >=', $cutoff)
            ->where('forecast_confidence IS NOT NULL', null, false)
            ->orderBy('forecast_confidence', 'DESC')
            ->get()
            ->getResultArray();

        $heatmap = [];

        foreach ($results as $row) {
            $ticker = $row['ticker'];

            $heatmap[$ticker] = [
                'confidence' => (int) $row['forecast_confidence'],
                'direction'  => $row['forecast_direction'],
                'updated_at' => $row['forecast_updated_at']
            ];
        }

        $this->cache->save($cacheKey, $heatmap, $this->defaultCacheTtl);

        return $heatmap;
    }

    /**
     * ================================================================
     * Get Forecast Highlights
     * Used for Dashboard "Top Bullish / Bearish / Recent"
     * ================================================================
     */
    public function getForecastHighlights(int $limit = 10): array
    {
        $cacheKey = "forecast_highlights_{$limit}";

        if ($cached = $this->cache->get($cacheKey)) {
            return $cached;
        }

        $builder = $this->db->table('bf_investment_trade_alerts');

        $baseQuery = $builder
            ->select([
                'ticker',
                'forecast_direction',
                'forecast_confidence',
                'forecast_target_price',
                'forecast_range_low',
                'forecast_range_high',
                'forecast_updated_at'
            ])
            ->where('forecast_confidence IS NOT NULL', null, false);

        $bullish = clone $baseQuery;
        $bearish = clone $baseQuery;
        $recent  = clone $baseQuery;

        $data = [
            'bullish' => $bullish
                ->where('forecast_direction', 'bullish')
                ->orderBy('forecast_confidence', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray(),

            'bearish' => $bearish
                ->where('forecast_direction', 'bearish')
                ->orderBy('forecast_confidence', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray(),

            'recent' => $recent
                ->orderBy('forecast_updated_at', 'DESC')
                ->limit($limit)
                ->get()
                ->getResultArray(),
        ];

        $this->cache->save($cacheKey, $data, 60);

        return $data;
    }

    /**
     * ================================================================
     * Get Confidence Distribution
     * Used for charts (bucket grouping)
     * ================================================================
     */
    public function getConfidenceDistribution(): array
    {
        $cacheKey = "forecast_confidence_distribution";

        if ($cached = $this->cache->get($cacheKey)) {
            return $cached;
        }

        $builder = $this->db->table('bf_investment_trade_alerts');

        $rows = $builder
            ->select('forecast_confidence')
            ->where('forecast_confidence IS NOT NULL', null, false)
            ->get()
            ->getResultArray();

        $buckets = [
            '0-40'   => 0,
            '41-65'  => 0,
            '66-100' => 0,
        ];

        foreach ($rows as $row) {
            $score = (int) $row['forecast_confidence'];

            if ($score <= 40) {
                $buckets['0-40']++;
            } elseif ($score <= 65) {
                $buckets['41-65']++;
            } else {
                $buckets['66-100']++;
            }
        }

        $this->cache->save($cacheKey, $buckets, 120);

        return $buckets;
    }

    /**
     * ================================================================
     * Get Accuracy Summary
     * Uses bf_investment_forecast_accuracy
     * ================================================================
     */
    public function getForecastAccuracySummary(int $days = 7): array
    {
        $cacheKey = "forecast_accuracy_summary_{$days}";

        if ($cached = $this->cache->get($cacheKey)) {
            return $cached;
        }

        $cutoff = date('Y-m-d H:i:s', strtotime("-{$days} days"));

        $builder = $this->db->table('bf_investment_forecast_accuracy');

        $rows = $builder
            ->select([
                'timeframe',
                'hit_target',
                'forecast_direction'
            ])
            ->where('recorded_at >=', $cutoff)
            ->get()
            ->getResultArray();

        $summary = [];

        foreach ($rows as $row) {
            $tf = $row['timeframe'];

            if (!isset($summary[$tf])) {
                $summary[$tf] = [
                    'total' => 0,
                    'hits'  => 0,
                ];
            }

            $summary[$tf]['total']++;

            if ((int)$row['hit_target'] === 1) {
                $summary[$tf]['hits']++;
            }
        }

        foreach ($summary as $tf => $data) {
            $summary[$tf]['accuracy_percent'] = $data['total'] > 0
                ? round(($data['hits'] / $data['total']) * 100, 2)
                : 0;
        }

        $this->cache->save($cacheKey, $summary, 120);

        return $summary;
    }

    /**
     * ================================================================
     * Clear Aggregation Cache
     * Useful after forecast refresh runs
     * ================================================================
     */
    public function clearCache(): void
    {
        $this->cache->deleteMatching('forecast_*');
    }
}