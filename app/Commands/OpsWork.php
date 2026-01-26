<?php

declare(strict_types=1);

namespace App\Commands;

use App\Libraries\Ops\OpsJobRegistry;
use App\Models\OpsJobsModel;
use App\Models\OpsQueueModel;
use App\Models\OpsRunsModel;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Throwable;

class OpsWork extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:work';
    protected $description = 'Process operations queue items.';
    protected $usage       = 'php spark ops:work [limit] [--dry-run]';
    protected $arguments   = [
        'limit' => 'Maximum number of jobs to process in this run (default 25).',
    ];
    protected $options     = [
        '--dry-run' => 'Preview actions without processing jobs',
    ];

    protected OpsQueueModel $queue;
    protected OpsJobsModel $jobs;
    protected OpsRunsModel $runs;
    protected OpsJobRegistry $registry;

    public function run(array $params): void
    {
        log_message('info', '[spark:ops:work] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $limit = (int) ($args[0] ?? 25);
        if ($limit <= 0) {
            $limit = 25;
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. Queue processing skipped.', 'yellow');
            log_message('info', '[spark:ops:work] Completed', ['processed' => 0, 'dry_run' => true]);
            return;
        }

        $this->queue    = new OpsQueueModel();
        $this->jobs     = new OpsJobsModel();
        $this->runs     = new OpsRunsModel();
        $this->registry = new OpsJobRegistry();

        $processed = 0;

        while ($processed < $limit) {
            try {
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
            } catch (Throwable $e) {
                CLI::error('Worker loop failed: ' . $e->getMessage());
                log_message('error', '[spark:ops:work] Failed', ['reason' => $e->getMessage()]);
                break;
            }
        }

        CLI::write("Processed {$processed} job(s)", 'green');
        log_message('info', '[spark:ops:work] Completed', ['processed' => $processed, 'dry_run' => false]);
    }

    protected function handleItem(array $item): void
    {
        $payload = json_decode($item['payload_json'] ?? 'null', true) ?? [];
        $jobKey  = $item['job_key'];
        $queueId = (int) $item['id'];
        $job     = null;
        $runId   = null;

        try {
            $job = $this->jobs->findByKey($jobKey);
            if (! $job) {
                $this->queue->markFailed($queueId, 'Unknown job key: ' . $jobKey);
                CLI::error("Unknown job {$jobKey}");
                return;
            }

            $runId = $this->runs->startRun((int) $job['id'], $queueId, (int) $item['attempts'], $payload);

            if (! (int) $job['is_enabled']) {
                $message = 'Job disabled: ' . $jobKey;
                $this->runs->finishRun($runId, 'failed', null, $message);
                $this->queue->markFailed($queueId, $message, false);
                CLI::write("Job {$jobKey} disabled", 'yellow');
                return;
            }

            $result = $this->registry->dispatch($jobKey, $payload);
            $this->runs->finishRun($runId, 'success', $result);
            $this->queue->markCompleted($queueId);
            $this->jobs->touchLastRun((int) $job['id']);
            CLI::write("Job {$jobKey} completed", 'green');
        } catch (Throwable $e) {
            $retryable = $job ? ((int) $item['attempts']) < (int) $job['max_attempts'] : false;
            $message   = mb_substr($e->getMessage(), 0, 2000);

            if ($runId !== null) {
                $this->runs->finishRun($runId, 'failed', null, $message);
            }

            $this->queue->markFailed($queueId, $message, $retryable);
            CLI::error("Job {$jobKey} failed: {$message}");
        }
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
