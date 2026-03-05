<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\OpsProjectModel;
use App\Models\OpsSubprojectModel;
use App\Models\OpsTaskEventModel;
use App\Models\OpsTaskModel;

class OpsImportService
{
    private OpsProjectModel $projects;
    private OpsSubprojectModel $subprojects;
    private OpsTaskModel $tasks;
    private OpsTaskEventModel $events;

    public function __construct()
    {
        $this->projects = new OpsProjectModel();
        $this->subprojects = new OpsSubprojectModel();
        $this->tasks = new OpsTaskModel();
        $this->events = new OpsTaskEventModel();
    }

    public function importXlsx(string $path, string $createdBy = 'system'): array
    {
        if (! class_exists(\PhpOffice\PhpSpreadsheet\IOFactory::class)) {
            return ['ok' => false, 'error' => 'PhpSpreadsheet is not installed.'];
        }

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $sheet = $spreadsheet->getSheetByName('Tasks') ?? $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);
        if ($rows === []) {
            return ['ok' => true, 'imported' => 0, 'created' => 0, 'updated' => 0];
        }

        $headers = array_shift($rows) ?: [];
        $map = $this->mapHeaders($headers);

        $created = 0;
        $updated = 0;
        $imported = 0;

        foreach ($rows as $row) {
            $taskPayload = $this->extractTaskRow($row, $map);
            if ($taskPayload['title'] === '' && $taskPayload['code'] === '') {
                continue;
            }

            $projectId = $this->resolveProjectId($taskPayload);
            if ($projectId === null) {
                continue;
            }
            $taskPayload['project_id'] = $projectId;

            $subprojectId = $this->resolveSubprojectId($taskPayload, $projectId);
            $taskPayload['subproject_id'] = $subprojectId;
            $taskPayload['updated_utc'] = gmdate('Y-m-d H:i:s');

            $existing = $taskPayload['code'] !== '' ? $this->tasks->where('code', $taskPayload['code'])->first() : null;
            if ($existing) {
                $this->tasks->update((int) $existing['id'], $taskPayload);
                $taskId = (int) $existing['id'];
                $updated++;
            } else {
                if ($taskPayload['code'] === '') {
                    $taskPayload['code'] = $this->generateCode('T', 'ops_tasks');
                }
                $taskId = (int) $this->tasks->insert($taskPayload, true);
                $created++;
            }

            if ($taskId > 0) {
                $this->events->insert([
                    'task_id' => $taskId,
                    'event_type' => 'import',
                    'payload_json' => json_encode(['row' => $taskPayload], JSON_UNESCAPED_SLASHES),
                    'created_by' => $createdBy,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
                $imported++;
            }
        }

        return ['ok' => true, 'imported' => $imported, 'created' => $created, 'updated' => $updated];
    }

    private function mapHeaders(array $headers): array
    {
        $map = [];
        foreach ($headers as $key => $name) {
            $normalized = strtolower(trim((string) $name));
            if ($normalized !== '') {
                $map[$normalized] = $key;
            }
        }

        return $map;
    }

    private function getValue(array $row, array $map, array $aliases): string
    {
        foreach ($aliases as $alias) {
            $k = strtolower($alias);
            if (isset($map[$k])) {
                return trim((string) ($row[$map[$k]] ?? ''));
            }
        }

        return '';
    }

    private function extractTaskRow(array $row, array $map): array
    {
        return [
            'code' => $this->getValue($row, $map, ['taskid', 'task id', 'code']),
            'area' => $this->getValue($row, $map, ['area']),
            'feature_surface' => $this->getValue($row, $map, ['feature_surface', 'feature surface']),
            'title' => $this->getValue($row, $map, ['title', 'task']),
            'acceptance' => $this->getValue($row, $map, ['acceptance']),
            'status' => $this->getValue($row, $map, ['status']) ?: 'open',
            'severity' => $this->getValue($row, $map, ['severity']),
            'priority' => $this->getValue($row, $map, ['priority']) ?: 'P2',
            'owner' => $this->getValue($row, $map, ['owner']),
            'due_date' => $this->normalizeDate($this->getValue($row, $map, ['due_date', 'due date'])),
            'routes' => $this->getValue($row, $map, ['routes']),
            'handler' => $this->getValue($row, $map, ['handler']),
            'dependencies' => $this->getValue($row, $map, ['dependencies']),
            'evidence_link' => $this->getValue($row, $map, ['evidence_link', 'evidence link']),
            '_project_code' => $this->getValue($row, $map, ['projectid', 'project id', 'project_code']),
            '_project_name' => $this->getValue($row, $map, ['project', 'project_name']),
            '_subproject_code' => $this->getValue($row, $map, ['subprojectid', 'subproject id', 'subproject_code']),
            '_subproject_name' => $this->getValue($row, $map, ['subproject', 'subproject_name']),
        ];
    }

    private function resolveProjectId(array $payload): ?int
    {
        if ($payload['_project_code'] !== '') {
            $project = $this->projects->where('code', $payload['_project_code'])->first();
            if ($project) {
                return (int) $project['id'];
            }

            $id = $this->projects->insert([
                'code' => $payload['_project_code'],
                'name' => $payload['_project_name'] ?: $payload['_project_code'],
                'owner' => $payload['owner'],
                'priority' => $payload['priority'] ?: 'P2',
                'status' => 'active',
            ], true);

            return is_numeric($id) ? (int) $id : null;
        }

        $id = $this->projects->insert([
            'code' => $this->generateCode('P', 'ops_projects'),
            'name' => $payload['_project_name'] ?: 'Imported Project',
            'owner' => $payload['owner'],
            'priority' => $payload['priority'] ?: 'P2',
            'status' => 'active',
        ], true);

        return is_numeric($id) ? (int) $id : null;
    }

    private function resolveSubprojectId(array $payload, int $projectId): ?int
    {
        if ($payload['_subproject_code'] === '' && $payload['_subproject_name'] === '') {
            return null;
        }

        if ($payload['_subproject_code'] !== '') {
            $sub = $this->subprojects->where('code', $payload['_subproject_code'])->first();
            if ($sub) {
                return (int) $sub['id'];
            }
        }

        $id = $this->subprojects->insert([
            'project_id' => $projectId,
            'code' => $payload['_subproject_code'] ?: $this->generateCode('SP', 'ops_subprojects'),
            'name' => $payload['_subproject_name'] ?: ($payload['_subproject_code'] ?: 'Imported Subproject'),
            'owner' => $payload['owner'],
            'priority' => $payload['priority'] ?: 'P2',
            'status' => 'active',
            'due_date' => $payload['due_date'],
        ], true);

        return is_numeric($id) ? (int) $id : null;
    }

    private function generateCode(string $prefix, string $table): string
    {
        $db = db_connect();
        $count = (int) $db->table($table)->countAllResults();
        $size = $prefix === 'T' ? 4 : 3;

        return sprintf('%s-%0' . $size . 'd', $prefix, $count + 1);
    }

    private function normalizeDate(string $date): ?string
    {
        if ($date === '') {
            return null;
        }

        $ts = strtotime($date);

        return $ts ? date('Y-m-d', $ts) : null;
    }
}
