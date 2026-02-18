<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class OllamaPatchRunner
{
    private const MODEL = 'qwen2.5-coder:3b';
    private const GENERATE_URL = 'http://127.0.0.1:11434/api/generate';

    public function run(string $jobFile, array $options = []): PatchResult
    {
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
        $diff = $this->callOllama($prompt);
        $validation = $this->validateDiff($diff, $job);
        $this->writeOutputs($job, $diff, $validation);

        $status = $validation->status;
        return $this->persist(new PatchResult($status, $job->jobId, $validation->valid ? $this->rel($diffPath) : null, $validation->valid, [
            'job_file' => $job->jobFile,
            'files_touched' => $validation->filesTouched,
            'violations' => $validation->violations,
            'model' => self::MODEL,
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

        return trim("AIOPS PATCH EXECUTION\n" .
            "You are a mechanical unified-diff writer.\n" .
            "Return only git unified diff output.\n" .
            "The first line must be: diff --git\n\n" .
            "JOB ID: {$job->jobId}\n" .
            "TARGET FILES:\n{$targetText}\n\n" .
            "CONSTRAINTS:\n{$constraintText}\n\n" .
            "INSTRUCTIONS:\n{$job->instructions}\n");
    }

    protected function callOllama(string $prompt): string
    {
        $payload = [
            'model' => self::MODEL,
            'stream' => false,
            'prompt' => $prompt,
            'options' => [
                'temperature' => 0,
                'num_ctx' => 2048,
                'stop' => ['```', '\n#', '\nExplanation:', '\nSummary:'],
            ],
        ];

        $ch = curl_init(self::GENERATE_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload, JSON_UNESCAPED_SLASHES));
        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
        $body = (string) curl_exec($ch);
        $http = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);

        if ($http < 200 || $http >= 300) {
            return '';
        }

        $decoded = json_decode($body, true);
        if (! is_array($decoded)) {
            return '';
        }

        return trim((string) ($decoded['response'] ?? ''));
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

    protected function writeOutputs(PatchJob $job, string $diff, DiffValidationResult $validation): void
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
            'model' => self::MODEL,
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
