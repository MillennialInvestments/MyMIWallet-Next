<?php

namespace App\Models\Marketing;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class EmailQueueModel extends Model
{
    protected $table = 'bf_marketing_email_queue';
    protected $primaryKey = 'id';
    protected $allowedFields = ['campaign_id', 'email', 'subject', 'content', 'status', 'created_at', 'updated_at'];

    // Adds email to the queue
    public function queueEmail(array $data)
    {
        return $this->insert($data);
    }

    // Gets all emails pending to be sent
    public function getPendingEmails()
    {
        return $this->where('status', 'pending')->findAll();
    }

    // Marks email as sent
    public function markAsSent(int $id)
    {
        return $this->update($id, ['status' => 'sent']);
    }
}
