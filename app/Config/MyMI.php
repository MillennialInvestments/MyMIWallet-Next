<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MyMI extends BaseConfig
{
    public string $alertEmail = 'tradealerts@mymiwallet.com';
    public string $legacyAlertEmail = 'tradealerts@mymiwallet.com';

    /**
     * @var string[]
     */
    public array $allowedAlertEmails = [];

    public array $alertsDashboard = [
        // ⚙️ Core toggles for Management/Alerts
        'enableAdvisorPackage'   => false, // MyMIAdvisor::generateAdvisorMediaPackage and related advisor media generation
        'enableMomentumScoring'  => false, // MyMIMomentum scoring and any associated backfill logic
        'enableAlphaVantage'     => false, // External AlphaVantage calls initiated from the Alerts dashboard
        'enableSolanaSummary'    => false, // SolanaService summary fetches triggered by this page
        'enableFullWalletBlocks' => false, // Retrieve full wallet sidebar blocks via MyMIWallets
        'enableSignalHotFilter'  => false, // Soft filter: prioritize alerts that match weekly CSV signals
        'maxAlertsPerPage'       => 50,    // Hard cap on open alerts fetched for dashboard tables
    ];

    /**
     * Private fund module toggles.
     *
     * Keep fund features off by default in new environments until migration + policy checks are complete.
     */
    public bool $enable_fund_module = true;
    public bool $enable_secondary_market = false;
    public bool $enable_live_nav = false;
    public bool $enable_project_fund_module = true;
    public bool $enable_project_exchange_bridge = true;
    public bool $enable_secondary_fund_trading = false;
    public bool $enable_mdit_compliance_checks = true;
    public bool $enable_live_nav_sync = false;

    /**
     * Financial guardrails.
     */
    public float $fund_minimum_investment = 10.00;

    public function __construct()
    {
        parent::__construct();

        $this->alertEmail = (string) env('MYMI_ALERT_EMAIL', 'tradealerts@mymiwallet.com');
        $this->legacyAlertEmail = (string) env('MYMI_LEGACY_ALERT_EMAIL', 'tradealerts@mymiwallet.com');

        $allowed = array_filter(array_map('trim', [
            $this->legacyAlertEmail,
            $this->alertEmail,
        ]));

        $this->allowedAlertEmails = array_values(array_unique(array_map('strtolower', $allowed)));
    }
}
