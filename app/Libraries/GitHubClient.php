<?php

namespace App\Libraries;

class GitHubClient
{
    private string $token;
    private string $owner;
    private string $repo;

    public function __construct()
    {
        $this->token = (string) getenv('AIOPS_GITHUB_TOKEN');
        $this->owner = (string) getenv('AIOPS_GITHUB_OWNER');
        $this->repo  = (string) getenv('AIOPS_GITHUB_REPO');
    }

    public function isConfigured(): bool
    {
        return $this->token !== '' && $this->owner !== '' && $this->repo !== '';
    }

    public function createPullRequest(string $title, string $headBranch, string $baseBranch, string $body = '', array $labels = []): array
    {
        $payload = [
            'title' => $title,
            'head'  => $headBranch,
            'base'  => $baseBranch,
            'body'  => $body,
        ];

        $pr = $this->request('POST', "/repos/{$this->owner}/{$this->repo}/pulls", $payload);
        if (!$pr['ok']) return $pr;

        $number = $pr['data']['number'] ?? null;

        if ($number && !empty($labels)) {
            $this->request('POST', "/repos/{$this->owner}/{$this->repo}/issues/{$number}/labels", [
                'labels' => $labels
            ]);
        }

        return $pr;
    }

    private function request(string $method, string $path, array $payload = null): array
    {
        $url = "https://api.github.com{$path}";

        $ch = curl_init($url);

        $headers = [
            'Accept: application/vnd.github+json',
            'User-Agent: MyMIWallet-AiOps',
            'Authorization: Bearer ' . $this->token,
        ];

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_TIMEOUT        => 60,
        ]);

        if ($payload !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $headers[] = 'Content-Type: application/json';
        }

        $raw = curl_exec($ch);
        $err = curl_error($ch);
        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($raw === false) {
            return ['ok' => false, 'error' => $err ?: 'curl_error', 'http' => $http, 'data' => null];
        }

        $decoded = json_decode($raw, true);

        if ($http >= 400) {
            $msg = $decoded['message'] ?? ('http_' . $http);
            return ['ok' => false, 'error' => $msg, 'http' => $http, 'data' => $decoded];
        }

        return ['ok' => true, 'error' => null, 'http' => $http, 'data' => $decoded];
    }
}
