<?php

declare(strict_types=1);

namespace App\Services\AiOps;

class OllamaPatchRunner
{
    private const MODEL = 'qwen2.5-coder:3b';
    private const GENERATE_URL = 'http://127.0.0.1:11434/api/generate';
    private const TAGS_URL = 'http://127.0.0.1:11434/api/tags';
    private const AUDIT_LOG = 'writable/logs/aiops-ollama.log';

    /** @return array<string,mixed> */
    public function run(string $jobFile, bool $force = false): array
    {
        $jobPath = ROOTPATH . ltrim($jobFile, '/');
        if (! is_file($jobPath)) {
            return $this->result('failed_missing_job', ['job_file' => $jobFile]);
        }

        $job = $this->parseJobFile((string) file_get_contents($jobPath));
        if (($job['valid'] ?? false) !== true) {
            return $this->persistResult($job['job_id'] ?? basename($jobFile, '.md'), $this->result('failed_invalid_job', [
                'job_file' => $jobFile,
                'errors' => $job['errors'] ?? ['invalid job format'],
            ]));
        }

        $jobId = (string) $job['job_id'];
        $patchDir = ROOTPATH . 'docs/_aiops/patches';
        if (! is_dir($patchDir)) {
            mkdir($patchDir, 0775, true);
        }

        $diffPath = $patchDir . '/' . $jobId . '.diff';
        if (is_file($diffPath) && ! $force) {
            return $this->persistResult($jobId, $this->result('skipped_exists', [
                'job_id' => $jobId,
                'model' => self::MODEL,
                'job_file' => $jobFile,
                'diff_path' => $this->rel($diffPath),
                'diff_valid' => true,
            ]));
        }

        if (! $this->ollamaAvailable()) {
            return $this->persistResult($jobId, $this->result('skipped_unavailable', [
                'job_id' => $jobId,
                'model' => self::MODEL,
                'job_file' => $jobFile,
                'diff_valid' => false,
            ]));
        }

        $prompt = $this->buildPrompt((array) $job['constraints'], (string) $job['instructions']);
        $promptHash = hash('sha256', $prompt);

        $payload = [
            'model' => self::MODEL,
            'stream' => false,
            'prompt' => $prompt,
            'options' => [
                'num_ctx' => 2048,
                'temperature' => 0,
                'top_p' => 0.1,
                'stop' => ['```', '# Explanation', 'Explanation:'],
            ],
        ];

        $response = $this->postJson(self::GENERATE_URL, $payload);
        $decoded = json_decode($response['body'], true);
        $rawOutput = is_array($decoded) ? (string) ($decoded['response'] ?? '') : '';
        $status = 'failed_unknown';
        $error = is_array($decoded) ? (string) ($decoded['error'] ?? '') : '';

        if ($response['ok'] !== true) {
            $status = str_contains(strtolower($error), 'memory') ? 'failed_memory' : 'failed_http';
        } elseif (str_contains(strtolower($rawOutput . ' ' . $error), 'memory')) {
            $status = 'failed_memory';
        } elseif (! str_starts_with(ltrim($rawOutput), 'diff --git')) {
            $status = 'failed_invalid_diff';
        } else {
            $filesTouched = $this->extractTouchedFiles($rawOutput);
            $targetFiles = (array) $job['target_files'];
            $outOfScope = array_values(array_diff($filesTouched, $targetFiles));
            if ($outOfScope !== []) {
                $status = 'failed_scope_violation';
            } else {
                file_put_contents($diffPath, rtrim($rawOutput) . PHP_EOL);
                $status = 'success';
            }
        }

        $diffSha = hash('sha256', $rawOutput);
        $this->auditLog([
            'job_id' => $jobId,
            'model' => self::MODEL,
            'status' => $status,
            'prompt_hash' => $promptHash,
            'output_length' => strlen($rawOutput),
            'diff_sha256' => $diffSha,
        ]);

        $filesTouched = $this->extractTouchedFiles($rawOutput);

        return $this->persistResult($jobId, $this->result($status, [
            'job_id' => $jobId,
            'job_file' => $jobFile,
            'model' => self::MODEL,
            'diff_path' => $status === 'success' ? $this->rel($diffPath) : null,
            'diff_valid' => $status === 'success',
            'files_touched' => $filesTouched,
            'error' => $error !== '' ? $error : null,
        ]));
    }

