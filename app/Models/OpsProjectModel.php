<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class OpsProjectModel extends Model
{
    protected $table          = 'ops_projects';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useTimestamps  = true;
    protected $allowedFields  = ['code', 'name', 'owner', 'priority', 'status', 'start_date', 'target_date', 'notes'];
    protected $validationRules = ['name' => 'required|max_length[255]'];
}
