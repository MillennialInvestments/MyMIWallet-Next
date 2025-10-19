<?php namespace App\Libraries;

interface CryptoCurrencyInterface {
    // public function generateWallet();
    // public function signTransaction($transaction, $privateKey);
    // public function verifySignature($transaction, $signature, $publicKey);
    // public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount);
    // public function getTransactionStatus($transactionId);
    // public function getBalance($address);
    // public function validateAddress($address);
    // public function getCurrentBlock();
    // public function estimateTransactionFee();
    // public function getNetworkStatus();
    // public function deployContract($contractCode, $constructorParameters);
    // public function callContractFunction($contractAddress, $functionName, $parameters);
    public function connect(array $opts = []): array;             // wallet/session info
    public function disconnect(): bool;
    public function getBalance(string $address, ?string $mint = null): array;

    public function getTokenAccounts(string $address): array;
    public function transfer(string $from, string $to, string $amount, array $opts = []): array;
    public function swap(array $params): array;                   // srcMint, dstMint, amount, slippage, etc.
    public function getQuote(array $params): array;               // for swaps
    public function getPrice(string $symbolOrMint): array;
    public function createToken(array $spec): array;   
}
