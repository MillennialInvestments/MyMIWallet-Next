<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;
use Throwable;

class NotificationTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:notification:test';
    protected $description = 'Test marketing notification readiness, pending counts, and recent campaign activity.';
    protected $usage = 'marketing:notification:test [--limit=10]';
    protected $arguments = [];
    protected $options = [
        '--limit' => 'Number of rows to inspect from recent campaigns. Default: 10',
    ];

    public function run(array $params)
    {
        $limit = (int) (CLI::getOption('limit') ?? 10);
        if ($limit <= 0) {
            $limit = 10;
        }

        CLI::write('Running marketing notification test...', 'yellow');

        try {
            $db = Database::connect();

            $this->assertTableExists($db, 'bf_marketing_campaigns');
            $this->assertTableExists($db, 'bf_marketing_scraper');
            $this->assertTableExists($db, 'bf_marketing_temp_scraper');

            $campaignBuilder = $db->table('bf_marketing_campaigns');
            $scraperBuilder = $db->table('bf_marketing_scraper');
            $tempBuilder = $db->table('bf_marketing_temp_scraper');

            $campaignCount = $campaignBuilder->countAllResults(false);
            $recentCampaigns = $campaignBuilder
                ->select('id, name, status, type, scheduled_at, created_on')
                ->orderBy('id', 'DESC')
                ->get($limit)
                ->getResultArray();

            $finalSummaryCount = $scraperBuilder->countAllResults(false);
            $tempCount = $tempBuilder->countAllResults(false);

            CLI::newLine();
            CLI::write('Marketing Notification Readiness', 'green');
            CLI::write('--------------------------------');
            CLI::write('Campaign rows: ' . $campaignCount);
            CLI::write('Final summary rows: ' . $finalSummaryCount);
            CLI::write('Temp scraper rows: ' . $tempCount);

            CLI::newLine();
            CLI::write('Recent Campaigns', 'green');

            if (empty($recentCampaigns)) {
                CLI::write(' - No campaign rows found.');
            } else {
                foreach ($recentCampaigns as $row) {
                    CLI::write(sprintf(
                        ' - #%s | %s | status=%s | type=%s | scheduled_at=%s | created_on=%s',
                        $row['id'] ?? 'n/a',
                        $row['name'] ?? '(no name)',
                        $row['status'] ?? '(null)',
                        $row['type'] ?? '(null)',
                        $row['scheduled_at'] ?? '(null)',
                        $row['created_on'] ?? '(null)'
                    ));
                }
            }

            CLI::newLine();
            CLI::write('Notification test completed successfully.', 'green');

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('Notification test failed: ' . $e->getMessage());
            log_message('error', 'Marketing NotificationTest failed: {message}', [
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