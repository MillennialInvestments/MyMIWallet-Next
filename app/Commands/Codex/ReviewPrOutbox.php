<?php

declare(strict_types=1);

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ReviewPrOutbox extends SafeBaseCommand
{
    protected $group = 'codex';
    protected $name = 'codex:review:pr-outbox';
    protected $description = 'Review the latest PR outbox bundle and publish CODEX_REVIEW.md.';
    protected $usage = 'codex:review:pr-outbox [--dry-run]';

    protected $options = [
        '--dry-run' => 'Preview review output without writing.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $bundleDir = $this->findLatestBundle();
        if ($bundleDir === null) {
            CLI::error('No PR outbox bundle found in docs/_aiops/pr_outbox.');
            return EXIT_ERROR;
        }

        $patchPath = $bundleDir . '/PATCH.diff';
        $patchContent = is_file($patchPath) ? file_get_contents($patchPath) : '';
        $paths = $patchContent ? $this->extractPatchPaths($patchContent) : [];

        $violations = $this->detectViolations($paths, $patchContent ?? '');

        $lines = [
            '# Codex PR Outbox Review',
            '',
            '- Bundle: ' . str_replace(ROOTPATH, '', $bundleDir),
            '- Reviewed at: ' . date('c'),
            '',
            '## Guardrail Findings',
        ];

        if ($violations === []) {
            $lines[] = '- ✅ No governance violations detected.';
        } else {
            foreach ($violations as $violation) {
                $lines[] = '- ❌ ' . $violation;
            }
        }

        $lines[] = '';
        $lines[] = '## Files Touched';
        $lines[] = '';
        if ($paths === []) {
            $lines[] = '- No patch file found or no files listed.';
        } else {
            foreach ($paths as $path) {
                $lines[] = '- ' . $path;
            }
        }
        $lines[] = '';

        $review = implode(PHP_EOL, $lines) . PHP_EOL;

        if ($dryRun) {
            CLI::write($review, 'blue');
            return EXIT_SUCCESS;
        }

        file_put_contents($bundleDir . '/CODEX_REVIEW.md', $review);
        CLI::write('CODEX_REVIEW.md written to ' . $bundleDir, 'green');

        return EXIT_SUCCESS;
    }

    private function findLatestBundle(): ?string
    {
        $baseDir = ROOTPATH . 'docs/_aiops/pr_outbox';
        if (! is_dir($baseDir)) {
            return null;
        }

        $dirs = glob($baseDir . '/*', GLOB_ONLYDIR) ?: [];
        $latest = null;
        $latestMtime = 0;
        foreach ($dirs as $dir) {
            $mtime = filemtime($dir) ?: 0;
            if ($mtime > $latestMtime) {
                $latestMtime = $mtime;
                $latest = $dir;
            }
        }

        return $latest;
    }

    /**
     * @return array<int, string>
     */
    private function extractPatchPaths(string $content): array
    {
        preg_match_all('/^\+\+\+ b\/(.+)$/m', $content, $matches);
        $paths = $matches[1] ?? [];

        return array_values(array_unique($paths));
    }

    /**
     * @return array<int, string>
     */
    private function detectViolations(array $paths, string $patchContent): array
    {
        $violations = [];

        foreach ($paths as $path) {
            if (str_starts_with($path, 'app/Config/') || str_starts_with($path, 'config/')) {
                $violations[] = 'Config edits detected: ' . $path;
            }
            if (str_starts_with($path, 'app/Commands/')) {
                $violations[] = 'New or modified command detected: ' . $path;
            }
        }

        if (count($paths) > 10) {
            $violations[] = 'Risky refactor: patch touches more than 10 files.';
        }

        if (preg_match('/^rename from /m', $patchContent)) {
            $violations[] = 'Risky refactor: file renames detected.';
        }

        return $violations;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
