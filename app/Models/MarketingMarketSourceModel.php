<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingMarketSourceModel extends Model
{
    protected $table = 'bf_marketing_market_sources';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'source_key', 'source_name', 'source_url', 'adapter_class', 'enabled',
        'configuration_json', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;

    public function getSources($enabledOnly = false)
    {
        if ($enabledOnly) {
            return $this->where('enabled', 1)->findAll();
        }
        return $this->findAll();
    }

    public function getSourceById($id)
    {
        return $this->find($id);
    }

    public function addSource(array $data)
    {
        return $this->insert($data);
    }

    public function updateSource($id, array $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSource($id)
    {
        return $this->delete($id);
    }
}
