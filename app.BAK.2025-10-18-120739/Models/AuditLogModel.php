<?php
namespace App\Models;

use CodeIgniter\Model;

class AuditLogModel extends Model
{
    protected $table = 'bf_audit_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['event','actor_id','target','meta_json','ip_address','user_agent','created_at'];
    protected $useTimestamps = false;
}
