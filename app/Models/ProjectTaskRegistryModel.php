<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectTaskRegistryModel extends Model
{
    protected $table         = 'project_task_registry';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = [
        'project',
        'title',
        'description',
        'status',
        'priority',
        'assignee',
        'source',
        'source_ref',
        'planned_at',
        'due_at',
        'meta_json',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected array $casts = [
        'meta_json' => 'json-array',
    ];

    public function createFromPlan(array $plan): int
    {
        $data = [
            'project'     => (string) ($plan['project'] ?? 'unknown'),
            'title'       => (string) ($plan['title'] ?? ($plan['summary'] ?? 'Untitled task')),
            'description' => (string) ($plan['description'] ?? ($plan['details'] ?? '')),
            'status'      => (string) ($plan['status'] ?? 'new'),
            'priority'    => (string) ($plan['priority'] ?? 'normal'),
            'assignee'    => $plan['assignee'] ?? null,
            'source'      => $plan['source'] ?? null,
            'source_ref'  => $plan['source_ref'] ?? null,
            'planned_at'  => $plan['planned_at'] ?? null,
            'due_at'      => $plan['due_at'] ?? null,
            'meta_json'   => $plan['meta'] ?? [],
        ];

        $this->insert($data);

        return (int) $this->getInsertID();
    }

    public function listByProject(?string $project = null, array $statuses = []): array
    {
        $builder = $this->orderBy('due_at', 'ASC')->orderBy('priority', 'ASC');

        if ($project !== null) {
            $builder->where('project', $project);
        }

        if (! empty($statuses)) {
            $builder->whereIn('status', $statuses);
        }

        return $builder->findAll();
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
