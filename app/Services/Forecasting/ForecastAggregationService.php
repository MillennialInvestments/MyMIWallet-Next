<?php

namespace App\Services\Forecasting;

use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Database\BaseConnection;
use Config\MyMIForecasting;
use Config\Services;

class ForecastAggregationService
{
    private CacheInterface $cache;
    private BaseConnection $db;
    private MyMIForecasting $config;

    public function __construct(?CacheInterface $cache = null, ?BaseConnection $db = null, ?MyMIForecasting $config = null)
    {
        $this->cache = $cache ?? Services::cache();
        $this->db = $db ?? db_connect();
        $this->config = $config ?? config('MyMIForecasting');
    }

    public function getConfidenceHeatmap(string $timeframe, string $window, bool $allowRefresh = false): array
    {
        $timeframe = strtolower(trim($timeframe)) ?: 'all';
        $window = trim($window) ?: ($this->config->heatmap['defaultWindow'] ?? '6h');
        $cacheKey = sanitizeCacheKey("forecast:heatmap:{$timeframe}:{$window}");

        if (($cached = $this->cache->get($cacheKey)) !== null) {
            return ['cached' => true, 'payload' => $cached];
        }

        if (($this->config->heatmap['requireCache'] ?? true) && ! $allowRefresh) {
            return ['cached' => false, 'payload' => ['timeframes' => [], 'tickers' => [], 'grid' => []]];
        }

        $timeframeField = $this->resolveTimeframeField();
        $updatedField = $this->resolveUpdatedField();

        $builder = $this->db->table('bf_investment_trade_alerts')
            ->select('ticker, AVG(forecast_confidence) as confidence', false)
            ->where('forecast_confidence IS NOT NULL', null, false);

        if ($updatedField !== null) {
            $builder->where($updatedField . ' >=', $this->windowStart($window));
        }

        if ($timeframeField && $timeframe !== 'all') {
            $builder->select($timeframeField . ' as timeframe')
                ->where($timeframeField, $timeframe)
                ->groupBy(['ticker', $timeframeField]);
        } elseif ($timeframeField && $timeframe === 'all') {
            $builder->select($timeframeField . ' as timeframe')
                ->groupBy(['ticker', $timeframeField]);
        } else {
            $builder->select("'" . $timeframe . "' as timeframe", false)
                ->groupBy('ticker');
        }

        $rows = $builder->get()->getResultArray();

        $grid = [];
        $tickers = [];
        $timeframes = [];

        foreach ($rows as $row) {
            $ticker = strtoupper((string) ($row['ticker'] ?? ''));
            if ($ticker === '') {
                continue;
            }
            $tf = strtolower((string) ($row['timeframe'] ?? $timeframe));
            $confidence = (int) round((float) ($row['confidence'] ?? 0));
            $grid[$ticker][$tf] = $confidence;
            $tickers[$ticker] = true;
            $timeframes[$tf] = true;
        }

        $payload = [
            'timeframes' => array_values(array_keys($timeframes)),
            'tickers' => array_values(array_keys($tickers)),
            'grid' => $grid,
            'window' => $window,
        ];

        $this->cache->save($cacheKey, $payload, $this->config->cacheTtls['heatmap'] ?? 300);

        return ['cached' => false, 'payload' => $payload];
    }

    public function getTopConfidenceBySector(string $timeframe, bool $allowRefresh = false): array
    {
        $timeframe = strtolower(trim($timeframe)) ?: 'all';
        $cacheKey = sanitizeCacheKey("forecast:heatmap:sector:{$timeframe}");

        if (($cached = $this->cache->get($cacheKey)) !== null) {
            return ['cached' => true, 'payload' => $cached];
        }

        if (($this->config->heatmap['requireCache'] ?? true) && ! $allowRefresh) {
            return ['cached' => false, 'payload' => []];
        }

        $sectorField = $this->resolveSectorField();
        if ($sectorField === null) {
            return ['cached' => false, 'payload' => []];
        }

        $builder = $this->db->table('bf_investment_trade_alerts')
            ->select($sectorField . ' as sector, AVG(forecast_confidence) as confidence, COUNT(*) as sample', false)
            ->where('forecast_confidence IS NOT NULL', null, false)
            ->groupBy($sectorField)
            ->orderBy('confidence', 'DESC');

        $timeframeField = $this->resolveTimeframeField();
        if ($timeframeField && $timeframe !== 'all') {
            $builder->where($timeframeField, $timeframe);
        }

        $rows = $builder->get()->getResultArray();
        $payload = array_map(static function (array $row): array {
            return [
                'sector' => $row['sector'] ?? 'Unknown',
                'confidence' => (int) round((float) ($row['confidence'] ?? 0)),
                'sample' => (int) ($row['sample'] ?? 0),
            ];
        }, $rows);

        $this->cache->save($cacheKey, $payload, $this->config->cacheTtls['heatmap'] ?? 300);

        return ['cached' => false, 'payload' => $payload];
    }

