<?php

namespace App\Modules\Exchange\Controllers;

use App\Controllers\BaseController;
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIAnalytics, MyMIBudget, MyMIDashboard, MyMIReferrals, MyMIUser, MyMIWallets};
use App\Models\{AnalyticalModel, APIModel, AnnouncementsModel, ExchangeModel, MarketingModel, MyMIGoldModel, TrackerModel, WalletModel};
use App\Services\{BudgetService, DashboardService, ExchangeService, GoalTrackingService, SolanaService, UserService};
use DateTime;
use CodeIgniter\API\ResponseTrait;
use Psr\Log\LoggerInterface;

#[\AllowDynamicProperties]
class ExchangeController extends UserController
{
    protected $auth;
    protected $db;
    protected $email;
    protected $exchange;
    protected $helpers = ['directory', 'form', 'file', 'url'];
    protected $request; 
    protected $session; 
    protected $siteSettings; 
    protected $uri; 
    protected $alphavantageKey;
    protected $cache;
    protected $curlRequest;
    protected $logger;
    protected $exchangeModel;
    protected $walletModel;
    protected $budgetService;
    protected $dashboardService;
    protected $exchangeService;
    protected $goalTrackingService;
    protected $solanaService;
    protected $userService;
    protected $walletService;
    protected $MyMIDashboard;

    public function __construct()
    {
        parent::__construct();
        $this->auth = service('authentication');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug; 
        

        $this->budgetService = new BudgetService(); 
        $this->dashboardService = new DashboardService();
        $this->exchangeService = new ExchangeService();
        $this->goalTrackingService = new GoalTrackingService();
        $this->solanaService  = new SolanaService();
        $this->exchangeModel = new ExchangeModel();
        $this->walletModel = new WalletModel();
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter 

        $this->alphavantageKey = config('APISettings')->alphaVantageApiKey;
        $this->cache = cache();
        $this->curlRequest = service('curlrequest');
        $this->logger = service('logger');

        // Initialize UserService, WalletService and pass required dependencies
        $this->cuID = getCuID();  // Assuming getCuID() is a helper or service
        $this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());

