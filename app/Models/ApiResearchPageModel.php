<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ApiResearchPageModel extends Model
{
    protected $table            = 'bf_api_research_pages';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'run_id',
        'url',
        'url_hash',
        'depth',
        'status_code',
        'content_type',
        'title',
        'text_excerpt',
        'raw_text',
        'html_hash',
        'is_spec_candidate',
        'is_reference_page',
        'created_at',
    ];
    protected $useTimestamps = false;
}