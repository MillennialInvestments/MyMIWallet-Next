<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use Config\AiOps;

class ManualPriorityRunner
{
    private AiOps $config;

    public function __construct(?AiOps $config = null)
    {
        $this->config = $config ?? config('AiOps');
    }

    /**
     * @param array<string,mixed> $options
     * @return array<string,mixed>
     */
    public function run(array $options = []): array
    {
        $startedAt = gmdate('c');
        $state = $this->loadStates();
        $tasks = $this->loadTasks((string) ($options['only'] ?? ''));
        $latestLog = $this->latestErrorLog();
        $activeSignatures = $this->extractSignatures($latestLog['content']);

        $this->updateErrorSignatureState($state['error'], $activeSignatures);
        $taskResults = [];

        $taskLimit = (int) ($options['limitTasks'] ?? $this->config->defaultTaskLimit);
        $errorLimit = max(1, (int) ($options['limitErrors'] ?? $this->config->defaultErrorLimit));
        $createPr = (bool) ($options['createPr'] ?? true);
        $dryRun = (bool) ($options['dryRun'] ?? false);
        $writeState = (bool) ($options['writeState'] ?? true);

        $pending = 0;
        foreach ($tasks as $task) {
            $indexRef = &$this->findOrCreateTaskIndex($state['task'], $task);
            if ($task['blocked']) {
                $indexRef['status'] = 'blocked';
                $indexRef['blocked_reason'] = $task['blocked_reason'];
                $taskResults[] = ['task' => $task['id'], 'status' => 'blocked', 'reason' => $task['blocked_reason']];
                continue;
            }

            if (($indexRef['checksum'] ?? '') !== $task['checksum']) {
                $indexRef['status'] = 'pending';
                $indexRef['checksum'] = $task['checksum'];
                $indexRef['last_changed_commit'] = $this->gitHead();
                if (($indexRef['pr_status'] ?? '') !== 'open') {
                    $indexRef['linked_pr'] = null;
                }
            }

            if (($indexRef['status'] ?? 'pending') === 'pending') {
                $pending++;
            }

            if ($pending > $taskLimit) {
                continue;
            }

            $matches = $this->matchTaskSignatures($task, $activeSignatures);
            if ($matches === []) {
                $taskResults[] = ['task' => $task['id'], 'status' => 'no-match'];
                continue;
            }

            $slice = array_slice($matches, 0, $errorLimit);
            $hash = hash('sha256', implode('|', $slice));

            if ($this->hasOpenPr($state['pr'], $task['id'], $hash)) {
                $taskResults[] = ['task' => $task['id'], 'status' => 'existing-open-pr'];
                continue;
            }

            if (! $createPr || $dryRun) {
                $taskResults[] = ['task' => $task['id'], 'status' => 'matched-no-pr', 'signatures' => $slice];
                continue;
            }

            $prResult = $this->createPr($task, $slice, $hash);
            $taskResults[] = ['task' => $task['id'], 'status' => $prResult['status'], 'pr_url' => $prResult['url'] ?? null];
            if ($prResult['status'] === 'pr-created') {
                $state['pr']['pull_requests'][] = [
                    'task_id' => $task['id'],
                    'task_file' => $task['file_rel'],
                    'signatures' => $slice,
                    'signatures_hash' => $hash,
                    'status' => 'open',
                    'pr_url' => $prResult['url'] ?? null,
                    'pr_number' => $prResult['number'] ?? null,
                    'branch' => $prResult['branch'] ?? null,
                    'created_at' => gmdate('c'),
                ];
                $indexRef['linked_pr'] = $prResult['url'] ?? null;
                $indexRef['pr_status'] = 'open';
                $indexRef['status'] = 'in_progress';
            } else {
                $indexRef['linked_pr'] = null;
                $indexRef['pr_status'] = 'failed';
                $indexRef['status'] = 'pending';
                log_message('error', 'AIOPS PR creation failed; task reset to pending', [
                    'task' => $task['id'],
                    'branch' => $prResult['branch'] ?? null,
                    'signatures' => $slice,
                ]);
                $taskResults[count($taskResults) - 1]['status'] = 'pr-failed-reset-pending';
            }
        }

        $completedTasks = $this->completeResolvedTasks($tasks, $state['task'], $activeSignatures);

        if ($writeState) {
            $this->atomicWriteJson($this->statePath('task-index.json'), $state['task']);
            $this->atomicWriteJson($this->statePath('pr-history.json'), $state['pr']);
            $this->atomicWriteJson($this->statePath('error-signatures.json'), $state['error']);
            $this->atomicWriteJson($this->statePath('run-meta.json'), [
                'last_run_at' => gmdate('c'),
                'latest_log' => $latestLog['path'] ?? null,
                'evaluated_signatures' => array_values(array_keys($activeSignatures)),
                'blocked_tasks' => array_values(array_filter($taskResults, static fn(array $row): bool => ($row['status'] ?? '') === 'blocked')),
            ]);
        }

        return [
            'started_at' => $startedAt,
            'latest_log' => $latestLog['path'] ?? null,
            'tasks_checked' => count($tasks),
            'results' => $taskResults,
            'completed_tasks' => $completedTasks,
        ];
    }

