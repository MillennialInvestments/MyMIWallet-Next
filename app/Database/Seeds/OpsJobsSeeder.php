<?php

declare(strict_types=1);

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OpsJobsSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'job_key'      => 'ops.logs.summarize',
                'name'         => 'Summarize Logs',
                'description'  => 'Summarize application logs for quick review.',
                'handler'      => 'OpsJobRegistry::summarizeLogs',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'ops.docs.inventory_scan',
                'name'         => 'Docs Inventory Scan',
                'description'  => 'Generate a simple inventory of documentation files.',
                'handler'      => 'OpsJobRegistry::inventoryDocs',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'marketing.generate_digest',
                'name'         => 'Marketing Digest',
                'description'  => 'Generate a marketing digest or placeholder output.',
                'handler'      => 'OpsJobRegistry::generateMarketingDigest',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'alerts.process',
                'name'         => 'Process Alerts',
                'description'  => 'Process alerting pipeline or run stub handler.',
                'handler'      => 'OpsJobRegistry::processAlerts',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'ops.worker.kick',
                'name'         => 'Kick Worker',
                'description'  => 'Dispatch a worker heartbeat task to ensure queue health.',
                'handler'      => 'OpsJobRegistry::kickWorker',
                'max_attempts' => 1,
            ],
        ];

        $builder = $this->db->table('bf_ops_jobs');

        foreach ($jobs as $job) {
            $existing = $builder->where('job_key', $job['job_key'])->get()->getFirstRow();
            $timestamps = [
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            if ($existing) {
                $builder->where('id', $existing->id)->update(array_merge($job, $timestamps));
            } else {
                $builder->insert(array_merge($job, $timestamps, [
                    'is_enabled' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]));
            }
        }
    }
}
