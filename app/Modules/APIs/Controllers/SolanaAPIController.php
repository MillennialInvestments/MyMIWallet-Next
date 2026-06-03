<?php namespace App\Modules\APIs\Controllers;

use App\Controllers\BaseAPIController;

use Myth\Auth\Authorization\GroupModel;
use Config\{Auth, SiteSettings};
use Config\Services;
use App\Libraries\{
    MyMIBudget, MyMICoin, MyMIDashboard, MyMIDexScreener, MyMIExchange,
    MyMIGold, MyMIMetaMask, MyMIPhantom, MyMIRaydium, MyMISolana,
    MyMISolflare, MyMITrustWallet, MyMIUser, MyMIWallets
};
use App\Models\{AccountsModel, APIModel, ExchangeModel, SolanaModel, UserModel, WalletModel};
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\API\RequestTrait;
use CodeIgniter\HTTP\IncomingRequest;

#[\AllowDynamicProperties]
class SolanaAPIController extends BaseAPIController {
    use ResponseTrait;
    protected $apiUrl;
    protected $auth;
    protected $db;
    protected $email;
    protected $helpers = ['auth', 'form', 'url', 'premium'];
    protected $request;
    protected $session;
    protected $siteSettings;
    protected $uri;
    protected $betaApiUrl = 'https://api.devnet.solana.com';
    protected $debugApiUrl = 'https://api.testnet.solana.com';
    protected $prodApiUrl = 'https://api.mainnet-beta.solana.com';
    protected $backupUrl = 'https://solana-api.projectserum.com';
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
    protected $usersModel;
    protected $walletModel;
    protected $userBudget;
    protected $userDashboard;
    protected $userWallets;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = \Config\Database::connect();
        $this->auth = service('authentication');
        $this->email = \Config\Services::email();
        $this->request = service('request');
        $this->session = Services::session();
        $this->siteSettings = config('SiteSettings');
        $this->debug = $this->siteSettings->debug; 
//         $this->MyMICoin = new MyMICoin(); // replaced by BaseController getter
//         $this->MyMIDashboard = new MyMIDashboard(); // replaced by BaseController getter
        $this->dexScreener = new MyMIDexScreener($this->db);
//         $this->MyMIExchange = new MyMIExchange(); // replaced by BaseController getter
//         $this->MyMIGold = new MyMIGold(); // replaced by BaseController getter
//         $this->MyMIMetaMask = new MyMIMetaMask(); // replaced by BaseController getter
//         $this->MyMIPhantom = new MyMIPhantom(); // replaced by BaseController getter
//         $this->MyMIRaydium = new MyMIRaydium(); // replaced by BaseController getter
//         $this->MyMISolana = new MyMISolana(); // replaced by BaseController getter
//         $this->MyMISolflare = new MyMISolflare(); // replaced by BaseController getter
//         $this->MyMITrustWallet = new MyMITrustWallet(); // replaced by BaseController getter
        $this->exchangeModel = new ExchangeModel();
        $this->solanaModel = new SolanaModel();
        
