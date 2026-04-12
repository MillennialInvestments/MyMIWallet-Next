<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ApiResearchSpecModel extends Model
{
    protected $table            = 'bf_api_research_specs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'run_id',
        'spec_type',
        'source_url',
        'version',
        'title',
        'raw_content',
        'parsed_json',
        'created_at',
    ];
    protected $useTimestamps = false;
}