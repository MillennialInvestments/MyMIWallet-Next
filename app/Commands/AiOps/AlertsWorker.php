<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\SlackWebhookService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class AlertsWorker extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:alerts-worker';
    protected $description = 'Process queued alert emails';

    public function run(array $params)
    {
        $db = Database::connect();

        $lock = $db->query("SELECT GET_LOCK('alerts_worker', 5) as lock_status")->getRowArray();
        if (! isset($lock['lock_status']) || (int) $lock['lock_status'] !== 1) {
            CLI::write('Worker already running.');
            return;
        }

        $notifier = new SlackWebhookService();

        try {
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

                } catch (\Throwable $e) {

                    $db->table('aiops_email_queue')
                        ->where('id', $email['id'])
                        ->update([
                            'status' => 'failed',
                            'attempts' => $email['attempts'] + 1,
                            'last_error' => $e->getMessage()
                        ]);
                }
            }

            CLI::write('Worker finished.');
        } catch (\Throwable $e) {
            log_message('critical', '[aiops:alerts-worker] ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            $notifier->notify('[aiops:alerts-worker] Crash: ' . $e->getMessage());
            CLI::error('Worker crashed. Check logs for details.');
        } finally {
            $db->query("SELECT RELEASE_LOCK('alerts_worker')");
        }
    }
}
