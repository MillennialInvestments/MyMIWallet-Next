<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class OllamaPatchRunner
{
    private const DEFAULT_MODEL = 'qwen2.5-coder:3b';
    private const DEFAULT_GENERATE_URL = 'http://127.0.0.1:11434/api/generate';

    public function run(string $jobFile, array $options = []): PatchResult
    {
        $audit = $this->auditOllamaConfig();
        if (! $audit['ok']) {
            return $this->persist(new PatchResult('failed_ollama_config', basename($jobFile, '.md'), null, false, [
                'job_file' => $jobFile,
                'audit' => $audit,
            ]));
        }

        $jobPath = ROOTPATH . ltrim($jobFile, '/');
        if (! is_file($jobPath)) {
            return $this->persist(new PatchResult('failed_missing_job', basename($jobFile, '.md'), null, false, ['job_file' => $jobFile]));
        }

        $job = PatchJob::fromMarkdown($jobFile, (string) file_get_contents($jobPath));
        $errors = $job->validate();
        if ($errors !== []) {
            return $this->persist(new PatchResult('failed_invalid_job', $job->jobId, null, false, [
                'job_file' => $job->jobFile,
                'errors' => $errors,
            ]));
        }

        $diffPath = ROOTPATH . 'docs/_aiops/patches/' . $job->jobId . '.diff';
        if (is_file($diffPath) && (($options['force'] ?? false) !== true)) {
            $validation = $this->validateDiff((string) file_get_contents($diffPath), $job);
            return $this->persist(new PatchResult('skipped_exists', $job->jobId, $this->rel($diffPath), $validation->valid, [
                'job_file' => $job->jobFile,
                'files_touched' => $validation->filesTouched,
            ]));
        }

        $prompt = $this->buildPrompt($job);
        $attemptOne = $this->callOllama($prompt, $audit);
        $diff = $attemptOne['response'];

        if (! $this->validateGeneratedPatch($diff)) {
            $this->writeInvalidModelOutput($job->jobId, $attemptOne, 'attempt_1');

            $attemptTwo = $this->callOllama($prompt, $audit); // retry once
            $diff = $attemptTwo['response'];

            if (! $this->validateGeneratedPatch($diff)) {
                $this->writeInvalidModelOutput($job->jobId, $attemptTwo, 'attempt_2');
                $this->writeDiffSkeletonFallback($job);

                return $this->persist(new PatchResult('failed_invalid_model_output', $job->jobId, null, false, [
                    'job_file' => $job->jobFile,
                    'debug_file' => 'docs/_aiops/debug/' . $job->jobId . '.attempt_2.raw-output.json',
                    'fallback_plan' => 'docs/_aiops/patch_jobs_failed/' . $job->jobId . '.md',
                ]));
            }
        }

        $validation = $this->validateDiff($diff, $job);
        $this->writeOutputs($job, $diff, $validation, $audit['model']);

        $status = $validation->status;
        return $this->persist(new PatchResult($status, $job->jobId, $validation->valid ? $this->rel($diffPath) : null, $validation->valid, [
            'job_file' => $job->jobFile,
            'files_touched' => $validation->filesTouched,
            'violations' => $validation->violations,
            'model' => $audit['model'],
        ]));
    }

    protected function buildPrompt(PatchJob $job): string
    {
        $constraints = $job->constraints;
        if ($constraints === []) {
            $constraints = [
                'Output unified diff only',
                'Do not include commentary, markdown fences, or explanations',
                'Do not modify files outside TARGET FILES',
            ];
        }

        $constraintText = implode("\n", array_map(static fn(string $line): string => '- ' . $line, $constraints));
        $targetText = implode("\n", array_map(static fn(string $line): string => '- ' . $line, $job->targetFiles));

        $repoSummary = (new RepoScannerService())->buildContextSummary();
        $schemaSummary = $this->buildSchemaSummaryFromInstruction($job->instructions);
        $recentLogs = $this->getRecentLogSummary();

        return trim("AIOPS PATCH EXECUTION\n"
            . "You are a mechanical unified-diff writer.\n"
            . "Return only git unified diff output.\n"
            . "The first line must be: diff --git\n\n"
            . "JOB ID: {$job->jobId}\n"
            . "TARGET FILES:\n{$targetText}\n\n"
            . "CONSTRAINTS:\n{$constraintText}\n\n"
            . "REPO CONTEXT SUMMARY (JSON):\n" . json_encode($repoSummary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n\n"
            . "RELEVANT DB SCHEMA (JSON):\n" . json_encode($schemaSummary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n\n"
            . "RECENT LOG SUMMARY:\n{$recentLogs}\n\n"
            . "INSTRUCTIONS:\n{$job->instructions}\n");
    }

    /** @return array<string, array<string, mixed>> */
    private function buildSchemaSummaryFromInstruction(string $instruction): array
    {
        preg_match_all('/\\b(bf_[a-z0-9_]+)\\b/i', $instruction, $matches);
        $tables = array_values(array_unique(array_map('strtolower', $matches[1] ?? [])));

        $summary = [];
        $inspector = new SchemaInspectorService();
        foreach ($tables as $table) {
            try {
                $schema = $inspector->getTableSchema($table);
                if ($schema !== []) {
                    $summary[$table] = $schema;
                }
            } catch (\Throwable $e) {
                $summary[$table] = ['error' => $e->getMessage()];
            }
        }

        return $summary;
    }

    private function getRecentLogSummary(): string
    {
        $logDir = ROOTPATH . 'writable/logs';
        if (! is_dir($logDir)) {
            return 'No log directory found.';
        }

        $files = glob($logDir . '/*.log') ?: [];
        rsort($files);
        $latest = $files[0] ?? null;
        if ($latest === null || ! is_file($latest)) {
            return 'No log files found.';
        }

        $lines = @file($latest, FILE_IGNORE_NEW_LINES) ?: [];

        return implode("\n", array_slice($lines, -40));
    }

    /** @return array{response:string,raw:string,http:int,error:string|null} */
    protected function callOllama(string $prompt, array $audit): array
    {
        $payload = [
            'model' => $audit['model'],
            'stream' => false,
            'prompt' => $prompt,
            'options' => [
                'temperature' => 0,
                'num_ctx' => $audit['token_limit'],
                'num_predict' => $audit['token_limit'],
                'num_batch' => 64,
                'stop' => ['```', '\n#', '\nExplanation:', '\nSummary:'],
            ],
        ];

        $ch = curl_init($audit['endpoint']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload, JSON_UNESCAPED_SLASHES));
        curl_setopt($ch, CURLOPT_TIMEOUT, $audit['timeout']);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $body = (string) curl_exec($ch);
        $http = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        $error = curl_error($ch) ?: null;
        curl_close($ch);

        if ($http < 200 || $http >= 300) {
            return ['response' => '', 'raw' => $body, 'http' => $http, 'error' => $error];
        }

        $decoded = json_decode($body, true);
        if (! is_array($decoded)) {
            return ['response' => '', 'raw' => $body, 'http' => $http, 'error' => $error];
        }

        $response = trim((string) ($decoded['response'] ?? ''));
        if (strlen($response) > 150000) {
            $response = substr($response, 0, 150000);
        }

        return ['response' => $response, 'raw' => $body, 'http' => $http, 'error' => $error];
    }

    private function validateGeneratedPatch(string $content): bool
    {
        $trim = trim($content);
        if ($trim === '') {
            return false;
        }

        $lower = strtolower($trim);
        foreach (['todo', 'placeholder', 'pseudo', 'example'] as $bad) {
            if (str_contains($lower, $bad)) {
                return false;
            }
        }

        $hasNamespace = preg_match('/\bnamespace\s+[A-Za-z0-9_\\\\]+\s*;/', $trim) === 1;
        $hasSql = preg_match('/\b(select|insert|update|delete|alter|create|drop)\b\s+/i', $trim) === 1;
        $hasDiff = str_starts_with(ltrim($trim), 'diff --git');

        return $hasNamespace || $hasSql || $hasDiff;
    }

    protected function validateDiff(string $diff, PatchJob $job): DiffValidationResult
    {
        if (! str_starts_with(ltrim($diff), 'diff --git')) {
            return new DiffValidationResult(false, [], ['Output did not start with "diff --git"'], 'failed_invalid_diff');
        }

        preg_match_all('/^diff --git\s+a\/(.+?)\s+b\/(.+)$/m', $diff, $matches);
        $filesTouched = array_values(array_unique(array_map(static fn(string $path): string => trim($path), $matches[2] ?? [])));
        $outOfScope = array_values(array_diff($filesTouched, $job->targetFiles));

        if ($outOfScope !== []) {
            return new DiffValidationResult(false, $filesTouched, ['Out of scope files: ' . implode(', ', $outOfScope)], 'failed_scope_violation');
        }

        return new DiffValidationResult(true, $filesTouched, [], 'success');
    }

    protected function writeOutputs(PatchJob $job, string $diff, DiffValidationResult $validation, string $model): void
    {
        $patchDir = ROOTPATH . 'docs/_aiops/patches';
        $runDir = ROOTPATH . 'docs/_aiops/runs';
        if (! is_dir($patchDir)) {
            mkdir($patchDir, 0775, true);
        }
        if (! is_dir($runDir)) {
            mkdir($runDir, 0775, true);
        }

        if ($validation->valid) {
            file_put_contents($patchDir . '/' . $job->jobId . '.diff', rtrim($diff) . PHP_EOL);
        }

        if ($validation->status === 'failed_invalid_diff') {
            $debugDir = ROOTPATH . 'docs/_aiops/debug';
            if (! is_dir($debugDir)) {
                mkdir($debugDir, 0775, true);
            }

            file_put_contents($debugDir . '/' . $job->jobId . '.last-response.txt', $diff . PHP_EOL);
        }

        $json = [
            'job_id' => $job->jobId,
            'job_file' => $job->jobFile,
            'status' => $validation->status,
            'model' => $model,
            'files_touched' => $validation->filesTouched,
            'violations' => $validation->violations,
            'diff_sha256' => hash('sha256', $diff),
            'timestamp' => gmdate('c'),
        ];
        file_put_contents($patchDir . '/' . $job->jobId . '.json', json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        $body = "# [AIOPS] Patch {$job->jobId}\n\n"
            . "- Patch job: `docs/_aiops/patch_jobs/{$job->jobId}.md`\n"
            . "- Diff: `docs/_aiops/patches/{$job->jobId}.diff`\n"
            . "- Checklist: `docs/_aiops/pr-checklist.md`\n\n"
            . "## Checklist\n- [ ] See docs/_aiops/pr-checklist.md\n"
            . "\nCodex role: reviewer only.\n";
        file_put_contents($runDir . '/' . $job->jobId . '.pr.md', $body);
    }


    private function writeInvalidModelOutput(string $jobId, array $attempt, string $suffix): void
    {
        $debugDir = ROOTPATH . 'docs/_aiops/debug';
        if (! is_dir($debugDir)) {
            mkdir($debugDir, 0775, true);
        }

        $payload = [
            'job_id' => $jobId,
            'suffix' => $suffix,
            'http' => $attempt['http'] ?? 0,
            'error' => $attempt['error'] ?? null,
            'raw' => $attempt['raw'] ?? '',
            'response' => $attempt['response'] ?? '',
            'captured_at' => gmdate('c'),
        ];

        file_put_contents(
            $debugDir . '/' . $jobId . '.' . $suffix . '.raw-output.json',
            json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL
        );
    }

    private function writeDiffSkeletonFallback(PatchJob $job): void
    {
        $dir = ROOTPATH . 'docs/_aiops/patch_jobs_failed';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $targets = implode("
", array_map(static fn(string $path): string => '- ' . $path, $job->targetFiles));
        $body = "# Patch Skeleton Fallback: {$job->jobId}

"
            . "Ollama failed to produce a valid unified diff after 2 attempts.

"
            . "## Target files
{$targets}

"
            . "## Required changes
{$job->instructions}

"
            . "## Evidence
"
            . "- docs/_aiops/debug/{$job->jobId}.attempt_1.raw-output.json
"
            . "- docs/_aiops/debug/{$job->jobId}.attempt_2.raw-output.json
";

        file_put_contents($dir . '/' . $job->jobId . '.md', $body);
    }

    private function auditOllamaConfig(): array
    {
        $endpoint = getenv('OLLAMA_ENDPOINT') ?: self::DEFAULT_GENERATE_URL;
        $model = getenv('OLLAMA_MODEL') ?: self::DEFAULT_MODEL;
        $timeout = (int) (getenv('OLLAMA_TIMEOUT_SECONDS') ?: 120);
        $tokenLimit = (int) (getenv('OLLAMA_TOKEN_LIMIT') ?: 2048);
        $memoryLimitMb = (int) (getenv('OLLAMA_MEMORY_LIMIT_MB') ?: 512);

        $ok = true;
        $issues = [];

        if ($model === '') {
            $ok = false;
            $issues[] = 'OLLAMA_MODEL missing';
        }
        if ($tokenLimit <= 0) {
            $ok = false;
            $issues[] = 'OLLAMA_TOKEN_LIMIT invalid';
        }
        if ($memoryLimitMb > 512) {
            $ok = false;
            $issues[] = 'OLLAMA_MEMORY_LIMIT_MB must be <= 512';
        }

        $reachable = false;
        $ch = curl_init($endpoint);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        $http = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        if ($http >= 200 && $http < 500) {
            $reachable = true;
        }

        if (! $reachable) {
            $ok = false;
            $issues[] = 'Ollama endpoint unreachable';
        }

        return [
            'ok' => $ok,
            'issues' => $issues,
            'endpoint' => $endpoint,
            'model' => $model,
            'timeout' => max(30, $timeout),
            'token_limit' => min(max(256, $tokenLimit), 4096),
            'memory_limit_mb' => $memoryLimitMb,
            'reachable' => $reachable,
        ];
    }

    private function persist(PatchResult $result): PatchResult
    {
        $dir = ROOTPATH . 'docs/_aiops/patches';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        file_put_contents($dir . '/' . $result->jobId . '.json', json_encode($result->toArray(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        return $result;
    }

    private function rel(string $path): string
    {
        return ltrim(str_replace(ROOTPATH, '', $path), '/');
    }
}