        if ($this->siteSettings->beta === 1) {
            $this->apiUrl = $this->betaApiUrl; 
        } elseif ($this->siteSettings->debug === 1) {
            $this->apiUrl = $this->debugApiUrl; 
        } elseif (!empty($this->prodApiUrl)) {
            $this->apiUrl = $this->prodApiUrl; 
        } else {
            $this->apiUrl = $this->backupApiUrl; 
        }
    }

    public function commonData(): array {
        $this->data = parent::commonData();
        $this->data['request'] = $this->request;
        $this->data['siteSettings'] = $this->siteSettings;
        $this->data['beta'] = (string) $this->siteSettings->beta;
        $this->data['uri'] = $this->request->getUri();
        $this->data['userAgent'] = $this->request->getUserAgent();
        return $this->data;
}

    public function index() {
        $this->data['pageTitle'] = 'Solana Exchange | MyMI Wallet | The Future of Finance';
        $this->commonData();
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\index', $this->data);
    }

    public function apiGetTokens() {
        $tokens = $this->db->table('bf_exchanges_assets')->where('market', 'SOL')->get()->getResultArray();
        return $this->response->setJSON($tokens);
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

    public function createSolanaWallet() {
        $guard = $this->solanaTransactionGuard('createSolanaWallet');
        if ($guard !== null) {
            return $guard;
        }

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
                    'access_token' => $this->encryptSolanaSecretForStorage($privateKey),
                    'wallet_type' => 'Crypto',
                    'nickname' => 'MyMI Solana',
                    'initial_value' => 0,
                    'amount' => 0,
                ];

                $this->db->table('bf_users_wallet')->insert($data);

                return $this->response->setJSON($this->jsonEnvelope(true, 'Wallet created safely.', ['publicKey' => $publicKey, 'walletAddress' => $publicKey]));
            } catch (\Exception $e) {
                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function createToken() {
        $guard = $this->solanaTransactionGuard('createToken');
        if ($guard !== null) {
            return $guard;
        }

        $this->data['pageTitle'] = 'Create Token | MyMI Wallet';
        $this->commonData();
    
        if ($this->request->getMethod() == 'POST') {
            $tokenName = $this->request->getPost('token_name');
            $tokenSymbol = $this->request->getPost('token_symbol');
            $tokenSupply = $this->request->getPost('token_supply');
    
            try {
                $result = $this->MyMISolana->createToken(['name' => $tokenName, 'symbol' => $tokenSymbol, 'supply' => $tokenSupply, 'network' => 'devnet', 'status' => 'draft']);
                if (($result['success'] ?? false) || ($result['status'] ?? null) === 'success' || ($result['status'] ?? null) === 'draft') {
                    return $this->response->setJSON($this->jsonEnvelope(true, 'Draft token prepared successfully.', ['token' => $result['token'] ?? $result]));
                } else {
                    return $this->response->setJSON($this->jsonEnvelope(false, $result['message'] ?? 'Token creation failed.', [], ['token' => $result]));
                }
            } catch (\Exception $e) {
                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
        return $this->renderTheme('App\Modules\Exchange\Views\Solana\createToken', $this->data);
    }
    
    public function executeSwap() {
        $guard = $this->solanaTransactionGuard('executeSwap');
        if ($guard !== null) {
            return $guard;
        }

        if ($premiumGuard = premium_guard('exchange.swap')) {
            return $premiumGuard;
        }

        if ($this->request->getMethod() == 'post') {
            try {
                $fromToken = $this->request->getPost('from_token');
                $toToken = $this->request->getPost('to_token');
                $amount = $this->request->getPost('amount');
                $userId = $this->request->getPost('user_id');
                $publicKey = $this->request->getPost('public_key');
                return $this->privateKeySubmissionDisabledResponse();
                $fromAddress = $this->request->getPost('from_address');
                $toAddress = $this->request->getPost('to_address');

                if (empty($fromToken) || empty($toToken) || empty($amount) || empty($userId)) {
                    throw new \Exception('Invalid input');
                }

                $balance = $this->MyMISolana->getBalance($publicKey);
                if ($balance < $amount) {
                    throw new \Exception('Insufficient balance');
                }

                $transactionFees = $this->calculateTransactionFees($amount);
                $totalCost = $amount + $transactionFees;

                $swapResult = $this->MyMIRaydium->executeSwap($fromToken, $toToken, $amount);
                $transactionResult = $this->MyMISolana->sendAsset($privateKey, $fromAddress, $toAddress, $fromToken, $amount);

                $this->updateUserBalance($userId, $publicKey, $balance - $totalCost);
                $this->recordTransactionHistory($userId, $fromToken, $toToken, $amount, $transactionFees, $transactionResult);
                $this->sendTransactionConfirmation($this->request->getPost('user_email'), $transactionResult);

                return $this->respond(['status' => 'success', 'transactionResult' => $transactionResult]);
            } catch (\Exception $e) {
                return $this->respond(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function getAssetsData() {
        if (ob_get_level() > 0) {
            ob_clean();
        }

        $request = \Config\Services::request();
        $draw = (int) ($request->getPost('draw') ?? 1);
        $start = max(0, (int) ($request->getPost('start') ?? 0));
        $length = max(1, min(100, (int) ($request->getPost('length') ?? 10)));
        $search = $request->getPost('search');
        $searchValue = is_array($search) ? trim((string) ($search['value'] ?? '')) : '';

        $emptyResponse = static fn (int $drawValue, ?string $error = null): array => array_filter([
            'draw' => $drawValue,
            'recordsTotal' => 0,
            'recordsFiltered' => 0,
            'data' => [],
            'error' => $error,
        ], static fn ($value) => $value !== null);

        try {
            $assetsModel = new \App\Models\AssetsModel();
            $totalRecords = (int) $assetsModel->countAll();

            if ($searchValue !== '') {
                $assets = $assetsModel->groupStart()
                    ->like('wallet_type', $searchValue)
                    ->orLike('public_key', $searchValue)
                    ->groupEnd()
                    ->findAll($length, $start);

                $totalFilteredRecords = (int) $assetsModel->groupStart()
                    ->like('wallet_type', $searchValue)
                    ->orLike('public_key', $searchValue)
                    ->groupEnd()
                    ->countAllResults();
            } else {
                $assets = $assetsModel->findAll($length, $start);
                $totalFilteredRecords = $totalRecords;
            }

            $data = [];
            foreach ($assets as $asset) {
                $data[] = [
                    'wallet_type' => $asset['wallet_type'] ?? '',
                    'public_key' => $asset['public_key'] ?? '',
                    'actions' => '',
                    'id' => $asset['id'] ?? null,
                ];
            }

            return $this->response->setJSON([
                'draw' => $draw,
                'recordsTotal' => $totalRecords,
                'recordsFiltered' => $totalFilteredRecords,
                'data' => $data,
            ]);
        } catch (\Throwable $e) {
            log_message('error', 'getAssetsData failed: ' . $e->getMessage());
            return $this->response->setJSON($emptyResponse($draw, 'Unable to load assets data.'));
        }
    }
    
    public function getCoinAmount($tokenAddress) {
        try {
            // Validate the tokenAddress
            if (empty($tokenAddress)) {
                throw new \Exception("Token address not provided.");
            }
    
            // Fetch the token amount for the user
            $userId = $this->cuID;
            $amount = $this->solanaModel->getUserTokenAmount($userId, $tokenAddress);
    
            if ($amount === null) {
                throw new \Exception("No token amount found for user: {$userId} and token address: {$tokenAddress}");
            }
    
            return $this->response->setJSON(['amount' => $amount]);
        } catch (\Exception $e) {
            // Log the error and return a JSON response
            log_message('error', 'Error in getCoinAmount: ' . $e->getMessage());
            return $this->response->setJSON(['error' => $e->getMessage()], 500);
        }
    }
    
    
    public function getExchangePrice($tokenSymbol) {
        try {
            // Replace with actual logic to fetch the exchange price
            $exchangePrice = $this->MyMISolana->getUserSolana($this->cuID)['solanaPrice'];
            return $this->response->setJSON(['price' => $exchangePrice]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()], 500);
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

    public function getTokenPrice($tokenAddress) {
        try {
            $tokenPrice = $this->solanaModel->fetchTokenPriceFromAPI($tokenAddress);
            log_message('debug', 'API/SolanaController getTokenPrice - $tokenPrice: ' . $tokenPrice);
            return $this->response->setJSON(['price' => $tokenPrice]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => $e->getMessage()], 500);
        }
    }    

    public function importWallet() {
        $guard = $this->solanaTransactionGuard('importWallet');
        if ($guard !== null) {
            return $guard;
        }

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
                    'access_token' => $this->encryptSolanaSecretForStorage($wallet['privateKey'] ?? null),
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
                        'walletAddress' => $wallet['publicKey']
                    ]);
                } elseif ($result['status'] === 'exists_active') {
                    if ($this->debug === 1) {
                        log_message('debug', $result['message']);
                    }
                    return $response->setJSON([
                        'status' => 'exists_active',
                        'message' => $result['message'],
                        'publicKey' => $wallet['publicKey'],
                        'walletAddress' => $wallet['publicKey']
                    ]);
                } else {
                    if ($this->debug === 1) {
                        log_message('debug', $result['message']);
                    }
                    return $response->setJSON([
                        'status' => 'success',
                        'message' => $result['message'],
                        'publicKey' => $wallet['publicKey'],
                        'walletAddress' => $wallet['publicKey']
                    ]);
                }
            } catch (\Exception $e) {
                log_message('error', 'Error importing wallet: ' . $e->getMessage());
                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
            }
        }
    }

    public function updateSolanaTokens() {
        try {
            $tokens = $this->dexScreener->getAvailableTokens();
            return $this->response->setJSON(['status' => 'success', 'tokens' => $tokens]);
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function updateSolanaPrices()
    {
        try {
            $this->dexScreener->updateSolanaTokenPrices();
            return $this->response->setJSON(['status' => 'success']);
        } catch (\Exception $e) {
            log_message('debug', 'MyMIDexScreener L412: Logging updateSolanaPrices Not Completed.' . $e->getMessage()); 
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    

    public function health()
    {
        $requestId = bin2hex(random_bytes(8));
        $network = env('SOLANA_NETWORK') ?: 'devnet';

        $data = [
            'route' => 'ok',
            'service' => 'solana',
            'network' => $network,
            'rpc_status' => 'not_checked',
        ];

        $errors = [];

        try {
            $solanaService = $this->resolveSolanaServiceForHealth();

            if ($solanaService !== null && method_exists($solanaService, 'getSafeNetworkStatus')) {
                $data['rpc_status'] = 'checked';
                $data['network_status'] = $solanaService->getSafeNetworkStatus();
            } else {
                $data['rpc_status'] = 'unavailable';
                $errors['service'] = 'SolanaService is unavailable or getSafeNetworkStatus() is not implemented.';
            }
        } catch (\Throwable $e) {
            $data['rpc_status'] = 'error';
            $errors['exception'] = $e->getMessage();

            log_message('warning', 'Solana health check degraded: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return $this->response->setStatusCode(200)->setJSON([
            'success' => true,
            'message' => empty($errors)
                ? 'Solana health route is available.'
                : 'Solana health route is available with warnings.',
            'data' => $data,
            'errors' => $errors,
            'meta' => [
                'request_id' => $requestId,
                'network' => $network,
                'timestamp' => date('c'),
            ],
        ]);
    }


    public function getBalance($address)
    {
        try {
            $lamports = service('solanaService')->getBalanceLamports((string) $address);
            return $this->response->setJSON($this->jsonEnvelope(true, 'Balance loaded.', ['address' => $address, 'lamports' => $lamports]));
        } catch (\Throwable $e) {
            return $this->response->setJSON($this->jsonEnvelope(false, 'Unable to load balance.', [], ['exception' => $e->getMessage()]));
        }
    }

    public function getTokenAccounts($address)
    {
        try {
            $tokens = service('solanaService')->getTokenAccounts((string) $address);
            return $this->response->setJSON($this->jsonEnvelope(true, 'Token accounts loaded.', ['address' => $address, 'tokens' => $tokens]));
        } catch (\Throwable $e) {
            return $this->response->setJSON($this->jsonEnvelope(false, 'Unable to load token accounts.', [], ['exception' => $e->getMessage()]));
        }
    }

    public function transfer()
    {
        $guard = $this->solanaTransactionGuard('transfer');
        if ($guard !== null) {
            return $guard;
        }

        $service = service('solanaService');
        $result = $service->transfer((string) $this->request->getPost('from'), (string) $this->request->getPost('to'), (string) $this->request->getPost('amount'), ['network' => (string) ($this->request->getPost('network') ?? $service->currentNetwork())]);
        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? false), (string) ($result['message'] ?? 'Transfer prepared.'), $result));
    }

    public function quote()
    {
        $guard = $this->solanaTransactionGuard('quote');
        if ($guard !== null) {
            return $guard;
        }

        $payload = (array) ($this->request->getJSON(true) ?? $this->request->getPost());
        $result = service('solanaService')->getQuote($payload);
        return $this->response->setJSON($this->jsonEnvelope(true, 'Quote loaded.', ['quote' => $result]));
    }

    public function swap()
    {
        $guard = $this->solanaTransactionGuard('swap');
        if ($guard !== null) {
            return $guard;
        }

        $payload = (array) ($this->request->getJSON(true) ?? $this->request->getPost());
        $result = service('solanaService')->swap($payload);
        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? ! isset($result['allowed'])), (string) ($result['message'] ?? 'Swap request processed.'), $result));
    }

    public function mint()
    {
        $guard = $this->solanaTransactionGuard('mint');
        if ($guard !== null) {
            return $guard;
        }

        $service = service('solanaService');
        $result = $service->mintTo((string) $this->request->getPost('mint'), (string) $this->request->getPost('dest'), (string) $this->request->getPost('amount'), (string) ($this->request->getPost('network') ?? $service->currentNetwork()));
        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? false), (string) ($result['message'] ?? 'Mint request processed.'), $result));
    }


    public function preview()
    {
        try {
            $payload = $this->request->getJSON(true);

            if (! is_array($payload)) {
                $payload = $this->request->getPost();
            }

            if (! is_array($payload)) {
                $payload = [];
            }

            $sensitiveKeys = ['private_key', 'privateKey', 'secret_key', 'secretKey', 'seed_phrase', 'seedPhrase', 'mnemonic'];
            $sanitizedPayload = array_diff_key($payload, array_flip($sensitiveKeys));

            $action = strtolower((string) ($sanitizedPayload['action'] ?? 'swap'));
            $allowedActions = ['swap', 'transfer', 'mint', 'create_token', 'createToken'];

            if (! in_array($action, $allowedActions, true)) {
                return $this->response->setStatusCode(422)->setJSON($this->jsonEnvelope(
                    false,
                    'Unsupported Solana preview action.',
                    [
                        'allowed_actions' => $allowedActions,
                        'dry_run' => true,
                        'broadcast' => false,
                    ],
                    ['action' => 'Unsupported action requested.']
                ));
            }

            $network = strtolower((string) ($sanitizedPayload['network'] ?? env('SOLANA_NETWORK', 'mainnet')));
            $amount = (string) ($sanitizedPayload['amount'] ?? '0');
            $fromToken = (string) ($sanitizedPayload['from_token'] ?? $sanitizedPayload['from'] ?? 'SOL');
            $toToken = (string) ($sanitizedPayload['to_token'] ?? $sanitizedPayload['to'] ?? 'USDC');
            $slippageBps = (int) ($sanitizedPayload['slippage_bps'] ?? $sanitizedPayload['slippageBps'] ?? 50);

            $previewInput = [
                'action' => $action,
                'network' => $network,
                'from_token' => $fromToken,
                'to_token' => $toToken,
                'amount' => $amount,
                'slippage_bps' => $slippageBps,
                'payload' => $sanitizedPayload,
            ];

            $previewId = substr(hash('sha256', json_encode($previewInput) . '|' . date('YmdHi')), 0, 24);

            $preview = [
                'preview_id' => $previewId,
                'action' => $action,
                'network' => $network,
                'dry_run' => true,
                'broadcast' => false,
                'signature_required' => true,
                'wallet_signature_required' => true,
                'private_key_submission_allowed' => false,
                'mainnet_broadcast_allowed' => false,
                'mainnet_mint_allowed' => false,
                'status' => 'preview_only',
                'quote' => [
                    'from_token' => $fromToken,
                    'to_token' => $toToken,
                    'input_amount' => $amount,
                    'estimated_output' => null,
                    'slippage_bps' => $slippageBps,
                    'quote_source' => 'preview_envelope',
                ],
                'estimated_fees' => [
                    'network_fee_sol' => '0.000005',
                    'platform_fee' => '0',
                    'currency' => 'SOL',
                    'note' => 'Estimated fee placeholder for preview only; no transaction was simulated or broadcast.',
                ],
                'warnings' => [
                    'This is a dry-run preview envelope only.',
                    'No transaction was signed.',
                    'No transaction was broadcast.',
                    'Mainnet minting remains disabled by default.',
                    'Private keys are not accepted or returned by this endpoint.',
                ],
                'next_required_steps' => [
                    'Render preview to user.',
                    'Require wallet ownership/signature confirmation.',
                    'Run preflight simulation before any future non-dry-run execution.',
                    'Keep broadcast disabled unless explicitly approved by configuration.',
                ],
            ];

            return $this->response->setJSON($this->jsonEnvelope(
                true,
                'Solana transaction preview generated. No transaction was broadcast.',
                ['preview' => $preview]
            ));
        } catch (\Throwable $e) {
            log_message('error', 'Solana preview envelope failed: ' . $e->getMessage());

            return $this->response->setStatusCode(500)->setJSON($this->jsonEnvelope(
                false,
                'Unable to generate Solana transaction preview.',
                [
                    'dry_run' => true,
                    'broadcast' => false,
                    'signature_required' => true,
                ],
                ['exception' => 'Preview generation failed safely.']
            ));
        }
    }

    private function solanaTransactionGuard(string $action)
    {
        $config = config(\Config\Solana::class);

        $requestMethod = strtoupper((string) $this->request->getMethod());
        $actionKey = strtolower($action);

        $transactionActions = [
            'createsolanawallet',
            'createtoken',
            'executeswap',
            'importwallet',
            'mint',
            'minttokens',
            'purchasesolana',
            'sellsolana',
            'swap',
            'swapsolana',
            'doswap',
            'transfer',
        ];

        if (!in_array($actionKey, $transactionActions, true)) {
            return null;
        }

        if ($requestMethod === 'GET' && !in_array($actionKey, ['executeswap', 'transfer', 'swap', 'mint', 'minttokens', 'doswap'], true)) {
            return null;
        }

        $network = strtolower((string) (
            $this->request->getPost('network')
            ?? $this->request->getGet('network')
            ?? env('SOLANA_NETWORK', 'mainnet')
        ));

        $dryRunRaw = $this->request->getPost('dry_run')
            ?? $this->request->getPost('dryRun')
            ?? $this->request->getGet('dry_run')
            ?? $this->request->getGet('dryRun')
            ?? ($config->defaultDryRun ?? true);

        $dryRun = filter_var($dryRunRaw, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
        $dryRun = $dryRun === null ? true : $dryRun;

        $signature = trim((string) (
            $this->request->getPost('wallet_signature')
            ?? $this->request->getPost('signature')
            ?? $this->request->getHeaderLine('X-Wallet-Signature')
        ));

        $isMainnet = str_contains($network, 'mainnet');
        $isMint = in_array($actionKey, ['mint', 'minttokens', 'createtoken'], true);
        $requiresPrivateKeyProtection = in_array($actionKey, ['createsolanawallet', 'importwallet'], true);

        if ($requestMethod === 'GET' && in_array($actionKey, ['executeswap', 'transfer', 'swap', 'mint', 'minttokens', 'doswap'], true)) {
            return $this->response
                ->setStatusCode(405)
                ->setJSON($this->jsonEnvelope(false, 'Solana transaction actions must not execute over GET.', [
                    'action' => $action,
                    'dry_run' => true,
                    'broadcast' => false,
                ]));
        }

        if ($requiresPrivateKeyProtection && !($config->allowPrivateKeySubmission ?? false)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON($this->jsonEnvelope(false, 'Private-key based Solana wallet submission is disabled.', [
                    'action' => $action,
                    'dry_run' => true,
                    'broadcast' => false,
                    'requires_config' => 'SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION=true',
                ]));
        }

        if (!($config->allowTransactionExecution ?? false)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON($this->jsonEnvelope(false, 'Solana transaction execution is disabled by configuration.', [
                    'action' => $action,
                    'network' => $network,
                    'dry_run' => true,
                    'broadcast' => false,
                    'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
                ]));
        }

        if ($isMainnet && !($config->allowMainnetBroadcast ?? false)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON($this->jsonEnvelope(false, 'Mainnet Solana broadcast is disabled by configuration.', [
                    'action' => $action,
                    'network' => $network,
                    'dry_run' => true,
                    'broadcast' => false,
                    'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
                ]));
        }

        if ($isMainnet && $isMint && !($config->allowMainnetMint ?? false)) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON($this->jsonEnvelope(false, 'Mainnet Solana minting is disabled by configuration.', [
                    'action' => $action,
                    'network' => $network,
                    'dry_run' => true,
                    'broadcast' => false,
                    'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
                ]));
        }

        if (($config->requireWalletSignature ?? true) && $signature === '' && !$dryRun) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON($this->jsonEnvelope(false, 'Wallet signature is required before Solana transaction execution.', [
                    'action' => $action,
                    'network' => $network,
                    'dry_run' => true,
                    'broadcast' => false,
                    'requires_field' => 'wallet_signature',
                ]));
        }

        if ($dryRun) {
            return $this->response
                ->setStatusCode(202)
                ->setJSON($this->jsonEnvelope(true, 'Solana transaction dry-run/preflight accepted. No transaction was broadcast.', [
                    'action' => $action,
                    'network' => $network,
                    'dry_run' => true,
                    'broadcast' => false,
                ]));
        }

        return null;
    }

    private function jsonEnvelope(bool $success, string $message, array $data = [], array $errors = []): array
    {
        $network = 'devnet';
        try {
            $service = service('solanaService');
            if (is_object($service) && method_exists($service, 'currentNetwork')) {
                $network = $service->currentNetwork();
            }
        } catch (\Throwable $e) {
            $network = 'unknown';
        }

        return [
            'success' => $success,
            'message' => $message,
            'data' => $this->sanitizeWalletPayload($data),
            'errors' => $this->sanitizeWalletPayload($errors),
            'meta' => [
                'request_id' => bin2hex(random_bytes(8)),
                'network' => $network,
                'timestamp' => date('c'),
            ],
        ];
    }

    private function sanitizeWalletPayload(array $wallet): array
    {
        $blocked = ['privateKey', 'private_key', 'access_token', 'secret', 'secret_key', 'secret_key_b64', 'seed', 'seed_b64', 'mnemonic'];
        foreach ($blocked as $key) {
            unset($wallet[$key]);
        }
        foreach ($wallet as $key => $value) {
            if (is_array($value)) {
                $wallet[$key] = $this->sanitizeWalletPayload($value);
            }
        }
        return $wallet;
    }

    private function calculateTransactionFees($amount) {
        $applicationFee = 0.01 * $amount;
        $gasFee = 0.001;
        return $applicationFee + $gasFee;
    }

    // In Exchange/SolanaController.php
    public function provisionDefaultWallet()
    {
        $cuID = (int)($this->session->get('cuID') ?? 0);
        if ($cuID <= 0) return $this->response->setJSON(['success'=>false,'message'=>'No user']);

        try {
            $lib = new \App\Libraries\MyMISolana();
            $kp  = $lib->generateSolanaKeypair();
            $id  = model('SolanaModel')->createDefaultMyMIWallet($cuID, $kp);

            // cache address in session for convenience
            $this->session->set('solana_public_key', $kp['address_base58']);

            return $this->response->setJSON(['success'=>true,'wallet_id'=>$id,'address'=>$kp['address_base58']]);
        } catch (\Throwable $e) {
            log_message('error','ProvisionDefaultWallet failed: '.$e->getMessage());
            return $this->response->setJSON(['success'=>false,'message'=>'Failed: '.$e->getMessage()]);
        }
    }

    private function updateUserBalance($userId, $publicKey, $newBalance) {
        $this->solanaModel->updateUserBalance($userId, $publicKey, $newBalance);
    }

    private function recordTransactionHistory($userId, $fromToken, $toToken, $amount, $fees, $transactionResult) {
        $this->solanaModel->recordTransaction($userId, $fromToken, $toToken, $amount, $fees, $transactionResult);
    }

    private function sendTransactionConfirmation($email, $transactionResult) {
        $this->email->setTo($email);
        $this->email->setSubject('Transaction Confirmation');
        $this->email->setMessage('Your transaction was successful. Transaction ID: ' . $transactionResult);
        $this->email->send();
    }

    private function resolveSolanaServiceForHealth(): ?\App\Services\SolanaService
    {
        try {
            if (
                property_exists($this, 'solanaService')
                && $this->solanaService instanceof \App\Services\SolanaService
            ) {
                return $this->solanaService;
            }

            if (class_exists(\App\Services\SolanaService::class)) {
                $service = new \App\Services\SolanaService();

                if (property_exists($this, 'solanaService')) {
                    $this->solanaService = $service;
                }

                return $service;
            }
        } catch (\Throwable $e) {
            log_message('warning', 'Unable to initialize SolanaService for health check: {message}', [
                'message' => $e->getMessage(),
            ]);
        }

        return null;
    }


    private function encryptSolanaSecretForStorage(?string $secret): ?string
    {
        $secret = trim((string) $secret);

        if ($secret === '') {
            return null;
        }

        try {
            $encrypted = service('encrypter')->encrypt($secret);

            return base64_encode($encrypted);
        } catch (\Throwable $e) {
            log_message('critical', 'Unable to encrypt Solana wallet secret before storage: {message}', [
                'message' => $e->getMessage(),
            ]);

            throw new \RuntimeException('Unable to securely store Solana wallet secret.');
        }
    }

    private function privateKeySubmissionDisabledResponse()
    {
        log_message('warning', 'Blocked browser-submitted Solana private_key payload for endpoint={uri}', [
            'uri' => (string) current_url(),
        ]);

        return $this->response->setStatusCode(403)->setJSON([
            'success' => false,
            'status'  => 'error',
            'message' => 'Private key submission is disabled. Connect a supported wallet provider and use wallet-signed transactions.',
            'errors'  => [
                'reason' => 'wallet_signature_required',
            ],
        ]);
    }


}
