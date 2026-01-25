<?php

namespace App\Commands;

use App\Services\ConfigLintService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ConfigLint extends SafeBaseCommand
{
    protected $group = 'config';
    protected $name = 'config:lint';
    protected $description = 'Lint Config/Services.php overrides against CI4 service signatures.';
    protected $usage = 'config:lint';
    protected $options = [
        '--dry-run' => 'Preview actions without writing data',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:config:lint] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Running lint without changes.', 'yellow');
        }

        $service = new ConfigLintService();
        $lint = $service->lint();

        if (! $lint['ok']) {
            $message = '[FAIL] Config lint unavailable: ' . ($lint['error'] ?? 'Unknown error.');
            CLI::write($message, 'red');
            log_message('error', '[spark:config:lint] Failed', ['reason' => $lint['error'] ?? 'Unknown error.']);
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
        if ($hasFailures) {
            log_message('error', '[spark:config:lint] Failed', ['reason' => 'Config lint failures detected.']);
        }

        log_message('info', '[spark:config:lint] Completed', [
            'has_failures' => $hasFailures,
            'dry_run' => $dryRun,
        ]);

        return $hasFailures ? EXIT_ERROR : EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
