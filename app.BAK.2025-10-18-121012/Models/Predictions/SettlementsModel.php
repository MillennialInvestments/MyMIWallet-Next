<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class TradesModel extends Model
{
    protected $table = 'bf_predictions_trades';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'order_id','user_id','market_id','option_id','stake_asset','stake_amount',
        'fee_amount','fill_odds_bips','created_at'
    ];

    public function forOrder(int $orderId): array
    {
        return $this->where('order_id',$orderId)->orderBy('id','ASC')->findAll();
    }

    public function forUser(int $userId, int $limit=100, int $offset=0): array
    {
        return $this->where('user_id',$userId)->orderBy('id','DESC')->findAll($limit,$offset);
    }
}