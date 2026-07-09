<?php

namespace App\Modules\Support\Models;

use App\Models\ObservedModel;

class SupportTicketEventModel extends ObservedModel
{
    protected $table = 'bf_support_ticket_events';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['ticket_id', 'event_type', 'payload_json', 'created_at'];
}
