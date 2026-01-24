<?php

namespace App\Services\Forecasting;

use App\Models\InvestmentForecastAccuracyModel;
use App\Models\InvestmentPriceForecastModel;
use CodeIgniter\Cache\CacheInterface;
use CodeIgniter\Database\BaseConnection;
use Config\MyMIForecasting;
use Config\Services;

class ForecastAccuracyEvaluator
{
    private MarketDataProviderInterface $marketDataProvider;
    private InvestmentPriceForecastModel $forecastModel;
    private InvestmentForecastAccuracyModel $accuracyModel;
    private CacheInterface $cache;
    private BaseConnection $db;
    private MyMIForecasting $config;

    public function __construct(
        MarketDataProviderInterface $marketDataProvider,
        ?InvestmentPriceForecastModel $forecastModel = null,
        ?InvestmentForecastAccuracyModel $accuracyModel = null,
        ?CacheInterface $cache = null,
        ?BaseConnection $db = null,
        ?MyMIForecasting $config = null
    ) {
        $this->marketDataProvider = $marketDataProvider;
        $this->forecastModel = $forecastModel ?? model(InvestmentPriceForecastModel::class);
        $this->accuracyModel = $accuracyModel ?? model(InvestmentForecastAccuracyModel::class);
        $this->cache = $cache ?? Services::cache();
        $this->db = $db ?? db_connect();
        $this->config = $config ?? config('MyMIForecasting');
    }

    public function evaluateDueForecasts(int $limit = 200): array
    {
        if (! ($this->config->features['accuracyTracking'] ?? true)) {
            return ['status' => 'disabled', 'processed' => 0, 'inserted' => 0];
        }

        $windows = $this->config->accuracy['evaluationMinutes'] ?? [15, 30, 60, 240, 1440];
        sort($windows);
        $minWindow = (int) ($windows[0] ?? 15);
        $limit = $limit > 0 ? $limit : ($this->config->accuracy['batchLimit'] ?? 200);

        $cutoff = (new \DateTimeImmutable('now'))->modify("-{$minWindow} minutes")->format('Y-m-d H:i:s');
        $forecasts = $this->forecastModel->where('updated_at <=', $cutoff)
            ->orderBy('updated_at', 'ASC')
            ->limit($limit)
            ->findAll();

        $processed = 0;
        $inserted = 0;
        $skipped = 0;

        foreach ($forecasts as $forecast) {
            $processed++;
            $forecastId = (int) ($forecast['id'] ?? 0);
            $updatedAt = $forecast['updated_at'] ?? $forecast['created_at'] ?? null;
            if (! $forecastId || ! $updatedAt) {
                $skipped++;
                continue;
            }

            $forecastTime = new \DateTimeImmutable($updatedAt);
            $marketData = $this->marketDataProvider->fetchTimeSeries($forecast['ticker'], $forecast['timeframe']);
            $candles = $marketData['candles'] ?? [];

            foreach ($windows as $windowMinutes) {
                if ($forecastTime->modify("+{$windowMinutes} minutes") > new \DateTimeImmutable('now')) {
                    continue;
                }

                if ($this->alreadyEvaluated($forecastId, (int) $windowMinutes)) {
                    continue;
                }

                $slice = $this->filterCandles($candles, $forecastTime, (int) $windowMinutes);
                if (empty($slice)) {
                    $skipped++;
                    continue;
                }

                $metrics = $this->calculateMetrics($forecast, $slice);
                $payload = [
                    'forecast_id' => $forecastId,
                    'ticker' => strtoupper((string) ($forecast['ticker'] ?? '')),
                    'timeframe' => (string) ($forecast['timeframe'] ?? ''),
                    'forecast_direction' => (string) ($forecast['forecast_direction'] ?? 'neutral'),
                    'forecast_target' => $forecast['target_price'] ?? null,
                    'actual_price' => $metrics['actual_price'],
                    'hit_target' => $metrics['hit_target'],
                    'max_favorable_excursion' => $metrics['mfe'],
                    'max_adverse_excursion' => $metrics['mae'],
                    'evaluation_minutes' => (int) $windowMinutes,
                    'recorded_at' => (new \DateTimeImmutable('now'))->format('Y-m-d H:i:s'),
                ];

                if ($this->accuracyModel->insert($payload)) {
                    $inserted++;
                }
            }
        }

        return [
            'status' => 'ok',
            'processed' => $processed,
            'inserted' => $inserted,
            'skipped' => $skipped,
        ];
    }

    public function getAccuracyDashboardData(int $days = 30): array
    {
        $cacheKey = sanitizeCacheKey("forecast:accuracy:dashboard:{$days}");
        if (($cached = $this->cache->get($cacheKey)) !== null) {
            return $cached;
        }

        $since = (new \DateTimeImmutable('now'))->modify("-{$days} days")->format('Y-m-d H:i:s');

        $payload = [
            'rolling' => [
                '7d' => $this->getRollingStats(7),
                '30d' => $this->getRollingStats(30),
            ],
            'byTimeframe' => $this->getGroupStats('timeframe', $since),
            'byDirection' => $this->getGroupStats('forecast_direction', $since),
            'confidenceCorrelation' => $this->getConfidenceCorrelation($since),
        ];

        $ttl = $this->config->cacheTtls['accuracy'] ?? 300;
        $this->cache->save($cacheKey, $payload, $ttl);

        return $payload;
    }

    private function alreadyEvaluated(int $forecastId, int $windowMinutes): bool
    {
        return (bool) $this->accuracyModel
            ->where('forecast_id', $forecastId)
            ->where('evaluation_minutes', $windowMinutes)
            ->countAllResults();
    }

