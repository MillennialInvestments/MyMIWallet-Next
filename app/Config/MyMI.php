<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MyMI extends BaseConfig
{
    public string $alertEmail = 'tradealerts@mymiwallet.com';
    public string $legacyAlertEmail = 'alerts@mymiwallet.com';

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

    public function __construct()
    {
        parent::__construct();

        $this->alertEmail = (string) env('MYMI_ALERT_EMAIL', 'tradealerts@mymiwallet.com');
        $this->legacyAlertEmail = (string) env('MYMI_LEGACY_ALERT_EMAIL', 'alerts@mymiwallet.com');

        $allowed = array_filter(array_map('trim', [
            $this->legacyAlertEmail,
            $this->alertEmail,
        ]));

        $this->allowedAlertEmails = array_values(array_unique(array_map('strtolower', $allowed)));
    }
}
