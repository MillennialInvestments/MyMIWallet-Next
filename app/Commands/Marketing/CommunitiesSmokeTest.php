<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class CommunitiesSmokeTest extends SafeBaseCommand
{
    protected $group       = 'Marketing';
    protected $name        = 'marketing:communities:smoke-test';
    protected $description = 'Validate community marketing platform tables, docs, routes, templates, and draft-only safety.';

    public function run(array $params)
    {
        $db = Database::connect();

        $checks = [];
        $failures = [];

        $requiredTables = [
            'bf_social_platforms',
            'bf_social_communities',
            'bf_social_post_templates',
            'bf_social_generated_posts',
            'bf_social_distribution_queue',
        ];

        foreach ($requiredTables as $table) {
            $ok = $db->tableExists($table);
            $checks[] = ['table_exists:' . $table, $ok];
            if (! $ok) {
                $failures[] = 'Missing table: ' . $table;
            }
        }

        $platformCount = $db->table('bf_social_platforms')->countAllResults();
        $templateCount = $db->table('bf_social_post_templates')->countAllResults();

        $checks[] = ['platform_count>=8', $platformCount >= 8];
        $checks[] = ['template_count>=72', $templateCount >= 72];

        if ($platformCount < 8) {
            $failures[] = 'Expected at least 8 social platforms, found ' . $platformCount;
        }

        if ($templateCount < 72) {
            $failures[] = 'Expected at least 72 social templates, found ' . $templateCount;
        }

        $requiredDocs = [
            'docs/communities/youtube.md',
            'docs/communities/tiktok.md',
            'docs/communities/twitch.md',
            'docs/communities/discord.md',
            'docs/communities/facebook.md',
            'docs/communities/linkedin.md',
            'docs/communities/x_twitter.md',
            'docs/communities/stocktwits.md',
            'docs/platform_formats/youtube.md',
            'docs/funnels/community_funnel.md',
            'docs/automation/communities/cron_plan.md',
            'docs/revenue_streams/README.md',
        ];

        foreach ($requiredDocs as $doc) {
            $ok = is_file(ROOTPATH . $doc);
            $checks[] = ['doc_exists:' . $doc, $ok];
            if (! $ok) {
                $failures[] = 'Missing doc: ' . $doc;
            }
        }

        $formatterExists = class_exists(\App\Services\SocialPostFormatter::class);
        $checks[] = ['formatter_exists', $formatterExists];

        if (! $formatterExists) {
            $failures[] = 'Missing SocialPostFormatter service';
        }

        $routes = shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && php spark routes 2>&1') ?: '';

        foreach ([
            'API/Management/getSocialPlatforms',
            'API/Management/getSocialCommunities',
            'API/Management/generatePlatformPosts',
            'API/Management/generateRevenueDocs',
            'API/Management/cronGenerateDailyCommunityPosts',
            'API/Management/cronQueueDistribution',
        ] as $needle) {
            $ok = str_contains($routes, $needle);
            $checks[] = ['route_exists:' . $needle, $ok];
            if (! $ok) {
                $failures[] = 'Missing route: ' . $needle;
            }
        }

        $status = empty($failures) ? 'PASS' : 'FAIL';

        CLI::write('Community Marketing Smoke Test: ' . $status, empty($failures) ? 'green' : 'red');
        CLI::write('Platforms: ' . $platformCount);
        CLI::write('Templates: ' . $templateCount);

        foreach ($failures as $failure) {
            CLI::error($failure);
        }

        $reportDir = ROOTPATH . 'docs/_aiops/reports';
        if (! is_dir($reportDir)) {
            mkdir($reportDir, 0775, true);
        }

        file_put_contents(
            $reportDir . '/community-marketing-smoke-test.md',
            "# Community Marketing Smoke Test\n\n"
            . "- Status: {$status}\n"
            . "- Platforms: {$platformCount}\n"
            . "- Templates: {$templateCount}\n"
            . "- Generated UTC: " . gmdate('c') . "\n\n"
            . "## Failures\n"
            . (empty($failures) ? "- None\n" : "- " . implode("\n- ", $failures) . "\n")
        );

        return empty($failures) ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
