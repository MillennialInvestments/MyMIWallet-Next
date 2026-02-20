<?php

namespace App\Models;

use CodeIgniter\Model;

class AIOpsDependencyModel extends Model
{
    protected $table      = 'bf_aiops_dependencies';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'instruction_id',
        'depends_on',
        'created_at',
    ];
}