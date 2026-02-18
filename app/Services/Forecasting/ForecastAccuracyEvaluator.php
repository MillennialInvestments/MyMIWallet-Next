<?php

namespace App\Services\Forecasting;

use App\Models\InvestmentForecastAccuracyModel;
use App\Models\InvestmentForecastHistoryModel;

class ForecastAccuracyEvaluator
{
    private InvestmentForecastHistoryModel $historyModel;
    private InvestmentForecastAccuracyModel $accuracyModel;
    private MarketDataProviderInterface $provider;
    private \Config\MyMIForecasting $config;

    public function __construct(
        InvestmentForecastHistoryModel $historyModel,
        InvestmentForecastAccuracyModel $accuracyModel,
        MarketDataProviderInterface $provider,
        \Config\MyMIForecasting $config
    ) {
        $this->historyModel = $historyModel;
        $this->accuracyModel = $accuracyModel;
        $this->provider = $provider;
        $this->config = $config;
    }

    public function evaluateExpiredForecasts(int $limit = 100): array
    {
        $summary = [
            'evaluated' => 0,
            'skipped' => 0,
            'errors' => 0,
        ];

        $windows = $this->config->evaluationWindows;
        rsort($windows);
        $oldestWindow = (int) end($windows);
        $cutoff = date('Y-m-d H:i:s', strtotime("-{$oldestWindow} minutes"));

        $candidates = $this->historyModel
            ->where('recorded_at <=', $cutoff)
            ->orderBy('recorded_at', 'ASC')
            ->limit($limit)
            ->findAll(20);

        foreach ($candidates as $snapshot) {
            foreach ($windows as $windowMinutes) {
                $recordedAt = $snapshot['recorded_at'] ?? null;
                if (! $recordedAt) {
                    $summary['skipped']++;
                    continue;
                }

                $eligibleAt = strtotime($recordedAt . " +{$windowMinutes} minutes");
                if ($eligibleAt > time()) {
                    continue;
                }

                $forecastId = (int) ($snapshot['forecast_id'] ?? 0);
                if ($forecastId <= 0 || $this->accuracyModel->hasEvaluation($forecastId, $windowMinutes)) {
                    $summary['skipped']++;
                    continue;
                }

                try {
                    $evaluation = $this->evaluateSnapshot($snapshot, $windowMinutes);
                    $this->accuracyModel->insertAccuracyRow($evaluation);
                    $summary['evaluated']++;
                } catch (\Throwable $e) {
                    $summary['errors']++;
                    log_message('error', 'FORECAST: accuracy evaluation failed {ticker}: {msg}', [
                        'ticker' => $snapshot['ticker'] ?? 'unknown',
                        'msg' => $e->getMessage(),
                    ]);
                }
            }
        }

        return $summary;
    }

    public function buildAccuracySummary(string $window = '7d'): array
    {
        $days = (int) preg_replace('/\D/', '', $window);
        $days = $days > 0 ? $days : 7;
        $cutoff = date('Y-m-d H:i:s', strtotime("-{$days} days"));

        $rows = $this->accuracyModel
            ->where('created_at >=', $cutoff)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $byTimeframe = [];
        $byDirection = [];
        $byTicker = [];
        $confidenceBuckets = [
            '0-49' => ['hits' => 0, 'total' => 0],
            '50-69' => ['hits' => 0, 'total' => 0],
            '70-84' => ['hits' => 0, 'total' => 0],
            '85-100' => ['hits' => 0, 'total' => 0],
        ];
        $lastEvaluatedAt = null;

        foreach ($rows as $row) {
            $hit = ($row['hit_result'] ?? '') === 'hit' ? 1 : 0;
            $timeframe = $row['timeframe'] ?? 'n/a';
            $direction = $row['forecast_direction'] ?? 'neutral';
            $ticker = $row['ticker'] ?? 'n/a';
            $confidence = (int) ($row['confidence_score'] ?? 0);

            $byTimeframe[$timeframe]['hits'] = ($byTimeframe[$timeframe]['hits'] ?? 0) + $hit;
            $byTimeframe[$timeframe]['total'] = ($byTimeframe[$timeframe]['total'] ?? 0) + 1;

            $byDirection[$direction]['hits'] = ($byDirection[$direction]['hits'] ?? 0) + $hit;
            $byDirection[$direction]['total'] = ($byDirection[$direction]['total'] ?? 0) + 1;

            $byTicker[$ticker]['hits'] = ($byTicker[$ticker]['hits'] ?? 0) + $hit;
            $byTicker[$ticker]['total'] = ($byTicker[$ticker]['total'] ?? 0) + 1;

            if ($confidence >= 85) {
                $confidenceBuckets['85-100']['total']++;
                $confidenceBuckets['85-100']['hits'] += $hit;
            } elseif ($confidence >= 70) {
                $confidenceBuckets['70-84']['total']++;
                $confidenceBuckets['70-84']['hits'] += $hit;
            } elseif ($confidence >= 50) {
                $confidenceBuckets['50-69']['total']++;
                $confidenceBuckets['50-69']['hits'] += $hit;
            } else {
                $confidenceBuckets['0-49']['total']++;
                $confidenceBuckets['0-49']['hits'] += $hit;
            }

            if (! $lastEvaluatedAt || ($row['created_at'] ?? '') > $lastEvaluatedAt) {
                $lastEvaluatedAt = $row['created_at'] ?? $lastEvaluatedAt;
            }
        }

        $accuracyByTimeframe = $this->formatHitRates($byTimeframe);
        $accuracyByDirection = $this->formatHitRates($byDirection);
        $tickerRates = $this->formatHitRates($byTicker);

        usort($tickerRates, static fn ($a, $b) => $b['hit_rate'] <=> $a['hit_rate']);
        $topTickers = array_slice($tickerRates, 0, 5);
        $worstTickers = array_slice(array_reverse($tickerRates), 0, 5);

        return [
            'window' => $window,
            'accuracyByTimeframe' => $accuracyByTimeframe,
            'accuracyByDirection' => $accuracyByDirection,
            'rollingHitRate' => [
                '7d' => $this->computeRollingHitRate(7),
                '30d' => $this->computeRollingHitRate(30),
            ],
            'confidenceBuckets' => $this->formatBuckets($confidenceBuckets),
            'topTickers' => $topTickers,
            'worstTickers' => $worstTickers,
            'lastEvaluatedAt' => $lastEvaluatedAt,
        ];
    }

