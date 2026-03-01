<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Libraries\MyMIProjects;
use App\Models\ProjectCommitmentsModel;
use App\Models\ProjectsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class ProjectsController extends BaseController
{
    use ResponseTrait;

    protected MyMIProjects $projectsService;
    protected ProjectsModel $projectsModel;
    protected ProjectCommitmentsModel $commitments;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->projectsService = new MyMIProjects();
        $this->projectsModel = new ProjectsModel();
        $this->commitments = new ProjectCommitmentsModel();
    }

    public function index()
    {
        $userId = null;
        try {
            $userId = $this->currentUserId();
        } catch (\Throwable $e) {
            // Visitor not authenticated; continue with public data.
        }
        $payload = $this->projectsService->projectsData($userId);
        $data = [
            'projects' => $payload['list'] ?? [],
            'summary'  => $payload,
        ];
        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\index', $data);
    }

    public function view(string $slug)
    {
        $project = $this->projectsModel->findBySlug($slug);
        if (! $project) {
            throw PageNotFoundException::forPageNotFound('Project not found.');
        }

        $committed = $this->projectsService->totalCommitted($project['id']);
        $target = (float) ($project['target_raise'] ?? 0);
        $progress = $target > 0 ? min($committed / $target, 1.0) : 0;

        $data = [
            'project'   => $project,
            'committed' => $committed,
            'target'    => $target,
            'progress'  => $progress,
        ];
        helper('form');
        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\index', $data);
    }

    public function commit(int $projectId)
    {
        $this->ensurePost();
        $userId = $this->currentUserId();

        $amount = (float) $this->request->getPost('amount');
        if ($amount <= 0) {
            return $this->failValidationErrors('Amount must be greater than zero.');
        }

        try {
            $this->projectsService->recordCommitment($projectId, $userId, $amount);
        } catch (\Throwable $e) {
            return $this->fail($e->getMessage(), 400);
        }

        return $this->respond(['status' => 'ok']);
    }

    public function withdrawCommit(int $projectId)
    {
        $this->ensurePost();
        $userId = $this->currentUserId();

        $commitment = $this->commitments
            ->where('project_id', $projectId)
            ->where('user_id', $userId)
            ->where('status', 'confirmed')
            ->first();

        if (! $commitment) {
            return $this->failNotFound('No active commitment found.');
        }

        $this->commitments->update($commitment['id'], [
            'status'     => 'withdrawn',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return $this->respond(['status' => 'ok']);
    }

    public function myCommitments()
    {
        $userId = $this->currentUserId();
        $records = $this->commitments
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->findAll();

        return $this->respond(['status' => 'ok', 'data' => $records]);
    }

    public function requestMonthlyWithdrawal(int $projectId)
    {
        $this->ensurePost();
        $userId = $this->currentUserId();

        try {
            $record = $this->projectsService->requestMonthlyWithdrawal($projectId, $userId);
        } catch (\Throwable $e) {
            return $this->fail($e->getMessage(), 400);
        }

        return $this->respond(['status' => 'ok', 'data' => $record]);
    }

    public function acceptPrivateAllocation(int $projectId)
    {
        $this->ensurePost();
        // Placeholder for confirmation workflow.
        return $this->respond(['status' => 'ok', 'message' => 'Allocation accepted.']);
    }

    protected function ensurePost(): void
    {
        if ($this->request->getMethod() !== 'post') {
            throw PageNotFoundException::forPageNotFound();
        }
    }

    protected function currentUserId(): int
    {
        $auth = service('authentication');
        $userId = $auth->id();
        if (! $userId) {
            $userId = Services::session()->get('user_id');
        }
        if (! $userId) {
            throw PageNotFoundException::forPageNotFound('User not authenticated.');
        }
        return (int) $userId;
    }

    public function approveProject(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::approveProject');
        return redirect()->to('/Maintenance');
    }

    public function checkThreshold(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::checkThreshold');
        return redirect()->to('/Maintenance');
    }

    public function createQuarterlyDistribution(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::createQuarterlyDistribution');
        return redirect()->to('/Maintenance');
    }

    public function fetchProjectEmails(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::fetchProjectEmails');
        return redirect()->to('/Maintenance');
    }

    public function launchPrivateAuction(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::launchPrivateAuction');
        return redirect()->to('/Maintenance');
    }

    public function markFunded(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::markFunded');
        return redirect()->to('/Maintenance');
    }

    public function openCommitments(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::openCommitments');
        return redirect()->to('/Maintenance');
    }

    public function parseProjectEmails(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::parseProjectEmails');
        return redirect()->to('/Maintenance');
    }

    public function processMonthlyWithdrawals(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::processMonthlyWithdrawals');
        return redirect()->to('/Maintenance');
    }

    public function promoteLead(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::promoteLead');
        return redirect()->to('/Maintenance');
    }

    public function realEstateQuickIntake(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::realEstateQuickIntake');
        return redirect()->to('/Maintenance');
    }

    public function realEstateQuickSubmit(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::realEstateQuickSubmit');
        return redirect()->to('/Maintenance');
    }

    public function rejectProject(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::rejectProject');
        return redirect()->to('/Maintenance');
    }

    public function runPayouts(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::runPayouts');
        return redirect()->to('/Maintenance');
    }

    public function settlePrivateAuction(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::settlePrivateAuction');
        return redirect()->to('/Maintenance');
    }

    public function updateProject(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: ProjectsController::updateProject');
        return redirect()->to('/Maintenance');
    }
}
