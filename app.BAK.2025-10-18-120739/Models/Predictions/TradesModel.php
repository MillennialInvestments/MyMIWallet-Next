<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class TradesModel extends Model
{
    protected $table         = 'bf_predictions_trades';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'order_id', 'user_id', 'market_id', 'option_id', 'stake_asset', 'stake_amount', 'fee_amount',
        'fill_odds_bips', 'created_at',
    ];
}