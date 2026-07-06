<?php

namespace App\Commands\AIOps;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

final class OperatorNext extends BaseCommand
{
    protected $group = 'AIOps';
    protected $name = 'aiops:operator-next';
    protected $description = 'Resolve the current AIOps state into one operator-level NEXT COMMANDS block.';

    public function run(array $params): int
    {
        $root       = rtrim(ROOTPATH, '/');
        $branch     = $this->runCommand('git branch --show-current');
        $status     = $this->runCommand('git status --short');
        $originMain = $this->runCommand('git rev-parse --verify origin/main');
        $head       = $this->runCommand('git rev-parse --verify HEAD');
        $aheadCount = $this->runCommand('git rev-list --count origin/main..HEAD');

        CLI::write('===== TBI AIOPS OPERATOR NEXT =====');
        CLI::write('ROOT: ' . $root);
        CLI::write('BRANCH: ' . ($branch !== '' ? $branch : 'unknown'));
        CLI::write('STATUS_COUNT: ' . ($status === '' ? '0' : (string) count(explode("\n", $status))));
        CLI::write('HEAD: ' . ($head !== '' ? substr($head, 0, 8) : 'unknown'));
        CLI::write('ORIGIN_MAIN: ' . ($originMain !== '' ? substr($originMain, 0, 8) : 'unknown'));
        CLI::write('COMMITS_AHEAD_ORIGIN_MAIN: ' . ($aheadCount !== '' ? $aheadCount : 'unknown'));
        CLI::newLine();

        if ($branch === 'main') {
            $this->printMainGuidance($status);

            return 0;
        }

        if ($status === '' && $aheadCount === '0') {
            passthru('cd ' . escapeshellarg(ROOTPATH) . ' && php spark aiops:operator:state-next --phase=discovery');

            return 0;
        }

        if ($status !== '') {
            $this->printChangedFeatureGuidance();

            return 0;
        }

        if ((int) $aheadCount > 0) {
            $this->printCommittedFeatureGuidance();

            return 0;
        }

        $this->printFallbackGuidance();

        return 0;
    }

    private function printMainGuidance(string $status): void
    {
        CLI::write('STATE: main_branch_guard');
        CLI::write('SUMMARY: Main is for production sync, validation, and worktree routing. Do not implement from main.');
        CLI::newLine();

        CLI::write('DISPATCHER ROUTING:', 'yellow');
        CLI::write('Main is dispatcher-only. Select an active lane from inventory before implementing.');
        CLI::newLine();

        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('ai check');
        CLI::write('ai inventory --limit=20');
        CLI::write('php spark aiops:inventory --select=<number-from-inventory>');
        CLI::write('cd /apps/TBI/worktrees/<selected-worktree-path>');
        CLI::write('ai check');
        CLI::write('git status --short');

        if ($status !== '') {
            CLI::newLine();
            CLI::write('ROLLBACK / CLEANUP:', 'yellow');
            CLI::write('Review uncommitted main changes before continuing. Do not discard changes unless intentionally reverting.');
        }
    }

    private function printNoopFeatureGuidance(): void
    {
        CLI::write('STATE: feature_worktree_noop');
        CLI::write('SUMMARY: This feature worktree is clean with no commits ahead of origin/main.');
        CLI::newLine();

        CLI::write('PRIMARY NEXT ACTION:', 'green');
        CLI::write('Choose whether this clean worktree needs implementation or should return to inventory.');
        CLI::newLine();

        CLI::write('WHY: Blank git status means clean. Clean/no-ahead worktrees cannot be committed or PR-created until an implementation step changes files.');
        CLI::newLine();

        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('ai check');
        CLI::write('ai do "Build the smallest safe implementation step from the active roadmap. Do not commit or merge."');
        CLI::write('ai next');
        CLI::newLine();

        CLI::write('SUPPORTING CHECKS:', 'green');
        CLI::write('php spark aiops:worktree:doctor');
        CLI::write('git status --short');
        CLI::newLine();

        CLI::write('DO NOT RUN:', 'red');
        CLI::write('git commit');
        CLI::write('gh pr create');
        CLI::write('ai finish');
        CLI::newLine();

        CLI::write('VALIDATION:', 'green');
        CLI::write('php spark aiops:execution-engine:validate --run');
        CLI::write('git status --short');
        CLI::newLine();

        CLI::write('ROLLBACK:', 'yellow');
        CLI::write('No rollback needed because no tracked file changes exist.');
    }

