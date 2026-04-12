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
    protected $allowedFields = [
        'user_id',
        'prop_firm_id',
        'prop_rule_set_id',
        'account_ref',
        'account_status',
        'starting_balance',
        'current_balance',
        'metadata_json',
    ];
}
