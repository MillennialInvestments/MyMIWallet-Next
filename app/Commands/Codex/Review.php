<?php

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Review extends SafeBaseCommand
{
    protected $group       = 'Codex';
    protected $name        = 'codex:review';
    protected $description = 'Generate Codex review artifacts (summary + prompt payload)';
    protected $options     = [
        '--dry-run' => 'Preview actions without writing output files',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:codex:review] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $relativeDir = env('REVIEW_OUTPUT_DIR') ?: 'docs/codex/reviews';
        $outputDir   = rtrim(ROOTPATH . ltrim($relativeDir, '/'), '/');
        $docsRoot    = rtrim(ROOTPATH . 'docs', '/');

        if (! str_starts_with($outputDir, $docsRoot)) {
            CLI::error('Refusing to write outside /docs: ' . $outputDir);
            log_message('error', '[spark:codex:review] Blocked', ['output_dir' => $outputDir]);
            return EXIT_ERROR;
        }

        $lookback  = (int) (env('REVIEW_LOOKBACK_COMMITS') ?: 10);
        $today     = date('Y-m-d');

        if (! is_dir($outputDir) && ! mkdir($outputDir, 0775, true) && ! is_dir($outputDir)) {
            CLI::error('Unable to create review output directory: ' . $outputDir);
            log_message('error', '[spark:codex:review] Failed', ['reason' => 'Unable to create review output directory']);
            return EXIT_ERROR;
        }

        $status       = $this->execSafe('git status --short');
        $recentCommits = $this->execSafe(sprintf('git log -n %d --pretty="%%h %%s (%%cr)"', $lookback));
        $changedFiles  = $this->execSafe(sprintf('git diff --name-only HEAD~%d..HEAD', $lookback));
        $docsDrift     = $this->detectDocsDrift();

        $reviewPath = $outputDir . '/review-' . $today . '.md';
        $promptPath = $outputDir . '/review-prompt-' . $today . '.md';
        $this->guardDocsPath($reviewPath);
        $this->guardDocsPath($promptPath);

        if ($dryRun) {
            CLI::write('Dry-run enabled. Review files will not be written.', 'yellow');
        } else {
            file_put_contents($reviewPath, $this->renderReview($today, $status, $recentCommits, $changedFiles, $docsDrift));
            file_put_contents($promptPath, $this->renderPromptPayload($today, $status, $recentCommits, $changedFiles, $docsDrift));
        }

        CLI::write('Generated: ' . $reviewPath);
        CLI::write('Generated: ' . $promptPath);

        log_message('info', '[spark:codex:review] Completed', [
            'output_dir' => $outputDir,
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function execSafe(string $command): string
    {
        $output = [];
        $code   = 0;
        @exec($command, $output, $code);

        if ($code !== 0) {
            return 'Command failed: ' . $command;
        }

        return implode("\n", $output);
    }

    protected function detectDocsDrift(): string
    {
        $required = [
            'docs/cron/index.csv',
            'docs/chatgpt/prompt_templates.md',
            'docs/ops/control_plane_assumptions.md',
        ];

        $missing = array_filter($required, static fn ($path) => ! file_exists($path));

        if (! empty($missing)) {
            return 'Missing docs: ' . implode(', ', $missing);
        }

        return 'Docs present for cron index, prompt templates, and control plane assumptions.';
    }

    protected function renderReview(string $date, string $status, string $commits, string $files, string $docsDrift): string
    {
        return <<<MD
# Codex Review - {$date}

## Summary of changes
```
{$status}
```

## Recent commits (last batch)
```
{$commits}
```

## Changed files in lookback
```
{$files}
```

## Risk areas
- Review DB/schema modifications.
- Verify cron token auth coverage.

## Security checklist
- No secrets committed.
- Cron endpoints gated by Bearer token.

## Performance checklist
- Long-running crons remain idempotent.

## Routes changes check
- Inspect `app/Config/Routes.php` and Management module routes for new endpoints.

## DB/schema changes check
- Confirm migrations or SQL docs cover new tables.

## Recommended refactors
- Centralize Ops Inbox UI helpers.

## Suggested follow-up tasks
- Validate Ops Inbox UI with role gating.
- Add automated Docs Enforcement for cron DB.

## Docs drift
{$docsDrift}
MD;
    }

    protected function renderPromptPayload(string $date, string $status, string $commits, string $files, string $docsDrift): string
    {
        return <<<MD
# Codex Review Prompt - {$date}

## Inputs
- Git status:
```
{$status}
```
- Recent commits:
```
{$commits}
```
- Changed files:
```
{$files}
```
- Docs drift:
{$docsDrift}

## Ask
Generate a concise risk-aware review, flag missing docs or auth gaps, and propose next steps.
MD;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function guardDocsPath(string $file): void
    {
        $dir = realpath(dirname($file));
        if ($dir === false || ! str_starts_with($dir, rtrim(ROOTPATH, '/') . '/docs')) {
            throw new \RuntimeException('Refusing to write outside /docs');
        }
    }
}
