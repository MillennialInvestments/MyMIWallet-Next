<?php
// app/Modules/User/Controllers/DashboardController.php
namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, APIs, SiteSettings, SocialMedia}; 
use App\Controllers\UserController;
use App\Models\UserModel;
// use APIModule\Libraries\{BudgetLibrary, UserLibrary, WalletLibrary};
// use APIModule\Models\{BudgetModel, WalletModel};
use CodeIgniter\API\ResponseTrait; // Import the ResponseTrait

#[\AllowDynamicProperties]
class DoorDashController extends UserController
{
    protected $APIs;
    protected $auth;
    protected $helpers = (['auth']);
    protected $siteSettings;

    public function __construct()
    {
        // Assuming siteSettings is loaded from a config or similar in CI4
        $this->auth         = service('authentication'); // Use the 'authentication' service
        $this->siteSettings = config('SiteSettings');
        $this->APIs         = config('APISettings'); 
    }

    public function index()
    {
        // Ensure the user is logged in    
        log_message('info', 'Checking Auth->check()');    
        if (!$this->auth->check()) {
            log_message('info', 'Sending User back to Login, not logged in or Auth->check() is empty');   
            return redirect()->to('/login');
        }
        log_message('info', 'Checking Auth->check()');   

        // Assuming you have a UserModel and it's set up properly
        $userModel = new UserModel();
        $user = $userModel->find(user_id());
        
        // Override default data or add new data
        $this->data['pageTitle'] = 'The GigHop';
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['bootstrapTheme'] = $this->siteSettings->bootstrapTheme;
        $this->data['companyName'] = $this->siteSettings->company_name;
        $this->data['companyPhone'] = $this->siteSettings->company_phone;
        $this->data['companyLogo'] = $this->siteSettings->company_logo;
        $this->data['companyMetaTitle'] = $this->siteSettings->company_meta_title;
        $this->data['companySupportEmail'] = $this->siteSettings->company_support_email;
        $this->data['websiteVersion'] = $this->siteSettings->website_version;
        $this->data['user'] = $user;
        $this->data['userAgent'] = service('request')->getUserAgent(); 
        // $this->data['message'] = 'This message is passed from Home controller to the view.';
        // app/Modules/User/Views/Dashboard/index.php
        log_message('info', 'Displaying View');   
        // return $this->renderTheme('App\Modules\User\Views\Dashboard\index', $data);
        $this->renderTheme('App\Modules\User\Views\Budget\index', $this->data);
    }

    public function connectDoorDash()
    {
        // This URL should be the endpoint on DoorDash's side that initiates the OAuth flow
        $clientId = $this->APIs->DoorDashClientID;
        // $clientId = '2165df55-2b60-49cd-92de-90d7e05fe364';
        $redirectUri = urlencode(site_url('Account/Connect/DoorDash/Callback'));
        $scope = urlencode('deliveries:read deliveries:write orders:read orders:write');
        $scope = urlencode('orders:read orders:write');
        $authUrl = "https://www.doordash.com/oauth/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&response_type=code&scope={$scope}";

        // Redirect the user to DoorDash's authorization page
        return redirect()->to($authUrl);
    }

    public function doordashCallback()
    {
        $clientId                   = $this->APIs->DoorDashKeyID;
        // $clientId = '2165df55-2b60-49cd-92de-90d7e05fe364';
        $clientSecret               = $this->APIs->DoorDashSecret;
        // $clientSecret               = '5ZlwNKzwYP6BqcX9JFNcyrJhuDgaLmaI9rWPzpCKAJg';
        $code                       = $this->request->getVar('code'); // The code from DoorDash
        $redirectUri                = site_url('Account/Connect/DoorDash/Callback');

        $tokenUrl                   = 'https://doordash.com/oauth/token';
        $data                       = [
            'client_id'             => $clientId,
            'client_secret'         => $clientSecret,
            'code'                  => $code,
            'grant_type'            => 'authorization_code',
            'redirect_uri'          => $redirectUri,
        ];

        $response                   = service('curlrequest')->post($tokenUrl, [
            'form_params'           => $data
        ]);

        if ($response->getStatusCode() == 200) {
            $responseData           = json_decode($response->getBody(), true);
            $accessToken            = $responseData['access_token']; // Use this token to access DoorDash data
            
            // Store the access token in the session or database as needed
            // Redirect the user back to a dashboard or settings page
            return redirect()->to('/Account/Connected-Accounts');
        } else {
            // Handle error, show message to the user
            session()->setFlashdata('error', 'Failed to connect DoorDash account.');
            return redirect()->back();
        }
    }

