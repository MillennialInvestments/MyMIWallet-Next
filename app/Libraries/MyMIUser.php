<?php
namespace App\Libraries;

use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{APIs, Auth, SiteSettings, SocialMedia}; 
use App\Models\{BudgetModel, ExchangeModel, InvestorModel, MyMICoinModel, TrackerModel, UserModel, WalletModel}; // Assuming your models are in App\Models namespace
use App\Libraries\{BaseLoader, MyMICoin, MyMIGold, MyMIWallet};
use CodeIgniter\I18n\Time;

#[\AllowDynamicProperties]
class MyMIUser
{

    protected $auth;
    protected $cuID;
    protected $db;
    protected $debug;
    protected $helpers = (['auth']);
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $budgetModel;
    protected $exchangeModel;
    protected $investorModel;
    protected $trackerModel; 
    protected $userModel; 
    protected $walletModel; 
    protected $MyMICoinModel;
    protected $MyMICoin;
    protected $MyMIGold;
    protected $MyMIWallet;

    public function __construct()
    {
        $this->auth = service('authentication');
        $this->db = \Config\Database::connect();
        $this->request = service('request');
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug;
        $this->session = Services::session();
        
        $this->budgetModel = new BudgetModel();
        $this->trackerModel = new TrackerModel();
        $this->userModel = new UserModel();
        $this->walletModel = new WalletModel();
        // Defer loading heavy libraries
        $this->MyMICoin = null;
        $this->MyMIGold = null;
        $this->MyMIWallet = null;
    
        // To this (only logs once per session for now):
        if (!defined('MYMIUSER_LOGGED')) {
            define('MYMIUSER_LOGGED', true);
            log_message('debug', 'MyMIUser L52 - initialized (first log).');
        }
    }

    /**
     * Return broker credentials for a user, or null if not set.
     * @param int|null $userId defaults to current user
     */
    public function getBrokerCredential(?int $userId, string $broker): ?array
    {
        $userId = $userId ?? ($this->auth->id() ?? $this->session->get('user_id'));
        if (!$userId || !$broker) {
            log_message('warning', 'getBrokerCredential called with invalid params.');
            return null;
        }

        $row = $this->db->table('bf_user_broker_links')
            ->where('user_id', $userId)
            ->where('broker', strtolower($broker))
            ->get()->getRowArray();

        return $row ? (json_decode($row['credentials'] ?? '[]', true) ?: []) : null;
    }

    /**
     * Retrieve current authenticated user's full account info
     * 
     * @return array|null
     */
    public function getCurrentUser()
    {
        $cuID = $this->auth->id() ?? $this->session->get('user_id');
        if (empty($cuID)) {
            log_message('error', "MyMIUser::getCurrentUser - Unable to determine current user ID.");
            return null;
        }

        return $this->getUserInformation($cuID);
    }

    /**
     * Resolve the current user's ID from auth or session data.
     */
    public function getCurrentUserId()
    {
        $cuID = $this->auth->id() ?? $this->session->get('user_id');
        if (empty($cuID)) {
            log_message('debug', 'MyMIUser::getCurrentUserId - cuID not found');
        }
        return $cuID;
    }
    
    private function safeCall(callable $fn) {
        try {
            return $fn();
        } catch (\Throwable $e) {
            log_message('error', 'MyMIUser::safeCall - {msg}', ['msg' => $e->getMessage()]);
            return null;
        }
    }

    public function defaultUserAccountInfo()
    {
        $cuID                               = $this->cuID ?? $this->request->getIPAddress();
        
        // Timezone handling (this may need to be adapted based on how you handle timezones)
        $timezoneOffset                     = $this->request->getPost('timezoneOffset');
        if ($timezoneOffset !== null) {
            $timezone                       = intval($timezoneOffset) / -60;
            $timezoneStr                    = 'UTC' . ($timezone >= 0 ? '+' : '') . $timezone;
            date_default_timezone_set($timezoneStr);
            $this->session->set('user_timezone', $timezoneStr);
        } else {
            $timezoneStr                    = 'ERROR: Could not set Timezone String';
        }

        // Setting session data
        $this->session->set('cuID', $cuID);
        $this->session->set('timezoneStr', $timezoneStr);

        $defaultAccountArray                = [
            'message'                       => 'Your custom message here',
            'cuID'                          => $cuID,
            'timezoneStr'                   => $timezoneStr,
        ];

        return $defaultAccountArray;
    }

