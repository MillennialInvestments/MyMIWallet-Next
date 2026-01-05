<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ChatToolRunModel extends Model
{
    protected $table            = 'bf_chat_tool_runs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'user_id',
        'mode',
        'tool',
        'request_json',
        'response_json',
        'status',
    ];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
