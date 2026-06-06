<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SocialCampaignSmokeTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:campaign-smoke-test';
    protected $description = 'Validate social campaign calendar and schedule safety.';

    public function run(array $params)
    {
        $db = Database::connect();
        $failures = [];

        foreach (['bf_social_campaigns', 'bf_social_campaign_posts', 'bf_social_campaign_schedule'] as $table) {
            if (! $db->tableExists($table)) {
                $failures[] = 'Missing table: ' . $table;
            }
        }

        if (! class_exists(\App\Services\SocialCampaignService::class)) {
            $failures[] = 'Missing SocialCampaignService';
        }

        $status = empty($failures) ? 'PASS' : 'FAIL';
        CLI::write('Social Campaign Smoke Test: ' . $status, empty($failures) ? 'green' : 'red');
        foreach ($failures as $failure) {
            CLI::error($failure);
        }

        file_put_contents(
            ROOTPATH . 'docs/_aiops/reports/marketing-social-campaign-smoke-test.md',
            "# Marketing Social Campaign Smoke Test\n\n- Status: {$status}\n- Generated UTC: " . gmdate('c') . "\n"
        );

        return empty($failures) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
