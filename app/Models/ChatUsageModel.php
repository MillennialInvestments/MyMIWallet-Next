<?php

namespace App\Models;

use CodeIgniter\Model;

class ChatUsageModel extends Model
{
    protected $table         = 'chat_usage';
    protected $primaryKey    = 'user_id';
    protected $returnType    = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'user_id',
        'month',
        'tokens_used',
        'usd_used',
        'last_plan',
        'last_email',
        'updated_at',
    ];
}
