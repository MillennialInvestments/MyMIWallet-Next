<?php

namespace App\Services\AIOps;

class GitHubPRService
{
    public function createPRFromReadyDir(int $id, string $branch, string $readyDir, string $risk, array $gov): ?string
    {
        $token = getenv('GITHUB_TOKEN') ?: '';
        $owner = getenv('GITHUB_OWNER') ?: '';
        $repo  = getenv('GITHUB_REPO') ?: '';
        $base  = getenv('GITHUB_BASE_BRANCH') ?: 'main';

        if (!$token || !$owner || !$repo) {
            log_message('error', "GitHubPRService missing env vars (GITHUB_TOKEN/OWNER/REPO).");
            return null;
        }

        if (!is_dir($readyDir)) {
            log_message('error', "GitHubPRService readyDir missing: {$readyDir}");
            return null;
        }

        // Safety: avoid running if repo is not a git repo
        if (!is_dir(ROOTPATH . '.git')) {
            log_message('error', 'GitHubPRService: ROOTPATH is not a git repo');
            return null;
        }

        // Ensure clean state (basic)
        $status = trim((string) shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git status --porcelain'));
        if ($status !== '') {
            log_message('warning', 'GitHubPRService: working tree not clean; committing anyway.');
        }

        // Create branch
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git checkout ' . escapeshellarg($base) . ' 2>&1');
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git pull origin ' . escapeshellarg($base) . ' 2>&1');
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git checkout -B ' . escapeshellarg($branch) . ' 2>&1');

        // Commit ready artifacts (you can change this to commit actual patches once you apply them)
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git add ' . escapeshellarg($this->relativePath($readyDir)) . ' 2>&1');

        $title = $this->buildTitle($id, $risk, $gov);
        $body  = $this->buildBody($id, $readyDir, $risk, $gov);

        $msg = escapeshellarg($title);
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git commit -m ' . $msg . ' 2>&1');

        // Push
        shell_exec('cd ' . escapeshellarg(ROOTPATH) . ' && git push -u origin ' . escapeshellarg($branch) . ' 2>&1');

        // Create PR via GitHub API
        $api = "https://api.github.com/repos/{$owner}/{$repo}/pulls";
        $payload = json_encode([
            'title' => $title,
            'head'  => $branch,
            'base'  => $base,
            'body'  => $body,
        ], JSON_UNESCAPED_SLASHES);

        $cmd = "curl -sS -X POST "
            . "-H " . escapeshellarg("Authorization: token {$token}") . " "
            . "-H " . escapeshellarg("User-Agent: MyMI-AIOps") . " "
            . "-H " . escapeshellarg("Accept: application/vnd.github+json") . " "
            . "-d " . escapeshellarg($payload) . " "
            . escapeshellarg($api);

        $resp = (string) shell_exec($cmd);
        $json = json_decode($resp, true);

        if (!is_array($json) || empty($json['html_url'])) {
            log_message('error', 'GitHubPRService PR create failed: ' . substr($resp, 0, 500));
            return null;
        }

        return (string) $json['html_url'];
    }

    private function buildTitle(int $id, string $risk, array $gov): string
    {
        $manual = $gov['requires_manual_review'] ? 'manual-review' : 'auto';
        return "AIOps #{$id} ({$manual}, risk={$risk}, gov={$gov['score']})";
    }

    private function buildBody(int $id, string $readyDir, string $risk, array $gov): string
    {
        $manual = $gov['requires_manual_review'] ? 'YES' : 'NO';
        $rel = $this->relativePath($readyDir);

        return <<<MD
## AIOps Instruction #{$id}

- Risk: **{$risk}**
- Governance Score: **{$gov['score']}**
- Manual Review Required: **{$manual}**

Artifacts staged in: `{$rel}`

### Reviewer Notes
- This PR currently commits AIOps-ready artifacts (targets/pr scaffold/diff artifact).
- Apply/validate actual code patches from `{$rel}/patch/` before merge if present.
MD;
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