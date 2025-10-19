<?php
namespace App\Models\Fin;

use CodeIgniter\Model;

class PositionDailyModel extends Model
{
    protected $table = 'bf_fin_positions_daily';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','date','symbol','qty','avg_cost','market_price','market_value','unrealized_pnl','realized_pnl','created_at'];
    protected $useTimestamps = false;
}

