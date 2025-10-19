<?php namespace App\Models;

use CodeIgniter\Model;

#[\AllowDynamicProperties]
class AssetsModel extends Model
{
    protected $table = 'bf_exchanges_assets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', /* other fields as required */];
    protected $returnType = 'array';

    public function getAssetsData($userId)
    {
        return $this->where('user_id', $userId)
                    ->findAll();
    }

    public function addAsset($data)
    {
        return $this->insert($data);
    }

    public function updateAsset($assetId, $data)
    {
        return $this->update($assetId, $data);
    }

    public function deleteAsset($assetId)
    {
        return $this->delete($assetId);
    }

    public function getAssetById($assetId)
    {
        return $this->find($assetId);
    }

    public function getAssetsBySymbol($symbol)
    {
        return $this->where('symbol', $symbol)
                    ->findAll();
    }

    public function getTotalAssetsValue($userId)
    {
        return $this->selectSum('coin_value')
                    ->where('user_id', $userId)
                    ->first()['coin_value'];
    }

    public function getAssetCategories($userId)
    {
        return $this->distinct()
                    ->select('category')
                    ->where('user_id', $userId)
                    ->findAll();
    }

    public function getAssetsByCategory($userId, $category)
    {
        return $this->where('user_id', $userId)
                    ->where('category', $category)
                    ->findAll();
    }

    public function searchAssets($userId, $keyword)
    {
        return $this->where('user_id', $userId)
                    ->like('coin_name', $keyword)
                    ->findAll();
    }

    public function getAssetsByMarketCap($userId, $minMarketCap, $maxMarketCap)
    {
        return $this->where('user_id', $userId)
                    ->where('market_cap >=', $minMarketCap)
                    ->where('market_cap <=', $maxMarketCap)
                    ->findAll();
    }

    public function getAssetsByPurpose($userId, $purpose)
    {
        return $this->where('user_id', $userId)
                    ->like('purpose', $purpose)
                    ->findAll();
    }

    public function getAssetDetails($userId, $assetId)
    {
        return $this->where('user_id', $userId)
                    ->where('id', $assetId)
                    ->first();
    }

    public function getAssetCount($userId)
    {
        return $this->where('user_id', $userId)
                    ->countAllResults();
    }

    public function getTotalPortfolioValue($userId)
    {
        return $this->selectSum('coin_value')
                    ->where('user_id', $userId)
                    ->first()['coin_value'];
    }

    public function getAllAssets()
    {
        return $this->findAll();
    }

    public function getAsset($assetId)
    {
        return $this->find($assetId);
    }

    public function listTradableAssets()
    {
        return $this->where('is_tradable', 1)
                    ->findAll();
    }

    public function getClosedTradeHistory($assetId)
    {
        return $this->db->table('bf_users_trades')
                        ->where('asset_id', $assetId)
                        ->where('status', 'closed')
                        ->get()
                        ->getResultArray();
    }
    
    public function getPrivateKey($userId)
    {
        $wallet = $this->db->table('wallets')
                           ->where('user_id', $userId)
                           ->get()
                           ->getRowArray();
        return $wallet ? $wallet['private_key'] : null;
    }
    
    public function getAddress($userId)
    {
        $wallet = $this->db->table('wallets')
                           ->where('user_id', $userId)
                           ->get()
                           ->getRowArray();
        return $wallet ? $wallet['address'] : null;
    }
    
    public function getUserOpenOrders($userId)
    {
        return $this->db->table('bf_exchanges_orders')
                        ->where('user_id', $userId)
                        ->where('status', 'open')
                        ->get()
                        ->getResultArray();
    }
    
    public function getUserTradeHistory($userId)
    {
        return $this->db->table('bf_users_trades')
                        ->where('user_id', $userId)
                        ->get()
                        ->getResultArray();
    }
    
    public function createAuction($assetId, $startPrice, $minIncrement)
    {
        $data = [
            'asset_id' => $assetId,
            'start_price' => $startPrice,
            'min_increment' => $minIncrement,
            'status' => 'open'
        ];
        $this->db->table('bf_auctions')->insert($data);
        return $this->db->insertID();
    }
    
    public function getAuction($auctionId)
    {
        return $this->db->table('bf_auctions')
                        ->where('id', $auctionId)
                        ->get()
                        ->getRowArray();
    }
    
    public function placeBid($userId, $auctionId, $amount)
    {
        $data = [
            'user_id' => $userId,
            'auction_id' => $auctionId,
            'amount' => $amount
        ];
        $this->db->table('bids')->insert($data);
        return $this->db->insertID();
    }
    
    public function endAuction($auctionId)
    {
        $data = ['status' => 'closed'];
        $this->db->table('bf_auctions')
                 ->where('id', $auctionId)
                 ->update($data);
    }

    // ... [Continue with other methods as required]
}
