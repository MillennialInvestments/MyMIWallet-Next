<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\ManualPriorityRunner;
use App\Services\AiOps\ManualRunNotifier;
use CodeIgniter\CLI\CLI;

class ManualRun extends SafeBaseCommand
{
    protected $group = 'AIOps - Run';
    protected $name = 'aiops:manual:run';
    protected $description = 'Run manual-priority AIOPS correlation, state refresh, and PR creation.';
    protected $usage = 'aiops:manual:run [--dry-run=1|0] [--limit-tasks=1] [--limit-errors=3] [--only=file.md] [--write-state=1|0] [--create-pr=1|0] [--notify=1|0]';
    protected $options = [
        '--dry-run' => 'Evaluate only. No PR creation or writes when enabled.',
        '--limit-tasks' => 'Max tasks per execution.',
        '--limit-errors' => 'Max signatures per PR batch.',
        '--only' => 'Single priority file name to evaluate.',
        '--write-state' => 'Persist state files.',
        '--create-pr' => 'Create PR branches + GitHub PRs for matching signatures.',
        '--notify' => 'Send Discord notifications (if configured).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $config = config('AiOps');
        $notifier = new ManualRunNotifier($config);
        $notify = $this->optBool($flags, 'notify', true);

        if ($config->paused) {
            CLI::write('[AIOPS] manual-run paused by kill switch (aiops.paused/AIOPS_PAUSED).', 'yellow');
            if ($notify) {
                $notifier->send('AIOPS manual-run paused', ['status' => 'paused']);
            }
            return EXIT_SUCCESS;
        }

        if ($notify) {
            $notifier->send('AIOPS manual-run started', ['status' => 'run-start']);
        }

        $runner = new ManualPriorityRunner($config);
        $result = $runner->run([
            'dryRun' => $this->optBool($flags, 'dry-run', false),
            'limitTasks' => $this->optInt($flags, 'limit-tasks', (int) $config->defaultTaskLimit),
            'limitErrors' => $this->optInt($flags, 'limit-errors', (int) $config->defaultErrorLimit),
            'only' => $this->optString($flags, 'only', ''),
            'writeState' => $this->optBool($flags, 'write-state', true),
            'createPr' => $this->optBool($flags, 'create-pr', true),
            'notify' => $notify,
        ]);

        if ($notify) {
            foreach ($result['results'] as $row) {
                if (($row['status'] ?? '') === 'pr-created') {
                    $notifier->send('AIOPS PR created', ['task' => $row['task'] ?? '', 'pr_url' => $row['pr_url'] ?? '']);
                }
            }
            foreach (($result['completed_tasks'] ?? []) as $taskId) {
                $notifier->send('AIOPS task moved to done', ['task' => $taskId, 'status' => 'task-completed']);
            }
            foreach ($result['results'] as $row) {
                if (($row['status'] ?? '') === 'blocked') {
                    $notifier->send('AIOPS task blocked by schema', ['task' => $row['task'] ?? '', 'status' => 'blocked']);
                }
            }
        }

        CLI::write('[AIOPS] manual-run completed', 'green');
        CLI::write(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return EXIT_SUCCESS;
    }
}
