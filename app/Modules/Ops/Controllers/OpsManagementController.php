<?php

declare(strict_types=1);

namespace App\Modules\Ops\Controllers;

use App\Controllers\UserController;
use App\Models\OpsProjectModel;
use App\Models\OpsSubprojectModel;
use App\Models\OpsTaskModel;
use App\Services\OpsExportService;
use App\Services\OpsImportService;
use CodeIgniter\HTTP\ResponseInterface;

class OpsManagementController extends UserController
{
    private OpsProjectModel $projects;
    private OpsTaskModel $tasks;
    private OpsSubprojectModel $subprojects;
    private OpsImportService $importer;
    private OpsExportService $exporter;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->projects = new OpsProjectModel();
        $this->tasks = new OpsTaskModel();
        $this->subprojects = new OpsSubprojectModel();
        $this->importer = new OpsImportService();
        $this->exporter = new OpsExportService();
    }

    public function index(): ResponseInterface|string
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $tasks = $this->tasks->findAll();
        $doneCount = count(array_filter($tasks, static fn(array $t): bool => in_array(strtolower((string) ($t['status'] ?? '')), ['done', 'closed', 'completed'], true)));
        $total = count($tasks);

        $data['pageTitle'] = 'Ops Management Dashboard';
        $data['opsSummary'] = [
            'projects' => $this->projects->countAllResults(),
            'tasks' => $total,
            'blockers' => count(array_filter($tasks, static fn(array $t): bool => strtolower((string) ($t['severity'] ?? '')) === 'blocker' || strtolower((string) ($t['status'] ?? '')) === 'blocked')),
            'readiness' => $total > 0 ? (int) round(($doneCount / $total) * 100) : 0,
        ];

        return $this->renderTheme('App\\Modules\\Ops\\Views\\Management\\index', $data);
    }

    public function projects(): ResponseInterface
    {
        return $this->response->setJSON(['data' => $this->projects->orderBy('updated_at', 'DESC')->findAll()]);
    }

    public function saveProject(): ResponseInterface
    {
        $payload = $this->request->getPost();
        $id = isset($payload['id']) ? (int) $payload['id'] : 0;
        unset($payload['id']);

        if ($id > 0) {
            $this->projects->update($id, $payload);
        } else {
            if (($payload['code'] ?? '') === '') {
                $payload['code'] = sprintf('P-%03d', $this->projects->countAllResults() + 1);
            }
            $id = (int) $this->projects->insert($payload, true);
        }

        $this->refreshRepoExports();

        return $this->response->setJSON(['ok' => true, 'id' => $id]);
    }

    public function subprojects(): ResponseInterface
    {
        return $this->response->setJSON(['data' => $this->subprojects->orderBy('updated_at', 'DESC')->findAll()]);
    }

    public function saveSubproject(): ResponseInterface
    {
        $payload = $this->request->getPost();
        $id = isset($payload['id']) ? (int) $payload['id'] : 0;
        unset($payload['id']);

        if ($id > 0) {
            $this->subprojects->update($id, $payload);
        } else {
            if (($payload['code'] ?? '') === '') {
                $payload['code'] = sprintf('SP-%03d', $this->subprojects->countAllResults() + 1);
            }
            $id = (int) $this->subprojects->insert($payload, true);
        }

        $this->refreshRepoExports();

        return $this->response->setJSON(['ok' => true, 'id' => $id]);
    }

    public function tasks(): ResponseInterface
    {
        return $this->response->setJSON(['data' => $this->exporter->tasksForGrid()]);
    }

    public function saveTask(): ResponseInterface
    {
        $payload = $this->request->getPost();
        $id = isset($payload['id']) ? (int) $payload['id'] : 0;
        unset($payload['id']);

        if ($id > 0) {
            $this->tasks->update($id, $payload);
        } else {
            if (($payload['code'] ?? '') === '') {
                $payload['code'] = sprintf('T-%04d', $this->tasks->countAllResults() + 1);
            }
            $payload['updated_utc'] = gmdate('Y-m-d H:i:s');
            $id = (int) $this->tasks->insert($payload, true);
        }

        $this->refreshRepoExports();

        return $this->response->setJSON(['ok' => true, 'id' => $id]);
    }

    public function importXlsx(): ResponseInterface
    {
        $file = $this->request->getFile('workbook');
        if (! $file || ! $file->isValid()) {
            return $this->response->setStatusCode(422)->setJSON(['ok' => false, 'error' => 'Workbook upload failed']);
        }

        $result = $this->importer->importXlsx($file->getRealPath() ?: $file->getTempName(), (string) (service('request')->getServer('REMOTE_USER') ?? 'web'));
        $result['ok'] = $result['ok'] ?? false;

        if ($result['ok']) {
            $this->refreshRepoExports();
        }

        return $this->response->setJSON($result);
    }

    public function exportTasksCsv(): ResponseInterface
    {
        $repoPath = ROOTPATH . 'docs/_aiops/gtm/tasks.csv';
        $path = $this->exporter->exportTasksCsv($repoPath);

        return $this->response
            ->download($path, null)
            ->setFileName('tasks.csv');
    }

    public function exportWorkbookXlsx(): ResponseInterface
    {
        $repoPath = ROOTPATH . 'docs/_aiops/gtm/workbook.xlsx';
        $result = $this->exporter->exportWorkbookXlsx($repoPath);
        if (! ($result['ok'] ?? false)) {
            return $this->response->setStatusCode(500)->setJSON($result);
        }

        return $this->response
            ->download($repoPath, null)
            ->setFileName('workbook.xlsx');
    }

    private function refreshRepoExports(): void
    {
        $this->exporter->exportTasksCsv(ROOTPATH . 'docs/_aiops/gtm/tasks.csv');
        $this->exporter->exportWorkbookXlsx(ROOTPATH . 'docs/_aiops/gtm/workbook.xlsx');
    }
}
