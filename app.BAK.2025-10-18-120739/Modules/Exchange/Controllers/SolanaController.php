<?php namespace App\Modules\Exchange\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Authorization\GroupModel;
use App\Config\{Auth, SiteSettings};
use Config\Services;
use App\Controllers\UserController;
use App\Libraries\{MyMIBudget, MyMICoin, MyMIDashboard, MyMIDexScreener, MyMIExchange, MyMIGold, MyMIMetaMask, MyMIPhantom, MyMIRaydium, MyMISolana, MyMISolflare, MyMITrustWallet, MyMIUser, MyMIWallets, SafeProcess, WebSocketClient};
use App\Models\{AccountsModel, APIModel, ExchangeModel, SolanaModel, TokenModel, UserModel, WalletModel};
use App\Services\{SolanaService};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\API\RequestTrait;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\IncomingRequest;

class SolanaController extends UserController {
    protected $auth;
    protected $db;
    protected $email;
    protected $exchange;
    protected $helpers = ['auth', 'form', 'url'];
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $uri;
    protected $MyMIBudget;
    protected $MyMICoin;
    protected $MyMIDashboard;
    protected $MyMIDexScreener;
    protected $MyMIGold;
    protected $MyMIExchange;
    protected $MyMIMetaMask;
    protected $MyMIPhantom;
    protected $MyMIRaydium;
    protected $MyMISolana;
    protected $MyMISolflare;
    protected $MyMITrustWallet;
    protected $MyMIUser;
    protected $MyMIWallets;
    protected $dexScreener;
    protected $APIModel;
    protected $accountsModel;
    protected $exchangeModel;
    protected $solanaModel;
    protected $tokenModel;
    protected $usersModel;
    protected $walletModel;
    protected $solanaService;
    protected $userBudget;
    protected $userDashboard;
    protected $userWallets;
    protected $webSocketClient;
    protected $userAccount;

    public function __construct() {
        $this->db = \Config\Database::connect();
        $this->auth = service('authentication');
        $this->db = \Config\Database::connect();
        $this->email = \Config\Services::email();
        $this->exchange = 'Solana';
        $this->request = service('request');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug; 
        $this->uri = $this->request->getUri(); 
//         $this->MyMIBudget = new MyMIBudget(); // replaced by BaseController getter
//         $this->MyMICoin = new MyMICoin(); // replaced by BaseController getter
        // $this->MyMIDashboard = new MyMIDashboard();
        // $this->dexScreener = new MyMIDexScreener($this->db);
        // $this->MyMIExchange = new MyMIExchange();
        // $this->MyMIGold = new MyMIGold();
        // $this->MyMIMetaMask = new MyMIMetaMask();
        // $this->MyMIPhantom = new MyMIPhantom();
        // $this->MyMIRaydium = new MyMIRaydium();
        $this->MyMISolana = new MyMISolana(); // replaced by BaseController getter
        // $this->MyMISolflare = new MyMISolflare();
        // $this->MyMITrustWallet = new MyMITrustWallet();
        // $this->MyMIUser = new MyMIUser();
        // $this->MyMIWallets = new MyMIWallets();
        $this->accountsModel = new AccountsModel();
        $this->exchangeModel = new ExchangeModel();
        $this->solanaModel = new SolanaModel();
        $this->tokenModel = new TokenModel();
        $this->usersModel = new UserModel();
        $this->walletModel = new WalletModel();
        $this->solanaService = $this->solanaService ?? new \App\Services\SolanaService();
        
        // $this->webSocketClient = new WebSocketClient('api.mainnet-beta.solana.com', 443); // Change host and port as necessary
        // $this->webSocketClient = new WebSocketClient('www.mymiwallet.com', 443, 'API/Solana/updatePrices'); // Change host and port as necessary
        // $this->userBudget = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID);
        // $this->userDashboard = $this->getMyMIDashboard()->dashboardInfo($this->cuID);
        // $this->userWallets = $this->MyMIWallets->getUserWallets($this->cuID);
        // $this->userSolana = $this->MyMISolana->getUserSolana($this->cuID);
    }

