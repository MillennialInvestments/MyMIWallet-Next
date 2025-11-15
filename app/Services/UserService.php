<?php

namespace App\Services;

use App\Libraries\{MyMIBudget, MyMIDashboard, MyMIUser, MyMISolana, MyMIWallet, MyMIWallets};
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;

class UserService
{
    protected $MyMIBudget;
    protected $MyMIDashboard;
    protected $MyMIUser;
    protected $MyMISolana;
    protected $MyMIWallet;
    protected $MyMIWallets;
    protected $cuID;
    protected $data = [];
    protected $request;
    protected $siteSettings;
    protected $userModel;

    public function __construct($siteSettings, $cuID, RequestInterface $request)
    {
        $this->siteSettings = $siteSettings;
        $this->cuID         = (int) ($cuID ?? 0);
        $this->request      = $request;

        $this->MyMIBudget    = new MyMIBudget();
        $this->MyMIDashboard = new MyMIDashboard();
        $this->MyMIUser      = new MyMIUser();
        $this->MyMISolana    = new MyMISolana();
        $this->MyMIWallet    = new MyMIWallet();
        $this->MyMIWallets   = new MyMIWallets();
        $this->userModel     = new UserModel();
    }

    public function commonData(): array
    {
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta']         = (string) $this->siteSettings->beta;
        $this->data['debug']        = (string) $this->siteSettings->debug;
        $this->data['request']      = $this->request;
        $this->data['uri']          = $this->request->getUri();
        $this->data['userAgent']    = $this->request->getUserAgent();
        $this->data['date']         = $this->siteSettings->date;
        $this->data['time']         = $this->siteSettings->time;
        $this->data['hostTime']     = $this->siteSettings->hostTime;
        $this->data['cuID']         = $this->cuID;

        $userId = (int) ($this->cuID ?? 0);

        if ($userId <= 0) {
            log_message(
                'debug',
                'UserService::commonData called without authenticated user; returning guest base data only.'
            );

            $this->data['cuRole']             = 4;
            $this->data['cuUserType']         = '';
            $this->data['cuEmail']            = '';
            $this->data['cuDisplayName']      = 'Guest';
            $this->data['cuUsername']         = '';
            $this->data['cuNameInitials']     = '';
            $this->data['cuKYC']              = '';
            $this->data['cuAddress']          = '';
            $this->data['cuCity']             = '';
            $this->data['cuState']            = '';
            $this->data['cuCountry']          = '';
            $this->data['cuZipCode']          = '';
            $this->data['coinsExchanged']     = 0;
            $this->data['cuWalletCount']      = 0;
            $this->data['cuWallets']          = [];
            $this->data['cuNonCreditWallets'] = [];
            $this->data['cuCryptoWallets']    = [];
            $this->data['cuInvestWallets']    = [];
            $this->data['MyMIGCoinSum']       = 0;
            $this->data['cuWalletID']         = null;
            $this->data['walletID']           = null;
            $this->data['solanaNetworkStatus']   = [];
            $this->data['totalAccountBalance']    = 0;
            $this->data['totalAccountBalanceFMT'] = '0.00';
            $this->data['getFeatures']            = [];
            $this->data['completedGoals']         = 0;
            $this->data['pendingGoals']           = 0;
            $this->data['promotionalBanners']     = [];

            return $this->data;
        }

        try {
            $allBudgetInfo = $this->MyMIBudget->allUserBudgetInfo($userId);
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData allUserBudgetInfo error: {msg}', ['msg' => $e->getMessage()]);
            $allBudgetInfo = [];
        }

        $this->data['totalAccountBalance']    = $allBudgetInfo['totalAccountBalance']    ?? 0;
        $this->data['totalAccountBalanceFMT'] = $allBudgetInfo['totalAccountBalanceFMT'] ?? '0.00';

        try {
            $this->data['getFeatures'] = $this->MyMIDashboard->getFeatures();
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getFeatures error: {msg}', ['msg' => $e->getMessage()]);
            $this->data['getFeatures'] = [];
        }

        try {
            $dashboardInfo = $this->MyMIDashboard->dashboardInfo($userId);
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData dashboardInfo error: {msg}', ['msg' => $e->getMessage()]);
            $dashboardInfo = [];
        }

        $this->data['completedGoals']     = $dashboardInfo['progressGoalData']['completions'] ?? 0;
        $this->data['pendingGoals']       = $dashboardInfo['progressGoalData']['goals']       ?? 0;
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners']              ?? [];

        if (! $this->MyMIUser instanceof MyMIUser) {
            log_message('warning', 'UserService::commonData MyMIUser was null; reinitializing.');
            $this->MyMIUser = new MyMIUser();
        }

        try {
            $userInfo = $this->MyMIUser->getUserInformation($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getUserInformation error: {msg}', ['msg' => $e->getMessage()]);
            $userInfo = [];
        }

        $this->data['cuWalletID']       = $userInfo['cuWalletID']    ?? null;
        $this->data['cuRole']           = $userInfo['cuRole']        ?? 4;
        $this->data['cuUserType']       = $userInfo['cuUserType']    ?? '';
        $this->data['cuEmail']          = $userInfo['cuEmail']       ?? '';
        $this->data['cuDisplayName']    = $userInfo['cuDisplayName'] ?? '';
        $this->data['cuUsername']       = $userInfo['cuUsername']    ?? '';
        $this->data['cuNameInitials']   = $userInfo['cuNameInitials']?? '';
        $this->data['cuKYC']            = $userInfo['cuKYC']         ?? '';
        $this->data['cuAddress']        = $userInfo['cuAddress']     ?? '';
        $this->data['cuCity']           = $userInfo['cuCity']        ?? '';
        $this->data['cuState']          = $userInfo['cuState']       ?? '';
        $this->data['cuCountry']        = $userInfo['cuCountry']     ?? '';
        $this->data['cuZipCode']        = $userInfo['cuZipCode']     ?? '';
        $this->data['coinsExchanged']   = $userInfo['coinsExchanged']?? 0;
        $this->data['cuWalletCount']    = $userInfo['cuWalletCount'] ?? 0;
        $this->data['MyMIGCoinSum']     = $userInfo['MyMIGCoinSum']  ?? 0;
        $this->data['walletID']         = $userInfo['walletID']      ?? null;

        try {
            $this->data['cuWallets'] = $this->MyMIWallet->getWalletsByUser($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getWalletsByUser error: {msg}', ['msg' => $e->getMessage()]);
            $this->data['cuWallets'] = [];
        }

        try {
            $this->data['cuNonCreditWallets'] = $this->MyMIUser->getUserNonCreditWallets($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getUserNonCreditWallets error: {msg}', ['msg' => $e->getMessage()]);
            $this->data['cuNonCreditWallets'] = [];
        }

        try {
            $this->data['cuCryptoWallets'] = $this->MyMIWallet->getUserCryptoWallets($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getUserCryptoWallets error: {msg}', ['msg' => $e->getMessage()]);
            $this->data['cuCryptoWallets'] = [];
        }

        try {
            $this->data['cuInvestWallets'] = $this->MyMIWallet->getUserInvestWallets($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getUserInvestWallets error: {msg}', ['msg' => $e->getMessage()]);
            $this->data['cuInvestWallets'] = [];
        }

        try {
            $this->data['solanaNetworkStatus'] = $this->MyMISolana->getNetworkStatus() ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::commonData getNetworkStatus error: {msg}', ['msg' => $e->getMessage()]);
            $this->data['solanaNetworkStatus'] = [];
        }

        return $this->data;
    }

    public function userAccountData(): array
    {
        $data = [];
        $userId = (int) ($this->cuID ?? 0);

        if ($userId <= 0) {
            log_message('debug', 'UserService::userAccountData called without authenticated user; returning empty data.');
            return $data;
        }

        if (! $this->MyMIUser instanceof MyMIUser) {
            $this->MyMIUser = new MyMIUser();
        }

        try {
            $userInfo = $this->MyMIUser->getUserInformation($userId) ?? [];
        } catch (\Throwable $e) {
            log_message('error', 'UserService::userAccountData getUserInformation error: {msg}', ['msg' => $e->getMessage()]);
            $userInfo = [];
        }

        $data['cuEmail']          = $userInfo['cuEmail']         ?? '';
        $data['cuUsername']       = $userInfo['cuUsername']      ?? '';
        $data['cuFirstName']      = $userInfo['cuFirstName']     ?? '';
        $data['cuMiddleName']     = $userInfo['cuMiddleName']    ?? '';
        $data['cuLastName']       = $userInfo['cuLastName']      ?? '';
        $data['cuNameSuffix']     = $userInfo['cuNameSuffix']    ?? '';
        $data['cuPhone']          = $userInfo['cuPhone']         ?? '';
        $data['cuDOB']            = $userInfo['cuDOB']           ?? '';
        $data['cuMailingAddress'] = $userInfo['cuMailingAddress']?? '';

        if ((int) ($this->siteSettings->solanaExchange ?? 0) === 1) {
            try {
                $accountData          = $this->MyMIDashboard->getCryptoAccount($userId, 'Solana');
                $data['cuSolanaDW']   = $accountData['accountInfo'] ?? [];
            } catch (\Throwable $e) {
                log_message('error', 'UserService::userAccountData getCryptoAccount error: {msg}', ['msg' => $e->getMessage()]);
                $data['cuSolanaDW'] = [];
            }
        }

        return $data;
    }

    public function getUserLoginActivity($cuID)
    {
        return $this->userModel->getUserLoginActivity($cuID);
    }
}
?>