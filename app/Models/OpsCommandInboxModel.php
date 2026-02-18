<?php

namespace App\Models;

use CodeIgniter\Model;

class OpsCommandInboxModel extends Model
{
    protected $table         = 'bf_ops_command_inbox';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'message_id',
        'from_email',
        'subject',
        'raw_body',
        'parsed_json',
        'ai_plan_json',
        'ai_summary',
        'security_flags',
        'status',
        'meta_json',
        'received_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected array $casts = [
        'parsed_json'    => 'json-array',
        'ai_plan_json'   => 'json-array',
        'security_flags' => 'json-array',
        'meta_json'      => 'json-array',
    ];

    public function newItems(array $statuses = ['New', 'Parsed']): array
    {
        return $this->whereIn('status', $statuses)
            ->orderBy('received_at', 'DESC')
            ->findAll(20);
    }

    public function appendSecurityFlag(int $id, string $flagKey, array $details = []): bool
    {
        $record = $this->find($id);

        if (! $record) {
            return false;
        }

        $flags = $record['security_flags'] ?? [];
        $flags[] = [
            'flag'    => $flagKey,
            'details' => $details,
            'ts'      => date('c'),
        ];

        return $this->update($id, ['security_flags' => $flags]);
    }

    public function markStatus(int $id, string $status, array $meta = []): bool
    {
        $record = $this->find($id);

        if (! $record) {
            return false;
        }

        $metaJson = $record['meta_json'] ?? [];

        if (! empty($meta)) {
            $metaJson = array_merge($metaJson, $meta);
        }

        return $this->update($id, [
            'status'    => $status,
            'meta_json' => $metaJson,
        ]);
    }
}
