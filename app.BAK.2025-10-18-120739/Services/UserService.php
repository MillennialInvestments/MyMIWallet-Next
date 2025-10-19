<?php

namespace App\Services;

use App\Libraries\{MyMIBudget, MyMIDashboard, MyMIUser, MyMISolana, MyMIWallet, MyMIWallets};
use App\Models\{AccountsModel, UserModel};
use App\Services\{UserService};
use CodeIgniter\HTTP\RequestInterface;

class UserService
{

    protected $siteSettings;
    protected $cuID;
    protected $data;
    protected $request;
    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIUser;
    protected $MyMISolana;
    protected $MyMIWallet;
    protected $MyMIWallets;
    protected $userModel;
    protected $UserService;

    public function __construct($siteSettings, $cuID, RequestInterface $request)
    {
        $this->siteSettings = $siteSettings;
        $this->cuID = $cuID;
        $this->request = $request;

        // Initialize the libraries
        $this->MyMIBudget = new MyMIBudget();
        $this->MyMIDashboard = new MyMIDashboard();
        $this->MyMIUser = new MyMIUser();
        $this->MyMISolana = new MyMISolana();
        $this->MyMIWallet = new MyMIWallet();
        $this->MyMIWallet = new MyMIWallet();
        $this->MyMIWallets = new MyMIWallets();
        // $this->userModel = new UserModel();
    }

    public function commonData(): array
    {
        // $this->data = parent::commonData();

        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string) $this->siteSettings->beta;
        $this->data['debug'] = (string) $this->siteSettings->debug;
        $this->data['request'] = $this->request;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['hostTime'] = $this->siteSettings->hostTime;
        $this->data['cuID'] = $this->cuID;
        $allBudgetInfo = $this->MyMIBudget->allUserBudgetInfo($this->cuID);
        $this->data['totalAccountBalance'] = $allBudgetInfo['totalAccountBalance'] ?? 0;
        $this->data['totalAccountBalanceFMT'] = $allBudgetInfo['totalAccountBalanceFMT'] ?? '0.00';
        $this->data['getFeatures'] = $this->MyMIDashboard->getFeatures();

        $dashboardInfo = $this->MyMIDashboard->dashboardInfo($this->cuID);
        $this->data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        $this->data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];
        
        $userInfo = service('MyMIUser')->getUserInformation($this->cuID);
        $this->data['cuWalletID'] = $userInfo['cuWalletID'];
        $this->data['cuRole'] = $userInfo['cuRole'] ?? 4;
        $this->data['cuUserType'] = $userInfo['cuUserType'] ?? '';
        $this->data['cuEmail'] = $userInfo['cuEmail'] ?? '';
        $this->data['cuDisplayName'] = $userInfo['cuDisplayName'] ?? '';
        $this->data['cuUsername'] = $userInfo['cuUsername'] ?? '';
        $this->data['cuNameInitials'] = $userInfo['cuNameInitials'] ?? '';
        $this->data['cuKYC'] = $userInfo['cuKYC'] ?? '';
        $this->data['cuAddress'] = $userInfo['cuAddress'] ?? '';
        $this->data['cuCity'] = $userInfo['cuCity'] ?? '';
        $this->data['cuState'] = $userInfo['cuState'] ?? '';
        $this->data['cuCountry'] = $userInfo['cuCountry'] ?? '';
        $this->data['cuZipCode'] = $userInfo['cuZipCode'] ?? '';
        $this->data['coinsExchanged'] = $userInfo['coinsExchanged'] ?? 0;
        $this->data['cuWalletCount'] = $userInfo['cuWalletCount'] ?? 0;
        $this->data['cuWallets'] = $this->MyMIWallet->getWalletsByUser($this->cuID) ?? [];
        $this->data['cuNonCreditWallets'] = $this->MyMIUser->getUserNonCreditWallets($this->cuID) ?? [];
        $this->data['cuCryptoWallets'] = $this->MyMIWallet->getUserCryptoWallets($this->cuID) ?? [];
        $this->data['cuInvestWallets'] = $this->MyMIWallet->getUserInvestWallets($this->cuID) ?? [];
        $this->data['MyMIGCoinSum'] = $userInfo['MyMIGCoinSum'] ?? 0;
        $this->data['walletID'] = $userInfo['walletID'];
        $this->data['solanaNetworkStatus'] = $this->MyMISolana->getNetworkStatus() ?? [];

        return $this->data;
    }

    public function userAccountData()
    {
        $data = [];

        $userInfo = service('MyMIUser')->getUserInformation($this->cuID);
        $data['cuEmail'] = $userInfo['cuEmail'] ?? '';
        $data['cuUsername'] = $userInfo['cuUsername'] ?? '';
        $data['cuFirstName'] = $userInfo['cuFirstName'] ?? '';
        $data['cuMiddleName'] = $userInfo['cuMiddleName'] ?? '';
        $data['cuLastName'] = $userInfo['cuLastName'] ?? '';
        $data['cuNameSuffix'] = $userInfo['cuNameSuffix'] ?? '';
        $data['cuPhone'] = $userInfo['cuPhone'] ?? '';
        $data['cuDOB'] = $userInfo['cuDOB'] ?? '';
        $data['cuMailingAddress'] = $userInfo['cuMailingAddress'] ?? '';

        if ($this->siteSettings->solanaExchange === 1) {
            $exchange = 'Solana';
            $data['cuSolanaDW'] = $this->getMyMIDashboard()->getCryptoAccount($this->cuID, $exchange)['accountInfo'] ?? [];
        }

        return $data;
    }

    public function getUserLoginActivity($cuID) {
        $getUserLoginActivity = $this->userModel->getUserLoginActivity($cuID); 
        return $getUserLoginActivity;
    }
}
?>