<?php

namespace App\Modules\AIOps\Models;

use CodeIgniter\Model;

class AIOpsWorkflowsModel extends Model
{
    protected $table         = 'bf_aiops_workflows';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
        'slug',
        'n8n_workflow_id',
        'enabled',
        'subsystem',
        'description',
    ];
}