    public function findPotentialSpamUsers()
    {
        $users = $this->userModel->findAll();
        $spamUsers = [];
    
        foreach ($users as $user) {
            if ($this->isObfuscatedEmail($user['email'])) {
                $spamUsers[] = $user;
            }
        }
    
        log_message('info', '🚨 Total potential spam accounts found: ' . count($spamUsers));
        return $spamUsers;
    }

    public function getDefaultWalletInfo($cuID) {
        $getUserDefaultWallet = $this->walletModel->getUserDefaultWallet($cuID);
        if ($getUserDefaultWallet === null) {
            log_message('error', 'No default wallet found for user ID: ' . $cuID);
            return null;
        }
        $walletID = $getUserDefaultWallet['id'] ?? 0;
        $walletBroker = $getUserDefaultWallet['broker'] ?? 'N/A';
        $walletNickname = $getUserDefaultWallet['nickname'] ?? 'N/A';
        $walletDefault = $getUserDefaultWallet['default_wallet'] ?? 'N/A';
        $walletExchange = $getUserDefaultWallet['exchange_wallet'] ?? 'N/A';
        $walletMarketPair = $getUserDefaultWallet['market_pair'] ?? 'N/A';
        $walletMarket = $getUserDefaultWallet['market'] ?? 'N/A';
        $walletTitle = $walletNickname !== "N/A" ? $walletNickname : $walletBroker . ' - ' . $walletNickname;
    
        // Fetch the transaction summary for the wallet
        $transactions = $this->walletModel->getTransactionSummaryByWallet($walletID);
    
        $walletDepositAmount = 0;
        $walletWithdrawAmount = 0;
    
        foreach ($transactions as $transaction) {
            if ($transaction['trans_type'] === 'Deposit') {
                $walletDepositAmount += $transaction['amount'];
            } elseif ($transaction['trans_type'] === 'Withdraw') {
                $walletWithdrawAmount += $transaction['amount'];
            }
        }

        $userCoinData = $this->getMyMICoin()->getUserCoinTotal($cuID) ?? 0;
        $MyMICoinValue = $this->getMyMICoin()->getCoinValue() ?? 0.00;
        $MyMICCoinSum = $userCoinData['coinSum'] ?? 0;
        $MyMICCurrentValue = $MyMICoinValue * $MyMICCoinSum;
        $MyMICPercentChange = $userCoinData['myMICPerChange'] ?? 0;
    
        $coinsExchanged = $userCoinData['coinsExchanged'] ?? 0;

        $userGoldData = $this->getMyMIGold()->getUserCoinTotal($cuID);
        $MyMIGCoinSum = $userGoldData['coinSum'] ?? 0;
        $getMyMIGoldValue = $this->getMyMIGold()->getCoinValue();
        $MyMIGoldValue = $getMyMIGoldValue['current_value'] ?? 1;
        $MyMIGCurrentValue = $MyMIGCoinSum * $MyMIGoldValue;
        $MyMIGPercentChange = $userGoldData['myMIGPerChange'] ?? 0;
        $totalAccountBalanceFMT = $this->getMyMIBudget()->calculateTotalAccountBalance() ?? 0.00;
        $walletFunds = $walletDepositAmount - $walletWithdrawAmount;
        $walletAmount = $walletFunds + $MyMICCurrentValue + $MyMIGCurrentValue;
        $walletPercentChange = $walletAmount > 0 ? (($walletFunds - $walletAmount) / $walletAmount * 100) + $MyMICPercentChange : $MyMICPercentChange;
    
        return [
            'coinsExchanged' => $coinsExchanged,
            'MyMICoinValue' => $MyMICoinValue,
            'MyMICCurrentValue' => $MyMICCurrentValue,
            'MyMICCoinSum' => $MyMICCoinSum,
            'MyMIGoldValue' => $MyMIGoldValue,
            'MyMIGCurrentValue' => $MyMIGCurrentValue,
            'MyMIGCoinSum' => $MyMIGCoinSum,
            'totalAccountBalanceFMT' => $totalAccountBalanceFMT,
            'walletID' => $walletID,
            'walletTitle' => $walletTitle,
            'walletBroker' => $walletBroker,
            'walletNickname' => $walletNickname,
            'walletDefault' => $walletDefault,
            'walletExchange' => $walletExchange,
            'walletMarketPair' => $walletMarketPair,
            'walletMarket' => $walletMarket,
            'walletFunds' => $walletFunds,
            'walletDepositAmount' => $walletDepositAmount,
            'walletWithdrawAmount' => $walletWithdrawAmount,
            'walletPercentChange' => $walletPercentChange,
        ];
    }

