<?php

declare(strict_types=1);

namespace App\Services;

use RuntimeException;

class GitService
{
    private string $rootPath;

    public function __construct(?string $rootPath = null)
    {
        $this->rootPath = rtrim($rootPath ?? ROOTPATH, DIRECTORY_SEPARATOR);
    }

    public function status(): string
    {
        return $this->runGit(['status', '--short', '--branch']);
    }

    public function pull(?string $branch = null): string
    {
        $targetBranch = $branch ?? $this->currentBranch();
        $this->assertBranchName($targetBranch);

        return $this->runGit(['pull', '--rebase', 'origin', $targetBranch]);
    }

    public function push(?string $branch = null): string
    {
        $targetBranch = $branch ?? $this->currentBranch();
        $this->assertBranchName($targetBranch);

        return $this->runGit(['push', '-u', 'origin', $targetBranch]);
    }

    public function commit(string $message): string
    {
        $safeMessage = $this->sanitizeCommitMessage($message);

        $this->runGit(['add', '-A']);

        if (! $this->hasWorkingTreeChanges()) {
            $notice = 'No staged or unstaged changes detected; nothing to commit.';
            log_message('info', '[GIT] commit skipped: ' . $notice);
            return $notice;
        }

        return $this->runGit(['commit', '-m', $safeMessage]);
    }

    public function createBranch(string $name): string
    {
        $branch = trim($name);
        $this->assertBranchName($branch);

        return $this->runGit(['checkout', '-b', $branch]);
    }

    public function sync(string $message = 'auto sync'): string
    {
        $output = [];

        if ($this->hasWorkingTreeChanges()) {
            $output[] = $this->commit($message);
        } else {
            $output[] = 'Working tree clean; skipping commit step.';
            log_message('info', '[GIT] sync skipped commit: working tree clean');
        }

        $output[] = $this->pull();
        $output[] = $this->push();

        return implode(PHP_EOL . PHP_EOL, array_filter($output));
    }

    public function health(): string
    {
        $checks = [
            'git_available'     => trim($this->runRaw('git --version')),
            'inside_work_tree'  => trim($this->runGit(['rev-parse', '--is-inside-work-tree'])),
            'current_branch'    => $this->currentBranch(),
            'origin'            => trim($this->runGit(['remote', 'get-url', 'origin'])),
            'working_tree'      => $this->hasWorkingTreeChanges() ? 'dirty' : 'clean',
            'last_commit'       => trim($this->runGit(['log', '-1', '--pretty=format:%h %s'])),
        ];

        $lines = [];
        foreach ($checks as $label => $value) {
            $lines[] = sprintf('%s: %s', $label, $value === '' ? '[empty]' : $value);
        }

        return implode(PHP_EOL, $lines);
    }

    public function currentBranch(): string
    {
        $branch = trim($this->runGit(['branch', '--show-current']));

        if ($branch === '') {
            throw new RuntimeException('Unable to determine the current git branch.');
        }

        return $branch;
    }

    public function hasWorkingTreeChanges(): bool
    {
        return trim($this->runGit(['status', '--porcelain'])) !== '';
    }

    private function runGit(array $arguments): string
    {
        $command = 'cd ' . escapeshellarg($this->rootPath) . ' && git';

        foreach ($arguments as $argument) {
            $command .= ' ' . escapeshellarg($argument);
        }

        return $this->runRaw($command);
    }

    private function runRaw(string $command): string
    {
        $output = shell_exec($command . ' 2>&1');
        $output = is_string($output) ? trim($output) : '';

        log_message('info', '[GIT] ' . $command . ' => ' . $output);

        return $output;
    }

    private function sanitizeCommitMessage(string $message): string
    {
        $message = trim($message);
        $message = preg_replace('/[\r\n\t]+/', ' ', $message) ?? '';

        if ($message === '') {
            return 'auto commit';
        }

        return $message;
    }

    private function assertBranchName(string $branch): void
    {
        if (! preg_match('/^(?!\/)(?!.*\.\.)(?!.*\/$)[A-Za-z0-9._\/-]+$/', $branch)) {
            throw new RuntimeException('Invalid branch name provided.');
        }
    }
}
