<?php

namespace App\Commands\Config;

use App\Services\ConfigLintService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Lint extends SafeBaseCommand
{
    protected $group = 'config';
    protected $name = 'config:lint';
    protected $description = 'Lint Config/Services.php overrides against CI4 service signatures.';
    protected $usage = 'config:lint';
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
        '--json' => 'Emit JSON summary',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:config:lint] Started', ['params' => $params]);
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $json = isset($flags['json']) || $this->isCiRuntime();

        if ($dryRun) {
            CLI::write('Dry-run enabled. Running lint without changes.', 'yellow');
        }

        $service = new ConfigLintService();
        $lint = $service->lint();

        if (! $lint['ok']) {
            $message = '[FAIL] Config lint unavailable: ' . ($lint['error'] ?? 'Unknown error.');
            CLI::write($message, 'red');
            log_message('error', '[spark:config:lint] Failed', ['reason' => $lint['error'] ?? 'Unknown error.']);
            if ($this->isCiRuntime()) {
                if ($json) {
                    CLI::write(json_encode(['ok' => false, 'error' => $lint['error'] ?? 'unknown', 'ci_mode' => true], JSON_PRETTY_PRINT));
                }
                return EXIT_SUCCESS;
            }
            return EXIT_ERROR;
        }

        foreach ($lint['results'] as $serviceName => $result) {
            $label = strtoupper($result['status']);
            $color = $label === 'FAIL' ? 'red' : ($label === 'WARN' ? 'yellow' : 'green');
            $line = sprintf('[%s] Services::%s', $label, $serviceName);
            if ($result['message'] !== '') {
                $line .= ' — ' . $result['message'];
            }
            CLI::write($line, $color);
        }

        $hasFailures = (bool) ($lint['has_failures'] ?? false);
        if ($json) {
            CLI::write(json_encode($lint, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }
        if ($hasFailures) {
            log_message('error', '[spark:config:lint] Failed', ['reason' => 'Config lint failures detected.']);
        }

        log_message('info', '[spark:config:lint] Completed', [
            'has_failures' => $hasFailures,
            'dry_run' => $dryRun,
        ]);

        if ($hasFailures && $this->isCiRuntime()) {
            CLI::write('CI mode: reporting lint failures without failing the job.', 'yellow');
            return EXIT_SUCCESS;
        }

        return $hasFailures ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
