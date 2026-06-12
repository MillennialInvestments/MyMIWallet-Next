<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class AuditDistribution extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:audit:distribution';
    protected $description = 'Audit marketing distribution destination health and retry posture.';

    public function run(array $params)
    {
        $limit = max(1, (int) (CLI::getOption('limit') ?? 100));
        $service = service('marketingDistributionService');
        $summary = $service->getDistributionSummary($limit);

        CLI::write('Distribution status totals:');
        CLI::write(json_encode($summary['totals'] ?? [], JSON_PRETTY_PRINT));

        $db = db_connect();
        $topFailureClasses = $db->table('bf_marketing_distribution_targets')
            ->select('failure_class, COUNT(*) AS total')
            ->where('failure_class IS NOT NULL', null, false)
            ->groupStart()
                ->where('channel !=', 'discord')
                ->orWhere('destination !=', 'community_news')
            ->groupEnd()
            ->groupBy('failure_class')
            ->orderBy('total', 'DESC')
            ->limit(10)
            ->get()->getResultArray();

        $retryBacklog = $db->table('bf_marketing_distribution_targets')
            ->where('status', 'failed_retryable')
            ->groupStart()
                ->where('channel !=', 'discord')
                ->orWhere('destination !=', 'community_news')
            ->groupEnd()
            ->countAllResults();
        $deadLetterBacklog = $db->table('bf_marketing_distribution_targets')
            ->where('status', 'dead_letter')
            ->groupStart()
                ->where('channel !=', 'discord')
                ->orWhere('destination !=', 'community_news')
            ->groupEnd()
            ->countAllResults();

        $latest403 = $db->table('bf_marketing_distribution_targets')->where('http_status', 403)->orderBy('id', 'DESC')->limit(3)->get()->getResultArray();
        $latest429 = $db->table('bf_marketing_distribution_targets')->where('http_status', 429)->orderBy('id', 'DESC')->limit(3)->get()->getResultArray();
        $optionalDiscordCommunityPending = $db->table('bf_marketing_distribution_targets')
            ->where('channel', 'discord')
            ->where('destination', 'community_news')
            ->where('status', 'pending')
            ->countAllResults();

        $pendingMarketingTargetsByGeneratedStatus = $db->query("
            SELECT
                COALESCE(gc.distribution_status, 'missing_generated_content') AS distribution_status,
                COALESCE(gc.approval_status, 'missing_generated_content') AS approval_status,
                dt.destination,
                COUNT(*) AS total
            FROM bf_marketing_distribution_targets dt
            LEFT JOIN bf_marketing_generated_content gc ON gc.id = dt.generated_content_id
            WHERE dt.channel = 'marketing'
              AND dt.status = 'pending'
            GROUP BY COALESCE(gc.distribution_status, 'missing_generated_content'), COALESCE(gc.approval_status, 'missing_generated_content'), dt.destination
            ORDER BY total DESC
        ")->getResultArray();

        $generatedContentStatusBreakdown = $db->query("
            SELECT
                gc.approval_status,
                gc.distribution_status,
                gc.status,
                COUNT(*) AS total,
                MIN(gc.created_at) AS oldest_created_at,
                MAX(gc.created_at) AS newest_created_at
            FROM bf_marketing_generated_content gc
            GROUP BY gc.approval_status, gc.distribution_status, gc.status
            ORDER BY total DESC
        ")->getResultArray();

        $pendingMarketingTargetAge = $db->query("
            SELECT
                dt.destination,
                MIN(dt.created_on) AS oldest_created_on,
                MAX(dt.created_on) AS newest_created_on,
                COUNT(*) AS total
            FROM bf_marketing_distribution_targets dt
            WHERE dt.channel = 'marketing'
              AND dt.status = 'pending'
            GROUP BY dt.destination
            ORDER BY dt.destination ASC
        ")->getResultArray();

        $optionalDiscordCommunityDebt = $db->table('bf_marketing_distribution_targets')
            ->select('status, COUNT(*) AS total')
            ->where('channel', 'discord')
            ->where('destination', 'community_news')
            ->whereIn('status', ['failed_retryable', 'failed_permanent', 'dead_letter'])
            ->groupBy('status')
            ->get()->getResultArray();


        $approvalMismatch = $db->query("SELECT COUNT(*) AS total
            FROM bf_marketing_generated_content gc
            JOIN bf_marketing_distribution_targets dt ON dt.generated_content_id = gc.id
            WHERE dt.status IN ('pending','sending','failed_retryable')
              AND gc.approval_status NOT IN ('approved','auto_approved')")->getRowArray();

        CLI::newLine();
        CLI::write('Top failure classes:');
        CLI::write(json_encode($topFailureClasses, JSON_PRETTY_PRINT));
        CLI::write('Retry backlog: ' . $retryBacklog);
        CLI::write('Dead-letter backlog: ' . $deadLetterBacklog);
        CLI::write('Optional Discord community debt: ' . json_encode($optionalDiscordCommunityDebt, JSON_PRETTY_PRINT));
        CLI::write('Optional Discord community pending: ' . $optionalDiscordCommunityPending);
        CLI::write('Generated content status breakdown: ' . json_encode($generatedContentStatusBreakdown, JSON_PRETTY_PRINT));
        CLI::write('Pending marketing targets by generated status: ' . json_encode($pendingMarketingTargetsByGeneratedStatus, JSON_PRETTY_PRINT));
        CLI::write('Pending marketing target age: ' . json_encode($pendingMarketingTargetAge, JSON_PRETTY_PRINT));
        CLI::write('Latest 403 examples: ' . json_encode($latest403, JSON_PRETTY_PRINT));
        CLI::write('Latest 429 examples: ' . json_encode($latest429, JSON_PRETTY_PRINT));
        CLI::write('Approval/distributable mismatch count: ' . (int) ($approvalMismatch['total'] ?? 0));
    }
}
