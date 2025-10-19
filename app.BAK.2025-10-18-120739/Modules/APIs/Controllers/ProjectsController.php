<?php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MyMIProjects;
use App\Models\ProjectInboxModel;
use App\Models\ProjectsModel;
use CodeIgniter\API\ResponseTrait;

class ProjectsController extends BaseController
{
    use ResponseTrait;

    protected MyMIProjects $projectsService;
    protected ProjectsModel $projectsModel;
    protected ProjectInboxModel $inbox;

    public function __construct()
    {
        $this->projectsService = new MyMIProjects();
        $this->projectsModel = new ProjectsModel();
        $this->inbox = new ProjectInboxModel();
    }

    public function fetchProjectEmails()
    {
        $this->assertCron();
        // Placeholder: Email ingestion handled by separate worker integration.
        return $this->respond(['status' => 'ok', 'processed' => 0]);
    }

    public function parseProjectEmails()
    {
        $this->assertCron();
        $leads = $this->inbox->where('status', 'new')->findAll();
        $count = 0;
        foreach ($leads as $lead) {
            try {
                $this->projectsService->parseLeadRecord($lead['id']);
                $count++;
            } catch (\Throwable $e) {
                log_message('error', 'Failed parsing lead {id}: {message}', ['id' => $lead['id'], 'message' => $e->getMessage()]);
            }
        }

        return $this->respond(['status' => 'ok', 'parsed' => $count]);
    }

    public function promoteLead(int $inboxId)
    {
        try {
            $projectId = $this->projectsService->promoteLeadToProject($inboxId);
            return $this->respond(['status' => 'ok', 'project_id' => $projectId]);
        } catch (\Throwable $e) {
            return $this->fail($e->getMessage(), 400);
        }
    }

    public function updateProject(int $projectId)
    {
        $payload = $this->request->getJSON(true) ?? [];
        $this->projectsModel->update($projectId, $payload);
        return $this->respond(['status' => 'ok']);
    }

    public function openCommitments(int $projectId)
    {
        $this->projectsService->openCommitments($projectId);
        return $this->respond(['status' => 'ok']);
    }

    public function checkThreshold(int $projectId)
    {
        $met = $this->projectsService->hasMetThreshold($projectId);
        if ($met) {
            $this->projectsModel->update($projectId, ['status' => 'threshold_met']);
        }
        return $this->respond(['status' => 'ok', 'threshold_met' => $met]);
    }

    public function launchPrivateAuction(int $projectId)
    {
        try {
            $auction = $this->projectsService->launchPrivateAuction($projectId);
            return $this->respond(['status' => 'ok', 'auction' => $auction]);
        } catch (\Throwable $e) {
            return $this->fail($e->getMessage(), 400);
        }
    }

    public function settlePrivateAuction(int $projectId)
    {
        try {
            $this->projectsService->settlePrivateAuction($projectId);
        } catch (\Throwable $e) {
            return $this->fail($e->getMessage(), 400);
        }
        return $this->respond(['status' => 'ok']);
    }

    public function markFunded(int $projectId)
    {
        $this->projectsService->markFunded($projectId);
        return $this->respond(['status' => 'ok']);
    }

    public function createQuarterlyDistribution(int $projectId)
    {
        $payload = $this->request->getJSON(true) ?? [];
        $start = $payload['period_start'] ?? date('Y-m-01');
        $end = $payload['period_end'] ?? date('Y-m-t');
        $gross = (float) ($payload['gross_revenue'] ?? 0);
        $net = (float) ($payload['net_distributable'] ?? $gross);

        $distributionId = $this->projectsService->createQuarterlyDistribution($projectId, $start, $end, $gross, $net);
        return $this->respond(['status' => 'ok', 'distribution_id' => $distributionId]);
    }

    public function runPayouts(int $projectId)
    {
        $distributionId = (int) ($this->request->getGet('distribution_id') ?? 0);
        if (! $distributionId) {
            return $this->failValidationErrors('distribution_id required');
        }
        $count = $this->projectsService->runPayouts($distributionId);
        return $this->respond(['status' => 'ok', 'processed' => $count]);
    }

    public function processMonthlyWithdrawals(int $projectId)
    {
        $processed = $this->projectsService->processMonthlyWithdrawals($projectId);
        return $this->respond(['status' => 'ok', 'processed' => $processed]);
    }

    protected function assertCron(): void
    {
        $token = $this->request->getHeaderLine('X-CRON-Key') ?: $this->request->getGet('cronKey');
        $expected = env('CRON_SHARED_KEY');
        if (! $expected || ! hash_equals((string) $expected, (string) $token)) {
            throw \CodeIgniter\Exceptions\PageForbiddenException::forPageForbidden('Invalid CRON token');
        }
    }
}
