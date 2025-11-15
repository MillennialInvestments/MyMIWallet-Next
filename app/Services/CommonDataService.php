<?php 
namespace App\Services;

use App\Libraries\{BaseLoader, MyMIBudget, MyMIDashboard, MyMIUser, MyMISolana};
use App\Models\{AccountsModel, DashboardModel};

class CommonDataService
{

    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIUser;
    protected $MyMISolana;
    protected $accountsModel;

    public function __construct()
    {
        $this->MyMIBudget    = new MyMIBudget();
        $this->MyMIDashboard = new MyMIDashboard();
        $this->MyMIUser      = new MyMIUser();
        $this->MyMISolana    = new MyMISolana();
        $this->accountsModel = new AccountsModel();
    }

    public function getCommonData($cuID, $siteSettings, $request)
    {
        $data = [];
        $data['siteSettings'] = $siteSettings;
        $data['beta'] = (string) $siteSettings->beta;
        $data['debug'] = (string) $siteSettings->debug;
        $data['request'] = $request;
        $data['uri'] = $request->getUri();
        $data['userAgent'] = $request->getUserAgent();
        $data['date'] = $siteSettings->date;
        $data['time'] = $siteSettings->time;
        $data['hostTime'] = $siteSettings->hostTime;
        $data['cuID'] = $cuID;

        $userId = (int) ($cuID ?? 0);

        if ($userId <= 0) {
            log_message('debug', 'CommonDataService::getCommonData guest request; returning base site data.');
            $data['totalAccountBalance']    = 0;
            $data['totalAccountBalanceFMT'] = '0.00';
            $data['cuWalletID']             = null;
            $data['cuRole']                 = 4;
            $data['cuUserType']             = '';
            $data['cuEmail']                = '';
            $data['cuDisplayName']          = 'Guest';
            $data['cuUsername']             = '';
            $data['cuNameInitials']         = '';
            $data['cuKYC']                  = '';
            $data['cuWalletCount']          = 0;
            $data['MyMIGCoinSum']           = 0;
            $data['walletID']               = null;
            $data['promotionalBanners']     = [];
            $data['solanaNetworkStatus']    = [];
            $data['getFeatures']            = [];
            $data['completedGoals']         = 0;
            $data['pendingGoals']           = 0;

            return $data;
        }

        // Fetch user budget info
        try {
            $userBudget = $this->getMyMIBudget()->allUserBudgetInfo($userId);
        } catch (\Throwable $e) {
            log_message('error', 'CommonDataService::getCommonData allUserBudgetInfo error: {msg}', ['msg' => $e->getMessage()]);
            $userBudget = [];
        }

        $data['totalAccountBalance']    = $userBudget['totalAccountBalance']    ?? 0;
        $data['totalAccountBalanceFMT'] = $userBudget['totalAccountBalanceFMT'] ?? '0.00';

        // Fetch user account details
        try {
            $userAccountInfo = $this->MyMIUser->getUserInformation($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'CommonDataService::getCommonData getUserInformation error: {msg}', ['msg' => $e->getMessage()]);
            $userAccountInfo = [];
        }

        $data['cuWalletID'] = $userAccountInfo['cuWalletID'] ?? null;
        $data['cuRole'] = $userAccountInfo['cuRole'] ?? 4;
        $data['cuUserType'] = $userAccountInfo['cuUserType'] ?? '';
        $data['cuEmail'] = $userAccountInfo['cuEmail'] ?? '';
        $data['cuDisplayName'] = $userAccountInfo['cuDisplayName'] ?? '';
        $data['cuUsername'] = $userAccountInfo['cuUsername'] ?? '';
        $data['cuNameInitials'] = $userAccountInfo['cuNameInitials'] ?? '';
        $data['cuKYC'] = $userAccountInfo['cuKYC'] ?? '';
        $data['cuWalletCount'] = $userAccountInfo['cuWalletCount'] ?? 0;
        $data['MyMIGCoinSum'] = $userAccountInfo['MyMIGCoinSum'] ?? 0;
        $data['walletID'] = $userAccountInfo['walletID'] ?? null;

        // Fetch promotional banners
        try {
            $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'CommonDataService::getCommonData dashboardInfo error: {msg}', ['msg' => $e->getMessage()]);
            $dashboardInfo = [];
        }

        $data['promotionalBanners'] = $dashboardInfo['promotionalBanners'] ?? [];

        // Fetch Solana Network Status
        try {
            $data['solanaNetworkStatus'] = $this->MyMISolana->getNetworkStatus() ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'CommonDataService::getCommonData getNetworkStatus error: {msg}', ['msg' => $e->getMessage()]);
            $data['solanaNetworkStatus'] = [];
        }

        // Fetch Features and Completed Goals
        try {
            $features = $this->getMyMIDashboard()->getFeatures();
        } catch (\Throwable $e) {
            log_message('error', 'CommonDataService::getCommonData getFeatures error: {msg}', ['msg' => $e->getMessage()]);
            $features = [];
        }

        $data['getFeatures']    = $features;
        $progressData           = $dashboardInfo['progressGoalData'] ?? [];
        $data['completedGoals'] = $progressData['completions'] ?? 0;
        $data['pendingGoals']   = $progressData['goals'] ?? 0;

        return $data;
    }
}
