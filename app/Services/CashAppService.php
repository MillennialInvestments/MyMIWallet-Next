<?php

namespace App\Services;

use App\Config\{APIs, SiteSettings};
use App\Libraries\{BaseLoader};
use Square\SquareClient;
use Square\Exceptions\ApiException;

class CashAppService
{

    private $APIs; 
    private $siteSettings; 
    private $client;
    
    public function __construct()
    {
        // Load PayPal config
        $this->APIs = config('APISettings');
        $this->siteSettings = config('SiteSettings');
        
        $this->accessToken = $this->APIs->cashappAccessToken;
        $this->environment = $this->APIs->cashappEnvironment;
        $this->client = new SquareClient([
            'accessToken' => $this->APIs->cashappAccessToken,
            'environment' => $this->APIs->cashappEnvironment // 'production' for live payments
        ]);
    }

    public function payViaCashApp($cuID, $amount)
    {
        try {
            $paymentsApi = $this->client->getPaymentsApi();

            // Example request for creating a payment
            $response = $paymentsApi->createPayment([
                'source_id' => 'source_id_from_client',
                'idempotency_key' => uniqid(),
                'amount_money' => [
                    'amount' => $amount * 100, // Amount in cents
                    'currency' => 'USD'
                ],
                'recipient_id' => $cuID
            ]);

            if ($response->isSuccess()) {
                $result = $response->getResult();
                // Handle success, save transaction to DB
                return $result;
            } else {
                // Handle error
                throw new Exception('CashApp Payment Failed: ' . $response->getErrors()[0]->getDetail());
            }
        } catch (ApiException $e) {
            log_message('error', 'CashApp Error: ' . $e->getMessage());
            return null;
        }
    }
}
