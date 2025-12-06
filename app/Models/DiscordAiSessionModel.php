<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscordAiSessionModel extends Model
{
    protected $table          = 'bf_discord_ai_sessions';
    protected $primaryKey     = 'id';
    protected $returnType     = 'array';
    protected $allowedFields  = [
        'user_id',
        'discord_user_id',
        'channel_id',
        'session_key',
        'topic',
        'context_json',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $useSoftDeletes = false;
    protected $useTimestamps  = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';
}