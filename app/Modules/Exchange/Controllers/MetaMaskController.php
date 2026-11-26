<?php

namespace App\Modules\Exchange\Controllers;

use App\Libraries\MyMIMetaMask;

#[\AllowDynamicProperties]
class MetaMaskController extends UserController
{
    protected $metaMask;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
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
        return $this->walletSignatureRequired('generateWallet');
    }

    public function signTransaction()
    {
        return $this->walletSignatureRequired('signTransaction');
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
        return $this->walletSignatureRequired('sendAsset');
    }

    /**
     * Private keys never travel to or from the server. These endpoints took a
     * raw key in the POST (or returned a new one), so they are closed; Ethereum
     * payments will be signed in the user's own wallet.
     */
    private function walletSignatureRequired(string $endpoint)
    {
        log_message('warning', 'Blocked MetaMask private-key endpoint {endpoint}.', ['endpoint' => $endpoint]);

        return $this->response->setStatusCode(403)->setJSON([
            'success' => false,
            'status'  => 'error',
            'message' => 'Private keys are never sent to MyMI. Sign in your own wallet instead.',
            'errors'  => ['reason' => 'wallet_signature_required'],
        ]);
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