    public function add()
    {
        $this->renderTheme('Automated', 'User_Budget');
    }

    public function copy()
    {
        $this->renderTheme('Automated', 'User_Budget');
    }

    public function accountManager()
    {
        // Assume set_current_user() method functionality is handled within each method or via a filter in CI4
        return $this->renderTheme('User/Budget/Account_Manager');
    }

    public function accountOverview()
    {
        $this->renderTheme('Automated', 'User_Budget');
    }

    public function approveRecurringSchedule($accountId)
    {
        $budgetModel = new \App\Models\BudgetModel();

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
    
    public function cancelAccount($accountId)
    {
        $budgetModel = new \App\Models\BudgetModel();
        $accountInfo = $budgetModel->getAccountInformation($accountId);

        foreach ($accountInfo as $account) {
            if ($account['recurring_account_primary'] === 'Yes') {
                if ($budgetModel->cancelAccount($accountId)) {
                    session()->setFlashdata('message', 'Recurring Account deleted.');
                    return redirect()->to('/budget');
                } else {
                    session()->setFlashdata('message', 'Recurring Account could not be deleted');
                    return redirect()->to("/budget/edit/{$accountId}");
                }
            } else {
                if ($budgetModel->cancelSubaccount($accountId)) {
                    session()->setFlashdata('message', 'Subaccount deleted.');
                    return redirect()->to("/budget/edit/{$accountId}");
                } else {
                    session()->setFlashdata('message', 'Subaccount could not be deleted');
                    return redirect()->to("/budget/recurring-account/schedule/{$accountId}");
                }
            }
        }
    }

    public function deleteAccount($accountId)
    {
        $referer = service('request')->getServer('HTTP_REFERER') ?: '/budget';
        $budgetModel = new \App\Models\BudgetModel();

        if ($budgetModel->cancelAccount($accountId)) {
            session()->setFlashdata('message', 'Recurring Account deleted.');
            return redirect()->to($referer);
        } else {
            session()->setFlashdata('message', 'Account could not be deleted');
            return redirect()->to($referer);
        }
    }

    public function bulkUpdateStatus()
    {
        $ids = $this->request->getPost('ids');
        $status = $this->request->getPost('status');
        $budgetModel = new \App\Models\BudgetModel();

        if ($budgetModel->bulkUpdateStatus($ids, $status)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records updated successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update records.']);
        }
    }

    public function createLinkToken()
    {
        $plaidModel = new \App\Models\PlaidModel();
        $client_id = config('Plaid')->client_id; // Assuming Plaid settings are stored in a separate config file
        $secret = config('Plaid')->secret;

        $linkTokenData = $plaidModel->getLinkToken($client_id, $secret);
        return $this->response->setJSON($linkTokenData);
    }

    public function exchangeToken()
    {
        $publicToken = $this->request->getPost('public_token');
        $plaidModel = new \App\Models\PlaidModel();

        $exchangeData = $plaidModel->exchangePublicToken($publicToken);
        return $this->response->setJSON($exchangeData);
    }

    public function bulkDelete()
    {
        $ids = $this->request->getPost('ids');
        $budgetModel = new \App\Models\BudgetModel();

        if ($budgetModel->bulkDelete($ids)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Records deleted successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete records.']);
        }
    }

    // Implement other methods as in CI3, adapting to CI4's syntax and best practices
    // Implement other private and public methods, converting CI3 syntax and functionality to CI4
}
