<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class UserPropAccountModel extends ObservedModel
{
    protected $table = 'bf_user_prop_accounts';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [];
}
