<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table = 'bf_predictions_orders';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'user_id','market_id','option_id','side','stake_amount','stake_asset',
        'expected_payout','fee_bips','state','created_at','updated_at'
    ];

    public function forUser(int $userId, array $filters=[], int $limit=50, int $offset=0): array
    {
        $b = $this->where('user_id',$userId)->orderBy('id','DESC');
        if (!empty($filters['state'])) $b->where('state',$filters['state']);
        if (!empty($filters['market_id'])) $b->where('market_id',(int)$filters['market_id']);
        return $b->findAll($limit,$offset);
    }

    public function markCanceled(int $orderId, int $userId): bool
    {
        return $this->where('id',$orderId)->where('user_id',$userId)
            ->set(['state'=>'CANCELED','updated_at'=>date('Y-m-d H:i:s')])
            ->update();
    }
}