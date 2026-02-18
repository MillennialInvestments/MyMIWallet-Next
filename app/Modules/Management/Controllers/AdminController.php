<?php

namespace App\Modules\Management\Controllers;

use App\Controllers\UserController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class AdminController extends UserController
{

    protected ?int $cuID = null;

    protected $budgetModel;
    protected $accountsModel;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $auth = service('authentication');
        $user = $auth ? $auth->user() : null;

        $this->cuID = $user ? $user->getUserID() : null;

        if (!$this->cuID) {
            log_message('warning', 'AdminController init aborted: no authenticated user id available.');
            return;
        }

        // Lightweight model instantiation only
        $this->budgetModel   = model(\App\Models\BudgetModel::class);
        $this->accountsModel = model(\App\Models\AccountsModel::class);

        log_message('debug', 'AdminController initialized. Memory: ' . memory_get_usage(true));
    }

    /**
     * Shared dashboard data
     */
    public function commonData(): array
    {
        $base = parent::commonData();

        if (!$this->cuID) {
            return $base;
        }

        // Load only once and reuse
        if (empty($this->userBudget)) {
            $this->userBudget = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID);
        }

        if (empty($this->userAccount)) {
            $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        }

        if (empty($this->userDashboard)) {
            $this->userDashboard = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        }

        if (empty($this->userWallets)) {
            $this->userWallets = $this->getMyMIWallets()->getUserWallets($this->cuID);
        }

        return array_merge($base, [
            'cuID'                    => $this->cuID,
            'checkingSummaryFMT'      => $this->userBudget['checkingSummaryFMT'] ?? null,
            'totalAccountBalance'     => $this->userBudget['totalAccountBalance'] ?? null,
            'totalAccountBalanceFMT'  => $this->userBudget['totalAccountBalanceFMT'] ?? null,
            'cuSolanaDW'              => $this->userDashboard['cryptoAccounts']['Solana']['accountInfo'] ?? null,
        ]);
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Admin Management | MyMI Wallet | The Future of Finance'
        ];

        return $this->renderTheme('ManagementModule\Views\index', $data);
    }

    public function add($type = null)
    {
        return $this->renderTheme(
            'App\Modules\User\Views\Budget\Add',
            ['pageTitle' => 'Add Budget Record | MyMI Wallet | The Future of Finance']
        );
    }

    public function accountOverview()
    {
        $budgetType = $this->request->getUri()->getSegment(2);
        $accountType = ($budgetType === 'Expenses') ? 'Expense' : $budgetType;

        return $this->renderTheme(
            'App\Modules\User\Views\Budget\Account_Overview',
            [
                'pageTitle'        => 'Account Overview | MyMI Wallet | The Future of Finance',
                'accountType'      => $accountType,
                'budgetType'       => $budgetType,
                'getSourceRecords' => $this->budgetModel->getSourceRecords($this->cuID, $budgetType),
            ]
        );
    }

    public function details($accountID)
    {
        $record = $this->getMyMIBudget()->getUserBudgetRecord($this->cuID, $accountID);

        return $this->renderTheme(
            'App\Modules\User\Views\Budget\Details',
            [
                'pageTitle'                 => 'Account Details & History | MyMI Wallet | The Future of Finance',
                'userBudgetRecord'          => $record,
                'userRelatedBudgetAccounts' =>
                    $this->getMyMIBudget()->getUserRelatedBudgetRecords(
                        $this->cuID,
                        $record['accountName'] ?? null
                    )
            ]
        );
    }

    public function history()
    {
        return $this->renderTheme(
            'App\Modules\User\Views\Budget\History',
            [
                'pageTitle'            => 'Account Details & History | MyMI Wallet | The Future of Finance',
                'getUserBankAccounts'  => $this->accountsModel->getUserBankAccounts($this->cuID),
                'getUserCreditAccounts'=> $this->accountsModel->getUserCreditAccounts($this->cuID),
            ]
        );
    }

    public function bulkUpdateStatus()
    {
        $ids = $this->request->getPost('ids');
        $status = $this->request->getPost('status');

        if ($this->budgetModel->bulkUpdateStatus($ids, $status)) {
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error']);
    }

    public function bulkDelete()
    {
        $ids = $this->request->getPost('ids');

        if ($this->budgetModel->bulkDelete($ids)) {
            return $this->response->setJSON(['status' => 'success']);
        }

        return $this->response->setJSON(['status' => 'error']);
    }
}
