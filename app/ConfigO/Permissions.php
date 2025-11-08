<?php
namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Permissions extends BaseConfig
{
    /**
     * Map of logical capability → label.
     */
    public array $capabilities = [
        'wallet.connect'      => 'Connect wallets',
        'wallet.setDefault'   => 'Set default wallet',
        'wallet.disconnect'   => 'Disconnect wallets',
        'alerts.view'         => 'View trade alerts',
        'alerts.manage'       => 'Create/modify alerts',
        'alerts.distribute'   => 'Distribute alerts (Discord/Zapier)',
        'marketing.view'      => 'View marketing',
        'marketing.publish'   => 'Publish marketing posts',
        // PATCH: API key and webhook management capabilities
        'api.keys.manage'     => 'Manage personal API keys',
        'webhooks.manage'     => 'Manage webhooks',
        // PATCH: feature flag management capability
        'flags.manage'        => 'Manage feature flags',
        // PATCH: privacy capabilities
        'privacy.export'      => 'Export my data',
        'privacy.erase'       => 'Request erasure of my data',
        'privacy.manage'      => 'Admin: approve/deny privacy requests',
        // PATCH: anti-abuse capabilities
        'abuse.view'          => 'View abuse stats',
        'email.verify'        => 'Request email verification',
        'abuse.manage'        => 'Manage abuse controls',
        // PATCH: push notification capabilities
        'notifications.subscribe' => 'Subscribe to push notifications',
        'notifications.send'      => 'Send push notifications',
        // PATCH: finance capabilities
        'finance.view'           => 'View portfolio & P/L',
        'finance.manage'         => 'Manage finance/risk budgets',
        // PATCH: backup capabilities
        'backup.view'            => 'View/download backups',
        'backup.manage'         => 'Run/prune backups',
        // PATCH: docs management capability
        'docs.manage'           => 'Manage docs/sitemap generation',
        'admin.*'             => 'Administrator (all permissions)',
    ];

    /**
     * Default role to capabilities mapping.
     */
    public array $roles = [
        // PATCH: grant feature flag management and anti-abuse capabilities
        'admin'   => ['admin.*','privacy.manage','flags.manage','abuse.view','abuse.manage','notifications.send','finance.view','finance.manage','backup.view','backup.manage','docs.manage'],
        'ops'     => ['alerts.manage','alerts.distribute','marketing.publish','wallet.setDefault','webhooks.manage','api.keys.manage','flags.manage','abuse.view','notifications.send','finance.view','backup.view','backup.manage','docs.manage'],
        'analyst' => ['alerts.view','marketing.view','finance.view'],
        'user'    => ['wallet.connect','wallet.setDefault','wallet.disconnect','alerts.view','marketing.view','privacy.export','privacy.erase','email.verify','notifications.subscribe','finance.view'],
    ];
}