    public function commonData(): array {
        $this->data = parent::commonData();
        // Assign cuID early
        $this->cuID = $this->auth->id() ?? $this->session->get('user_id');
        $this->userAccount = $this->getMyMIUser()->getUserInformation($this->cuID);
        $userBudget = $this->getMyMIBudget()->getUserBudget($this->cuID); 
        log_message('info', 'DashboardController L72 - $checkingSummary: ' . $userBudget['checkingSummary']);
        $this->data['checkingSummary'] = $userBudget['checkingSummary'];
        $userWallets                                = $this->userWallets;
        $this->data['request']                      = $this->request;
        $this->data['siteSettings']                 = $this->siteSettings;
        $this->data['beta']                         = (string) $this->siteSettings->beta;
        $this->data['uri']                          = $this->request->getUri();
        $this->data['userAgent']                    = $this->request->getUserAgent();
        $this->data['cuID']                         = $this->cuID;
        $this->data['cuRole']                       = $this->getMyMIUser()->getUserInformation($this->cuID)['cuRole'];
        $this->data['cuUserType']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUserType'] ?? '';
        $this->data['cuEmail']                      = $this->getMyMIUser()->getUserInformation($this->cuID)['cuEmail'];
        $this->data['cuUsername']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuUsername'];
        $this->data['cuDisplayName']                = $this->getMyMIUser()->getUserInformation($this->cuID)['cuDisplayName'] ?? '';
        $this->data['cuNameInitials']               = $this->getMyMIUser()->getUserInformation($this->cuID)['cuNameInitials'] ?? '';
        $this->data['cuWalletID']                   = $this->getMyMIUser()->getUserInformation($this->cuID)['cuWalletID'] ?? '';
        $this->data['cuKYC']                        = $this->getMyMIUser()->getUserInformation($this->cuID)['cuKYC'] ?? 'N/A';
        $this->data['cuSolanaDW']                   = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaDW'] ?? 'N/A';
        $this->data['cryptoPT']                     = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaDW']['public_token'] ?? 'N/A';
        // $this->data['cuSolanaTotal']                = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaTotal'];
        // $this->data['cuSolanaValue']                = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaValue'];
        // $this->data['cuSolanaPercentage']           = $this->MyMISolana->getUserSolana($this->cuID)['cuSolanaPercentage'];
        $this->data['solanaTokens']                 = $this->solanaModel->getTopListedTokens();
        // $this->data['solanaPrice']                  = $this->MyMISolana->getUserSolana($this->cuID)['solanaPrice'];
        // $this->data['solanaMTDPL']                  = $this->MyMISolana->getUserSolana($this->cuID)['solanaMTDPL'];
        // $this->data['solanaDailyPL']                = $this->MyMISolana->getUserSolana($this->cuID)['solanaDailyPL'];
        // $this->data['solanaHourlyPL']               = $this->MyMISolana->getUserSolana($this->cuID)['solanaHourlyPL'];
        // $this->data['solanaMarketCap']              = $this->MyMISolana->getUserSolana($this->cuID)['solanaMarketCap'];
        // $this->data['solanaDailyVolume']            = $this->MyMISolana->getUserSolana($this->cuID)['solanaDailyVolume'];
        // $this->data['solanaHourlyVolume']           = $this->MyMISolana->getUserSolana($this->cuID)['solanaHourlyVolume'];
        // $this->data['solanaNetworkStatus']          = $this->MyMISolana->getNetworkStatus();
        $this->data['completedGoals']               = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['completions'];
        $this->data['pendingGoals']                 = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['progressGoalData']['goals'];
        $this->data['cuPFBT']                       = 'N/A';
        $this->data['MyMICoinSum']                  = $this->getMyMICoin()->getUserCoinTotal($this->cuID);
        $this->data['totalAccountBalance']          = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalance'];
        $this->data['totalAccountBalanceFMT']       = $this->getMyMIBudget()->allUserBudgetInfo($this->cuID)['totalAccountBalanceFMT'];
        $this->data['promotionalBanners']           = $this->getMyMIDashboard()->dashboardInfo($this->cuID)['promotionalBanners'];
        if ($this->debug === 1) {
            // log_message('debug', 'SolanaController L150 - $this->userSolana ' . print_r($this->userSolana, true));
        }
        if (($this->uri->getTotalSegments() >= 4)) {
            $exchange                               = $this->exchange; 
            $tokenSymbol                            = $this->uri->getSegment(4);
            $this->data['cryptoTokens']             = $this->getMyMIDashboard()->getTokenDetails($exchange, $tokenSymbol);
        } else { 
            // $exchange                               = $this->exchange; 
            // $this->data['cryptoTokens']             = $this->getMyMIDashboard()->getAllTokensByBlock($exchange);
        }
        return $this->data;
}

    private function currentUserId(): int
    {
        return (int) ($this->cuID ?? $this->session->get('cuID') ?? $this->session->get('user_id') ?? 0);
    }

    public function index() {
        $this->data['pageTitle'] = 'Solana Exchange | MyMI Wallet | The Future of Finance';
        $this->commonData();

        // // Check URI segment to determine if real-time data is needed
        // $segment1 = $this->uri->getSegment(1);
        // $segment2 = $this->uri->getSegment(2);

        // if ($segment1 === 'Exchange' || $segment2 === 'Exchange') {
        //     $this->fetchRealTimeData();
        // }
        // $this->fetchRealTimeData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\index', $this->data);
    }

    public function addExternalWallet()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['ok'=>false,'msg'=>'AJAX only']);
        }
        $cuID = (int)($this->cuID ?? session('cuID') ?? 0);
        if ($cuID <= 0) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'msg'=>'Auth required']);

        $addr  = trim((string)$this->request->getPost('address'));
        $label = trim((string)$this->request->getPost('label'));

        $svc = service('solanaService');
