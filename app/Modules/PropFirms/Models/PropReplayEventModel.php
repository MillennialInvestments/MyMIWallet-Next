<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropReplayEventModel extends ObservedModel
{
    protected $table = 'bf_prop_replay_events';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'event_type',
        'event_payload_json',
        'event_at',
        'sequence_no',
    ];
}
