<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class DailyAudit extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:daily-audit';
    protected $description = 'Daily marketing pipeline QA audit report.';

    public function run(array $params)
    {
        $db = Database::connect();
        $tables = $db->listTables();

        if (! in_array('bf_marketing_distribution_log', $tables, true)) {
            CLI::write('WARN: bf_marketing_distribution_log does not exist yet.', 'yellow');
            return;
        }
        $today = date('Y-m-d');

        $generated = 0;
        $failed = 0;
        $distributed = 0;
        $scrapedToday = 0;
        $approvedReady = 0;
        $warnings = [];

        if ($db->tableExists('bf_marketing_generated_content')) {
            $generated = $db->table('bf_marketing_generated_content')->where('DATE(created_at)', $today)->countAllResults();
            $failed = $db->table('bf_marketing_generated_content')->where('DATE(created_at)', $today)->where('status', 'failed')->countAllResults();
        } else {
            $warnings[] = 'bf_marketing_generated_content table missing; generated/failed counts skipped.';
            log_message('warning', '[marketing:daily-audit] bf_marketing_generated_content missing.');
        }

        if ($db->tableExists('bf_marketing_distribution_log')) {
            $distributed = $db->table('bf_marketing_distribution_log')->where('DATE(attempted_at)', $today)->where('status', 'success')->countAllResults();
        } else {
            $warnings[] = 'bf_marketing_distribution_log table missing; distribution count skipped.';
            log_message('warning', '[marketing:daily-audit] bf_marketing_distribution_log missing.');
            CLI::write('⚠️ bf_marketing_distribution_log table is missing; distribution metrics skipped.', 'yellow');
        }

        if ($db->tableExists('bf_marketing_temp_scraper')) {
            $scrapedToday = $db->table('bf_marketing_temp_scraper')
                ->where('DATE(date_scraped)', $today)
                ->countAllResults();
        }
        if ($db->tableExists('bf_marketing_generated_content')) {
            $approvedReady = $db->table('bf_marketing_generated_content')
                ->whereIn('approval_status', ['approved', 'auto_approved'])
                ->whereIn('distribution_status', ['pending', 'scheduled'])
                ->countAllResults();
        }

        $reason = null;
        if ($generated === 0 && $scrapedToday > 0) {
            $reason = 'Distribution skipped because generation has not yet produced distributable records';
        } elseif ($generated === 0 && $scrapedToday === 0) {
            $reason = $approvedReady > 0
                ? 'Approved generated marketing content is ready for controlled distribution'
                : 'No generated marketing content is currently available for distribution';
        } elseif ($approvedReady === 0 && $distributed === 0) {
            $reason = 'No approved/generated items matched the distribution criteria';
        }

        CLI::write(json_encode([
            'status' => 'success',
            'date' => $today,
            'scraped_today' => $scrapedToday,
            'generated' => $generated,
            'failed' => $failed,
            'distributed' => $distributed,
            'approved_ready' => $approvedReady,
            'reason' => $reason,
            'warnings' => $warnings,
            'sql_assertions' => service('marketingDistributionService')->getSqlAssertions(),
        ], JSON_PRETTY_PRINT));
    }
}
