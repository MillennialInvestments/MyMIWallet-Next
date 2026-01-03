<?php

namespace App\Modules\AIOps\Models;

use CodeIgniter\Model;

class AIOpsUsageModel extends Model
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
