<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OpsSubprojectModel extends Model
{
    protected $table          = 'ops_subprojects';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $allowedFields  = ['project_id', 'code', 'name', 'owner', 'priority', 'status', 'due_date', 'notes'];
}
