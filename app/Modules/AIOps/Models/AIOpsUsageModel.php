<?php

namespace App\Modules\AIOps\Models;

use App\Models\ObservedModel;

class AIOpsUsageModel extends ObservedModel
{
    protected $table            = 'bf_aiops_usage';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;
    protected $allowedFields    = [
        'date',
        'provider',
        'model',
        'tokens_in',
        'tokens_out',
        'cost_est',
        'subsystem',
        'request_id',
        'workflow_id',
        'workflow_slug',
        'user_id',
        'meta_json',
        'created_at',
    ];

    public function insertUsage(array $data): bool
    {
        return (bool) $this->insert($data, false);
    }
}
