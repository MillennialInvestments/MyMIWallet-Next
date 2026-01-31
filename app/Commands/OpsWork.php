<?php

namespace App\Commands;

use App\Libraries\Ops\AiOpsTaskRunner;
use App\Models\AiOpsSettingsModel;
use App\Models\AiOpsTaskModel;
use CodeIgniter\CLI\CLI;

class OpsWork extends SafeBaseCommand
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
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:ops:work] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
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

        if ($dryRun) {
            CLI::write('Dry-run enabled. No tasks will be claimed.', 'yellow');
            log_message('info', '[spark:ops:work] Completed', ['processed' => 0, 'dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $processed = 0;
        while ($processed < $limit) {
            $task = $taskModel->claimNextTask($workerId, $lockMinutes);
            if (! $task) {
                break;
            }

            $runner->handleTask($task, $safeMode, $workerId, $lockMinutes);
            $processed++;
        }

        CLI::write(sprintf('ops:work completed. Processed %d task(s).', $processed), 'green');
        log_message('info', '[spark:ops:work] Completed', ['processed' => $processed, 'dry_run' => false]);
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
}