    protected function getMyMIGold() {
        if (!$this->MyMIGold) {
            $this->MyMIGold = new \App\Libraries\MyMIGold();
        }
        return $this->MyMIGold;
    }
    
    protected function getMyMIWallet() {
        if (!$this->MyMIWallet) {
            $this->MyMIWallet = new \App\Libraries\MyMIWallet();
        }
        return $this->MyMIWallet;
    }

    public function getUserAssetSummary($cuID)
    {
        $this->exchangeModel                    = new \App\Models\ExchangeModel(); // Make sure this model exists and is loaded
        $getUserAssetCount                      = $this->exchangeModel->getUserAssetCount($cuID);

        if (!$getUserAssetCount) {
            $assetTotalCount                    = 0;
        } else {
            $assetTotalCount                    = is_array($getUserAssetCount) ? count($getUserAssetCount) : 0;
        }

        $getUserAssetNetWorth                   = $this->exchangeModel->getUserAssetNetWorth($cuID);
        $assetNetValue                          = 0;
        if (!empty($getUserAssetNetWorth) && is_array($getUserAssetNetWorth) && isset($getUserAssetNetWorth[0]['current_value'])) {
            $assetNetValue                      = $getUserAssetNetWorth[0]['current_value'];
        }

        $getUserAssetInfo                       = $this->exchangeModel->getUserAssetInfo($cuID);
        $assetTotalGains                        = 0;
        if (!empty($getUserAssetInfo) && is_array($getUserAssetInfo) && isset($getUserAssetInfo[0]['current_value'], $getUserAssetInfo[0]['initial_value'])) {
            $assetTotalGains                    = $getUserAssetInfo[0]['current_value'] - $getUserAssetInfo[0]['initial_value'];
        }

        $userAssetSummary                       = [
            'assetTotalCount'                   => $assetTotalCount,
            'assetNetValue'                     => $assetNetValue,
            'assetTotalGains'                   => $assetTotalGains,
        ];

        return $userAssetSummary;
    }
    
    public function getUserByUsername($username)
    {
        return $this->db->table('users')
            ->where('username', $username)
            ->get()
            ->getRowArray();
    }

