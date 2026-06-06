<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class SocialZapierDispatch extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:zapier-dispatch';
    protected $description = 'Dispatch queued social export jobs to Zapier when explicitly enabled.';

    public function run(array $params)
    {
        $db = Database::connect();
        $jobs = $db->table('bf_social_export_jobs')
            ->where('destination_type', 'zapier')
            ->whereIn('status', ['approved', 'queued'])
            ->limit(10)
            ->get()
            ->getResultArray();

        $service = new \App\Services\ZapierWebhookService();
        $results = [];

        foreach ($jobs as $job) {
            $results[] = $service->send((int) $job['id']);
        }

        CLI::write(json_encode(['status' => 'success', 'processed' => count($results), 'results' => $results], JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
