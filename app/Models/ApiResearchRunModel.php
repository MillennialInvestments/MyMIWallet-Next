<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ApiResearchRunModel extends Model
{
    protected $table            = 'bf_api_research_runs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'provider_slug',
        'provider_name',
        'start_url',
        'docs_domain',
        'status',
        'pages_scraped',
        'specs_found',
        'endpoints_found',
        'auth_confidence',
        'integration_score',
        'raw_snapshot_path',
        'markdown_report_path',
        'json_snapshot_path',
        'ai_summary_path',
        'error_message',
        'started_at',
        'completed_at',
        'created_at',
    ];
    protected $useTimestamps = false;
}