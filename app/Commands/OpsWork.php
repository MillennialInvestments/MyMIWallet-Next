<?php

declare(strict_types=1);

namespace App\Commands;

use App\Libraries\Ops\OpsJobRegistry;
use App\Models\OpsJobsModel;
use App\Models\OpsQueueModel;
use App\Models\OpsRunsModel;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class OpsWork extends BaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:work';
    protected $description = 'Process operations queue items.';
    protected $usage       = 'php spark ops:work --limit=25';
    protected $arguments   = [];
    protected $options     = [
        '--limit' => 'Maximum number of jobs to process in this run (default 25).',
    ];

    protected OpsQueueModel $queue;
    protected OpsJobsModel $jobs;
    protected OpsRunsModel $runs;
    protected OpsJobRegistry $registry;

    public function run(array $params): void
    {
        $limit = (int) CLI::getOption('limit');
        if ($limit <= 0) {
            $limit = 25;
        }

        $this->queue    = new OpsQueueModel();
        $this->jobs     = new OpsJobsModel();
        $this->runs     = new OpsRunsModel();
        $this->registry = new OpsJobRegistry();

        $processed = 0;

        while ($processed < $limit) {
            $batch = $this->queue->claimPending($limit - $processed);
            if ($batch === []) {
                break;
            }

            foreach ($batch as $item) {
                $this->handleItem($item);
                $processed++;
                if ($processed >= $limit) {
                    break 2;
                }
            }
        }

        CLI::write("Processed {$processed} job(s)", 'green');
    }

    protected function handleItem(array $item): void
    {
        $payload = json_decode($item['payload_json'] ?? 'null', true) ?? [];
        $jobKey  = $item['job_key'];
        $job     = $this->jobs->findByKey($jobKey);

        if (! $job) {
            $this->queue->markFailed((int) $item['id'], 'Unknown job key: ' . $jobKey);
            CLI::error("Unknown job {$jobKey}");
            return;
        }

        if (! (int) $job['is_enabled']) {
            $this->queue->markFailed((int) $item['id'], 'Job disabled: ' . $jobKey);
            CLI::write("Job {$jobKey} disabled", 'yellow');
            return;
        }

        $runId = $this->runs->startRun((int) $job['id'], (int) $item['id'], (int) $item['attempts'], $payload);

        try {
            $result = $this->registry->dispatch($jobKey, $payload);
            $this->runs->finishRun($runId, 'success', $result);
            $this->queue->markCompleted((int) $item['id']);
            $this->jobs->touchLastRun((int) $job['id']);
            CLI::write("Job {$jobKey} completed", 'green');
        } catch (Throwable $e) {
            $retryable = ((int) $item['attempts']) < (int) $job['max_attempts'];
            $message   = mb_substr($e->getMessage(), 0, 2000);
            $this->runs->finishRun($runId, 'failed', null, $message);
            $this->queue->markFailed((int) $item['id'], $message, $retryable);
            CLI::error("Job {$jobKey} failed: {$message}");
        }
    }
}
