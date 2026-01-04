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

    public function __construct()
    {
        parent::__construct();
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
