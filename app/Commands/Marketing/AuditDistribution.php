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
        CLI::write('Latest 403 examples: ' . json_encode($latest403, JSON_PRETTY_PRINT));
        CLI::write('Latest 429 examples: ' . json_encode($latest429, JSON_PRETTY_PRINT));
        CLI::write('Approval/distributable mismatch count: ' . (int) ($approvalMismatch['total'] ?? 0));
    }
}
