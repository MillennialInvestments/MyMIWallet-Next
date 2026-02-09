<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\OllamaPatchRunner;
use CodeIgniter\CLI\CLI;

class Backlog extends SafeBaseCommand
{
    protected $group = 'AI-Ops';
    protected $name = 'aiops:backlog';
    protected $description = 'Reconcile outstanding AIOPS patch workflow jobs.';
    protected $usage = 'aiops:backlog [--run=1|0] [--force=1|0]';
    protected $options = [
        '--run' => 'Execute reconciliation actions for outstanding jobs.',
        '--force' => 'Force rerun for failed/partial jobs.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $execute = $this->optBool($flags, 'run', false);
        $force = $this->optBool($flags, 'force', false);

        $jobs = glob(ROOTPATH . 'docs/_aiops/patch_jobs/*.md') ?: [];
        sort($jobs);
        $rows = [];
        $runner = new OllamaPatchRunner();

        foreach ($jobs as $jobFile) {
            $jobId = pathinfo($jobFile, PATHINFO_FILENAME);
            $diff = ROOTPATH . 'docs/_aiops/patches/' . $jobId . '.diff';
            $json = ROOTPATH . 'docs/_aiops/patches/' . $jobId . '.json';
            $prMeta = ROOTPATH . 'docs/_aiops/runs/' . $jobId . '.pr.json';
            $reason = null;

            if (! is_file($diff)) {
                $reason = '.md exists but .diff does not';
            } elseif (! is_file($json)) {
                $reason = '.diff exists but .json does not';
            } elseif ($this->statusStartsWithFailed($json)) {
                $reason = '.json status starts with failed';
            } elseif ($this->hasUncommitted($diff)) {
                $reason = 'Patch exists but not committed';
            } elseif ($this->isCommitted($diff) && ! is_file($prMeta)) {
                $reason = 'Commit exists but PR metadata missing';
            }

            if ($reason === null) {
                continue;
            }

            $action = 'reported';
            $result = 'outstanding';

            if ($execute) {
                if (str_contains($reason, 'PR metadata missing')) {
                    file_put_contents($prMeta, json_encode([
                        'job_id' => $jobId,
                        'status' => 'pending_manual_open',
                        'branch' => 'aiops/patch/' . $jobId,
                        'timestamp' => gmdate('c'),
                    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
                    $action = 'created PR metadata placeholder';
                    $result = 'success';
                } else {
                    $run = $runner->run('docs/_aiops/patch_jobs/' . basename($jobFile), ['force' => $force]);
                    $action = 'reran ollama patch runner';
                    $result = $run->status;
                }
            }

            $rows[] = [
                'job_id' => $jobId,
                'reason' => $reason,
                'action' => $action,
                'result' => $result,
            ];
        }

        $reportPath = ROOTPATH . 'docs/_aiops/backlog-report-' . gmdate('Y-m-d') . '.md';
        $report = "# AIOPS Backlog Report\n\n";
        $report .= '- Mode: ' . ($execute ? 'run' : 'dry-run') . "\n";
        $report .= '- Force: ' . ($force ? 'yes' : 'no') . "\n\n";
        $report .= "| Job ID | Why Outstanding | Action Taken | Result |\n|---|---|---|---|\n";
        foreach ($rows as $row) {
            $report .= sprintf("| %s | %s | %s | %s |\n", $row['job_id'], $row['reason'], $row['action'], $row['result']);
        }
        if ($rows === []) {
            $report .= "| - | none | none | clean |\n";
        }

        file_put_contents($reportPath, $report);

        CLI::write('[AIOPS BACKLOG] Report written: ' . ltrim(str_replace(ROOTPATH, '', $reportPath), '/'), 'green');
        CLI::write($report);

        return EXIT_SUCCESS;
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
