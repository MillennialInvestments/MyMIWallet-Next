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

        $generated = $db->table('bf_marketing_generated_content')->where('DATE(created_at)', $today)->countAllResults();
        $failed = $db->table('bf_marketing_generated_content')->where('DATE(created_at)', $today)->where('status', 'failed')->countAllResults();
        $distributed = $db->table('bf_marketing_distribution_log')->where('DATE(attempted_at)', $today)->where('status', 'success')->countAllResults();

        CLI::write(json_encode([
            'status' => 'success',
            'date' => $today,
            'generated' => $generated,
            'failed' => $failed,
            'distributed' => $distributed,
        ], JSON_PRETTY_PRINT));
    }
}
