<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropFirmModel extends ObservedModel
{
    protected $table = 'bf_prop_firms';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
