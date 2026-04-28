<?php

declare(strict_types=1);

namespace App\Commands\AIOps\Forms;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\FormIntelligenceService;
use App\Services\AIOps\FormPatchPlanner;
use App\Services\AIOps\FormTestExecutor;
use App\Services\AIOps\FormDebugSeederAuditService;
use CodeIgniter\CLI\CLI;

class TestScan extends SafeBaseCommand
{
    protected $group = 'AIOps - QA';
    protected $name = 'aiops:form:test';
    protected $description = 'Scan a form (url/file/text), map route->controller, generate payload, submit, capture logs, and queue a patch job if errors found.';
    protected $usage = 'aiops:form:test [--url="/path"] [--file="/abs/path/to/view.php"] [--text="<form>..</form>"] [--no-ingest] [--scan-all] [--seeder=Seeder]';

    protected $options = [
        '--url' => 'A URL or path to scan (e.g. "/Budget/Account-Manager").',
        '--file' => 'An absolute file path on server to scan.',
        '--text' => 'Raw HTML snippet containing a <form> to scan.',
        '--no-ingest' => 'Do not call aiops:ingest after creating a patch job.',
        '--scan-all' => 'Run full form debugging + seeder readiness audit across discovered forms.',
        '--seeder' => 'Seeder class/file to validate/run for form debug preparation.',
        '--submit' => 'With --scan-all, execute live submissions (requires --allow-destructive and --approve).',
        '--allow-destructive' => 'With --scan-all, allow live form submit attempts when not in dry-run.',
        '--approve' => 'Required with --allow-destructive for live submissions.',
        '--dry-run' => 'With --scan-all, analyze only (default behavior).',
        '--limit' => 'With --scan-all, max forms to analyze.',
    ];

    public function run(array $params)
    {
        if ($this->hasFlag('--scan-all')) {
            return $this->runSystemAudit($params);
        }
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

    private function runSystemAudit(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        if (! isset($flags['dry-run']) && ! isset($flags['approve'])) {
            $dryRun = true;
        }

        $submitRequested = isset($flags['submit']) || $this->hasFlag('--submit');
        $allowDestructive = isset($flags['allow-destructive']) || $this->hasFlag('--allow-destructive');
        $approved = isset($flags['approve']) || $this->hasFlag('--approve');

        $executeSubmissions = $submitRequested
            && $allowDestructive
            && $approved
            && ! $dryRun;

        if ($submitRequested && ! $executeSubmissions) {
            CLI::write('Live submissions skipped. Use --submit --allow-destructive --approve and disable dry-run.', 'yellow');
        }

        $service = new FormDebugSeederAuditService();
        $seeder = is_string($flags['seeder'] ?? null) ? (string) $flags['seeder'] : $this->getFlagValue('--seeder');
        $limitRaw = isset($flags['limit']) ? (string) $flags['limit'] : $this->getFlagValue('--limit');

        $result = $service->run([
            'dry_run' => $dryRun,
            'seeder' => $seeder,
            'submit' => $executeSubmissions,
            'limit' => is_string($limitRaw) && $limitRaw !== '' ? (int) $limitRaw : null,
        ]);

        CLI::write('Forms discovered: ' . (string) ($result['summary']['forms_discovered'] ?? 0), 'green');
        CLI::write('Forms analyzed: ' . (string) ($result['summary']['forms_analyzed'] ?? 0), 'green');
        CLI::write('Forms with data gaps: ' . (string) ($result['summary']['forms_with_data_gaps'] ?? 0), 'yellow');
        CLI::write('Report (docs): ' . (string) ($result['report_files']['docs_markdown'] ?? ''), 'blue');
        CLI::write('Report (writable): ' . (string) ($result['report_files']['writable_json'] ?? ''), 'blue');

        return EXIT_SUCCESS;
    }

    private function hasFlag(string $flag): bool
    {
        return in_array($flag, ($_SERVER['argv'] ?? []), true)
            || in_array(ltrim($flag, '-'), ($_SERVER['argv'] ?? []), true);
    }


    private function getFlagValue(string $flag): ?string
    {
        $prefix = $flag . '=';
        foreach (($_SERVER['argv'] ?? []) as $arg) {
            if (str_starts_with((string) $arg, $prefix)) {
                return substr((string) $arg, strlen($prefix));
            }
        }

        return null;
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
