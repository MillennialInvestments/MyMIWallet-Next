<?php

namespace App\Modules\PropFirms\Models;

use App\Models\ObservedModel;

class PropNotificationModel extends ObservedModel
{
    protected $table = 'bf_prop_notifications';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_prop_account_id',
        'channel',
        'type',
        'symbol',
        'subject',
        'body',
        'status',
        'event_key',
        'payload_json',
        'sent_at',
        'read_at',
    ];
}
