<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use App\Models\AIOps\AIOpsRepositoryModel;

class RepositoryRegistryService
{
    public function __construct(private ?AIOpsRepositoryModel $repositories = null)
    {
        $this->repositories ??= new AIOpsRepositoryModel();
    }

    public function register(array $data): array
    {
        $path = (string) ($data['local_path'] ?? '');
        $remote = (string) ($data['git_remote'] ?? $this->readGitRemote($path));
        [$owner, $repo] = $this->parseGithubRemote($remote);
        $ci4 = $this->detectCi4($path);
        $row = array_merge([
            'repo_key' => $this->normalizeRepoKey((string) ($data['repo_key'] ?? basename($path ?: ($repo ?: 'repo')))),
            'display_name' => (string) ($data['display_name'] ?? basename($path ?: ($repo ?: 'Repository'))),
            'company_key' => $data['company_key'] ?? null,
            'domain' => $data['domain'] ?? null,
            'local_path' => $path ?: null,
            'git_remote' => $remote ?: null,
            'github_owner' => $owner,
            'github_repo' => $repo,
            'default_branch' => $data['default_branch'] ?? $this->readGitBranch($path) ?? 'main',
            'ci4_detected' => $ci4 ? 1 : 0,
            'php_version' => $this->detectPhpVersion($path),
            'access_mode' => $data['access_mode'] ?? $this->determineAccessMode($path, $remote),
            'agent_base_url' => $data['agent_base_url'] ?? null,
            'agent_status' => $data['agent_status'] ?? 'not_configured',
            'last_health_status' => $data['last_health_status'] ?? null,
            'is_active' => 1,
        ], $data);
        $id = $this->repositories->upsertByRepoKey($row);
        $row['id'] = $id;
        return $row;
    }

    public function normalizeRepoKey(string $key): string
    {
        $key = strtolower(trim($key));
        $key = (string) preg_replace('/[^a-z0-9]+/', '-', $key);
        return trim($key, '-') ?: 'repository';
    }

    public function determineAccessMode(string $path, string $remote = ''): string
    {
        if ($path !== '' && is_dir($path) && is_dir($path . '/.git')) {
            return 'local_filesystem';
        }
        if ($path !== '' && is_dir($path)) {
            return $remote !== '' ? 'github_only' : 'local_filesystem';
        }
        return $remote !== '' ? 'github_only' : 'unavailable';
    }

    public function resolveKeyForRemote(string $remoteUrl): ?string
    {
        $remoteUrl = trim($remoteUrl);
        if ($remoteUrl === '') {
            return null;
        }
        [$owner, $repo] = $this->parseGithubRemote($remoteUrl);
        if ($owner === '' || $repo === '') {
            return null;
        }
        $row = $this->repositories
            ->where('github_owner', $owner)
            ->where('github_repo', $repo)
            ->where('is_active', 1)
            ->first();
        return is_array($row) ? ((string) ($row['repo_key'] ?? '') ?: null) : null;
    }

    public function parseGithubRemote(string $remote): array
    {
        if (preg_match('~github\.com[:/]([^/]+)/([^/.]+)(?:\.git)?~i', $remote, $m) === 1) {
            return [$m[1], $m[2]];
        }
        return [null, null];
    }

    public function detectCi4(string $path): bool
    {
        return $path !== '' && is_file($path . '/composer.json') && is_file($path . '/spark') && is_dir($path . '/app/Config') && is_dir($path . '/writable');
    }

    public function detectPhpVersion(string $path): ?string
    {
        if ($path !== '' && is_file($path . '/composer.json')) {
            $json = json_decode((string) file_get_contents($path . '/composer.json'), true);
            if (is_array($json) && isset($json['require']['php'])) {
                return (string) $json['require']['php'];
            }
        }
        return PHP_VERSION;
    }

    private function readGitRemote(string $path): string
    {
        $config = $path !== '' ? $path . '/.git/config' : '';
        if (! is_file($config)) return '';
        $text = (string) file_get_contents($config);
        return preg_match('/url\s*=\s*(.+)/', $text, $m) === 1 ? trim($m[1]) : '';
    }

    private function readGitBranch(string $path): ?string
    {
        $head = $path !== '' ? $path . '/.git/HEAD' : '';
        if (! is_file($head)) return null;
        $text = trim((string) file_get_contents($head));
        return str_starts_with($text, 'ref: refs/heads/') ? substr($text, 16) : null;
    }
}
