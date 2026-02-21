<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\BacklogMetaService;
use App\Services\AIOps\OllamaPatchRunner;
use CodeIgniter\CLI\CLI;
use Throwable;

class Backlog extends SafeBaseCommand
{
    protected $group = 'AIOps - Run';
    protected $name = 'aiops:backlog';
    protected $description = 'Reconcile outstanding AIOPS patch workflow jobs.';
    protected $usage = 'aiops:backlog [--run=1|0] [--force=1|0]';
    protected $options = [
        '--run' => 'Execute reconciliation actions for outstanding jobs.',
        '--force' => 'Force rerun for failed/partial jobs.',
    ];

    public function run(array $params)
    {
        try {
            [, $flags] = $this->parseParams($params);
            $execute = $this->optBool($flags, 'run', false);
            $force = $this->optBool($flags, 'force', false);

            $jobs = glob(ROOTPATH . 'docs/_aiops/patch_jobs/*.md') ?: [];
            sort($jobs);
            $rows = [];
            $runner = new OllamaPatchRunner();
            $metaService = new BacklogMetaService();

            $lockedCount = 0;
            $cleanCount = 0;
            $repairedCount = 0;
            $actionableCount = 0;

            foreach ($jobs as $jobFile) {
                $jobId = pathinfo($jobFile, PATHINFO_FILENAME);
                $diff = ROOTPATH . 'docs/_aiops/patches/' . $jobId . '.diff';
                $json = ROOTPATH . 'docs/_aiops/patches/' . $jobId . '.json';
                $prMeta = ROOTPATH . 'docs/_aiops/runs/' . $jobId . '.pr.json';
                $meta = $metaService->loadMeta($jobId);

                $reason = $this->buildReason($jobId, $diff, $json, $prMeta);
                if ($reason === null) {
                    $cleanCount++;
                    continue;
                }

                $actionableCount++;
                $action = 'reported';
                $result = 'outstanding';

                if ($meta['locked'] && ! $force) {
                    $lockedCount++;
                    $action = 'locked (manual review)';
                    $result = 'skipped';
                } elseif ($execute) {
                    if (str_contains($reason, 'PR metadata missing')) {
                        $this->writePrMeta($prMeta, $jobId, 'pending_manual_open');
                        $action = 'created PR metadata placeholder';
                        $result = 'success';
                        $repairedCount++;
                    } else {
                        $meta['attempts']++;
                        $run = $runner->run('docs/_aiops/patch_jobs/' . basename($jobFile), ['force' => $force]);
                        $meta['last_status'] = $run->status;
                        $meta['last_run'] = gmdate('c');

                        if ($run->status === 'success') {
                            $meta['attempts'] = 0;
                            $meta['locked'] = false;
                            $repairedCount++;
                        }

                        if ($jobId === 'README' && $run->status === 'failed_invalid_diff') {
                            $meta['last_status'] = 'manual_docs_review';
                            $meta['locked'] = true;
                            $this->writePrMeta($prMeta, $jobId, 'manual_docs_review');
                            $action = 'locked (manual docs review)';
                            $result = 'manual_docs_review';
                            $reason = 'README diff requires manual docs review';
                        } else {
                            if ($meta['last_status'] === 'failed_invalid_diff' && $meta['attempts'] >= 2) {
                                $meta['locked'] = true;
                                $reason = 'invalid diff after 2 attempts';
                            }

                            $action = 'reran ollama patch runner';
                            $result = $run->status;
                        }

                        if ($meta['locked']) {
                            $lockedCount++;
                        }

                        $metaService->saveMeta($jobId, $meta);
                    }
                }

                $rows[] = [
                    'job_id' => $jobId,
                    'reason' => $reason,
                    'attempts' => (string) $metaService->loadMeta($jobId)['attempts'],
                    'lock_status' => $metaService->isLocked($jobId) ? 'locked (manual review)' : 'unlocked',
                    'action' => $action,
                    'result' => $result,
                ];
            }

            $reportPath = ROOTPATH . 'docs/_aiops/backlog-report-' . gmdate('Y-m-d') . '.md';
            $report = "# AIOPS Backlog Report\n\n";
            $report .= '- Mode: ' . ($execute ? 'run' : 'dry-run') . "\n";
            $report .= '- Force: ' . ($force ? 'yes' : 'no') . "\n\n";
            $report .= "| Job ID | Why Outstanding | Attempts | Lock Status | Action Taken | Result |\n|---|---|---:|---|---|---|\n";
            foreach ($rows as $row) {
                $report .= sprintf("| %s | %s | %s | %s | %s | %s |\n", $row['job_id'], $row['reason'], $row['attempts'], $row['lock_status'], $row['action'], $row['result']);
            }
            if ($rows === []) {
                $report .= "| - | none | 0 | unlocked | none | clean |\n";
            }

            $report .= "\nSummary:\n";
            $report .= '- Total jobs scanned: ' . count($jobs) . "\n";
            $report .= '- Repaired automatically: ' . $repairedCount . "\n";
            $report .= '- Locked (manual review): ' . $lockedCount . "\n";
            $report .= '- Clean: ' . $cleanCount . "\n";

            file_put_contents($reportPath, $report);

            CLI::write('[AIOPS BACKLOG] Report written: ' . ltrim(str_replace(ROOTPATH, '', $reportPath), '/'), 'green');
            CLI::write($report);

            if ($lockedCount > 0 || $actionableCount > 0) {
                return 2;
            }

            return EXIT_SUCCESS;
        } catch (Throwable $e) {
            CLI::error('[AIOPS BACKLOG] Unexpected failure: ' . $e->getMessage());
            log_message('error', '[spark:aiops:backlog] failure', ['exception' => $e]);

            return 3;
        }
    }

