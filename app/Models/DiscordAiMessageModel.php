<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscordAiMessageModel extends Model
{
    protected $table         = 'bf_discord_ai_messages';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'session_id',
        'role',
        'content',
        'meta_json',
        'created_at',
    ];

    protected $useSoftDeletes = false;
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = '';
}
