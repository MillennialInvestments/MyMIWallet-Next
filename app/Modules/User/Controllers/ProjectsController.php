<?php namespace App\Modules\User\Controllers;

use App\Controllers\BaseUserController;

use App\Libraries\MyMIProjects;
use App\Models\ProjectCommitmentsModel;
use App\Models\ProjectsModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class ProjectsController extends BaseUserController
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
        $projects = cache('projects_list');
        if (! is_array($projects)) {
            $projects = $this->projectsModel->getActiveProjectsWithStats();
            cache()->save('projects_list', $projects, 300);
        }

        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\index', [
            'projects' => $projects,
        ]);
    }

    public function view(int $projectId)
    {
        $details = $this->projectsModel->getProjectFullDetails($projectId);
        if ($details === []) {
            throw PageNotFoundException::forPageNotFound('Project not found.');
        }

        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\profile', $details);
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



    public function fund($projectId = null)
    {
        $userId = $this->currentUserId();
        $projectId = $projectId !== null ? (int) $projectId : null;

        if ($projectId === null) {
            $primary = $this->projectsService->getPrimaryFundProject();
            if (! $primary) {
                throw PageNotFoundException::forPageNotFound('Primary fund project not found.');
            }
            $projectId = (int) $primary['id'];
        }

        $dashboard = $this->projectsService->getFundDashboardData($projectId, $userId);
        if (empty($dashboard)) {
            throw PageNotFoundException::forPageNotFound('Fund project not found.');
        }

        return $this->renderTheme('App\Modules\User\Views\Projects\fund_dashboard', $dashboard);
    }

    public function purchaseFundUnits()
    {
        $this->ensurePost();
        helper('form');

        $rules = [
            'project_id' => 'required|integer',
            'investment_amount' => 'required|decimal|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            $errors = $this->validator->getErrors();
            if ($this->request->isAJAX()) {
                return $this->failValidationErrors($errors);
            }
            return redirect()->back()->withInput()->with('error', implode(' ', $errors));
        }

        $projectId = (int) $this->request->getPost('project_id');
        $amount = (float) $this->request->getPost('investment_amount');
        $userId = $this->currentUserId();
        $idempotencyKey = (string) ($this->request->getHeaderLine('X-Idempotency-Key') ?: $this->request->getPost('idempotency_key'));

        try {
            $result = $this->projectsService->issueUnitsAtNav($projectId, $userId, $amount, $idempotencyKey ?: null);
        } catch (\Throwable $e) {
            if ($this->request->isAJAX()) {
                return $this->fail($e->getMessage(), 400);
            }
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }

        if ($this->request->isAJAX()) {
            return $this->respond(['status' => 'ok', 'data' => $result]);
        }

        return redirect()->back()->with('success', 'Fund units purchased successfully.');
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
}
