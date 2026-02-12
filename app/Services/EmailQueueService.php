<?php

namespace App\Services;

use Config\Database;

class EmailQueueService
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function enqueue(array $email)
    {
        return $this->db->table('aiops_email_queue')->insert([
            'mailbox'     => $email['mailbox'],
            'message_id'  => $email['message_id'],
            'subject'     => $email['subject'],
            'sender'      => $email['sender'],
            'raw_body'    => $email['raw_body'],
            'raw_headers' => $email['raw_headers'],
        ]);
    }
}
