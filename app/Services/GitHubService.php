<?php

declare(strict_types=1);

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use RuntimeException;

class GitHubService
{
    private Client $client;
    private string $token;
    private string $repo;
    private string $baseBranch;

    public function __construct(?Client $client = null)
    {
        $this->token = trim((string) getenv('GITHUB_TOKEN'));
        $this->repo = trim((string) getenv('GITHUB_REPO'));
        $this->baseBranch = trim((string) getenv('GITHUB_BASE_BRANCH')) ?: 'main';

        $this->client = $client ?? new Client([
            'base_uri' => 'https://api.github.com/',
            'headers' => [
                'Authorization' => 'token ' . $this->token,
                'Accept' => 'application/vnd.github+json',
                'User-Agent' => 'MyMIWallet-GitControl',
            ],
            'timeout' => 20,
        ]);
    }

    public function createPullRequest(string $title, string $branch, ?string $body = null, ?string $baseBranch = null): array
    {
        $this->assertConfigured();

        $payload = [
            'title' => trim($title) !== '' ? trim($title) : 'Auto PR',
            'head' => $branch,
            'base' => $baseBranch ?: $this->baseBranch,
            'body' => $body ?? 'Automated pull request generated from MyMI Wallet Spark Git control.',
        ];

        try {
            $response = $this->client->post('repos/' . $this->repo . '/pulls', [
                'json' => $payload,
            ]);
        } catch (GuzzleException $e) {
            log_message('error', '[GitHub] createPullRequest failed: ' . $e->getMessage());
            throw new RuntimeException('GitHub PR creation failed: ' . $e->getMessage(), 0, $e);
        }

        $decoded = json_decode((string) $response->getBody(), true);

        if (! is_array($decoded)) {
            throw new RuntimeException('GitHub PR creation returned an unreadable response.');
        }

        log_message('info', '[GitHub] PR created for ' . $branch . ' => ' . ($decoded['html_url'] ?? '[missing-url]'));

        return $decoded;
    }

    private function assertConfigured(): void
    {
        if ($this->token === '') {
            throw new RuntimeException('Missing GITHUB_TOKEN environment variable.');
        }

        if (! preg_match('#^[A-Za-z0-9_.-]+/[A-Za-z0-9_.-]+$#', $this->repo)) {
            throw new RuntimeException('GITHUB_REPO must be set as owner/repo.');
        }
    }
}
