<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class PlaidModel extends Model
{
    protected $table = 'bf_applications'; // Update as per CI4 database schema

    public function __construct()
    {
        parent::__construct();
    }

    public function savePublicToken($data)
    {
        if (!$this->db->table('bf_users_public_tokens')->insert($data)) {
            log_message('error', 'Failed to save public token: ' . json_encode($data));
            return false;
        }
        return true;
    }

    public function exchangePublicToken($public_token)
    {
        // Assuming you have a method getPlaidClient() that returns a configured Plaid client instance
        $client = $this->getPlaidClient();
        $response = $client->exchangePublicToken($public_token);

        if (!$response) {
            log_message('error', "Failed to exchange public token: {$public_token}");
            return null;
        }

        return json_decode($response, true);
    }

    public function saveTokens($data)
    {
        if (!$this->db->table('bf_users_public_tokens')->insert($data)) {
            log_message('error', 'Failed to save tokens: ' . json_encode($data));
            return false;
        }
        return $this->db->insertID();
    }

    public function checkItemStatus($cuID, $saveTokenID, $item_id)
    {
        $getItem = $this->db->table('bf_users_wallet')
                            ->where('item_id', $item_id)
                            ->get()
                            ->getResultArray();

        if (!empty($getItem['id'])) {
            $walletStatus = 'Existing';
            $walletData = $getItem;
            $accessData = [];
        } else {
            $walletStatus = 'New';
            $walletData = [];
            $accessData = $this->getAccessToken($cuID, $item_id);
        }

        if ($this->db->affectedRows() == 0) {
            log_message('error', "No item found with item_id: {$item_id}");
            return ['walletStatus' => 'Not Found', 'walletData' => [], 'accessData' => []];
        }

        return ['walletStatus' => $walletStatus, 'walletData' => $walletData, 'accessData' => $accessData];
    }

    public function getAccessToken($cuID, $item_id = null)
    {
        $query = $this->db->table('bf_users_public_tokens')
                          ->where('created_by', $cuID);

        if ($item_id !== null) {
            $query->where('item_id', $item_id);
        }

        $accessTokenData = $query->get()->getRowArray();

        if (empty($accessTokenData)) {
            log_message('error', "No access token found for cuID: {$cuID}, item_id: {$item_id}");
            return null;
        }

        return $accessTokenData;
    }

    public function saveWalletData($walletData)
    {
        if (!$this->db->table('bf_users_wallet')->insert($walletData)) {
            log_message('error', 'Failed to save wallet data: ' . json_encode($walletData));
            return false;
        }
        return $this->db->insertID();
    }

    public function getInstitutionByID($institution_id)
    {
        try {
            // Assuming MyMIPlaid is a service that provides an instance of the Plaid client
            $client = $this->MyMIPlaid->get_plaid_client();
            $response = $client->institutions->get($institution_id);
            return $response;
        } catch (Exception $e) {
            log_message('error', 'Error in getInstitutionByID: ' . $e->getMessage());
            return null;
        }
    }

    public function saveTransactions($transactions)
    {
        foreach ($transactions as $transaction) {
            $currentBalance = $this->getCurrentBalance($transaction['account_id']);
            $newBalance = $transaction['transaction_type'] == 'debit' ? $currentBalance - $transaction['amount'] : $currentBalance + $transaction['amount'];

            $walletTransactionData = [
                // Populate this array with the transaction data
            ];

            $budgetingData = $this->prepareBudgetingData($transaction);

            if (!$this->db->table('bf_users_wallet_transactions')->insert($walletTransactionData)) {
                log_message('error', 'Failed to save transaction: ' . json_encode($walletTransactionData));
            }

            if (!$this->db->table('bf_users_budgeting')->insert($budgetingData)) {
                log_message('error', 'Failed to save budgeting data: ' . json_encode($budgetingData));
            }

            if (!$this->updateAccountBalance($transaction['account_id'], $newBalance)) {
                log_message('error', 'Failed to update account balance for account ID: ' . $transaction['account_id']);
            }
        }
    }

    private function getCurrentBalance($accountId)
    {
        $query = $this->db->table('bf_users_bank_accounts')
                          ->select('balance')
                          ->where('account_id', $accountId)
                          ->get();

        if ($query->getNumRows() > 0) {
            return $query->getRow()->balance;
        }
        return 0;
    }

    private function updateAccountBalance($accountId, $newBalance)
    {
        $data = ['balance' => $newBalance];
        return $this->db->table('bf_users_bank_accounts')
                        ->where('account_id', $accountId)
                        ->update($data);
    }

    private function prepareBudgetingData($transaction, $itemId)
    {
        return [
            // Populate this array with the budgeting data
        ];
    }

    public function getLinkToken($client_id, $secret)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://sandbox.plaid.com/link/token/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode([
                'client_id' => $client_id,
                'secret' => $secret,
                'user' => ['client_user_id' => 'unique_user_id'],
                'client_name' => 'Plaid App',
                'products' => ['auth', 'transactions'],
                'country_codes' => ['US'],
                'language' => 'en',
            ]),
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function fetchBalanceData($accessToken)
    {
        $url = "https://sandbox.plaid.com/accounts/balance/get";
        $payload = json_encode([
            'client_id' => $this->client_id,
            'secret' => $this->secret,
            'access_token' => $accessToken,
        ]);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            log_message('error', 'cURL error in fetch_balance_data: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }
        curl_close($ch);
        $balanceData = json_decode($response, true);
        return $balanceData;
    }

    public function fetchTransactions($accessToken)
    {
        $url = "https://sandbox.plaid.com/transactions/get";
        $startDate = date('Y-m-d', strtotime('-30 days'));
        $endDate = date('Y-m-d');
        $payload = json_encode([
            'client_id' => $this->client_id,
            'secret' => $this->secret,
            'access_token' => $accessToken,
            'start_date' => $startDate,
            'end_date' => $endDate,
        ]);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            log_message('error', 'cURL error in fetch_transactions: ' . curl_error($ch));
            curl_close($ch);
            return null;
        }
        curl_close($ch);
        $transactionData = json_decode($response, true);
        return $transactionData;
    }

    // Implement other methods as needed...
}
