<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MarketingDistribution extends BaseConfig
{
    /** @var array<string,bool> */
    public array $enabledDestinations = [
        'blog' => true,
        'in_app' => true,
        'email' => true,
        'discord' => true,
        // Phase II adapter slots
        'bluesky' => false,
        'mastodon' => false,
        'linkedin' => false,
        'webhook' => false,
    ];

    /** @var array<string,list<string>> */
    public array $routingRulesBySourceType = [
        'default' => ['blog', 'in_app', 'email', 'discord'],
        'notification' => ['in_app', 'email', 'discord'],
        'headline' => ['blog', 'discord'],
        'campaign' => ['blog', 'email', 'discord'],
    ];

    /** @var list<string> */
    public array $internalEmailRecipients = [
        'ops@mymiwallet.com',
    ];

    public int $maxRetries = 3;
    public bool $autoCreateTargetsOnApprove = true;

    public function __construct()
    {
        parent::__construct();

        foreach (array_keys($this->enabledDestinations) as $destination) {
            $this->enabledDestinations[$destination] = (bool) env('MARKETING_DISTRIBUTION_' . strtoupper($destination) . '_ENABLED', $this->enabledDestinations[$destination]);
        }

        $internalRecipients = trim((string) env('MARKETING_INTERNAL_EMAIL_RECIPIENTS', ''));
        if ($internalRecipients !== '') {
            $this->internalEmailRecipients = array_values(array_filter(array_map('trim', explode(',', $internalRecipients))));
        }

        $this->maxRetries = max(0, (int) env('MARKETING_DISTRIBUTION_MAX_RETRIES', $this->maxRetries));
        $this->autoCreateTargetsOnApprove = (bool) env('MARKETING_DISTRIBUTION_AUTO_CREATE_TARGETS_ON_APPROVE', $this->autoCreateTargetsOnApprove);
    }
}
