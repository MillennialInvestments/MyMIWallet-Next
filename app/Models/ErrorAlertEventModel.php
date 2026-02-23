<?php

namespace App\Models;

use CodeIgniter\Model;

class ErrorAlertEventModel extends Model
{
    protected $table = 'bf_error_alert_events';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'rule_id','triggered_at','window_start','window_end','count','severity','scope','scope_value','payload','created_at'
    ];
    protected $useTimestamps = false;
}