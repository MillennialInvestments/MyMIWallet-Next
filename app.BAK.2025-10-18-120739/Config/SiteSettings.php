<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

if (!class_exists(\App\Config\SiteSettings::class, false)) {
    // The class does not exist, so we can define it safely.
    class SiteSettings extends BaseConfig
    {
        public int $stage                       = 5;
        public $beta                            = 0;
        public $debug                           = 0;
        public $csrfEnabled                     = 1;
        public $date;
        public $hostTime;
        public $time;
        public $alertOperations                 = 0;
        public $assetOperations                 = 0;
        public $bettingOperations               = 0;
        public $budgetOperations                = 0;
        public $creditOperations                = 0;
        public $communityTabs                   = 0; 
        public $cryptoPayments                  = 0; 
        public $dailyGoals                      = 1; 
        public $debtOperations                  = 0;
        public $educateOperations               = 0;
        public $exchangeOperations              = 0;
        public $exchangeTab                     = 1;
        public $integrationOperations           = 1;
        public $investmentOperations            = 0;
        public $marketplaceOperations           = 0;
        public $monthlyGoals                    = 0; 
        public $monthlyMemberships              = 1; 
        public $newsOperations                  = 0;
        public $partnerOperations               = 0;
        public $projectOperations               = 1;
        public $referralOperations              = 1;
        public $retirementOperations            = 0;
        public $siteOperations                  = 0; 
        public $weeklyGoals                     = 0; 
        public $commission_rate                 = 0.10; // 10% commission rate, adjust accordingly
        public bool $useTfidf                   = true;
        // Budgeting Management
        public $monthlySavingsPercentage        = 0.2;
        // Membership Management
        public $customizableMemberships         = 1;
        public $memberStarterFee                = '9.99';
        public $memberBasicFee                  = '29.99';
        public $memberProFee                    = '49.99';
        public $memberPremiumFee                = '99.99';
        // Solana Operations Management
        public $solanaExchange                  = 1;
        public $createSolanaStatus              = 0; 
        public $solanaUserAssets                = 0;
        public $solanaNetwork                   = 0; 
        public $solanaNotifications             = 0; 
        public $swapSolanaStatus                = 1; 
        public $tradeSolanaStatus               = 1; 
        public $transactionsSolanaStatus        = 1; 

        public string $companyName              = 'MyMI Wallet';
        public string $companySlogan            = 'The Future of Finance | Budgeting & Investments';
        // public string $companyMetaTitle         = 'MyMI Wallet | The Future of Finance | Budgeting & Investments';
        // public string $companyMetaDescription   = 'Experience the future of personal finance with MyMI Wallet. We provide advanced budgeting and investment portfolio management solutions, empowering individuals to better manage their finances. Streamline your financial journey with our intuitive online fintech application and service.';
        public string $companyMetaTitle         = 'MyMI Wallet | Advanced Budgeting & Investment Tools for Personal Finance Management';
        public string $companyMetaDescription   = 'Take control of your financial future with MyMI Wallet – a comprehensive platform for budgeting and investment management. Access advanced tools for tracking investments, managing personal budgets, and optimizing your portfolio. Join thousands of users who rely on MyMI Wallet for smarter financial decisions and seamless money management.';
        public string $companyLogo              = 'assets/images/MyMI-Wallet-Logo-Black.png';
        // public string $companyLogo              = '/assets/images/Millennial-Investments-Black.png';
        public string $companyPhone             = '+1(318)775-9059';
        public string $companySupportEmail      = 'support@mymiwallet.com';
        public string $websitePublisher         = 'MyMI Wallet, LLC.';
        public string $websiteAuthor            = 'Timothy Burks Jr.';
        public string $websiteDirectory         = 'Site-v8.0.1';
        public string $websiteVersion           = 'v8.0.1';
        public string $facebookPage             = 'https://www.facebook.com/MyMIWalletNews';
        public string $facebookGroup            = 'https://www.facebook.com/InvestorsTalk';
        public string $twitterPage              = 'www.x.com/MyMIWallet';
        public string $linkedinPage             = 'https://www.linkedin.com/company/mymiwallet/';
        public string $bootstrapTheme;
        public string $managementActionItems    = 'col-xxl-2 col-lg-4 pb-4';
        public string $baseURL;

        public string $betaCardNumber           = '5110928623096011';
        public string $betaExpiryDate           = '11/2029';
        public string $betaSecurityCode         = '123';
        public $minMyMICoinPurchase             = 5; 
        public $MyMIGCoinValue                  = 1; 
        public $MyMIGCoinAvailable              = 23000000000000; 
        // public $gasFee                          = 0.007457; 
        // public $transFee                        = 0.60; 
        // public $transPercent                    = .01058;     
        public $gasFee                          = 0.000005; 
        public $transFee                        = 0.01; 
        // public $transPercent                    = .005; 
        public $transPercent                    = .01058; 
        public $mymiTierOne                     = 10;
        public $mymiTierTwo                     = 25;
        public $mymiTierThree                   = 50;
        public $mymiTierFour                    = 100;
        public $mymiTierFive                    = 250;

        public $tierOne                         = 10;
        public $tierTwo                         = 25;
        public $tierThree                       = 50;
        public $tierFour                        = 100;
        public $tierFive                        = 250;

        public $walletCost                      = 5;
        public $minimumPurchase                 = 5;
        public $minimumCoinAmount               = 5;

        public $formWrap                        = 'form-control-wrap';
        public $formContainer                   = 'form-group row';
        public $formLabel                       = 'col-3 form-label pr-0';
        public $formControlColumn               = 'col-9';
        public $formControl                     = 'form-control';
        public $formSelectDiv                   = 'dropdown bootstrap-select clear custom-dropdown';
        public $formSelect                      = 'form-select form-control form-control-lg';
        public $formSelectpicker                = 'form-control selectpicker';
        public $formText                        = 'form-text';
        public $formCustomText                  = 'form-text custom-form-text';

        public $recaptchaSiteKey                = '6Ld-35olAAAAAKfXFhwLJ6RYLZuYcuVN5NLUqBTF';
        public $recaptchaSecretKey              = '6Ld-35olAAAAAHprc31OgPQCTx6N4acPz_e5i8hG';

        // Add the new properties here
        public $today;
        public $month;
        public $day;
        public $year;
        public $allowed_senders = [
            '3185485805',
        ];
        public function __construct()
        {
            parent::__construct();
            
            $this->today                        = date("m/d/Y");
            $this->date                         = date("F jS, Y");
            $this->hostTime                     = date("g:i A");
            $this->time                         = date("g:i A");
            $this->month                        = date("n");
            $this->day                          = date("d");
            $this->year                         = date("Y");

            // Load the App config
            $appConfig                          = config('App'); // Properly fetching the App configuration
            $this->baseURL                      = $appConfig->baseURL; // Correctly using the fetched config
            $colorScheme                        = 'blue'; // Define or fetch your color scheme here
            $this->bootstrapTheme               = $this->baseURL . 'assets/css/style.' . $colorScheme . '.css';
            
            $this->setStageOperations(); // Make sure this is called after all necessary properties are initialized
        }

        public function getAllowedSenders(): array
        {
            return $this->allowed_senders;
        }
        
        public function setStageOperations() {
            $this->resetOperations(); 
            switch($this->stage) {
                case 1: 
                    //Personal Budgeting
                    $this->siteOperations = 1; 
                    $this->budgetOperations = 1; 
                    break;
                case 2: 
                    // Credit
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    break; 
                case 3: 
                    // Investments
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->assetOperations = 0;
                    $this->referralOperations = 1;
                    $this->exchangeOperations = 1;
                    $this->marketplaceOperations = 1;
                    break; 
                case 4: 
                    // Automated Integrations
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->assetOperations = 0;
                    $this->referralOperations = 1;
                    $this->exchangeOperations = 1;
                    $this->marketplaceOperations = 1;
                    $this->integrationOperations = 1;
                    break;
                case 5: 
                    // Alert Integrations
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->assetOperations = 0;
                    $this->referralOperations = 1;
                    $this->exchangeOperations = 1;
                    $this->marketplaceOperations = 1;
                    $this->integrationOperations = 1;
                    $this->alertOperations = 1; 
                    break;
                case 6: // !! NEEDS TO BE ADJUSTED BELOW HERE
                    // Financia News Program
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->exchangeOperations = 1;
                    break;
                case 6: 
                    // Referral Program
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->exchangeOperations = 1;
                    break;
                case 7: 
                    // Credit / Debt Recovery
                    $this->siteOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    break;
                case 8: 
                    // Retirement Planning
                    $this->siteOperations = 1;
                    $this->educateOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->retirementOperations = 1;
                    break;
                case 9: 
                    // Asset Creator | Exchange Program
                    $this->siteOperations = 1;
                    $this->educateOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->retirementOperations = 1;
                    $this->assetOperations = 1;
                    $this->exchangeOperations = 1;
                    break;
                case 10: 
                    // Marketplace Program
                    $this->siteOperations = 1;
                    $this->educateOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->retirementOperations = 1;
                    $this->assetOperations = 1;
                    $this->exchangeOperations = 1;
                    $this->marketplaceOperations = 1;
                    break;
                case 11: 
                    // Partnership Program
                    $this->siteOperations = 1;
                    $this->educateOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->retirementOperations = 1;
                    $this->assetOperations = 1;
                    $this->exchangeOperations = 1;
                    $this->marketplaceOperations = 1;
                    $this->partnerOperations = 1;
                    break;
                case 12: 
                    // Betting Analysis Program
                    $this->siteOperations = 1;
                    $this->educateOperations = 1;
                    $this->budgetOperations = 1;
                    $this->debtOperations = 1;
                    $this->investmentOperations = 1;
                    $this->integrationOperations = 1;
                    $this->newsOperations = 1;
                    $this->referralOperations = 1;
                    $this->retirementOperations = 1;
                    $this->assetOperations = 1;
                    $this->exchangeOperations = 1;
                    $this->marketplaceOperations = 1;
                    $this->partnerOperations = 1;
                    $this->bettingOperations = 1;
                    break;
            }
        }

        public function resetOperations() {
            $this->siteOperations = 0;
            $this->educateOperations = 0;
            $this->budgetOperations = 0;
            $this->investmentOperations = 0;
            $this->integrationOperations = 0;
            $this->newsOperations = 0;
            $this->referralOperations = 0;
            $this->debtOperations = 0;
            $this->retirementOperations = 0;
            $this->assetOperations = 0;
            $this->exchangeOperations = 0;
            $this->marketplaceOperations = 0;
            $this->partnerOperations = 0;
            $this->bettingOperations = 0;
            // Add any other operations that need to be reset
        }
    }
} else {
    // The class already exists, handle accordingly (e.g., log a warning).
    error_log('Warning: The class App\Config\SiteSettings already exists. Duplicate definition avoided.');
}