    /** @return array<string,mixed> */
    private function loadStates(): array
    {
        return [
            'task' => $this->loadStateFile('task-index.json', ['tasks' => []]),
            'pr' => $this->loadStateFile('pr-history.json', ['pull_requests' => []]),
            'error' => $this->loadStateFile('error-signatures.json', ['signatures' => []]),
        ];
    }

    /** @return array<string,mixed> */
    private function loadStateFile(string $file, array $fallback): array
    {
        $path = $this->statePath($file);
        if (! is_file($path)) {
            return $fallback;
        }

        $raw = (string) file_get_contents($path);
        $decoded = json_decode($raw, true);
        if (! is_array($decoded)) {
            rename($path, $path . '.broken.' . gmdate('YmdHis'));
            return $fallback;
        }

        return $decoded;
    }

    /** @return array<int,array<string,mixed>> */
    private function loadTasks(string $only = ''): array
    {
        $pattern = ROOTPATH . rtrim($this->config->manualPath, '/') . '/*.md';
        $files = glob($pattern) ?: [];
        sort($files);
        $tasks = [];

        foreach ($files as $file) {
            if ($only !== '' && basename($file) !== $only) {
                continue;
            }
            $content = (string) file_get_contents($file);
            $task = [
                'id' => pathinfo($file, PATHINFO_FILENAME),
                'file_abs' => $file,
                'file_rel' => str_replace(ROOTPATH, '', $file),
                'checksum' => hash('sha256', $content),
                'priority_number' => (int) (preg_match('/^(\d+)/', basename($file), $m) ? $m[1] : 99),
            ];

            $validation = $this->validateTaskMarkdown($content);
            $task['blocked'] = ! $validation['valid'];
            $task['blocked_reason'] = $validation['reason'];
            $task['target_errors'] = $validation['target_errors'];
            $tasks[] = $task;
        }

        return $tasks;
    }

    /** @return array{valid:bool,reason:?string,target_errors:array<int,string>} */
    private function validateTaskMarkdown(string $content): array
    {
        $required = ['# Priority:', '## Scope', '## Target Errors', '## Constraints', '## Completion Criteria'];
        foreach ($required as $heading) {
            if (stripos($content, $heading) === false) {
                return ['valid' => false, 'reason' => 'Missing heading: ' . $heading, 'target_errors' => []];
            }
        }

        preg_match('/##\s*Target Errors(.*?)(\n##\s|\z)/si', $content, $m);
        $targetBlock = $m[1] ?? '';
        preg_match_all('/^\s*-\s+(.+)$/m', $targetBlock, $tm);
        $targets = array_values(array_filter(array_map('trim', $tm[1] ?? [])));
        if ($targets === []) {
            return ['valid' => false, 'reason' => 'Target Errors must include at least one bullet', 'target_errors' => []];
        }

        preg_match('/##\s*Constraints(.*?)(\n##\s|\z)/si', $content, $cm);
        $constraints = strtolower(trim((string) ($cm[1] ?? '')));
        if (! str_contains($constraints, 'small pr')) {
            return ['valid' => false, 'reason' => 'Constraints must include Small PRs guidance', 'target_errors' => $targets];
        }

        return ['valid' => true, 'reason' => null, 'target_errors' => $targets];
    }

    /** @return array{path:?string,content:string} */
    private function latestErrorLog(): array
    {
        $patterns = [
            ROOTPATH . 'writable/logs/summary-*.log',
            ROOTPATH . rtrim($this->config->errorInputPath, '/') . '/summary-*.log',
            ROOTPATH . rtrim($this->config->errorInputPath, '/') . '/*',
        ];

        $files = [];
        foreach ($patterns as $pattern) {
            $matches = glob($pattern) ?: [];
            foreach ($matches as $match) {
                $files[] = $match;
            }
            if ($files !== []) {
                break;
            }
        }

        usort($files, static fn(string $a, string $b): int => filemtime($b) <=> filemtime($a));
        $file = $files[0] ?? null;

        return ['path' => $file ? str_replace(ROOTPATH, '', $file) : null, 'content' => $file ? (string) file_get_contents($file) : ''];
    }

