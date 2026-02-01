<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ChatArchiveModel extends Model
{
    protected $table = 'bf_chat_archives';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'chat_file',
        'project',
        'chat_date',
        'title',
        'overall_status',
        'next_required_step',
        'last_updated',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * @param array<string, mixed> $archive
     */
    public function upsertArchive(array $archive): int
    {
        $data = [
            'chat_file' => (string) ($archive['chat_file'] ?? ''),
            'project' => (string) ($archive['project'] ?? 'default'),
            'chat_date' => $archive['chat_date'] ?? null,
            'title' => $archive['title'] ?? null,
            'overall_status' => (string) ($archive['overall_status'] ?? 'unknown'),
            'next_required_step' => $archive['next_required_step'] ?? null,
            'last_updated' => $archive['last_updated'] ?? null,
        ];

        $existing = $this->where('chat_file', $data['chat_file'])->first();
        if ($existing) {
            $this->update($existing['id'], $data);
            return (int) $existing['id'];
        }

        $this->insert($data);
        return (int) $this->getInsertID();
    }
}
