<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ApiResearchEndpointModel extends Model
{
    protected $table            = 'bf_api_research_endpoints';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'run_id',
        'spec_id',
        'method',
        'path',
        'operation_id',
        'summary',
        'description',
        'tags_json',
        'parameters_json',
        'request_body_json',
        'responses_json',
        'security_json',
        'rate_limit_notes',
        'example_request',
        'example_response',
        'created_at',
    ];
    protected $useTimestamps = false;
}