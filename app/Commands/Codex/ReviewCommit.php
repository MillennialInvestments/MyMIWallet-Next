<?php

namespace App\Commands\Codex;

use CodeIgniter\CLI\CLI;

class ReviewCommit extends SafeBaseCommand
{
    protected $group       = 'codex';
    protected $name        = 'codex:review:commit';
    protected $description = 'Commit Codex review artifacts intentionally (latest or by date).';
    protected $usage       = 'codex:review:commit --latest|--date=YYYY-MM-DD [--dry-run] [--approve]';
    protected $options     = [
        '--latest' => 'Commit the latest review artifacts',
        '--date=YYYY-MM-DD' => 'Commit review artifacts for a specific date',
        '--dry-run' => 'Preview git commands without committing',
        '--approve' => 'Approve destructive changes (required for real commit)',
    ];

    protected $defaultDryRun = true;

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $date = $this->resolveTargetDate($flags);
        if ($date === null) {
            CLI::error('Specify --latest or --date=YYYY-MM-DD to choose a review to commit.');
            return EXIT_ERROR;
        }

        $files = $this->resolveReviewFiles($date);
        if (empty($files)) {
            CLI::error('No review artifacts found for ' . $date);
            return EXIT_ERROR;
        }

        if (! $this->guardCleanWorkingTree($files)) {
            return EXIT_ERROR;
        }

        foreach ($files as $file) {
            if (! file_exists($file)) {
                CLI::error('Missing review artifact: ' . $file);
                return EXIT_ERROR;
            }

            if (! $this->guardReviewPath($file)) {
                return EXIT_ERROR;
            }
        }

        $commands = [];
        foreach ($files as $file) {
            $commands[] = 'git add ' . escapeshellarg($file);
        }

        $commands[] = 'git commit -m ' . escapeshellarg('docs(codex): add review for ' . $date);

        if ($dryRun) {
            CLI::write('Dry-run enabled. No git commands executed.', 'yellow');
            foreach ($commands as $command) {
                CLI::write($command, 'blue');
            }
            return EXIT_SUCCESS;
        }

        foreach ($commands as $command) {
            [$code, $output] = $this->execGit($command);
            if ($code !== 0) {
                CLI::error('Git command failed: ' . $command);
                CLI::write($output, 'red');
                return EXIT_ERROR;
            }
        }

        CLI::write('Committed review artifacts for ' . $date, 'green');
        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }

    private function resolveTargetDate(array $flags): ?string
    {
        $dateFlag = $this->parseFlagValue($flags, 'date');
        if ($dateFlag !== null && $this->isValidDate($dateFlag)) {
            return $dateFlag;
        }

        if (isset($flags['latest'])) {
            $latest = $this->findLatestDate();
            if ($latest !== null) {
                return $latest;
            }
        }

        return null;
    }

    private function resolveReviewFiles(string $date): array
    {
        $dir = rtrim(ROOTPATH, '/') . '/docs/codex/reviews';
        $review = $dir . '/review-' . $date . '.md';
        $prompt = $dir . '/review-prompt-' . $date . '.md';

        return [$review, $prompt];
    }

    private function findLatestDate(): ?string
    {
        $dir = rtrim(ROOTPATH, '/') . '/docs/codex/reviews';
        $files = glob($dir . '/review-*.md') ?: [];
        rsort($files);

        foreach ($files as $file) {
            if (preg_match('/review-(\d{4}-\d{2}-\d{2})\.md$/', $file, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }

    private function parseFlagValue(array $flags, string $key): ?string
    {
        foreach (array_keys($flags) as $flag) {
            if (! str_starts_with($flag, $key . '=')) {
                continue;
            }

            $value = trim(substr($flag, strlen($key) + 1));
            if ($value !== '') {
                return $value;
            }
        }

        return null;
    }

    private function isValidDate(string $date): bool
    {
        return preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) === 1;
    }

    private function execGit(string $command): array
    {
        $output = [];
        $code = 0;
        @exec($command . ' 2>&1', $output, $code);
        return [$code, implode("\n", $output)];
    }

    private function guardCleanWorkingTree(array $files): bool
    {
        [$code, $output] = $this->execGit('git status --porcelain');
        if ($code !== 0) {
            CLI::error('Unable to read git status.');
            CLI::write($output, 'red');
            return false;
        }

        $allowed = array_map([$this, 'normalizePath'], $files);
        $lines = array_filter(preg_split('/\r?\n/', $output) ?: []);
        foreach ($lines as $line) {
            $path = $this->extractStatusPath($line);
            if ($path === '') {
                continue;
            }

            $normalized = $this->normalizePath($path);
            if (! $this->isAllowedStatusPath($normalized, $allowed)) {
                CLI::error('Working tree has unrelated changes: ' . $path);
                return false;
            }
        }

        return true;
    }

    private function extractStatusPath(string $line): string
    {
        if (strlen($line) < 4) {
            return '';
        }

        $path = trim(substr($line, 3));
        if (str_contains($path, ' -> ')) {
            $parts = explode(' -> ', $path);
            $path = end($parts) ?: $path;
        }

        return $path;
    }

    private function normalizePath(string $path): string
    {
        $normalized = str_replace('\\', '/', $path);
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/') . '/';
        if (str_starts_with($normalized, $root)) {
            $normalized = substr($normalized, strlen($root));
        }

        return ltrim($normalized, './');
    }

    private function isAllowedStatusPath(string $path, array $allowed): bool
    {
        foreach ($allowed as $file) {
            if ($path === $file) {
                return true;
            }
        }

        return str_starts_with($path, 'docs/codex/reviews/');
    }

    private function guardReviewPath(string $file): bool
    {
        $real = realpath($file);
        if ($real === false) {
            CLI::error('Unable to resolve review artifact path: ' . $file);
            return false;
        }

        $root = rtrim(ROOTPATH, '/');
        $reviewsRoot = $root . '/docs/codex/reviews';
        $publicRoot = $root . '/public';
        $writableRoot = $root . '/writable';

        if (! str_starts_with($real, $reviewsRoot . '/')) {
            CLI::error('Refusing to stage outside docs/codex/reviews: ' . $real);
            return false;
        }

        if (str_starts_with($real, $publicRoot) || str_starts_with($real, $writableRoot)) {
            CLI::error('Refusing to stage public/ or writable/ content: ' . $real);
            return false;
        }

        return true;
    }
}
