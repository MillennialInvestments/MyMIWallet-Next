<?php

declare(strict_types=1);

namespace App\Models\AIOps;

use CodeIgniter\Model;

class FormTestModel extends Model
{
    protected $table            = 'bf_aiops_form_tests';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'source_type',
        'source_value',
        'form_action',
        'http_method',
        'controller_class',
        'route_match',
        'generated_payload',
        'response_status',
        'response_headers',
        'response_body',
        'error_detected',
        'logs_snapshot',
        'patch_job_created',
        'created_at',
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'source_type'  => 'required|in_list[url,file,text]',
        'source_value' => 'required',
    ];

    protected $validationMessages = [];
}