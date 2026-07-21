<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

final class MarketingMarketFeed extends BaseConfig
{
    public bool $enabled = false;

    public bool $live_network_enabled = false;

    public bool $persist_enabled = false;

    public function __construct()
    {
        parent::__construct();

        $this->enabled = $this->readBoolean(
            'MARKETING_MARKET_FEED_ENABLED',
            false
        );

        $this->live_network_enabled =
            $this->readBoolean(
                'MARKETING_MARKET_FEED_LIVE_NETWORK_ENABLED',
                false
            );

        $this->persist_enabled =
            $this->readBoolean(
                'MARKETING_MARKET_FEED_PERSIST_ENABLED',
                false
            );
    }

    private function readBoolean(
        string $name,
        bool $default
    ): bool {
        $value = env($name, null);

        if ($value === null || $value === '') {
            return $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        $normalized = filter_var(
            $value,
            FILTER_VALIDATE_BOOLEAN,
            FILTER_NULL_ON_FAILURE
        );

        return $normalized ?? $default;
    }
}
