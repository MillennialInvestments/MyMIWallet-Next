<?php

namespace App\Commands;

use App\Libraries\MyMIMarketing;
use App\Commands\SafeBaseCommand;
use Config\Database;

class RunAutomationQueue extends SafeBaseCommand
{
    protected $group = 'Automation';
    protected $name = 'automation:run';
    protected $description = 'Run queued automation jobs';

    public function run(array $params)
    {
        $db = Database::connect();

        $jobs = $db->table('automation_jobs')
            ->where('status', 'queued')
            ->where('run_after <=', date('Y-m-d H:i:s'))
            ->orderBy('id', 'ASC')
            ->limit(5)
            ->get()
            ->getResultArray();

        foreach ($jobs as $job) {
            $db->table('automation_jobs')
                ->where('id', $job['id'])
                ->where('status', 'queued')
                ->update([
                    'status' => 'running',
                    'attempts' => ((int) $job['attempts']) + 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);

            if ($db->affectedRows() < 1) {
                continue;
            }

            try {
                $payload = json_decode((string) $job['payload'], true) ?: [];

                $this->executeJob($payload);

                $db->table('automation_jobs')
                    ->where('id', $job['id'])
                    ->update([
                        'status' => 'success',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

                log_message('info', 'Job Executed: ' . ($payload['run_cron'] ?? 'unknown'));
            } catch (\Throwable $e) {
                $db->table('automation_jobs')
                    ->where('id', $job['id'])
                    ->update([
                        'status' => 'failed',
                        'last_error' => $e->getMessage(),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
            }
        }
    }

    private function executeJob(array $payload): void
    {
        $route = $payload['run_cron'] ?? null;

        if (! $route) {
            return;
        }

        $marketing = service('MyMIMarketing');
        if (! $marketing instanceof MyMIMarketing) {
            $marketing = new MyMIMarketing();
        }

        switch ($route) {
            case 'cronFetchAndGenerateNews':
                $marketing->cronFetchAndGenerateNews();
                break;

            case 'generateDailyContentDigest':
                $marketing->generateDailyContentDigest();
                break;

            case 'distributeContent':
                $target = (string) ($payload['handler_target'] ?? '/API/Management/distributeTodaysNewsContent');
                service('curlrequest')->post(site_url($target), [
                    'timeout' => 30,
                    'http_errors' => false,
                    'headers' => ['Accept' => 'application/json'],
                ]);
                break;

            default:
                log_message('error', 'Unknown automation route: ' . $route);
        }
    }
}
