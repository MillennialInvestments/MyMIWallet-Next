<?php

namespace App\Models;

use CodeIgniter\Model;

class AIOpsInstructionModel extends Model
{
    protected $table      = 'bf_aiops_instructions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
    'instruction_text',
    'instruction_hash',
    'duplicate_of',
    'similarity_score',
    'source',
    'classification',
    'risk_level',
    'gov_score',
    'risk_score',
    'status',
    'auto_pr',
    'dry_run',
    'severity_override',
    'generated_files',
    'pr_branch',
    'pr_url',
    'worker_notes',
    'created_at',
    'updated_at',
    ];
}