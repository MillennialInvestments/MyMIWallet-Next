<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class MyMIGoldModel extends Model
{
    protected $table = 'bf_mymigold_overview'; // Update the table name as per CI4 database schema
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'Name', 'email', 'phone', 'message', // Update with actual fields from your database
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $createdByField = 'created_by';
    protected $updatedByField = 'modified_by';

    protected $validationRules = [
        'Name' => 'required|alpha|max_length[255]',
        'email' => 'required|valid_email|max_length[255]',
        'phone' => 'required|max_length[30]',
        'message' => 'alpha_dash|max_length[255]',
    ];

    // Other properties and methods...

    public function getOrderInformation($orderID)
    {
        return $this->table('bf_users_coin_purchases')
                    ->where('id', $orderID)
                    ->first();
    }

    public function getInitialCoinValue()
    {
        return $this->table('bf_mymigold_overview')
                    ->orderBy('id', 'ASC')
                    ->first();
    }

    public function getCoinValue($coin = 'MYMIG') {
        $builder = $this->db->table('bf_exchanges')->select('current_value');
        $builder->where('market_pair', 'USD');
        $builder->where('market', $coin);
        $result = $builder->get()->getRowArray();
        return $result ?? ['current_value' => '0.00']; 
    }
    
    public function getCoinInfo($coin) { 
        $builder = $this->db->table('bf_exchanges');
        $builder->where('market_pair', 'USD');
        $builder->where('market', $coin);
        return $builder->get()->getResultArray();
    }
    
    public function getUserCoinTotal($cuID) {
        $builder = $this->db->table('bf_exchanges_orders');
        $builder->select('initial_coin_value');
        $builder->selectSum('total');
        $builder->where('user_id', $cuID);
        $builder->where('market', 'MYMIG');
        $builder->where('status', 'Closed');
        return $builder->get()->getRowArray();
    }

    public function completePurchase($transId) {
        $builder = $this->db->table('bf_users_coin_purchases');
        $builder->where('id', $transId);
        $builder->set(['status' => 'Complete']);
        return $builder->update();
    }

    public function completeOverview($transId)
    {
        return $this->table('bf_mymigold_overview')
                    ->where('trans_id', $transId)
                    ->set(['status' => 'Complete'])
                    ->update();
    }

    public function getUserCoinTransactionTotals($cuID) {
        $builder = $this->db->table('bf_users_purchases');
        $builder->selectSum('amount');
        $builder->where('user_id', $cuID);
        return $builder->get()->getRowArray();
    }

    public function updateAvailableCoins($data) {
        $builder = $this->db->table('bf_investments_overview');
        return $builder->insert($data);
    }

    public function addUserRequest($data) {
        $builder = $this->db->table('bf_users_coin_purchases');
        return $builder->insert($data);
    }

    public function getLastPurchaseId()
    {
        return $this->table('bf_users_coin_purchases')
                    ->orderBy('id', 'DESC')
                    ->first();
    }

    public function getLastOrderInfo($cuID)
    {
        return $this->table('bf_users_coin_purchases')
                    ->where('user_id', $cuID)
                    ->where('coin', 'MYMIG')
                    ->where('status', 'Incomplete')
                    ->orderBy('id', 'DESC')
                    ->first();
    }

    public function getLastCompletedOrderIDByUser($cuID)
    {
        $result = $this->db->table('bf_users_coin_purchases')
                    ->select('id')
                    ->where('user_id', $cuID)
                    ->where('status', 'Complete')
                    ->where('coin', 'MYMIG')
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->getResultArray();
    
        log_message('debug', 'MyMIGoldModel L130 - $result: ' . print_r($result, true));
    
        // Check if $result is not empty and access the first entry's 'id'
        if (!empty($result)) {
            $resultID = $result[0]['id'];
            log_message('debug', 'MyMIGoldModel L132 - $resultID: ' . $resultID);
            return $result;
        }
    
        return null; // Return null if no result found
    }   

    public function validateUserTransaction($userId, $transactionId)
    {
        $result = $this->db->table('bf_users_coin_purchases')
                        ->select('id')
                        ->where('user_id', $userId)
                        ->where('id', $transactionId)
                        ->where('status', 'Complete') // Ensuring the status matches what you're validating
                        ->get()
                        ->getRow();

        log_message('debug', 'validateUserTransaction - Result: ' . print_r($result, true)); // Log the result
        
        return $result ? true : false; // Return true if the transaction is found, false otherwise
    }

    public function getLastIncompleteOrderInfo($cuID)
    {
        return $this->table('bf_users_coin_purchases')
                    ->where('user_id', $cuID)
                    ->where('status', 'Incomplete')
                    ->where('coin', 'MYMIG')
                    ->orderBy('id', 'DESC')
                    ->get()
                    ->getRow();
    }

    public function getLastCompletedOrderInfo($trans_id)
    {
        $result = $this->db->table('bf_users_coin_purchases')
                    ->where('id', $trans_id)
                    ->where('status', 'Complete')
                    ->get()
                    ->getRowArray();
    
        log_message('debug', 'getLastCompletedOrderInfo - Trans ID: ' . $trans_id);
        log_message('debug', 'getLastCompletedOrderInfo - Result: ' . print_r($result, true));
    
        return $result;
    }    

    public function purchaseFeature($data)
    {
        return $this->table('bf_users_purchases')
                    ->insert($data);
    }

    // Balance Management Methods
    public function getUserBalance($userId)
    {
        return $this->db->table('users')
            ->where('id', $userId)
            ->select('mymi_gold_balance')
            ->get()
            ->getRow()
            ->mymi_gold_balance;
    }

    public function deductBalance($userId, $amount)
    {
        return $this->db->table('users')
            ->where('id', $userId)
            ->set('mymi_gold_balance', 'mymi_gold_balance - ' . $amount, false)
            ->update();
    }

    public function creditUserBalance($userId, $amount)
    {
        return $this->db->table('users')
            ->where('id', $userId)
            ->set('mymi_gold_balance', 'mymi_gold_balance + ' . $amount, false)
            ->update();
    }
    // Continue implementing the remaining methods as required...
}
