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
        $this->data['pageTitle'] = 'Projects | MyMI Wallet | The Future of Finance';
        $projects = cache('projects_list');
        if (! is_array($projects)) {
            $projects = $this->projectsModel->getActiveProjectsWithStats();
            cache()->save('projects_list', $projects, 300);
        }

        $this->data['projects'] = $projects;
        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\index', $this->data);
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

    // ---------------------------------------------------------------------
    // GT-FORM-ROUTES-001: handlers for the project modals on the dashboard.
    // Commit/Invest/Sell sit behind the "project_investing" switch (off by
    // default, see Routes.php). The user id always comes from the session.
    // ---------------------------------------------------------------------

    /** @param array<string, mixed> $result */
    private function formReply(array $result, string $okMessage)
    {
        $messages = [
            'invalid_input' => 'Please check the form and try again.',
            'not_found'     => 'That project was not found.',
            'not_signed_in' => 'Please sign in.',
            'table_missing' => 'This is not available yet.',
        ];
        if ($result['ok']) {
            return $this->respond(['status' => 'success', 'message' => $okMessage, 'id' => $result['id'] ?? null]);
        }
        $code = match ($result['reason']) {
            'invalid_input' => 422, 'not_found' => 404, 'not_signed_in' => 401, 'table_missing' => 503, default => 400,
        };

        return $this->respond([
            'status'  => 'error',
            'message' => $messages[$result['reason']] ?? ($result['message'] ?? 'Request failed.'),
            'errors'  => $result['errors'] ?? [],
        ], $code);
    }

    /** POST Projects/SubmitCommit (and SubmitInvest): records a commitment. */
    public function submitCommit()
    {
        $this->ensurePost();
        $userId = $this->currentUserId();
        $projectId = (int) $this->request->getPost('project_id');
        $amount = (float) ($this->request->getPost('commitment_amount') ?? $this->request->getPost('investment_amount') ?? $this->request->getPost('amount') ?? 0);
        if ($projectId <= 0 || ! is_finite($amount) || $amount <= 0) {
            return $this->formReply(['ok' => false, 'reason' => 'invalid_input'], '');
        }

        try {
            $this->projectsService->recordCommitment($projectId, $userId, $amount);
        } catch (\Throwable $e) {
            return $this->formReply(['ok' => false, 'reason' => 'failed', 'message' => $e->getMessage()], '');
        }

        return $this->formReply(['ok' => true, 'reason' => 'stored'], 'Commitment submitted.');
    }

    public function submitInvest()
    {
        return $this->submitCommit();
    }

    /** POST Projects/SubmitSell: records a sale request for admin review. */
    public function submitSell()
    {
        $this->ensurePost();
        $result = (new \App\Services\Forms\ProjectFormService())->requestSale(
            $this->currentUserId(),
            (int) $this->request->getPost('project_id'),
            (float) $this->request->getPost('sell_amount'),
            (string) $this->request->getPost('remarks'),
            $this->request->getPost('sell_date') ? (string) $this->request->getPost('sell_date') : null
        );

        return $this->formReply($result, 'Sale request submitted. Our team will review it.');
    }

    /** POST Projects/AddComment */
    public function addComment()
    {
        $this->ensurePost();
        $result = (new \App\Services\Forms\ProjectFormService())->addComment(
            $this->currentUserId(),
            (int) $this->request->getPost('project_id'),
            (string) $this->request->getPost('discussion_topic'),
            (string) $this->request->getPost('message')
        );

        return $this->formReply($result, 'Comment added.');
    }

    /** POST Projects/Add: a user's project proposal, saved as pending for admin review. */
    public function submitProposal()
    {
        $this->ensurePost();
        $userId = $this->currentUserId();
        $user = db_connect()->table('bf_users')->select('email, username')->where('id', $userId)->limit(1)->get()->getRowArray() ?? [];
        $result = (new \App\Services\Forms\ProjectFormService())->propose(
            $userId,
            (string) ($user['email'] ?? ''),
            (string) ($user['username'] ?? ''),
            (array) $this->request->getPost()
        );

        return $this->formReply($result, 'Project submitted for review.');
    }

    /** POST Projects/reportRevenue: records reported project revenue */
    public function reportRevenue()
    {
        $this->ensurePost();
        $projectId = (int) $this->request->getPost('project_id');
        $amount = (float) $this->request->getPost('amount');
        if ($projectId <= 0 || ! is_finite($amount) || $amount <= 0) {
            return $this->formReply(['ok' => false, 'reason' => 'invalid_input'], 'Invalid revenue input.');
        }

        $userId = $this->currentUserId();
        $db = db_connect();
        // Only the project's creator may report its revenue; anyone else gets
        // the same answer as for a project that does not exist.
        $owned = $db->tableExists('bf_projects')
            && $db->table('bf_projects')->select('id')->where(['id' => $projectId, 'created_by' => $userId])->limit(1)->get()->getRowArray() !== null;
        if (! $owned) {
            return $this->formReply(['ok' => false, 'reason' => 'not_found'], 'Project revenue recorded.');
        }
        if ($db->tableExists('bf_projects_fund_distributions')) {
            $row = array_intersect_key([
                'project_id'        => $projectId,
                'amount'            => $amount,
                'distribution_date' => date('Y-m-d'),
                'created_at'        => date('Y-m-d H:i:s'),
            ], array_flip($db->getFieldNames('bf_projects_fund_distributions')));
            if (! $db->table('bf_projects_fund_distributions')->insert($row)) {
                log_message('error', 'Project revenue insert failed: ' . json_encode($db->error()));

                return $this->formReply(['ok' => false, 'reason' => 'store_failed', 'message' => 'Revenue could not be saved.'], '');
            }
        }

        return $this->formReply(['ok' => true, 'reason' => 'stored'], 'Project revenue recorded.');
    }

    /** GET Projects/Real-Estate: Real Estate Syndication Marketplace */
    public function realEstateMarketplace()
    {
        $this->data['pageTitle'] = 'Real Estate Private Equity & Syndication | MyMI Wallet';
        $reModel = new \App\Models\ProjectsRealEstateModel();
        $this->data['properties'] = $reModel->getActiveRealEstateProjects(50);
        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\real_estate_marketplace', $this->data);
    }

    /** GET Projects/Real-Estate/(:num): Property Details, Pro Forma, & Co-Investment */
    public function realEstateDetail(int $projectId)
    {
        $project = $this->projectsModel->find($projectId);
        if (! $project) {
            throw PageNotFoundException::forPageNotFound('Project not found.');
        }

        $reModel = new \App\Models\ProjectsRealEstateModel();
        $property = $reModel->getByProjectId($projectId);

        $revModel = new \App\Models\ProjectsRealEstateRevenueModel();
        $revenues = $revModel->getRevenuesByProject($projectId, 20);
        $totals = $revModel->getProjectDistributedTotals($projectId);

        $this->data['pageTitle'] = esc($project['name'] ?? $project['title']) . ' | Real Estate Syndication';
        $this->data['project'] = $project;
        $this->data['property'] = $property;
        $this->data['revenues'] = $revenues;
        $this->data['revenueTotals'] = $totals;

        return $this->renderTheme('App\\Modules\\User\\Views\\Projects\\real_estate_detail', $this->data);
    }

    /** GET/POST Projects/ProForma-Calculate: Dynamic real estate pro forma calculator */
    public function proFormaCalculate()
    {
        $input = $this->request->getPost() ?: $this->request->getGet();
        $dealService = new \App\Services\RealEstateDealService();
        $category = (string) ($input['property_category'] ?? 'residential_str');

        $result = $category === 'commercial_lease'
            ? $dealService->calculateCommercialProForma($input)
            : $dealService->calculateStrProForma($input);

        return $this->respond(['status' => 'ok', 'data' => $result]);
    }

    /** POST Projects/Invest-Crypto/(:num): Co-invest via SolanaPay or CryptoPay */
    public function investCrypto(int $projectId)
    {
        $this->ensurePost();
        $userId = $this->currentUserId();

        $project = $this->projectsModel->find($projectId);
        if (! $project) {
            return $this->failNotFound('Project not found.');
        }

        // Compliance invariant: Check if user is an accredited/eligible fund investor
        if (! $this->projectsModel->isEligibleFundInvestor($projectId, $userId)) {
            return $this->fail([
                'status'  => 'compliance_required',
                'message' => 'SEC Reg D 506(c) compliance requires an accredited investor profile verification before co-investing in private syndications.',
            ], 403);
        }

        $amount = (float) $this->request->getPost('amount');
        $minCommit = (float) ($project['min_commit'] ?? 100.0);
        if ($amount < $minCommit) {
            return $this->failValidationErrors("Minimum co-investment amount is \${$minCommit}.");
        }

        $chain = strtolower(trim((string) ($this->request->getPost('chain') ?? 'solana')));
        $payerAddress = trim((string) ($this->request->getPost('payer_address') ?? ''));
        $usdCents = (int) round($amount * 100);

        if ($chain === 'solana') {
            $solanaPay = \App\Libraries\SolanaPay\SolanaPayFactory::make();
            if (! $solanaPay) {
                return $this->fail('Solana Pay is currently unavailable.', 503);
            }
            $checkout = $solanaPay->checkout($userId, 'fund_units', (string) $projectId, $usdCents);
            if (! ($checkout['ok'] ?? false)) {
                return $this->fail($checkout['error'] ?? 'Failed to initiate Solana Pay checkout.', 400);
            }
            return $this->respond([
                'status'       => 'ok',
                'provider'     => 'solana',
                'project_id'   => $projectId,
                'checkout_url' => $checkout['url'] ?? null,
                'solana_url'   => $checkout['solana_url'] ?? null,
                'reference'    => $checkout['reference'] ?? null,
                'usd_cents'    => $usdCents,
            ]);
        }

        // Multi-chain CryptoPay (Ethereum, Base, Bitcoin)
        $cryptoPay = \App\Libraries\CryptoPay\CryptoPayFactory::make();
        if (! $cryptoPay) {
            return $this->fail('CryptoPay service is currently unavailable.', 503);
        }
        $checkout = $cryptoPay->checkout($userId, $chain, 'fund_units', (string) $projectId, $usdCents, $payerAddress ?: null);
        if (! ($checkout['ok'] ?? false)) {
            return $this->fail($checkout['error'] ?? 'Failed to initiate CryptoPay checkout.', 400);
        }

        return $this->respond([
            'status'       => 'ok',
            'provider'     => 'crypto-' . $chain,
            'chain'        => $chain,
            'project_id'   => $projectId,
            'checkout_url' => $checkout['url'] ?? null,
            'pay_address'  => $checkout['pay_address'] ?? null,
            'reference'    => $checkout['reference'] ?? null,
            'usd_cents'    => $usdCents,
        ]);
    }

    /** POST Projects/Report-RealEstate-Revenue: Audited monthly revenue and expense submission */
    public function reportRealEstateRevenue()
    {
        $this->ensurePost();
        $userId = $this->currentUserId();
        $projectId = (int) $this->request->getPost('project_id');

        $project = $this->projectsModel->find($projectId);
        if (! $project || (int) ($project['created_by'] ?? 0) !== $userId) {
            return $this->failNotFound('Project not found or you are not authorized as the sponsor.');
        }

        $revModel = new \App\Models\ProjectsRealEstateRevenueModel();
        $data = [
            'project_id'           => $projectId,
            'reporting_period'     => (string) $this->request->getPost('reporting_period'),
            'revenue_source'       => (string) ($this->request->getPost('revenue_source') ?? 'airbnb_payout'),
            'gross_revenue'        => (float) $this->request->getPost('gross_revenue'),
            'platform_fees'        => (float) ($this->request->getPost('platform_fees') ?? 0.0),
            'cleaning_fees'        => (float) ($this->request->getPost('cleaning_fees') ?? 0.0),
            'utilities'            => (float) ($this->request->getPost('utilities') ?? 0.0),
            'property_taxes'       => (float) ($this->request->getPost('property_taxes') ?? 0.0),
            'insurance'            => (float) ($this->request->getPost('insurance') ?? 0.0),
            'maintenance_reserves' => (float) ($this->request->getPost('maintenance_reserves') ?? 0.0),
            'sponsor_fee'          => (float) ($this->request->getPost('sponsor_fee') ?? 0.0),
            'proof_attachment_url' => (string) ($this->request->getPost('proof_attachment_url') ?? ''),
            'reported_by'          => $userId,
            'status'               => 'draft',
            'notes'                => (string) ($this->request->getPost('notes') ?? ''),
        ];

        $revId = $revModel->recordMonthlyRevenue($data);

        return $this->respond([
            'status'     => 'ok',
            'revenue_id' => $revId,
            'message'    => 'Revenue report recorded successfully in draft state for audit review.',
        ]);
    }

    protected function ensurePost(): void
    {
        if (strtolower($this->request->getMethod()) !== 'post') {
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
