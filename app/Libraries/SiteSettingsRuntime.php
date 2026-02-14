<?php

namespace App\Libraries;

use App\Config\SiteSettings;
use App\Libraries\SiteSettingsOverride;

class SiteSettingsRuntime
{
    /**
     * Apply post-bootstrap overrides for site settings.
     */
    public static function apply(SiteSettings $config): void
    {
        (new SiteSettingsOverride())->apply($config);

        $cachedToggles = [
            'aiOpsEnabled',
            'aiOpsAllowOverride',
            'aiSelfHostedEnabled',
            'aiChatgptPlusEnabled',
            'aiCodexEnabled',
            'aiGithubReviewEnabled',
            'aiGapTrackerSyncEnabled',
            'aiAutoMarketingDraftsEnabled',
            'aiAutoAlertsDigestEnabled',
            'aiDocsAlignmentEnabled',
            'aiops_enabled',
            'aiops_llm_enabled',
        ];

        foreach ($cachedToggles as $toggleKey) {
            $cacheKey = sanitizeCacheKey('aiops_' . $toggleKey);
            $cached   = cache($cacheKey);

            if ($cached !== null) {
                $config->$toggleKey = $cached;
            }
        }
    }
}
