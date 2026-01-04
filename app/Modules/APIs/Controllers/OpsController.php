<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Ops\OpsJobRegistry;
use App\Models\OpsJobsModel;
use App\Models\OpsQueueModel;
use App\Models\OpsRunsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class OpsController extends BaseController
{
    use ResponseTrait;

    protected OpsJobsModel $jobs;
    protected OpsQueueModel $queue;
    protected OpsRunsModel $runs;
    protected OpsJobRegistry $registry;

    public function __construct()
    {
        $this->jobs     = new OpsJobsModel();
        $this->queue    = new OpsQueueModel();
        $this->runs     = new OpsRunsModel();
        $this->registry = new OpsJobRegistry();
    }

    public function status(): ResponseInterface
    {
        if (! $this->authorized()) {
            return $this->failUnauthorized('Unauthorized');
        }

        $counts = $this->queue->statusCounts();
        $jobs   = $this->jobs->orderBy('id', 'ASC')->limit(50)->findAll();
        $runs   = [];

        foreach ($jobs as &$job) {
            $lastRun = $this->runs->lastRunForJob((int) $job['id']);
            $job['last_run'] = $lastRun;
            if ($lastRun) {
                $runs[] = $lastRun;
            }
        }

        return $this->respond([
            'queue_counts' => $counts,
            'jobs'         => $jobs,
            'recent_runs'  => $runs,
        ]);
    }

    public function dispatch(): ResponseInterface
    {
        if (! $this->authorized()) {
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

        return $this->respondCreated([
            'status'   => 'queued',
            'queue_id' => $queueId,
        ]);
    }

    protected function authorized(): bool
    {
        return $this->isAdmin() || $this->validHmac();
    }

    protected function isAdmin(): bool
    {
        try {
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
        } catch (Throwable $e) {
            // ignore and fallback to HMAC
        }

        return false;
    }

    protected function validHmac(): bool
    {
        $secret = env('ops.sharedSecret') ?? env('app.opsSharedSecret');
        if (! $secret) {
            return false;
        }

        $headerSig = $this->request->getHeaderLine('X-Ops-Signature');
        if ($headerSig === '') {
            return false;
        }

        $body    = $this->request->getBody();
        $message = $body !== '' ? $body : $this->request->getUri()->getPath();
        $expected = hash_hmac('sha256', $message, $secret);

        return hash_equals($expected, trim($headerSig));
    }
}
