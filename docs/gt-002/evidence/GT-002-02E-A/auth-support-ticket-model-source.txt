<?php

namespace App\Modules\Support\Models;

use App\Models\ObservedModel;

class SupportTicketModel extends ObservedModel
{
    protected $table = 'bf_support_tickets';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id', 'email', 'subject', 'message', 'category', 'status', 'priority',
        'ip_address', 'user_agent', 'ref_context_json',
    ];
}
