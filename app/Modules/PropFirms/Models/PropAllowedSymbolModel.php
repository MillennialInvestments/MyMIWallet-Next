<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropAllowedSymbolModel extends ObservedModel
{
    protected $table = 'bf_prop_allowed_symbols';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