    public function getUserDefaultWalletForExisting($cuID) 
    {
        if (empty($this->cuID)) {
            $this->cuID                     = $this->session->get('user_id') ?? $this->auth->id() ?? null;
        }
        if ($this->debug === 1) {
            // log_message('debug', '$this->cuID - MyMI User L397: ' . $this->auth->id());
            // log_message('debug', '$this->getUserInformation($cuID) array - MyMI User L387: ' . print_r($this->getUserInformation($this->cuID), true));
        }
        $userInfo                           = $this->getUserInformation($this->cuID);
        if ($this->debug === 1) {
            // log_message('debug', '$userInfo array - MyMI User L398: ' . print_r($userInfo, true));
        }
        // Fetch default wallet info. Adjust method name if necessary.
        $userDefaultWalletInfo              = $this->getDefaultWalletInfo($this->cuID);
        
        if (!$userDefaultWalletInfo) {
            // Insert new wallet data if no default wallet exists
            $newWalletData = [
                'active'                    => 'Yes',
                'beta'                      => $this->siteSettings->beta,
                'default_wallet'            => 'Yes',
                'exchange_wallet'           => 'Yes',
                'market_pair'               => 'USD',
                'market'                    => 'MYMI',
                'user_id'                   => $this->cuID,
                'username'                  => $userInfo['cuUsername'],
                'user_email'                => $userInfo['cuEmail'],
                'broker'                    => 'Default',
                'nickname'                  => 'MyMI Funds',
                'wallet_type'               => 'Binary',
                'amount'                    => '0.00',
            ];

            $this->db->table('bf_users_wallet')->insert($newWalletData);
        }

        // Repeat the correct method call to retrieve updated wallet information if necessary
        $userDefaultWallet                  = $this->getDefaultWalletInfo($this->cuID); // Assuming this fetches updated info after insertion
        $getWalletCount                     = $this->walletModel->getNonDefaultWalletCount($this->cuID); // ! Create this function in Model
        $MyMICoinValue                      = $this->getMyMICoin()->getCoinValue() ?? 0;
        $userCoinData                       = $this->getMyMICoin()->getUserCoinTotal($this->cuID) ?? 0;
        $cuTotalWalletCount                 = $getWalletCount;

        $userCoinData = $this->getMyMICoin()->getUserCoinTotal($cuID) ?? [];
        $MyMICoinSum = $userCoinData['coinSum'] ?? 0;

        $userGoldData = $this->getMyMIGold()->getUserCoinTotal($cuID) ?? [];
        $MyMIGCoinSum = $userGoldData['coinSum'] ?? 0;
        
        if ($MyMICoinSum > 0 && $MyMIGCoinSum > 0) {
            $cuTotalWalletCount = $getWalletCount + 3;
        } elseif ($MyMICoinSum > 0 || $MyMIGCoinSum > 0) {
            $cuTotalWalletCount = $getWalletCount + 2;
        } else {
            $cuTotalWalletCount = $getWalletCount;
        }        
        
        // $userLastActivity		    = $this->CI->mymiwallet->get_last_activity($cuID, $walletID);
        // $lastTradeActivity			= $userLastActivity['$lastTradeActivity'];
        // $depositActivity				= $userLastActivity['$depositActivity'];
        // $withdrawActivity			= $userLastActivity['$withdrawActivity'];
        $lastTradeActivity				= 'N/A';
        $depositActivity				= 'N/A';
        $withdrawActivity				= 'N/A';

        $userDefaultData                    = [
            'cuID'                          => $cuID,
            'cuEmail'                       => $userInfo['cuEmail'],
            'cuUsername'                    => $userInfo['cuUsername'],
            'cuDisplayName'                 => $userInfo['cuDisplayName'],
            'cuUserType'                    => $userInfo['cuUserType'],
            'cuWalletID'                    => $userInfo['cuWalletID'],
            'walletID'                      => $userInfo['walletID'],
            'getWallets'                    => $userDefaultWalletInfo,
            'cuWalletCount'                 => $getWalletCount,
            'cuTotalWalletCount'            => $cuTotalWalletCount,
            'lastTradeActivity'             => $lastTradeActivity,
            'depositActivity'               => $depositActivity,
            'withdrawActivity'              => $withdrawActivity,
            'walletTitle'                   => $walletTitle ?? '',
            'walletBroker'                  => $walletBroker ?? '',
            'walletNickname'                => $walletNickname ?? '',
            'walletDefault'                 => $walletDefault ?? '',
            'walletExchange'                => $walletExchange ?? '',
            'walletMarketPair'              => $walletMarketPair ?? '',
            'walletMarket'                  => $walletMarket ?? '',
            'walletFunds'                   => $walletFunds ?? '',
            'walletInitialAmount'           => $walletInitialAmount ?? '',
            'walletAmount'                  => $walletAmount ?? '',
            'walletPercentChange'           => $walletPercentChange ?? '',
            'walletGains'                   => $walletGains ?? '',
            'depositAmount'                 => $depositAmount ?? '',
            'withdrawAmount'                => $withdrawAmount ?? '',
            'walletDepositAmount'           => $walletDepositAmount ?? '',
            'walletWithdrawAmount'          => $walletWithdrawAmount ?? '',
            'MyMICoinValue'                 => $MyMICoinValue ?? '',
            'MyMICCurrentValue'             => $MyMICCurrentValue ?? '',
            'MyMICoinSum'                   => $MyMICoinSum ?? '',
            'coinsExchanged'                => $coinsExchanged ?? '',
            'MyMIGoldValue'                 => $MyMIGoldValue ?? '',
            'MyMIGCurrentValue'             => $MyMIGCurrentValue ?? '',
            'MyMIGCoinSum'                  => $MyMIGCoinSum ?? '',
        ];

        return $userDefaultData;
    }

