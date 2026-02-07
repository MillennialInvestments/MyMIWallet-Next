<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use Config\AiOps;

class AutoRunCoordinator
{
    private AiOps $config;

    public function __construct(?AiOps $config = null)
    {
        $this->config = $config ?? config('AiOps');
    }

    /** @param array<string,mixed> $options @return array<string,mixed> */
    public function run(array $options = []): array
    {
        $state = $this->loadStates();
        $manual = $this->scanManualActionableTasks($state['task']);

        if ($manual['has_actionable']) {
            $runner = new ManualPriorityRunner($this->config);
            $manualResult = $runner->run([
                'dryRun' => (bool) ($options['dryRun'] ?? false),
                'limitTasks' => (int) ($options['limitTasks'] ?? $this->config->defaultTaskLimit),
                'limitErrors' => (int) ($options['limitErrors'] ?? $this->config->defaultErrorLimit),
                'writeState' => true,
                'createPr' => (bool) ($options['createPr'] ?? true),
                'notify' => (bool) ($options['notify'] ?? true),
            ]);

            return [
                'mode' => 'manual-delegated',
                'manual_actionable_count' => count($manual['tasks']),
                'manual_tasks' => $manual['tasks'],
                'manual_result' => $manualResult,
            ];
        }

        $threshold = strtoupper((string) ($options['autoThreshold'] ?? 'CRITICAL'));
        $limitErrors = max(1, (int) ($options['limitErrors'] ?? $this->config->defaultErrorLimit));
        $log = $this->latestSummaryLog();
        $errors = $this->parseSummaryErrors($log['content'], $threshold);

        $openPrSignatures = $this->openPrSignatureSet($state['pr']);
        $candidate = [];
        foreach ($errors as $row) {
            $sig = $row['signature'];
            if ($this->isResolvedSignature($state['error'], $sig)) {
                continue;
            }
            if (isset($openPrSignatures[$sig])) {
                continue;
            }
            $candidate[] = $row;
        }

        usort($candidate, function (array $a, array $b): int {
            return ($b['score'] <=> $a['score']) ?: (($b['count'] ?? 0) <=> ($a['count'] ?? 0));
        });
        $selected = array_slice($candidate, 0, $limitErrors);

        if ($selected === []) {
            return [
                'mode' => 'auto',
                'latest_log' => $log['path'],
                'status' => 'no-actionable-errors',
                'threshold' => $threshold,
            ];
        }

        $selectedSignatures = array_values(array_map(static fn(array $r): string => (string) $r['signature'], $selected));
        $selectedMessages = array_values(array_map(static fn(array $r): string => (string) $r['message'], $selected));
        sort($selectedSignatures);
        $intentHash = hash('sha256', implode('|', $selectedSignatures));

        if ($this->autoTaskAlreadyTracked($state['task'], $state['pr'], $intentHash)) {
            return [
                'mode' => 'auto',
                'latest_log' => $log['path'],
                'status' => 'duplicate-intent-skipped',
                'intent_hash' => $intentHash,
            ];
        }

        $taskRel = null;
        $taskId = null;
        if ((bool) ($options['writeAutoTasks'] ?? true)) {
            $created = $this->createAutoPriorityTask($selectedMessages, $intentHash);
            $taskRel = $created['task_rel'];
            $taskId = $created['task_id'];

            $taskIndex = &$this->findOrCreateTaskIndex($state['task'], $taskId, $taskRel, $created['checksum']);
            $taskIndex['status'] = 'pending';
            $taskIndex['source'] = 'auto';
            $taskIndex['first_seen'] = $taskIndex['first_seen'] ?? gmdate('c');
            $taskIndex['last_updated'] = gmdate('c');
            $taskIndex['checksum'] = $created['checksum'];
            $taskIndex['signatures_hash'] = $intentHash;

            $this->claimSignatures($state['error'], $selected, $taskId, 'auto');
            $this->persistStates($state);
        }

        $runner = new ManualPriorityRunner($this->config);
        $manualResult = $runner->run([
            'dryRun' => (bool) ($options['dryRun'] ?? false),
            'limitTasks' => (int) ($options['limitTasks'] ?? $this->config->defaultTaskLimit),
            'limitErrors' => (int) ($options['limitErrors'] ?? $this->config->defaultErrorLimit),
            'only' => $taskRel ? basename($taskRel) : '',
            'writeState' => true,
            'createPr' => (bool) ($options['createPr'] ?? true),
            'notify' => (bool) ($options['notify'] ?? true),
        ]);

        return [
            'mode' => 'auto',
            'latest_log' => $log['path'],
            'status' => 'auto-priority-created',
            'threshold' => $threshold,
            'intent_hash' => $intentHash,
            'auto_task' => $taskRel,
            'selected_signatures' => $selectedSignatures,
            'manual_result' => $manualResult,
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
            return $fallback;
        }

        return $decoded;
    }

