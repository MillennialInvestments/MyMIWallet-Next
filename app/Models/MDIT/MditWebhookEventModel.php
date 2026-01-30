<?php

namespace App\Models\MDIT;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MditWebhookEventModel extends Model
{
    protected $table = 'bf_mdit_webhook_events';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $useTimestamps = false;

    protected $allowedFields = [
        'provider',
        'event_id',
        'event_type',
        'payload_json',
        'payload_hash',
        'received_on',
        'processed_on',
        'status',
        'error_message',
    ];
}
