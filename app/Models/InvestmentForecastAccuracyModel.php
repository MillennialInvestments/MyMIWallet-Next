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
        'forecast_direction',
        'forecast_target',
        'actual_price',
        'hit_target',
        'max_favorable_excursion',
        'max_adverse_excursion',
        'evaluation_minutes',
        'recorded_at',
    ];
    protected $useTimestamps = false;
}
