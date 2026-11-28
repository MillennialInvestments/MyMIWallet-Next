<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Projects extends BaseConfig
{
    public array $emailTriggers = ['PROPERTY', 'ZILLOW'];
    public float $defaultMinCommit = 100.00;
    public ?float $defaultMaxCommit = null;
    public string $defaultCommitDeadline = '+21 days';
    public float $defaultMonthlyFee = 7.5;
    public array $monthlyWithdrawalFeeTiers = [
        ['days' => 30, 'fee' => 10.0],
        ['days' => 60, 'fee' => 7.5],
        ['days' => 90, 'fee' => 5.0],
    ];
    public float $postQuarterFee = 1.0;

    /**
     * Real Estate Private Equity & Syndication Sponsor Configuration
     */
    public string $sponsorEntity = 'Timothy Burks Incorporated, LLC.';
    public array $operatingManagers = [
        'Timothy Burks'       => 'Managing Member & Co-Owner',
        'AnneAlicia Burks'    => 'Managing Member & Co-Owner',
    ];
    public string $sponsorJurisdiction = 'Bossier City, Louisiana';
    public string $sponsorRegistration = 'Louisiana Secretary of State (GeauxBiz)';
}
