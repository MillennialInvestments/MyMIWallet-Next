<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AuctionModel extends Model
{
    protected $table = 'bf_exchange_auctions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['item_id', 'start_time', 'end_time'];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function __construct()
    {
        parent::__construct();
        // Additional initialization code can go here
    }

    public function getAllAuctions()
    {
        return $this->findAll();
    }

    public function getAuction($id)
    {
        return $this->find($id);
    }

    public function getAuctionsByUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function createAuction($data)
    {
        return $this->insert($data);
    }

    public function updateAuction($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteAuction($id)
    {
        return $this->delete($id);
    }
}