    private function getUserExchangeInfo($cuID)
    {
        // Logic to retrieve user exchange information
        $builder                            = $this->db->table('bf_exchanges_listing_request'); // ! Migrate This Table to mymiwallet database // Adjust the table name as needed
        $getAppInfo                         = $builder->getWhere(['id' => $cuID])->getRowArray();
        
        // $exchangeModel                      = new \App\Models\ExchangeModel(); // Ensure you have ExchangeModel configured in CI4 // ! Create this Model
        // $getAppInfo                          = $exchangeWallet->getApplicationInfo($cuID); // ! Create this Function
        if (empty($getAppInfo[0]['id'])) {
            $open_listing_app               = 0;
        } else {
            $open_listing_app               = $getAppInfo[0]['id'];
        }
        $userExchangeInfo                   = array(
            'open_listing_app'              => $open_listing_app,
        );
        return $userExchangeInfo;
    }
    
    public function getUserFinancialAssessment($cuID)
    {
        $investorModel = new InvestorModel();
        $financialAssessments = $investorModel->getUserData($cuID); // Ensure this method exists and returns an array

        // Initialize $userAssessment with a default value
        $userAssessment = [
            'account_activated' => 'No',
            'account_information' => 'No',
            'kyc_verified' => 'No',
            'financial_assessment' => 'No',
            'features_activated' => 'No',
            'banking_accounts' => 'No',
            'banking_wallets' => 'No',
            'last_banking_update' => 'No',
            'banking_integration' => 'No',
            'credit_summary' => 'No',
            'credit_wallets' => 'No',
            'last_credit_update' => 'No',
            'credit_integration' => 'No',
            'debt_summary' => 'No',
            'debt_wallets' => 'No',
            'last_debt_update' => 'No',
            'debt_integration' => 'No',
            'budgeting_complete' => 'No',
            'investment_assessment' => 'No',
            'investment_wallets' => 'No',
            'last_investment_update' => 'No',
            'brokerage_integration' => 'No',
            'risk_assessment' => 'No',
            'financial_goals' => 'No',
            'time_horizon' => 'No',
            'financial_rating' => 'No',
            'investment_experience' => 'No',
            'investment_knowledge' => 'No',
            'market_sentiment' => 'No',
            'investment_availability' => 'No',
            'personal_budgeting' => 'No',
            'portfolio_manager' => 'No',
            'automated_integration' => 'No',
            'asset_creator' => 'No',
        ];

        // If $financialAssessments is not empty, iterate and update $userAssessment
        if (!empty($financialAssessments)) {
            foreach ($financialAssessments as $financialAssessment) {
                $userAssessment = [
                    // Use the same structure but assign values from $financialAssessment
                    'account_activated'         => $financialAssessment['active'],
                    'account_information'       => $financialAssessment['account_information'],
                    'kyc_verified'              => $financialAssessment['kyc_verified'],
                    'financial_assessment'      => $financialAssessment['financial_assessment'],
                    'features_activated'        => $financialAssessment['features_activated'],
                    'banking_accounts'          => $financialAssessment['banking_accounts'],
                    'banking_wallets'           => $financialAssessment['banking_wallets'],
                    'last_banking_update'       => $financialAssessment['last_banking_update'],
                    'banking_integration'       => $financialAssessment['banking_integration'],
                    'credit_summary'            => $financialAssessment['credit_summary'],
                    'credit_wallets'            => $financialAssessment['credit_wallets'],
                    'last_credit_update'        => $financialAssessment['last_credit_update'],
                    'credit_integration'        => $financialAssessment['credit_integration'],
                    'debt_summary'              => $financialAssessment['debt_summary'],
                    'debt_wallets'              => $financialAssessment['debt_wallets'],
                    'last_debt_update'          => $financialAssessment['last_debt_update'],
                    'debt_integration'          => $financialAssessment['debt_integration'],
                    'budgeting_complete'        => $financialAssessment['budgeting_complete'],
                    'investment_assessment'     => $financialAssessment['investment_assessment'],
                    'investment_wallets'        => $financialAssessment['investment_wallets'],
                    'last_investment_update'    => $financialAssessment['last_investment_update'],
                    'brokerage_integration'     => $financialAssessment['brokerage_integration'],
                    'risk_assessment'           => $financialAssessment['risk_assessment'],
                    'financial_goals'           => $financialAssessment['financial_goals'],
                    'time_horizon'              => $financialAssessment['time_horizon'],
                    'financial_rating'          => $financialAssessment['financial_rating'],
                    'investment_experience'     => $financialAssessment['investment_experience'],
                    'investment_knowledge'      => $financialAssessment['investment_knowledge'],
                    'market_sentiment'          => $financialAssessment['market_sentiment'],
                    'investment_availability'   => $financialAssessment['investment_availability'],
                    'personal_budgeting'        => $financialAssessment['personal_budgeting'],
                    'portfolio_manager'         => $financialAssessment['portfolio_manager'],
                    'automated_integration'     => $financialAssessment['automated_integration'],
                    'asset_creator'             => $financialAssessment['asset_creator'],
                ];
            }
        }

        return $userAssessment;
    }

