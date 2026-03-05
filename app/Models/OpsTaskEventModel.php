<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OpsTaskEventModel extends Model
{
    protected $table            = 'ops_task_events';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;
    protected $allowedFields    = ['task_id', 'event_type', 'payload_json', 'created_by', 'created_at'];
}
