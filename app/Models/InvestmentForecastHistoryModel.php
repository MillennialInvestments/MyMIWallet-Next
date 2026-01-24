<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestmentForecastHistoryModel extends Model
{
    protected $table = 'bf_investment_forecast_history';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'forecast_id',
        'ticker',
        'timeframe',
        'forecast_direction',
        'target_price',
        'range_low',
        'range_high',
        'confidence_score',
        'indicators_json',
        'recorded_at',
    ];
    protected $useTimestamps = false;
}
