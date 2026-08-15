<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

final class MarketingMarketFeed extends BaseConfig
{
    public bool $enabled = false;

    public bool $live_network_enabled = false;

    public bool $persist_enabled = false;

    public bool $alpha_vantage_enabled = false;
    public string $alpha_vantage_api_key = '';
    public int $alpha_vantage_connect_timeout_ms = 3000;
    public int $alpha_vantage_timeout_ms = 10000;
    public int $alpha_vantage_max_response_bytes = 1048576;
    public int $alpha_vantage_retry_attempts = 0;

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

        $this->alpha_vantage_enabled = $this->readBoolean(
            'MARKETING_MARKET_FEED_ALPHA_VANTAGE_ENABLED',
            false
        );

        $this->alpha_vantage_api_key = trim((string) env(
            'MARKETING_MARKET_FEED_ALPHA_VANTAGE_API_KEY',
            ''
        ));

        $this->alpha_vantage_connect_timeout_ms = $this->readInteger(
            'MARKETING_MARKET_FEED_ALPHA_VANTAGE_CONNECT_TIMEOUT_MS',
            3000,
            250,
            10000
        );

        $this->alpha_vantage_timeout_ms = $this->readInteger(
            'MARKETING_MARKET_FEED_ALPHA_VANTAGE_TIMEOUT_MS',
            10000,
            1000,
            30000
        );

        $this->alpha_vantage_max_response_bytes = $this->readInteger(
            'MARKETING_MARKET_FEED_ALPHA_VANTAGE_MAX_RESPONSE_BYTES',
            1048576,
            4096,
            4194304
        );

        $this->alpha_vantage_retry_attempts = $this->readInteger(
            'MARKETING_MARKET_FEED_ALPHA_VANTAGE_RETRY_ATTEMPTS',
            0,
            0,
            1
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

    private function readInteger(
        string $name,
        int $default,
        int $minimum,
        int $maximum
    ): int {
        $value = env($name, null);

        if ($value === null || $value === '') {
            return $default;
        }

        if (is_int($value)) {
            return max(min($value, $maximum), $minimum);
        }

        if (is_string($value)) {
            $trimmedValue = trim($value);
            if (ctype_digit($trimmedValue) || preg_match('/^-?\d+$/', $trimmedValue)) {
                $intValue = intval($trimmedValue);
                return max(min($intValue, $maximum), $minimum);
            }
        }

        return $default;
    }
}