    public function getUserInformation($cuID)
    {
        if (empty($uscuIDerId)) {
            // Don’t warn on expected public traffic
            log_message('debug', 'MyMIUser::getUserInformation skipped (empty userId).');
            return null;
        }
        // if (empty($cuID)) {
        //     // log once per request to reduce spam
        //     if (! defined('MYMIUSER_EMPTY_USER_LOGGED')) {
        //         define('MYMIUSER_EMPTY_USER_LOGGED', true);
        //         log_message('warning', 'MyMIUser::getUserInformation called with empty userId; returning null.');
        //     }
        //     return null;
        // }
        $cuID = $cuID ?? $this->session->get('user_id') ?? $this->auth->id();
        if (empty($cuID)) {
            log_message('error', "MyMIUser L494 - Invalid User ID. getUserInformation called with empty user ID.");
            return null; // Prevents cascading failures
        }
        $cuID = (int) $cuID;
    
        $userData = $this->userModel->getUserAccount($cuID);
        if (!$userData || !is_array($userData) || count($userData) === 0) {
            log_message('error', "MyMIUser L501 - Can't retrieve User Information for ID {$cuID}. MyMIUser: L285");
            return null; // Return null to indicate failure in retrieving user data.
        }
        $getWalletCount                     = $this->walletModel->getNonDefaultWalletCount($this->cuID);
        $userGoldData                       = $this->getMyMIGold()->getUserCoinTotal($cuID);
        if ($this->debug === 1) {
            // log_message('debug', 'MyMIUser L291 - $userData: ' . (print_r($userData, true)));
        }
        // // Ensure that we have a User entity
        // if (!($userEntity instanceof \App\Entities\User)) {
        //     // log_message('error', "Retrieved data is not a User entity. MyMIUser: L336)");
        //     return null;
        // }
        
        // Construct the userInfo array from the retrieved data
        $userInfo = [
            'cuID'                          => $this->cuID,
            'cuRole'                        => $userData['role_id'],
            'cuEmail'                       => $userData['email'],
            'cuUsername'                    => $userData['username'],
            'cuDisplayName'                 => $userData['display_name'],
            'cuFirstName'                   => $userData['first_name'],
            'cuMiddleName'                  => $userData['middle_name'],
            'cuLastName'                    => $userData['last_name'],
            'cuNameSuffix'                  => $userData['name_suffix'],
            // 'cuNameInitials'                => $userData['cuNameInitials'],
            'cuPartner'                     => $userData['partner'],
            'cuReferrer'                    => $userData['referrer'],
            'cuKYC'                         => $userData['kyc'],
            'cuKYCVerified'                 => $userData['kyc_verified'],
            'cuDOB'                         => $userData['dob'],
            'cuSSN'                         => $userData['ssn'],
            'cuPhone'                       => $userData['phone'] ?? '',
            'cuCompany'                     => $userData['organization'],
            'cuAddress'                     => $userData['address'],
            'cuCity'                        => $userData['city'],
            'cuState'                       => $userData['state'],
            'cuCountry'                     => $userData['country'],
            'cuZipCode'                     => $userData['zipcode'],
            'cuMailingAddress'              => $userData['mailing_address'],
            'cuEmployment'                  => $userData['employment'],
            'cuOccupation'                  => $userData['occupation'],
            'cuSalary'                      => $userData['salary'],
            'cuProofIdentity'               => $userData['proof_identity'],
            'cuProofAddress'                => $userData['proof_address'],
            'cuUserType'                    => $userData['type'],
            'cuWalletID'                    => $userData['wallet_id'], // Assuming this is the correct field
            'walletID'                      => $userData['wallet_id'],
            'cuPublicKey'                   => $userData['wallet_id'], // Double-check this'], seems like a duplicate
            'cuPrivateKey'                  => $userData['private_key'],
            'cuSignupDate'                  => $userData['signup_date'],
            'cuLastLogin'                   => $userData['last_login'],
            'cuReferrerCode'                => $userData['referrer_code'],            
            'cuWalletCount'                 => $getWalletCount,
            'MyMIGCoinSum'                  => $userGoldData['coinSum'] ?? 0,    
        ];

        if ($this->debug === 1) {
            // log_message('debug', '$userInfo array - MyMI User L390: ' . print_r($userInfo, true));
        }
        return $userInfo;
    }

