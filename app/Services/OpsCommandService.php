<?php

namespace App\Services;

use App\Models\OpsCommandInboxModel;
use App\Models\ProjectTaskRegistryModel;

class OpsCommandService
{
    protected OpsCommandInboxModel $inbox;
    protected ProjectTaskRegistryModel $registry;

    public function __construct(?OpsCommandInboxModel $inbox = null, ?ProjectTaskRegistryModel $registry = null)
    {
        $this->inbox    = $inbox ?? new OpsCommandInboxModel();
        $this->registry = $registry ?? new ProjectTaskRegistryModel();
    }

    public function createTaskFromPlan(array $plan): array
    {
        $taskIds = [];
        $tasks   = $plan['tasks'] ?? [$plan];

        foreach ($tasks as $task) {
            $taskIds[] = $this->registry->createFromPlan($task);
        }

        return $taskIds;
    }

    public function listInbox(array $filters = []): array
    {
        $builder = $this->inbox->orderBy('received_at', 'DESC')->orderBy('id', 'DESC');

        if (! empty($filters['status'])) {
            $builder->whereIn('status', (array) $filters['status']);
        }

        if (! empty($filters['from_email'])) {
            $builder->where('from_email', $filters['from_email']);
        }

        return $builder->findAll(20);
    }

    public function getInboxItem(int $id): ?array
    {
        return $this->inbox->find($id);
    }

    public function markStatus(int $id, string $status, array $meta = []): bool
    {
        return $this->inbox->markStatus($id, $status, $meta);
    }

    public function appendSecurityFlag(int $id, string $flagKey, array $details = []): bool
    {
        return $this->inbox->appendSecurityFlag($id, $flagKey, $details);
    }

    public function upsertAnalysis(int $id, array $analysis): bool
    {
        $payload = [
            'ai_summary'   => $analysis['summary'] ?? null,
            'ai_plan_json' => $analysis['plan'] ?? null,
        ];

        return $this->inbox->update($id, $payload);
    }
}
