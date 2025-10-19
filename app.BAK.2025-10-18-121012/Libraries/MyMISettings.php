<?php
namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Models\{AnalyticalModel, BudgetModel};
use CodeIgniter\Config\Services;

#[\AllowDynamicProperties]
class MyMISettings
{

    private AnalyticalModel $analyticalModel;
    private BudgetModel $budgetModel;
    private $request;
    private $session;
    private $userID;
    private $siteSettings;

    public function __construct()
    {
        $this->budgetModel     = new BudgetModel();
        $this->request         = Services::request();
        $this->session         = Services::session();
        $this->siteSettings    = config('SiteSettings');
        $this->userID          = session()->get('userID');
    }

    public function userSettings()
    {
        $pageURIA = $this->request->getSegment(1);
        $pageURIB = $this->request->getSegment(2);
        $pageURIC = $this->request->getSegment(3);
        $pageURID = $this->request->getSegment(4);
        $pageURIE = $this->request->getSegment(5);

        $userBudgetSettings = $this->getUserBudgetSettings($this->userID);

        $userSettings = [
            'userBudgetSettings' => $userBudgetSettings,
        ];

        // session()->set('userSettings', $userSettings);
        return $userSettings;
    }

    public function getUserBudgetSettings($cuID)
    {
        $rows = $this->budgetModel->getUserBudgetSettings($cuID);
        $settings = [];
        foreach ($rows as $row) {
            foreach ($row['setting'] as $type) {
                $settings[$type] = $row['option'];
            }
        }
        return $settings;
    }

    public function getUserActivity($cuID)
    {
        return $this->analyticalModel->getUsersActivity($cuID);
    }

    /** Feature flag helpers */
    public function isSolanaEnabled(): bool
    {
        return (bool) ($this->siteSettings->solanaExchange ?? false);
    }

    public function isEthereumEnabled(): bool
    {
        return (bool) ($this->siteSettings->ethereumExchange ?? false);
    }

    public function isDexScanningEnabled(): bool
    {
        return (bool) ($this->siteSettings->dexScanning ?? false);
    }

    public function isCexTradingEnabled(): bool
    {
        return (bool) ($this->siteSettings->exchangeOperations ?? false);
    }
}