        $this->walletService = new \App\Services\WalletService($this->logger, $this->walletModel);
    }

    public function commonData(): array
    {
        $this->data = parent::commonData();
        // Fetch data from UserService
        $userData = $this->getuserService()->commonData(); 
        // Merge the user data with BudgetController data
        $this->data = array_merge($this->data, $userData);       

        // Dashboard Info
        $dashboardInfo = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        $this->data['completedGoals'] = $dashboardInfo['progressGoalData']['completions'];
        // log_message('debug', 'DashboardController L104 - $pendingGoals - $dashboardInfo[progressGoalData][goals]: ' . (print_r($dashboardInfo['progressGoalData']['goals'], true)));
        $this->data['pendingGoals'] = $dashboardInfo['progressGoalData']['goals'];
        $this->data['promotionalBanners'] = $dashboardInfo['promotionalBanners'];
    
    
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['debug'] = $this->siteSettings->debug;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        $this->data['date'] = $this->siteSettings->date;
        $this->data['time'] = $this->siteSettings->time;
        $this->data['cuID'] = $this->cuID;

        // Additional dynamic data from the service
        $this->data['getFeatures'] = $this->getMyMIDashboard()->getFeatures();
        $this->data['totalAccountBalance'] = $this->getBudgetService()->getTotalAccountBalance($this->cuID);
        $this->data['completedGoals'] = $this->getGoalTrackingService()->getCompletedGoals($this->cuID);
        $this->data['pendingGoals'] = $this->getGoalTrackingService()->getPendingGoals($this->cuID);
        $this->data['promotionalBanners'] = $this->getDashboardService()->getPromotionalBanners($this->cuID);
        $this->data['userBudget'] = $this->getBudgetService()->getUserBudget($this->cuID);
        $this->data['userWallets'] = $this->getWalletService()->getUserWallets($this->cuID);

        // Fetch Solana data
        $userSolanaData = $this->getSolanaService()->getSolanaData($this->cuID);
        $this->data['cuSolanaDW'] = $userSolanaData['userSolanaWallets']['cuSolanaDW'] ?? null;
        // Ensure Solana network status exists to avoid "Undefined array key"
        try {
            if (!isset($this->solanaService)) {
                $this->solanaService = service('solanaService'); // or however you DI it
            }
            $data['solanaNetworkStatus'] = $this->solanaService->getNetworkStatus();
        } catch (\Throwable $e) {
            log_message('error', 'WalletsController getNetworkStatus failed: {msg}', ['msg' => $e->getMessage()]);
            $data['solanaNetworkStatus'] = [
                'healthy' => false,
                'slot'    => null,
                'version' => null,
                'error'   => $e->getMessage(),
            ];
        }
        $this->data['cuSolanaTotal'] = $userSolanaData['userSolanaWallets']['cuSolanaTotal'] ?? 0;
        $this->data['cuSolanaValue'] = $userSolanaData['userSolanaWallets']['cuSolanaValue'] ?? 0;
        return $this->data;
}

    public function index() {
        $this->data['pageTitle'] = 'Solana Exchange | MyMI Wallet | The Future of Finance';
        $this->data['getExchanges'] = $this->exchangeService->getExchanges(); 
        $this->commonData();

        // // Check URI segment to determine if real-time data is needed
        // $segment1 = $this->uri->getSegment(1);
        // $segment2 = $this->uri->getSegment(2);

        // if ($segment1 === 'Exchange' || $segment2 === 'Exchange') {
        //     $this->fetchRealTimeData();
        // }
        // $this->fetchRealTimeData();
        return $this->renderTheme('App\Modules\Exchange\Views\index', $this->data);
    }

    public function dashboard()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('templates/header', $data);
        echo view('exchange/dashboard', $data);
        echo view('templates/footer');
    }

    public function applicationManager()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('exchange/application_manager', $data);
    }

    public function coinListingRequest()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('templates/header', $data);
        echo view('exchange/coin_listing_request', $data);
        echo view('templates/footer');
    }

    public function coinListingAssetInformation()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('templates/header', $data);
        echo view('exchange/coin_listing_asset_information', $data);
        echo view('templates/footer');
    }

    public function coinListingAssetInformationModal()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('templates/header', $data);
        echo view('exchange/coin_listing_asset_information_modal', $data);
        echo view('templates/footer');
    }

    public function coinListingRequestComplete()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('templates/header', $data);
        echo view('exchange/coin_listing_request_complete', $data);
        echo view('templates/footer');
    }

    public function orderEventManager($market_pair, $market, $lastOrderID)
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('exchange/order_event_manager', $data);
    }

    public function orderBuyManager()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('exchange/order_buy_manager', $data);
    }

    public function orderSellManager()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('exchange/order_sell_manager', $data);
    }

    public function orderEventManagerWorking($market_pair, $market, $lastOrderID)
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('exchange/order_event_manager', $data);
    }

    public function overview($market_pair, $market)
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Home'
        ];
        
        echo view('templates/header', $data);
        echo view('exchange/overview', $data);
        echo view('templates/footer');
    }

    public function orderFetch()
    {
        $data = [
            'month' => $this->request->getPost('month'),
            'day' => $this->request->getPost('day'),
            'year' => $this->request->getPost('year'),
            'time' => $this->request->getPost('time'),
            'trade_type' => $this->request->getPost('trade_type'),
            'beta' => $this->request->getPost('beta'),
            'user_id' => $this->request->getPost('user_id'),
            'user_email' => $this->request->getPost('user_email'),
            'wallet_id' => $this->request->getPost('wallet_id'),
            'market_pair' => $this->request->getPost('market_pair'),
            'market' => $this->request->getPost('market'),
            'initial_value' => $this->request->getPost('initial_value'),
            'coin_value' => $this->request->getPost('coin_value'),
            'available_coins' => $this->request->getPost('available_coins'),
            'amount' => $this->request->getPost('buy_amount'),
            'minimum_purchase' => $this->request->getPost('minimum_purchase'),
            'total' => $this->request->getPost('buy_total'),
            'gas_fee' => $this->request->getPost('buy_user_gas_fee'),
            'fees' => $this->request->getPost('buy_fees'),
            'trans_percent' => $this->request->getPost('buy_trans_percent'),
            'trans_fee' => $this->request->getPost('buy_trans_fee'),
            'total_cost' => $this->request->getPost('buy_total_cost'),
            'current_value' => $this->request->getPost('initial_value') + $this->request->getPost('buy_amount'),
            'new_availability' => $this->request->getPost('available_coins') - $this->request->getPost('buy_total'),
            'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('buy_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('buy_total'))
        ];

        if ($this->exchangeModel->addOrder($data)) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/dashboard')->with('error', 'Order Could Not Be Submitted!');
        }
    }

    public function buy()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Investment_Request_Coins'
        ];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'amount' => 'required|greater_than_equal_to[5]'
        ])) {
            $formData = [
                'redirectURL' => $this->request->getPost('redirectURL'),
                'month' => $this->request->getPost('month'),
                'day' => $this->request->getPost('day'),
                'year' => $this->request->getPost('year'),
                'time' => $this->request->getPost('time'),
                'trade_type' => $this->request->getPost('trade_type'),
                'beta' => $this->request->getPost('beta'),
                'user_id' => $this->request->getPost('user_id'),
                'user_email' => $this->request->getPost('user_email'),
                'wallet_id' => $this->request->getPost('wallet_id'),
                'market_pair' => $this->request->getPost('market_pair'),
                'market' => $this->request->getPost('market'),
                'initial_value' => $this->request->getPost('initial_value'),
                'coin_value' => $this->request->getPost('coin_value'),
                'available_coins' => $this->request->getPost('available_coins'),
                'amount' => $this->request->getPost('buy_amount'),
                'minimum_purchase' => $this->request->getPost('minimum_purchase'),
                'total' => $this->request->getPost('buy_total'),
                'gas_fee' => $this->request->getPost('buy_user_gas_fee'),
                'fees' => $this->request->getPost('buy_fees'),
                'trans_percent' => $this->request->getPost('buy_trans_percent'),
                'trans_fee' => $this->request->getPost('buy_trans_fee'),
                'total_cost' => $this->request->getPost('buy_total_cost'),
                'current_value' => $this->request->getPost('initial_value') + $this->request->getPost('buy_amount'),
                'new_availability' => $this->request->getPost('available_coins') - $this->request->getPost('buy_total'),
                'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('buy_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('buy_total'))
            ];

            $redirectURL = (string) ($this->request->getPost('redirectURL') ?? '');
            $fallback    = '/dashboard';

            if ($this->exchangeModel->addOrder($formData)) {
                return redirect_to_safe($redirectURL !== '' ? $redirectURL : null, $fallback)
                    ->with('success', 'Order Submitted Successfully');
            }

            return redirect_to_safe($redirectURL !== '' ? $redirectURL : null, $fallback)
                ->with('error', 'Order Could Not Be Submitted!');
        } else {
            return redirect()->to('/dashboard')->with('error', 'Amount Must Be Larger Than Minimum Requirement');
        }
    }

    public function sell()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Investment_Request_Coins'
        ];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'amount' => 'required|greater_than_equal_to[5]'
        ])) {
            $formData = [
                'redirectURL' => $this->request->getPost('redirectURL'),
                'month' => $this->request->getPost('month'),
                'day' => $this->request->getPost('day'),
                'year' => $this->request->getPost('year'),
                'time' => $this->request->getPost('time'),
                'trade_type' => $this->request->getPost('trade_type'),
                'beta' => $this->request->getPost('beta'),
                'user_id' => $this->request->getPost('user_id'),
                'user_email' => $this->request->getPost('user_email'),
                'wallet_id' => $this->request->getPost('wallet_id'),
                'market_pair' => $this->request->getPost('market_pair'),
                'market' => $this->request->getPost('market'),
                'initial_value' => $this->request->getPost('initial_value'),
                'coin_value' => $this->request->getPost('coin_value'),
                'available_coins' => $this->request->getPost('available_coins'),
                'amount' => $this->request->getPost('sell_amount'),
                'minimum_purchase' => $this->request->getPost('minimum_purchase'),
                'total' => $this->request->getPost('sell_total'),
                'gas_fee' => $this->request->getPost('sell_user_gas_fee'),
                'fees' => $this->request->getPost('sell_fees'),
                'trans_percent' => $this->request->getPost('sell_trans_percent'),
                'trans_fee' => $this->request->getPost('sell_trans_fee'),
                'total_cost' => $this->request->getPost('sell_total_cost'),
                'current_value' => $this->request->getPost('initial_value') + $this->request->getPost('sell_amount'),
                'new_availability' => $this->request->getPost('available_coins') - $this->request->getPost('sell_total'),
                'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('sell_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('sell_total'))
            ];

            $redirectURL = (string) ($this->request->getPost('redirectURL') ?? '');
            $fallback    = '/dashboard';

            if ($this->exchangeModel->addOrder($formData)) {
                return redirect_to_safe($redirectURL !== '' ? $redirectURL : null, $fallback)
                    ->with('success', 'Order Submitted Successfully');
            }

            return redirect_to_safe($redirectURL !== '' ? $redirectURL : null, $fallback)
                ->with('error', 'Order Could Not Be Submitted!');
        } else {
            return redirect()->to('/dashboard')->with('error', 'Amount Must Be Larger Than Minimum Requirement');
        }
    }

    public function accountInformation()
    {
        $data = [
            'pageType' => 'Automated',
            'pageName' => 'Account_Information'
        ];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'url_link' => 'trim',
            'subpage_name' => 'trim',
            'subpage_link' => 'trim',
            'subpage_icon' => 'trim'
        ])) {
            $formData = [
                'kyc' => 'Yes',
                'user_id' => $this->request->getPost('user_id'),
                'email' => $this->request->getPost('user_email'),
                'username' => $this->request->getPost('user_username'),
                'first_name' => $this->request->getPost('first_name'),
                'middle_name' => $this->request->getPost('middle_name'),
                'last_name' => $this->request->getPost('last_name'),
                'name_suffix' => $this->request->getPost('name_suffix'),
                'phone' => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
                'city' => $this->request->getPost('city'),
                'state' => $this->request->getPost('state'),
                'country' => $this->request->getPost('country'),
                'zipcode' => $this->request->getPost('zipcode'),
                'timezones' => $this->request->getPost('timezones'),
                'language' => $this->request->getPost('language'),
                'advertisement' => $this->request->getPost('advertisement')
            ];

            if ($this->exchangeModel->addAccountInformation($formData)) {
                return redirect()->to('/exchange/kyc_registration_reward/' . $formData['user_id'])->with('success', 'Account Information Updated Successfully');
            } else {
                return redirect()->to('/exchange/account_information')->with('error', 'Submission Unsuccessful');
            }
        } else {
            echo view('exchange/account_information', $data);
        }
    }

    public function kycReward($cuID)
    {
        $userInfo = $this->exchangeModel->getUserInfo($cuID)->getRowArray();
        $coinValue = $this->exchangeModel->getCoinValue()->getRowArray();

        $formData = [
            'status' => 'Complete',
            'cuBeta' => $userInfo['type'] === 'Beta' ? 'Yes' : 'No',
            'cuID' => $cuID,
            'cuEmail' => $userInfo['email'],
            'cuWalletID' => $userInfo['wallet_id'],
            'reward' => 'Yes',
            'reward_type' => 'KYC',
            'initial_value' => $coinValue['current_value'],
            'current_value' => $coinValue['current_value'],
            'available_coins' => $coinValue['new_availability'],
            'new_availability' => $coinValue['new_availability'] - 10000,
            'initial_coin_value' => $coinValue['coin_value'],
            'coin_value' => round($coinValue['current_value'] / ($coinValue['new_availability'] - 10000), 8),
            'amount' => 0,
            'total' => 10000,
            'total_cost' => 0,
            'gas_fee' => 0,
            'trans_fee' => 0,
            'trans_percent' => 0
        ];

        if ($this->exchangeModel->kycReward($formData) && $this->exchangeModel->addReward($formData)) {
            return redirect()->to('/exchange')->with('success', 'Account Information Submitted Successfully');
        } else {
            return redirect()->to('/exchange')->with('error', 'Reward Not Submitted');
        }
    }

    public function updateOrder()
    {
        $id = $this->request->getPost('id');
        $field = $this->request->getPost('field');
        $value = $this->request->getPost('value');

        $this->exchangeModel->updateOrders($id, $field, $value);

        echo 1;
        exit;
    }

    // User Profile Management
    public function verifyUser()
    {
        $user_id = session()->get('user_id');
        $this->exchangeModel->verifyUser($user_id);
    }

    // Asset Management
    // public function createAsset()
    // {
    //     $data = [
    //         'user_id' => session()->get('user_id'),
    //         'asset_name' => $this->request->getPost('asset_name'),
    //         'asset_description' => $this->request->getPost('asset_description'),
    //         'asset_price' => $this->request->getPost('asset_price')
    //     ];
    //     $this->exchangeModel->createAsset($data);
    // }
    public function createToken() {
        $data = $this->request->getPost();
        
        // Validate input
        if (!$this->validate([
            'token_name' => 'required',
            'token_symbol' => 'required',
            'token_supply' => 'required|numeric',
            'blockchain' => 'required',
            'admin_wallet' => 'required',
        ])) {
            return redirect()->back()->with('error', 'Validation failed. Please provide all required fields.');
        }
    
        $tokenName = $data['token_name'];
        $tokenSymbol = $data['token_symbol'];
        $tokenSupply = $data['token_supply'];
        $blockchain = $data['blockchain'];
        $adminWallet = $data['admin_wallet'];
    
        try {
            // Interact with Solana library for token creation
            if ($blockchain === 'solana') {
                $solana = new \App\Libraries\MyMISolana();
                $privateKey = 'your_private_key_here'; // Retrieve securely
                $createToken = $solana->createSPLToken($privateKey, 9);
    
                if ($createToken['status'] !== 'success') {
                    throw new \Exception('Token creation failed: ' . $createToken['message']);
                }
    
                $mintAddress = $createToken['tokenAddress'];
                $mintResult = $solana->mintTokens($privateKey, $mintAddress, $tokenSupply);
    
                if ($mintResult['status'] !== 'success') {
                    throw new \Exception('Minting tokens failed: ' . $mintResult['message']);
                }
            } else {
                // Placeholder for other blockchain integrations
                throw new \Exception('Unsupported blockchain: ' . $blockchain);
            }
    
            // Save token to bf_exchanges_assets
            $this->exchangeModel->insert([
                'active' => '1',
                'status' => 'approved',
                'unix_timestamp' => time(),
                'blockchain' => $blockchain,
                'blockchain_name' => ucfirst($blockchain),
                'symbol' => $tokenSymbol,
                'coin_name' => $tokenName,
                'coin_address' => $mintAddress,
                'coin_quantity' => $tokenSupply,
                'initial_value' => 1, // Default value
                'purpose' => 'In-App Transactions',
                'description' => "Token for in-app services",
                'decimals' => '9',
                'dex_swap_name' => 'MyMI Gold',
                'dex_swap_symbol' => $tokenSymbol,
                'dex_swap_address' => $mintAddress,
                'user_id' => $this->auth->id(),
                'user_email' => $this->session->get('user_email'),
            ]);
    
            return redirect()->back()->with('success', 'Token created and saved successfully.');
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function createAsset()
    {
        $data = [
            'listing_type' => $this->request->getPost('listing_type'),
            'blockchain_id' => $this->request->getPost('blockchain_id'),
            'blockchain' => $this->request->getPost('blockchain'),
            'blockchain_name' => $this->request->getPost('blockchain_name'),
            'symbol' => $this->request->getPost('symbol'),
            'coin_name' => $this->request->getPost('coin_name'),
            'coin_quantity' => $this->request->getPost('coin_quantity'),
            'initial_value' => $this->request->getPost('initial_value'),
            'purpose' => $this->request->getPost('purpose'),
            'description' => $this->request->getPost('description'),
            'coin_file' => $this->request->getPost('coin_file'),
            'coin_logo' => $this->request->getPost('coin_logo')
        ];

        if ($this->exchangeModel->insert($data)) {
            return redirect()->to('/exchange/success');
        } else {
            return redirect()->to('/exchange/failure');
        }
    }

    public function updateAsset()
    {
        $asset_id = $this->request->getPost('asset_id');
        $data = [
            'asset_name' => $this->request->getPost('asset_name'),
            'asset_description' => $this->request->getPost('asset_description'),
            'asset_price' => $this->request->getPost('asset_price')
        ];
        $this->exchangeModel->updateAsset($asset_id, $data);
    }

    public function deleteAsset()
    {
        $asset_id = $this->request->getPost('asset_id');
        $this->exchangeModel->deleteAsset($asset_id);
    }

    // Order Management
    public function createOrder()
    {
        $data = [
            'user_id' => session()->get('user_id'),
            'asset_id' => $this->request->getPost('asset_id'),
            'order_type' => $this->request->getPost('order_type'),
            'order_price' => $this->request->getPost('order_price'),
            'order_quantity' => $this->request->getPost('order_quantity')
        ];
        $this->exchangeModel->createOrder($data);
    }

    public function updateOrderNews()
    {
        $order_id = $this->request->getPost('order_id');
        $data = [
            'order_type' => $this->request->getPost('order_type'),
            'order_price' => $this->request->getPost('order_price'),
            'order_quantity' => $this->request->getPost('order_quantity')
        ];
        $this->exchangeModel->updateOrder($order_id, $data);
    }

    public function deleteOrder()
    {
        $order_id = $this->request->getPost('order_id');
        $this->exchangeModel->deleteOrder($order_id);
    }

    // Trade Execution
    public function executeTrade()
    {
        $order_id = $this->request->getPost('order_id');
        $this->exchangeModel->executeTrade($order_id);
    }

    // Reporting
    public function reportTransactions()
    {
        $transactions = $this->exchangeModel->getAllTransactions();
        // Here you can generate a report based on the $transactions data
    }

    public function viewUserTrades()
    {
        $user_id = session()->get('user_id');
        $trades = $this->exchangeModel->getTradesForUser($user_id);
        // Here you can generate a report based on the $trades data
    }

    // Security
    public function enable2fa()
    {
        $user_id = session()->get('user_id');
        $this->exchangeModel->enable2fa($user_id);
    }

    public function disable2fa()
    {
        $user_id = session()->get('user_id');
        $this->exchangeModel->disable2fa($user_id);
    }

    public function alertSuspiciousActivity()
    {
        $user_id = session()->get('user_id');
        $this->exchangeModel->alertSuspiciousActivity($user_id);
    }

    // Fetch Stock Data with Caching
    public function fetchStockData($symbol)
    {
        $cacheKey = "stock_data_{$symbol}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $this->cache->get($cacheKeySanitized);

        if ($cachedData) {
            return $this->respond(['status' => 'success', 'data' => $cachedData]);
        }

        // Push task to queue if available or process immediately
        if (service('queue')) {
            service('queue')->push(function () use ($symbol, $cacheKey) {
                $data = $this->makeAlphaVantageAPICall("TIME_SERIES_DAILY", $symbol);
                $this->cache->save($cacheKeySanitized, $data, 3600);
            });
            return $this->respond(['status' => 'processing', 'message' => 'Data is being fetched.']);
        } else {
            // If no queue service, process immediately
            $data = $this->makeAlphaVantageAPICall("TIME_SERIES_DAILY", $symbol);
            $this->cache->save($cacheKeySanitized, $data, 3600);
            return $this->respond(['status' => 'success', 'data' => $data]);
        }
    }

    // Helper method to call AlphaVantage API
    private function makeAlphaVantageAPICall($function, $symbol)
    {
        $url = "https://www.alphavantage.co/query?function={$function}&symbol={$symbol}&apikey={$this->alphavantageKey}";
        $response = $this->curlRequest->get($url);

        if ($response->getStatusCode() !== 200) {
            $this->logger->error("AlphaVantage API error with status " . $response->getStatusCode());
            return ['error' => 'Unable to retrieve data from AlphaVantage API.'];
        }

        $data = json_decode($response->getBody(), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->logger->error("AlphaVantage API returned invalid JSON");
            return ['error' => 'Invalid JSON response from AlphaVantage API.'];
        }

        return $data;
    }

    // Fetch real-time price data for a specific stock or cryptocurrency symbol
    public function fetchRealTimePrice($symbol)
    {
        $cacheKey = "real_time_price_{$symbol}";
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedData = $this->cache->get($cacheKeySanitized);

        if ($cachedData) {
            return $this->respond(['status' => 'success', 'price' => $cachedData]);
        }

        $data = $this->makeAlphaVantageAPICall("GLOBAL_QUOTE", $symbol);
        $price = $data['Global Quote']['05. price'] ?? null;

        if ($price) {
            $this->cache->save($cacheKeySanitized, $price, 60);  // Cache for 1 minute
            return $this->respond(['status' => 'success', 'price' => $price]);
        }

        return $this->fail('Unable to fetch real-time price data');
    }
}
