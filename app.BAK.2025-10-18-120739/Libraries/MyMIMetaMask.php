<?php

namespace App\Libraries;

use App\Libraries\{BaseLoader};
use Web3\Web3;
use Web3\Utils;
use Web3\Contract;
use GuzzleHttp\Client;

/**
 * Browser adapter for MetaMask. Handles ownership verification and
 * transaction relays without performing RPC-based address lookups.
 */
#[\AllowDynamicProperties]
class MyMIMetaMask
{

    protected $apiUrl;
    protected $auth;
    protected $cuID;
    protected $request;
    protected $session;
    protected $uri;
    protected $betaApiUrl = 'https://api-mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID';
    protected $prodApiUrl = 'https://api-mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID';
    protected $siteSettings;
    private string $nonceKey = 'metamask_nonce';

    public function __construct()
    {
        $this->siteSettings = config('SiteSettings');
        $this->apiUrl = $this->siteSettings->beta === 1 ? $this->betaApiUrl : $this->prodApiUrl;
    }

    public function connectWallet()
    {
        $connectUrl = "https://metamask.io/";
        return [
            'status' => 'success',
            'message' => 'MetaMask wallet connected',
            'connect_url' => $connectUrl
        ];
    }

    public function disconnectWallet()
    {
        return [
            'status' => 'success',
            'message' => 'MetaMask wallet disconnected'
        ];
    }

    public function refreshWallet()
    {
        return [
            'status' => 'success',
            'message' => 'MetaMask wallet refreshed'
        ];
    }

    public function getAssets($publicKey)
    {
        $response = $this->sendRequest('eth_getBalance', [$publicKey, 'latest']);
        return $response['result'] ?? [];
    }

    private function sendRequest($method, $params)
    {
        $payload = [
            'jsonrpc' => '2.0',
            'id' => 1,
            'method' => $method,
            'params' => $params
        ];

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

    public function generateWallet()
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $newAccount = $eth->personal()->newAccount('your-password');
        return [
            'privateKey' => $newAccount->privateKey,
            'publicKey' => $newAccount->address
        ];
    }

    public function signTransaction($transaction, $privateKey)
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $signedTransaction = $eth->personal()->signTransaction($transaction, $privateKey);
        return $signedTransaction;
    }

    public function verifySignature($transaction, $signature, $publicKey)
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $isValid = $eth->personal()->ecRecover($transaction, $signature) === $publicKey;
        return $isValid;
    }

    public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount)
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $transaction = [
            'from' => $fromAddress,
            'to' => $toAddress,
            'value' => Utils::toWei($amount, 'ether'),
            'gas' => '21000',
            'gasPrice' => Utils::toWei('20', 'gwei'),
        ];
        $signedTransaction = $eth->personal()->signTransaction($transaction, $privateKey);
        $transactionHash = $eth->eth()->sendRawTransaction($signedTransaction);
        return $transactionHash;
    }

    public function getTransactionStatus($transactionId)
    {
        return $this->sendRequest('eth_getTransactionReceipt', [$transactionId]);
    }

    public function getBalance($address)
    {
        return $this->sendRequest('eth_getBalance', [$address, 'latest']);
    }

    public function validateAddress($address)
    {
        return filter_var($address, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^0x[a-fA-F0-9]{40}$/']]) !== false;
    }

    public function getCurrentBlock()
    {
        return $this->sendRequest('eth_blockNumber', []);
    }

    public function estimateTransactionFee()
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $gasPrice = $eth->eth()->gasPrice();
        return Utils::toWei($gasPrice, 'gwei');
    }

    public function getNetworkStatus()
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $networkStatus = $eth->net()->isListening();
        return $networkStatus;
    }

    public function deployContract($contractCode, $constructorParameters)
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $contract = new Contract($eth->eth(), $contractCode);
        $deployTransaction = $contract->deploy($constructorParameters);
        $signedTransaction = $eth->personal()->signTransaction($deployTransaction, 'your-private-key');
        $transactionHash = $eth->eth()->sendRawTransaction($signedTransaction);
        return $transactionHash;
    }

    public function callContractFunction($contractAddress, $functionName, $parameters)
    {
        $eth = new Web3('https://mainnet.infura.io/v3/YOUR_INFURA_PROJECT_ID');
        $contract = new Contract($eth->eth(), $contractAddress);
        $functionCall = $contract->at($contractAddress)->call($functionName, $parameters);
        return $functionCall;
    }

    public function connect(array $opts = []): array
    {
        return [
            'provider' => 'metamask',
            'label'    => 'MetaMask',
            'chain'    => $opts['chain'] ?? 'ethereum',
        ];
    }

    /** Issue a signable challenge nonce */
    public function challenge(): array
    {
        $nonce = bin2hex(random_bytes(16));
        session()->set($this->nonceKey, $nonce);
        return [
            'ok'      => true,
            'nonce'   => $nonce,
            'message' => 'Sign nonce to verify ownership.',
            'csrf'    => service('security')->getCSRFHash(),
        ];
    }

    /** Verify EIP-191 signature and persist checksum address */
    public function verify(string $address, string $signature): array
    {
        $svc   = service('ethereumService');
        $addr  = $svc->normalizeAddress($address);
        $nonce = session()->get($this->nonceKey);
        $csrf  = service('security')->getCSRFHash();
        if (!$addr || !$nonce) {
            return ['ok' => false, 'csrf' => $csrf];
        }
        $msg = 'MyMI Wallet Login: ' . $nonce;
        try {
            $recovered = Utils::personalEcRecover($msg, $signature);
        } catch (\Throwable $e) {
            $recovered = null;
        }
        $ok = $recovered && strtolower($recovered) === strtolower($addr);
        if ($ok) {
            session()->set('ethereum_public_key', $addr);
        }
        session()->remove($this->nonceKey);
        return ['ok' => $ok, 'address' => $ok ? $addr : null, 'csrf' => $csrf];
    }

    /** Relay a raw signed transaction to the Ethereum network */
    public function signAndSendTx(array $payload): array
    {
        $signed = $payload['signedTx'] ?? '';
        $txid   = service('ethereumService')->sendRawTransaction($signed);
        return ['txid' => $txid];
    }
}
