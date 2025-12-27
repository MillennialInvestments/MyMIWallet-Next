<?php

namespace App\Modules\Management\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\BaseBuilder;

class ProjectControlModel extends Model
{
    public const TABLE = 'bf_project_control_center_items';
    public const STATUSES = ['Active', 'Planned', 'Blocked', 'Deprecated', 'Completed'];

    protected $table = self::TABLE;
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $allowedFields = [
        'project_name',
        'category',
        'subcategory',
        'component',
        'description',
        'status',
        'primary_files',
        'notes',
        'tags_json',
        'source_type',
        'source_ref',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'tags_json' => 'json',
    ];

    /**
     * Server-side list for DataTables.
     *
     * @param array<string, mixed> $params
     * @return array{recordsTotal:int,recordsFiltered:int,data:array<int,array<string,mixed>>}
     */
    public function list(array $params): array
    {
        $start = (int) ($params['start'] ?? 0);
        $length = (int) ($params['length'] ?? 25);
        $search = trim((string) ($params['search']['value'] ?? ''));
        $filters = [
            'status' => $params['status'] ?? null,
            'category' => $params['category'] ?? null,
            'project_name' => $params['project_name'] ?? null,
        ];

        $baseBuilder = $this->builder();

        $recordsTotal = $baseBuilder->countAllResults();

        $filteredBuilder = $this->builder();
        $this->applyFilters($filteredBuilder, $filters, $search);
        $recordsFiltered = $filteredBuilder->countAllResults();

        $dataBuilder = $this->builder()->select('*');
        $this->applyFilters($dataBuilder, $filters, $search);
        $data = $dataBuilder
            ->orderBy('updated_at', 'DESC')
            ->limit($length, $start)
            ->get()
            ->getResultArray();

        return [
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ];
    }

    /**
     * @param BaseBuilder $builder
     * @param array<string,mixed> $filters
     */
    protected function applyFilters(BaseBuilder $builder, array $filters, string $search = ''): void
    {
        if (!empty($filters['status'])) {
            $builder->where('status', $filters['status']);
        }
        if (!empty($filters['category'])) {
            $builder->where('category', $filters['category']);
        }
        if (!empty($filters['project_name'])) {
            $builder->where('project_name', $filters['project_name']);
        }

        if ($search !== '') {
            $builder->groupStart()
                ->like('project_name', $search)
                ->orLike('category', $search)
                ->orLike('component', $search)
                ->orLike('description', $search)
                ->orLike('notes', $search)
                ->groupEnd();
        }
    }

    /**
     * Upsert a single record by ID or unique composite key.
     *
     * @param array<string, mixed> $data
     */
    public function upsertItem(array $data, ?int $userId = null): array
    {
        $data = $this->sanitizePayload($data, $userId);

        if (!empty($data['id'])) {
            $this->update((int) $data['id'], $data);
            $id = (int) $data['id'];
        } else {
            $existing = $this->where([
                'project_name' => $data['project_name'],
                'category' => $data['category'],
                'component' => $data['component'],
            ])->first();

            if ($existing) {
                $id = (int) $existing['id'];
                $this->update($id, $data);
            } else {
                $this->insert($data, true);
                $id = (int) $this->getInsertID();
            }
        }

        return $this->find($id) ?: [];
    }

    public function updateStatus(int $id, string $status, ?int $userId = null): bool
    {
        $normalized = $this->normalizeStatus($status);
        return $this->update($id, [
            'status' => $normalized,
            'updated_by' => $userId,
        ]);
    }

    public function updateNotes(int $id, string $notes, ?int $userId = null): bool
    {
        return $this->update($id, [
            'notes' => $notes,
            'updated_by' => $userId,
        ]);
    }

    /**
     * @param array<int,array<string,mixed>> $rows
     * @return array{inserted:int,updated:int,skipped:int}
     */
    public function importRows(array $rows, ?int $userId, string $projectName, string $sourceType): array
    {
        $inserted = $updated = $skipped = 0;

        foreach ($rows as $row) {
            $component = trim((string) ($row['component'] ?? ''));
            if ($component === '') {
                $skipped++;
                continue;
            }

            $payload = [
                'project_name' => $row['project_name'] ?: $projectName,
                'category' => $row['category'] ?? '',
                'subcategory' => $row['subcategory'] ?? '',
                'component' => $component,
                'description' => $row['description'] ?? '',
                'status' => $this->normalizeStatus((string) ($row['status'] ?? '')),
                'primary_files' => $row['primary_files'] ?? '',
                'notes' => $row['notes'] ?? '',
                'source_type' => $sourceType,
                'tags_json' => $row['tags_json'] ?? null,
            ];

            $existing = $this->where([
                'project_name' => $payload['project_name'],
                'category' => $payload['category'],
                'component' => $payload['component'],
            ])->first();

            if ($existing) {
                $this->update((int) $existing['id'], array_merge($payload, ['updated_by' => $userId]));
                $updated++;
            } else {
                $payload['created_by'] = $userId;
                $payload['updated_by'] = $userId;
                $this->insert($payload);
                $inserted++;
            }
        }

        return compact('inserted', 'updated', 'skipped');
    }

    /**
     * @param array<string,mixed> $filters
     * @return array<int,array<string,mixed>>
     */
    public function fetchForExport(array $filters): array
    {
        $builder = $this->builder()->orderBy('updated_at', 'DESC');
        $this->applyFilters($builder, $filters, trim((string) ($filters['search'] ?? '')));
        return $builder->get()->getResultArray();
    }

    protected function sanitizePayload(array $data, ?int $userId = null): array
    {
        $data['status'] = $this->normalizeStatus((string) ($data['status'] ?? ''));
        $data['tags_json'] = $this->encodeTags($data['tags_json'] ?? null);

        if (!empty($userId)) {
            $data['updated_by'] = $userId;
            if (empty($data['id'])) {
                $data['created_by'] = $userId;
            }
        }

        return $data;
    }

    protected function encodeTags($tags): ?string
    {
        if ($tags === null || $tags === '') {
            return null;
        }

        if (is_string($tags)) {
            $decoded = json_decode($tags, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return json_encode($decoded, JSON_UNESCAPED_SLASHES);
            }
            return json_encode([$tags], JSON_UNESCAPED_SLASHES);
        }

        if (is_array($tags)) {
            return json_encode($tags, JSON_UNESCAPED_SLASHES);
        }

        return null;
    }

    public function normalizeStatus(string $status): string
    {
        $normalized = ucfirst(strtolower(trim($status)));
        if (!in_array($normalized, self::STATUSES, true)) {
            return 'Active';
        }
        return $normalized;
    }
}