    // Inside MyMIUser.php, modify the getUserAssetSummary method to properly handle non-array values:
    public function getUserNonCreditWallets($cuID) { 
        $getUserNonCreditWallets = $this->userModel->getUserNonCreditWallets($cuID);
        return $getUserNonCreditWallets; 
    }

    public function hasBrokerLinked(?int $userId, string $broker): bool
    {
        return (bool) $this->getBrokerCredential($userId, $broker);
    }

    /**
     * Check if a given user is an admin
     *
     * @param int|null $cuID
     * @return bool
     */
    public function isAdmin($cuID = null)
    {
        $cuID = $cuID ?? $this->session->get('user_id') ?? $this->auth->id();
        if (empty($cuID)) {
            log_message('error', "MyMIUser::isAdmin - Invalid or missing user ID.");
            return false;
        }

        $userInfo = $this->getUserInformation($cuID);
        if (!$userInfo || !isset($userInfo['cuRole'])) {
            log_message('error', "MyMIUser::isAdmin - Could not retrieve user info or cuRole.");
            return false;
        }

        // Adjust this logic if your system uses a different admin role ID or constants
        return (int) $userInfo['cuRole'] === 1;
    }
    
    public function isObfuscatedEmail($email)
    {
        // Pattern: excessive dots in Gmail usernames (before the @)
        if (preg_match('/^[a-z0-9]+(\.[a-z0-9]+){3,}@gmail\.com$/i', $email)) {
            log_message('info', "📛 Detected spam-like email: {$email}");
            return true;
        }
        return false;
    }    

    /**
     * Upsert broker credential payload. Returns true on success.
     * NOTE: Consider encrypting sensitive fields before saving.
     */
    public function setBrokerCredential(?int $userId, string $broker, array $credentials): bool
    {
        $userId = $userId ?? ($this->auth->id() ?? $this->session->get('user_id'));
        if (!$userId || !$broker) {
            log_message('warning', 'setBrokerCredential called with invalid params.');
            return false;
        }

        $payload = [
            'user_id'    => (int) $userId,
            'broker'     => strtolower($broker),
            'credentials'=> json_encode($credentials, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE),
        ];

        $exists = $this->db->table('bf_user_broker_links')
            ->where('user_id', $userId)->where('broker', strtolower($broker))
            ->get()->getRowArray();

        if ($exists) {
            return (bool) $this->db->table('bf_user_broker_links')
                ->where('id', $exists['id'])
                ->update($payload);
        }

        return (bool) $this->db->table('bf_user_broker_links')->insert($payload);
    }
}
