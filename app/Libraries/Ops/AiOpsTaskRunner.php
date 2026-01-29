<?php

declare(strict_types=1);

namespace App\Libraries\Ops;

use App\Commands\Ops\NextSteps;
use App\Commands\Ops\CommandsAutofix;
use App\Models\AiOpsTaskModel;
use App\Models\AiOpsTaskRunModel;
use CodeIgniter\CLI\CLI;
use Config\Services;
use Throwable;

class AiOpsTaskRunner
{
    private AiOpsTaskModel $tasks;
    private AiOpsTaskRunModel $runs;

    public function __construct(?AiOpsTaskModel $tasks = null, ?AiOpsTaskRunModel $runs = null)
    {
        $this->tasks = $tasks ?? new AiOpsTaskModel();
        $this->runs = $runs ?? new AiOpsTaskRunModel();
    }

    /**
     * @param array<string, mixed> $task
     * @return array{stdout: string, stderr: string, exitCode: int, resultJson: array<string, mixed>}
     */
    public function execute(array $task, bool $safeMode): array
    {
        $stdout = '';
        $stderr = '';
        $exitCode = 0;
        $resultJson = [
            'task_key' => $task['task_key'] ?? '',
            'status' => 'skipped',
            'action' => 'noop',
            'safe_mode' => $safeMode,
        ];

        try {
            $context = $this->decodeContext($task['context_json'] ?? null);
            $action = (string) ($context['action'] ?? ($task['domain'] ?? 'docs'));

            $resultJson['action'] = $action;

            if ($safeMode && ! $this->isSafeAction($action)) {
                $resultJson['status'] = 'queued';
                $stdout = sprintf('Safe mode ON. Task %s deferred for manual handling.', $task['task_key'] ?? $task['id'] ?? '');
                return compact('stdout', 'stderr', 'exitCode', 'resultJson');
            }

            switch ($action) {
                case 'docs:next-steps':
                    $this->runCommand(NextSteps::class, ['--emit=docs']);
                    $stdout = 'Generated Next Steps docs + snapshot.';
                    $resultJson['status'] = 'success';
                    break;
                case 'patch:write':
                    $this->writePatchFile($task, $context, $stdout);
                    $resultJson['status'] = 'success';
                    break;
                case 'ops:commands:autofix':
                    if ($safeMode) {
                        $stdout = 'Safe mode ON. Commands autofix skipped.';
                        $resultJson['status'] = 'queued';
                        break;
                    }
                    $this->runCommand(CommandsAutofix::class, []);
                    $stdout = 'Ran ops:commands:autofix.';
                    $resultJson['status'] = 'success';
                    break;
                default:
                    $stdout = sprintf('No handler for action: %s', $action);
                    $resultJson['status'] = 'skipped';
                    break;
            }
        } catch (Throwable $e) {
            $stderr = $e->getMessage();
            $exitCode = 1;
            $resultJson['status'] = 'failed';
            $resultJson['error'] = $stderr;
        }

        return compact('stdout', 'stderr', 'exitCode', 'resultJson');
    }

    public function handleTask(array $task, bool $safeMode, string $workerId, int $lockMinutes = 15): bool
    {
        $taskId = (int) ($task['id'] ?? 0);
        if ($taskId <= 0) {
            return false;
        }

        $lockMinutes = $lockMinutes > 0 ? $lockMinutes : 15;
        $this->tasks->markRunning($taskId, $workerId, $lockMinutes);

        $result = $this->execute($task, $safeMode);
        $this->runs->writeRunLog(
            $taskId,
            $result['stdout'],
            $result['stderr'],
            $result['exitCode'],
            $result['resultJson']
        );

        if ($result['exitCode'] === 0) {
            $this->tasks->markDone($taskId);
            CLI::write(sprintf('AiOps task %s done', $task['task_key'] ?? $taskId), 'green');
            return true;
        }

        $this->tasks->markFailed($taskId, $result['stderr']);
        CLI::error(sprintf('AiOps task %s failed: %s', $task['task_key'] ?? $taskId, $result['stderr']));
        return false;
    }

    /**
     * @return array<string, mixed>
     */
    private function decodeContext(?string $payload): array
    {
        if ($payload === null || $payload === '') {
            return [];
        }

        $decoded = json_decode($payload, true);
        return is_array($decoded) ? $decoded : [];
    }

    private function isSafeAction(string $action): bool
    {
        return in_array($action, ['docs:next-steps', 'patch:write', 'queue:task'], true);
    }

    private function runCommand(string $class, array $params): void
    {
        $command = new $class(Services::logger(), Services::commands());
        $command->run($params);
    }

    /**
     * @param array<string, mixed> $task
     * @param array<string, mixed> $context
     */
    private function writePatchFile(array $task, array $context, string &$stdout): void
    {
        $dir = ROOTPATH . 'writable/triage/patches';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $filename = (string) ($context['filename'] ?? ('patch-' . ($task['task_key'] ?? $task['id'] ?? uniqid()) . '.patch'));
        $payload = (string) ($context['patch'] ?? '');

        if ($payload === '') {
            $stdout = 'No patch content provided.';
            return;
        }

        $path = $dir . DIRECTORY_SEPARATOR . $filename;
        file_put_contents($path, $payload);
        $stdout = sprintf('Patch written to %s', $path);
    }
}
