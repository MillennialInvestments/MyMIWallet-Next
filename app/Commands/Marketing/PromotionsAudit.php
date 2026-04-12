<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class PromotionsAudit extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:promotions:audit';
    protected $description = 'Audit promotion source data and campaign readiness from scraper and campaign tables.';
    protected $usage = 'marketing:promotions:audit [--days=7] [--limit=10]';
    protected $arguments = [];
    protected $options = [
        '--days'  => 'Lookback window in days. Default: 7',
        '--limit' => 'Limit for sample rows. Default: 10',
    ];

    public function run(array $params)
    {
        $days = (int) (CLI::getOption('days') ?? 7);
        $limit = (int) (CLI::getOption('limit') ?? 10);

        if ($days <= 0) {
            $days = 7;
        }

        if ($limit <= 0) {
            $limit = 10;
        }

        CLI::write('Running promotions audit...', 'yellow');

        try {
            $db = Database::connect();

            $this->assertTableExists($db, 'bf_marketing_scraper');
            $this->assertTableExists($db, 'bf_marketing_campaigns');

            $fromDate = date('Y-m-d H:i:s', strtotime("-{$days} days"));

            $scraperBuilder = $db->table('bf_marketing_scraper');
            $campaignBuilder = $db->table('bf_marketing_campaigns');

            $recentSummaries = $scraperBuilder
                ->select('id, title, created_on, summary')
                ->where('created_on >=', $fromDate)
                ->orderBy('id', 'DESC')
                ->get($limit)
                ->getResultArray();

            $recentCampaigns = $campaignBuilder
                ->select('id, name, status, type, stage, scheduled_at, created_on')
                ->where('created_on >=', $fromDate)
                ->orderBy('id', 'DESC')
                ->get($limit)
                ->getResultArray();

            $summaryCount = $db->table('bf_marketing_scraper')
                ->where('created_on >=', $fromDate)
                ->countAllResults();

            $campaignCount = $db->table('bf_marketing_campaigns')
                ->where('created_on >=', $fromDate)
                ->countAllResults();

            $draftCampaignCount = $db->table('bf_marketing_campaigns')
                ->where('created_on >=', $fromDate)
                ->groupStart()
                    ->where('is_draft', 1)
                    ->orWhere('status', 'Draft')
                ->groupEnd()
                ->countAllResults();

            CLI::newLine();
            CLI::write('Promotions Audit Summary', 'green');
            CLI::write('------------------------');
            CLI::write('Lookback days: ' . $days);
            CLI::write('Recent summaries: ' . $summaryCount);
            CLI::write('Recent campaigns: ' . $campaignCount);
            CLI::write('Draft campaigns: ' . $draftCampaignCount);

            CLI::newLine();
            CLI::write('Recent Summary Rows', 'green');
            if (empty($recentSummaries)) {
                CLI::write(' - No recent summary rows found.');
            } else {
                foreach ($recentSummaries as $row) {
                    CLI::write(sprintf(
                        ' - #%s | %s | created_on=%s',
                        $row['id'] ?? 'n/a',
                        $row['title'] ?? '(no title)',
                        $row['created_on'] ?? '(null)'
                    ));
                }
            }

            CLI::newLine();
            CLI::write('Recent Campaign Rows', 'green');
            if (empty($recentCampaigns)) {
                CLI::write(' - No recent campaign rows found.');
            } else {
                foreach ($recentCampaigns as $row) {
                    CLI::write(sprintf(
                        ' - #%s | %s | status=%s | type=%s | stage=%s | scheduled_at=%s',
                        $row['id'] ?? 'n/a',
                        $row['name'] ?? '(no name)',
                        $row['status'] ?? '(null)',
                        $row['type'] ?? '(null)',
                        $row['stage'] ?? '(null)',
                        $row['scheduled_at'] ?? '(null)'
                    ));
                }
            }

            CLI::newLine();
            CLI::write('Promotions audit completed successfully.', 'green');

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('Promotions audit failed: ' . $e->getMessage());
            log_message('error', 'Marketing PromotionsAudit failed: {message}', [
                'message' => $e->getMessage(),
            ]);

            return EXIT_ERROR;
        }
    }

    protected function assertTableExists($db, string $table): void
    {
        if (! $db->tableExists($table)) {
            throw new \RuntimeException("Required table missing: {$table}");
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}