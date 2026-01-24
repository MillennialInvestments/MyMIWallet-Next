<?php

namespace App\Services\Forecasting;

use App\Models\AlertsModel;
use App\Models\InvestmentPriceForecastModel;

class ForecastAggregationService
{
    private InvestmentPriceForecastModel $forecastModel;
    private AlertsModel $alertsModel;
    private \Config\MyMIForecasting $config;

    public function __construct(
        InvestmentPriceForecastModel $forecastModel,
        AlertsModel $alertsModel,
        \Config\MyMIForecasting $config
    ) {
        $this->forecastModel = $forecastModel;
        $this->alertsModel = $alertsModel;
        $this->config = $config;
    }

    public function buildHeatmap(string $primaryTimeframe = '5m', int $windowMinutes = 60): array
    {
        $timeframes = $this->config->defaultTimeframes;
        if (! in_array($primaryTimeframe, $timeframes, true)) {
            $timeframes[] = $primaryTimeframe;
        }

        $tickers = $this->alertsModel
            ->select('ticker')
            ->where('status', 'Opened')
            ->groupBy('ticker')
            ->orderBy('ticker', 'ASC')
            ->findColumn('ticker');

        $tickers = array_values(array_filter(array_unique($tickers ?? [])));
        if (empty($tickers)) {
            $tickers = $this->forecastModel
                ->select('ticker')
                ->groupBy('ticker')
                ->orderBy('ticker', 'ASC')
                ->findColumn('ticker');
            $tickers = array_values(array_filter(array_unique($tickers ?? [])));
        }

        $forecasts = $this->forecastModel->getLatestForecastsForTickers($tickers, $timeframes);
        $windowStart = date('Y-m-d H:i:s', strtotime("-{$windowMinutes} minutes"));

        $matrix = [];
        $confidenceValues = [];
        $primaryForecasts = [];

        foreach ($tickers as $ticker) {
            $row = [
                'ticker' => $ticker,
                'timeframes' => [],
            ];

            foreach ($timeframes as $timeframe) {
                $forecast = $this->matchForecast($forecasts, $ticker, $timeframe);
                if ($forecast && ! empty($forecast['updated_at']) && $forecast['updated_at'] < $windowStart) {
                    $forecast = null;
                }

                $confidence = (int) ($forecast['confidence_score'] ?? 0);
                $row['timeframes'][$timeframe] = [
                    'confidence' => $confidence,
                    'direction' => $forecast['forecast_direction'] ?? 'neutral',
                    'updated_at' => $forecast['updated_at'] ?? null,
                ];

                $confidenceValues[] = $confidence;

                if ($timeframe === $primaryTimeframe && $forecast) {
                    $primaryForecasts[] = $forecast;
                }
            }

            $matrix[] = $row;
        }

        [$bullish, $bearish] = $this->buildTopMovers($primaryForecasts);

        return [
            'timeframes' => $timeframes,
            'primaryTimeframe' => $primaryTimeframe,
            'matrix' => $matrix,
            'recommendedMovers' => [
                'bullish' => $bullish,
                'bearish' => $bearish,
            ],
            'confidenceDistribution' => $this->bucketConfidences($confidenceValues),
        ];
    }

    private function matchForecast(array $forecasts, string $ticker, string $timeframe): ?array
    {
        foreach ($forecasts as $forecast) {
            if (($forecast['ticker'] ?? '') === $ticker && ($forecast['timeframe'] ?? '') === $timeframe) {
                return $forecast;
            }
        }

        return null;
    }

    private function buildTopMovers(array $forecasts): array
    {
        $bullish = array_filter($forecasts, static fn ($row) => ($row['forecast_direction'] ?? '') === 'bullish');
        $bearish = array_filter($forecasts, static fn ($row) => ($row['forecast_direction'] ?? '') === 'bearish');

        usort($bullish, static fn ($a, $b) => ($b['confidence_score'] ?? 0) <=> ($a['confidence_score'] ?? 0));
        usort($bearish, static fn ($a, $b) => ($b['confidence_score'] ?? 0) <=> ($a['confidence_score'] ?? 0));

        return [array_slice($bullish, 0, 5), array_slice($bearish, 0, 5)];
    }

    private function bucketConfidences(array $values): array
    {
        $buckets = [
            '0-39' => 0,
            '40-59' => 0,
            '60-79' => 0,
            '80-100' => 0,
        ];

        foreach ($values as $value) {
            if ($value >= 80) {
                $buckets['80-100']++;
            } elseif ($value >= 60) {
                $buckets['60-79']++;
            } elseif ($value >= 40) {
                $buckets['40-59']++;
            } else {
                $buckets['0-39']++;
            }
        }

        return $buckets;
    }
}
