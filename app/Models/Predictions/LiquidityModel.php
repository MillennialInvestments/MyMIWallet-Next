<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class LiquidityModel extends Model
{
    protected $table = 'bf_predictions_liquidity';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'market_id','option_id','provider_user_id','asset','amount','state','created_at','updated_at'
    ];

    public function activeForMarket(int $marketId): array
    {
        return $this->where(['market_id'=>$marketId,'state'=>'ACTIVE'])->findAll(500);
    }
}