<?php
namespace App\Models;

use CodeIgniter\Model;

class FailedJobModel extends Model
{
    protected $table      = 'bf_failed_jobs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['queue','payload_json','exception','failed_at'];
    protected $useTimestamps = false;
}

