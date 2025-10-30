<?php
namespace App\Libraries;

use Config\Services;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{APIs, Auth, SiteSettings, SocialMedia}; 
use App\Models\{BudgetModel, ExchangeModel, InvestorModel, MyMICoinModel, TrackerModel, UserModel, WalletModel}; // Assuming your models are in App\Models namespace
use App\Libraries\{BaseLoader, MyMICoin, MyMIGold, MyMIWallet};

#[\AllowDynamicProperties]
class MyMIUsers
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
        $this->MyMICoinModel = new MyMICoinModel();
        $this->trackerModel = new TrackerModel();
        // $this->userModel = new UserModel();
        $this->walletModel = new WalletModel();
        $this->MyMICoin = new MyMICoin();
        $this->MyMIGold = new MyMIGold();
        
        if ($this->debug === 1) {
            // log_message('debug', '$this->session __construct() - MyMIUser Library: ' . (print_r($this->session, true)));
        }
        
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id') ?? ($this->userModel ? $this->userModel->getUserID() : null);
        $cuID = $this->cuID;
        if (empty($this->cuID)) {
            log_message('debug', 'MyMIUsers: guest session detected; skipping authenticated hydration.');
        }
        
        if ($this->debug === 1) {
            // log_message('debug', '$this->cuID __construct() - MyMIUser Library: ' . ($this->cuID ? $this->cuID : 'null'));
        }
    }   

    // Add a public method to get cuID
    // public function getCuID() {
    //     return $this->cuID = $this->session->get('user_id');
    // }

    public function userAccountInfo($cuID)
    {
        $cuID = $this->cuID ?: ($this->userModel->getUserID() ?? $this->auth->id() ?? $this->session->get('user_id'));
    
        if (empty($cuID) || $cuID === 0) {
            log_message('info', "MyMIUser.php L64 - Invalid User ID. MyMIUser: Method userAccountInfo called with an invalid or empty user ID.");
            return null;
        }
    
        $userInfo = $this->getUserInformation($cuID);
    
        if ($userInfo === null) {
            log_message('error', "Can't retrieve User Information. MyMIUser: L233");
            return null;
        }
        if ($this->debug === 1) {
            // log_message('debug', '$userInfo array: MyMIUser L224' . print_r($userInfo, true));
        }
        // $cuEmail                            = $userInfo['cuEmail'];
        $userExchangeInfo                   = $this->getUserExchangeInfo($this->cuID);
        // $userDefaultWallet                  = $this->getDefaultWalletInfo($cuID);
        $userDefaultWallet                  = $this->getUserDefaultWalletForExisting($this->cuID);
        $userAssetSummary                   = $this->getUserAssetSummary($this->cuID);

        $lastTradeActivity				    = 'N/A';
        $depositActivity				    = 'N/A';
        $withdrawActivity				    = 'N/A';
        if (!empty($userInfo['cuFirstName'])) {
            $cuDisplayName                  = $userInfo['cuFirstName'] . ' ' . strtoupper(substr($userInfo['cuLastName'], 0, 1)) . '.';
            $cuNameInitials                 = $userInfo['cuFirstName'][0] . ' ' . strtoupper(substr($userInfo['cuLastName'][0], 0, 1));
        } else {
            // $cuDisplayName                  = $userInfo['cuUsername'];
            $cuDisplayName                  = ''; // !! ***FIX THIS*** !! //
            $cuNameInitials                 = 'N/A';
        }

        $userAccount = [
            'cuID'                          => $userInfo['cuID'],
            'cuRole'                        => $userInfo['cuRole'],
            'cuPartner'                     => $userInfo['cuPartner'],
            'cuReferrer'                    => $userInfo['cuReferrer'],
            'cuUserType'                    => $userInfo['cuUserType'],
            'cuEmail'                       => $userInfo['cuEmail'],
            'cuUsername'                    => $userInfo['cuUsername'],
            'cuDisplayName'                 => $cuDisplayName,
            'cuNameInitials'                => $cuNameInitials,
            'cuFirstName'                   => $userInfo['cuFirstName'],
            'cuMiddleName'                  => $userInfo['cuMiddleName'],
            'cuLastName'                    => $userInfo['cuLastName'],
            'cuNameSuffix'                  => $userInfo['cuNameSuffix'],
            'cuKYC'                         => $userInfo['cuKYC'],
            'cuKYCVerified'                 => $userInfo['cuKYCVerified'],
            'cuDOB'                         => $userInfo['cuDOB'],
            'cuSSN'                         => $userInfo['cuSSN'],
            'cuPhone'                       => $userInfo['cuPhone'],
            'cuAddress'                     => $userInfo['cuAddress'],
            'cuCity'                        => $userInfo['cuCity'],
            'cuState'                       => $userInfo['cuState'],
            'cuCountry'                     => $userInfo['cuCountry'],
            'cuZipCode'                     => $userInfo['cuZipCode'],
            'cuMailingAddress'              => $userInfo['cuMailingAddress'],
            'cuEmployment'                  => $userInfo['cuEmployment'],
            'cuOccupation'                  => $userInfo['cuOccupation'],
            'cuSalary'                      => $userInfo['cuSalary'],
            'cuProofIdentity'               => $userInfo['cuProofIdentity'],
            'cuProofAddress'                => $userInfo['cuProofAddress'],
            'cuUserType'                    => $userInfo['cuUserType'],
            'cuWalletID'                    => $userInfo['cuWalletID'],
            'cuPublicKey'                   => $userInfo['cuPublicKey'],
            'cuPrivateKey'                  => $userInfo['cuPrivateKey'],
            'walletID'                      => $userInfo['walletID'],
            'cuSignupDate'                  => $userInfo['cuSignupDate'],
            'cuLastLogin'                   => $userInfo['cuLastLogin'],
            'cuReferrerCode'                => $userInfo['cuReferrerCode'],
            'cuWalletCount'                 => $userDefaultWallet['cuWalletCount'],
            'cuTotalWalletCount'            => $userDefaultWallet['cuTotalWalletCount'],
            'lastTradeActivity'             => $userDefaultWallet['lastTradeActivity'],
            'depositActivity'               => $userDefaultWallet['depositActivity'],
            'withdrawActivity'              => $userDefaultWallet['withdrawActivity'],
            'walletID'                      => $userDefaultWallet['walletID'],
            'walletTitle'                   => $userDefaultWallet['walletTitle'],
            'walletBroker'                  => $userDefaultWallet['walletBroker'],
            'walletNickname'                => $userDefaultWallet['walletNickname'],
            'walletDefault'                 => $userDefaultWallet['walletDefault'],
            'walletExchange'                => $userDefaultWallet['walletExchange'],
            'walletMarketPair'              => $userDefaultWallet['walletMarketPair'],
            'walletMarket'                  => $userDefaultWallet['walletMarket'],
            'walletFunds'                   => $userDefaultWallet['walletFunds'],
            'walletInitialAmount'           => $userDefaultWallet['walletInitialAmount'],
            'walletAmount'                  => $userDefaultWallet['walletAmount'],
            'walletPercentChange'           => $userDefaultWallet['walletPercentChange'],
            'walletGains'                   => $userDefaultWallet['walletGains'],
            'depositAmount'                 => $userDefaultWallet['depositAmount'],
            'withdrawAmount'                => $userDefaultWallet['withdrawAmount'],
            'walletDepositAmount'           => $userDefaultWallet['walletDepositAmount'],
            'walletWithdrawAmount'          => $userDefaultWallet['walletWithdrawAmount'],
            'MyMICoinValue'                 => $userDefaultWallet['MyMICoinValue'],
            'MyMICCurrentValue'             => $userDefaultWallet['MyMICCurrentValue'],
            'MyMICoinSum'                   => $userDefaultWallet['MyMICoinSum'],
            'coinsExchanged'                => $userDefaultWallet['coinsExchanged'],
            'MyMIGoldValue'                 => $userDefaultWallet['MyMIGoldValue'],
            'MyMIGCurrentValue'             => $userDefaultWallet['MyMIGCurrentValue'],
            'MyMIGCoinSum'                  => $userDefaultWallet['MyMIGCoinSum'],
            'getWallets'                    => $userDefaultWallet['getWallets'],
            'assetTotalCount'               => $userAssetSummary['assetTotalCount'],
            'assetNetValue'                 => $userAssetSummary['assetNetValue'],
            'assetTotalGains'               => $userAssetSummary['assetTotalGains'],
            'open_listing_app'              => $userExchangeInfo['open_listing_app'],
        ];

        return $userAccount;
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
    
        $userCoinData = $this->getMyMICoin()->getUserCoinTotal($cuID);
        $MyMICoinValue = $this->getMyMICoin()->getCoinValue();
        $MyMICCoinSum = $userCoinData['coinSum'] ?? 0;
        $MyMICCurrentValue = $MyMICoinValue * $MyMICCoinSum;
        $MyMICPercentChange = $userCoinData['myMICPerChange'] ?? 0;
    
        $coinsExchanged = $userCoinData['coinsExchanged'] ?? 0;
    
        $userGoldData = $this->MyMIGold->getUserCoinTotal($cuID);
        $MyMIGCoinSum = $userGoldData['coinSum'] ?? 0;
        $getMyMIGoldValue = $this->MyMIGold->getCoinValue();
        $MyMIGoldValue = $getMyMIGoldValue['current_value'] ?? 1;
        $MyMIGCurrentValue = $MyMIGCoinSum * $MyMIGoldValue;
        $MyMIGPercentChange = $userGoldData['myMIGPerChange'] ?? 0;
    
        $walletFunds = $walletDepositAmount - $walletWithdrawAmount;
        $walletAmount = $walletFunds + $MyMICCurrentValue + $MyMIGCurrentValue;
        $walletPercentChange = $walletAmount > 0 ? (($walletFunds - $walletAmount) / $walletAmount * 100) + $MyMICPercentChange : $MyMICPercentChange;
    
        return [
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
            'MyMICoinValue' => $MyMICoinValue,
            'MyMICCurrentValue' => $MyMICCurrentValue,
            'MyMICCoinSum' => $MyMICCoinSum,
            'coinsExchanged' => $coinsExchanged,
            'MyMIGoldValue' => $MyMIGoldValue,
            'MyMIGCurrentValue' => $MyMIGCurrentValue,
            'MyMIGCoinSum' => $MyMIGCoinSum,
            'walletPercentChange' => $walletPercentChange,
        ];
    }
    

    public function getUserInformation($cuID)
    {
        if (empty($cuID)) {
            $cuID = $this->session->get('user_id') ?? $this->auth->id();
            if (empty($cuID)) {
                log_message('error', "Invalid User ID. MyMIUser: Method getUserInformation called with an invalid or empty user ID.");
                return null; // Return null or an appropriate response indicating failure.
            }
        }
    
        $userData = $this->userModel->getUserAccount($cuID);
        if (!$userData || !is_array($userData) || count($userData) === 0) {
            log_message('error', "Can't retrieve User Information. MyMIUser: L285");
            return null; // Return null to indicate failure in retrieving user data.
        }
    
        $userData = $userData[0];
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
            'cuPhone'                       => $userData['phone'],
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
        ];

        if ($this->debug === 1) {
            // log_message('debug', '$userInfo array - MyMI User L390: ' . print_r($userInfo, true));
        }
        return $userInfo;
    }

    public function getUserDefaultWalletForExisting($cuID) 
    {
        if (empty($this->cuID)) {
            $this->cuID                     = $this->session->get('user_id') ?? $this->auth->id();
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
        $MyMICoinValue                      = $this->MyMICoinModel->getCoinValue();
        $MyMICoinSum                        = $this->MyMICoinModel->getUserCoinTotal($this->cuID); 
        $cuTotalWalletCount                 = $getWalletCount;
        
        if ($MyMICoinSum > 0) {
            $cuTotalWalletCount         = $getWalletCount + 2;
        } elseif ($MyMICoinSum > 0) {
            $cuTotalWalletCount         = $getWalletCount + 2;
        } elseif ($MyMICoinSum > 0 || $MyMIGCoinSum > 0) {
            $cuTotalWalletCount         = $getWalletCount + 3;
        } else {
            $cuTotalWalletCount         = $getWalletCount;
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

    // Inside MyMIUser.php, modify the getUserAssetSummary method to properly handle non-array values:

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
}
