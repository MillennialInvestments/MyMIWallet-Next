<?php

namespace App\Modules\Support\Models;

use CodeIgniter\Model;

class SupportTicketEventModel extends Model
{
    protected $table = 'bf_support_ticket_events';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = ['ticket_id', 'event_type', 'payload_json', 'created_at'];
}
