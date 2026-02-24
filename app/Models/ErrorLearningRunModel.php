<?php

namespace App\Models;

use CodeIgniter\Model;

class ErrorLearningRunModel extends Model
{
    protected $table = 'bf_error_learning_runs';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'run_uuid','provider','started_at','finished_at','processed','created','updated','skipped','errors','notes'
    ];
    protected $useTimestamps = false;
}