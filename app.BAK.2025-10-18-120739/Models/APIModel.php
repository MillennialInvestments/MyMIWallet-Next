<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class APIModel extends Model
{
    protected $table              = 'bf_applications';
    protected $primaryKey         = 'id';
    protected $useAutoIncrement   = true;
    protected $returnType         = 'object'; // Changed from 'object' in CI3
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['field1', 'field2', 'field3']; // Add the allowed fields here
    protected $createdField       = 'created_on';
    protected $updatedField       = 'modified_on';
    protected $deletedField       = 'deleted_on';
    protected $validationRules    = [
        'Name' => 'required|is_unique[bf_contactus.Name,bf_contactus.id]|alpha|max_length[255]',
        'email' => 'required|is_unique[bf_contactus.email,bf_contactus.id]|valid_email|max_length[255]',
        'phone' => 'required|is_unique[bf_contactus.phone,bf_contactus.id]|max_length[30]',
        'message' => 'alpha_dash|max_length[255]'
    ];
    protected $skipValidation     = false;

    // Customize the operations of the model without recreating the insert,
    // update, etc. methods by adding the method names to act as callbacks here.
    protected $beforeInsert       = [];
    protected $afterInsert        = [];
    protected $beforeUpdate       = [];
    protected $afterUpdate        = [];
    protected $beforeFind         = [];
    protected $afterFind          = [];
    protected $beforeDelete       = [];
    protected $afterDelete        = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get exchange orders based on parameters
     */
    public function getExchangeOrders($tradeType, $marketPair, $market)
    {
        return $this->db->table('bf_exchanges_orders')
            ->where('trade_type', $tradeType)
            ->where('market_pair', $marketPair)
            ->where('market', $market)
            ->get()
            ->getResultArray();
    }

    /**
     * Get single exchange orders based on parameters
     */
    public function getSingleExchangeOrders($marketPair, $market, $status)
    {
        return $this->db->table('bf_exchanges_orders')
            ->where('market_pair', $marketPair)
            ->where('market', $market)
            ->where('status', $status)
            ->get()
            ->getResultArray();
    }

    public function getAllOpenOrders($marketPair, $market)
    {
        return $this->db->table('bf_exchanges_orders')
            ->where('status', 'Open')
            ->where('market_pair', $marketPair)
            ->where('market', $market)
            ->get();
    }

    public function getRecentOrders($marketPair, $market, $cuID)
    {
        return $this->db->table('bf_exchanges_orders')
            ->where('status', 'Closed')
            ->where('market_pair', $marketPair)
            ->where('market', $market)
            ->where('user_id', $cuID)
            ->get();
    }

    public function getMarketClosedOrders($marketPair, $market)
    {
        return $this->db->table('bf_exchanges_orders')
            ->select('new_coin_value')
            ->where('status', 'Closed')
            ->where('market_pair', $marketPair)
            ->where('market', $market)
            ->get()
            ->getResultArray();
    }
}
