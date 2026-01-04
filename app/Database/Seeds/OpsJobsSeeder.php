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
                'job_key'      => 'ops.health.check',
                'name'         => 'Ops Health Check',
                'description'  => 'Checks key endpoints, DB connectivity, and disk space.',
                'handler'      => 'OpsJobRegistry::healthCheck',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'ops.logs.triage_daily',
                'name'         => 'Daily Log Triage',
                'description'  => 'Scan writable/logs for ERROR/WARNING in last 24h.',
                'handler'      => 'OpsJobRegistry::logsTriageDaily',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'ops.security.headers_scan',
                'name'         => 'Security Headers Scan',
                'description'  => 'Ensure HSTS/CSP/XFO/etc headers are present.',
                'handler'      => 'OpsJobRegistry::securityHeadersScan',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'ops.routes.smoke_test',
                'name'         => 'Routes Smoke Test',
                'description'  => 'Hit curated CI4 routes and record failures.',
                'handler'      => 'OpsJobRegistry::routesSmokeTest',
                'max_attempts' => 3,
            ],
            [
                'job_key'      => 'ops.db.maintenance',
                'name'         => 'Ops DB Maintenance',
                'description'  => 'Optimize ops tables and purge stale queue/run rows.',
                'handler'      => 'OpsJobRegistry::dbMaintenance',
                'max_attempts' => 1,
            ],
            [
                'job_key'      => 'ops.docs.sync_from_chatgpt_export',
                'name'         => 'Docs Sync from ChatGPT Export',
                'description'  => 'Pull new ChatGPT exports into docs + indexes.',
                'handler'      => 'OpsJobRegistry::docsSyncFromChatgptExport',
                'max_attempts' => 3,
            ],
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
