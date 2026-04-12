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
    protected $allowedFields = [
        'prop_firm_id',
        'name',
        'rule_version',
        'account_type',
        'platform',
        'starting_balance',
        'daily_loss_limit',
        'drawdown_limit',
        'max_drawdown',
        'trailing_mode',
        'trailing_stop_behavior',
        'stop_loss_required',
        'qualifying_days',
        'consistency_percent',
        'max_position_size',
        'config_json',
        'rules_json',
    ];
}
