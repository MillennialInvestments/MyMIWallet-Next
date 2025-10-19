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

    public function __construct()
    {
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
        return view('App//Modules\\User\\Views\\Projects\\index', $data);
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
        return view('App//Modules\\User\\Views\\Projects\\view', $data);
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
}
