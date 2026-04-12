<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropBrokerConnectionModel extends ObservedModel
{
    protected $table = 'bf_prop_broker_connections';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'broker_name',
        'external_account_id',
        'connection_status',
        'last_heartbeat_at',
        'credentials_json',
    ];
}
