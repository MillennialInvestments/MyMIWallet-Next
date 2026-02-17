<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\AutoRunCoordinator;
use App\Services\AiOps\ManualRunNotifier;
use App\Services\AiOps\OllamaPatchRunner;
use CodeIgniter\CLI\CLI;

class AutoRun extends SafeBaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:auto-run';
    protected $description = 'Run AIOPS using manual priorities first, falling back to log-driven auto priorities.';
    protected $usage = 'aiops:auto-run [--dry-run=1|0] [--limit-tasks=1] [--limit-errors=3] [--auto-threshold=CRITICAL|ERROR] [--write-auto-tasks=1|0] [--create-pr=1|0] [--notify=1|0] [--job-file=docs/_aiops/patch_jobs/<id>.md] [--force=1|0]';
    protected $options = [
        '--dry-run' => 'Evaluate only. No PR creation when enabled.',
        '--limit-tasks' => 'Max tasks per execution.',
        '--limit-errors' => 'Max signatures per task/PR batch.',
        '--auto-threshold' => 'Severity threshold for auto mode (CRITICAL|ERROR).',
        '--write-auto-tasks' => 'Persist generated auto priority files when in auto mode.',
        '--create-pr' => 'Create PR branches + GitHub PRs for matching signatures.',
        '--notify' => 'Send Discord notifications (if configured).',
        '--job-file' => 'Optional patch job file under docs/_aiops/patch_jobs/.',
        '--force' => 'Regenerate patch output even when docs/_aiops/patches/{job_id}.diff exists',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $config = config('AiOps');
        $notifier = new ManualRunNotifier($config);
        $notify = $this->optBool($flags, 'notify', true);

        if ($config->paused) {
            CLI::write('[AIOPS AUTO] auto-run paused by kill switch (aiops.paused/AIOPS_PAUSED).', 'yellow');
            if ($notify) {
                $notifier->send('[AIOPS AUTO] auto-run paused', ['status' => 'paused']);
            }

            return EXIT_SUCCESS;
        }

        if ($notify) {
            $notifier->send('[AIOPS AUTO] auto-run started', ['status' => 'run-start']);
        }

        $runner = new AutoRunCoordinator($config);
        $result = $runner->run([
            'dryRun' => $this->optBool($flags, 'dry-run', false),
            'limitTasks' => $this->optInt($flags, 'limit-tasks', (int) $config->defaultTaskLimit),
            'limitErrors' => $this->optInt($flags, 'limit-errors', (int) $config->defaultErrorLimit),
            'autoThreshold' => $this->optString($flags, 'auto-threshold', 'CRITICAL'),
            'writeAutoTasks' => $this->optBool($flags, 'write-auto-tasks', true),
            'createPr' => $this->optBool($flags, 'create-pr', true),
            'notify' => $notify,
        ]);

        if ($notify && ($result['mode'] ?? '') === 'manual-delegated') {
            $notifier->send('[AIOPS AUTO] auto-run skipped due to manual tasks', [
                'status' => 'manual-wins',
                'tasks' => $result['manual_tasks'] ?? [],
            ]);
        }

        if ($notify && ($result['status'] ?? '') === 'auto-priority-created') {
            $notifier->send('[AIOPS AUTO] auto-priority created', [
                'task' => $result['auto_task'] ?? '',
                'intent_hash' => $result['intent_hash'] ?? '',
            ]);

            foreach (($result['manual_result']['results'] ?? []) as $row) {
                if (($row['status'] ?? '') === 'pr-created') {
                    $notifier->send('[AIOPS AUTO] PR created', ['task' => $row['task'] ?? '', 'pr_url' => $row['pr_url'] ?? '']);
                }
            }

            foreach (($result['manual_result']['completed_tasks'] ?? []) as $taskId) {
                $notifier->send('[AIOPS AUTO] auto-task completed', ['task' => $taskId, 'status' => 'task-completed']);
            }
        }

        $force = $this->optBool($flags, 'force', false);
        $jobFile = $this->optString($flags, 'job-file', '');
        $resolvedJob = $this->resolvePatchJobFile($jobFile !== '' ? $jobFile : null);
        if ($resolvedJob !== null) {
            $runner = new OllamaPatchRunner();
            $patchResult = $runner->run($resolvedJob, ['force' => $force]);
            CLI::write('[AIOPS OLLAMA] patch runner result', 'yellow');
            CLI::write(json_encode($patchResult->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $result['ollama_patch'] = $patchResult->toArray();
        } else {
            CLI::write('[AIOPS OLLAMA] No patch job found in docs/_aiops/patch_jobs; skipped.', 'yellow');
        }

        CLI::write('[AIOPS AUTO] auto-run completed', 'green');
        CLI::write(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return EXIT_SUCCESS;
    }

    private function resolvePatchJobFile(?string $requested): ?string
    {
        if ($requested !== null && trim($requested) !== '') {
            return ltrim(trim($requested), '/');
        }

        $pattern = ROOTPATH . 'docs/_aiops/patch_jobs/*.md';
        $files = glob($pattern) ?: [];
        if ($files === []) {
            return null;
        }

        usort($files, static fn(string $a, string $b): int => filemtime($b) <=> filemtime($a));
        return ltrim(str_replace(ROOTPATH, '', $files[0]), '/');
    }
}
