<?php

declare(strict_types=1);

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use App\Models\OpsJobsModel;
use App\Models\OpsQueueModel;
use App\Models\OpsRunsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class OpsController extends UserController
{
    use ResponseTrait;

    protected OpsJobsModel $jobs;
    protected OpsQueueModel $queue;
    protected OpsRunsModel $runs;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->jobs  = new OpsJobsModel();
        $this->queue = new OpsQueueModel();
        $this->runs  = new OpsRunsModel();
    }

    public function index(): ResponseInterface|string
    {
        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setBody('Forbidden');
        }

        $data['pageTitle'] = 'Ops Dashboard';
        $data['ops']       = $this->buildStatusPayload();

        return $this->renderTheme('App\\Modules\\Management\\Views\\Ops\\index', $data);
    }

    public function ajaxStatus(): ResponseInterface
    {
        if (! $this->isAdmin()) {
            return $this->failUnauthorized('Unauthorized');
        }

        return $this->respond($this->buildStatusPayload());
    }

    public function ajaxDispatch(): ResponseInterface
    {
        if (! $this->isAdmin()) {
            return $this->failUnauthorized('Unauthorized');
        }

        if (! $this->request->is('post')) {
            return $this->fail('Invalid method', 405);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $jobKey  = $payload['job_key'] ?? null;
        $jobData = $payload['payload'] ?? [];

        if (! $jobKey) {
            return $this->failValidationErrors('job_key is required');
        }

        $job = $this->jobs->findByKey($jobKey);
        if (! $job) {
            return $this->failNotFound('Job not found');
        }

        if (! (int) $job['is_enabled']) {
            return $this->failForbidden('Job disabled');
        }

        $queueId = $this->queue->enqueue($jobKey, is_array($jobData) ? $jobData : []);

        return $this->respond([
            'status'   => 'queued',
            'queue_id' => $queueId,
        ]);
    }

    protected function buildStatusPayload(): array
    {
        $counts = $this->queue->statusCounts();
        $jobs   = $this->jobs->orderBy('id', 'ASC')->limit(50)->findAll();

        foreach ($jobs as &$job) {
            $job['last_run'] = $this->runs->lastRunForJob((int) $job['id']);
        }

        return [
            'queue_counts' => $counts,
            'jobs'         => $jobs,
            'recent_runs'  => $this->runs->recentRuns(25),
            'filesystem_governance' => $this->filesystemGovernanceStatus(),
        ];
    }

    private function filesystemGovernanceStatus(): array
    {
        $lintPath = ROOTPATH . 'docs/_ops/filesystem-lint.json';
        $trendPath = ROOTPATH . 'docs/_ops/filesystem-trend.md';

        $lint = [];
        if (is_file($lintPath)) {
            $decoded = json_decode((string) file_get_contents($lintPath), true);
            if (is_array($decoded)) {
                $lint = $decoded;
            }
        }

        $errors = (int) ($lint['severity_summary']['error'] ?? 0);
        $warnings = (int) ($lint['severity_summary']['warning'] ?? 0);
        $status = $errors > 0 ? 'unhealthy' : ($warnings > 0 ? 'warning' : 'healthy');

        $trend = 'stable';
        if (is_file($trendPath)) {
            $trendBody = (string) file_get_contents($trendPath);
            if (str_contains($trendBody, '✅ Improving')) {
                $trend = 'improving';
            } elseif (str_contains($trendBody, '❌ Regressing')) {
                $trend = 'regressing';
            }
        }

        return [
            'status' => $status,
            'errors' => $errors,
            'warnings' => $warnings,
            'trend' => $trend,
            'last_run' => (string) ($lint['generated_at'] ?? ''),
        ];
    }

    protected function isAdmin(): bool
    {
        if (function_exists('has_permission') && has_permission('admin.access')) {
            return true;
        }

        $auth = service('authentication');
        if (method_exists($auth, 'user')) {
            $user = $auth->user();
            if ($user && method_exists($user, 'can') && $user->can('admin.access')) {
                return true;
            }
        }

        return false;
    }
}
