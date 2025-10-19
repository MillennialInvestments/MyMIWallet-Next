<?php

namespace App\Services;

use Braintree\Gateway;
use Config\Services;
use Exception;
use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader};
use App\Models\TransactionModel;

class PayPalService
{

    private $APIs; 
    private $siteSettings; 
    private $gateway;
    private $environment;
    private $merchantId;
    private $publicKey;
    private $privateKey;
    private $transactionModel;

    public function __construct()
    {
        // Load PayPal config
        $this->APIs = config('APIs');
        $this->siteSettings = config('SiteSettings');
        
        $this->merchantId = $this->APIs->paypalMerchantID;
        $this->publicKey = $this->APIs->paypalPublicKey;
        $this->privateKey = $this->APIs->paypalPrivateKey;
        $this->environment = $this->APIs->paypalEnvironment;
        $this->debug = config('SiteSettings')->debug;

        // Initialize Braintree Gateway
        $this->gateway = new Gateway([
            'environment' => $this->environment,
            'merchantId' => $this->merchantId,
            'publicKey' => $this->publicKey,
            'privateKey' => $this->privateKey,
        ]);

        // Load your transaction model to track payments
        $this->transactionModel = model('TransactionModel');
    }

    // Create a PayPal Payment method using Braintree
    public function createPayment($amount, $nonce, $orderId)
    {
        try {
            $result = $this->gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'orderId' => $orderId,
                'options' => [
                    'submitForSettlement' => true
                ],
            ]);

            if ($result->success) {
                // Save the transaction to the database
                $this->saveTransaction($result->transaction);
                return $result->transaction;
            } else {
                throw new Exception('Payment failed: ' . $result->message);
            }
        } catch (Exception $e) {
            log_message('error', 'PayPal Error: ' . $e->getMessage());
            return null;
        }
    }

    // Generate a PayPal payment token for the front-end (PayPal button)
    public function generateClientToken()
    {
        try {
            $clientToken = $this->gateway->clientToken()->generate();
            return $clientToken;
        } catch (Exception $e) {
            log_message('error', 'PayPal Error: ' . $e->getMessage());
            return null;
        }
    }

    // Refund a PayPal Payment
    public function refundPayment($transactionId)
    {
        try {
            $result = $this->gateway->transaction()->refund($transactionId);
            if ($result->success) {
                return $result->transaction;
            } else {
                throw new Exception('Refund failed: ' . $result->message);
            }
        } catch (Exception $e) {
            log_message('error', 'PayPal Refund Error: ' . $e->getMessage());
            return null;
        }
    }

    // Void a PayPal Transaction
    public function voidTransaction($transactionId)
    {
        try {
            $result = $this->gateway->transaction()->void($transactionId);
            if ($result->success) {
                return $result->transaction;
            } else {
                throw new Exception('Void failed: ' . $result->message);
            }
        } catch (Exception $e) {
            log_message('error', 'PayPal Void Error: ' . $e->getMessage());
            return null;
        }
    }

    // Save Transaction to Database
    private function saveTransaction($transaction)
    {
        $transactionData = [
            'transaction_id' => $transaction->id,
            'amount' => $transaction->amount,
            'status' => $transaction->status,
            'orderId' => $transaction->orderId,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $this->transactionModel->save($transactionData);
    }

    // Get the status of a transaction
    public function getTransactionStatus($transactionId)
    {
        try {
            $transaction = $this->gateway->transaction()->find($transactionId);
            return $transaction->status;
        } catch (Exception $e) {
            log_message('error', 'PayPal Error in getTransactionStatus: ' . $e->getMessage());
            return null;
        }
    }
}
