<?php
namespace App\Models\Fin;

use CodeIgniter\Model;

class RiskBudgetModel extends Model
{
    protected $table = 'bf_fin_risk_budgets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','max_position_pct','max_asset_class_pct','max_daily_loss_pct','max_drawdown_pct','updated_at','created_at'];
    protected $useTimestamps = false;

    public function getForUser(int $userId): array
    {
        $row = $this->where('user_id',$userId)->first();
        if ($row) {
            return $row;
        }
        $payload = [
            'user_id'=>$userId,
            'max_position_pct'=> getenv('FIN_DEFAULT_MAX_POSITION_PCT') ?: 25,
            'max_asset_class_pct'=> getenv('FIN_DEFAULT_MAX_ASSET_CLASS_PCT') ?: 60,
            'max_daily_loss_pct'=> getenv('FIN_DEFAULT_MAX_DAILY_LOSS_PCT') ?: 5,
            'max_drawdown_pct'=> getenv('FIN_DEFAULT_MAX_DRAWDOWN_PCT') ?: 30,
            'created_at'=> date('Y-m-d H:i:s'),
        ];
        $id = $this->insert($payload);
        return $this->find($id);
    }
}

