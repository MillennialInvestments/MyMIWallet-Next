<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\AutoRunCoordinator;
use App\Services\AiOps\ManualRunNotifier;
use CodeIgniter\CLI\CLI;

class AutoRun extends SafeBaseCommand
{
    protected $group = 'AI-Ops';
    protected $name = 'aiops:auto-run';
    protected $description = 'Run AIOPS using manual priorities first, falling back to log-driven auto priorities.';
    protected $usage = 'aiops:auto-run [--dry-run=1|0] [--limit-tasks=1] [--limit-errors=3] [--auto-threshold=CRITICAL|ERROR] [--write-auto-tasks=1|0] [--create-pr=1|0] [--notify=1|0]';
    protected $options = [
        '--dry-run' => 'Evaluate only. No PR creation when enabled.',
        '--limit-tasks' => 'Max tasks per execution.',
        '--limit-errors' => 'Max signatures per task/PR batch.',
        '--auto-threshold' => 'Severity threshold for auto mode (CRITICAL|ERROR).',
        '--write-auto-tasks' => 'Persist generated auto priority files when in auto mode.',
        '--create-pr' => 'Create PR branches + GitHub PRs for matching signatures.',
        '--notify' => 'Send Discord notifications (if configured).',
    ];

    public function run(array $params)
    {
        $config = config('AiOps');
        $notifier = new ManualRunNotifier($config);
        $notify = $this->toBool($this->option('notify', '1'));

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
            'dryRun' => $this->toBool($this->option('dry-run', '0')),
            'limitTasks' => (int) $this->option('limit-tasks', (string) $config->defaultTaskLimit),
            'limitErrors' => (int) $this->option('limit-errors', (string) $config->defaultErrorLimit),
            'autoThreshold' => (string) $this->option('auto-threshold', 'CRITICAL'),
            'writeAutoTasks' => $this->toBool($this->option('write-auto-tasks', '1')),
            'createPr' => $this->toBool($this->option('create-pr', '1')),
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

        CLI::write('[AIOPS AUTO] auto-run completed', 'green');
        CLI::write(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return EXIT_SUCCESS;
    }

    private function toBool(string|int|bool|null $value): bool
    {
        if (is_bool($value)) {
            return $value;
        }
        if (is_int($value)) {
            return $value === 1;
        }

        return in_array(strtolower((string) $value), ['1', 'true', 'yes', 'on'], true);
    }
}
