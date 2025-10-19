<?php
namespace App\Models;

use CodeIgniter\Model;

/**
 * Model for storing outbound notifications before dispatch.
 */
class NotificationOutboxModel extends Model
{
    protected $table      = 'notification_outbox';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'recipient',
        'subject',
        'message',
        'status',
        'sent_at',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
}
