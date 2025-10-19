<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class SolanaModel extends Model
{
    protected $table = 'bf_exchanges';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'user_id',
        'from_token',
        'to_token',
        'amount',
        'fees',
        'transaction_result',
        'created_on',
        'modified_on',
        'suspicious',
        'wallet_id',
        'available_funds',
        'net_worth',
        'public_key',
        'private_key',
        'wallet_type',
        'nickname',
        'status',
        'active'
    ];
    protected $userSoftDeletes = false;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deleteField = 'deleted_on';
    protected $validationRules = [];
    protected $skipValidation = false;

    public function storeWallet($data)
    {
        return $this->insert($data);
    }

    // public function attachExternalWalletToExchangeTable(int $userId, string $address, string $label = 'MyMI Solana Wallet'): ?int
    // {
    //     if ($userId <= 0) {
    //         log_message('error', 'SolanaModel::attachExternalWalletToExchangeTable invalid userId: {uid}', ['uid' => $userId]);
    //         return null;
    //     }
    //     if (!$this->isValidSolanaAddress($address)) {
    //         log_message('error', 'SolanaModel::attachExternalWalletToExchangeTable invalid address: {addr}', ['addr' => $address]);
    //         return null;
    //     }

    //     $table = $this->db->table('bf_exchanges_coin_addresses');

    //     // ensure single default per (user,chain)
    //     $hasDefault = $table->where([
    //         'user_id'    => $userId,
    //         'chain'      => 'solana',
    //         'is_default' => 1
    //     ])->get()->getRowArray();

    //     $now  = date('Y-m-d H:i:s');
    //     $data = [
    //         'user_id'    => $userId,
    //         'chain'      => 'solana',
    //         'address'    => $address,
    //         'label'      => $label,
    //         'is_default' => $hasDefault ? 0 : 1,
    //         'created_at' => $now,
    //         'updated_at' => $now,
    //     ];

    //     try {
    //         $table->insert($data);
    //         return (int)$this->db->insertID();
    //     } catch (\Throwable $e) {
    //         log_message('error', 'attachExternalWalletToExchangeTable insert failed: {msg}', ['msg' => $e->getMessage()]);
    //         return null;
    //     }
    // }


    public function attachExternalWallet(int $userId, string $address, string $label = 'MyMI Solana Wallet'): ?int
    {
        // Clear other defaults if this is_default=1
        $this->db->table($this->table)->where(['user_id'=>$userId,'chain'=>'solana'])->update(['is_default'=>0]);

        $row = [
            'user_id'    => $userId,
            'chain'      => 'solana',
            'address'    => $address,
            'label'      => $label,
            'is_default' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table($this->table)->insert($row);
        return (int) $this->db->insertID();
    }

    public function getDefaultAddressFromExchangeTable(int $userId): ?array
    {
        return $this->db->table('bf_exchanges_coin_addresses')
            ->where(['user_id'=>$userId,'chain'=>'solana'])
            ->orderBy('is_default','DESC')->orderBy('id','ASC')
            ->get()->getRowArray() ?: null;
    }

    public function listAddresses(int $userId): array
    {
        return $this->db->table($this->table)
            ->where(['user_id'=>$userId,'chain'=>'solana'])
            ->orderBy('is_default','DESC')->orderBy('id','ASC')
            ->get()->getResultArray();
    }

    public function setDefaultAddress(int $userId, int $id): bool
    {
        $this->db->transStart();
        $this->db->table($this->table)->where(['user_id'=>$userId,'chain'=>'solana'])->update(['is_default'=>0]);
        $this->db->table($this->table)->where(['id'=>$id,'user_id'=>$userId])->update(['is_default'=>1,'updated_at'=>date('Y-m-d H:i:s')]);
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function addNonCustodialAddress(int $userId, string $address, string $label = null): ?int
    {
        $row = [
            'user_id'    => $userId,
            'chain'      => 'solana',
            'address'    => $address,
            'label'      => $label ?? 'External Solana Wallet',
            'is_default' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $this->db->table($this->table)->insert($row);
        return (int) $this->db->insertID();
    }

    public function getWalletById(int $id): ?array
    {
        return $this->db->table('bf_exchanges_coin_addresses')
            ->where('id', $id)->get()->getRowArray() ?: null;
    }

    private function isValidSolanaAddress(string $address): bool
    {
        $len = strlen($address);
        if ($len < 32 || $len > 60) return false;
        return (bool) preg_match('~^[1-9A-HJ-NP-Za-km-z]+$~', $address);
    }

    public function disconnectWallet($walletID)
    {
        $data = [
            'active' => 0,
            'status' => 'disconnected',
        ];
        return $this->db->table('bf_users_wallet')->where('id', $walletID)->update($data);
    }

    public function callContractFunction($contractAddress, $functionName, $parameters)
    {
        return $this->sendRequest('callContractFunction', ['contractAddress' => $contractAddress, 'functionName' => $functionName, 'parameters' => $parameters]);
    }

    public function createDefaultMyMIWallet(int $userId, array $keypair): int
    {
        // coin_address table example; adjust to your schema
        $data = [
            'status'          => 1,
            'default_wallet'  => 'Yes',
            'exchange_wallet' => 'Yes',
            'premium_wallet'  => 'No',
            'market_pair'     => 'USD',
            'market'          => 'SOL',
            'user_id'         => $userId,
            'public_token'    => $keypair['address_base58'],  // base58 always
            'private_blob'    => $keypair['secret_enc'],      // encrypted
            'wallet_type'     => 'Crypto',
            'nickname'        => 'MyMI Solana Wallet',
            'provider'        => 'mymi',
            'created_on'      => date('Y-m-d H:i:s'),
            'updated_on'      => date('Y-m-d H:i:s'),
        ];
        $this->db->table('coin_address')->insert($data);
        return (int) $this->db->insertID();
    }

    public function createWallet($userId, $keypair)
    {
        // Create a new wallet entry
        $data = [
            'user_id'         => $userId,
            'public_token'    => $keypair['address_base58'],
            'private_blob'    => $keypair['secret_enc'],
            'wallet_type'     => 'Crypto',
            'nickname'        => 'MyMI Solana Wallet',
            'provider'        => 'mymi',
            'created_on'      => date('Y-m-d H:i:s'),
            'updated_on'      => date('Y-m-d H:i:s'),
        ];
        $this->db->table('coin_address')->insert($data);
        return (int) $this->db->insertID();
    }
    
    public function deployContract($contractCode, $constructorParameters)
    {
        return $this->sendRequest('deployContract', ['contractCode' => $contractCode, 'constructorParameters' => $constructorParameters]);
    }

    public function estimateTransactionFee()
    {
        return $this->sendRequest('eth_estimateGas', []);
    }

    public function executeSwap($fromToken, $toToken, $amount, $privateKey, $fromAddress, $toAddress)
    {
        return $this->sendRequest('swap', ['fromToken' => $fromToken, 'toToken' => $toToken, 'amount' => $amount, 'privateKey' => $privateKey, 'fromAddress' => $fromAddress, 'toAddress' => $toAddress]);
    }

    public function getAssets($publicKey)
    {
        return $this->sendRequest('getTokenAccountsByOwner', ['owner' => $publicKey, 'programId' => 'TokenkegQfeZyiNwAJbNbGKPFXCWuBvf9Ss623VQ5DA']);
    }

    public function getAllDepositAddresses($market)
    {
        $builder = $this->db->table('bf_users_wallet');
        $builder->where('market', $market)->where('active', 'Yes')->where('default_wallet', 'Yes')->where('wallet_type', 'Crypto')->get()->getResultArray();
        return $builder;
    }

    public function getBalance($publicKey)
    {
        return $this->sendRequest('getBalance', [$publicKey, 'latest']);
    }

    public function getCurrentBlock()
    {
        return $this->sendRequest('eth_blockNumber', []);
    }

    public function fetchTokenPriceFromAPI($tokenAddress) {
        $client = \Config\Services::curlrequest();
        $urls = [
            "https://api.coingecko.com/api/v3/simple/token_price/solana?contract_addresses=$tokenAddress&vs_currencies=usd",
            "https://api.raydium.io/v2/mainnet/price?ids=$tokenAddress",
            "https://api.dexscreener.com/latest/dex/tokens/$tokenAddress"
        ];
    
        foreach ($urls as $url) {
            try {
                $response = $client->get($url, [
                    'headers' => ['Content-Type' => 'application/json']
                ]);
                $body = $response->getBody();
                $result = json_decode($body, true);
                log_message('debug', 'SolanaModel fetchPrice - $result Array: ' . (print_r($result, true)));
    
                // Handle different API responses
                if (isset($result[$tokenAddress]['usd'])) {
                    return $result[$tokenAddress]['usd'];
                } elseif (isset($result['data']['priceUsdt'])) {
                    return $result['data']['priceUsdt'];
                } elseif (isset($result['pairs'][0]['priceUsd'])) {
                    return $result['pairs'][0]['priceUsd'];
                } else {
                    log_message('error', 'Price not found in API response from ' . $url);
                }
            } catch (\Exception $e) {
                log_message('error', 'Error fetching token price from ' . $url . ': ' . $e->getMessage());
            }
        }
        
        throw new \Exception('Unable to fetch token price from all sources');
    }     

    private function fetchPrice($apiUrl, $tokenAddress) {
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->get($apiUrl, [
                'headers' => ['Content-Type' => 'application/json']
            ]);

            $body = $response->getBody();
            $result = json_decode($body, true);
            // log_message('debug', 'SolanaModel fetchPrice - $result Array: ' . (print_r($result, true)));

            // Check for CoinGecko API response
            if (strpos($apiUrl, 'coingecko') !== false && isset($result[$tokenAddress]['usd'])) {
                return $result[$tokenAddress]['usd'];
            }

            // Check for Raydium API response
            if (strpos($apiUrl, 'raydium') !== false && isset($result['data']['priceUsdt'])) {
                return $result['data']['priceUsdt'];
            }

            // Check for DexScreener API response
            if (strpos($apiUrl, 'dexscreener') !== false && isset($result['pairs'][0]['priceUsd'])) {
                return $result['pairs'][0]['priceUsd'];
            }

            // Check for Solana API response
            if (isset($result['result']['value']['uiAmountString'])) {
                return $result['result']['value']['uiAmountString'];
            }

            throw new \Exception('Price not found in API response');
        } catch (\Exception $e) {
            log_message('error', 'Error fetching token price: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getListedTokens($exchange = null) {
        $result = $this->db->table('bf_exchanges_assets')
                           ->select('id, coin_address, coin_logo, coin_name, coin_value, discord, facebook, telegram, twitter, website, market_cap, symbol, volume, volume_array')
                           ->where('status', 'Approved')
                           ->where('blockchain', $exchange)
                           ->where('market_cap IS NOT NULL', null, false)
                           ->orderBy('market_cap', 'DESC')
                           ->limit(50)
                           ->get()
                           ->getResultArray(); 
        return $result; 
    }

    public function getSOLMarketData() {
        $result = $this->db->table('bf_exchanges_assets')
                           ->where('symbol', 'SOL')
                           ->get()
                           ->getRowArray(); 
        return $result; 
    }

    public function getTransactionBySignature($signature)
    {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->where('wallet_id', $signature)->get()->getResultArray();
        return $builder;
    }

    /**
     * Fetch recent signatures for a Solana address.
     * Accepts: a base58 address string OR a wallet row (array with ['public_token']).
     */
    public function getTransactions(int $userId, $addressOrWallet = null, int $limit = 100): array
    {
        try {
            // 1) Resolve address: if we got a wallet row, extract public_token
            $candidate = $addressOrWallet;
            if (is_array($candidate)) {
                $candidate = $candidate['public_token'] ?? ($candidate['coin_address']['public_token'] ?? null);
            }

            // 2) If caller didn’t pass anything, load user's default wallet
            if (!$candidate) {
                // You should already have this method; otherwise implement it to return the default wallet row
                $wallet = $this->getUserDefaultSolana($userId);
                // Accept either a flat row or ['cuSolanaDW' => row]
                $row = is_array($wallet) && isset($wallet['cuSolanaDW']) ? $wallet['cuSolanaDW'] : $wallet;
                $candidate = is_array($row) ? ($row['public_token'] ?? null) : null;
            }

            // 3) Normalize to base58 using the Service
            /** @var \App\Services\SolanaService $svc */
            $svc = service('solanaService');
            $address = $svc->normalizeAddress($candidate);

            if (!$address) {
                log_message('error', 'getTransactions: invalid public key param; got ' . (is_scalar($candidate) ? $candidate : gettype($candidate)));
                return [];
            }

            // 4) Call JSON-RPC with a STRING address and limit
            $params = [$address, ['limit' => max(1, (int)$limit)]];

            $res = $svc->rpc('getSignaturesForAddress', $params);
            if (isset($res['error'])) {
                log_message('error', '❌ Solana RPC error getSignaturesForAddress: ' . json_encode($res['error']));
                return [];
            }

            $out = $res['result'] ?? $res['value'] ?? [];
            return is_array($out) ? $out : [];
        } catch (\Throwable $e) {
            log_message('error', 'getTransactions exception: ' . $e->getMessage());
            return [];
        }
    }

    public function getTransactionStatus($transactionId)
    {
        return $this->sendRequest('getTransactionStatus', [$transactionId]);
    }

    public function getTokenInfo($accountID) {
        $builder = $this->db->table('bf_exchanges_assets')->where('id', $accountID)->get()->getRowArray(); 
        return $builder; 
    }

    public function getTokenInfoBySymbol($symbol) {
        // log_message('debug', 'SolanaModel L53 - $symbol: ' . $symbol);
        $builder = $this->db->table('bf_exchanges_assets')->where('symbol', $symbol)->get()->getRowArray(); 
        // log_message('debug', 'SolanaModel L53 - $builder Array: ' . (print_r($builder, true)));
        return $builder; 
    }

    public function getTokenInfoByID($tokenID) {
        // log_message('debug', 'SolanaModel L53 - $symbol: ' . $symbol);
        $builder = $this->db->table('bf_exchanges_assets')->where('id', $tokenID)->get()->getResultArray(); 
        // log_message('debug', 'SolanaModel L53 - $builder Array: ' . (print_r($builder, true)));
        return $builder; 
    }

    public function getTopListedTokens() {
        $result = $this->db->table('bf_exchanges_assets')
                           ->select('id, coin_logo, coin_name, coin_value, discord, facebook, telegram, twitter, website, market_cap, symbol, volume, fdv')
                           ->where('status', 'Approved')
                           ->where('blockchain', 'SOL')
                           ->where('market_cap IS NOT NULL', null, false)
                           ->notLike('symbol', 'SOL')
                           ->orderBy('market_cap', 'DESC')
                           ->limit(50)
                           ->get()
                           ->getResultArray(); 
        return $result; 
    }

    public function getUserDefaultSolana($cuID)
    {
        log_message('debug', 'SolanaModel L41 - $cuID ' . $cuID);
        $builder = $this->db->table('bf_users_wallet');
        $result = $builder->where('user_id', $cuID)->where('market', 'SOL')->where('default_wallet', 'Yes')->where('active', 1)->get()->getRowArray();
        return $result;
    }

    public function getUserEmail($userID)
    {
        $result = $this->db->table('users')->select('email')->where('id', $userID)->get()->getRowArray();
        return $result ? $result['email'] : null;
    }

    public function getUserInactiveSolana($cuID)
    {
        $builder = $this->db->table('bf_users_wallet');
        $result = $builder->where('user_id', $cuID)->where('market', 'SOL')->where('active', 'No')->get()->getResultArray();
        return $result;
    }

    public function getUserPublicKey($cuID)
    {
        $builder = $this->db->table('bf_users_wallet')->where('user_id', $cuID)->where('market', 'SOL')->where('default', 'Yes')->get()->getRowArray();
        return $builder->public_token;
    }

    public function getUserTokens($cuID) {
        $result = $this->db->table('bf_exchanges_assets')
                           ->select('id, coin_address, coin_logo, coin_name, coin_value, discord, facebook, telegram, twitter, website, market_cap, symbol, volume')
                           ->where('user_id', $cuID)
                           ->where('blockchain', 'SOL')
                           ->orderBy('market_cap', 'DESC')
                        //    ->limit(10)
                           ->get()
                           ->getResultArray(); 
        return $result; 
    }
    
    public function getUserTokenAmount($userId, $tokenAddress) {
        // Implement the logic to get the user's token amount from the database
        // Example query:
        $query = $this->db->table('bf_user_tokens')
            ->select('amount')
            ->where('user_id', $userId)
            ->where('token_address', $tokenAddress)
            ->get();
    
        $result = $query->getRow();
    
        return $result ? $result->amount : 0;
    }   

    public function getWalletInfo($walletID)
    {
        $builder = $this->db->table('bf_users_wallet');
        $result = $builder->where('id', $walletID)->get()->getRowArray();
        return $result;
    }

    public function getWalletsByUserID($cuID)
    {
        $builder = $this->db->table('bf_users_wallet');
        $result = $builder->where('user_id', $cuID)->where('market', 'SOL')->get()->getResultArray();
        return $result;
    }

    public function insertWalletIfNotExists($data)
    {
        $builder = $this->db->table('bf_users_wallet');
        $existingWallet = $builder->getWhere(['public_token' => $data['public_token']])->getRow();
        if ($existingWallet) {
            if ($existingWallet->active === 'No') {
                return ['status' => 'exists_inactive', 'message' => 'The wallet already exists but is not active.'];
            } else {
                return ['status' => 'exists_active', 'message' => 'The wallet already exists and is active.'];
            }
        }
        $builder->insert($data);
        return ['status' => 'success', 'message' => 'Wallet imported successfully.'];
    }

    public function recordTransaction($userId, $fromToken, $toToken, $amount, $fees, $transactionResult, $isSuspicious)
    {
        $data = [
            'user_id' => $userId,
            'from_token' => $fromToken,
            'to_token' => $toToken,
            'amount' => $amount,
            'fees' => $fees,
            'transaction_result' => $transactionResult,
            'created_on' => date('Y-m-d H:i:s'),
            'suspicious' => $isSuspicious
        ];
        return $this->insert($data);
    }

    public function saveToken($data) {
        return $this->db->table('bf_exchanges_assets')->insert($data);
    }

    public function tokenExists($symbol, $address) {
        return $this->db->table('bf_exchanges_assets')->where('symbol', $symbol)->where('blockchain_id', $address)->countAllResults() > 0;
    }

    public function saveTransaction($data)
    {
        $builder = $this->db->table('bf_exchanges_order');
        return $builder->insert($data);
    }

    public function updateUserBalance($userID, $publicKey, $balance)
    {
        $data = [
            'amount' => $balance,
            'available_funds' => $balance,
            'net_worth' => $balance
        ];
        return $this->db->table('bf_users_crypto_accounts')
                        ->where('user_id', $userID)
                        ->where('wallet_id', $publicKey)
                       ->update($data);
    }

    public function updateMarketData($marketData)
    {
        // Assuming marketData contains 'token', 'price', 'market_cap', 'volume'
        foreach ($marketData as $data) {
            $this->db->table('bf_exchanges_assets')
                ->where('symbol', $data['token'])
                ->update([
                    'coin_value' => $data['price'],
                    'market_cap' => $data['fdv'],
                    'volume' => json_encode($data['volume']),
                    'modified_on' => date('Y-m-d H:i:s')
                ]);
        }
    }

    public function updateWallet($walletID, $data)
    {
        return $this->db->table('bf_users_wallet')->where('id', $walletID)->update($data);
    }

    public function validateAddress($address)
    {
        return filter_var($address, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^0x[a-fA-F0-9]{40}$/']]) !== false;
    }

    public function verifySignature($publicKey, $signature, $message)
    {
        return true;
    }

    private function sendRequest($method, $params)
    {
        $payload = ['jsonrpc' => '2.0', 'id' => 1, 'method' => $method, 'params' => $params];
        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }
}
?>