    /** @return array<string,mixed> */
    private function parseJobFile(string $markdown): array
    {
        $sections = preg_split('/^##\s+/m', $markdown) ?: [];
        $constraints = [];
        $instructions = '';
        $targets = [];
        $jobId = '';

        if (preg_match('/^ID:\s*(.+)$/mi', $markdown, $m)) {
            $jobId = trim($m[1]);
        }

        foreach ($sections as $section) {
            $section = trim($section);
            if ($section === '') {
                continue;
            }

            [$title, $body] = array_pad(explode("\n", $section, 2), 2, '');
            $title = strtoupper(trim($title));
            $body = trim($body);

            if (str_starts_with($title, 'TARGET FILES')) {
                preg_match_all('/^-\s+(.+)$/m', $body, $m);
                $targets = array_values(array_filter(array_map('trim', $m[1] ?? [])));
            }

            if (str_starts_with($title, 'CONSTRAINTS')) {
                preg_match_all('/^-\s+(.+)$/m', $body, $m);
                $constraints = array_values(array_filter(array_map('trim', $m[1] ?? [])));
            }

            if (str_starts_with($title, 'INSTRUCTIONS')) {
                $instructions = trim($body);
            }
        }

        $errors = [];
        if ($jobId === '') {
            $errors[] = 'Missing job ID';
        }
        if ($targets === []) {
            $errors[] = 'Missing target files';
        }
        if ($instructions === '') {
            $errors[] = 'Missing instructions';
        }

        return [
            'valid' => $errors === [],
            'errors' => $errors,
            'job_id' => $jobId,
            'target_files' => $targets,
            'constraints' => $constraints,
            'instructions' => $instructions,
        ];
    }

    /** @param array<int,string> $constraints */
    private function buildPrompt(array $constraints, string $instructions): string
    {
        $constraintLines = '';
        foreach ($constraints as $constraint) {
            $constraintLines .= '- ' . trim($constraint) . "\n";
        }

        return trim(
            "You are a patch generator.\n\n" .
            "Rules:\n" .
            "- Output unified diff only\n" .
            "- Do not include explanations\n" .
            "- Do not include markdown\n" .
            "- Do not include commentary\n" .
            "- Do not modify files not listed\n\n" .
            "Task:\n" .
            "Constraints:\n" .
            ($constraintLines !== '' ? $constraintLines : "- None\n") .
            "\n" .
            $instructions
        );
    }

    private function ollamaAvailable(): bool
    {
        $response = $this->get(self::TAGS_URL);
        return $response['ok'] === true;
    }

    /** @return array{ok:bool,body:string,http_code:int} */
    private function get(string $url): array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $body = (string) curl_exec($ch);
        $http = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return ['ok' => $http >= 200 && $http < 300, 'body' => $body, 'http_code' => $http];
    }

    /** @param array<string,mixed> $payload @return array{ok:bool,body:string,http_code:int} */
    private function postJson(string $url, array $payload): array
    {
        $json = json_encode($payload, JSON_UNESCAPED_SLASHES) ?: '{}';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 90);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $body = (string) curl_exec($ch);
        $http = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        return ['ok' => $http >= 200 && $http < 300, 'body' => $body, 'http_code' => $http];
    }

    /** @return array<int,string> */
    private function extractTouchedFiles(string $diff): array
    {
        preg_match_all('/^diff --git\s+a\/(.+?)\s+b\/(.+)$/m', $diff, $m);
        $files = $m[2] ?? [];
        return array_values(array_unique(array_map(static fn(string $f): string => trim($f), $files)));
    }

    /** @param array<string,mixed> $payload */
    private function auditLog(array $payload): void
    {
        $path = ROOTPATH . self::AUDIT_LOG;
        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0775, true);
        }

        $line = json_encode([
            'timestamp' => gmdate('c'),
            'event' => 'ollama_patch_run',
            'data' => $payload,
        ], JSON_UNESCAPED_SLASHES) . PHP_EOL;

        file_put_contents($path, $line, FILE_APPEND);
    }

    /** @param array<string,mixed> $payload @return array<string,mixed> */
    private function result(string $status, array $payload = []): array
    {
        return array_merge($payload, [
            'status' => $status,
            'timestamp' => gmdate('c'),
        ]);
    }

    /** @param array<string,mixed> $result @return array<string,mixed> */
    private function persistResult(string $jobId, array $result): array
    {
        $dir = ROOTPATH . 'docs/_aiops/patches';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $path = $dir . '/' . $jobId . '.json';
        file_put_contents($path, json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);

        return $result;
    }

    private function rel(string $path): string
    {
        return ltrim(str_replace(ROOTPATH, '', $path), '/');
    }
}
