<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ApiResearchDiffModel extends Model
{
    protected $table            = 'bf_api_research_diffs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'provider_slug',
        'old_run_id',
        'new_run_id',
        'diff_summary',
        'new_endpoints_json',
        'removed_endpoints_json',
        'changed_endpoints_json',
        'auth_changes_json',
        'rate_limit_changes_json',
        'created_at',
    ];
    protected $useTimestamps = false;
}