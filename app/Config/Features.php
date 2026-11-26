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
            // GT-FORM-ROUTES-001: money, crypto and payment flows. Off until the owner turns each one on.
            'FEATURE_EXCHANGE_TRADING' => $this->readBool('FEATURE_EXCHANGE_TRADING', false),
            'FEATURE_SOLANA_TRADING' => $this->readBool('FEATURE_SOLANA_TRADING', false),
            'FEATURE_AUCTIONS' => $this->readBool('FEATURE_AUCTIONS', false),
            'FEATURE_PROJECT_INVESTING' => $this->readBool('FEATURE_PROJECT_INVESTING', false),
            'FEATURE_MYMIGOLD_PURCHASES' => $this->readBool('FEATURE_MYMIGOLD_PURCHASES', false),
            'FEATURE_MEMBERSHIP_PURCHASES' => $this->readBool('FEATURE_MEMBERSHIP_PURCHASES', false),
            // Auto-renewing monthly billing (PayPal Subscriptions). Needs FEATURE_MEMBERSHIP_PURCHASES too.
            'FEATURE_MEMBERSHIP_SUBSCRIPTIONS' => $this->readBool('FEATURE_MEMBERSHIP_SUBSCRIPTIONS', false),
            // MYMI-XCHAIN-001 W8: OFAC SDN and automated sanctions screening
            'FEATURE_SANCTIONS_SCREENING' => $this->readBool('FEATURE_SANCTIONS_SCREENING', false),
            // MYMI-XCHAIN-001 W5: Non-custodial DEX swaps (Jupiter on Solana, 0x on EVM)
            'FEATURE_SWAPS' => $this->readBool('FEATURE_SWAPS', false),
            // MYMI-XCHAIN-001 W6: MyMI Exchange paper trading provider
            'FEATURE_EXCHANGE_PAPER' => $this->readBool('FEATURE_EXCHANGE_PAPER', false),
            // MYMI-XCHAIN-001 W7: MyMI Coin Reg D 506(c) accredited offering on MDIT
            'FEATURE_MYMICOIN_OFFERING' => $this->readBool('FEATURE_MYMICOIN_OFFERING', false),
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
