<?php namespace App\Services;

use App\Libraries\{BaseLoader, MyMISolana, MyMIRaydium, MyMIDexScreener};
use App\Services\{UserService}; 
use CodeIgniter\Database\ConnectionInterface;

class BlockchainService {
    protected $solana;
    protected $raydium;
    protected $dexScreener;
    protected $userData;
    protected $userService;
    protected $cuUserType;

    public function __construct(ConnectionInterface $db) {
        $this->solana = new MyMISolana();
        $this->raydium = new MyMIRaydium();
        $this->dexScreener = new MyMIDexScreener($db);
        $this->cuID = getCuID();  // Assuming getCuID() is a helper or service
$this->userService = new UserService($this->siteSettings, $this->cuID, Services::request());

        $this->userData = $this->getuserService()->commonData();
        $this->cuUserType = $this->userData['cuUserType']; // Assign user type to class property
    }
    
    public function createTokenWithPremiumService(
        $blockchain, 
        $name, 
        $symbol, 
        $supply, 
        $adminWallet, 
        $tier = null, 
        $userId, 
        $email
    ) {
        // Use default tier if not provided
        $tier = $tier ?? $this->cuUserType;
    
        if ($blockchain !== 'solana') {
            throw new \Exception('Unsupported blockchain: ' . $blockchain);
        }
    
        // Validate private key
        $privateKeyJson = getenv('SOLANA_PRIVATE_KEY');
        $privateKeyArray = json_decode($privateKeyJson, true);
        if (json_last_error() !== JSON_ERROR_NONE || !is_array($privateKeyArray)) {
            throw new \Exception('Invalid or missing private key in the environment.');
        }
        $privateKeyBinary = pack('C*', ...$privateKeyArray);
    
        // Calculate fees
        $fees = $this->calculateTransactionFees($supply, $tier);
    
        // Check admin wallet balance
        $adminBalance = $this->solana->getBalance($adminWallet);
        if ($adminBalance < $fees['total_fee']) {
            throw new \Exception('Insufficient balance for fees. Required: ' . $fees['total_fee']);
        }
    
        // Token creation
        $tokenResult = $this->solana->createSPLToken($privateKeyBinary, 9);
        if ($tokenResult['status'] !== 'success') {
            throw new \Exception('Token creation failed: ' . $tokenResult['message']);
        }
        $mintAddress = $tokenResult['tokenAddress'];
    
        // Mint tokens
        $mintResult = $this->solana->mintTokens($privateKeyBinary, $mintAddress, $supply);
        if ($mintResult['status'] !== 'success') {
            throw new \Exception('Minting failed: ' . $mintResult['message']);
        }
    
        // Log the service purchase
        $this->logServicePurchase($userId, $name, $tier, $fees, $mintAddress);
    
        // Log the transaction
        $this->logWalletTransaction($userId, $email, $fees, $mintAddress, $tier);
    
        return [
            'status' => 'success',
            'token_address' => $mintAddress,
            'transaction_id' => $mintResult['transactionId'],
            'tier' => $tier,
        ];
    }
    
    private function logServicePurchase($userId, $serviceName, $tier, $fees, $mintAddress) {
        $data = [
            'user_id' => $userId,
            'service_name' => $serviceName,
            'cost' => $fees['service_fee'],
            'price' => $fees['total_fee'],
            'tier' => $tier,
            'service_features' => json_encode(['token_address' => $mintAddress]),
            'status' => 'active',
            'purchase_time' => date('Y-m-d H:i:s'),
        ];
    
        $this->db->table('bf_users_services_purchases')->insert($data);
    }
    
    private function logWalletTransaction($userId, $email, $fees, $mintAddress, $tier) {
        $data = [
            'transaction_id' => uniqid('txn_'),
            'status' => 'completed',
            'user_id' => $userId,
            'user_email' => $email,
            'trans_type' => 'service_fee',
            'currency' => 'SOL',
            'amount' => $fees['total_fee'],
            'fees' => $fees['service_fee'],
            'total_cost' => $fees['total_fee'],
            'wallet_id' => $mintAddress,
            'submitted_date' => date('Y-m-d H:i:s'),
            'review_notes' => 'Premium tier: ' . $tier,
        ];
    
        $this->db->table('bf_users_wallet_transactions')->insert($data);
    }    

    private function calculateTransactionFees($amount, $tier = 'basic') {
        $networkFee = 0.001; // Base network fee
        $applicationFee = 0.01 * $amount; // 1% application fee

        // Tier-based service fee multipliers
        $serviceFeeMultiplier = match ($tier) {
            'Starter' => 2.0, // 100% higher fee for Starter
            'Basic' => 1.5, // 50% higher fee for Basic
            'Pro' => 1.25, // 25% higher fee for Pro
            'Premium' => 1.125, // 12.5% higher fee for Premium
            default => 2.5, // 150% higher fee for Starter
        };

        $serviceFee = $applicationFee * $serviceFeeMultiplier;

        // Total fee calculation
        $totalFee = $networkFee + $applicationFee + $serviceFee;

        return [
            'network_fee' => $networkFee,
            'application_fee' => $applicationFee,
            'service_fee' => $serviceFee,
            'total_fee' => $totalFee,
        ];
    }

    public function getTokenPrice($blockchain, $tokenAddress) {
        if ($blockchain === 'solana') {
            return $this->dexScreener->getTokenPrice($tokenAddress);
        }

        throw new \Exception('Unsupported blockchain for price retrieval.');
    }

    public function swapTokens($blockchain, $fromToken, $toToken, $amount) {
        if ($blockchain === 'solana') {
            return $this->raydium->executeSwap($fromToken, $toToken, $amount);
        }

        throw new \Exception('Unsupported blockchain for token swap.');
    }

    public function getLiquidityPools($blockchain) {
        if ($blockchain === 'solana') {
            return $this->dexScreener->getLiquidityPools();
        }

        throw new \Exception('Unsupported blockchain for liquidity pools.');
    }
}
