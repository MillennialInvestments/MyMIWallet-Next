<?php

namespace App\Services\Forecasting;

use App\Models\AlertsModel;
use App\Models\InvestmentPriceForecastModel;
use CodeIgniter\Cache\CacheInterface;

class MyMIForecaster
{
    private MarketDataProviderInterface $provider;
    private InvestmentPriceForecastModel $forecastModel;
    private AlertsModel $alertsModel;
    private CacheInterface $cache;
    private \Config\MyMIForecasting $config;

    public function __construct(
        MarketDataProviderInterface $provider,
        InvestmentPriceForecastModel $forecastModel,
        AlertsModel $alertsModel,
        CacheInterface $cache,
        \Config\MyMIForecasting $config
    ) {
        $this->provider = $provider;
        $this->forecastModel = $forecastModel;
        $this->alertsModel = $alertsModel;
        $this->cache = $cache;
        $this->config = $config;
    }

    public function forecastForAlert(int $alertId, string $ticker, array $options = []): array
    {
        $timeframes = $options['timeframes'] ?? $this->config->defaultTimeframes;
        $responses = [];

        foreach ($timeframes as $timeframe) {
            $responses[$timeframe] = $this->forecastForTicker($ticker, [$timeframe], ['alert_id' => $alertId]);
        }

        return $responses;
    }

    public function forecastForTicker(string $ticker, array $timeframes = [], array $options = []): array
    {
        $timeframes = $timeframes ?: $this->config->defaultTimeframes;
        $results = [];

        foreach ($timeframes as $timeframe) {
            $results[$timeframe] = $this->buildForecast($ticker, $timeframe, $options);
        }

        return $results;
    }

    public function refreshForecastsForOpenAlerts(int $limit = 50): array
    {
        $alerts = $this->alertsModel
            ->where('status', 'Opened')
            ->orderBy('forecast_updated_at', 'ASC')
            ->limit($limit)
            ->findAll();

        $summary = [
            'processed' => [],
            'failures' => [],
            'rate_limited' => 0,
        ];

        foreach ($alerts as $alert) {
            $ticker = $alert['ticker'] ?? null;
            if (! $ticker) {
                continue;
            }

            $result = $this->forecastForAlert((int) $alert['id'], $ticker);
            $summary['processed'][] = $ticker;

            foreach ($result as $timeframe => $payload) {
                if (($payload['status'] ?? '') === 'rate_limited') {
                    $summary['rate_limited']++;
                }
            }
        }

        return $summary;
    }

    public function getLatestForecast(string $ticker, string $timeframe = '5m'): ?array
    {
        $cacheKey = $this->cacheKey($ticker, $timeframe);
        $cached = $this->cache->get($cacheKey);

        if ($cached) {
            return $cached;
        }

        $row = $this->forecastModel->getLatestByTickerTimeframe($ticker, $timeframe);
        if ($row) {
            $this->cache->save($cacheKey, $row, $this->config->cacheTtls['latestForecast']);
        }

        return $row;
    }

    public function getForecastHighlights(): array
    {
        $cacheKey = 'forecast_highlights';
        $cached = $this->cache->get($cacheKey);
        if ($cached) {
            return $cached;
        }

        $high = (int) ($this->config->confidenceThresholds['high'] ?? 70);

        $bullish = $this->alertsModel
            ->where('forecast_direction', 'bullish')
            ->where('forecast_confidence >=', $high)
            ->orderBy('forecast_confidence', 'DESC')
            ->limit(10)
            ->findAll();

        $bearish = $this->alertsModel
            ->where('forecast_direction', 'bearish')
            ->where('forecast_confidence >=', $high)
            ->orderBy('forecast_confidence', 'DESC')
            ->limit(10)
            ->findAll();

        $recent = $this->alertsModel
            ->where('forecast_updated_at >=', date('Y-m-d H:i:s', strtotime('-60 minutes')))
            ->orderBy('forecast_updated_at', 'DESC')
            ->limit(10)
            ->findAll();

        $payload = [
            'bullish' => $bullish,
            'bearish' => $bearish,
            'recent'  => $recent,
        ];

        $this->cache->save($cacheKey, $payload, $this->config->cacheTtls['highlights']);

        return $payload;
    }

    public function enqueueForecastJob(int $alertId, string $ticker, array $options = []): bool
    {
        $payload = [
            'alert_id' => $alertId,
            'ticker'   => strtoupper($ticker),
            'timeframes' => $options['timeframes'] ?? $this->config->defaultTimeframes,
        ];

        $db = \Config\Database::connect();
        $result = $db->table('bf_investment_forecast_jobs')->insert([
            'alert_id'     => $alertId,
            'ticker'       => strtoupper($ticker),
            'status'       => 'queued',
            'attempts'     => 0,
            'run_after'    => date('Y-m-d H:i:s'),
            'payload_json' => json_encode($payload),
            'created_at'   => date('Y-m-d H:i:s'),
        ]);

        return (bool) $result;
    }

