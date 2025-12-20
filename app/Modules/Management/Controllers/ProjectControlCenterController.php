<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use App\Modules\Management\Models\ProjectControlModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class ProjectControlCenterController extends UserController
{
    use ResponseTrait;

    protected ProjectControlModel $projectControlModel;
    protected $helpers = ['form', 'url', 'text'];

    public function __construct()
    {
        $this->projectControlModel = new ProjectControlModel();
    }

    public function index()
    {
        if ($forbidden = $this->ensureAdmin()) {
            return $forbidden;
        }

        $this->data['pageTitle'] = 'Project Control Center | Management';
        $this->data['statusOptions'] = ProjectControlModel::STATUSES;
        $this->data['useDataTables'] = true;
        $this->data['useClipboardJS'] = true;
        $this->data['useBootstrapIcons'] = true;

        return $this->renderTheme('App\Modules\Management\Views\Projects\control_center', $this->data);
    }

    public function list(): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $params = $this->request->getGet();
        $cache = cache();
        $cacheKey = 'pcc:list:' . md5(json_encode($params));
        $ttl = 90;

        $list = $cache->remember($cacheKey, $ttl, function () use ($params) {
            return $this->projectControlModel->list($params);
        });

        $response = [
            'draw' => (int) ($params['draw'] ?? 1),
            'recordsTotal' => $list['recordsTotal'],
            'recordsFiltered' => $list['recordsFiltered'],
            'data' => $list['data'],
            'status' => 'success',
        ];

        return $this->respond($response);
    }

    public function detail(int $id): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $record = $this->projectControlModel->find($id);
        if (!$record) {
            return $this->respond(['status' => 'error', 'message' => 'Record not found'], 404);
        }

        return $this->respond(['status' => 'success', 'data' => $record]);
    }

    public function upsert(): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();

        if (empty($payload['project_name']) || empty($payload['component'])) {
            return $this->respond(['status' => 'error', 'message' => 'project_name and component are required'], 422);
        }

        $status = $payload['status'] ?? 'Active';
        if (!in_array($this->projectControlModel->normalizeStatus($status), ProjectControlModel::STATUSES, true)) {
            return $this->respond(['status' => 'error', 'message' => 'Invalid status value'], 422);
        }

        try {
            $record = $this->projectControlModel->upsertItem($payload, $this->cuID);
            log_message('info', 'ProjectControlCenter upsert', [
                'record_id' => $record['id'] ?? null,
                'user_id' => $this->cuID,
            ]);
            return $this->respond(['status' => 'success', 'data' => $record]);
        } catch (Throwable $e) {
            log_message('error', 'ProjectControlCenter upsert failed: {msg}', ['msg' => $e->getMessage()]);
            return $this->respond(['status' => 'error', 'message' => 'Unable to save record'], 500);
        }
    }

    public function updateStatus(int $id): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $status = $payload['status'] ?? '';
        $normalized = $this->projectControlModel->normalizeStatus($status);

        if (!in_array($normalized, ProjectControlModel::STATUSES, true)) {
            return $this->respond(['status' => 'error', 'message' => 'Invalid status value'], 422);
        }

        $updated = $this->projectControlModel->updateStatus($id, $normalized, $this->cuID);
        if (!$updated) {
            return $this->respond(['status' => 'error', 'message' => 'Unable to update status'], 500);
        }

        log_message('info', 'ProjectControlCenter status update', ['record_id' => $id, 'status' => $normalized, 'user_id' => $this->cuID]);

        return $this->respond(['status' => 'success', 'data' => ['id' => $id, 'status' => $normalized]]);
    }

    public function updateNotes(int $id): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $notes = $payload['notes'] ?? '';

        $updated = $this->projectControlModel->updateNotes($id, $notes, $this->cuID);
        if (!$updated) {
            return $this->respond(['status' => 'error', 'message' => 'Unable to update notes'], 500);
        }

        log_message('info', 'ProjectControlCenter notes update', ['record_id' => $id, 'user_id' => $this->cuID]);

        return $this->respond(['status' => 'success', 'data' => ['id' => $id]]);
    }

    public function exportCsv()
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $filters = $this->request->getGet();
        $rows = $this->projectControlModel->fetchForExport($filters);

        $filename = 'project_control_center_' . date('Ymd_His') . '.csv';
        $fh = fopen('php://temp', 'r+');

        fputcsv($fh, [
            'ID', 'Project Name', 'Category', 'Subcategory', 'Component', 'Description',
            'Status', 'Primary Files', 'Notes', 'Tags JSON', 'Source Type', 'Source Ref',
            'Created By', 'Updated By', 'Created At', 'Updated At',
        ]);

        foreach ($rows as $row) {
            fputcsv($fh, [
                $row['id'],
                $row['project_name'],
                $row['category'],
                $row['subcategory'],
                $row['component'],
                $row['description'],
                $row['status'],
                $row['primary_files'],
                $row['notes'],
                $row['tags_json'],
                $row['source_type'],
                $row['source_ref'],
                $row['created_by'],
                $row['updated_by'],
                $row['created_at'],
                $row['updated_at'],
            ]);
        }

        rewind($fh);
        $csv = stream_get_contents($fh);
        fclose($fh);

        return $this->response
            ->setHeader('Content-Type', 'text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($csv ?? '');
    }

    public function exportJson(): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $filters = $this->request->getGet();
        $filters['search'] = $filters['search']['value'] ?? ($filters['search'] ?? '');
        $rows = $this->projectControlModel->fetchForExport($filters);

        return $this->respond(['status' => 'success', 'data' => $rows]);
    }

    public function importCsv(): ResponseInterface
    {
        if ($forbidden = $this->ensureAdmin(true)) {
            return $forbidden;
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $csv = trim((string) ($payload['csv_payload'] ?? ''));
        $projectName = trim((string) ($payload['project_name'] ?? ''));
        $sourceType = trim((string) ($payload['source_type'] ?? 'csv_import'));

        if ($csv === '') {
            return $this->respond(['status' => 'error', 'message' => 'CSV payload is required'], 422);
        }

        $rows = $this->parseCsv($csv, $projectName);
        $result = $this->projectControlModel->importRows($rows, $this->cuID, $projectName, $sourceType);

        $this->logImport($csv, $result, $projectName, $sourceType);

        return $this->respond(['status' => 'success', 'data' => $result]);
    }

    /**
     * @return array<int,array<string,mixed>>
     */
    protected function parseCsv(string $csv, string $projectName): array
    {
        $lines = preg_split('/\r\n|\r|\n/', $csv);
        $rows = [];
        $headers = [];

        foreach ($lines as $index => $line) {
            if (trim($line) === '') {
                continue;
            }

            $row = str_getcsv($line);
            if ($index === 0) {
                $headers = array_map('trim', $row);
                continue;
            }

            $mapped = $this->mapCsvRow($headers, $row, $projectName);
            if ($mapped !== []) {
                $rows[] = $mapped;
            }
        }

        return $rows;
    }

    /**
     * @param array<int,string> $headers
     * @param array<int,string> $row
     * @return array<string,mixed>
     */
    protected function mapCsvRow(array $headers, array $row, string $defaultProject): array
    {
        $data = array_combine($headers, $row);
        if ($data === false) {
            return [];
        }

        $component = trim((string) ($data['Component'] ?? $data['component'] ?? ''));
        if ($component === '') {
            return [];
        }

        $status = $data['Status'] ?? $data['status'] ?? 'Active';

        return [
            'project_name' => $data['Project Name'] ?? $data['project_name'] ?? $defaultProject,
            'category' => $data['Category'] ?? $data['category'] ?? '',
            'subcategory' => $data['Subcategory'] ?? $data['subcategory'] ?? '',
            'component' => $component,
            'description' => $data['Description'] ?? $data['description'] ?? '',
            'status' => $this->projectControlModel->normalizeStatus((string) $status),
            'primary_files' => $data['Primary Files / Modules'] ?? $data['primary_files'] ?? '',
            'notes' => $data['Notes / Next Actions'] ?? $data['notes'] ?? '',
            'tags_json' => $data['Tags'] ?? $data['tags_json'] ?? null,
        ];
    }

    protected function ensureAdmin(bool $jsonOnly = false): ?ResponseInterface
    {
        $isAdmin = $this->getMyMIUser()->isAdmin($this->cuID);
        if ($isAdmin) {
            return null;
        }

        log_message('warning', 'ProjectControlCenter forbidden access', ['user_id' => $this->cuID]);

        if ($jsonOnly || $this->request->isAJAX() || $this->request->isJSON()) {
            return $this->respond(['status' => 'error', 'message' => 'Forbidden'], 403);
        }

        return redirect()->to('/')->with('error', 'Admin access required');
    }

    /**
     * @param array<string,int> $result
     */
    protected function logImport(string $csv, array $result, string $projectName, string $sourceType): void
    {
        log_message('info', 'ProjectControlCenter import summary', array_merge($result, [
            'user_id' => $this->cuID,
            'project_name' => $projectName,
            'source_type' => $sourceType,
        ]));

        $db = $this->projectControlModel->db;
        try {
            if (in_array('bf_project_control_center_imports', $db->listTables(), true)) {
                $db->table('bf_project_control_center_imports')->insert([
                    'project_name' => $projectName,
                    'source_type' => $sourceType,
                    'csv_payload' => $csv,
                    'inserted' => $result['inserted'] ?? 0,
                    'updated' => $result['updated'] ?? 0,
                    'skipped' => $result['skipped'] ?? 0,
                    'created_by' => $this->cuID,
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        } catch (Throwable $e) {
            log_message('error', 'ProjectControlCenter import log failed: {msg}', ['msg' => $e->getMessage()]);
        }
    }
}
