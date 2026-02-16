<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RepairRunSafe extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:repair:run_safe';
    protected $description = 'Run repair pipeline with rollback safety + gating before PR';

    public function run(array $params)
    {
        $baseBranch = getenv('AIOPS_BASE_BRANCH') ?: 'main';
        $tmpBranch = 'aiops/tmp-validate-' . date('Ymd_His');

        CLI::write("Base branch: {$baseBranch}");
        CLI::write("Temp branch: {$tmpBranch}");

        // Ensure clean base
        $this->sh("git fetch origin {$baseBranch}");
        $this->sh("git checkout {$baseBranch}");
        $this->sh("git reset --hard origin/{$baseBranch}");
        $this->sh("git clean -fd");

        // Create temp branch
        $this->sh("git checkout -b {$tmpBranch}");

        try {
            // Cost gate first (may disable)
            $this->spark('aiops:gate:cost');

            // Observability pipeline
            $this->spark('aiops:observe:scan');
            $this->spark('aiops:observe:hash');
            $this->spark('aiops:observe:cost');
            $this->spark('aiops:observe:regression'); // fails if regressions found

            $this->runSpark('aiops:patch:risk_score');
            $this->runSpark('aiops:patch:validate');
            $this->runSpark('aiops:patch:dry_run');
            $this->runSpark('aiops:governance:analyze');
            
            // If you have suggest -> diff -> apply:
            $this->sparkIfExists('aiops:observe:suggest');
            $this->spark('aiops:diff:format');
            $this->spark('aiops:patch:hallucination');
            $this->spark('aiops:patch:apply');

            // Local validations
            $this->spark('app:test');
            $this->spark('codex:gate');
            $this->spark('codex:gate:severity 0 10');
            $this->spark('app:gate:coverage 60 warn');

            // If all passed, leave changes staged for PR creation step
            CLI::write("Validation passed. Ready to PR from branch: {$tmpBranch}");
        } catch (\Throwable $e) {
            CLI::error("Validation failed: " . $e->getMessage());

            // Rollback: go back to base and delete temp branch
            $this->sh("git checkout {$baseBranch}");
            $this->sh("git reset --hard origin/{$baseBranch}");
            $this->sh("git clean -fd");
            $this->sh("git branch -D {$tmpBranch}");

            CLI::error("Rolled back and deleted temp branch: {$tmpBranch}");
            exit(1);
        }
    }

    private function spark(string $cmd): void
    {
        $full = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' ' . $cmd;
        exec($full . ' 2>&1', $out, $code);
        foreach ($out as $line) CLI::write($line);
        if ($code !== 0) {
            throw new \RuntimeException("spark failed: {$cmd}");
        }
    }

    private function sparkIfExists(string $cmd): void
    {
        $full = PHP_BINARY . ' ' . escapeshellarg(ROOTPATH . 'spark') . ' ' . $cmd;
        exec($full . ' 2>&1', $out, $code);
        $joined = implode("\n", $out);

        if (str_contains($joined, 'Command "') && str_contains($joined, '" not found')) {
            CLI::write("Skipping missing command: {$cmd}");
            return;
        }

        foreach ($out as $line) CLI::write($line);
        if ($code !== 0) {
            throw new \RuntimeException("spark failed: {$cmd}");
        }
    }

    private function sh(string $cmd): void
    {
        $full = 'cd ' . escapeshellarg(ROOTPATH) . ' && ' . $cmd;
        exec($full . ' 2>&1', $out, $code);
        foreach ($out as $line) CLI::write($line);
        if ($code !== 0) {
            throw new \RuntimeException("shell failed: {$cmd}");
        }
    }
}
