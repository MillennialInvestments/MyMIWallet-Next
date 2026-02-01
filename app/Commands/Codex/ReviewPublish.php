<?php

declare(strict_types=1);

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use App\Libraries\MyMIDiscord;
use CodeIgniter\CLI\CLI;

class ReviewPublish extends SafeBaseCommand
{
    protected $group       = 'codex';
    protected $name        = 'codex:review:publish';
    protected $description = 'Publish Codex review summaries to Discord or GitHub PR comments.';
    protected $usage       = 'codex:review:publish --latest|--date=YYYY-MM-DD [--discord] [--pr] [--all] [--dry-run]';

    protected $options = [
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
            CLI::error('Specify --latest or --date=YYYY-MM-DD.');
            return EXIT_ERROR;
        }

        $targets = $this->resolveTargets($flags);
        if ($targets === []) {
            CLI::error('Choose --discord, --pr, or --all.');
            return EXIT_ERROR;
        }

        $reviewPath = ROOTPATH . 'docs/codex/reviews/review-' . $date . '.md';
        if (! is_file($reviewPath)) {
            CLI::error('Missing review artifact: ' . $reviewPath);
            return EXIT_ERROR;
        }

        $review = file_get_contents($reviewPath);
        if ($review === false || trim($review) === '') {
            CLI::error('Review file unreadable or empty.');
            return EXIT_ERROR;
        }

        $summary     = $this->extractSection($review, 'Summary of changes');
        $changed     = $this->extractSection($review, 'Changed files in lookback');
        $docsDrift   = $this->extractSection($review, 'Docs drift');
        $riskAreas   = $this->extractSection($review, 'Risk areas');

        $riskFlags = $this->limitLines($riskAreas, 5);

        $payload = [
            'date' => $date,
            'severity' => empty($riskFlags) ? 'info' : 'warning',
            'changed_files_count' => $this->countNonEmptyLines($changed),
            'summary' => $this->limitLines($summary, 5),
            'docs_drift' => $docsDrift !== '' ? $docsDrift : 'No docs drift detected.',
            'risk_flags' => $riskFlags,
        ];

        if ($dryRun) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT), 'blue');
            return EXIT_SUCCESS;
        }

        if (in_array('discord', $targets, true) && ! $this->publishDiscord($payload)) {
            return EXIT_ERROR;
        }

        if (in_array('pr', $targets, true) && ! $this->publishPullRequest($payload)) {
            return EXIT_ERROR;
        }

        CLI::write('Codex review published for ' . $date, 'green');
        return EXIT_SUCCESS;
    }

    /* ---------------- Targets ---------------- */

    private function resolveTargets(array $flags): array
    {
        if (isset($flags['all'])) {
            return ['discord', 'pr'];
        }

        $targets = [];
        if (isset($flags['discord'])) $targets[] = 'discord';
        if (isset($flags['pr'])) $targets[] = 'pr';

        return $targets;
    }

    private function resolveTargetDate(array $flags): ?string
    {
        if (isset($flags['latest'])) {
            return $this->findLatestDate();
        }

        foreach (array_keys($flags) as $flag) {
            if (str_starts_with($flag, 'date=')) {
                $date = substr($flag, 5);
                return preg_match('/^\d{4}-\d{2}-\d{2}$/', $date) ? $date : null;
            }
        }

        return null;
    }

    private function findLatestDate(): ?string
    {
        $files = glob(ROOTPATH . 'docs/codex/reviews/review-*.md') ?: [];
        rsort($files);

        if (! $files) {
            return null;
        }

        if (preg_match('/review-(\d{4}-\d{2}-\d{2})\.md$/', $files[0], $m)) {
            return $m[1];
        }

        return null;
    }

    /* ---------------- Discord ---------------- */

    private function publishDiscord(array $payload): bool
    {
        $webhook = env('DISCORD_ALERT_WEBHOOK');
        if (! $webhook) {
            CLI::error('DISCORD_ALERT_WEBHOOK not configured.');
            return false;
        }

        $discord = new MyMIDiscord();
        return $discord->sendWebhookMessage(
            $webhook,
            ['content' => $this->renderDiscordMessage($payload)],
            'codex_review'
        );
    }

    private function renderDiscordMessage(array $payload): string
    {
        $out = [
            '🧾 **Codex Review (' . $payload['date'] . ')**',
            'Severity: **' . strtoupper($payload['severity']) . '**',
            'Changed files: ' . $payload['changed_files_count'],
        ];

        if ($payload['summary']) {
            $out[] = '';
            $out[] = '**Summary**';
            foreach ($payload['summary'] as $line) {
                $out[] = '- ' . $line;
            }
        }

        if ($payload['risk_flags']) {
            $out[] = '';
            $out[] = '**Risk Flags**';
            foreach ($payload['risk_flags'] as $flag) {
                $out[] = '- ' . $flag;
            }
        }

        return implode("\n", $out);
    }

    /* ---------------- GitHub PR ---------------- */

    private function publishPullRequest(array $payload): bool
    {
        if (! env('GITHUB_ACTIONS')) {
            return false;
        }

        $token = env('GITHUB_TOKEN');
        $repo  = env('GITHUB_REPOSITORY');
        $pr    = $this->resolvePullRequestNumber();

        if (! $token || ! $repo || ! $pr) {
            CLI::error('Missing GitHub PR context.');
            return false;
        }

        $url = "https://api.github.com/repos/{$repo}/issues/{$pr}/comments";

        $ctx = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => [
                    'Authorization: token ' . $token,
                    'User-Agent: MyMIWallet-Codex',
                    'Content-Type: application/json',
                ],
                'content' => json_encode(['body' => $this->renderPullRequestComment($payload)]),
            ],
        ]);

        return file_get_contents($url, false, $ctx) !== false;
    }

    private function renderPullRequestComment(array $payload): string
    {
        $out = [
            '## Codex Review (' . $payload['date'] . ')',
            '- Severity: **' . strtoupper($payload['severity']) . '**',
            '- Changed files: ' . $payload['changed_files_count'],
            '',
        ];

        foreach ($payload['summary'] as $line) {
            $out[] = '- ' . $line;
        }

        return implode("\n", $out);
    }

    private function resolvePullRequestNumber(): ?int
    {
        $path = env('GITHUB_EVENT_PATH');
        if ($path && is_file($path)) {
            $event = json_decode(file_get_contents($path), true);
            return $event['pull_request']['number'] ?? null;
        }

        return null;
    }

    /* ---------------- Helpers ---------------- */

    private function extractSection(string $content, string $heading): string
    {
        if (preg_match('/##\s+' . preg_quote($heading, '/') . '\s*\n(.*?)(\n##|\z)/s', $content, $m)) {
            return trim($m[1]);
        }
        return '';
    }

    private function limitLines(string $text, int $limit): array
    {
        return array_slice(
            array_filter(array_map('trim', preg_split('/\r?\n/', $text))),
            0,
            $limit
        );
    }

    private function countNonEmptyLines(string $text): int
    {
        return count(array_filter(array_map('trim', preg_split('/\r?\n/', $text))));
    }
}
