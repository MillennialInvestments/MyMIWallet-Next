<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestmentForecastAccuracyModel extends Model
{
    protected $table = 'bf_investment_forecast_accuracy';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'forecast_id',
        'ticker',
        'timeframe',
        'evaluation_window',
        'forecast_direction',
        'confidence_score',
        'target_price',
        'range_low',
        'range_high',
        'hit_result',
        'mfe',
        'mae',
        'window_start',
        'window_end',
        'evaluated_at',
        'notes',
        'created_at',
    ];
    protected $useTimestamps = false;

    public function insertAccuracyRow(array $payload): int
    {
        $this->insert($payload);
        return (int) $this->getInsertID();
    }

    public function hasEvaluation(int $forecastId, int $windowMinutes): bool
    {
        return (bool) $this->where([
            'forecast_id' => $forecastId,
            'evaluation_window' => $windowMinutes,
        ])->first();
    }
}
