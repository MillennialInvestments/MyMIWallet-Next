<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OpsTaskModel extends Model
{
    protected $table         = 'ops_tasks';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'project_id',
        'subproject_id',
        'code',
        'area',
        'feature_surface',
        'title',
        'acceptance',
        'status',
        'severity',
        'priority',
        'owner',
        'due_date',
        'routes',
        'handler',
        'dependencies',
        'evidence_link',
        'updated_utc',
    ];
}
