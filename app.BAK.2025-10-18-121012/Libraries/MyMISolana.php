<?php

namespace App\Libraries;

use Config\Services;
use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader, CryptoCurrencyInterface, MyMIUser};
use App\Models\SolanaModel;
use App\Services\SolanaService;
use FurqanSiddiqui\BIP39\BIP39;
use CodeIgniter\HTTP\CURLRequest;
use CodeIgniter\Cache\CacheInterface;

#[\AllowDynamicProperties]
class MyMISolana implements CryptoCurrencyInterface
{

    protected $APIs;
    protected $apiUrl;
    protected $auth;
    protected $cuID;
    protected $debug;
    protected $market;
    protected $request;
    protected $session;
    protected $uri;
    protected $betaApiUrl = 'https://api.devnet.solana.com';
    protected $debugApiUrl = 'https://api.testnet.solana.com';
    protected $prodApiUrl = 'https://api.mainnet-beta.solana.com';
    protected $backupUrl = 'https://solana-api.projectserum.com';
    protected $siteSettings;
    protected $solanaModel;
    protected $MyMIDexScreener;
    protected $MyMIGemini;
    protected $MyMIUser;
    protected $solanaService;
    protected $userAccount;
    protected $cache;

    /** @var string[] */
    private array $rpcEndpoints = [];
    /** @var int */
    private int $httpTimeout = 10;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->APIs = config('APIs');
        $this->market = 'SOL';
        $this->siteSettings = config('SiteSettings');
        if ($this->siteSettings->beta === 1) {
            $this->apiUrl = $this->betaApiUrl; 
        } elseif ($this->siteSettings->debug === 1) {
            $this->apiUrl = $this->debugApiUrl; 
        } elseif (!empty($this->prodApiUrl)) {
            $this->apiUrl = $this->prodApiUrl; 
        } else {
            $this->apiUrl = $this->backupApiUrl; 
        }
        // $this->apiUrl = $this->siteSettings->beta === 1 ? $this->betaApiUrl : $this->prodApiUrl ?? $this->backupUrl;
        // $this->apiUrl = $this->siteSettings->beta === 1 ? $this->betaApiUrl : $this->prodApiUrl;
        $this->debug = $this->siteSettings->debug;
        $this->solanaService = service('solanaService') ?? new SolanaService();
        $this->solanaModel = new SolanaModel();
        $this->MyMIUser = service('MyMIUser');
        $this->cache = \Config\Services::cache();

        $primary  = getenv('SOLANA_RPC_PRIMARY') ?: ($this->apiUrl ?? 'https://api.mainnet-beta.solana.com');
        $fallback = getenv('SOLANA_RPC_FALLBACKS') ?: ($this->backupUrl ?? '');

