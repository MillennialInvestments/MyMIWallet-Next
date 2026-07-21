<?php

namespace App\Services\Marketing\MarketFeed;

use Config\Services;
use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\Config;
use CodeIgniter\Database\Query;
use CodeIgniter\Database\ResultInterface;
use CodeIgniter\I18n\Time;
use CodeIgniter\Session\Session;
use CodeIgniter\Utils\Format;

class MarketFeedRepositoryService
{
    protected $db;
    protected $session;

    public function __construct()
    {
        $this->db = Services::database();
        $this->session = Services::session();
    }

    public function persistenceEnabled(): bool
    {
        return (bool) env('MARKETING_MARKET_FEED_ENABLED') && (bool) env('MARKETING_MARKET_FEED_PERSIST_ENABLED');
    }

    public function preview(array $items): array
    {
        // Preview logic here, no write operations allowed
        return $items;
    }

    public function persist(array $items): array
    {
        if (!$this->persistenceEnabled()) {
            return [];
        }

        $marketFeedModel = new MarketFeedModel();
        $deterministicIdentities = [];

        foreach ($items as $item) {
            // Generate deterministic identity based on item data
            $identity = md5(serialize($item));
            if (!in_array($identity, $deterministicIdentities)) {
                $marketFeedModel->save($item);
                $deterministicIdentities[] = $identity;
            }
        }

        return $items;
    }
}