    public function getConfidenceDistribution(string $timeframe, bool $allowRefresh = false): array
    {
        $timeframe = strtolower(trim($timeframe)) ?: 'all';
        $cacheKey = sanitizeCacheKey("forecast:heatmap:distribution:{$timeframe}");

        if (($cached = $this->cache->get($cacheKey)) !== null) {
            return ['cached' => true, 'payload' => $cached];
        }

        if (($this->config->heatmap['requireCache'] ?? true) && ! $allowRefresh) {
            return ['cached' => false, 'payload' => []];
        }

        $builder = $this->db->table('bf_investment_trade_alerts')
            ->select("CASE
                WHEN forecast_confidence BETWEEN 0 AND 40 THEN '0-40'
                WHEN forecast_confidence BETWEEN 41 AND 65 THEN '41-65'
                WHEN forecast_confidence BETWEEN 66 AND 100 THEN '66-100'
                ELSE 'unknown'
            END AS bucket", false)
            ->select('COUNT(*) as total', false)
            ->where('forecast_confidence IS NOT NULL', null, false)
            ->groupBy('bucket')
            ->orderBy('bucket', 'ASC');

        $timeframeField = $this->resolveTimeframeField();
        if ($timeframeField && $timeframe !== 'all') {
            $builder->where($timeframeField, $timeframe);
        }

        $rows = $builder->get()->getResultArray();
        $payload = array_map(static function (array $row): array {
            return [
                'bucket' => $row['bucket'] ?? 'unknown',
                'total' => (int) ($row['total'] ?? 0),
            ];
        }, $rows);

        $this->cache->save($cacheKey, $payload, $this->config->cacheTtls['heatmap'] ?? 300);

        return ['cached' => false, 'payload' => $payload];
    }

    private function resolveTimeframeField(): ?string
    {
        if ($this->db->fieldExists('timeframe', 'bf_investment_trade_alerts')) {
            return 'timeframe';
        }

        if ($this->db->fieldExists('forecast_timeframe', 'bf_investment_trade_alerts')) {
            return 'forecast_timeframe';
        }

        return null;
    }

    private function resolveUpdatedField(): ?string
    {
        if ($this->db->fieldExists('forecast_updated_at', 'bf_investment_trade_alerts')) {
            return 'forecast_updated_at';
        }

        if ($this->db->fieldExists('updated_at', 'bf_investment_trade_alerts')) {
            return 'updated_at';
        }

        return null;
    }

    private function resolveSectorField(): ?string
    {
        foreach (['sector', 'industry', 'category', 'trade_type'] as $field) {
            if ($this->db->fieldExists($field, 'bf_investment_trade_alerts')) {
                return $field;
            }
        }

        return null;
    }

    private function windowStart(string $window): string
    {
        $minutes = $this->parseWindowMinutes($window);
        $start = new \DateTimeImmutable('now');
        return $start->modify("-{$minutes} minutes")->format('Y-m-d H:i:s');
    }

    private function parseWindowMinutes(string $window): int
    {
        if (preg_match('/^(\d+)(m|h|d)$/i', $window, $matches) !== 1) {
            return 360;
        }

        $value = (int) $matches[1];
        $unit = strtolower($matches[2]);
        if ($unit === 'h') {
            return $value * 60;
        }
        if ($unit === 'd') {
            return $value * 1440;
        }

        return $value;
    }
}
