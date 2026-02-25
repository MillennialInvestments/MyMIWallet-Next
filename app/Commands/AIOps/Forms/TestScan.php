<?php

declare(strict_types=1);

namespace App\Commands\AIOps\Forms;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\FormIntelligenceService;
use App\Services\AIOps\FormPatchPlanner;
use App\Services\AIOps\FormTestExecutor;
use CodeIgniter\CLI\CLI;

class TestScan extends SafeBaseCommand
{
    protected $group = 'AIOps - QA';
    protected $name = 'aiops:form:test';
    protected $description = 'Scan a form (url/file/text), map route->controller, generate payload, submit, capture logs, and queue a patch job if errors found.';
    protected $usage = 'aiops:form:test [--url="/path"] [--file="/abs/path/to/view.php"] [--text="<form>..</form>"] [--no-ingest]';

    protected $options = [
        '--url' => 'A URL or path to scan (e.g. "/Budget/Account-Manager").',
        '--file' => 'An absolute file path on server to scan.',
        '--text' => 'Raw HTML snippet containing a <form> to scan.',
        '--no-ingest' => 'Do not call aiops:ingest after creating a patch job.',
    ];

    public function run(array $params)
    {
        $spec = $this->parseSourceSpec($_SERVER['argv'] ?? []);

        if (!$spec) {
            CLI::error('Must provide one of: --url=, --file=, --text=');
            CLI::write('Example: php spark aiops:form:test --url="/Budget/Account-Manager"');
            return;
        }

        $noIngest = in_array('--no-ingest', ($_SERVER['argv'] ?? []), true);

        CLI::write('Scanning source: ' . $spec['type']);

        $intelligence = new FormIntelligenceService();
        $analysis = $intelligence->analyze($spec);

        if (!($analysis['ok'] ?? false)) {
            CLI::error('Analyze failed: ' . ($analysis['error'] ?? 'unknown'));
        } else {
            CLI::write('Form action: ' . ($analysis['form']['action'] ?? '(blank)'));
            CLI::write('Form method: ' . ($analysis['form']['method'] ?? '(unknown)'));

            $route = $analysis['route'] ?? [];
            CLI::write('Route matched: ' . (($route['matched'] ?? false) ? 'YES' : 'NO'));
            if (!empty($route['route'])) {
                CLI::write('Route: ' . $route['route']);
            }
            if (!empty($route['controller'])) {
                CLI::write('Controller: ' . $route['controller']);
            }
        }

        $executor = new FormTestExecutor();
        $execution = $executor->execute($analysis);

        $testId = $execution['test_id'] ?? null;
        CLI::write('Stored test_id: ' . (string)$testId);

        if (($execution['error_detected'] ?? false) === true) {
            CLI::error('Error detected in response/logs. Creating patch job...');
        } else {
            CLI::write('No error detected.');
        }

        $planner = new FormPatchPlanner();
        $plan = $planner->analyzeAndQueuePatch($execution, ['auto_ingest' => !$noIngest]);

        if (($plan['patch_job'] ?? null)) {
            CLI::write('Patch job: ' . $plan['patch_job']);
        }

        if (!empty($plan['ingest'])) {
            CLI::write('Ingest exit_code: ' . (string)($plan['ingest']['exit_code'] ?? ''));
        }

        CLI::write('Done.');
    }

    private function parseSourceSpec(array $argv): ?array
    {
        foreach ($argv as $arg) {
            if (str_starts_with($arg, '--url=')) {
                return ['type' => 'url', 'value' => substr($arg, 6)];
            }
            if (str_starts_with($arg, '--file=')) {
                return ['type' => 'file', 'value' => substr($arg, 7)];
            }
            if (str_starts_with($arg, '--text=')) {
                return ['type' => 'text', 'value' => substr($arg, 7)];
            }
        }

        return null;
    }
}