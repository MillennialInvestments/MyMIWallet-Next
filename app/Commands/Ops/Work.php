<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Libraries\Ops\AiOpsTaskRunner;
use App\Libraries\Ops\PrOutboxWriter;
use App\Models\AiOpsSettingsModel;
use App\Models\AiOpsTaskModel;
use CodeIgniter\CLI\CLI;

class Work extends SafeBaseCommand
{
    protected $aiOpsRunnable = true;
    protected $group = 'ops';
    protected $name = 'ops:work';
    protected $description = 'Process AiOps task queue items safely.';
    protected $usage = 'php spark ops:work [limit] [--lock=minutes] [--dry-run]';
    protected $arguments = [
        'limit' => 'Maximum number of tasks to process in this run (default 10).',
    ];
    protected $options = [
        '--lock' => 'Lock duration in minutes (default 15).',
        '--dry-run' => 'Preview actions without processing tasks',
        '--code' => 'Process code-eligible tasks only and write PR outbox bundle.',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:ops:work] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $codeMode = isset($flags['code']);
        $limit = (int) ($args[0] ?? 10);
        if ($limit <= 0) {
            $limit = 10;
        }

        $lockMinutes = (int) ($this->resolveOption($params, 'lock', 15));
        if ($lockMinutes <= 0) {
            $lockMinutes = 15;
        }

        $taskModel = new AiOpsTaskModel();
        $runner = new AiOpsTaskRunner();
        $safeMode = $this->resolveSafeMode();
        $workerId = sprintf('%s@%s', get_current_user(), gethostname() ?: 'worker');

        CLI::write(sprintf('ops:work starting (safe_mode=%s)', $safeMode ? 'ON' : 'OFF'), 'yellow');
        if ($codeMode) {
            CLI::write('Code-only mode enabled. Generating PR outbox bundle.', 'yellow');
        }

        if ($dryRun) {
            CLI::write('Dry-run enabled. No tasks will be claimed.', 'yellow');
            log_message('info', '[spark:ops:work] Completed', ['processed' => 0, 'dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $processed = 0;
        $processedTasks = [];
        while ($processed < $limit) {
            $task = $codeMode
                ? $taskModel->claimNextTaskFiltered($workerId, $lockMinutes, fn (array $candidate): bool => $this->isCodeEligibleTask($candidate))
                : $taskModel->claimNextTask($workerId, $lockMinutes);
            if (! $task) {
                break;
            }

            $runner->handleTask($task, $safeMode, $workerId, $lockMinutes);
            $processed++;
            $processedTasks[] = [
                'id' => $task['id'] ?? null,
                'task_key' => $task['task_key'] ?? null,
                'title' => $task['title'] ?? null,
                'status' => $task['status'] ?? null,
            ];
        }

        CLI::write(sprintf('ops:work completed. Processed %d task(s).', $processed), 'green');
        log_message('info', '[spark:ops:work] Completed', ['processed' => $processed, 'dry_run' => false]);

        if ($codeMode) {
            $writer = new PrOutboxWriter();
            $writer->write([
                'date' => date('Y-m-d'),
                'title' => 'AIOps code work proposal',
                'source' => 'ops:work',
                'why' => 'Bundle generated for code-eligible tasks.',
                'summary' => $processed > 0 ? 'Code tasks processed and ready for review.' : 'Proposal only (no tasks processed).',
                'tasks' => $processedTasks,
                'risk' => 'low',
            ]);
            CLI::write('PR outbox bundle written to docs/_aiops/pr_outbox.', 'green');
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function resolveOption(array $params, string $key, int $default): int
    {
        $value = $default;
        foreach ($params as $index => $param) {
            if ($param === '--' . $key && isset($params[$index + 1])) {
                $value = (int) $params[$index + 1];
                continue;
            }

            if (str_starts_with($param, '--' . $key . '=')) {
                $value = (int) substr($param, strlen('--' . $key . '='));
            }
        }

        return $value;
    }

    private function resolveSafeMode(): bool
    {
        $config = config('AiOps');
        $safeMode = (bool) ($config->safe_mode ?? true);
        $db = db_connect();
        if ($db->tableExists('bf_aiops_settings')) {
            $settingsModel = new AiOpsSettingsModel();
            $dbValue = $settingsModel->getValue('safe_mode');
            if ($dbValue !== null && $dbValue !== '') {
                $safeMode = filter_var($dbValue, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $safeMode;
            }
        }

        return $safeMode;
    }

    private function isCodeEligibleTask(array $task): bool
    {
        $title = strtolower((string) ($task['title'] ?? ''));
        $prompt = strtolower((string) ($task['prompt'] ?? ''));
        $domain = strtolower((string) ($task['domain'] ?? ''));
        $context = [];
        if (! empty($task['context_json'])) {
            $decoded = json_decode((string) $task['context_json'], true);
            if (is_array($decoded)) {
                $context = $decoded;
            }
        }

        $markers = ['doc only', '[doc only]', 'docs:next-steps', 'doc-only', 'documentation'];
        foreach ($markers as $marker) {
            if (str_contains($title, $marker) || str_contains($prompt, $marker)) {
                return false;
            }
        }

        $action = strtolower((string) ($context['action'] ?? ''));
        if ($action !== '' && str_contains($action, 'docs')) {
            return false;
        }

        if ($domain === 'docs') {
            return false;
        }

        return true;
    }
}
