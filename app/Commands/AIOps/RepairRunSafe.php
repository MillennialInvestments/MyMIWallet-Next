<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RepairRunSafe extends SafeBaseCommand
{
    protected $group = 'AIOps - Repair';
    protected $name = 'aiops:repair:run_safe';
    protected $description = 'Run repair pipeline with rollback safety + gating before PR';

    public function run(array $params)
    {
        $baseBranch = env('AIOPS_BASE_BRANCH') ?: 'main';
        $tmpBranch = 'aiops/tmp-validate-' . date('Ymd_His');
        $failureArtifact = 'writable/audit/observability_regression_report.md';

        CLI::write("Base branch: {$baseBranch}");
        CLI::write("Temp branch: {$tmpBranch}");

        $this->sh("git fetch origin {$baseBranch}");
        $this->sh("git checkout {$baseBranch}");
        $this->sh("git reset --hard origin/{$baseBranch}");
        $this->sh('git clean -fd');
        $this->sh("git checkout -b {$tmpBranch}");

        try {
            $this->sparkRun('aiops:gate:cost');
            $this->sparkRun('aiops:observe:scan');
            $this->sparkRun('aiops:observe:hash');
            $this->sparkRun('aiops:observe:cost');
            $this->sparkRun('aiops:observe:regression');
            $this->sparkRun('aiops:patch:risk_score');
            $this->sparkRun('aiops:patch:validate');
            $this->sparkRun('aiops:patch:dry_run');
            $this->sparkRun('aiops:governance:analyze');
            $this->sparkRun('aiops:observe:suggest', true);
            $this->sparkRun('aiops:diff:format');
            $this->sparkRun('aiops:patch:hallucination');
            $this->sparkRun('aiops:patch:apply');

            $this->sparkRun('app:test', true);
            $this->sparkRun('codex:gate', true);
            $this->sparkRun('codex:gate:severity 0 10', true);
            $this->sparkRun('app:gate:coverage 60 warn', true);

            CLI::write("Validation passed. Ready to PR from branch: {$tmpBranch}", 'green');
            $this->nextStep('aiops:pr:create', 'Create a PR from the validated repair branch.');
            return EXIT_SUCCESS;
        } catch (\Throwable $e) {
            CLI::error('Validation failed: ' . $e->getMessage());

            $this->sh("git checkout {$baseBranch}", true);
            $this->sh("git reset --hard origin/{$baseBranch}", true);
            $this->sh('git clean -fd', true);
            $this->sh("git branch -D {$tmpBranch}", true);

            $this->nextStep('aiops:observe:regression', 'Inspect regression output before retrying the safe repair pipeline.', [$failureArtifact]);
            return EXIT_ERROR;
        }
    }

    private function sh(string $cmd, bool $optional = false): void
    {
        $full = 'cd ' . escapeshellarg(ROOTPATH) . ' && ' . $cmd;
        exec($full . ' 2>&1', $out, $code);
        foreach ($out as $line) {
            CLI::write($line);
        }

        if ($code !== 0 && ! $optional) {
            throw new \RuntimeException("shell failed: {$cmd}");
        }
    }
}
