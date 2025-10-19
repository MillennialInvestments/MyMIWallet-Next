<?php
namespace App\Models\Fin;

use CodeIgniter\Model;

class TradeModel extends Model
{
    protected $table = 'bf_fin_trades';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','symbol','asset_type','qty','price','fee','side','trade_ts','wallet_id','ext_id','notes','created_at','updated_at'];
    protected $useTimestamps = false;

    public function byUser(int $userId): array
    {
        return $this->where('user_id',$userId)->orderBy('trade_ts','ASC')->findAll(50000);
    }
}

