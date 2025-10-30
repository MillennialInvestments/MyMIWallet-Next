<?php 
// TokenModel.php
namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class TokenModel extends Model
{
    protected $table = 'bf_tokens';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'symbol', 'total_supply', 'blockchain', 'admin_wallet', 'metadata_uri'];

    public function getTokenHolders($tokenId)
    {
        return $this->db->table('bf_token_holders')
            ->where('token_id', $tokenId)
            ->get()
            ->getResultArray();
    }

    public function getTotalSupply($tokenId)
    {
        return $this->db->table($this->table)
            ->select('total_supply')
            ->where('id', $tokenId)
            ->get()
            ->getRow()
            ->total_supply;
    }

    public function incrementTotalSupply($tokenId, $amount)
    {
        $this->db->table($this->table)
            ->set('total_supply', "total_supply + $amount", false)
            ->where('id', $tokenId)
            ->update();
    }

    public function createToken($data)
    {
        return $this->insert($data);
    }

    public function markTokenAsClosed($tokenId)
    {
        return $this->db->table($this->table)
            ->set('status', 'closed')
            ->where('id', $tokenId)
            ->update();
    }

    public function getTokenPrice($tokenId)
    {
        return $this->db->table($this->table)
            ->select('current_price')
            ->where('id', $tokenId)
            ->get()
            ->getRow()
            ->current_price;
    }
}
