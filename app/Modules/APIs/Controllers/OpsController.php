<?php

declare(strict_types=1);

namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Ops\OpsReportWriter;
use App\Libraries\Ops\OpsJobRegistry;
use App\Models\OpsJobsModel;
use App\Models\OpsQueueModel;
use App\Models\OpsRunsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Throwable;

class OpsController extends BaseController
{
    use ResponseTrait;

    protected OpsJobsModel $jobs;
    protected OpsQueueModel $queue;
    protected OpsRunsModel $runs;
    protected OpsJobRegistry $registry;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->jobs     = new OpsJobsModel();
        $this->queue    = new OpsQueueModel();
        $this->runs     = new OpsRunsModel();
        $this->registry = new OpsJobRegistry();
    }

    public function status(): ResponseInterface
    {
        if (($auth = $this->authorizeRequest()) !== true) {
            return $auth;
        }

        $queueId  = $this->request->getGet('queue_id');
        $counts = $this->queue->statusCounts();
        $jobs   = $this->jobs->orderBy('id', 'ASC')->limit(50)->findAll();
        $runs   = [];
        $queueRun = null;

        if ($queueId !== null) {
            $queueRun = $this->runs->findByQueueId((int) $queueId);
        }

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
            'queue_run'    => $queueRun,
        ]);
    }

    public function dispatch(): ResponseInterface
    {
        if (($auth = $this->authorizeRequest()) !== true) {
            return $auth;
        }

        if (! $this->request->is('post')) {
            return $this->respondError('Invalid method', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $jobKey  = $payload['job_key'] ?? null;
        $jobData = $payload['payload'] ?? [];

        if (! $jobKey) {
            return $this->respondError('job_key is required', Response::HTTP_BAD_REQUEST);
        }

        $job = $this->jobs->findByKey($jobKey);
        if (! $job) {
            return $this->respondError('Job not found', Response::HTTP_NOT_FOUND);
        }

        if (! (int) $job['is_enabled']) {
            return $this->respondError('Job disabled', Response::HTTP_FORBIDDEN);
        }

        $queueId = $this->queue->enqueue($jobKey, is_array($jobData) ? $jobData : []);

        return $this->respondCreated([
            'status'   => 'queued',
            'queue_id' => $queueId,
        ]);
    }

    public function ingestReport(): ResponseInterface
    {
        if (($auth = $this->authorizeRequest()) !== true) {
            return $auth;
        }

        if (! $this->request->is('post')) {
            return $this->respondError('Invalid method', Response::HTTP_METHOD_NOT_ALLOWED);
        }

        $payload      = $this->request->getJSON(true) ?? $this->request->getPost();
        $jobKey       = $payload['job_key'] ?? null;
        $markdown     = $payload['report_markdown'] ?? $payload['markdown'] ?? null;
        $runId        = isset($payload['run_id']) ? (int) $payload['run_id'] : null;
        $queueId      = isset($payload['queue_id']) ? (int) $payload['queue_id'] : null;
        $dateOverride = $payload['report_date'] ?? null;

        if (! $jobKey || ! is_string($jobKey)) {
            return $this->respondError('job_key is required', Response::HTTP_BAD_REQUEST);
        }

        if (! is_string($markdown) || trim($markdown) === '') {
            return $this->respondError('report_markdown is required', Response::HTTP_BAD_REQUEST);
        }

        $writer     = new OpsReportWriter();
        $reportPath = $writer->write($jobKey, $markdown, is_string($dateOverride) ? $dateOverride : null);

        if ($runId) {
            $this->runs->updateOutputTextByRunId($runId, $markdown);
        } elseif ($queueId) {
            $this->runs->updateOutputTextByQueueId($queueId, $markdown);
        }

        return $this->respondCreated([
            'status'      => 'stored',
            'job_key'     => $jobKey,
            'report_path' => $reportPath,
            'run_id'      => $runId,
            'queue_id'    => $queueId,
        ]);
    }

    public function latestReport(): ResponseInterface
    {
        if (($auth = $this->authorizeRequest()) !== true) {
            return $auth;
        }

        $baseDir = ROOTPATH . 'docs/ops/reports';
        if (! is_dir($baseDir)) {
            return $this->respondError('No reports directory', Response::HTTP_NOT_FOUND);
        }

        $latestFile = null;
        $latestMtime = 0;
        foreach (glob($baseDir . '/*/*') ?: [] as $file) {
            if (! is_file($file)) {
                continue;
            }
            $mtime = filemtime($file) ?: 0;
            if ($mtime > $latestMtime) {
                $latestMtime = $mtime;
                $latestFile  = $file;
            }
        }

        if (! $latestFile) {
            return $this->respondError('No reports found', Response::HTTP_NOT_FOUND);
        }

        return $this->respond([
            'path'     => str_replace(ROOTPATH, '', $latestFile),
            'modified' => date('c', (int) $latestMtime),
            'content'  => file_get_contents($latestFile),
        ]);
    }

    /**
     * @return bool|ResponseInterface
     */
    protected function authorizeRequest()
    {
        if ($this->isAdmin()) {
            return true;
        }

        $hmacResult = $this->validateHmac();
        if ($hmacResult === true) {
            return true;
        }

        return $this->respondError(is_string($hmacResult) ? $hmacResult : 'Unauthorized', Response::HTTP_UNAUTHORIZED);
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

    /**
     * @return true|string Returns true if valid, otherwise an error message.
     */
    protected function validateHmac()
    {
        $secret = env('ops.sharedSecret') ?? env('app.opsSharedSecret');
        if (! $secret) {
            return 'Missing shared secret';
        }

        $headerSig  = $this->request->getHeaderLine('X-MyMI-Signature');
        $headerTime = $this->request->getHeaderLine('X-MyMI-Timestamp');

        if ($headerSig === '' || $headerTime === '') {
            return 'Missing HMAC headers';
        }

        if (! ctype_digit($headerTime)) {
            return 'Invalid timestamp';
        }

        $timestamp = (int) $headerTime;
        if (abs(time() - $timestamp) > 300) {
            return 'Timestamp too old';
        }

        $path = '/' . ltrim($this->request->getUri()->getPath(), '/');
        $body = (string) $this->request->getBody();
        $message = $headerTime . "\n" . $path . "\n" . $body;
        $expected = base64_encode(hash_hmac('sha256', $message, $secret, true));

        return hash_equals($expected, trim($headerSig)) ? true : 'Invalid signature';
    }

    protected function respondError(string $message, int $statusCode): ResponseInterface
    {
        return $this->respond([
            'status'  => 'error',
            'message' => $message,
        ], $statusCode);
    }
}