    private function evaluateSnapshot(array $snapshot, int $windowMinutes): array
    {
        $ticker = $snapshot['ticker'] ?? '';
        $timeframe = $snapshot['timeframe'] ?? '5m';
        $target = isset($snapshot['target_price']) ? (float) $snapshot['target_price'] : null;
        $direction = $snapshot['forecast_direction'] ?? 'neutral';
        $rangeLow = isset($snapshot['range_low']) ? (float) $snapshot['range_low'] : null;
        $rangeHigh = isset($snapshot['range_high']) ? (float) $snapshot['range_high'] : null;

        $response = $this->provider->fetchTimeSeries($ticker, $timeframe);
        $candles = $response['candles'] ?? [];
        $minutes = $this->timeframeToMinutes($timeframe);
        $sliceCount = max(1, (int) ceil($windowMinutes / max($minutes, 1)));
        $slice = array_slice($candles, -$sliceCount);

        $highs = array_column($slice, 'high');
        $lows = array_column($slice, 'low');
        $closes = array_column($slice, 'close');

        $maxHigh = ! empty($highs) ? max($highs) : null;
        $minLow = ! empty($lows) ? min($lows) : null;
        $endClose = ! empty($closes) ? end($closes) : null;

        $entry = $target ?? $endClose ?? 0.0;
        $hitResult = 'unknown';

        if ($direction === 'bullish' && $target !== null && $maxHigh !== null) {
            $hitResult = $maxHigh >= $target ? 'hit' : 'miss';
        } elseif ($direction === 'bearish' && $target !== null && $minLow !== null) {
            $hitResult = $minLow <= $target ? 'hit' : 'miss';
        } elseif ($direction === 'neutral' && $rangeLow !== null && $rangeHigh !== null && $maxHigh !== null && $minLow !== null) {
            $hitResult = ($minLow >= $rangeLow && $maxHigh <= $rangeHigh) ? 'hit' : 'miss';
        }

        $mfe = null;
        $mae = null;
        if ($maxHigh !== null && $minLow !== null) {
            if ($direction === 'bearish') {
                $mfe = $entry - $minLow;
                $mae = $maxHigh - $entry;
            } else {
                $mfe = $maxHigh - $entry;
                $mae = $entry - $minLow;
            }
        }

        return [
            'forecast_id' => $snapshot['forecast_id'] ?? null,
            'ticker' => $ticker,
            'timeframe' => $timeframe,
            'evaluation_window' => $windowMinutes,
            'forecast_direction' => $direction,
            'confidence_score' => (int) ($snapshot['confidence_score'] ?? 0),
            'target_price' => $target,
            'range_low' => $rangeLow,
            'range_high' => $rangeHigh,
            'hit_result' => $hitResult,
            'mfe' => $mfe,
            'mae' => $mae,
            'window_start' => $snapshot['recorded_at'] ?? null,
            'window_end' => date('Y-m-d H:i:s'),
            'evaluated_at' => date('Y-m-d H:i:s'),
            'notes' => $response['status'] ?? null,
            'created_at' => date('Y-m-d H:i:s'),
        ];
    }

    private function timeframeToMinutes(string $timeframe): int
    {
        if (preg_match('/(\d+)([mhd])/', $timeframe, $matches)) {
            $value = (int) $matches[1];
            $unit = $matches[2];
            return match ($unit) {
                'h' => $value * 60,
                'd' => $value * 1440,
                default => $value,
            };
        }

        return 5;
    }

    private function formatHitRates(array $groups): array
    {
        $rows = [];
        foreach ($groups as $label => $data) {
            $total = (int) ($data['total'] ?? 0);
            $hits = (int) ($data['hits'] ?? 0);
            $rows[] = [
                'label' => $label,
                'hit_rate' => $total > 0 ? round(($hits / $total) * 100, 1) : 0,
                'hits' => $hits,
                'total' => $total,
            ];
        }

        return $rows;
    }

    private function formatBuckets(array $buckets): array
    {
        $rows = [];
        foreach ($buckets as $label => $data) {
            $total = (int) ($data['total'] ?? 0);
            $hits = (int) ($data['hits'] ?? 0);
            $rows[] = [
                'label' => $label,
                'hit_rate' => $total > 0 ? round(($hits / $total) * 100, 1) : 0,
                'hits' => $hits,
                'total' => $total,
            ];
        }

        return $rows;
    }

    private function computeRollingHitRate(int $days): float
    {
        $cutoff = date('Y-m-d H:i:s', strtotime("-{$days} days"));
        $rows = $this->accuracyModel
            ->where('created_at >=', $cutoff)
            ->findAll(20);

        $total = count($rows);
        if ($total === 0) {
            return 0.0;
        }

        $hits = 0;
        foreach ($rows as $row) {
            if (($row['hit_result'] ?? '') === 'hit') {
                $hits++;
            }
        }

        return round(($hits / $total) * 100, 1);
    }
}
