<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MyMI extends BaseConfig
{
    public array $alertsDashboard = [
        // ⚙️ Core toggles for Management/Alerts
        'enableAdvisorPackage'   => false, // MyMIAdvisor::generateAdvisorMediaPackage and related advisor media generation
        'enableMomentumScoring'  => false, // MyMIMomentum scoring and any associated backfill logic
        'enableAlphaVantage'     => false, // External AlphaVantage calls initiated from the Alerts dashboard
        'enableSolanaSummary'    => false, // SolanaService summary fetches triggered by this page
        'enableFullWalletBlocks' => false, // Retrieve full wallet sidebar blocks via MyMIWallets
        'maxAlertsPerPage'       => 50,    // Hard cap on open alerts fetched for dashboard tables
    ];
}