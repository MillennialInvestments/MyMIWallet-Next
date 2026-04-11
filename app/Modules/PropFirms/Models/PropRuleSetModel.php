<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropRuleSetModel extends ObservedModel
{
    protected $table = 'bf_prop_rule_sets';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
