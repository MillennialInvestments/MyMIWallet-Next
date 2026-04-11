<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropPositionModel extends ObservedModel
{
    protected $table = 'bf_prop_positions';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
