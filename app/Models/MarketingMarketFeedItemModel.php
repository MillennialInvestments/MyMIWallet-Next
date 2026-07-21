<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingMarketFeedItemModel extends Model
{
    protected $table = 'bf_marketing_market_feed_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'identity_sha256', 'source_key', 'external_item_id', 'title', 'summary',
        'canonical_url', 'published_at', 'collected_at', 'payload_sha256',
        'normalized_metadata_json', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    public function getFeedItems()
    {
        return $this->findAll();
    }

    public function getItemById($id)
    {
        return $this->find($id);
    }

    public function addItem(array $data)
    {
        return $this->insert($data);
    }

    public function updateItem($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteItem($id)
    {
        return $this->delete($id);
    }
}
