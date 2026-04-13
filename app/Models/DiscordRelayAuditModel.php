<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class DiscordRelayAuditModel extends Model
{
    protected $table = 'bf_discord_relay_audit';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'relay_type',
        'discord_user_id',
        'discord_channel_id',
        'command_name',
        'request_payload',
        'response_payload',
        'status',
        'created_on',
    ];
    protected $useTimestamps = false;
}
