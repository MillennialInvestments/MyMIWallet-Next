<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\PyOps\PythonRunner;
use CodeIgniter\CLI\CLI;
use Config\PyOps as PyOpsConfig;

class PyOps extends SafeBaseCommand
{
    protected $group = 'AIOps - Run';
    protected $name = 'aiops:py';
    protected $description = 'Run Python automation actions and return structured JSON.';
    protected $usage = 'aiops:py <action> [--payload=<json>] [--payload-file=<path>] [--json] [--apply] [--dry-run] [--timeout=<seconds>]';
    protected $arguments = [
        'action' => 'Action name (docs.index, php.lint, patch.propose)',
    ];
    protected $options = [
        '--payload' => 'Inline JSON payload.',
        '--payload-file' => 'Path to JSON payload file.',
        '--json' => 'Print only machine JSON output.',
        '--apply' => 'Allow action to apply changes if the action supports it.',
        '--dry-run' => 'Force no-write mode where supported.',
        '--timeout' => 'Process timeout in seconds.',
    ];

    public function run(array $params)
    {
        [$args, ] = $this->parseParams($params);

        $action = trim((string) ($args[0] ?? ''));
        if ($action === '') {
            CLI::error('Action required. Usage: php spark aiops:py <action> [--payload-file=...]');
            return;
        }

        /** @var PyOpsConfig $config */
        $config = config('PyOps');
        if (!in_array($action, $config->allowedActions, true)) {
            CLI::error('Action not allowed: ' . $action);
            CLI::write('Allowed actions: ' . implode(', ', $config->allowedActions));
            return;
        }

        $payload = $this->loadPayload();
        $payload['action'] = $action;
        $payload['apply'] = CLI::getOption('apply') !== null;
        $payload['dry_run'] = CLI::getOption('dry-run') !== null;

        $timeout = (int) (CLI::getOption('timeout') ?: $config->defaultTimeoutSeconds);
        if ($timeout < 1) {
            $timeout = $config->defaultTimeoutSeconds;
        }

        $runId = date('Ymd_His') . '_' . bin2hex(random_bytes(4));
        $runDir = WRITEPATH . 'pyops/runs/' . $runId . '/';

        if (!is_dir($runDir) && !mkdir($runDir, 0755, true) && !is_dir($runDir)) {
            CLI::error('Unable to create run directory: ' . $runDir);
            return;
        }

        $requestFile = $runDir . 'request.json';
        file_put_contents($requestFile, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $runner = new PythonRunner(ROOTPATH, WRITEPATH, $config);
        $result = $runner->runRequestFile($requestFile, $timeout);
        $response = $result['response'] ?? null;

        if (CLI::getOption('json') !== null) {
            if (is_array($response)) {
                CLI::write(json_encode($response, JSON_UNESCAPED_SLASHES));
            } else {
                CLI::write(json_encode([
                    'ok' => false,
                    'error' => 'Python returned non-JSON output.',
                    'exit_code' => $result['exit_code'],
                    'stderr' => $result['stderr'],
                ], JSON_UNESCAPED_SLASHES));
            }

            return;
        }

        if ($result['ok'] && is_array($response)) {
            CLI::write('PyOps OK: ' . ($response['action'] ?? $action), 'green');

            if (!empty($response['artifacts']) && is_array($response['artifacts'])) {
                CLI::write('Artifacts:', 'yellow');
                foreach ($response['artifacts'] as $key => $value) {
                    $line = is_scalar($value) ? (string) $value : json_encode($value, JSON_UNESCAPED_SLASHES);
                    CLI::write('  - ' . $key . ': ' . $line);
                }
            }

            return;
        }

        CLI::error('PyOps failed.');
        CLI::write('Exit code: ' . (string) ($result['exit_code'] ?? -1));

        if (!empty($result['stderr'])) {
            CLI::write('stderr:', 'yellow');
            CLI::write((string) $result['stderr']);
        }

        if (!empty($result['stdout'])) {
            CLI::write('stdout:', 'yellow');
            CLI::write((string) $result['stdout']);
        }
    }

    /**
     * @return array<string, mixed>
     */
    private function loadPayload(): array
    {
        $payloadFile = (string) (CLI::getOption('payload-file') ?: '');
        $payloadInline = (string) (CLI::getOption('payload') ?: '');

        if ($payloadFile !== '') {
            $path = $payloadFile;
            if (!str_starts_with($path, ROOTPATH) && !str_starts_with($path, DIRECTORY_SEPARATOR)) {
                $path = ROOTPATH . ltrim($path, DIRECTORY_SEPARATOR);
            }

            if (!is_file($path)) {
                CLI::error('Payload file not found: ' . $path);
                return [];
            }

            $decoded = json_decode((string) file_get_contents($path), true);
            return is_array($decoded) ? $decoded : [];
        }

        if ($payloadInline !== '') {
            $decoded = json_decode($payloadInline, true);
            return is_array($decoded) ? $decoded : [];
        }

        return [];
    }
}
