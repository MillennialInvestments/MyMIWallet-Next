<?php
// PATCH: outbound webhook queue model
namespace App\Models;
use CodeIgniter\Model;

class WebhookOutboxModel extends Model
{
    protected $table = 'bf_webhook_outbox';
    protected $primaryKey = 'id';
    protected $allowedFields = ['target_url','headers_json','body_json','signature','status','attempts','last_error','next_attempt_at','created_at','sent_at'];
    protected $useTimestamps = false;
}