    public function processQueuedJobs(int $limit = 50): array
    {
        $db = \Config\Database::connect();
        $jobs = $db->table('bf_investment_forecast_jobs')
            ->where('status', 'queued')
            ->where('run_after <=', date('Y-m-d H:i:s'))
            ->orderBy('created_at', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $summary = [
            'processed' => [],
            'failures' => [],
        ];

        foreach ($jobs as $job) {
            $jobId = (int) $job['id'];
            $payload = json_decode($job['payload_json'] ?? '{}', true) ?? [];
            $ticker = $payload['ticker'] ?? $job['ticker'] ?? '';
            $alertId = (int) ($payload['alert_id'] ?? $job['alert_id'] ?? 0);
            $timeframes = $payload['timeframes'] ?? $this->config->defaultTimeframes;

            $db->table('bf_investment_forecast_jobs')
                ->where('id', $jobId)
                ->update([
                    'status' => 'running',
                    'attempts' => (int) ($job['attempts'] ?? 0) + 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            try {
                $this->forecastForAlert($alertId, $ticker, ['timeframes' => $timeframes]);
                $db->table('bf_investment_forecast_jobs')
                    ->where('id', $jobId)
                    ->update([
                        'status' => 'success',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                $summary['processed'][] = $ticker;
            } catch (\Throwable $e) {
                $db->table('bf_investment_forecast_jobs')
                    ->where('id', $jobId)
                    ->update([
                        'status' => 'failed',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
                $summary['failures'][] = $ticker;
                log_message('error', 'FORECAST: job failed {ticker}: {msg}', [
                    'ticker' => $ticker,
                    'msg' => $e->getMessage(),
                ]);
            }
        }

        return $summary;
    }

    private function buildForecast(string $ticker, string $timeframe, array $options = []): array
    {
        $ticker = strtoupper(trim($ticker));
        $alertId = (int) ($options['alert_id'] ?? 0);

        log_message('info', 'FORECAST: start {ticker} {timeframe}', [
            'ticker' => $ticker,
            'timeframe' => $timeframe,
        ]);

        $response = $this->provider->fetchTimeSeries($ticker, $timeframe);
        if (($response['status'] ?? '') !== 'ok' || empty($response['candles'])) {
            return $this->storeNeutralForecast($alertId, $ticker, $timeframe, $response);
        }

        $candles = $response['candles'];
        $closes = array_column($candles, 'close');
        $highs = array_column($candles, 'high');
        $lows = array_column($candles, 'low');
        $volumes = array_column($candles, 'volume');
        $lastClose = end($closes) ?: 0.0;

        $ema9Series = $this->emaSeries($closes, 9);
        $ema21Series = $this->emaSeries($closes, 21);
        $ema9 = end($ema9Series) ?: 0.0;
        $ema21 = end($ema21Series) ?: 0.0;
        $ema21Slope = $this->seriesSlope($ema21Series);

        $trendBias = 0.0;
        if ($ema9 > $ema21 && $ema21Slope > 0) {
            $trendBias = 1.0;
        } elseif ($ema9 < $ema21 && $ema21Slope < 0) {
            $trendBias = -1.0;
        }
        $trendStrength = min(1.0, abs($ema9 - $ema21) / max($lastClose, 0.0001));

        $rsi = $this->rsi($closes, 14);
        $momentumBias = 0.0;
        if ($rsi > 55) {
            $momentumBias = 1.0;
        } elseif ($rsi < 45) {
            $momentumBias = -1.0;
        }
        $momentumStrength = min(1.0, abs($rsi - 50) / 50);

        $atr = $this->atr($highs, $lows, $closes, 14);
        $confidence = $this->computeConfidence([
            'trendBias' => $trendBias,
            'momentumBias' => $momentumBias,
            'emaSeparation' => $trendStrength,
            'atr' => $atr,
            'price' => $lastClose,
            'volume' => end($volumes) ?: 0,
            'volumeAvg' => $this->sma($volumes, 20),
        ]);

        $score = $this->computeScore($trendBias, $momentumBias);
        $direction = $this->resolveDirection($score);

        $rangeMultiplier = 1.25;
        $rangeLow = $lastClose - ($atr * $rangeMultiplier);
        $rangeHigh = $lastClose + ($atr * $rangeMultiplier);

        $donchian = $this->donchian($highs, $lows, 20);
        $target = $lastClose;
        if ($direction === 'bullish') {
            $target = min($rangeHigh, $donchian['high'] + (0.25 * $atr));
        } elseif ($direction === 'bearish') {
            $target = max($rangeLow, $donchian['low'] - (0.25 * $atr));
        }

        $payload = [
            'alert_id'            => $alertId ?: null,
            'ticker'              => $ticker,
            'timeframe'           => $timeframe,
            'forecast_direction'  => $direction,
            'target_price'        => $target ?: null,
            'range_low'           => $rangeLow ?: null,
            'range_high'          => $rangeHigh ?: null,
            'confidence_score'    => $confidence,
            'signal_score'        => $score,
            'indicators_json'     => json_encode([
                'trend' => [
                    'ema9' => $ema9,
                    'ema21' => $ema21,
                    'slope' => $ema21Slope,
                    'bias' => $trendBias,
                    'strength' => $trendStrength,
                ],
                'momentum' => [
                    'rsi' => $rsi,
                    'bias' => $momentumBias,
                    'strength' => $momentumStrength,
                ],
                'volatility' => [
                    'atr' => $atr,
                ],
                'range' => [
                    'low' => $rangeLow,
                    'high' => $rangeHigh,
                ],
                'support_resistance' => [
                    'support' => $donchian['low'],
                    'resistance' => $donchian['high'],
                ],
                'source' => $this->config->defaultDataSource,
            ]),
            'data_source'         => $this->config->defaultDataSource,
            'created_at'          => date('Y-m-d H:i:s'),
            'updated_at'          => date('Y-m-d H:i:s'),
        ];

        $forecastId = $this->forecastModel->upsertLatestForecast($ticker, $timeframe, $payload);
        $payload['id'] = $forecastId;

        $this->forecastModel->appendHistorySnapshot($forecastId, $payload);
        $this->updateAlertForecastFields($alertId, $payload);

        $this->cache->save($this->cacheKey($ticker, $timeframe), $payload, $this->config->cacheTtls['latestForecast']);

        log_message('info', 'FORECAST: completed {ticker} {timeframe}', [
            'ticker' => $ticker,
            'timeframe' => $timeframe,
            'direction' => $direction,
            'confidence' => $confidence,
        ]);

        return $payload;
    }

    private function storeNeutralForecast(int $alertId, string $ticker, string $timeframe, array $response): array
    {
        log_message('warning', 'FORECAST: missing data for {ticker} {timeframe}', [
            'ticker' => $ticker,
            'timeframe' => $timeframe,
            'status' => $response['status'] ?? 'unknown',
        ]);

        $payload = [
            'alert_id'            => $alertId ?: null,
            'ticker'              => $ticker,
            'timeframe'           => $timeframe,
            'forecast_direction'  => 'neutral',
            'target_price'        => null,
            'range_low'           => null,
            'range_high'          => null,
            'confidence_score'    => 0,
            'signal_score'        => 0,
            'indicators_json'     => json_encode([
                'status' => $response['status'] ?? 'missing',
                'message' => $response['message'] ?? 'No data',
            ]),
            'data_source'         => $this->config->defaultDataSource,
            'created_at'          => date('Y-m-d H:i:s'),
            'updated_at'          => date('Y-m-d H:i:s'),
        ];

        $forecastId = $this->forecastModel->upsertLatestForecast($ticker, $timeframe, $payload);
        $payload['id'] = $forecastId;
        $this->forecastModel->appendHistorySnapshot($forecastId, $payload);
        $this->updateAlertForecastFields($alertId, $payload);

        return $payload + ['status' => $response['status'] ?? 'missing'];
    }

    private function updateAlertForecastFields(int $alertId, array $payload): void
    {
        if ($alertId <= 0) {
            return;
        }

        $this->alertsModel->update($alertId, [
            'latest_forecast_id'   => $payload['id'] ?? null,
            'forecast_confidence'  => $payload['confidence_score'] ?? 0,
            'forecast_direction'   => $payload['forecast_direction'] ?? 'neutral',
            'forecast_target_price'=> $payload['target_price'],
            'forecast_range_low'   => $payload['range_low'],
            'forecast_range_high'  => $payload['range_high'],
            'forecast_updated_at'  => $payload['updated_at'] ?? date('Y-m-d H:i:s'),
        ]);

        log_message('info', 'FORECAST: alert updated {alertId}', ['alertId' => $alertId]);
    }

    private function computeScore(float $trendBias, float $momentumBias): float
    {
        $weights = $this->config->weights;
        $trendWeight = (float) ($weights['trend'] ?? 0.6);
        $momentumWeight = (float) ($weights['momentum'] ?? 0.4);

        $score = ($trendWeight * $trendBias) + ($momentumWeight * $momentumBias);
        return max(-1, min(1, $score));
    }

    private function resolveDirection(float $score): string
    {
        if ($score >= 0.25) {
            return 'bullish';
        }

        if ($score <= -0.25) {
            return 'bearish';
        }

        return 'neutral';
    }

    private function computeConfidence(array $context): int
    {
        $confidence = 50;
        $trendBias = $context['trendBias'];
        $momentumBias = $context['momentumBias'];

        if ($trendBias !== 0 && $trendBias === $momentumBias) {
            $confidence += 15;
        }

        if (($context['emaSeparation'] ?? 0) > ($this->config->thresholds['emaSeparation'] ?? 0.003)) {
            $confidence += 10;
        }

        if (($context['volume'] ?? 0) > ($context['volumeAvg'] ?? 0)) {
            $confidence += 10;
        }

        if (($context['atr'] ?? 0) / max(($context['price'] ?? 1), 0.0001) > ($this->config->thresholds['highVolatility'] ?? 0.04)) {
            $confidence -= 15;
        }

        if ($trendBias !== 0 && $momentumBias !== 0 && $trendBias !== $momentumBias) {
            $confidence -= 20;
        }

        return (int) max(0, min(100, $confidence));
    }

    private function ema(array $values, int $period): float
    {
        if (count($values) < $period) {
            return (float) (end($values) ?: 0);
        }

        $k = 2 / ($period + 1);
        $ema = array_sum(array_slice($values, 0, $period)) / $period;
        foreach (array_slice($values, $period) as $value) {
            $ema = ($value * $k) + ($ema * (1 - $k));
        }

        return (float) $ema;
    }

    private function rsi(array $values, int $period): float
    {
        if (count($values) < $period + 1) {
            return 50.0;
        }

        $gains = 0.0;
        $losses = 0.0;
        $slice = array_slice($values, -($period + 1));

        for ($i = 1; $i < count($slice); $i++) {
            $delta = $slice[$i] - $slice[$i - 1];
            if ($delta >= 0) {
                $gains += $delta;
            } else {
                $losses += abs($delta);
            }
        }

        if ($losses == 0.0) {
            return 100.0;
        }

        $rs = ($gains / $period) / max(($losses / $period), 0.0001);
        return 100 - (100 / (1 + $rs));
    }

    private function atr(array $highs, array $lows, array $closes, int $period): float
    {
        $count = count($closes);
        if ($count < $period + 1) {
            return 0.0;
        }

        $trs = [];
        for ($i = 1; $i < $count; $i++) {
            $tr = max(
                $highs[$i] - $lows[$i],
                abs($highs[$i] - $closes[$i - 1]),
                abs($lows[$i] - $closes[$i - 1])
            );
            $trs[] = $tr;
        }

        $slice = array_slice($trs, -$period);
        return array_sum($slice) / max(count($slice), 1);
    }

    private function sma(array $values, int $period): float
    {
        if (count($values) < $period) {
            return (float) (end($values) ?: 0);
        }
        $slice = array_slice($values, -$period);
        return array_sum($slice) / $period;
    }

    private function emaSeries(array $values, int $period): array
    {
        $series = [];
        if (count($values) < $period) {
            foreach ($values as $value) {
                $series[] = (float) $value;
            }
            return $series;
        }

        $k = 2 / ($period + 1);
        $ema = array_sum(array_slice($values, 0, $period)) / $period;
        $series[] = $ema;

        foreach (array_slice($values, $period) as $value) {
            $ema = ($value * $k) + ($ema * (1 - $k));
            $series[] = $ema;
        }

        return $series;
    }

    private function seriesSlope(array $series): float
    {
        $count = count($series);
        if ($count < 2) {
            return 0.0;
        }
        $delta = $series[$count - 1] - $series[$count - 2];
        if ($delta > 0) {
            return 1.0;
        }
        if ($delta < 0) {
            return -1.0;
        }
        return 0.0;
    }

    private function donchian(array $highs, array $lows, int $period): array
    {
        $highSlice = array_slice($highs, -$period);
        $lowSlice = array_slice($lows, -$period);
        return [
            'high' => max($highSlice),
            'low'  => min($lowSlice),
        ];
    }

    private function cacheKey(string $ticker, string $timeframe): string
    {
        return 'forecast_' . strtolower($ticker) . '_' . strtolower($timeframe);
    }
}