    private function printChangedFeatureGuidance(): void
    {
        $files = $this->changedFiles();
        $quotedFiles = $this->quoteFiles($files);

        CLI::write('STATE: feature_worktree_has_uncommitted_changes');
        CLI::write('SUMMARY: Validate the changes before commit or PR.');
        CLI::newLine();

        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('php spark aiops:worktree:doctor');
        CLI::write('php spark aiops:execution-engine:mutation-gate-smoke');
        CLI::write('php spark aiops:execution-engine:wrapper-smoke');
        CLI::write('php spark aiops:execution-engine:validate --run');
        CLI::write('git diff --check');
        CLI::write('git status --short');
        CLI::write('git diff --stat');
        CLI::newLine();

        CLI::write('COMMIT / PR AFTER VALIDATION:', 'green');
        CLI::write('git add ' . $quotedFiles);
        CLI::write('git commit -m "Improve AIOps operator next guidance"');
        CLI::write('git push -u origin "$(git branch --show-current)"');
        CLI::write('gh pr create --base main --head "$(git branch --show-current)" --title "Improve AIOps operator next guidance" --body "## Summary');
        CLI::write('- Adds operator-level NEXT COMMANDS guidance for active AIOps worktrees.');
        CLI::write('- Detects no-op, changed, committed, and main-guard states.');
        CLI::write('- Keeps mutation disabled by default and preserves validation-first workflow.');
        CLI::write('');
        CLI::write('## Validation');
        CLI::write('- php spark aiops:operator-next');
        CLI::write('- php spark aiops:worktree:doctor');
        CLI::write('- php spark aiops:execution-engine:mutation-gate-smoke');
        CLI::write('- php spark aiops:execution-engine:wrapper-smoke');
        CLI::write('- php spark aiops:execution-engine:validate --run');
        CLI::write('- git diff --check');
        CLI::write('');
        CLI::write('## Rollback');
        CLI::write('- Revert this PR or restore the changed AIOps operator files before merge."');
        CLI::newLine();

        CLI::write('ROLLBACK:', 'yellow');
        CLI::write('git diff > /tmp/aiops-operator-next-before-rollback.patch');
        CLI::write('git restore --worktree --staged ' . $quotedFiles);
    }

    private function printCommittedFeatureGuidance(): void
    {
        CLI::write('STATE: feature_worktree_commits_ready_for_pr');
        CLI::write('SUMMARY: This branch has commits ahead of origin/main. Validate and create or update the PR.');
        CLI::newLine();

        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('php spark aiops:execution-engine:validate --run');
        CLI::write('git diff --check');
        CLI::write('git status --short');
        CLI::write('gh pr view --json number,title,state,mergeable,headRefName,baseRefName,url');
        CLI::write('gh pr create --base main --head "$(git branch --show-current)" --title "Improve AIOps operator next guidance" --body "Operator-level AIOps NEXT COMMANDS improvement."');
        CLI::newLine();
        CLI::write('ALTERNATIVE IF PR ALREADY EXISTS:', 'yellow');
        CLI::write('ai finish');
        CLI::write('gh pr view --json number,title,state,isDraft,mergeStateStatus,url');
        CLI::write('gh pr checks "$(gh pr view --json number --jq .number)"');
        CLI::newLine();
        CLI::write('ALTERNATIVE IF MERGE PROMPT WAS MISSED OR MISTYPED:', 'yellow');
        CLI::write('ai finish');
        CLI::newLine();
        CLI::write('MULTI-LANE NOTE:', 'yellow');
        CLI::write('When multiple chats or terminals are active, do not rely on global latest from main. Use the exact /apps/TBI/worktrees/... path from the lane or inventory output.');
        CLI::newLine();
        CLI::write('DO NOT USE:', 'red');
        CLI::write('ai approve merge');
        CLI::newLine();
        CLI::write('WHY:');
        CLI::write('ai finish owns commit, PR, clean-state check, and merge approval prompts.');
        CLI::newLine();

        CLI::write('ROLLBACK:', 'yellow');
        CLI::write('Revert this PR after merge, or create a fixup commit before merge.');
    }

    private function printFallbackGuidance(): void
    {
        CLI::write('STATE: unknown');
        CLI::write('SUMMARY: Unable to determine a precise operator state.');
        CLI::newLine();

        CLI::write('NEXT COMMANDS:', 'green');
        CLI::write('ai check');
        CLI::write('php spark aiops:worktree:doctor');
        CLI::write('git status --short');
    }

    private function runCommand(string $command): string
    {
        return trim($this->runRawCommand($command));
    }

    private function runRawCommand(string $command): string
    {
        $root = escapeshellarg(rtrim(ROOTPATH, '/'));

        return (string) shell_exec('cd ' . $root . ' && ' . $command . ' 2>/dev/null');
    }

    /**
     * @return list<string>
     */
    private function changedFiles(): array
    {
        $status = $this->runRawCommand('git status --porcelain=v1 --untracked-files=all');

        if (trim($status) === '') {
            return [];
        }

        $files = [];

        foreach (explode("\n", rtrim($status, "\n")) as $line) {
            if (strlen($line) < 4) {
                continue;
            }

            $path = trim(substr($line, 3));

            if ($path === '') {
                continue;
            }

            if (str_contains($path, ' -> ')) {
                $parts = explode(' -> ', $path);
                $path = trim((string) end($parts));
            }

            $files[] = $path;
        }

        return array_values(array_unique($files));
    }

    /**
     * @param list<string> $files
     */
    private function quoteFiles(array $files): string
    {
        if ($files === []) {
            return '.';
        }

        return implode(' ', array_map(static fn (string $file): string => escapeshellarg($file), $files));
    }
}
