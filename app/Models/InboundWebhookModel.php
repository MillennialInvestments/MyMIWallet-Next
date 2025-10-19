<?php
// PATCH: inbound webhook logging model
namespace App\Models;
use CodeIgniter\Model;

class InboundWebhookModel extends Model
{
    protected $table = 'bf_inbound_webhooks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['source','idempotency_key','signature','payload_body','received_at','processed_at','status','notes'];
    protected $useTimestamps = false;
}
