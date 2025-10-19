<?php
namespace App\Models\Fin;

use CodeIgniter\Model;

class RiskBreachModel extends Model
{
    protected $table = 'bf_fin_risk_breaches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id','type','symbol','metric','threshold','details','occurred_at','resolved_at'];
    protected $useTimestamps = false;
}

