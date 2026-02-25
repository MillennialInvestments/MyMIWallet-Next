<?php

namespace App\Modules\AIOps\Models;

use App\Models\ObservedModel;

class AIOpsWorkflowUsageModel extends ObservedModel
{
    protected $table         = 'bf_aiops_workflow_usage';
    protected $primaryKey    = 'workflow_id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'workflow_id',
        'workflow_slug',
        'month',
        'usd_used',
        'updated_at',
    ];
}
