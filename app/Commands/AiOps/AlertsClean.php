<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class AlertsClean extends SafeBaseCommand
{
    protected $group       = 'AIOps';
    protected $name        = 'aiops:alerts-clean';
    protected $description = 'Delete completed aiops alert queue rows older than 30 days';

    public function run(array $params)
    {
        $db = Database::connect();

        $cutoff = date('Y-m-d H:i:s', strtotime('-30 days'));

        $db->table('aiops_email_queue')
            ->where('status', 'completed')
            ->where('processed_at <', $cutoff)
            ->delete();

        CLI::write('Deleted rows: ' . $db->affectedRows(), 'green');
    }
}
