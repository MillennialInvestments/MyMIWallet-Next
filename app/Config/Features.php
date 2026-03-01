<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Features extends BaseConfig
{
    /** @var array<string,bool> */
    private array $featureMap;

    public function __construct()
    {
        parent::__construct();

        $this->featureMap = [
            'FEATURE_BUDGET' => $this->readBool('FEATURE_BUDGET', true),
            'FEATURE_INVESTMENTS' => $this->readBool('FEATURE_INVESTMENTS', true),
            'FEATURE_WATCHLIST' => $this->readBool('FEATURE_WATCHLIST', true),
            'FEATURE_TRADE_ALERTS' => $this->readBool('FEATURE_TRADE_ALERTS', true),
            'FEATURE_WALLETS' => $this->readBool('FEATURE_WALLETS', false),
            'FEATURE_PREDICTIONS' => $this->readBool('FEATURE_PREDICTIONS', false),
            'FEATURE_MARKETING_AUTOMATION' => $this->readBool('FEATURE_MARKETING_AUTOMATION', true),
        ];
    }

    public function enabled(string $feature): bool
    {
        $key = strtoupper(trim($feature));

        if ($key === '') {
            return false;
        }

        return $this->featureMap[$key] ?? false;
    }

    /** @return array<string,bool> */
    public function all(): array
    {
        return $this->featureMap;
    }

    private function readBool(string $key, bool $default): bool
    {
        $value = env($key);

        if ($value === null || $value === '') {
            return $default;
        }

        if (is_bool($value)) {
            return $value;
        }

        $normalized = strtolower(trim((string) $value));

        return in_array($normalized, ['1', 'true', 'yes', 'on'], true);
    }
}
