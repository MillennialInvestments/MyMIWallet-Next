<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class DiligenceModel extends Model
{
    protected $table = 'bf_users_stock_research';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = []; // Specify the fields that are allowed to be inserted/updated
    protected $createdField = 'created_on';
    protected $updatedField = 'modified_on';
    protected $deletedField = 'deleted_on';

    public function __construct()
    {
        parent::__construct();
        // Additional initialization code can go here
    }

    public function getResearch()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    public function getUserResearch($cuID)
    {
        return $this->where('user_id', $cuID)->orderBy('id', 'DESC')->findAll(10);
    }

    public function getUserLastResearch($cuID)
    {
        return $this->where('user_id', $cuID)->orderBy('id', 'DESC')->first();
    }

    public function getUserNextResearch($cuID)
    {
        return $this->where('user_id', $cuID)->orderBy('id', 'DESC')->findAll(1, 9);
    }

    public function getCommunityResearch($cuID)
    {
        return $this->where('user_id !=', $cuID)->orderBy('id', 'DESC')->findAll();
    }

    public function getMostRecentResearch()
    {
        return $this->where('approved', 'Yes')->orderBy('id', 'DESC')->findAll();
    }

    public function getMostRecentStockResearch($symbol)
    {
        return $this->where('stock', $symbol)->where('approved', 'Yes')->orderBy('id', 'DESC')->findAll();
    }
}
