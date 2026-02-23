<?php

namespace App\Models;

use CodeIgniter\Model;

class ErrorAlertRuleModel extends Model
{
    protected $table = 'bf_error_alert_rules';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'is_enabled','name','severity_min','window_minutes','threshold_count','scope','scope_value',
        'notify_email','notify_discord_webhook','created_at','updated_at'
    ];
    protected $useTimestamps = false;
}