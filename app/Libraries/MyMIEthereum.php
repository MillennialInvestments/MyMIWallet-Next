<?php namespace App\Libraries;

use App\Libraries\{BaseLoader};
use App\Services\EthereumServices;
use Config\Services;
use CodeIgniter\Cache\CacheInterface;
use Web3\Web3;
use Web3\Contract;
use Web3\Utils;

#[\AllowDynamicProperties]
class MyMIEthereum implements CryptoCurrencyInterface {

    protected $web3;
    protected $contract;
    protected EthereumServices $eth;
    protected CacheInterface $cache;

    public function __construct($provider = null, ?EthereumServices $eth = null, ?CacheInterface $cache = null)
    {
        $this->web3 = new Web3($provider);
        $this->svc = new EtherscanService();
        $this->eth = $eth ?? service('ethereumServices');
        $this->cache = $cache ?? Services::cache();
    }

    public function normalizeAddress(?string $maybe): ?string
    {
        return $this->eth->normalizeAddress($maybe);
    }

    public function isValidChecksum(string $addr): bool
    {
        return $this->eth->isValidChecksum($addr);
    }

    /**
     * Cached ETH balance lookup via EthereumServices.
     */
    public function getBalance(string $address): array
    {
        return $this->eth->getBalance($address);
    }

    /**
     * Placeholder transaction fetcher.
     */
    public function getTransactions(string $address, int $limit = 100): array
    {
        return $this->eth->getTransactions($address, $limit);
    }

    public function getGasPrice(): array
    {
        $res = $this->svc->gasPrice();
        $r = $res['result'] ?? [];
        return [
            'safe'    => isset($r['SafeGasPrice']) ? (float) $r['SafeGasPrice'] : null,
            'propose' => isset($r['ProposeGasPrice']) ? (float) $r['ProposeGasPrice'] : null,
            'fast'    => isset($r['FastGasPrice']) ? (float) $r['FastGasPrice'] : null,
        ];
    }

    public function getTxStatus(string $hash): array
    {
        $res = $this->svc->txStatus($hash);
        return $res['result'] ?? [];
    }

    public function generateWallet() {
        $account = $this->web3->eth->accounts->create();
        return [
            'privateKey' => $account->getPrivateKey(),
            'address' => $account->getAddress()
        ];
    }

    public function signTransaction($transaction, $privateKey) {
        // Sign the transaction
        $account = $this->web3->eth->accounts->privateKeyToAccount($privateKey);
        return $account->sign($transaction);
    }

    public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount) {
        $transaction = [
            'from' => $fromAddress,
            'to' => $toAddress,
            'value' => Utils::toWei($amount, 'ether'),
            'gas' => '21000',  // Set the gas limit for Ether transfer
            'gasPrice' => Utils::toWei('10', 'gwei') // Set the gas price
        ];
        $signedTransaction = $this->signTransaction($transaction, $privateKey);
        return $this->web3->eth->sendSignedTransaction($signedTransaction);
    }

    public function initContract($abi, $contractAddress) {
        $this->contract = new Contract($this->web3->provider, $abi);
        $this->contract->at($contractAddress);
    }

    public function callContractFunction($functionName, $params = []) {
        if (!$this->contract) {
            return 'Contract not initialized';
        }
        return $this->contract->call($functionName, $params);
    }

    // Additional functions to handle ERC-20 and ERC-721 tokens as per the methods in CryptoCurrencyInterface
    public function deployERC20Token($privateKey, $initialSupply, $tokenName, $decimalUnits, $tokenSymbol) {
        $tokenContractABI = file_get_contents('path/to/ERC20ABI.json'); 
        $tokenContractBytecode = file_get_contents('path/to/ERC20Bytecode.json');

        $contract = new Contract($this->web3->provider, $tokenContractABI);
        $contract->bytecode($tokenContractBytecode);

        $transaction = [
            'from' => $this->web3->eth->accounts->privateKeyToAccount($privateKey)->getAddress(),
            'data' => $contract->bytecode()->getData(['arguments' => [$initialSupply, $tokenName, $decimalUnits, $tokenSymbol]]),
            'gas' => '2000000'
        ];
        $signedTransaction = $this->signTransaction($transaction, $privateKey);
        return $this->web3->eth->sendSignedTransaction($signedTransaction);
    }

    public function deployERC721Token($privateKey, $tokenName, $tokenSymbol) {
        $tokenContractABI = file_get_contents('path/to/ERC721ABI.json'); 
        $tokenContractBytecode = file_get_contents('path/to/ERC721Bytecode.json');

        $contract = new Contract($this->web3->provider, $tokenContractABI);
        $contract->bytecode($tokenContractBytecode);

        $transaction = [
            'from' => $this->web3->eth->accounts->privateKeyToAccount($privateKey)->getAddress(),
            'data' => $contract->bytecode()->getData(['arguments' => [$tokenName, $tokenSymbol]]),
            'gas' => '2000000'
        ];
        $signedTransaction = $this->signTransaction($transaction, $privateKey);
        return $this->web3->eth->sendSignedTransaction($signedTransaction);
    }

    public function transferERC20Token($contractAddress, $fromPrivateKey, $toAddress, $amount) {
        $contractABI = file_get_contents('path/to/ERC20ABI.json');
        $contract = new Contract($this->web3->provider, $contractABI);
        $contract->at($contractAddress);

        $functionData = $contract->getData('transfer', [$toAddress, $amount]);
        $transaction = [
            'from' => $this->web3->eth->accounts->privateKeyToAccount($fromPrivateKey)->getAddress(),
            'to' => $contractAddress,
            'data' => $functionData,
            'gas' => '100000'
        ];
        $signedTransaction = $this->signTransaction($transaction, $fromPrivateKey);
        return $this->web3->eth->sendSignedTransaction($signedTransaction);
    }

    public function getERC20TokenBalance($contractAddress, $address) {
        $contractABI = file_get_contents('path/to/ERC20ABI.json');
        $contract = new Contract($this->web3->provider, $contractABI);
        $contract->at($contractAddress);
        return $contract->call('balanceOf', [$address]);
    }

    public function setEthPrice($price)
    {
        $this->ethPrice = $price;
    }

    public function setAnnualCosts($costs)
    {
        $this->annualCosts = $costs;
    }

    public function setReturnRate($rate)
    {
        $this->returnRate = $rate;
    }

    public function calculateRequiredETH()
    {
        return $this->annualCosts / ($this->returnRate * $this->ethPrice);
    }

    public function calculateDailyRequiredETH()
    {
        $dailyCosts = $this->annualCosts / 365;
        $dailyReturnRate = $this->returnRate / 365;
        return $dailyCosts / ($dailyReturnRate * $this->ethPrice);
    }

    public function getAnnualCosts()
    {
        return $this->annualCosts;
    }

    public function getEthPrice()
    {
        return $this->ethPrice;
    }

    public function getReturnRate()
    {
        return $this->returnRate;
    }
}