    private function filterCandles(array $candles, \DateTimeImmutable $start, int $windowMinutes): array
    {
        $end = $start->modify("+{$windowMinutes} minutes");
        return array_values(array_filter($candles, static function (array $candle) use ($start, $end): bool {
            $time = isset($candle['time']) ? new \DateTimeImmutable($candle['time']) : null;
            if (! $time) {
                return false;
            }
            return $time >= $start && $time <= $end;
        }));
    }

    private function calculateMetrics(array $forecast, array $candles): array
    {
        $highs = array_column($candles, 'high');
        $lows = array_column($candles, 'low');
        $last = end($candles);
        $actualPrice = (float) ($last['close'] ?? $last['price'] ?? 0);

        $baseline = $this->resolveBaseline($forecast, $actualPrice);
        $maxHigh = ! empty($highs) ? max($highs) : $actualPrice;
        $minLow = ! empty($lows) ? min($lows) : $actualPrice;
        $direction = $forecast['forecast_direction'] ?? 'neutral';
        $target = isset($forecast['target_price']) ? (float) $forecast['target_price'] : null;

        $hitTarget = 0;
        if ($target !== null) {
            if ($direction === 'bullish') {
                $hitTarget = $maxHigh >= $target ? 1 : 0;
            } elseif ($direction === 'bearish') {
                $hitTarget = $minLow <= $target ? 1 : 0;
            }
        }

        if ($direction === 'bearish') {
            $mfe = $baseline - $minLow;
            $mae = $maxHigh - $baseline;
        } else {
            $mfe = $maxHigh - $baseline;
            $mae = $baseline - $minLow;
        }

        return [
            'actual_price' => $actualPrice,
            'hit_target' => $hitTarget,
            'mfe' => max(0, $mfe),
            'mae' => max(0, $mae),
        ];
    }

    private function resolveBaseline(array $forecast, float $fallback): float
    {
        $low = isset($forecast['range_low']) ? (float) $forecast['range_low'] : null;
        $high = isset($forecast['range_high']) ? (float) $forecast['range_high'] : null;
        $target = isset($forecast['target_price']) ? (float) $forecast['target_price'] : null;

        if ($low !== null && $high !== null && $low > 0 && $high > 0) {
            return ($low + $high) / 2;
        }

        if ($target !== null && $target > 0) {
            return $target;
        }

        return $fallback;
    }

    private function getRollingStats(int $days): array
    {
        $since = (new \DateTimeImmutable('now'))->modify("-{$days} days")->format('Y-m-d H:i:s');
        $builder = $this->db->table('bf_investment_forecast_accuracy')
            ->select('COUNT(*) as total, SUM(hit_target) as hits, AVG(max_favorable_excursion) as avg_mfe, AVG(max_adverse_excursion) as avg_mae', false)
            ->where('recorded_at >=', $since);
        $row = $builder->get()->getRowArray() ?? [];

        $total = (int) ($row['total'] ?? 0);
        $hits = (int) ($row['hits'] ?? 0);

        return [
            'total' => $total,
            'hits' => $hits,
            'hitRate' => $total > 0 ? round(($hits / $total) * 100, 2) : 0,
            'avgMfe' => round((float) ($row['avg_mfe'] ?? 0), 4),
            'avgMae' => round((float) ($row['avg_mae'] ?? 0), 4),
        ];
    }

    private function getGroupStats(string $field, string $since): array
    {
        $builder = $this->db->table('bf_investment_forecast_accuracy')
            ->select($field . ' as label, COUNT(*) as total, SUM(hit_target) as hits, AVG(max_favorable_excursion) as avg_mfe, AVG(max_adverse_excursion) as avg_mae', false)
            ->where('recorded_at >=', $since)
            ->groupBy($field)
            ->orderBy('total', 'DESC');

        $rows = $builder->get()->getResultArray();

        return array_map(static function (array $row): array {
            $total = (int) ($row['total'] ?? 0);
            $hits = (int) ($row['hits'] ?? 0);

            return [
                'label' => $row['label'] ?? 'unknown',
                'total' => $total,
                'hits' => $hits,
                'hitRate' => $total > 0 ? round(($hits / $total) * 100, 2) : 0,
                'avgMfe' => round((float) ($row['avg_mfe'] ?? 0), 4),
                'avgMae' => round((float) ($row['avg_mae'] ?? 0), 4),
            ];
        }, $rows);
    }

    private function getConfidenceCorrelation(string $since): array
    {
        if (! $this->db->tableExists('bf_investment_price_forecasts')) {
            return [];
        }

        $builder = $this->db->table('bf_investment_forecast_accuracy as fa')
            ->select("CASE
                WHEN pf.confidence_score BETWEEN 0 AND 40 THEN '0-40'
                WHEN pf.confidence_score BETWEEN 41 AND 65 THEN '41-65'
                WHEN pf.confidence_score BETWEEN 66 AND 100 THEN '66-100'
                ELSE 'unknown'
            END AS bucket", false)
            ->select('COUNT(*) as total, SUM(fa.hit_target) as hits', false)
            ->join('bf_investment_price_forecasts as pf', 'pf.id = fa.forecast_id', 'left')
            ->where('fa.recorded_at >=', $since)
            ->groupBy('bucket')
            ->orderBy('bucket', 'ASC');

        $rows = $builder->get()->getResultArray();

        return array_map(static function (array $row): array {
            $total = (int) ($row['total'] ?? 0);
            $hits = (int) ($row['hits'] ?? 0);

            return [
                'bucket' => $row['bucket'] ?? 'unknown',
                'total' => $total,
                'hitRate' => $total > 0 ? round(($hits / $total) * 100, 2) : 0,
            ];
        }, $rows);
    }
}
