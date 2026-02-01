<?php

declare(strict_types=1);

namespace App\Commands\Support;

use CodeIgniter\CLI\CLI;

class GitHubIssueHelper
{
    /**
     * @param array<int, array{title: string, body: string, file: string}> $issues
     */
    public static function publishIssues(array $issues, string $fallbackDir): void
    {
        if ($issues === []) {
            return;
        }

        $token = getenv('GITHUB_TOKEN') ?: '';
        $repo = getenv('GITHUB_REPOSITORY') ?: '';

        if ($token !== '' && $repo !== '') {
            $allSucceeded = true;
            foreach ($issues as $issue) {
                $ok = self::postIssue($repo, $token, $issue['title'], $issue['body']);
                if (! $ok) {
                    $allSucceeded = false;
                }
            }

            if ($allSucceeded) {
                return;
            }
        }

        self::writeIssueArtifacts($issues, $fallbackDir);
    }

    private static function postIssue(string $repo, string $token, string $title, string $body): bool
    {
        $url = "https://api.github.com/repos/{$repo}/issues";
        $payload = json_encode(['title' => $title, 'body' => $body]);
        if ($payload === false) {
            return false;
        }

        $ctx = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => [
                    'Authorization: token ' . $token,
                    'User-Agent: MyMIWallet-Codex',
                    'Content-Type: application/json',
                    'Accept: application/vnd.github+json',
                ],
                'content' => $payload,
                'timeout' => 10,
            ],
        ]);

        $result = @file_get_contents($url, false, $ctx);
        return $result !== false;
    }

    /**
     * @param array<int, array{title: string, body: string, file: string}> $issues
     */
    private static function writeIssueArtifacts(array $issues, string $fallbackDir): void
    {
        $rootedDir = str_starts_with($fallbackDir, WRITEPATH)
            ? $fallbackDir
            : WRITEPATH . ltrim($fallbackDir, '/');

        if (! str_contains($rootedDir, 'aiops/artifacts/github-issues')) {
            CLI::error('Fallback issue directory must be inside WRITEPATH/aiops/artifacts/github-issues.');
            return;
        }

        if (! is_dir($rootedDir)) {
            mkdir($rootedDir, 0775, true);
        }

        $timestamp = gmdate('Ymd-His');
        foreach ($issues as $index => $issue) {
            $safeName = preg_replace('/[^a-z0-9\-_.]+/i', '-', $issue['file'] ?? 'unknown');
            $path = sprintf('%s/issue-%s-%02d-%s.json', rtrim($rootedDir, '/'), $timestamp, $index + 1, $safeName);
            $payload = json_encode([
                'title' => $issue['title'],
                'body' => $issue['body'],
                'file' => $issue['file'],
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

            if ($payload === false) {
                continue;
            }

            file_put_contents($path, $payload . PHP_EOL);
        }
    }
}
