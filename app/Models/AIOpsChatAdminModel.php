<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AIOpsChatAdminModel extends Model
{
    protected $table          = 'bf_aiops_chat_admin';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $useTimestamps  = false;
    protected $allowedFields  = [
        'user_id',
        'raw_text',
        'cleaned_text',
        'instruction_id',
        'created_at',
    ];
}
