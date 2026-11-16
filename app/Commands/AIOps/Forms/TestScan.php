<?php

declare(strict_types=1);

namespace App\Commands\AIOps\Forms;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\FormIntelligenceService;
use App\Services\AIOps\FormPatchPlanner;
use App\Services\AIOps\FormTestExecutor;
use App\Services\AIOps\FormDebugSeederAuditService;
use App\Services\AIOps\FormSubmissionPolicy;
use CodeIgniter\CLI\CLI;

/**
 * aiops:form:test — form inventory and (opt-in) test submission.
 *
 * GT-FORM-HARNESS-001 safety contract:
 *  - Default is a read-only inventory: no HTTP submission, no DB write, no
 *    patch job, no seeder, no report inside the source tree.
 *  - A live submission needs --submit --allow-destructive --approve AND a
 *    FormSubmissionPolicy approval (non-production env, allow-listed host).
 *  - --json prints machine-readable output; --strict exits 1 when any entry FAILs.
 */
class TestScan extends SafeBaseCommand
{
    protected $group = 'AIOps - QA';
    protected $name = 'aiops:form:test';
    protected $description = 'Inventory forms (url/file/text or whole platform), map action+method to routes; live submission only with explicit approval on an allow-listed non-production host.';
    protected $usage = 'aiops:form:test [--url="/path"|--file="app/Views/x.php"|--text="<form>..</form>"|--scan-all] [--json] [--strict] [--limit=N] [--report-dir=/abs/dir] [--with-db-counts] [--submit --allow-destructive --approve]';

    protected $options = [
        '--url' => 'A URL or path to read (one GET) and inventory.',
        '--file' => 'A view file (absolute or repo-relative) to inventory.',
        '--text' => 'Raw HTML snippet to inventory.',
        '--scan-all' => 'Inventory every form and JS request under app/Views and app/Modules.',
        '--json' => 'Print the result as JSON.',
        '--strict' => 'Exit 1 when any entry has status FAIL.',
        '--limit' => 'With --scan-all, max files to scan.',
        '--report-dir' => 'Report directory (default WRITEPATH/aiops/form-tests; must be outside the source tree).',
        '--no-report' => 'With --scan-all, do not write report files.',
        '--with-db-counts' => 'With --scan-all, read table row counts for seed readiness (read-only).',
        '--seeder' => 'Seeder to validate; executed only on an approved live run.',
        '--form-index' => 'Single-source live submit: which form to submit (default 0).',
        '--submit' => 'Request a live submission (also needs --allow-destructive and --approve).',
        '--allow-destructive' => 'Acknowledge that a live submission may change data.',
        '--approve' => 'Operator approval for a live submission.',
        '--ingest' => 'After a live submission that errors, queue the patch job into aiops:ingest.',
        '--dry-run' => 'Inventory only (this is the default).',
        '--write-gap-baseline' => 'With --scan-all, rewrite tests/baseline/form-action-gaps.txt from the current FAIL entries.',
    ];

