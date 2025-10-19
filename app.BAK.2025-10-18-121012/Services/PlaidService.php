<?php

namespace App\Services;

use App\Config\SiteSettings;
use App\Libraries\{BaseLoader};
use CodeIgniter\Config\Services;
use TomorrowIdeas\Plaid\Plaid;
use Exception;

class PlaidService
{

    private $APIs;
    private $client_id;
    private $secret;
    private $environment;
    private $client;
    private $debug;
    private $plaidModel;

    public function __construct()
    {
        $this->APIs = config('APIs'); // Assuming you have a Plaid.php in the Config folder
        $this->plaidModel = model('PlaidModel'); // Assuming you have PlaidModel in the Models directory

        $this->client_id = $this->APIs->plaid_client_id;
        $this->secret = $this->APIs->plaid_secret;
        $this->environment = $this->APIs->plaid_environment;
        $this->client = new Plaid($this->client_id, $this->secret, $this->environment);
        $this->debug = config('SiteSettings')->debug;
    }

    // Exchange Public Token for Access Token
    public function exchangePublicToken($public_token)
    {
        try {
            $response = $this->client->getAccessToken($public_token);
            if ($this->debug) {
                log_message('debug', 'Plaid Access Token: ' . $response['access_token']);
            }
            return $response['access_token'];
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in exchangePublicToken: ' . $e->getMessage());
            return null;
        }
    }

    // Create a Link Token for Plaid Link
    public function createLinkToken($user_id, $client_name)
    {
        try {
            $linkTokenResponse = $this->client->createLinkToken([
                'user' => [
                    'client_user_id' => $user_id
                ],
                'client_name' => $client_name,
                'products' => ['auth', 'transactions'],
                'country_codes' => ['US'],
                'language' => 'en',
                'webhook' => 'https://yourdomain.com/webhook'
            ]);
            return $linkTokenResponse['link_token'];
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in createLinkToken: ' . $e->getMessage());
            return null;
        }
    }

    // Retrieve Account Information from Plaid
    public function getAccountInfo($accessToken)
    {
        try {
            $response = $this->client->getAccounts($accessToken);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in getAccountInfo: ' . $e->getMessage());
            return null;
        }
    }

    // Retrieve Transactions for a specific account
    public function getTransactions($accessToken, $startDate, $endDate)
    {
        try {
            $response = $this->client->getTransactions($accessToken, $startDate, $endDate);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in getTransactions: ' . $e->getMessage());
            return null;
        }
    }

    // Get Balance Information for a user
    public function getBalance($accessToken)
    {
        try {
            $response = $this->client->getBalances($accessToken);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in getBalance: ' . $e->getMessage());
            return null;
        }
    }

    // Create ACH transfer using Plaid (useful for payouts)
    public function createACHTransfer($accessToken, $amount, $account_id, $recipientName)
    {
        try {
            // Example Plaid ACH transfer API call
            $transferResponse = $this->client->createTransfer([
                'amount' => $amount,
                'currency' => 'USD',
                'ach_class' => 'ppd', // can be ccd for business or ppd for personal
                'user' => [
                    'legal_name' => $recipientName
                ],
                'type' => 'credit', // for payouts use credit
                'network' => 'ach',
                'account_id' => $account_id
            ]);

            return $transferResponse;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in createACHTransfer: ' . $e->getMessage());
            return null;
        }
    }

    // Get Institution Data
    public function getInstitutions($count = 10, $offset = 0)
    {
        try {
            $response = $this->client->getInstitutions($count, $offset);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in getInstitutions: ' . $e->getMessage());
            return null;
        }
    }

    // Set Webhook for Plaid notifications
    public function setWebhook($accessToken, $webhookUrl)
    {
        try {
            $response = $this->client->updateItemWebhook($accessToken, $webhookUrl);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in setWebhook: ' . $e->getMessage());
            return null;
        }
    }

    // Retrieve Investment Holdings for a user
    public function getInvestmentHoldings($accessToken)
    {
        try {
            $response = $this->client->getInvestmentHoldings($accessToken);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Plaid Error in getInvestmentHoldings: ' . $e->getMessage());
            return null;
        }
    }
}
