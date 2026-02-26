<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Models\AIOpsInstructionModel;
use App\Services\AIOps\InstructionService;
use App\Services\Spark\LogSummarizeService;
use CodeIgniter\CLI\CLI;

class WorkerLogs extends SafeBaseCommand
{
    protected $group = 'AIOps - Run';
    protected $name = 'aiops:worker:logs';
    protected $description = 'Summarize logs, ingest actionable issues, and run aiops worker once.';

    public function run(array $params)
    {

        $recentLoop = (new AIOpsInstructionModel())
            ->where('source', 'logs:auto')
            ->where('created_at >=', date('Y-m-d H:i:s', strtotime('-15 minutes')))
            ->whereIn('status', ['queued', 'processing', 'patched', 'pr_ready'])
            ->countAllResults();
        if ($recentLoop >= 3) {
            CLI::error('Loop safeguard: too many recent logs:auto instructions; aborting auto-ingest.');
            return EXIT_ERROR;
        }

        $summaryService = new LogSummarizeService();
        $targetDate = date('Y-m-d');
        $summary = $summaryService->summarizeForDate($targetDate, false);

        if (!($summary['ok'] ?? false)) {
            CLI::error('Unable to summarize logs before worker ingestion.');
            return EXIT_ERROR;
        }

        $issues = $this->extractIssues((array) ($summary['lines'] ?? []));
        if ($issues === []) {
            CLI::write('No CRITICAL/ERROR/WARNING(>10) issues found in summary.', 'green');
            return EXIT_SUCCESS;
        }

        $instructionText = $this->buildInstructionText($issues);
        $hasCritical = !empty($issues['CRITICAL']);

        $instructionService = new InstructionService();
        $create = $instructionService->create($instructionText, 'logs:auto', $hasCritical, false, $hasCritical ? 'CRITICAL' : null);

        $instructionId = (int) ($create['id'] ?? 0);
        if ($instructionId <= 0) {
            CLI::error('Failed to enqueue logs instruction.');
            return EXIT_ERROR;
        }

        CLI::write("Queued log-fix instruction #{$instructionId}", 'yellow');

        $args = ['aiops:worker', '--once'];

        if ($hasCritical) {
            $args[] = '--create-pr=1';
        }

        command(implode(' ', $args));

        return EXIT_SUCCESS;
    }

    private function extractIssues(array $lines): array
    {
        $bucket = ['CRITICAL' => [], 'ERROR' => [], 'WARNING' => []];
        $currentLevel = null;
        $count = 0;

        foreach ($lines as $line) {
            if (preg_match('/^LEVEL:\s+(CRITICAL|ERROR|WARNING)/', (string) $line, $m)) {
                $currentLevel = $m[1];
                $count = 0;
                continue;
            }

            if ($currentLevel === null) {
                continue;
            }

            if (preg_match('/^\[(\d+)\s+occurrence\(s\)\]/', (string) $line, $mCount)) {
                $count = (int) $mCount[1];
                continue;
            }

            if (preg_match('/^(CRITICAL|ERROR|WARNING)\s+-->\s+(.+)$/', (string) $line, $msg)) {
                $level = $msg[1];
                $message = trim($msg[2]);
                $cnt = $count ?? 0;

                if ($level === 'WARNING' && $cnt <= 10) {
                    continue;
                }

                $bucket[$level][] = ['count' => $cnt, 'message' => $message];
            }
        }

        return array_filter($bucket, static fn(array $items): bool => $items !== []);
    }

    private function buildInstructionText(array $issues): string
    {
        $timestamp = date('Ymd_His');
        $lines = [
            'AIOPS_PATCH_JOB_TITLE=LOG_AUTOFIX_' . $timestamp,
            'AIOPS_OBJECTIVE=Resolve_current_log_failures_detected_by_logs_summarize',
            '',
        ];

        foreach (['CRITICAL', 'ERROR', 'WARNING'] as $level) {
            if (empty($issues[$level])) {
                continue;
            }

            $lines[] = $level . '_ISSUES:';
            foreach ($issues[$level] as $issue) {
                $lines[] = '- [' . $issue['count'] . '] ' . $issue['message'];
            }
            $lines[] = '';
        }

        return implode(PHP_EOL, $lines);
    }
}