    public function run(array $params)
    {
        $json   = $this->hasFlag('--json');
        $strict = $this->hasFlag('--strict');

        $policy = $this->policy();

        try {
            $result = $this->hasFlag('--scan-all') ? $this->runSystemAudit($policy) : $this->runSingle($policy);
        } catch (\Throwable $e) {
            $json ? CLI::write(json_encode(['ok' => false, 'error' => $e->getMessage()])) : CLI::error($e->getMessage());

            return EXIT_ERROR;
        }

        if ($result === null) {
            return EXIT_ERROR;
        }

        if ($this->hasFlag('--scan-all') && $this->hasFlag('--write-gap-baseline')) {
            $lines = FormDebugSeederAuditService::gapLines((array) ($result['forms'] ?? []));
            $header = "# GT-FORM-ROUTES-001: form/JS actions with no matching route + method.\n"
                . "# Columns: file<TAB>kind<TAB>METHOD<TAB>action<TAB>reason. Remove lines as they are fixed; never add one to get green.\n"
                . "# Regenerate: php spark aiops:form:test --scan-all --no-report --write-gap-baseline\n";
            file_put_contents(ROOTPATH . 'tests/baseline/form-action-gaps.txt', $header . implode("\n", $lines) . "\n");
            CLI::write('Wrote ' . count($lines) . ' gaps to tests/baseline/form-action-gaps.txt', 'yellow');
        }

        if ($json) {
            CLI::write((string) json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } else {
            $this->printHuman($result);
        }

        $fails = (int) ($result['summary']['by_status']['FAIL'] ?? 0);

        return ($strict && $fails > 0) ? EXIT_ERROR : EXIT_SUCCESS;
    }

    /** @return array{allowed: bool, reason: string, host: string} */
    private function policy(): array
    {
        helper('url');

        return FormSubmissionPolicy::evaluate(
            $this->hasFlag('--submit'),
            $this->hasFlag('--allow-destructive'),
            $this->hasFlag('--approve') && ! $this->hasFlag('--dry-run'),
            defined('ENVIRONMENT') ? (string) ENVIRONMENT : 'production',
            (string) site_url('/'),
            FormSubmissionPolicy::allowedHostsFromEnv()
        );
    }

    private function runSingle(array $policy): ?array
    {
        $spec = $this->parseSourceSpec($_SERVER['argv'] ?? []);
        if (! $spec) {
            CLI::error('Must provide one of: --url=, --file=, --text=, --scan-all');
            CLI::write('Example: php spark aiops:form:test --file=app/Views/UserModule/Budget/index.php --json');

            return null;
        }

        $analysis = (new FormIntelligenceService())->analyze($spec);
        $forms    = (array) ($analysis['forms'] ?? []);
        $entries  = array_merge($forms, (array) ($analysis['requests'] ?? []));
        $executor = new FormTestExecutor();
        $index    = (int) ($this->getFlagValue('--form-index') ?? 0);

        $result = [
            'schema'  => 'mymi.form-inventory.v1',
            'mode'    => $policy['allowed'] ? 'live' : 'dry_run',
            'policy'  => $policy,
            'source'  => $spec['type'] === 'text' ? ['type' => 'text'] : $spec,
            'summary' => $this->summarise($entries),
            'forms'   => $entries,
        ];

        if (! $policy['allowed']) {
            $result['submission'] = $forms === [] ? null : $executor->plan($analysis, $index);

            return $result;
        }

        $execution = $executor->execute($analysis, ['policy' => $policy, 'form_index' => $index]);
        $result['submission'] = [
            'status'         => ($execution['error_detected'] ?? false) ? 'FAIL' : (($execution['ok'] ?? false) ? 'PASS' : ($execution['status'] ?? 'BLOCKED')),
            'test_id'        => $execution['test_id'] ?? null,
            'http_status'    => $execution['submit']['status'] ?? null,
            'error_detected' => (bool) ($execution['error_detected'] ?? false),
        ];

        if (($execution['error_detected'] ?? false) === true) {
            $plan = (new FormPatchPlanner())->analyzeAndQueuePatch($execution, ['auto_ingest' => $this->hasFlag('--ingest')]);
            $result['submission']['patch_job'] = $plan['patch_job'] ?? null;
        }

        return $result;
    }

    private function runSystemAudit(array $policy): array
    {
        $limit = $this->getFlagValue('--limit');

        return (new FormDebugSeederAuditService())->run([
            'dry_run'       => ! $policy['allowed'],
            'policy'        => $policy,
            'seeder'        => $this->getFlagValue('--seeder'),
            'limit'         => $limit !== null && $limit !== '' ? (int) $limit : null,
            'db_counts'     => $this->hasFlag('--with-db-counts'),
            'report_dir'    => $this->getFlagValue('--report-dir'),
            'write_reports' => ! $this->hasFlag('--no-report'),
        ]) + ['policy' => $policy];
    }

    private function summarise(array $entries): array
    {
        $by = ['PASS' => 0, 'FAIL' => 0, 'BLOCKED' => 0, 'SKIPPED' => 0];
        foreach ($entries as $e) {
            $by[$e['status']] = ($by[$e['status']] ?? 0) + 1;
        }

        return ['entries' => count($entries), 'by_status' => $by];
    }

    private function printHuman(array $result): void
    {
        $policy = $result['policy'] ?? [];
        CLI::write('Mode: ' . (($policy['allowed'] ?? false) ? 'LIVE (approved)' : 'dry-run inventory') . ' [policy: ' . ($policy['reason'] ?? '?') . ']', ($policy['allowed'] ?? false) ? 'red' : 'green');

        foreach ((array) ($result['session'] ?? []) as $note) {
            CLI::write('Session: ' . $note, 'yellow');
        }

        foreach ((array) ($result['summary']['by_status'] ?? []) as $status => $n) {
            CLI::write(sprintf('  %-8s %d', $status, $n));
        }

        if (($policy['allowed'] ?? false) && isset($result['summary']['live_submissions'])) {
            $l = $result['summary']['live_submissions'];
            CLI::write(sprintf('Live submits: %d sent  PASS %d  FAIL %d  BLOCKED %d  SKIPPED %d (static counts below are the scan, not the submits)',
                (int) ($result['summary']['forms_submitted'] ?? 0), $l['PASS'] ?? 0, $l['FAIL'] ?? 0, $l['BLOCKED'] ?? 0, $l['SKIPPED'] ?? 0), 'yellow');
            foreach ((array) ($result['summary']['live_fails'] ?? []) as $line) {
                CLI::write('  LIVE FAIL ' . $line, 'red');
            }
        }

        if (isset($result['summary']['files_scanned'])) {
            CLI::write('Files scanned: ' . $result['summary']['files_scanned'] . '; forms: ' . $result['summary']['forms_discovered'] . '; JS requests: ' . $result['summary']['js_requests']);
            foreach ((array) ($result['report_files'] ?? []) as $label => $path) {
                CLI::write('Report (' . $label . '): ' . $path, 'blue');
            }

            return;
        }

        foreach ((array) ($result['forms'] ?? []) as $e) {
            CLI::write(sprintf('  [%s] %s %s %s -> %s (%s)', $e['status'], $e['key'], $e['method'], $e['action'] ?: '(blank)',
                $e['route']['handler'] ?? '-', $e['reason']));
        }
        if (! empty($result['submission'])) {
            CLI::write('Submission: ' . ($result['submission']['status'] ?? '') . ' ' . ($result['submission']['reason'] ?? ''));
        }
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
