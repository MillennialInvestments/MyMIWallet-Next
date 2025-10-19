<?php namespace App\Models\Predictions;

use CodeIgniter\Model;

class PayoutsModel extends Model
{
    protected $table = 'bf_predictions_payouts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'user_id','market_id','position_id','asset','amount','status','tx_ref','created_at','updated_at'
    ];

    public function pending(int $limit=100): array
    {
        return $this->where('status','PENDING')->orderBy('id','ASC')->findAll($limit);
    }
}