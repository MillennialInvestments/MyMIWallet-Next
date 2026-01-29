<?php

declare(strict_types=1);

namespace App\Models;

use CodeIgniter\Model;

class AiOpsTaskModel extends Model
{
    protected $table = 'bf_aiops_tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'task_key',
        'title',
        'severity',
        'domain',
        'prompt',
        'context_json',
        'status',
        'assigned_to',
        'created_at',
        'updated_at',
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    /**
     * @param array<string, mixed> $issue
     */
    public function upsertFromIssue(array $issue): void
    {
        $taskKey = (string) ($issue['id'] ?? sha1((string) ($issue['title'] ?? 'issue')));

        $data = [
            'task_key' => $taskKey,
            'title' => (string) ($issue['title'] ?? 'Untitled issue'),
            'severity' => (string) ($issue['severity'] ?? 'P2'),
            'domain' => (string) ($issue['domain'] ?? 'ops'),
            'prompt' => (string) ($issue['ai_prompt'] ?? ''),
            'context_json' => json_encode($issue, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'status' => (string) ($issue['status'] ?? 'open'),
            'assigned_to' => (string) ($issue['owner'] ?? 'human'),
        ];

        $existing = $this->where('task_key', $taskKey)->first();
        if ($existing) {
            $this->update($existing['id'], $data);
            return;
        }

        $this->insert($data);
    }
}
