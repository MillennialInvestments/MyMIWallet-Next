<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestmentPriceForecastModel extends Model
{
    protected $table = 'bf_investment_price_forecasts';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'alert_id',
        'ticker',
        'timeframe',
        'forecast_direction',
        'target_price',
        'range_low',
        'range_high',
        'confidence_score',
        'signal_score',
        'indicators_json',
        'data_source',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = false;

    public function upsertLatestForecast(string $ticker, string $timeframe, array $payload): int
    {
        $ticker = strtoupper($ticker);
        $existing = $this->where(['ticker' => $ticker, 'timeframe' => $timeframe])->first();

        if ($existing) {
            $this->update($existing['id'], $payload);
            return (int) $existing['id'];
        }

        $this->insert($payload);
        return (int) $this->getInsertID();
    }

    public function appendHistorySnapshot(int $forecastId, array $payload): bool
    {
        $history = model(InvestmentForecastHistoryModel::class);
        return (bool) $history->insert([
            'forecast_id'       => $forecastId,
            'ticker'            => $payload['ticker'],
            'timeframe'         => $payload['timeframe'],
            'forecast_direction'=> $payload['forecast_direction'],
            'target_price'      => $payload['target_price'],
            'range_low'         => $payload['range_low'],
            'range_high'        => $payload['range_high'],
            'confidence_score'  => $payload['confidence_score'],
            'indicators_json'   => $payload['indicators_json'] ?? null,
            'recorded_at'       => $payload['updated_at'] ?? date('Y-m-d H:i:s'),
        ]);
    }

    public function getLatestByTickerTimeframe(string $ticker, string $timeframe): ?array
    {
        $row = $this->where(['ticker' => strtoupper($ticker), 'timeframe' => $timeframe])
            ->orderBy('updated_at', 'DESC')
            ->first();

        return $row ?: null;
    }

    public function getLatestForAlerts(array $alertIds): array
    {
        if (empty($alertIds)) {
            return [];
        }

        return $this->whereIn('alert_id', $alertIds)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
    }

    public function getLatestForecastsForTickers(array $tickers, array $timeframes = []): array
    {
        if (empty($tickers)) {
            return [];
        }

        $builder = $this->whereIn('ticker', array_map('strtoupper', $tickers));

        if (! empty($timeframes)) {
            $builder = $builder->whereIn('timeframe', $timeframes);
        }

        return $builder->orderBy('updated_at', 'DESC')->findAll();
    }
}
