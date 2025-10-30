<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class InvestorModel extends Model {
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = []; // Add your fields here

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function __construct() {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getUserData($cuID) {
        return $this->asArray()
                    ->where(['id' => $cuID])
                    ->find();
    }

    // Additional methods converted from CI3 to CI4 for InvestorModel

    public function addAccountInformation($id, $first_name, $middle_name, $last_name, $name_suffix, $phone, $address, $city, $state, $country, $zipcode, $timezones, $language, $advertisement)
    {
        $data = [
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'name_suffix' => $name_suffix,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'zipcode' => $zipcode,
            'timezones' => $timezones,
            'language' => $language,
            'advertisement' => $advertisement,
        ];

        return $this->update($id, $data);
    }

    public function getTradeAlerts()
    {
        return $this->where('status', 'Opened')
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    public function getUserSingleTrades($tradeID)
    {
        return $this->find($tradeID);
    }

    public function addWallet($user_id, $user_email, $broker, $type, $amount, $nickname)
    {
        $data = [
            'user_id' => $user_id,
            'user_email' => $user_email,
            'broker' => $broker,
            'type' => $type,
            'amount' => $amount,
            'nickname' => $nickname,
        ];

        $walletModel = new \App\Models\WalletModel(); // Assume WalletModel exists
        return $walletModel->insert($data);
    }

    public function editWallet($wallet_id, $user_id, $user_email, $broker, $type, $amount, $nickname)
    {
        $data = [
            'user_id' => $user_id,
            'user_email' => $user_email,
            'broker' => $broker,
            'type' => $type,
            'amount' => $amount,
            'nickname' => $nickname,
        ];

        $walletModel = new \App\Models\WalletModel(); // Assume WalletModel exists
        return $walletModel->update($wallet_id, $data);
    }

    public function addWalletDeposit($date, $time, $trans_type, $wallet_id, $user_id, $user_email, $type, $broker, $trans_date, $amount, $nickname, $details)
    {
        $data = [
            'submitted_date' => $date,
            'time' => $time,
            'trans_type' => $trans_type,
            'wallet_id' => $wallet_id,
            'user_id' => $user_id,
            'user_email' => $user_email,
            'type' => $type,
            'broker' => $broker,
            'deposit_date' => $trans_date,
            'amount' => $amount,
            'nickname' => $nickname,
            'details' => $details,
        ];

        $walletTransactionsModel = new \App\Models\WalletTransactionsModel(); // Assume WalletTransactionsModel exists
        return $walletTransactionsModel->insert($data);
    }

    // Add wallet withdraw
    public function addWalletWithdraw($data) {
        $walletTransactionsModel = new \App\Models\WalletTransactionsModel(); // Adjust to your WalletTransactionsModel path
        return $walletTransactionsModel->insert($data);
    }

    // Get wallet count
    public function getWalletCount($cuID) {
        $walletModel = new \App\Models\WalletModel(); // Adjust to your WalletModel path
        return $walletModel->where('user_id', $cuID)->countAllResults();
    }

    // Get user default wallet ID
    public function getUserDefaultWalletId($cuID) {
        $walletModel = new \App\Models\WalletModel(); // Adjust to your WalletModel path
        return $walletModel->where(['user_id' => $cuID, 'default_wallet' => 'Yes'])->first();
    }

    // Get wallet info
    public function getWalletInfo($walletID) {
        $walletModel = new \App\Models\WalletModel(); // Adjust to your WalletModel path
        return $walletModel->find($walletID);
    }

    // Continue with the rest of the methods in similar fashion...

}
