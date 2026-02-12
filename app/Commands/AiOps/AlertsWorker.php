<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use Config\Database;

class AlertsWorker extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:alerts-worker';
    protected $description = 'Process queued alert emails';

    public function run(array $params)
    {
        $db = Database::connect();

        $emails = $db->table('aiops_email_queue')
            ->where('status', 'queued')
            ->limit(10)
            ->get()
            ->getResultArray();

        foreach ($emails as $email) {

            $db->table('aiops_email_queue')
                ->where('id', $email['id'])
                ->update(['status' => 'processing']);

            try {

                // 🔐 Add business logic here
                // parse email, detect alert type, trigger actions

                $db->table('aiops_email_queue')
                    ->where('id', $email['id'])
                    ->update([
                        'status' => 'completed',
                        'processed_at' => date('Y-m-d H:i:s')
                    ]);

            } catch (\Exception $e) {

                $db->table('aiops_email_queue')
                    ->where('id', $email['id'])
                    ->update([
                        'status' => 'failed',
                        'attempts' => $email['attempts'] + 1,
                        'last_error' => $e->getMessage()
                    ]);
            }
        }

        CLI::write("Worker finished.");
    }
}