    private function buildReason(string $jobId, string $diffPath, string $jsonPath, string $prMeta): ?string
    {
        if (! is_file($diffPath)) {
            return '.md exists but .diff does not';
        }

        if (! is_file($jsonPath)) {
            return '.diff exists but .json does not';
        }

        if ($this->statusStartsWithFailed($jsonPath)) {
            if ($jobId === 'README') {
                return 'README diff requires manual docs review';
            }

            return '.json status starts with failed';
        }

        if ($this->hasUncommitted($diffPath)) {
            return 'Patch exists but not committed';
        }

        if ($this->isCommitted($diffPath) && ! is_file($prMeta)) {
            return 'Commit exists but PR metadata missing';
        }

        return null;
    }

    private function writePrMeta(string $prMetaPath, string $jobId, string $status): void
    {
        $dir = ROOTPATH . 'docs/_aiops/backlog';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $prMetaPath = $dir . '/' . basename($prMetaPath);

        file_put_contents($prMetaPath, json_encode([
            'job_id' => $jobId,
            'status' => $status,
            'branch' => 'aiops/patch/' . $jobId,
            'timestamp' => gmdate('c'),
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
    }

    private function statusStartsWithFailed(string $jsonPath): bool
    {
        $decoded = json_decode((string) file_get_contents($jsonPath), true);
        $status = is_array($decoded) ? (string) ($decoded['status'] ?? '') : '';

        return str_starts_with($status, 'failed');
    }

    private function hasUncommitted(string $path): bool
    {
        $cmd = 'git status --porcelain -- ' . escapeshellarg(ltrim(str_replace(ROOTPATH, '', $path), '/'));
        $output = trim((string) shell_exec($cmd));

        return $output !== '';
    }

    private function isCommitted(string $path): bool
    {
        $rel = ltrim(str_replace(ROOTPATH, '', $path), '/');
        $cmd = 'git log --oneline -n 1 -- ' . escapeshellarg($rel);
        $output = trim((string) shell_exec($cmd));

        return $output !== '';
    }
}