    /** @return array<string,string> signature=>message */
    private function extractSignatures(string $content): array
    {
        $out = [];
        foreach (preg_split('/\R/', $content) as $line) {
            $line = trim((string) $line);
            if ($line === '') {
                continue;
            }
            $message = preg_replace('/^\[[^\]]+\]\s*[A-Z]+\s*-\s*/', '', $line) ?? $line;
            $normalized = strtolower(trim($message));
            $normalized = preg_replace('/\s+/', ' ', $normalized) ?? $normalized;
            $sig = 'sig:' . substr(hash('sha256', $normalized), 0, 16);
            $out[$sig] = $message;
        }

        return $out;
    }

    /** @param array<string,mixed> $errorState @param array<string,string> $current */
    private function updateErrorSignatureState(array &$errorState, array $current): void
    {
        if (! isset($errorState['signatures']) || ! is_array($errorState['signatures'])) {
            $errorState['signatures'] = [];
        }

        $now = gmdate('c');
        $existing = [];
        foreach ($errorState['signatures'] as $idx => $item) {
            $sig = (string) ($item['signature'] ?? '');
            if ($sig !== '') {
                $existing[$sig] = $idx;
            }
        }

        foreach ($current as $sig => $message) {
            if (! isset($existing[$sig])) {
                $errorState['signatures'][] = [
                    'signature' => $sig,
                    'message' => $message,
                    'first_seen' => $now,
                    'last_seen' => $now,
                    'status' => 'open',
                    'resolved_at' => null,
                ];
                continue;
            }
            $idx = $existing[$sig];
            $errorState['signatures'][$idx]['status'] = 'open';
            $errorState['signatures'][$idx]['last_seen'] = $now;
            $errorState['signatures'][$idx]['resolved_at'] = null;
        }

        foreach ($errorState['signatures'] as $idx => $item) {
            $sig = (string) ($item['signature'] ?? '');
            if ($sig !== '' && ! isset($current[$sig])) {
                $errorState['signatures'][$idx]['status'] = 'resolved';
                $errorState['signatures'][$idx]['resolved_at'] = $now;
            }
        }
    }

    /** @param array<string,mixed> $task */
    private function &findOrCreateTaskIndex(array &$taskState, array $task): array
    {
        if (! isset($taskState['tasks']) || ! is_array($taskState['tasks'])) {
            $taskState['tasks'] = [];
        }
        foreach ($taskState['tasks'] as $idx => $row) {
            if (($row['id'] ?? '') === $task['id']) {
                return $taskState['tasks'][$idx];
            }
        }

        $taskState['tasks'][] = [
            'id' => $task['id'],
            'file' => '/' . ltrim($task['file_rel'], '/'),
            'status' => 'pending',
            'checksum' => $task['checksum'],
            'last_updated' => gmdate('c'),
            'linked_pr' => null,
            'pr_status' => null,
        ];

        $last = array_key_last($taskState['tasks']);
        return $taskState['tasks'][$last];
    }

    /** @param array<string,mixed> $task @param array<string,string> $active @return array<int,string> */
    private function matchTaskSignatures(array $task, array $active): array
    {
        $matches = [];
        foreach ($active as $signature => $message) {
            foreach ($task['target_errors'] as $needle) {
                $needle = strtolower((string) $needle);
                $msg = strtolower($message);
                if (str_contains($msg, $needle) || str_contains($needle, $msg)) {
                    $matches[] = $signature;
                    break;
                }
            }
        }

        return array_values(array_unique($matches));
    }

    /** @param array<string,mixed> $prState */
    private function hasOpenPr(array $prState, string $taskId, string $signaturesHash): bool
    {
        foreach (($prState['pull_requests'] ?? []) as $pr) {
            if (($pr['task_id'] ?? '') === $taskId
                && ($pr['signatures_hash'] ?? '') === $signaturesHash
                && ($pr['status'] ?? 'open') === 'open') {
                return true;
            }
        }

        return false;
    }

