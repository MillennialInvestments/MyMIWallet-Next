<?php

namespace App\Services\AIOps;

class GitHubPRService
{
    private ?string $lastPrUrl = null;

    public function createFromPrReady(int $instructionId): bool
    {
        $readyDir = ROOTPATH . 'docs/_aiops/pr_ready/' . $instructionId;
        $targetsFile = $readyDir . '/targets.json';
        $prBodyFile = $readyDir . '/pr.md';

        if (!is_dir($readyDir) || !is_file($targetsFile) || !is_file($prBodyFile)) {
            log_message('error', "GitHubPRService createFromPrReady missing ready artifacts for #{$instructionId}");
            return false;
        }

        $token = getenv('GITHUB_TOKEN') ?: '';
        $owner = getenv('GITHUB_OWNER') ?: '';
        $repo  = getenv('GITHUB_REPO') ?: '';
        $base  = getenv('GITHUB_BASE_BRANCH') ?: 'main';

        if ($token === '' || $owner === '' || $repo === '') {
            log_message('error', 'GitHubPRService missing env vars (GITHUB_TOKEN/GITHUB_OWNER/GITHUB_REPO).');
            return false;
        }

        $branch = 'aiops/patch/' . $instructionId;
        $title = 'AIOps #' . $instructionId . ' deterministic PR';
        $body = (string) file_get_contents($prBodyFile);

        $targets = json_decode((string) file_get_contents($targetsFile), true);
        $fileCandidates = (array) ($targets['file_candidates'] ?? []);
        sort($fileCandidates, SORT_STRING);

        $addFiles = [$this->relativePath($readyDir)];
        foreach ($fileCandidates as $candidate) {
            $abs = ROOTPATH . ltrim((string) $candidate, '/');
            if (is_file($abs)) {
                $addFiles[] = ltrim((string) $candidate, '/');
            }
        }
        $addFiles = array_values(array_unique($addFiles));

        if (!$this->gitCheckoutAndBranch($base, $branch)) {
            return false;
        }

        foreach ($addFiles as $file) {
            shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git add ' . escapeshellarg($file) . ' 2>&1');
        }

        $status = trim((string) shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git status --porcelain'));
        if ($status === '') {
            log_message('warning', "GitHubPRService no changes to commit for #{$instructionId}");
            return false;
        }

        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git commit -m ' . escapeshellarg($title) . ' 2>&1');
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git push -u origin ' . escapeshellarg($branch) . ' 2>&1');

        $this->lastPrUrl = $this->createGithubPr($token, $owner, $repo, $title, $branch, $base, $body);
        return $this->lastPrUrl !== null;
    }

    public function getLastPrUrl(): ?string
    {
        return $this->lastPrUrl;
    }

    public function createPRFromReadyDir(int $id, string $branch, string $readyDir, string $risk, array $gov): ?string
    {
        if ($this->createFromPrReady($id)) {
            return $this->lastPrUrl;
        }

        return null;
    }

    private function gitCheckoutAndBranch(string $base, string $branch): bool
    {
        if (!is_dir(ROOTPATH . '.git')) {
            log_message('error', 'GitHubPRService: ROOTPATH is not a git repo');
            return false;
        }

        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git fetch origin ' . escapeshellarg($base) . ' 2>&1');
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git checkout ' . escapeshellarg($base) . ' 2>&1');
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git pull origin ' . escapeshellarg($base) . ' 2>&1');
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git checkout -B ' . escapeshellarg($branch) . ' 2>&1');

        return true;
    }

    private function createGithubPr(string $token, string $owner, string $repo, string $title, string $head, string $base, string $body): ?string
    {
        $api = "https://api.github.com/repos/{$owner}/{$repo}/pulls";
        $payload = json_encode([
            'title' => $title,
            'head'  => $head,
            'base'  => $base,
            'body'  => $body,
        ], JSON_UNESCAPED_SLASHES);

        $cmd = "curl -sS -X POST "
            . "-H " . escapeshellarg("Authorization: token {$token}") . " "
            . "-H " . escapeshellarg('User-Agent: MyMI-AIOps') . " "
            . "-H " . escapeshellarg('Accept: application/vnd.github+json') . " "
            . "-d " . escapeshellarg((string) $payload) . " "
            . escapeshellarg($api);

        $resp = (string) shell_exec($cmd);
        $json = json_decode($resp, true);
        if (!is_array($json) || empty($json['html_url'])) {
            log_message('error', 'GitHubPRService PR create failed: ' . substr($resp, 0, 500));
            return null;
        }

        return (string) $json['html_url'];
    }

    private function relativePath(string $abs): string
    {
        $root = rtrim(ROOTPATH, '/');
        if (str_starts_with($abs, $root)) {
            return ltrim(substr($abs, strlen($root)), '/');
        }

        return $abs;
    }
}