$addr = $svc->normalizeAddress($row);
        if (!$addr || !$svc->isValidPublicKey($addr)) {
            return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'msg'=>'Invalid Solana address']);
        }

        try {
            $id = model(\App\Models\SolanaModel::class)->addNonCustodialAddress($cuID, $addr, $label ?: 'External Solana Wallet');
            return $this->response->setJSON(['ok'=>true,'id'=>$id,'address'=>$addr,'label'=>$label]);
        } catch (\Throwable $e) {
            log_message('error','addExternalWallet: '.$e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'msg'=>'Failed to add address']);
        }
    }

    public function setDefaultWallet()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['ok'=>false,'msg'=>'AJAX only']);
        }
        $cuID = (int)($this->cuID ?? session('cuID') ?? 0);
        if ($cuID <= 0) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'msg'=>'Auth required']);

        $id = (int)$this->request->getPost('id');
        if ($id <= 0) return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'msg'=>'Missing id']);

        try {
            $ok = model(\App\Models\SolanaModel::class)->setDefaultAddress($cuID, $id);
            if ($ok) {
                $row = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
                if ($row && isset($row['address'])) {
                    session()->set('solana_public_key', $row['address']);
                }
            }
            return $this->response->setJSON(['ok'=>$ok]);
        } catch (\Throwable $e) {
            log_message('error','setDefaultWallet: '.$e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'msg'=>'Failed to set default']);
        }
    }

    public function apiGetTokens() {
        $tokens = $this->db->table('bf_exchanges_assets')->where('blockchain', 'SOL')->get()->getResultArray();
        return $this->response->setJSON($tokens);
    }

    public function assets() {
        $this->data['pageTitle'] = 'My Solana Assets | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\assets', $this->data);
    }
    
    private function calculateSwapFees($amount) {
        $applicationFee = 0.01 * $amount; // 1% application fee
        $gasFee = 0.0005;                 // Fixed gas fee
        return $applicationFee + $gasFee;
    }
    
    private function calculateTransactionFees($amount, $fromPrice) {
        $networkFeeRate = floatval($this->siteSettings->gasFee);
        $platformTradingFeeRate = floatval($this->siteSettings->transFee);
        $serviceFeeRate = floatval($this->siteSettings->transPercent);
    
        return ($amount * $fromPrice * $platformTradingFeeRate) +
               ($amount * $serviceFeeRate) +
               ($amount * $networkFeeRate);
    }

    public function coinSwap() {
        $this->data['pageTitle'] = 'Solana Coin Swap | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\swap', $this->data);
    }

    public function connectWallet() {
        $walletType = $this->request->getPost('wallet_type');
        switch ($walletType) {
            case 'solflare':
                $response = $this->MyMISolflare->connectWallet();
                break;
            case 'phantom':
                $response = $this->MyMIPhantom->connectWallet();
                break;
            case 'metamask':
                $response = $this->MyMIMetaMask->connectWallet();
                break;
            case 'trustwallet':
                $response = $this->MyMITrustWallet->connectWallet();
                break;
            default:
                $response = ['status' => 'error', 'message' => 'Invalid wallet type'];
                break;
        }
        return $this->response->setJSON($response);
    }

    public function create() {
        $this->data['pageTitle'] = 'Create With Solana | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\create', $this->data);
    }

    public function createSolanaWallet() {
        $getUserDefaultSolana = $this->solanaModel->getUserDefaultSolana($this->cuID);
        $defaultWallet = empty($getUserDefaultSolana) ? 'Yes' : 'No';

        if ($this->request->getMethod() == 'POST') {
            try {
                $wallet = $this->MyMISolana->generateWallet();
                $publicKey = $wallet['publicKey'];
                $privateKey = $wallet['privateKey'];

                $data = [
                    'status' => 1,
                    'active' => 'Yes',
                    'beta' => $this->siteSettings->beta,
                    'created_on' => date('Y-m-d H:i:s'),
                    'default_wallet' => $defaultWallet,
                    'exchange_wallet' => 'Yes',
                    'market' => 'SOL',
                    'broker' => 'MyMI Wallet',
                    'broker_account_owner' => 1,
                    'user_id' => $this->cuID,
                    'user_email' => $this->userAccount['cuEmail'],
                    'username' => $this->userAccount['cuUsername'],
                    'public_token' => $publicKey,
                    'access_token' => $privateKey,
                    'wallet_type' => 'Crypto',
                    'nickname' => 'MyMI Solana',
                    'initial_value' => 0,
                    'amount' => 0,
                ];

                $this->db->table('bf_users_wallet')->insert($data);

                return $this->response->setJSON(['status' => 'success', 'publicKey' => $publicKey, 'privateKey' => $privateKey]);
            } catch (\Exception $e) {
                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function createToken() {
        $name = $this->request->getPost('token_name');
        $symbol = $this->request->getPost('token_symbol');
        $supply = $this->request->getPost('token_supply');
        $blockchain = $this->request->getPost('blockchain');
        $adminWallet = $this->request->getPost('admin_wallet');
        $description = $this->request->getPost('description');
        $logoFile = $this->request->getFile('logo_file');
        $logoUrl = $this->request->getPost('logo_url');
        $attributes = $this->request->getPost('attributes');

        $logo = $logoFile && $logoFile->isValid() ? $logoFile->store() : $logoUrl;

        $metadata = [
            'name' => $name,
            'symbol' => $symbol,
            'description' => $description,
            'image' => $logo,
            'attributes' => json_decode($attributes, true),
        ];

        $metadataUri = $this->generateMetadataUri($metadata);

        $result = $this->tokenModel->createToken([
            'name' => $name,
            'symbol' => $symbol,
            'total_supply' => $supply,
            'blockchain' => $blockchain,
            'admin_wallet' => $adminWallet,
            'metadata_uri' => $metadataUri,
        ]);

        if ($result) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Token created successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to create token.']);
        }
    }
    
    public function confirmation($transactionId) {
        $transactionDetails = $this->exchangeModel->getTransactionDetails($transactionId);
    
        if (!$transactionDetails) {
            return redirect()->to('/Exchange/Solana')->with('error', 'Transaction not found.');
        }
    
        $this->data['transactionDetails'] = $transactionDetails;
        $this->data['pageTitle'] = 'Transaction Confirmation';
        
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\confirmation', $this->data);
    }
    
    public function disconnectWallet($walletID = null) {
        $getWalletInfo  = $this->solanaModel->disconnectWallet($walletID); 
        if ($getWalletInfo) {
            // Redirect the user back to /Exchange/Solana after disconnecting the wallet
            return redirect()->to('/Exchange/Solana')->with('message', 'Wallet disconnected successfully.');
        } else {
            // Handle the error case, for example, by redirecting back with an error message
            return redirect()->to('/Exchange/Solana')->with('error', 'Failed to disconnect the wallet.');
        }
    }    

    public function executeSwap() {
        if ($this->request->getMethod() == 'post') {
            try {
                // Extract inputs
                $amount = floatval($this->request->getPost('amount'));
                $fromToken = esc($this->request->getPost('from_token'));
                $toToken = esc($this->request->getPost('to_token'));
                $userId = esc($this->request->getPost('user_id'));
                $publicKey = esc($this->request->getPost('public_key'));
                $privateKey = esc($this->request->getPost('private_key'));
                $fromAddress = esc($this->request->getPost('from_address'));
                $toAddress = esc($this->request->getPost('to_address'));
    
                if (empty($amount) || empty($fromToken) || empty($toToken) || empty($userId)) {
                    throw new \Exception('Invalid input.');
                }
    
                // Fetch real-time prices
                $fromPrice = $this->MyMISolana->getTokenPrice($fromToken);
                $toPrice = $this->MyMISolana->getTokenPrice($toToken);
                if (!$fromPrice || !$toPrice) {
                    throw new \Exception('Failed to fetch token prices.');
                }
    
                // Check user balance
                $balance = $this->MyMISolana->getBalance($publicKey);
                if ($balance < $amount) {
                    throw new \Exception('Insufficient balance.');
                }
    
                // Calculate fees
                $transactionFees = $this->calculateTransactionFees($amount, $fromPrice);
                $totalCost = $amount + $transactionFees;
    
                if ($balance < $totalCost) {
                    throw new \Exception('Insufficient balance to cover transaction and fees.');
                }
    
                // Perform the swap
                $swapResult = $this->MyMIRaydium->executeSwap($fromToken, $toToken, $amount);
                if (!$swapResult['success']) {
                    throw new \Exception('Swap failed: ' . $swapResult['message']);
                }
    
                // Transfer assets
                $transferResult = $this->MyMISolana->sendAsset($privateKey, $fromAddress, $toAddress, $fromToken, $amount);
                if (!$transferResult['success']) {
                    throw new \Exception('Asset transfer failed: ' . $transferResult['message']);
                }
    
                // Update user balance and record transaction
                $this->updateUserBalance($userId, $publicKey, $balance - $totalCost);
                $isSuspicious = $amount > 9999.99 ? 1 : 0;
                $this->recordTransactionHistory($userId, $fromToken, $toToken, $amount, $transactionFees, $transferResult, $isSuspicious);
    
                // Send transaction confirmation
                $this->sendTransactionConfirmation($this->request->getPost('user_email'), $transferResult);
    
                return $this->respond(['status' => 'success', 'transactionResult' => $transferResult]);
            } catch (\Exception $e) {
                log_message('error', 'Swap execution failed: ' . $e->getMessage());
                return $this->respond(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    
        return $this->respond(['status' => 'error', 'message' => 'Invalid request method.']);
    }
        
    public function fetchFrontendData()
    {
        if ($this->debug === 1) {
            log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
        }
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
        }

        $cuID = $this->currentUserId();
        if ($cuID <= 0) {
            log_message('error', 'fetchFrontendData: missing user context; aborting.');
            return $this->response->setStatusCode(401)->setJSON([
                'status'  => 'error',
                'message' => 'Authentication required.'
            ]);
        }

        // Ensure service is present
        $this->solanaService = $this->solanaService ?? new \App\Services\SolanaService();

        // Resolve address (Base58 only)
        $model   = model(\App\Models\SolanaModel::class);
        $address = $this->request->getVar('address')
            ?? session('solana_public_key')
            ?? ($model->getDefaultAddressFromExchangeTable($cuID)['address'] ?? null);

        if ($address) {
            $address = $this->solanaService->normalizeAddress($address);
            if ($address && $this->solanaService->isValidPublicKey($address)) {
                session()->set('solana_public_key', $address);
            } else {
                $address = null; // reject hex or invalid
            }
        }

        // Data
        $lib          = $this->MyMISolana;
        $mySolanaData = $lib->getUserSolana($cuID) ?? [];
        $marketData   = $lib->getSolanaMarketData() ?? [];
        $allSolanaTok = $lib->getSolanaTokens();

        // Log
        log_message(
            'debug',
            'fetchFrontendData - $mySolanaData: {a} | $marketData: {b} | $tokens: {c}',
            ['a' => print_r($mySolanaData, true), 'b' => print_r($marketData, true), 'c' => print_r($allSolanaTok, true)]
        );

        // Build response structure required
        $data = [
            'mySolanaData' => [
                'totalSolana'    => $mySolanaData['cuSolanaTotal'] ?? 0,
                'totalValue'     => $mySolanaData['cuSolanaValue'] ?? 0,
                'profitLoss24hr' => $mySolanaData['solanaDailyPL'] ?? 0,
            ],
            'marketData' => [
                'currentPrice'     => $marketData['currentPrice'] ?? 0.0,
                'market_cap'       => $marketData['market_cap'] ?? 0.0,
                'dailyVolume'      => $marketData['dailyVolume'] ?? 0,
                // map PL fields from user data so the UI can read them
                'mtdPL'            => $mySolanaData['solanaMTDPL'] ?? 0,
                'dailyPL'          => $mySolanaData['solanaDailyPL'] ?? 0,
                'hourlyPL'         => $mySolanaData['solanaHourlyPL'] ?? 0,
                // optional fields if you have them:
                'notifications'    => $marketData['notifications'] ?? [],
                'networkStatus'    => $mySolanaData['solanaNetworkStatus']['healthy'] ?? null,
                'transactionSpeed' => $marketData['transactionSpeed'] ?? null,
                'networkThroughput'=> $marketData['networkThroughput'] ?? null,
            ],
            'allSolanaToken' => $allSolanaTok,  // can be { all: [...] } or a plain array
            'address'        => $address ?: null,
        ];

        // Include a fresh CSRF hash so the page can rotate its token client-side
        return $this->response->setJSON([
            'status' => 'success',
            'data'   => $data,
            'csrf'   => csrf_hash(),
        ]);
    }

    private function updateUserBalance($userId, $publicKey, $newBalance) {
        $this->solanaModel->updateBalance($userId, $publicKey, $newBalance);
    }

    protected function fetchRealTimeData() {
        try {
            $message = json_encode(['method' => 'updateMarketPrices', 'params' => []]);
            $response = $this->webSocketClient->sendMessage($message);
            $marketData = json_decode($response, true);
    
            if ($marketData) {
                $this->solanaModel->updateMarketData($marketData);
                $this->data['solanaMarketData'] = $marketData;
            } else {
                throw new \Exception("No data received from WebSocket");
            }
        } catch (\Exception $e) {
            log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
        }
    }    

    public function provisionDefaultWallet()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON(['ok' => false, 'msg' => 'AJAX only']);
        }

        $cuID = (int) ($this->cuID ?? session('cuID') ?? 0);
        if ($cuID <= 0) {
            return $this->response->setStatusCode(401)->setJSON(['ok' => false, 'msg' => 'Auth required']);
        }

        try {
            $row = (new \App\Libraries\MyMISolana())->provisionDefaultPublicAddress($cuID);
            if (!$row) {
                return $this->response->setStatusCode(500)->setJSON(['ok' => false, 'msg' => 'Provision failed']);
            }
            return $this->response->setJSON(['ok' => true, 'address' => $row['address']]);
        } catch (\Throwable $e) {
            log_message('error', 'provisionDefaultWallet: '.$e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['ok' => false, 'msg' => 'Error']);
        }
    }

    public function fundWallet()
    {
        $publicKey = trim((string) $this->request->getPost('public_key'));
        if ($publicKey === '' || !preg_match('/^[1-9A-HJ-NP-Za-km-z]{32,44}$/', $publicKey)) {
            return $this->response->setStatusCode(422)->setJSON([
                'status'  => 'error',
                'message' => 'Invalid Solana public key provided.',
            ]);
        }

        try {
            $result = SafeProcess::run(['solana', 'airdrop', '2', $publicKey], ['solana']);
        } catch (\Throwable $e) {
            log_message('error', 'Solana airdrop failed: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => 'Airdrop execution failed.',
            ]);
        }

        if ($result['exitCode'] !== 0) {
            log_message('error', 'Solana airdrop non-zero exit: ' . $result['stderr']);
            return $this->response->setStatusCode(500)->setJSON([
                'status'  => 'error',
                'message' => trim($result['stderr']) ?: 'Airdrop command failed.',
            ]);
        }

        return $this->response->setJSON([
            'status' => 'success',
            'result' => trim($result['stdout']),
        ]);
    }

    private function generateMetadataUri($metadata) {
        $filename = uniqid() . '.json';
        $path = WRITEPATH . "metadata/$filename";
        file_put_contents($path, json_encode($metadata));
        return base_url("metadata/$filename");
    }
    
    public function generateWallet() {
        $wallet = $this->MyMISolana->generateWallet();
        if ($wallet) {
            return $this->response->setJSON(['status' => 'success', 'wallet' => $wallet]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to generate wallet']);
        }
    }
    
    public function getMarketPrice() {
        try {
            $solanaMarketPrice = $this->MyMISolana->getMarketPrice(); 
            return $this->response->setJSON(['price' => $solanaMarketPrice]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()], 500);
        }
    }

    public function getTokenMetadata($metadataUri) {
        $client = Services::curlrequest();
        try {
            $response = $client->get($metadataUri);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            log_message('error', 'Failed to fetch metadata: ' . $e->getMessage());
            return null;
        }
    }

    public function getTokenPrice($tokenAddress) {
        try {
            // Assuming SolanaModel has a method to fetch price from Solana API
            $tokenPrice = $this->solanaModel->fetchTokenPriceFromAPI($tokenAddress);

            return $this->response->setJSON(['price' => $tokenPrice]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()], 500);
        }
    }

    public function import() {
        $this->data['pageTitle'] = 'Solana - Import | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\index', $this->data);
    }

    public function importWallet()
    {
        log_message('debug', 'SolanaController L186 - Import Started!');
        if ($this->request->getMethod() == 'POST') {
            log_message('debug', 'SolanaController L188 - Received POST request to import wallet.');
            try {
                $json = $this->request->getJSON();
                $key = $json->key ?? null;
                log_message('debug', 'SolanaController L191 - Key received: ' . $key);

                if (empty($key)) {
                    log_message('error', 'No key provided.');
                    throw new \Exception("No key provided.");
                }

                $result = $this->MyMISolana->importWallet($key);

                if ($result['status'] !== 'success') {
                    throw new \Exception($result['message']);
                }

                $wallet = $result['wallet'];
                log_message('debug', 'SolanaController L194 - Wallet imported successfully: ' . json_encode($wallet));

                $data = [
                    'status' => 1,
                    'active' => 'Yes',
                    'beta' => $this->siteSettings->beta,
                    'created_on' => date('Y-m-d H:i:s'),
                    'default_wallet' => 'Yes',
                    'exchange_wallet' => 'Yes',
                    'market' => 'SOL',
                    'broker' => 'MyMI Wallet',
                    'broker_account_owner' => 1,
                    'user_id' => $this->cuID,
                    'user_email' => $this->userAccount['cuEmail'],
                    'username' => $this->userAccount['cuUsername'],
                    'public_token' => $wallet['publicKey'],
                    'access_token' => $wallet['privateKey'],
                    'wallet_type' => 'Crypto',
                    'nickname' => 'Imported Solana Wallet',
                    'initial_value' => 0,
                    'amount' => 0,
                ];

                $result = $this->solanaModel->insertWalletIfNotExists($data);
                $response = \Config\Services::response();

                if ($result['status'] === 'exists_inactive') {
                    if ($this->debug === 1) {
                        log_message('debug', $result['message']);
                    }
                    return $response->setJSON([
                        'status' => 'exists_inactive',
                        'message' => $result['message'],
                        'publicKey' => $wallet['publicKey'],
                        'privateKey' => $wallet['privateKey']
                    ]);
                } elseif ($result['status'] === 'exists_active') {
                    if ($this->debug === 1) {
                        log_message('debug', $result['message']);
                    }
                    return $response->setJSON([
                        'status' => 'exists_active',
                        'message' => $result['message'],
                        'publicKey' => $wallet['publicKey'],
                        'privateKey' => $wallet['privateKey']
                    ]);
                } else {
                    if ($this->debug === 1) {
                        log_message('debug', $result['message']);
                    }
                    return $response->setJSON([
                        'status' => 'success',
                        'message' => $result['message'],
                        'publicKey' => $wallet['publicKey'],
                        'privateKey' => $wallet['privateKey']
                    ]);
                }
            } catch (\Exception $e) {
                log_message('error', 'Error importing wallet: ' . $e->getMessage());
                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function initiateBuyback($tokenId) {
        $holders = $this->tokenModel->getTokenHolders($tokenId);
        $currentPrice = $this->tokenModel->getTokenPrice($tokenId);

        foreach ($holders as $holder) {
            $payout = $holder['balance'] * $currentPrice;
            $this->walletModel->deductFunds($holder['wallet_id'], $payout);
            $this->walletModel->transferTokens($holder['wallet_id'], $holder['balance']);
        }

        $this->tokenModel->markTokenAsClosed($tokenId);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Buyback completed successfully.']);
    }

    public function lockTokens() {
        $user = $this->request->getPost('user');
        $amount = $this->request->getPost('amount');
        $txId = $this->request->getPost('tx_id');
    
        $result = $this->MyMISolana->lockTokens($user, $amount, $txId);
        return $this->response->setJSON($result);
    }
    
    public function mintTokens() {
        $privateKey = $this->request->getPost('private_key');
        $mintAddress = $this->request->getPost('mint_address');
        $amount = $this->request->getPost('amount');
    
        $result = $this->MyMISolana->mintTokens($privateKey, $mintAddress, $amount);
        if ($result['status'] === 'success') {
            return $this->response->setJSON(['status' => 'success', 'transactionId' => $result['transactionId']]);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => $result['message']]);
        }
    }

    private function processCryptoSwap($userId, $amount, $price) {
        // Logic to handle crypto swaps
        $transactionId = $this->MyMISolana->executeSwap($amount, $price, $userId);
    
        return [
            'success' => true,
            'message' => 'Crypto swap successful',
            'redirect' => '/Exchange/Solana/Confirmation/' . $transactionId
        ];
    }
    
    private function processCryptoSell($userId, $amount, $price) {
        // Logic to handle crypto conversion
        $cryptoAmount = $amount * $price; // Assuming SOL to another crypto ratio
        $this->MyMISolana->swapCrypto($userId, $amount, $cryptoAmount);
    
        return [
            'success' => true,
            'message' => "Successfully sold $amount SOL for $cryptoAmount crypto.",
            'redirect' => '/Exchange/Solana/Confirmation'
        ];
    }        
    
    private function processFiatPurchase($userId, $amount, $price) {
        // Logic to handle fiat purchase via PayPal
        $payment = $this->MyMIExchange->processFiatPayment($userId, $amount, $price);
        
        return [
            'success' => true,
            'message' => 'Fiat purchase completed via PayPal',
            'redirect' => '/Exchange/Solana/Confirmation/' . $payment['transactionId']
        ];
    }

    private function processFiatSell($userId, $amount, $price) {
        // Example logic to handle fiat conversion
        $fiatAmount = $amount * $price;
        $this->MyMISolana->convertToFiat($userId, $amount, $fiatAmount);
    
        return [
            'success' => true,
            'message' => "Successfully sold $amount SOL for \$$fiatAmount.",
            'redirect' => '/Exchange/Solana/Confirmation'
        ];
    }
    
    private function processMyMIGoldPurchase($userId, $amount, $price) {
        // Logic to handle MyMI Gold purchase
        $transaction = $this->MyMIGold->purchaseWithGold($userId, $amount, $price);
    
        return [
            'success' => true,
            'message' => 'Purchase completed using MyMI Gold',
            'redirect' => '/Exchange/Solana/Confirmation/' . $transaction['transactionId']
        ];
    }

    private function processMyMIGoldSell($userId, $amount, $price) {
        // Logic to handle conversion to MyMI Gold
        $goldAmount = $amount * $price; // Assuming 1 SOL = x MyMI Gold
        $this->MyMIGold->transferGoldToUser($userId, $goldAmount);
    
        return [
            'success' => true,
            'message' => "Successfully sold $amount SOL for $goldAmount MyMI Gold.",
            'redirect' => '/Exchange/Solana/Confirmation'
        ];
    }
    
    public function purchaseSolana() {
        $method = $this->request->getPost('method'); // Determines purchase method (crypto, fiat, gold)
        $amount = $this->request->getPost('amount');
        $price = $this->request->getPost('price');
        $userId = $this->cuID;
        
        // Validate inputs
        if (!$method || !$amount || !$price) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
        }
    
        try {
            // Process purchase based on method
            switch ($method) {
                case 'crypto_swap':
                    $result = $this->processCryptoSwap($userId, $amount, $price);
                    break;
                case 'fiat':
                    $result = $this->processFiatPurchase($userId, $amount, $price);
                    break;
                case 'mymi_gold':
                    $result = $this->processMyMIGoldPurchase($userId, $amount, $price);
                    break;
                default:
                    throw new \Exception('Invalid purchase method');
            }
    
            if ($result['success']) {
                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
            } else {
                throw new \Exception($result['message']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function recordTransactionHistory($userId, $fromToken, $toToken, $amount, $fees, $transactionResult, $isSuspicious) {
        $this->solanaModel->recordTransaction($userId, $fromToken, $toToken, $amount, $fees, $transactionResult, $isSuspicious);
    }

    public function redistributeTokens() {
        $tokenId = $this->request->getPost('token_id');
        $newAmount = $this->request->getPost('new_amount');

        $holders = $this->tokenModel->getTokenHolders($tokenId);
        $totalSupply = $this->tokenModel->getTotalSupply($tokenId);

        foreach ($holders as $holder) {
            $proportion = $holder['balance'] / $totalSupply;
            $redistribution = $proportion * $newAmount;

            $this->walletModel->addTokensToWallet($holder['wallet_id'], $redistribution);
        }

        $this->tokenModel->incrementTotalSupply($tokenId, $newAmount);

        return $this->response->setJSON(['status' => 'success', 'message' => 'Tokens redistributed successfully.']);
    }

    public function refreshWallet() {
        $walletType = $this->request->getPost('wallet_type');
        switch ($walletType) {
            case 'solflare':
                $response = $this->MyMISolflare->refreshWallet();
                break;
            case 'phantom':
                $response = $this->MyMIPhantom->refreshWallet();
                break;
            case 'metamask':
                $response = $this->MyMIMetaMask->refreshWallet();
                break;
            case 'trustwallet':
                $response = $this->MyMITrustWallet->refreshWallet();
                break;
            default:
                $response = ['status' => 'error', 'message' => 'Invalid wallet type'];
                break;
        }
        return $this->response->setJSON($response);
    }

    public function sellSolana() {
        $method = $this->request->getPost('method'); // Determines sell method (fiat, mymi_gold, crypto)
        $amount = $this->request->getPost('amount');
        $price = $this->request->getPost('price');
        $userId = $this->cuID;
    
        // Validate inputs
        if (!$method || !$amount || !$price) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
        }
    
        try {
            // Process sell based on method
            switch ($method) {
                case 'fiat':
                    $result = $this->processFiatSell($userId, $amount, $price);
                    break;
                case 'mymi_gold':
                    $result = $this->processMyMIGoldSell($userId, $amount, $price);
                    break;
                case 'crypto':
                    $result = $this->processCryptoSell($userId, $amount, $price);
                    break;
                default:
                    throw new \Exception('Invalid sell method');
            }
    
            if ($result['success']) {
                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
            } else {
                throw new \Exception($result['message']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function sendTransactionConfirmation($email, $transactionResult) {
        $this->email->setTo($email);
        $this->email->setSubject('Transaction Confirmation');
        $this->email->setMessage('Your transaction was successful. Transaction ID: ' . $transactionResult);
        $this->email->send();
    }
    
    public function setupEnvironment()
    {
        return $this->response->setStatusCode(403)->setJSON([
            'status'  => 'error',
            'message' => 'Automated environment provisioning is disabled for security reasons.',
        ]);
    }

    public function swapSolana() {
        $fromToken = $this->request->getPost('from_token'); // Token to swap from (e.g., SOL)
        $toToken = $this->request->getPost('to_token');     // Token to swap to
        $amount = $this->request->getPost('amount');        // Amount to swap
        $userId = $this->cuID;
    
        // Validate inputs
        if (!$fromToken || !$toToken || !$amount || $fromToken === $toToken) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
        }
    
        try {
            // Ensure the user has enough balance
            $userBalance = $this->MyMISolana->getBalance($this->data['cuSolanaDW']['address']);
            if ($userBalance < $amount) {
                throw new \Exception('Insufficient balance for this swap.');
            }
    
            // Calculate fees and total swap amount
            $swapRate = $this->MyMISolana->getTokenPrice($toToken) / $this->MyMISolana->getTokenPrice($fromToken);
            $swappedAmount = $amount * $swapRate;
            $fees = $this->calculateSwapFees($amount);
    
            // Perform the swap
            $result = $this->MyMISolana->swapCrypto($userId, $fromToken, $toToken, $amount, $swappedAmount - $fees);
    
            if ($result['success']) {
                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
            } else {
                throw new \Exception($result['message']);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function testPage() {
        $this->data['pageTitle'] = 'Solana Coin Swap | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\testPage', $this->data);
    }

    public function triggerWebSocket() {
        try {
            $this->webSocketClient = new WebSocketClient('127.0.0.1', 8080);
            $this->webSocketClient->connect();
            $message = json_encode(['method' => 'updateMarketPrices', 'params' => []]);
            $response = $this->webSocketClient->sendMessage($message);
            $marketData = json_decode($response, true);
            log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
            $this->solanaModel->updateMarketData($marketData);
            $this->webSocketClient->close();
            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    // Method to initiate the first data pull
    public function updateSolanaTokens() {
        try {
            $tokens = $this->dexScreener->getAvailableTokens();
            return $this->response->setJSON(['status' => 'success', 'tokens' => $tokens]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    // Method to update market prices
    public function updateSolanaPrices() {
        try {
            $this->dexScreener->updateMarketPrices();
            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function viewAssets() {
        $publicKey = $this->request->getPost('public_key');
        $assets = $this->MyMISolana->getAssets($publicKey);
        return $this->response->setJSON(['status' => 'success', 'assets' => $assets]);
    }
    
    public function viewSolanaWallet()  // <-- use your actual action name/route
    {
        $cuID = $this->currentUserId();
        if ($cuID <= 0) {
            // Not logged in -> modal should not load sensitive data
            return $this->response->setStatusCode(401)->setBody('Authentication required.');
        }

        // Get the user's default wallet row safely
        $ud          = $this->MyMISolana->getUserDefaultSolana($cuID) ?? [];
        $cuSolanaDW  = is_array($ud) ? ($ud['cuSolanaDW'] ?? null) : null;

        // Resolve a Base58 address string
        $address = $this->extractBase58Address($cuSolanaDW, $cuID);
        if ($address) {
            session()->set('solana_public_key', $address); // remember for subsequent calls
        }

        // Fetch transactions safely (int, ?string)
        $txs = $this->MyMISolana->getTransactions($cuID, $address);

        // Render your modal view with the resolved address and txs
        return $this->renderTheme('User/Transactions/Solana/viewWallet', [
            'cuID'        => $cuID,
            'cuSolanaDW'  => is_array($cuSolanaDW) ? array_merge(['address' => $address], $cuSolanaDW) : ['address' => $address],
            'transactions'=> $txs,
            'address'     => $address,
        ]);
    }

    public function getQuote()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON([
                'ok' => false,
                'msg' => 'AJAX only',
                'csrf' => csrf_hash(),
            ]);
        }
        $p = $this->request->getPost();
        $data = service('solanaService')->getQuote([
            'inputMint'   => $p['inputMint'] ?? '',
            'outputMint'  => $p['outputMint'] ?? '',
            'amount'      => (string) ($p['amount'] ?? '0'),
            'slippageBps' => (int) ($p['slippageBps'] ?? 50),
        ]);
        return $this->response->setJSON([
            'ok' => true,
            'data' => $data,
            'csrf' => csrf_hash(),
        ]);
    }

    public function doSwap()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(405)->setJSON([
                'ok' => false,
                'msg' => 'AJAX only',
                'csrf' => csrf_hash(),
            ]);
        }
        $payload = $this->request->getJSON(true) ?? $this->request->getPost();
        $res = service('solanaService')->swap($payload);
        return $this->response->setJSON([
            'ok' => true,
            'data' => $res,
            'csrf' => csrf_hash(),
        ]);
    }

    // protected function fetchRealTimeData()
    // {
    //     try {
    //         $message = json_encode([
    //             'method' => 'getMarketData',
    //             'params' => [],
    //             'id' => 1
    //         ]);
    //         $response = $this->webSocketClient->sendMessage($message);
    //         $marketData = json_decode($response, true);
    //         log_message('debug', 'SolanaController L517 - $marketData array: ' . (print_r($marketData, true))); 
            
    //         // Save or update market data in the database
    //         $this->solanaModel->updateMarketData($marketData);

    //         $this->data['solanaMarketData'] = $marketData;
    //     } catch (Exception $e) {
    //         log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
    //     }
    // }

    // protected function fetchRealTimeData() {
    //     try {
    //         $message = json_encode(['method' => 'updateMarketPrices', 'params' => []]);
    //         $response = $this->webSocketClient->sendMessage($message);
    //         $marketData = json_decode($response, true);
    //         log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
    //         $this->solanaModel->updateMarketData($marketData);
    //         $this->data['solanaMarketData'] = $marketData;
    //     } catch (\Exception $e) {
    //         log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
    //     }
    // }   

    // public function __destruct()
    // {
    //     $this->webSocketClient->close();
    // }
    
    // public function fetchFrontendData()
    // {
    //     // NOTE: don't assign in the if — compare!
    //     if ($this->debug == 1) {
    //         log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
    //     }

    //     if (!$this->request->isAJAX()) {
    //         return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
    //     }

    //     // Require an authenticated user
    //     $cuID = (int) ($this->currentUserId() ?? 0);
    //     if ($cuID <= 0) {
    //         log_message('error', 'fetchFrontendData: missing user context; aborting.');
    //         return $this->response->setStatusCode(401)->setJSON([
    //             'status'  => 'error',
    //             'message' => 'Authentication required.',
    //             // optional CSRF on error responses too
    //             'csrf'    => csrf_hash(),
    //         ]);
    //     }

    //     // Resolve (or provision) default address once, store in session
    //     $row   = $this->solanaModel->getDefaultAddressFromExchangeTable($cuID);

    //     if (!$row && class_exists(\App\Libraries\MyMISolana::class)) {
    //         try {
    //             $row = (new \App\Libraries\MyMISolana())->provisionDefaultPublicAddress($cuID);
    //         } catch (\Throwable $e) {
    //             log_message('error', 'provisionDefaultPublicAddress failed: '.$e->getMessage());
    //         }
    //     }

    //     $address = $row['address'] ?? null;
    //     if ($address) {
    //         session()->set('solana_public_key', $address);
    //     }

    //     // Ensure service is available
    //     if (!isset($this->solanaService)) {
    //         $this->solanaService = new \App\Services\SolanaService();
    //     }

    //     // --- Aggregate data ---
    //     $lib          = $this->MyMISolana;
    //     $mySolanaData = $lib->getUserSolana($cuID) ?: [];
    //     $marketRaw    = $lib->getSolanaMarketData() ?: [];

    //     // Normalize and (optionally) re-validate address coming from request/session
    //     $addrReq = $this->request->getVar('address')
    //         ?? session('solana_public_key')
    //         ?? ($model->getDefaultAddressFromExchangeTable($cuID)['address'] ?? null);

    //     if ($addrReq) {
    //         $addrReq = $this->solanaService->normalizeAddress($addrReq);
    //         if ($addrReq && $this->solanaService->isValidPublicKey($addrReq)) {
    //             session()->set('solana_public_key', $addrReq);
    //         } else {
    //             $addrReq = null;
    //         }
    //     }

    //     // Build marketData contract exactly as requested
    //     $marketData = [
    //         'currentPrice'      => (float) ($marketRaw['currentPrice']   ?? 0.0),
    //         'market_cap'        => (float) ($marketRaw['market_cap']     ?? 0.0),
    //         'dailyVolume'       => (float) ($marketRaw['dailyVolume']    ?? 0.0),

    //         // pulled from MyMISolana::getUserSolana()
    //         'mtdPL'             => (float) ($mySolanaData['solanaMTDPL']   ?? 0.0),
    //         'dailyPL'           => (float) ($mySolanaData['solanaDailyPL'] ?? 0.0),
    //         'hourlyPL'          => (float) ($mySolanaData['solanaHourlyPL']?? 0.0),

    //         // optional extras (leave null/[] if not available)
    //         'notifications'     => (array) ($marketRaw['notifications'] ?? []),
    //         'networkStatus'     => (function () use ($mySolanaData) {
    //             $net = $mySolanaData['solanaNetworkStatus'] ?? [];
    //             if (!is_array($net)) return null;
    //             // simple string: "healthy" | "unhealthy (vX.Y.Z)"
    //             $healthy = !empty($net['healthy']);
    //             $ver     = $net['version'] ?? null;
    //             return $healthy ? 'healthy' : ($ver ? "unhealthy ($ver)" : 'unhealthy');
    //         })(),
    //         'transactionSpeed'  => null, // optional; populate if you track TPS
    //         'networkThroughput' => null, // optional
    //     ];

    //     // mySolanaData contract
    //     $myData = [
    //         'profitLoss24hr' => (float) ($mySolanaData['solanaDailyPL'] ?? 0.0),
    //         'totalSolana'    => (float) ($mySolanaData['cuSolanaTotal'] ?? 0.0),
    //         'totalValue'     => (float) ($mySolanaData['cuSolanaValue'] ?? 0.0),
    //     ];

    //     // Tokens: keep original structure; front-end accepts {all: [...]} or a plain array
    //     $allSolanaToken = $lib->getSolanaTokens();
    //     // If your library sometimes returns a flat array, normalize to `{ all: [...] }`
    //     if (isset($allSolanaToken[0]) && is_array($allSolanaToken[0])) {
    //         $allSolanaToken = ['all' => $allSolanaToken];
    //     }

    //     $payload = [
    //         'status' => 'success',
    //         'data'   => [
    //             'mySolanaData'   => $myData,
    //             'marketData'     => $marketData,
    //             'allSolanaToken' => $allSolanaToken,
    //         ],
    //         // include refreshed CSRF hash so the page can update its global token
    //         'csrf'  => csrf_hash(),
    //     ];

    //     return $this->response->setJSON($payload);
    // }
}
?>
