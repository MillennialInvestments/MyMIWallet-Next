<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\AiopsActionExtractor;
use App\Services\AIOps\AiopsPatchPlanner;
use CodeIgniter\CLI\CLI;

class AiopsRepairs extends SafeBaseCommand
{
    protected $group = 'AIOps - All Control';
    protected $name = 'aiops:repairs';
    protected $description = 'Run the error->action->repair queue->patch plan pipeline.';
    protected $options = [
        '--apply-safe' => 'Apply only safe autopatches (placeholder mode).',
    ];

    public function run(array $params)
    {
        command('logs:errors');

        $summaryPath = ROOTPATH . 'docs/_aiops/_error_summary.json';
        $summary = json_decode((string) @file_get_contents($summaryPath), true);
        $errors = is_array($summary['errors'] ?? null) ? $summary['errors'] : [];

        $extractor = new AiopsActionExtractor();
        $actions = $extractor->extract($errors);

        $planner = new AiopsPatchPlanner();
        $plans = $planner->build($actions);

        $this->writeQueue($actions);
        $this->writePlan($plans);
        $this->writeExecutionArtifacts($actions, $plans, in_array('--apply-safe', $params, true));

        CLI::write('AIOps repair pipeline complete.', 'green');
        CLI::write('Queue: docs/_aiops/_repair_queue.md');
        CLI::write('Plan: docs/_aiops/_patch_plan.md');
        CLI::write('Execution log: docs/_aiops/_execution_log.md');
        CLI::write('Final report: docs/_aiops/_final_report.md');

        return EXIT_SUCCESS;
    }

    /** @param list<array<string,mixed>> $actions */
    private function writeQueue(array $actions): void
    {
        $dir = ROOTPATH . 'docs/_aiops/';
        file_put_contents($dir . '_repair_queue.json', json_encode([
            'generated_at' => date(DATE_ATOM),
            'items' => $actions,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $md = ['# Repair Queue', ''];
        foreach ($actions as $i => $a) {
            $md[] = '## ID: RQ-' . str_pad((string) ($i + 1), 3, '0', STR_PAD_LEFT);
            $md[] = '- Priority: ' . ($a['priority'] ?? 'medium');
            $md[] = '- Classification: ' . ($a['classification'] ?? 'unknown');
            $md[] = '- Target file: ' . ($a['target_file'] ?? 'unknown');
            $md[] = '- Summary: ' . ($a['summary'] ?? '');
            $md[] = '- Evidence: ' . ($a['evidence'] ?? '');
            $md[] = '- Recommended fix: ' . ($a['recommended_fix'] ?? '');
            $md[] = '- Safe to autopatch: ' . (($a['safe_to_autopatch'] ?? false) ? 'yes' : 'no');
            $md[] = '- Status: ' . ($a['status'] ?? 'queued');
            $md[] = '';
        }

        file_put_contents($dir . '_repair_queue.md', implode("\n", $md) . "\n");
    }

    /** @param list<array<string,mixed>> $plans */
    private function writePlan(array $plans): void
    {
        $dir = ROOTPATH . 'docs/_aiops/';
        file_put_contents($dir . '_patch_plan.json', json_encode([
            'generated_at' => date(DATE_ATOM),
            'plans' => $plans,
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $md = ['# Patch Plan', ''];
        foreach ($plans as $plan) {
            $md[] = '## ' . ($plan['id'] ?? 'PLAN-UNK');
            $md[] = '- Target file: ' . ($plan['target_file'] ?? 'unknown');
            $md[] = '- Why chosen: ' . ($plan['why_file_chosen'] ?? '');
            $md[] = '- Methods to inspect: ' . implode(', ', $plan['methods_to_inspect'] ?? []);
            $md[] = '- Patch strategy: ' . ($plan['patch_strategy'] ?? '');
            $md[] = '- Regression risks: ' . ($plan['regression_risks'] ?? '');
            $md[] = '- Tests to run: ' . implode(', ', $plan['tests_to_run'] ?? []);
            $md[] = '';
        }

        file_put_contents($dir . '_patch_plan.md', implode("\n", $md) . "\n");
    }

    /** @param list<array<string,mixed>> $actions @param list<array<string,mixed>> $plans */
    private function writeExecutionArtifacts(array $actions, array $plans, bool $applySafe): void
    {
        $dir = ROOTPATH . 'docs/_aiops/';
        $log = [
            '# AIOps Execution Log',
            '',
            '- generated_at: ' . date(DATE_ATOM),
            '- explicit actions found: ' . count($actions),
            '- inferred actions found: ' . count($actions),
            '- actions skipped: ' . count(array_filter($actions, static fn(array $a): bool => ! ($a['safe_to_autopatch'] ?? false))),
            '- files modified: 0 (planner mode)',
            '- apply-safe: ' . ($applySafe ? 'yes' : 'no'),
            '- reasons no changes were made: deterministic planner mode only; no automatic file patches in this command.',
            '',
            '## Planned Targets',
        ];

        foreach ($plans as $plan) {
            $log[] = '- ' . ($plan['target_file'] ?? 'unknown') . ' (' . ($plan['id'] ?? 'plan') . ')';
        }

        file_put_contents($dir . '_execution_log.md', implode("\n", $log) . "\n");

        $final = [
            '# AIOps Final Report',
            '',
            '- generated_at: ' . date(DATE_ATOM),
            '- repair queue items: ' . count($actions),
            '- patch plan items: ' . count($plans),
            '- output_dir: docs/_aiops/',
        ];

        file_put_contents($dir . '_final_report.md', implode("\n", $final) . "\n");
    }
}