    /** @param array<string,mixed> $task @param array<int,string> $signatures @return array<string,mixed> */
    private function createPr(array $task, array $signatures, string $hash): array
    {
        $ts = gmdate('YmdHis');
        $branch = 'aiops/manual-' . $task['id'] . '-' . $ts;
        $draftPathRel = 'docs/_aiops/diffs/manual-run/' . $task['id'] . '-' . $ts . '.md';
        $draftPath = ROOTPATH . $draftPathRel;
        if (! is_dir(dirname($draftPath))) {
            mkdir(dirname($draftPath), 0775, true);
        }

        $title = sprintf('[AIOPS][P%d] %s', (int) $task['priority_number'], str_replace('-', ' ', $task['id']));
        $body = "# AIOPS Manual Fix Batch\n\n" .
            "- Task: `{$task['file_rel']}`\n" .
            "- Signatures:\n";
        foreach ($signatures as $sig) {
            $body .= "  - `{$sig}`\n";
        }
        $body .= "\n## Verification\n- php spark aiops:manual-run --dry-run=1 --create-pr=0 --notify=0\n";
        file_put_contents($draftPath, $body);

        $base = trim((string) shell_exec('git rev-parse --abbrev-ref HEAD'));
        if ($base === '') {
            return ['status' => 'pr-failed'];
        }

        $this->runGit('git checkout -b ' . escapeshellarg($branch));
        $this->runGit('git add ' . escapeshellarg($draftPathRel));
        $this->runGit('git commit -m ' . escapeshellarg($title));
        $this->runGit('git push -u origin ' . escapeshellarg($branch));

        $repo = trim((string) shell_exec("git config --get remote.origin.url"));
        $repo = preg_replace('#^git@github.com:#', '', $repo) ?? $repo;
        $repo = preg_replace('#^https://github.com/#', '', $repo) ?? $repo;
        $repo = preg_replace('#\.git$#', '', $repo) ?? $repo;

        $token = (string) (env('AIOPS_GITHUB_TOKEN') ?: env('GITHUB_TOKEN') ?: '');
        $url = null;
        $number = null;
        if ($token !== '' && str_contains($repo, '/')) {
            $payload = json_encode([
                'title' => $title,
                'head' => $branch,
                'base' => $base,
                'body' => "Linked manual task: `{$task['file_rel']}`\n\nSignatures:\n- " . implode("\n- ", $signatures) . "\n\nVerification:\n- php spark aiops:manual-run --dry-run=1 --create-pr=0 --notify=0",
            ], JSON_UNESCAPED_SLASHES);

            $resp = $this->curlJson("https://api.github.com/repos/{$repo}/pulls", $token, (string) $payload);
            $decoded = json_decode($resp, true);
            if (is_array($decoded)) {
                $url = $decoded['html_url'] ?? null;
                $number = $decoded['number'] ?? null;
                if ($number !== null) {
                    $this->curlJson("https://api.github.com/repos/{$repo}/issues/{$number}/labels", $token, json_encode(['labels' => ['aiops-ready-for-review']]) ?: '{}');
                }
            }
        }

        $this->runGit('git checkout ' . escapeshellarg($base));

        return ['status' => $url ? 'pr-created' : 'pr-open-manual', 'url' => $url, 'number' => $number, 'branch' => $branch, 'signatures_hash' => $hash];
    }

    private function runGit(string $command): void
    {
        shell_exec($command . ' 2>&1');
    }

    private function curlJson(string $url, string $token, string $payload): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/vnd.github+json',
            'Authorization: Bearer ' . $token,
            'User-Agent: MyMI-AiOps',
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $response = (string) curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /** @param array<int,array<string,mixed>> $tasks @param array<string,mixed> $taskState @param array<string,string> $active */
    private function completeResolvedTasks(array $tasks, array &$taskState, array $active): array
    {
        $done = [];
        foreach ($tasks as $task) {
            if ($task['blocked']) {
                continue;
            }
            $allResolved = true;
            foreach ($task['target_errors'] as $needle) {
                $found = false;
                foreach ($active as $message) {
                    if (str_contains(strtolower($message), strtolower($needle))) {
                        $found = true;
                        break;
                    }
                }
                if ($found) {
                    $allResolved = false;
                    break;
                }
            }

            if (! $allResolved) {
                continue;
            }

            $dest = ROOTPATH . rtrim($this->config->donePath, '/') . '/' . basename($task['file_abs']);
            if (! is_dir(dirname($dest))) {
                mkdir(dirname($dest), 0775, true);
            }
            if (is_file($task['file_abs'])) {
                rename($task['file_abs'], $dest);
            }
            foreach (($taskState['tasks'] ?? []) as $idx => $row) {
                if (($row['id'] ?? '') === $task['id']) {
                    $taskState['tasks'][$idx]['status'] = 'done';
                    $taskState['tasks'][$idx]['done_at'] = gmdate('c');
                }
            }
            $done[] = $task['id'];
        }

        return $done;
    }

    private function gitHead(): ?string
    {
        $hash = trim((string) shell_exec('git rev-parse HEAD 2>/dev/null'));
        return $hash !== '' ? $hash : null;
    }

    private function statePath(string $file): string
    {
        return ROOTPATH . rtrim($this->config->statePath, '/') . '/' . $file;
    }

    /** @param array<string,mixed> $payload */
    private function atomicWriteJson(string $path, array $payload): void
    {
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0775, true);
        }
        $tmp = $path . '.tmp';
        file_put_contents($tmp, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        rename($tmp, $path);
    }
}
