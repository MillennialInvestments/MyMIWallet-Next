<?php

namespace App\Models;

use CodeIgniter\Model;

class AIOpsBranchLockModel extends Model
{
    protected $table            = 'bf_aiops_branch_locks';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useTimestamps    = false;

    protected $allowedFields = [
        'branch',
        'locked_by',
        'instruction_id',
        'expires_at',
        'created_at',
    ];
}