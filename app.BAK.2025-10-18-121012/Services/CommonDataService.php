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
        $this->MyMIBudget = new MyMIBudget();
        $this->MyMIDashboard = new MyMIDashboard();
        $this->MyMIUser = service('MyMIUser');
        $this->MyMISolana = new MyMISolana();
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

        // Fetch user budget info
        $userBudget = $this->getMyMIBudget()->allUserBudgetInfo($cuID);
        $data['totalAccountBalance'] = $userBudget['totalAccountBalance'];
        $data['totalAccountBalanceFMT'] = $userBudget['totalAccountBalanceFMT'];

        // Fetch user account details
        $userAccountInfo = service('MyMIUser')->getUserInformation($cuID);
        $data['cuWalletID'] = $userAccountInfo['cuWalletID'];
        $data['cuRole'] = $userAccountInfo['cuRole'] ?? 4;
        $data['cuUserType'] = $userAccountInfo['cuUserType'] ?? '';
        $data['cuEmail'] = $userAccountInfo['cuEmail'] ?? '';
        $data['cuDisplayName'] = $userAccountInfo['cuDisplayName'] ?? '';
        $data['cuUsername'] = $userAccountInfo['cuUsername'] ?? '';
        $data['cuNameInitials'] = $userAccountInfo['cuNameInitials'] ?? '';
        $data['cuKYC'] = $userAccountInfo['cuKYC'] ?? '';
        $data['cuWalletCount'] = $userAccountInfo['cuWalletCount'];
        $data['MyMIGCoinSum'] = $userAccountInfo['MyMIGCoinSum'];
        $data['walletID'] = $userAccountInfo['walletID'];

        // Fetch promotional banners
        $data['promotionalBanners'] = $this->getMyMIDashboard()->dashboardInfo($cuID)['promotionalBanners'];

        // Fetch Solana Network Status
        $data['solanaNetworkStatus'] = $this->MyMISolana->getNetworkStatus() ?? [];

        // Fetch Features and Completed Goals
        $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($cuID);
        $data['getFeatures'] = $this->getMyMIDashboard()->getFeatures();
        $data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        $data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];

        return $data;
    }
}