    /** @return array{has_actionable:bool,tasks:array<int,string>} */
    private function scanManualActionableTasks(array $taskState): array
    {
        $actionable = [];
        $pattern = ROOTPATH . rtrim($this->config->manualPath, '/') . '/*.md';
        $files = glob($pattern) ?: [];
        sort($files);

        foreach ($files as $file) {
            $id = (string) pathinfo($file, PATHINFO_FILENAME);
            $status = $this->taskStatus($taskState, $id);
            if (in_array($status, ['pending', 'in_progress'], true)) {
                $actionable[] = $id;
            }
        }

        return ['has_actionable' => $actionable !== [], 'tasks' => $actionable];
    }

    private function taskStatus(array $taskState, string $taskId): string
    {
        foreach (($taskState['tasks'] ?? []) as $row) {
            if (($row['id'] ?? '') === $taskId) {
                return (string) ($row['status'] ?? 'pending');
            }
        }

        return 'pending';
    }

    /** @return array{path:?string,content:string} */
    private function latestSummaryLog(): array
    {
        $patterns = [
            ROOTPATH . 'writable/logs/summary-*.log',
            ROOTPATH . 'writable/logs/summary-*.state',
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

    /** @return array<int,array<string,mixed>> */
    private function parseSummaryErrors(string $content, string $threshold): array
    {
        $bySig = [];
        foreach (preg_split('/\R/', $content) as $line) {
            $line = trim((string) $line);
            if ($line === '') {
                continue;
            }

            $parsed = $this->parseLine($line);
            if ($parsed === null) {
                continue;
            }
            if (! $this->severityAllowed($parsed['severity'], $threshold)) {
                continue;
            }

            $sig = 'sig:' . substr(hash('sha256', strtolower(preg_replace('/\s+/', ' ', trim($parsed['message'])) ?: $parsed['message'])), 0, 16);
            if (! isset($bySig[$sig])) {
                $bySig[$sig] = [
                    'signature' => $sig,
                    'message' => $parsed['message'],
                    'severity' => $parsed['severity'],
                    'count' => 0,
                    'last_seen' => $parsed['timestamp'],
                    'core_bonus' => $this->coreBonus($parsed['message']),
                    'score' => 0,
                ];
            }
            $bySig[$sig]['count']++;
            if ($parsed['timestamp'] > $bySig[$sig]['last_seen']) {
                $bySig[$sig]['last_seen'] = $parsed['timestamp'];
            }
        }

        foreach ($bySig as $sig => $row) {
            $severityWeight = $row['severity'] === 'CRITICAL' ? 1000 : 500;
            $countWeight = ((int) $row['count']) * 50;
            $recencyWeight = (int) strtotime((string) $row['last_seen']);
            $bySig[$sig]['score'] = $severityWeight + $countWeight + ((int) $row['core_bonus'] * 100) + (int) ($recencyWeight / 100000);
        }

        return array_values($bySig);
    }

    /** @return array{timestamp:string,severity:string,message:string}|null */
    private function parseLine(string $line): ?array
    {
        if (preg_match('/^\[([^\]]+)\]\s+([A-Z]+)\s+-\s+(.+)$/', $line, $m)) {
            return ['timestamp' => gmdate('c', strtotime($m[1]) ?: time()), 'severity' => strtoupper($m[2]), 'message' => trim($m[3])];
        }

        return null;
    }

    private function severityAllowed(string $severity, string $threshold): bool
    {
        if ($threshold === 'ERROR') {
            return in_array($severity, ['CRITICAL', 'ERROR'], true);
        }

        return $severity === 'CRITICAL';
    }

    private function coreBonus(string $message): int
    {
        $msg = strtolower($message);
        $targets = ['auth', 'wallet', 'alerts', 'exchange'];
        foreach ($targets as $target) {
            if (str_contains($msg, $target)) {
                return 1;
            }
        }

        return 0;
    }

    /** @param array<string,mixed> $errorState */
    private function isResolvedSignature(array $errorState, string $signature): bool
    {
        foreach (($errorState['signatures'] ?? []) as $row) {
            if (($row['signature'] ?? '') === $signature && strtolower((string) ($row['status'] ?? 'open')) === 'resolved') {
                return true;
            }
        }

        return false;
    }

    /** @param array<string,mixed> $prState @return array<string,bool> */
    private function openPrSignatureSet(array $prState): array
    {
        $set = [];
        foreach (($prState['pull_requests'] ?? []) as $row) {
            if (strtolower((string) ($row['status'] ?? 'open')) !== 'open') {
                continue;
            }
            foreach (($row['signatures'] ?? []) as $sig) {
                $set[(string) $sig] = true;
            }
        }

        return $set;
    }

    /** @param array<string,mixed> $taskState @param array<string,mixed> $prState */
    private function autoTaskAlreadyTracked(array $taskState, array $prState, string $intentHash): bool
    {
        foreach (($taskState['tasks'] ?? []) as $row) {
            if (($row['source'] ?? 'manual') !== 'auto') {
                continue;
            }
            if (($row['signatures_hash'] ?? '') === $intentHash && in_array((string) ($row['status'] ?? 'pending'), ['pending', 'in_progress', 'done'], true)) {
                return true;
            }
        }

        foreach (($prState['pull_requests'] ?? []) as $row) {
            if (($row['signatures_hash'] ?? '') === $intentHash && in_array((string) ($row['status'] ?? 'open'), ['open', 'merged'], true)) {
                return true;
            }
        }

        return false;
    }

    /** @param array<int,string> $messages @return array{task_rel:string,task_id:string,checksum:string} */
    private function createAutoPriorityTask(array $messages, string $intentHash): array
    {
        $stamp = gmdate('Y-m-d-Hi');
        $baseRel = rtrim($this->config->manualPath, '/') . '/auto-' . $stamp;
        $rel = $baseRel . '.md';
        $abs = ROOTPATH . $rel;
        $suffix = 1;
        while (is_file($abs)) {
            $rel = $baseRel . '-' . $suffix . '.md';
            $abs = ROOTPATH . $rel;
            $suffix++;
        }

        if (! is_dir(dirname($abs))) {
            mkdir(dirname($abs), 0775, true);
        }

        $lines = [
            '# Priority: Auto-generated Runtime Errors',
            '',
            '## Scope',
            'Automatically generated priority due to absence of manual tasks.',
            '',
            '## Target Errors',
        ];
        foreach ($messages as $message) {
            $lines[] = '- Error: ' . $message;
        }
        $lines = array_merge($lines, [
            '',
            '## Constraints',
            '- Small PRs (1–3 fixes)',
            '- Defensive guards preferred',
            '- No schema changes unless required',
            '',
            '## Completion Criteria',
            '- Errors no longer appear in logs:summarize',
            '- PR merged',
            '',
            '## Notes (Auto)',
            'Generated by aiops:auto-run from writable/logs summary.',
            '',
            '<!-- intent_hash: ' . $intentHash . ' -->',
        ]);

        $content = implode("\n", $lines) . "\n";
        file_put_contents($abs, $content);

        return [
            'task_rel' => $rel,
            'task_id' => (string) pathinfo($abs, PATHINFO_FILENAME),
            'checksum' => hash('sha256', $content),
        ];
    }

    /** @param array<string,mixed> $taskState */
    private function &findOrCreateTaskIndex(array &$taskState, string $taskId, string $taskRel, string $checksum): array
    {
        if (! isset($taskState['tasks']) || ! is_array($taskState['tasks'])) {
            $taskState['tasks'] = [];
        }

        foreach ($taskState['tasks'] as $idx => $row) {
            if (($row['id'] ?? '') === $taskId) {
                return $taskState['tasks'][$idx];
            }
        }

        $taskState['tasks'][] = [
            'id' => $taskId,
            'file' => '/' . ltrim($taskRel, '/'),
            'source' => 'auto',
            'status' => 'pending',
            'checksum' => $checksum,
            'first_seen' => gmdate('c'),
            'last_updated' => gmdate('c'),
            'linked_pr' => null,
            'pr_status' => null,
        ];

        $last = array_key_last($taskState['tasks']);
        return $taskState['tasks'][$last];
    }

    /** @param array<string,mixed> $errorState @param array<int,array<string,mixed>> $selected */
    private function claimSignatures(array &$errorState, array $selected, string $taskId, string $source): void
    {
        if (! isset($errorState['signatures']) || ! is_array($errorState['signatures'])) {
            $errorState['signatures'] = [];
        }

        $now = gmdate('c');
        foreach ($selected as $row) {
            $signature = (string) ($row['signature'] ?? '');
            if ($signature === '') {
                continue;
            }

            $found = false;
            foreach ($errorState['signatures'] as $idx => $existing) {
                if (($existing['signature'] ?? '') !== $signature) {
                    continue;
                }

                $errorState['signatures'][$idx]['message'] = $row['message'];
                $errorState['signatures'][$idx]['last_seen'] = $now;
                $errorState['signatures'][$idx]['status'] = 'open';
                $errorState['signatures'][$idx]['priority_id'] = $taskId;
                $errorState['signatures'][$idx]['claimed_by_task'] = $taskId;
                $errorState['signatures'][$idx]['claimed_source'] = $source;
                $found = true;
                break;
            }

            if (! $found) {
                $errorState['signatures'][] = [
                    'signature' => $signature,
                    'message' => $row['message'],
                    'first_seen' => $now,
                    'last_seen' => $now,
                    'status' => 'open',
                    'priority_id' => $taskId,
                    'claimed_by_task' => $taskId,
                    'claimed_source' => $source,
                ];
            }
        }
    }

    /** @param array<string,mixed> $state */
    private function persistStates(array $state): void
    {
        $this->atomicWriteJson($this->statePath('task-index.json'), $state['task']);
        $this->atomicWriteJson($this->statePath('pr-history.json'), $state['pr']);
        $this->atomicWriteJson($this->statePath('error-signatures.json'), $state['error']);
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