        $endpoints = array_merge([$primary], array_map('trim', explode(',', $fallback)));
        $this->rpcEndpoints = array_values(array_filter(array_unique($endpoints)));

    }
    
    private function resolveCuID(?int $cuID): ?int
    {
        if (!empty($cuID) && $cuID > 0) return $cuID;
        $session = session();
        $cuID = (int)($session->get('cuID') ?? $session->get('user_id') ?? 0);
        return $cuID > 0 ? $cuID : null;
    }

    public function addMetadata($tokenAddress, $metadata) {
        $client = Services::curlrequest();
        $url = 'https://api.metaplex.com/metadata'; // Replace with actual Metaplex endpoint
        $data = [
            'token_address' => $tokenAddress,
            'metadata' => $metadata
        ];
    
        try {
            $response = $client->post($url, [
                'json' => $data,
                'headers' => ['Content-Type' => 'application/json'],
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            throw new \Exception('Failed to add metadata: ' . $e->getMessage());
        }
    }
    
    public function getUserSolana(?int $cuID = null)
    {
        $cuID = $this->resolveCuID($cuID);
        if ($cuID === null) {
            log_message('error', 'MyMISolana::getUserSolana called without a valid user context; aborting.');
            return null;
        }

        $def            = $this->getUserDefaultSolana($cuID);
        $cuSolanaDW     = $def['cuSolanaDW']    ?? null;
        $addressBase58  = $def['address_b58']   ?? null;

        $cuSolanaTotal  = $def['cuSolanaTotal'] ?? 0;
        $cuSolanaAssets = ($this->siteSettings->solanaUserAssets === 1)
                            ? $this->solanaModel->getUserTokens($cuID)
                            : [];

        $solanaPrice    = $this->getSolanaPrice();
        $cuSolanaValue  = $cuSolanaTotal * $solanaPrice;
        $cuSolanaPerc   = $this->calculateUserSolanaPercentage($cuSolanaTotal, $cuSolanaValue);
        $netStatus      = $this->getNetworkStatus();
        $marketData     = $this->getSolanaMarketData();

        // Transactions need the Base58 address (never hex)
        $transactions   = $this->getTransactions($cuID, $addressBase58);
        $plData         = $this->calculatePL($transactions);

        return [
            'cuSolanaDW'        => $cuSolanaDW,
            'solanaNetworkStatus'=> $netStatus,
            'cuSolanaTotal'     => $cuSolanaTotal,
            'cuSolanaValue'     => $cuSolanaValue,
            'cuSolanaPercentage'=> $cuSolanaPerc,
            'solanaPrice'       => $solanaPrice,
            'solanaMTDPL'       => $plData['mtd']    ?? 'N/A',
            'solanaDailyPL'     => $plData['daily']  ?? 'N/A',
            'solanaHourlyPL'    => $plData['hourly'] ?? 'N/A',
            'solanaMarketCap'   => $marketData['market_cap'] ?? '0.00',
            'solanaDailyVolume' => $marketData['volume_array']['h24'] ?? 0,
            'solanaHourlyVolume'=> $marketData['volume_array']['h1']  ?? 0,
        ];
    }

    public function getSolanaTokens() { 
        $getSolanaTokens            = $this->solanaModel->getTopListedTokens();
        // Initialize the array
        $allSolanaTokens            = [];
        $solanaTokenDiscord         = [];
        $solanaTokenFacebook        = [];
        $solanaTokenXTwitter        = [];
        $solanaTokenWebsite         = [];
        
        foreach ($getSolanaTokens as $token) {
            $allSolanaTokens[] = $token; // Add to the general list
            
            if (!empty($token['discord'])) {
                $solanaTokenDiscord[] = $token;
            }
            if (!empty($token['facebook'])) {
                $solanaTokenFacebook[] = $token;
            }
            if (!empty($token['twitter'])) {
                $solanaTokenXTwitter[] = $token;
            }
            if (!empty($token['website'])) {
                $solanaTokenWebsite[] = $token;
            }
        }
        $solanaTokens = [
            'all'                       => $allSolanaTokens,
            'discord'                   => $solanaTokenDiscord,
            'facebook'                  => $solanaTokenFacebook,
            'x_twitter'                 => $solanaTokenXTwitter,
            'website'                   => $solanaTokenWebsite,
        ];
        return $solanaTokens;
    }    

    // Implement all methods from the interface
    public function generateWallet()
    {
        if (function_exists('sodium_crypto_sign_keypair')) {
            $keypair = sodium_crypto_sign_keypair();
            $publicKey = sodium_crypto_sign_publickey($keypair);
            $secretKey = sodium_crypto_sign_secretkey($keypair);
            return [
                'privateKey' => bin2hex($secretKey),
                'publicKey' => bin2hex($publicKey)
            ];
        } else {
            throw new \Exception("Sodium is not available on this server.");
        }
    }

    public function signTransaction($transaction, $privateKey)
    {
        $transaction['signature'] = hash_hmac('sha256', json_encode($transaction), $privateKey);
        return $transaction;
    }

    public function verifySignature($transaction, $signature, $publicKey)
    {
        $validSignature = hash_hmac('sha256', json_encode($transaction), hex2bin($publicKey));
        return hash_equals($validSignature, $signature);
    }
    
    // public function createToken($name, $symbol, $supply) {
    //     $client = Services::curlrequest();
    //     $params = [
    //         'name' => $name,
    //         'symbol' => $symbol,
    //         'supply' => $supply
    //     ];

    //     try {
    //         $response = $client->post($this->apiUrl . '/createToken', [
    //             'json' => $params,
    //             'headers' => [
    //                 'Content-Type' => 'application/json',
    //             ],
    //         ]);

    //         $body = json_decode($response->getBody(), true);
    //         if ($response->getStatusCode() == 200) {
    //             return ['status' => 'success', 'token' => $body['result']];
    //         } else {
    //             return ['status' => 'error', 'message' => $body['error']];
    //         }
    //     } catch (\Exception $e) {
    //         return ['status' => 'error', 'message' => $e->getMessage()];
    //     }
    // }

    public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount)
    {
        $transactionData = [
            'from' => $fromAddress,
            'to' => $toAddress,
            'assetId' => $assetId,
            'value' => $amount
        ];
        $signedTransaction = $this->signTransaction($transactionData, $privateKey);
        return 'Transaction ID: ' . hash('sha256', json_encode($signedTransaction));
    }

    public function getTransactionStatus($transactionId)
    {
        return $this->sendRequest('getTransactionStatus', [$transactionId]);
    }

    // public function getBalance($publicKey)
    // {
    //     $method = 'getBalance';
    //     $params = [
    //         [$publicKey],
    //         ['commitment' => 'confirmed']
    //     ];
    
    //     try {
    //         $response = $this->sendJsonRpcRequest($method, $params);
    //         return $response['result']['value']; // Adjust this based on the structure of Solana's API response
    //     } catch (\Exception $e) {
    //         log_message('error', 'Error fetching Solana balance: ' . $e->getMessage());
    //         return null;
    //     }
    // }    

    public function validateAddress($address)
    {
        return filter_var($address, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^[1-9A-HJ-NP-Za-km-z]{32,44}$/']]) !== false;
    }

    public function getCurrentBlock()
    {
        return $this->sendRequest('getCurrentBlock', []);
    }

    private function encKey(): string
    {
        $k = getenv('MYMI_KMS_KEY') ?: '';
        if (str_starts_with($k, 'base64:')) $k = base64_decode(substr($k, 7), true) ?: '';
        if ($k === '' || strlen($k) !== 32) {
            throw new \RuntimeException('MYMI_KMS_KEY invalid; must be 32 bytes (base64).');
        }
        return $k;
    }

    private function encryptSecret(string $secret): string
    {
        $iv  = random_bytes(12);
        $tag = '';
        $ct  = openssl_encrypt($secret, 'aes-256-gcm', $this->encKey(), OPENSSL_RAW_DATA, $iv, $tag);
        if ($ct === false) throw new \RuntimeException('Encrypt failed');
        return base64_encode($iv.$tag.$ct);
    }

    private function decryptSecret(string $blob): string
    {
        $raw = base64_decode($blob, true);
        $iv  = substr($raw, 0, 12);
        $tag = substr($raw, 12, 16);
        $ct  = substr($raw, 28);
        $pt  = openssl_decrypt($ct, 'aes-256-gcm', $this->encKey(), OPENSSL_RAW_DATA, $iv, $tag);
        if ($pt === false) throw new \RuntimeException('Decrypt failed');
        return $pt;
    }

    /** Generate ed25519 keypair + base58 pub; return array. */
    public function generateSolanaKeypair(): array
    {
        if (!function_exists('sodium_crypto_sign_keypair')) {
            throw new \RuntimeException('libsodium is required');
        }
        $kp   = sodium_crypto_sign_keypair();
        $sk   = sodium_crypto_sign_secretkey($kp); // 64 bytes (seed+pub)
        $pk   = sodium_crypto_sign_publickey($kp); // 32 bytes

        // base58 encode pubkey
        $b58  = null;
        if (class_exists(\App\Services\SolanaService::class)) {
            $svc = new \App\Services\SolanaService();
            $ref = new \ReflectionClass($svc);
            // reuse service encoder through normalize helper (quick hack)
            $b58 = $ref->hasMethod('b58encodeFromBinary')
                ? $ref->getMethod('b58encodeFromBinary')->invoke($svc, $pk)
                : null;
        }
        if (!$b58) { throw new \RuntimeException('No base58 encoder available'); }

        // encrypt secret for storage
        $secretEnc = $this->encryptSecret($sk);

        return [
            'address_base58' => $b58,
            'public_key_hex' => bin2hex($pk),
            'secret_enc'     => $secretEnc,
        ];
    }

    public function estimateTransactionFee()
    {
        return $this->sendRequest('estimateTransactionFee', []);
    }

    public function getNetworkStatus()
    {
        $apiUrl = 'https://status.solana.com/api/v2';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $this->apiUrl);
            $status = $response->getStatusCode();
            if ($status === 403) {
                log_message('warning', 'MyMISolana - 403 from Solana RPC. Suppressing in UI and returning empty result.');
                return [];
            }
            if ($status !== 200) {
                throw new \Exception('Failed to fetch network status. HTTP ' . $status);
            }
            return json_decode($response->getBody(), true);
        } catch (\Throwable $e) {
            log_message('error', 'MyMISolana request failed: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    public function deployContract($contractCode, $constructorParameters)
    {
        $deployData = [
            'code' => $contractCode,
            'parameters' => $constructorParameters
        ];
        return $this->sendRequest('deployContract', [$deployData]);
    }

    public function callContractFunction($contractAddress, $functionName, $parameters)
    {
        $callData = [
            'address' => $contractAddress,
            'function' => $functionName,
            'parameters' => $parameters
        ];
        return $this->sendRequest('callContractFunction', [$callData]);
    }
    
    /**
     * Create a default custodial Solana wallet for the user and persist it.
     * Stores only the base58 public key in coin_address; you should encrypt/store the secret elsewhere.
     */
    public function createDefaultSolanaWallet(int $cuID)
    {
        if ($cuID <= 0) {
            log_message('error', 'MyMISolana::createDefaultSolanaWallet invalid cuID; aborting.');
            return null;
        }

        // generate or fetch address from your SolanaService/Key mgmt
        $address = $this->solanaService->generateAddressForUser($cuID); // implement in SolanaService
        if (empty($address)) {
            log_message('error', 'MyMISolana::createDefaultSolanaWallet failed to generate address for user {uid}.', ['uid' => $cuID]);
            return null;
        }

        $insertId = $this->solanaModel->attachExternalWallet($cuID, $address, 'MyMI Solana Wallet');
        if ($insertId === null) {
            log_message('error', 'MyMISolana::createDefaultSolanaWallet insert failed for user {uid}.', ['uid' => $cuID]);
            return null;
        }

        return $this->solanaModel->getWalletById($insertId);
    }

    /**
     * Return the default Solana wallet for a user, provisioning one if missing.
     * Normalizes the address to base58 and exposes it at ['address_b58'].
     */
    public function getUserDefaultSolana($cuID = null)
    {
        $cuID = $this->resolveCuID($cuID);
        if ($cuID === null) {
            log_message('error', 'MyMISolana::getUserDefaultSolana missing user; aborting.');
            return null;
        }

        // Canonical source for the Base58 address
        $row = $this->solanaModel->getDefaultAddressFromExchangeTable((int)$cuID);

        if (!$row) {
            log_message('debug', "No default Solana wallet for user {$cuID}; provisioning...");
            $wallet = $this->createDefaultSolanaWallet((int)$cuID);
            // $wallet may be a row; if ID is returned, fetch it:
            if (is_numeric($wallet)) {
                $row = $this->solanaModel->getWalletById($wallet);
            } elseif (is_array($wallet)) {
                $row = $wallet;
            }
        }

        $addr = null;
        if (is_array($row) && !empty($row['address'])) {
            $addr = $this->solanaService->normalizeAddress($row['address']);
            if ($addr && $this->solanaService->isValidPublicKey($addr)) {
                session()->set('solana_public_key', $addr);
            }
        }

        return [
            'cuSolanaDW'    => $row,            // original structure used by views
            'address_b58'   => $addr,           // normalized Base58 address
            'cuSolanaTotal' => 0,               // caller computes totals as needed
        ];
    }

    public function provisionDefaultPublicAddress(int $cuID): ?array
    {
        if ($cuID <= 0) {
            return null;
        }
        $addr = service('solanaService')->generateAddressForUser($cuID);
        if (!$addr) {
            return null;
        }
        $id = model(\App\Models\SolanaModel::class)
                ->attachExternalWallet($cuID, $addr, 'MyMI Solana Wallet');
        if (!$id) {
            return null;
        }
        $row = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
        if ($row && isset($row['address'])) {
            session()->set('solana_public_key', $row['address']);
        }
        return $row;
    }

    private function calculateUserSolanaPercentage($total, $value)
    {
        if ($total <= 0) return 0;
        return ($value / $total) * 100;
    }
    
    public function getMarketPrice()
    {
        $cacheKey = 'solana_price';
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedPrice = $this->cache->get($cacheKeySanitized);
        if ($cachedPrice) {
            return $cachedPrice;
        }

        $url = 'https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd';
        $options = ['http' => ['header' => 'User-Agent: MyMIWallet/1.0']];
        $context = stream_context_create($options);
        $attempt = 0;
        $maxAttempts = 5;
        $delay = 1;
        while ($attempt < $maxAttempts) {
            $response = @file_get_contents($url, false, $context);
            if ($response !== false) {
                $data = json_decode($response, true);
                $price = $data['solana']['usd'] ?? 0;
                // $this->cache->save($cacheKey, $price, 300); // Cache for 5 minutes
                return $price;
            }
            $attempt++;
            sleep($delay);
        }
        log_message('error', 'Failed to fetch Solana price after ' . $maxAttempts . ' attempts.');
        return 0;
    }
    
    public function getSolanaPrice()
    {
        $cacheKey = 'solana_price';
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedPrice = $this->cache->get($cacheKeySanitized);
        if ($cachedPrice) {
            return $cachedPrice;
        }
    
        $url = 'https://api.coingecko.com/api/v3/simple/price?ids=solana&vs_currencies=usd';
        $options = ['http' => ['header' => 'User-Agent: MyMIWallet/1.0']];
        $context = stream_context_create($options);
    
        $attempt = 0;
        $maxAttempts = 5;
        $delay = 1; // Increase delay between retries to handle rate-limiting better.
    
        while ($attempt < $maxAttempts) {
            $response = @file_get_contents($url, false, $context);
            if ($response !== false) {
                $data = json_decode($response, true);
                $price = $data['solana']['usd'] ?? 0;
    
                // Cache response for 10 minutes.
                $this->cache->save($cacheKeySanitized, $price, 600);
                return $price;
            }
            $attempt++;
            $delay = pow(2, $attempt); // Exponential backoff.
            sleep($delay);
        }
    
        log_message('error', 'Failed to fetch Solana price after ' . $maxAttempts . ' attempts.');
        return 0; // Return fallback value.
    }
    
    public function getSolanaMarketData()
    {
        $cacheKey = 'solana_market_data';
        $cacheKeySanitized = sanitizeCacheKey($cacheKey);
        $cachedMarketData = $this->cache->get($cacheKeySanitized);

        if ($cachedMarketData) {
            return $cachedMarketData;
        }
    
        // Fetch market data from the Solana model
        $getMarketData = $this->solanaModel->getSOLMarketData();
        
        // Ensure that the market data is an array before processing
        $getMarketVolume = is_string($getMarketData['volume']) ? json_decode($getMarketData['volume'], true) : $getMarketData['volume'];
        $getMarketVolumeArray = is_string($getMarketData['volume_array']) ? json_decode($getMarketData['volume_array'], true) : $getMarketData['volume_array'];
    
        // Handle cases where the volume data may not be an array (e.g., float or other types)
        if (!is_array($getMarketVolumeArray)) {
            log_message('error', 'Expected volume_array to be an array but received: ' . print_r($getMarketVolumeArray, true));
            $getMarketVolumeArray = [
                'h24' => 0,
                'h6' => 0,
                'h1' => 0,
                'm5' => 0
            ];
        }
    
        $dailyVolume = $getMarketVolumeArray['h24'] ?? 0;
        $sixHourVolume = $getMarketVolumeArray['h6'] ?? 0;
        $hourlyVolume = $getMarketVolumeArray['h1'] ?? 0;
        $fiveMinuteVolume = $getMarketVolumeArray['m5'] ?? 0;
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('critical', 'Failed to decode volume_array JSON: ' . json_last_error_msg());
            return json_encode(['error' => 'Failed to decode volume_array JSON'], true);
        }
    
        if ($this->debug === 1) {
            // log_message('debug', 'MyMISolana L383 - getSolanaMarketData - Volume Data: ' . print_r($getMarketVolumeArray, true));
        }
    
        // Construct the market data array
        $marketData = [
            'currentPrice' => $getMarketData['coin_value'] ?? 0.0,
            'market_cap' => $getMarketData['fdv'] ?? 0.0,
            'volume' => $getMarketVolume,
            'volume_array' => $getMarketVolumeArray,
            'dailyVolume' => $dailyVolume,
            'sixHourVolume' => $sixHourVolume,
            'hourlyVolume' => $hourlyVolume,
            'fiveMinuteVolume' => $fiveMinuteVolume,
        ];

        // $this->cache->save($cacheKeySanitized, $marketData, 300); // Cache for 5 minutes
        $this->cache->save($cacheKeySanitized, $marketData, 600); // Cache for 10 minutes
        return $marketData;
    }   

    public function getAssetByID($assetID) {
        $getTokenInfo = $this->solanaModel->getTokenInfoByID($assetID); 
        return $getTokenInfo; 
    }
    
    public function getAssets($publicKey)
    {
        $response = $this->sendJsonRpcRequest('getTokenAccountsByOwner', [
            $publicKey,
            ['programId' => 'TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA'],
            ['encoding' => 'jsonParsed']
        ]);

        if (isset($response['error'])) {
            log_message('error', 'MyMISolana::getAssets - RPC error: ' . json_encode($response['error']));
            return [];
        }
        return $response['result']['value'] ?? [];
    }

    public function getTransactions(int $cuID, ?string $address = null): array
    {
        // Resolve a string address if missing
        if (!$address) {
            $sessionAddr = session('solana_public_key');
            if (is_string($sessionAddr) && $sessionAddr !== '') {
                $address = $sessionAddr;
            } else {
                $row     = model(\App\Models\SolanaModel::class)->getDefaultAddressFromExchangeTable($cuID);
                $address = is_array($row) ? ($row['address'] ?? null) : null;
            }
        }

        if (!is_string($address) || $address === '') {
            log_message('error', 'getTransactions: no address for user '.$cuID);
            return [];
        }

        $normalized = null;
        try { $normalized = $this->solanaService->normalizeAddress($address); } catch (\Throwable $e) {}
        if (!$normalized || !$this->solanaService->isValidPublicKey($normalized)) {
            log_message('error', 'getTransactions: invalid Base58 address param; got '.gettype($address));
            return [];
        }

        session()->set('solana_public_key', $normalized);

        try {
            $res = $this->solanaService->getSignaturesForAddress($normalized, 100);
            $out = $res['result'] ?? $res['value'] ?? $res ?? [];
            return is_array($out) ? $out : [];
        } catch (\Throwable $e) {
            log_message('error', 'getTransactions exception: '.$e->getMessage());
            return [];
        }
    }

    private function rpc(string $method, array $params = [])
    {
        $payload = [
            'jsonrpc' => '2.0',
            'id'      => 1,
            'method'  => $method,
            'params'  => $params,
        ];
        $res = $this->sendRequest(null, $payload, 'POST');
        if (isset($res['error'])) {
            log_message('error', 'RPC error ' . $method . ': ' . json_encode($res['error']));
            return null;
        }
        return $res['result'] ?? null;
    }

    public function saveTransactions($publicKey, $cuID, $userEmail)
    {
        $transactions = $this->getTransactions($publicKey) ?? [];
        foreach ($transactions as $transaction) {
            $blockTime = $transaction['blockTime'] ?? null;

            if (!$blockTime || !is_numeric($blockTime)) {
                log_message('error', '❌ Invalid blockTime in transaction: ' . print_r($transaction, true));
                continue; // Skip this transaction
            }
            
            $existingTransaction = $this->solanaModel->getTransactionBySignature($transaction['signature']);
            if (!$existingTransaction) {
                $data = [
                    'active' => 1,
                    'status' => 'completed',
                    'unix_timestamp' => (int) $blockTime,
                    'current_date'   => date('Y-m-d', $blockTime),
                    'month' => date('m', $transaction['blockTime']),
                    'day' => date('d', $transaction['blockTime']),
                    'year' => date('Y', $transaction['blockTime']),
                    'time' => date('H:i:s', $transaction['blockTime']),
                    'trade_type' => 'swap',
                    'beta' => $this->siteSettings->beta,
                    'user_id' => $cuID,
                    'user_email' => $userEmail,
                    'trading_account' => $publicKey,
                    'wallet_id' => $transaction['signature'],
                    'market_pair' => 'SOL',
                    'market' => 'Solana',
                    'initial_value' => 0,
                    'available_coins' => 0,
                    'amount' => 0,
                    'remaining_amount' => 0,
                    'minimum_purchase' => 0,
                    'total' => 0,
                    'remaining_coins' => 0,
                    'gas_fee' => 0,
                    'user_gas_fee' => 0,
                    'trans_percent' => 0,
                    'user_trans_percent' => 0,
                    'trans_fee' => 0,
                    'user_trans_fees' => 0,
                    'fees' => 0,
                    'total_cost' => 0,
                    'current_value' => 0,
                    'new_availability' => 0,
                    'initial_coin_value' => 0,
                    'new_coin_value' => 0,
                ];
                $this->solanaModel->saveTransaction($data);
            }
        }
    }

    protected function calculatePL($transactions)
    {
        $dailyPL = 0;
        $hourlyPL = 0;
        $mtdPL = 0;
        $currentTime = time();
        $oneDay = 86400;
        $oneHour = 3600;
        $startOfMonth = strtotime(date('Y-m-01 00:00:00'));
        foreach ($transactions as $transaction) {
            $transactionTime = strtotime($transaction['blockTime']);
            $amount = $transaction['amount'] ?? 0;
            if ($transactionTime >= $currentTime - $oneDay) {
                $dailyPL += $amount;
            }
            if ($transactionTime >= $currentTime - $oneHour) {
                $hourlyPL += $amount;
            }
            if ($transactionTime >= $startOfMonth) {
                $mtdPL += $amount;
            }
        }
        return [
            'daily' => $dailyPL,
            'hourly' => $hourlyPL,
            'mtd' => $mtdPL,
        ];
    }

    protected function getUserSolanaAssets($publicKey)
    {
        $response = $this->sendJsonRpcRequest('getTokenAccountsByOwner', [
            $publicKey,
            ['programId' => 'TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA'],
            ['encoding' => 'jsonParsed']
        ]);

        if (isset($response['error'])) {
            log_message('error', 'MyMISolana::getAssets - RPC error: ' . json_encode($response['error']));
            return [];
        }
        return $response['result']['value'] ?? [];
    }

    protected function getTopPerformers($assets)
    {
        usort($assets, function ($a, $b) {
            return $b['performance'] <=> $a['performance'];
        });
        return array_slice($assets, 0, 5);
    }

    /**
     * Smart HTTP requester for both JSON-RPC (Solana) and REST-ish endpoints.
     *
     * Usage:
     *  - JSON-RPC: sendRequest(null, $payload, 'POST')  // posts to BASE URL
     *  - REST:     sendRequest('path', ['k'=>'v'], 'GET'|'POST') // appends /path
     */
    private function sendRequest(?string $endpoint, array $data = [], string $method = 'POST', array $extraHeaders = [])
    {
        $client    = \Config\Services::curlrequest();
        $isJsonRpc = isset($data['jsonrpc']) && isset($data['method']);

        $headers = array_merge(['Content-Type' => 'application/json'], $extraHeaders);

        $makeUrl = function (string $base) use ($endpoint, $isJsonRpc): string {
            $base = rtrim($base, '/');
            if ($isJsonRpc) return $base; // JSON-RPC posts to base only
            if (!$endpoint) return $base;
            return $base . '/' . ltrim($endpoint, '/');
        };

        $attemptsPerEndpoint = 2;     // 1 try + 1 retry
        $backoffUs           = 250000;

        $lastError = null;
        foreach ($this->rpcEndpoints as $base) {
            $url = $makeUrl($base);

            for ($i = 0; $i < $attemptsPerEndpoint; $i++) {
                try {
                    $options = ['headers' => $headers, 'timeout' => $this->httpTimeout];

                    if (strtoupper($method) === 'POST') {
                        $options['json'] = $data;
                    } else {
                        if (!$isJsonRpc && !empty($data)) {
                            $url .= (str_contains($url, '?') ? '&' : '?') . http_build_query($data);
                        }
                    }

                    log_message('debug', sprintf('HTTP %s %s | payload:%s', $method, $url, json_encode($data)));

                    $resp  = $client->request($method, $url, $options);
                    $code  = (int) $resp->getStatusCode();
                    $body  = $resp->getBody();

                    if ($code >= 500 || $code === 429 || $code === 408 || $code === 403) {
                        throw new \RuntimeException("HTTP $code");
                    }
                    if (!is_string($body)) {
                        throw new \RuntimeException('Non-string body');
                    }

                    $decoded = json_decode($body, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        throw new \RuntimeException('JSON decode error: ' . json_last_error_msg());
                    }

                    if ($isJsonRpc && isset($decoded['error'])) {
                        return ['error' => $decoded['error']]; // normalize
                    }
                    return $decoded;
                } catch (\Throwable $e) {
                    $lastError = $e;
                    log_message('error', sprintf('sendRequest attempt %d failed for %s | %s', $i + 1, $url, $e->getMessage()));
                    usleep($backoffUs);
                }
            }
            log_message('error', 'sendRequest moving to next RPC endpoint after failures: ' . $base);
        }

        return ['error' => true, 'message' => 'All RPC endpoints failed: ' . ($lastError?->getMessage() ?? 'unknown')];
    }

    public function createSPLToken($privateKey, $decimals = 9) {
        $url = $this->apiUrl . '/createToken';
        $client = \Config\Services::curlrequest();
        $params = [
            'privateKey' => $privateKey,
            'decimals' => $decimals
        ];
    
        try {
            $response = $client->post($url, [
                'json' => $params,
                'headers' => ['Content-Type' => 'application/json'],
            ]);
            $body = json_decode($response->getBody(), true);
            if ($response->getStatusCode() == 200) {
                return ['status' => 'success', 'tokenAddress' => $body['result']['tokenAddress']];
            } else {
                log_message('debug', 'MyMISolana L594 - $response Array: ' . (print_r($response, true))); 
                return ['status' => 'error', 'message' => $body['error']];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
    
    public function mintTokens($privateKey, $mintAddress, $amount) {
        $url = $this->apiUrl . '/mint';
        $client = \Config\Services::curlrequest();
        $params = [
            'privateKey' => $privateKey,
            'mintAddress' => $mintAddress,
            'amount' => $amount
        ];
    
        try {
            $response = $client->post($url, [
                'json' => $params,
                'headers' => ['Content-Type' => 'application/json'],
            ]);
            $body = json_decode($response->getBody(), true);
            if ($response->getStatusCode() == 200) {
                return ['status' => 'success', 'transactionId' => $body['result']['transactionId']];
            } else {
                return ['status' => 'error', 'message' => $body['error']];
            }
        } catch (\Exception $e) {
            return ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
    
    public function connectSolflareWallet() {
        return ['connect_url' => 'https://solflare.com/connect'];
    }
    
    public function connectPhantomWallet() {
        return ['connect_url' => 'https://phantom.app/connect'];
    }    
    
    public function sendJsonRpcRequest($method, $params)
    {
        $request = [
            'jsonrpc' => '2.0',
            'method'  => $method,
            'params'  => $params,
            'id'      => uniqid()
        ];

        // Make the HTTP request
        $client = \Config\Services::curlrequest();
        try {
            $response = $client->post($this->apiUrl, [
                'json' => $request
            ]);
            $status = $response->getStatusCode();
            if ($status === 403) {
                log_message('warning', 'MyMISolana - 403 from Solana RPC. Suppressing in UI and returning empty result.');
                return [];
            }
            if ($status !== 200) {
                throw new \Exception('Invalid response from Solana API: ' . $status);
            }
            return json_decode($response->getBody(), true);
        } catch (\Throwable $e) {
            log_message('error', 'MyMISolana request failed: {msg}', ['msg' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * Connect to a Solana wallet provider.
     */
    public function connect(array $opts = []): array
    {
        return ['status' => 'connected', 'provider' => $opts['provider'] ?? 'solana'];
    }

    /**
     * Disconnect the current wallet session.
     */
    public function disconnect(): bool
    {
        return true;
    }

    /**
     * Retrieve balance for a given address and optional mint.
     */

    public function getBalance(string $address, ?string $mint = null): array
    {
        return $this->getBalanceDetailed($address, $mint);
    }

    /**
     * Mint-aware helper used internally & by controllers.
     */
    public function getBalanceDetailed(string $address, ?string $mint = null): array
    {
        try {
            if (!$address) {
                return [
                    'address'        => null,
                    'nativeLamports' => 0,
                    'nativeSOL'      => 0.0,
                    'tokens'         => [],
                    'mintFilter'     => $mint,
                    'error'          => 'WALLET_NOT_CONNECTED',
                ];
            }

            // Use SolanaService for all on-chain reads
            $lamports = $this->solanaService->getBalanceLamports($address);
            $tokens   = $this->solanaService->getTokenAccounts($address);

            if ($mint) {
                $tokens = array_values(array_filter($tokens, static function ($t) use ($mint) {
                    return isset($t['mint']) && $t['mint'] === $mint;
                }));
            }

            return [
                'address'        => $address,
                'nativeLamports' => $lamports,
                'nativeSOL'      => $lamports / 1_000_000_000,
                'tokens'         => $tokens,
                'mintFilter'     => $mint,
            ];
        } catch (\Throwable $e) {
            log_message('error', 'MyMISolana::getBalanceDetailed error: {msg}', ['msg' => $e->getMessage()]);
            return [
                'address'        => $address,
                'nativeLamports' => 0,
                'nativeSOL'      => 0.0,
                'tokens'         => [],
                'mintFilter'     => $mint,
                'error'          => $e->getMessage(),
            ];
        }
    }


    /**
     * Get SPL token accounts for an address.
     */
    public function getTokenAccounts(string $address): array
    {
        return $this->solanaService->getTokenAccounts($address);
    }

    public function transfer(string $from, string $to, string $amount, array $opts = []): array
    {
        return $this->solanaService->transfer($from, $to, $amount, $opts);
    }

    public function getQuote(array $params): array
    {
        return $this->solanaService->getQuote($params);
    }

    public function swap(array $params): array
    {
        return $this->solanaService->swap($params);
    }

    public function getPrice(string $symbolOrMint): array
    {
        return $this->solanaService->getPrice($symbolOrMint);
    }

    public function createToken(array $spec): array
    {
        return $this->solanaService->createToken($spec);
    }

    public function mintTo(string $mint, string $dest, string $amount): array
    {
        return $this->solanaService->mintTo($mint, $dest, $amount);
    }


}
?>
