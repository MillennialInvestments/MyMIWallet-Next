<?php
namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table      = 'bf_jobs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['queue','payload_json','attempts','available_at','reserved_at','reserved_by','created_at','expires_at'];
    protected $useTimestamps = false;
}

