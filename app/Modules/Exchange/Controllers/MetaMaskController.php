<?php

namespace App\Modules\Exchange\Controllers;

use App\Libraries\MyMIMetaMask;

#[\AllowDynamicProperties]
class MetaMaskController extends UserController
{
    protected $metaMask;

    public function __construct()
    {
        $this->metaMask = new MyMIMetaMask();
    }

    public function connectWallet()
    {
        $response = $this->metaMask->connectWallet();
        return $this->response->setJSON($response);
    }

    public function disconnectWallet()
    {
        $response = $this->metaMask->disconnectWallet();
        return $this->response->setJSON($response);
    }

    public function refreshWallet()
    {
        $response = $this->metaMask->refreshWallet();
        return $this->response->setJSON($response);
    }

    public function getAssets()
    {
        $publicKey = $this->request->getPost('publicKey');
        $response = $this->metaMask->getAssets($publicKey);
        return $this->response->setJSON($response);
    }

    public function generateWallet()
    {
        $response = $this->metaMask->generateWallet();
        return $this->response->setJSON($response);
    }

    public function signTransaction()
    {
        $transaction = $this->request->getPost('transaction');
        $privateKey = $this->request->getPost('privateKey');
        $response = $this->metaMask->signTransaction($transaction, $privateKey);
        return $this->response->setJSON($response);
    }

    public function verifySignature()
    {
        $transaction = $this->request->getPost('transaction');
        $signature = $this->request->getPost('signature');
        $publicKey = $this->request->getPost('publicKey');
        $response = $this->metaMask->verifySignature($transaction, $signature, $publicKey);
        return $this->response->setJSON($response);
    }

    public function sendAsset()
    {
        $privateKey = $this->request->getPost('privateKey');
        $fromAddress = $this->request->getPost('fromAddress');
        $toAddress = $this->request->getPost('toAddress');
        $assetId = $this->request->getPost('assetId');
        $amount = $this->request->getPost('amount');
        $response = $this->metaMask->sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount);
        return $this->response->setJSON($response);
    }

    public function getTransactionStatus()
    {
        $transactionId = $this->request->getPost('transactionId');
        $response = $this->metaMask->getTransactionStatus($transactionId);
        return $this->response->setJSON($response);
    }

    public function getBalance()
    {
        $address = $this->request->getPost('address');
        $response = $this->metaMask->getBalance($address);
        return $this->response->setJSON($response);
    }

    public function validateAddress()
    {
        $address = $this->request->getPost('address');
        $response = $this->metaMask->validateAddress($address);
        return $this->response->setJSON($response);
    }

    public function getCurrentBlock()
    {
        $response = $this->metaMask->getCurrentBlock();
        return $this->response->setJSON($response);
    }

    public function estimateTransactionFee()
    {
        $response = $this->metaMask->estimateTransactionFee();
        return $this->response->setJSON($response);
    }

    public function getNetworkStatus()
    {
        $response = $this->metaMask->getNetworkStatus();
        return $this->response->setJSON($response);
    }

    public function deployContract()
    {
        $contractCode = $this->request->getPost('contractCode');
        $constructorParameters = $this->request->getPost('constructorParameters');
        $response = $this->metaMask->deployContract($contractCode, $constructorParameters);
        return $this->response->setJSON($response);
    }

    public function callContractFunction()
    {
        $contractAddress = $this->request->getPost('contractAddress');
        $functionName = $this->request->getPost('functionName');
        $parameters = $this->request->getPost('parameters');
        $response = $this->metaMask->callContractFunction($contractAddress, $functionName, $parameters);
        return $this->response->setJSON($response);
    }
}
