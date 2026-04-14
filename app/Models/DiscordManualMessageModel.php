<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class DiscordManualMessageModel extends Model
{
    protected $table = 'bf_discord_manual_messages';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'sender_identity',
        'channel_key',
        'recipient_id',
        'recipient_email',
        'subject',
        'priority',
        'message_payload',
        'send_mode',
        'result_status',
        'result_message',
        'external_message_id',
        'created_on',
    ];
    protected $useTimestamps = false;
}
