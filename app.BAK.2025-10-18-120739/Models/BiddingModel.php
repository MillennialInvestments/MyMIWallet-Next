<?php

namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class BiddingModel extends Model
{
    protected $table = 'bids';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['auction_id', 'user_id', 'amount', 'time'];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function __construct()
    {
        parent::__construct();
        // Additional initialization code can go here
    }

    public function getBidsForAuction($auctionId)
    {
        return $this->where('auction_id', $auctionId)->findAll();
    }

    public function placeBid($data)
    {
        return $this->insert($data);
    }

    public function getBidsForUser($userId)
    {
        return $this->where('user_id', $userId)->findAll();
    }

    public function getHighestBid($auctionId)
    {
        return $this->selectMax('amount')->where('auction_id', $auctionId)->first();
    }

    public function getAllBids()
    {
        return $this->findAll();
    }

    public function updateBid($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBid($id)
    {
        return $this->delete($id);
    }
}
