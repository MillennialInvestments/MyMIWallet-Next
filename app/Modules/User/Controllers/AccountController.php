<?php
// app/Modules/User/Controllers/AccountController.php
namespace App\Modules\User\Controllers;

use App\Config\{APIs, SiteSettings};
use App\Controllers\UserController;
use App\Services\{AccountService, UserService};
use App\Models\BudgetModel;
use App\Controllers\BaseController;
use Config\Services;
use Myth\Auth\Password;

#[\AllowDynamicProperties]
class AccountController extends UserController
{
    // Controller Settings
    protected $API;
    protected $auth;
    protected $session;
    protected $siteSettings;
    protected $accountsModel;
    protected $accountService;
    protected $userService;
    protected $plaid; 
    protected $plaidModel;
    protected $helpers = ['auth', 'form', 'url'];

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->request = service('request'); 
        $this->API = config('APIs');
        $this->siteSettings = config('SiteSettings');
        $this->session = Services::session();
        
        $this->accountsModel = new \App\Models\AccountsModel(); 
        $this->accountService = new AccountService(); 
        $this->plaid = new \stdClass(); // or specific Plaid class if available
        $this->plaidModel = new \App\Models\PlaidModel();
        $this->plaid->clientID = $this->API->plaidClientID;
        $this->plaid->environment = $this->API->plaidEnvironment;
        if ($this->plaid->environment === 'sandbox') {
            $this->plaid->secret = $this->API->plaidSecret;
        } elseif ($this->plaid->environment === 'production') {
            $this->plaid->secret = $this->API->plaidSandboxSecret;
        }
    }

    public function commonData(): array {
        $this->data = parent::commonData();
        // Fetch data from UserService
        $userData = $this->getuserService()->commonData();
        log_message('debug', 'AccountController L50 - $userData: ' . (print_r($userData, true)));
        // Merge the user data with BudgetController data
        $this->data = array_merge($this->data, $userData);
    
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug'] = $this->siteSettings->debug;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['cuID'] = $this->cuID;
        return $this->data;
}

    // Plaid Integration: Create Link Token
    public function createLinkToken()
    {
        $client_id = $this->plaid->clientID;
        $secret = $this->plaid->secret;
        $linkTokenData = $this->plaidModel->getLinkToken($client_id, $secret);
        return $this->response->setJSON($linkTokenData);
    }

    // Plaid Integration: Exchange Public Token
    public function exchangeToken()
    {
        $publicToken = $this->request->getPost('public_token');
        $exchangeData = $this->plaidModel->exchangePublicToken($publicToken);
        return $this->response->setJSON($exchangeData);
    }

    // Main Account Management Page
    public function index() {
        $this->data['pageTitle'] = 'My Account | MyMI Wallet | The Future of Finance';
        $this->commonData();
        $this->data['accountSummary'] = $this->accountService->getUserPortfolioSummary($this->cuID);
        return $this->renderTheme('App\Modules\User\Views\Account\index', $this->data);
    }

    // Add New Account
    public function add()
    {
        $this->commonData();
        return $this->renderTheme('Automated', 'User_Budget');
    }

    // Copy Account Data
    public function copy()
    {
        $this->commonData();
        return $this->renderTheme('Automated', 'User_Budget');
    }

    // Account Manager
    public function accountManager()
    {
        return $this->renderTheme('User/Budget/Account_Manager');
    }

    // Account Overview
    public function accountOverview()
    {
        $this->commonData();
        return $this->renderTheme('Automated', 'User_Budget');
    }

    // Approve Recurring Schedule
    public function approveRecurringSchedule($accountId)
    {
        $budgetModel = new BudgetModel();
        if ($budgetModel->approveRecurringAccount($accountId)) {
            if ($budgetModel->approveRecurringSchedule($accountId)) {
                session()->setFlashdata('message', 'Recurring Schedule approved.');
                return redirect()->to('/budget');
            } else {
                session()->setFlashdata('message', 'Recurring Schedule could not be approved.');
                return redirect()->to("/budget/recurring-account/schedule/{$accountId}");
            }
        } else {
            session()->setFlashdata('message', 'Recurring Schedule could not be approved.');
            return redirect()->to("/budget/edit/{$accountId}");
        }
    }
    
    // Cancel Recurring or Sub-account
    public function cancelAccount($accountId)
    {
        $budgetModel = new BudgetModel();
        $accountInfo = $budgetModel->getAccountInformation($accountId);

        foreach ($accountInfo as $account) {
            if ($account['recurring_account_primary'] === 'Yes') {
                if ($budgetModel->cancelAccount($accountId)) {
                    session()->setFlashdata('message', 'Recurring Account deleted.');
                    return redirect()->to('/budget');
                } else {
                    session()->setFlashdata('message', 'Recurring Account could not be deleted.');
                    return redirect()->to("/budget/edit/{$accountId}");
                }
            } else {
                if ($budgetModel->cancelSubaccount($accountId)) {
                    session()->setFlashdata('message', 'Subaccount deleted.');
                    return redirect()->to("/budget/edit/{$accountId}");
                } else {
                    session()->setFlashdata('message', 'Subaccount could not be deleted.');
                    return redirect()->to("/budget/recurring-account/schedule/{$accountId}");
                }
            }
        }
    }

    // Delete Account
    public function deleteAccount($accountId)
    {
        $referer  = service('request')->getServer('HTTP_REFERER');
        $fallback = '/budget';
        $budgetModel = new BudgetModel();
        if ($budgetModel->cancelAccount($accountId)) {
            session()->setFlashdata('message', 'Recurring Account deleted.');
            return redirect_to_safe(
                is_string($referer) && $referer !== '' ? $referer : null,
                $fallback
            );
        } else {
            session()->setFlashdata('message', 'Account could not be deleted.');
            return redirect_to_safe(
                is_string($referer) && $referer !== '' ? $referer : null,
                $fallback
            );
        }
    }

    // Bulk Update Status
    public function bulkUpdateStatus()
    {
        $ids = $this->request->getPost('ids');
        $status = $this->request->getPost('status');
        $budgetModel = new BudgetModel();
        if ($budgetModel->bulkUpdateStatus($ids, $status)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records updated successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update records.']);
        }
    }

    // Bulk Delete Accounts
    public function bulkDelete()
    {
        $ids = $this->request->getPost('ids');
        $budgetModel = new BudgetModel();
        if ($budgetModel->bulkDelete($ids)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete records.']);
        }
    }
    // PATCH: session list view
    public function sessions()
    {
        $model = new \App\Models\UserSessionModel();
        $sessions = $model->where('user_id', (int) session('cuID'))
            ->orderBy('last_seen', 'DESC')->findAll(50);
        return view('themes/dashboard/layouts/index', [
            'pageTitle' => 'Active Sessions',
            'content' => view('App\\Modules\\User\\Views\\Account\\sessions', compact('sessions')),
        ]);
    }

    public function revokeSession(string $sessionId)
    {
        $this->validate(['csrf_test_name' => 'required']);
        $model = new \App\Models\UserSessionModel();
        $ok = $model->revoke((int) session('cuID'), $sessionId);
        if ($ok) {
            audit('session.revoke', ['session'=>$sessionId], 'session');
        }
        return $this->response->setJSON([
            'status' => $ok ? 'success' : 'error',
            'message' => $ok ? 'Session revoked.' : 'Unable to revoke.',
            'csrf' => csrf_hash(),
        ]);
    }

    // PATCH: TOTP 2FA endpoints
    public function twoFactor()
    {
        $m = new \App\Models\UserTwoFactorModel();
        $row = $m->byUser((int) session('cuID'));
        $proposedSecret = \App\Libraries\Security\TotpService::generateSecret();
        $otpauth = \App\Libraries\Security\TotpService::otpauthUrl('MyMI Wallet', (string) session('cuID'), $proposedSecret);
        return view('themes/dashboard/layouts/index', [
            'pageTitle' => 'Two-Factor Authentication',
            'content' => view('App\\Modules\\User\\Views\\Account\\twofactor', [
                'row' => $row,
                'proposedSecret' => $proposedSecret,
                'otpauth' => $otpauth,
            ]),
        ]);
    }

    public function enable2fa()
    {
        $secret = (string) $this->request->getPost('secret');
        $code   = (string) $this->request->getPost('code');
        if (! $secret || ! preg_match('~^\d{6}$~', $code)) {
            return $this->failJson('Invalid input.');
        }
        if (! \App\Libraries\Security\TotpService::verify($secret, $code)) {
            return $this->failJson('Invalid TOTP code.');
        }
        $enc = \App\Libraries\Security\Crypto::encrypt($secret);
        $backup = $this->generateBackupCodes();
        $hashes = array_map(static fn($c) => crypto_hash_password($c), $backup);
        $m = new \App\Models\UserTwoFactorModel();
        $exists = $m->byUser((int) session('cuID'));
        $payload = [
            'user_id' => (int) session('cuID'),
            'is_enabled' => 1,
            'secret_ciphertext' => $enc['ciphertext'],
            'secret_iv' => $enc['iv'],
            'secret_tag' => $enc['tag'],
            'backup_codes_hashes' => json_encode($hashes),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if ($exists) {
            $m->update($exists['id'], $payload);
        } else {
            $m->insert($payload);
        }
        audit('2fa.enable', [], 'user');
        return $this->response->setJSON([
            'status' => 'success',
            'data' => ['backup_codes' => $backup],
            'csrf' => csrf_hash(),
        ]);
    }

    public function verify2fa()
    {
        $code = (string) $this->request->getPost('code');
        if (! preg_match('~^\d{6}$~', $code)) {
            return $this->failJson('Invalid code.');
        }
        $m = new \App\Models\UserTwoFactorModel();
        $row = $m->byUser((int) session('cuID'));
        if (! $row || (int) $row['is_enabled'] !== 1) {
            return $this->failJson('2FA not enabled.');
        }
        $secret = \App\Libraries\Security\Crypto::decrypt($row['secret_ciphertext'], $row['secret_iv'], $row['secret_tag']);
        if (! \App\Libraries\Security\TotpService::verify($secret, $code)) {
            return $this->failJson('Invalid TOTP code.');
        }
        session()->set('2fa_verified_at', time());
        return $this->okJson('2FA verified.');
    }

    public function disable2fa()
    {
        $m = new \App\Models\UserTwoFactorModel();
        $row = $m->byUser((int) session('cuID'));
        if ($row) {
            $m->update($row['id'], [
                'is_enabled' => 0,
                'secret_ciphertext' => null,
                'secret_iv' => null,
                'secret_tag' => null,
                'backup_codes_hashes' => null,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            audit('2fa.disable', [], 'user');
        }
        return $this->okJson('2FA disabled.');
    }

    public function regenerateBackupCodes()
    {
        $m = new \App\Models\UserTwoFactorModel();
        $row = $m->byUser((int) session('cuID'));
        if (! $row || (int) $row['is_enabled'] !== 1) {
            return $this->failJson('2FA not enabled.');
        }
        $codes = $this->generateBackupCodes();
        $hashes = array_map(static fn($c) => crypto_hash_password($c), $codes);
        $m->update($row['id'], [
            'backup_codes_hashes' => json_encode($hashes),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        audit('2fa.backup.regenerate', [], 'user');
        return $this->response->setJSON([
            'status' => 'success',
            'data' => ['backup_codes' => $codes],
            'csrf' => csrf_hash(),
        ]);
    }

    private function okJson(string $message)
    {
        return $this->response->setJSON(['status' => 'success', 'message' => $message, 'csrf' => csrf_hash()]);
    }

    private function failJson(string $message)
    {
        return $this->response->setJSON(['status' => 'error', 'message' => $message, 'csrf' => csrf_hash()]);
    }

    private function generateBackupCodes(): array
    {
        $out = [];
        for ($i = 0; $i < 10; $i++) {
            $out[] = strtoupper(bin2hex(random_bytes(4)));
        }
        return $out;
    }
}
