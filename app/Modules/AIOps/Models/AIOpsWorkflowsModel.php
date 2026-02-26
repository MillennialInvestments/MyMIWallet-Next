<?php

namespace App\Modules\AIOps\Models;

use App\Models\ObservedModel;

class AIOpsWorkflowsModel extends ObservedModel
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
