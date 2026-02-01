<?php

namespace App\Commands\Codex;

use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\CLI;

class ReviewPublish extends SafeBaseCommand
{
    protected $group       = 'codex';
    protected $name        = 'codex:review:publish';
    protected $description = 'Publish Codex review summaries to Discord or GitHub PR comments.';
    protected $usage       = 'codex:review:publish --latest|--date=YYYY-MM-DD [--discord] [--pr] [--all] [--dry-run]';
    protected $options     = [
        '--latest' => 'Publish the latest review artifacts',
        '--date=YYYY-MM-DD' => 'Publish review artifacts for a specific date',
        '--discord' => 'Send the review summary to Discord',
        '--pr' => 'Post the review summary as a GitHub PR comment',
        '--all' => 'Publish to all configured targets',
        '--dry-run' => 'Preview payloads without sending',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $date = $this->resolveTargetDate($flags);
        if ($date === null) {
            CLI::error('Specify --latest or --date=YYYY-MM-DD to choose a review to publish.');
            return EXIT_ERROR;
        }

        $targets = $this->resolveTargets($flags);
        if ($targets === []) {
            CLI::error('Choose at least one target: --discord, --pr, or --all.');
            return EXIT_ERROR;
        }

        $reviewPath = rtrim(ROOTPATH, '/') . '/docs/codex/reviews/review-' . $date . '.md';
        if (! is_file($reviewPath)) {
            CLI::error('Missing review artifact: ' . $reviewPath);
            return EXIT_ERROR;
        }

        $review = $this->readFile($reviewPath);
        if ($review === '') {
            CLI::error('Unable to read review artifact: ' . $reviewPath);
            return EXIT_ERROR;
        }

        $summary = $this->extractSection($review, 'Summary of changes');
        $changedFiles = $this->extractSection($review, 'Changed files in lookback');
        $docsDrift = $this->extractSection($review, 'Docs drift');
        $riskAreas = $this->extractSection($review, 'Risk areas');

        $summaryLines = $this->limitLines($summary, 5);
        $changedCount = $this->countNonEmptyLines($changedFiles);
        $riskFlags = $this->limitLines($riskAreas, 5);

        $payload = [
            'date' => $date,
            'summary' => $summaryLines,
            'docs_drift' => $docsDrift !== '' ? $docsDrift : 'No docs drift section found.',
            'changed_files_count' => $changedCount,
            'risk_flags' => $riskFlags,
        ];

        if ($dryRun) {
            CLI::write('Dry-run enabled. Payloads will not be sent.', 'yellow');
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT), 'blue');
            return EXIT_SUCCESS;
        }

        if (in_array('discord', $targets, true)) {
            $result = $this->publishDiscord($payload);
            if (! $result) {
                return EXIT_ERROR;
            }
        }

        if (in_array('pr', $targets, true)) {
            $result = $this->publishPullRequest($payload);
            if (! $result) {
                return EXIT_ERROR;
            }
        }

        CLI::write('Publish completed for ' . $date, 'green');
        return EXIT_SUCCESS;
    }

    private function resolveTargets(array $flags): array
    {
        $targets = [];
        if (isset($flags['all'])) {
            $targets[] = 'discord';
            $targets[] = 'pr';
            return $targets;
        }

        if (isset($flags['discord'])) {
            $targets[] = 'discord';
        }

        if (isset($flags['pr'])) {
            $targets[] = 'pr';
        }

        return $targets;
    }

    private function resolveTargetDate(array $flags): ?string
    {
        $dateFlag = $this->parseFlagValue($flags, 'date');
        if ($dateFlag !== null && $this->isValidDate($dateFlag)) {
            return $dateFlag;
        }

        if (isset($flags['latest'])) {
            return $this->findLatestDate();
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

    private function publishDiscord(array $payload): bool
    {
        $webhook = env('DISCORD_ALERT_WEBHOOK');
        if (! $webhook) {
            CLI::error('DISCORD_ALERT_WEBHOOK is not configured.');
            return false;
        }

        $message = $this->renderDiscordMessage($payload);

        $discord = new MyMIDiscord();
        $sent = $discord->sendWebhookMessage($webhook, ['content' => $message], 'codex_review');

        if (! $sent) {
            CLI::error('Failed to dispatch Discord message.');
            return false;
        }

        CLI::write('Discord message queued.', 'green');
        return true;
    }

    private function publishPullRequest(array $payload): bool
    {
        if (! $this->isCiEnvironment()) {
            CLI::error('PR comments are only available in CI.');
            return false;
        }

        $token = env('GITHUB_TOKEN');
        $repo = env('GITHUB_REPOSITORY');
        if (! $token || ! $repo) {
            CLI::error('GITHUB_TOKEN or GITHUB_REPOSITORY is not configured.');
            return false;
        }

        $prNumber = $this->resolvePullRequestNumber();
        if ($prNumber === null) {
            CLI::error('Unable to detect PR number from GitHub environment.');
            return false;
        }

        $body = $this->renderPullRequestComment($payload);
        $url = 'https://api.github.com/repos/' . $repo . '/issues/' . $prNumber . '/comments';

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Content-Type: application/json',
                    'Authorization: token ' . $token,
                    'User-Agent: MyMIWallet-Codex',
                ],
                'content' => json_encode(['body' => $body]),
                'timeout' => 8,
            ],
        ]);

        $result = @file_get_contents($url, false, $context);
        if ($result === false) {
            CLI::error('Failed to post PR comment.');
            return false;
        }

        CLI::write('PR comment posted to #' . $prNumber, 'green');
        return true;
    }

    private function isCiEnvironment(): bool
    {
        return (bool) (env('CI') ?: env('GITHUB_ACTIONS'));
    }

    private function resolvePullRequestNumber(): ?int
    {
        $eventPath = env('GITHUB_EVENT_PATH');
        if ($eventPath && is_file($eventPath)) {
            $raw = @file_get_contents($eventPath);
            if ($raw !== false) {
                $event = json_decode($raw, true);
                if (isset($event['pull_request']['number'])) {
                    return (int) $event['pull_request']['number'];
                }
                if (isset($event['issue']['number'])) {
                    return (int) $event['issue']['number'];
                }
            }
        }

        $ref = env('GITHUB_REF');
        if ($ref && preg_match('#refs/pull/(\d+)/#', $ref, $matches)) {
            return (int) $matches[1];
        }

        return null;
    }

    private function extractSection(string $content, string $heading): string
    {
        $pattern = '/##\s+' . preg_quote($heading, '/') . '\s*\n```\n(.*?)\n```/s';
        if (preg_match($pattern, $content, $matches)) {
            return trim($matches[1]);
        }

        $pattern = '/##\s+' . preg_quote($heading, '/') . '\s*\n([^#]+)/s';
        if (preg_match($pattern, $content, $matches)) {
            return trim($matches[1]);
        }

        return '';
    }

    private function limitLines(string $text, int $limit): array
    {
        if ($text === '') {
            return [];
        }

        $lines = preg_split('/\r?\n/', $text);
        $lines = array_values(array_filter(array_map('trim', $lines), static fn($line) => $line !== ''));

        return array_slice($lines, 0, $limit);
    }

    private function countNonEmptyLines(string $text): int
    {
        if ($text === '') {
            return 0;
        }

        $lines = preg_split('/\r?\n/', $text);
        $lines = array_values(array_filter(array_map('trim', $lines), static fn($line) => $line !== ''));

        return count($lines);
    }

    private function renderDiscordMessage(array $payload): string
    {
        $lines = [];
        $lines[] = '🧾 **Codex Review (' . $payload['date'] . ')**';
        $lines[] = 'Changed files: ' . $payload['changed_files_count'];

        if (! empty($payload['summary'])) {
            $lines[] = '';
            $lines[] = '**Summary**';
            foreach ($payload['summary'] as $line) {
                $lines[] = '- ' . $line;
            }
        }

        if (! empty($payload['docs_drift'])) {
            $lines[] = '';
            $lines[] = '**Docs drift**';
            $lines[] = $payload['docs_drift'];
        }

        if (! empty($payload['risk_flags'])) {
            $lines[] = '';
            $lines[] = '**Risk flags**';
            foreach ($payload['risk_flags'] as $flag) {
                $lines[] = '- ' . $flag;
            }
        }

        return implode("\n", $lines);
    }

    private function renderPullRequestComment(array $payload): string
    {
        $lines = [];
        $lines[] = '## Codex Review (' . $payload['date'] . ')';
        $lines[] = '';
        $lines[] = '- **Changed files:** ' . $payload['changed_files_count'];

        if (! empty($payload['summary'])) {
            $lines[] = '';
            $lines[] = '**Summary**';
            foreach ($payload['summary'] as $line) {
                $lines[] = '- ' . $line;
            }
        }

        if (! empty($payload['docs_drift'])) {
            $lines[] = '';
            $lines[] = '**Docs drift**';
            $lines[] = $payload['docs_drift'];
        }

        if (! empty($payload['risk_flags'])) {
            $lines[] = '';
            $lines[] = '**Risk flags**';
            foreach ($payload['risk_flags'] as $flag) {
                $lines[] = '- ' . $flag;
            }
        }

        return implode("\n", $lines);
    }

    private function readFile(string $path): string
    {
        $contents = @file_get_contents($path);
        if ($contents === false) {
            return '';
        }

        return $contents;
    }
}
