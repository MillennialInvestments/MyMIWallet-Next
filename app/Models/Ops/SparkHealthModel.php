<?php

namespace App\Models\Ops;

use CodeIgniter\Model;

class SparkHealthModel extends Model
{
    protected $table      = 'bf_ops_spark_health';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'created_at',
        'hostname',
        'app_env',
        'php_version',
        'ci_version',
        'status',
        'command_count',
        'invalid_count',
        'invalid_files_json',
        'notes',
    ];

    protected $useTimestamps = false;
}
