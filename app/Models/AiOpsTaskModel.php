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
        'locked_at',
        'locked_by',
        'last_error',
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
        helper('json_validation');

        $taskKey = (string) ($issue['task_key'] ?? $issue['id'] ?? sha1((string) ($issue['title'] ?? 'issue')));
        $context = aiops_normalize_json($issue);

        $data = [
            'task_key' => $taskKey,
            'title' => (string) ($issue['title'] ?? 'Untitled issue'),
            'severity' => (string) ($issue['severity'] ?? 'P2'),
            'domain' => (string) ($issue['domain'] ?? 'ops'),
            'prompt' => (string) ($issue['codex_prompt'] ?? $issue['ai_prompt'] ?? ''),
            'context_json' => $context,
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

    public function claimNextTask(string $assignedTo, int $lockMinutes): ?array
    {
        $lockMinutes = $lockMinutes > 0 ? $lockMinutes : 15;
        $now = date('Y-m-d H:i:s');
        $lockedUntil = date('Y-m-d H:i:s', time() + ($lockMinutes * 60));

        $candidate = $this->builder()
            ->select('id')
            ->whereIn('status', ['open', 'queued'])
            ->groupStart()
            ->where('locked_at', null)
            ->orWhere('locked_at <', $now)
            ->groupEnd()
            ->orderBy('created_at', 'ASC')
            ->get(1)
            ->getRowArray();

        if (! $candidate) {
            return null;
        }

        $this->builder()
            ->where('id', $candidate['id'])
            ->whereIn('status', ['open', 'queued'])
            ->groupStart()
            ->where('locked_at', null)
            ->orWhere('locked_at <', $now)
            ->groupEnd()
            ->update([
                'status' => 'running',
                'locked_at' => $lockedUntil,
                'locked_by' => $assignedTo,
            ]);

        if ($this->db->affectedRows() === 0) {
            return null;
        }

        return $this->find($candidate['id']);
    }

    public function markRunning(int $taskId, string $assignedTo, int $lockMinutes): bool
    {
        $lockMinutes = $lockMinutes > 0 ? $lockMinutes : 15;
        $lockedUntil = date('Y-m-d H:i:s', time() + ($lockMinutes * 60));

        return $this->update($taskId, [
            'status' => 'running',
            'locked_at' => $lockedUntil,
            'locked_by' => $assignedTo,
        ]);
    }

    public function markDone(int $taskId): bool
    {
        return $this->update($taskId, [
            'status' => 'done',
            'locked_at' => null,
            'locked_by' => null,
            'last_error' => null,
        ]);
    }

    public function markFailed(int $taskId, string $error): bool
    {
        return $this->update($taskId, [
            'status' => 'failed',
            'locked_at' => null,
            'locked_by' => null,
            'last_error' => $error,
        ]);
    }
}
