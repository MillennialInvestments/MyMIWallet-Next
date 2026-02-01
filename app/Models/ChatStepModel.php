<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class ChatStepModel extends Model
{
    protected $table = 'bf_chat_steps';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'chat_archive_id',
        'step',
        'status',
        'detected_at',
        'notes',
    ];
    protected $useTimestamps = false;

    /**
     * @param array<string, mixed> $stepData
     */
    public function upsertStep(int $archiveId, array $stepData): void
    {
        $data = [
            'chat_archive_id' => $archiveId,
            'step' => (string) ($stepData['step'] ?? ''),
            'status' => (string) ($stepData['status'] ?? 'unknown'),
            'detected_at' => (string) ($stepData['detected_at'] ?? date('Y-m-d H:i:s')),
            'notes' => $stepData['notes'] ?? null,
        ];

        $existing = $this->where('chat_archive_id', $archiveId)
            ->where('step', $data['step'])
            ->first();

        if ($existing) {
            $this->update($existing['id'], $data);
            return;
        }

        $this->insert($data);
    }
}
