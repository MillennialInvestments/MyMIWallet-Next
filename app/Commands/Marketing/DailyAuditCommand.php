<?php

namespace App\Commands\Marketing;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class DailyAuditCommand extends BaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:daily-audit';
    protected $description = 'Daily marketing pipeline QA audit report.';

    public function run(array $params)
    {
        $db = Database::connect();
        $today = date('Y-m-d');

        $generated = 0;
        $failed = 0;
        $distributed = 0;
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

        CLI::write(json_encode([
            'status' => 'success',
            'date' => $today,
            'generated' => $generated,
            'failed' => $failed,
            'distributed' => $distributed,
            'warnings' => $warnings,
        ], JSON_PRETTY_PRINT));
    }
}
