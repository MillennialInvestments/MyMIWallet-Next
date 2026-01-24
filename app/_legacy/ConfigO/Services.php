<?php

namespace Config;

use CodeIgniter\Config\BaseService;

/**
 * Services Configuration file.
 *
 * Services are simply other classes/libraries that the system uses
 * to do its job. This is used by CodeIgniter to allow the core of the
 * framework to be swapped out easily without affecting the usage within
 * the rest of your application.
 *
 * This file holds any application-specific services, or service overrides
 * that you might need. An example has been included with the general
 * method format you should use for your service methods. For more examples,
 * see the core Services file at system/Config/Services.php.
 */
class Services extends BaseService
{
    // === Moddels ===
    public static function exchangeModel($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('exchangeModel');
        return new \App\Models\ExchangeModel();
    }

    // === Libraries ===

    public static function intakeRouter($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('intakeRouter');
        return new \App\Services\IntakeRouter();
    }

    public static function marketingScraper($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('marketingScraper');
        return new \App\Services\MarketingScraper();
    }

    public static function tradeAlertsIngest($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('tradeAlertsIngest');
        return new \App\Services\TradeAlertsIngest();
    }

    public static function realEstateIngestService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('realEstateIngestService');
        return new \App\Services\RealEstateIngestService();
    }
    
    // === Libraries ===
    public static function myMIAdvisor($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('MyMIAdvisor');
        return new \App\Libraries\MyMIAdvisor();
    }
    public static function myMIAdvisors($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('MyMIAdvisors');
        return new \App\Libraries\MyMIAdvisors();
    }

    public static function myMIAlerts($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIAlerts');
        return new \App\Libraries\MyMIAlerts();
    }

    public static function myMIAnalytics($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIAnalytics');
        return new \App\Libraries\MyMIAnalytics();
    }

    public static function myMIBitcoin($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIBitcoin');
        return new \App\Libraries\MyMIBitcoin();
    }

    public static function myMIBudget($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIBudget');
        return new \App\Libraries\MyMIBudget();
    }

    public static function myMICoin($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMICoin');
        return new \App\Libraries\MyMICoin();
    }

    public static function myMIDashboard($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIDashboard');
        return new \App\Libraries\MyMIDashboard();
    }

    public static function myMIDigibyte($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIDigibyte');
        return new \App\Libraries\MyMIDigibyte();
    }

    public static function myMIEthereum($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIEthereum');
        return new \App\Libraries\MyMIEthereum();
    }

    public static function myMIExchange($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIExchange');
        return new \App\Libraries\MyMIExchange();
    }

    public static function myMIInvestments($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIInvestments');
        return new \App\Libraries\MyMIInvestments();
    }

    public static function myMIMarketing($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIMarketing');
        return new \App\Libraries\MyMIMarketing();
    }

    public static function myMIMarketAux($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('MyMIMarketAux');
        return new \App\Libraries\MyMIMarketAux();
    }

    public static function myMIMomentum($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('MyMIMomentum');
        return new \App\Libraries\MyMIMomentum();
    }

    public static function myMIOnboarding($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIOnboarding');
        return new \App\Libraries\MyMIOnboarding();
    }

    public static function myMIProjects($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIProjects');
        return new \App\Libraries\MyMIProjects();
    }

    public static function myMIRaydium($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIRaydium');
        return new \App\Libraries\MyMIRaydium();
    }

    public static function myMISolana($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMISolana');
        return new \App\Libraries\MyMISolana();
    }

    public static function myMIUser($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIUser');
        return new \App\Libraries\MyMIUser();
    }

    public static function myMIWallet($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIWallet');
        return new \App\Libraries\MyMIWallet();
    }

    public static function myMIWallets($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIWallets');
        return new \App\Libraries\MyMIWallets();
    }

    public static function myMIGold($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIGold');
        return new \App\Libraries\MyMIGold();
    }

    // === Services ===
    public static function accountService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('accountService');
        return new \App\Services\AccountService();
    }

    public static function applePayService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('applePayService');
        return new \App\Services\ApplePayService();
    }

    public static function blockchainService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('blockchainService');
        return new \App\Services\BlockchainService();
    }

    public static function bloggerService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('bloggerService');
        }
        return new \App\Services\BloggerService();
    }

    public static function budgetService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('budgetService');
        return  $this->getBudgetService();
    }

    public static function cashAppService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('cashAppService');
        return new \App\Services\CashAppService();
    }

    public static function commonDataService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('commonDataService');
        return new \App\Services\CommonDataService();
    }

    public static function currencyService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('currencyService');
        return new \App\Services\CurrencyService();
    }

    public static function dashboardService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('dashboardService');
        return new \App\Services\DashboardService();
    }

    public static function debtManagement($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('debtManagement');
        return new \App\Services\DebtManagement();
    }

    public static function ethereumServices($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('ethereumServices');
        return new \App\Services\EthereumServices();
    }

    public static function exchangeService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('exchangeService');
        return new \App\Services\ExchangeService();
    }

    public static function finnhubService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('finnhubService');
        return new \App\Services\FinnhubService();
    }

    public static function forecastingService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('forecastingService');
        return new \App\Services\ForecastingService();
    }

    public static function goalTrackingService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('goalTrackingService');
        return new \App\Services\GoalTrackingService();
    }

    public static function googlePayService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('googlePayService');
        return new \App\Services\GooglePayService();
    }

    public static function investmentService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('investmentService');
        return new \App\Services\InvestmentService();
    }

    public static function mailChimpService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('mailChimpService');
        return new \App\Services\MailChimpService();
    }

    public static function marketingService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('marketingService');
        return new \App\Services\MarketingService();
    }

    public static function notificationService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('notificationService');
        return new \App\Services\NotificationService();
    }

    public static function payPalService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('payPalService');
        return new \App\Services\PayPalService();
    }

    public static function plaidService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('plaidService');
        return new \App\Services\PlaidService();
    }

    public static function projectsService($getShared = true)
    {
        return $getShared ? static::getSharedInstance('projectsService') : new \App\Services\ProjectsService();
    }

    public static function pythonService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('pythonService');
        return new \App\Services\PythonService();
    }

    public static function recurringService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('recurringService');
        return new \App\Services\RecurringService();
    }

    public static function referralService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('referralService');
        return new \App\Services\ReferralService();
    }

    public static function revenueService($getShared = true)
    {
        return $getShared ? static::getSharedInstance('revenueService') : new \App\Services\RevenueService();
    }

    public static function robinhoodSigner($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('myMIRobinhood');
        return new \App\Libraries\MyMIRobinhood();
    }

    public static function solanaService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('solanaService');
        return new \App\Services\SolanaService();
    }

    public static function supportService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('supportService');
        return new \App\Services\SupportService();
    }

    public static function tokenService($getShared = true)
    {
        return $getShared ? static::getSharedInstance('tokenService') : new \App\Services\TokenService();
    }

    public static function transactionService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('transactionService');
        return new \App\Services\TransactionService();
    }

    public static function userService($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance('userService');
        }
    
        $siteSettings = config('SiteSettings');
        $session = \Config\Services::session();
        $auth = service('authentication');
        $request = \Config\Services::request();
    
        $cuID = $session->get('user_id') ?? $auth->id();
    
        if (!$cuID) {
            log_message('error', 'Services::userService - Missing cuID.');
            throw new \RuntimeException('Unable to initialize UserService: cuID not available.');
        }
    
        return new \App\Services\UserService($siteSettings, $cuID, $request);
    }    

    public static function walletService($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('walletService');
    
        $logger = \Config\Services::logger();
        $walletModel = new \App\Models\WalletModel();
    
        return new \App\Services\WalletService($logger, $walletModel);
    }

    public static function codexGenerator($getShared = true)
    {
        if ($getShared) return static::getSharedInstance('codexGenerator');

        return new \App\Modules\Marketing\Libraries\CodexGenerator();
    }
    
}
