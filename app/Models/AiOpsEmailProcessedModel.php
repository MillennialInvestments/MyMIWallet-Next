<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsEmailProcessedModel extends Model
{
    protected $table = 'bf_aiops_email_processed';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'mailbox',
        'imap_uid',
        'message_id',
        'from_email',
        'subject',
        'received_at',
        'processed_at',
        'status',
        'meta_json',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function hasProcessed(string $mailbox, int $imapUid): bool
    {
        return $this->where('mailbox', $mailbox)
            ->where('imap_uid', $imapUid)
            ->countAllResults() > 0;
    }

    /**
     * @param array<string, mixed>|string|null $meta
     */
    public function insertIfNew(array $data, $meta = null): bool
    {
        helper('json_validation');

        $data['meta_json'] = aiops_normalize_json($meta);
        $data['processed_at'] = $data['processed_at'] ?? date('Y-m-d H:i:s');

        $builder = $this->db->table($this->table);
        $builder->ignore(true)->insert($data);

        return $this->db->affectedRows() > 0;
    }
}
