<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use App\Models\AIOps\FormTestModel;

class FormPatchPlanner
{
    public function analyzeAndQueuePatch(array $executionResult, array $options = []): array
    {
        $autoIngest = (bool)($options['auto_ingest'] ?? true);

        $testId = (int)($executionResult['test_id'] ?? 0);
        $errorDetected = (bool)($executionResult['error_detected'] ?? false);

        if ($testId <= 0) {
            return ['ok' => false, 'note' => 'No test_id available; cannot create patch job.'];
        }

        if (!$errorDetected) {
            return ['ok' => true, 'note' => 'No error detected; no patch job created.', 'patch_job' => null];
        }

        $analysis = $executionResult['analysis'] ?? [];
        $row      = $executionResult['row'] ?? [];

        $jobDir = ROOTPATH . 'docs/_aiops/patch_jobs/';
        if (!is_dir($jobDir)) {
            @mkdir($jobDir, 0775, true);
        }

        $jobId = 'FORM_TEST_' . date('Ymd_His') . '_ID' . $testId;
        $jobFile = $jobDir . $jobId . '.md';

        $md = $this->buildPatchJobMarkdown($jobId, $testId, $analysis, $executionResult);

        file_put_contents($jobFile, $md);

        // Update DB: patch job created
        $model = new FormTestModel();
        $model->update($testId, ['patch_job_created' => 1]);

        $ingestResult = null;
        if ($autoIngest) {
            $ingestResult = $this->callAiOpsIngestJobFile($jobFile);
        }

        return [
            'ok' => true,
            'note' => 'Patch job created.',
            'patch_job' => $jobFile,
            'ingest' => $ingestResult,
        ];
    }

    private function buildPatchJobMarkdown(string $jobId, int $testId, array $analysis, array $execution): string
    {
        $source = $analysis['source'] ?? [];
        $form   = $analysis['form'] ?? [];
        $route  = $analysis['route'] ?? [];

        $payload = $execution['payload'] ?? [];
        $submit  = $execution['submit'] ?? [];

        $status  = (string)($submit['status'] ?? '');
        $finalUrl = (string)($submit['final_url'] ?? '');
        $body    = (string)($submit['body'] ?? '');
        $headers = (string)($submit['headers'] ?? '');

        $logs = (string)($execution['row']['logs_snapshot'] ?? '');

        // Keep body/logs from exploding patch job size.
        $bodyTrim = mb_substr($body, 0, 8000);
        $logsTrim = mb_substr($logs, 0, 12000);

        $controller = (string)($route['controller'] ?? '');
        $handler    = (string)($route['handler'] ?? '');
        $routeMatch = (string)($route['route'] ?? '');

        $action = (string)($form['action'] ?? '');
        $method = (string)($form['method'] ?? '');

        $sourceType  = (string)($source['type'] ?? '');
        $sourceValue = (string)($source['value'] ?? '');

        $payloadJson = json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

        return <<<MD
# AIOPS_PATCH_JOB_TITLE={$jobId}
AIOPS_OBJECTIVE=Autotest_form_submission_capture_logs_and_generate_patch_PR

## Test Context
- test_id: {$testId}
- source_type: {$sourceType}
- source_value: {$sourceValue}

## Form Details
- action: {$action}
- method: {$method}

## Route Mapping
- route_match: {$routeMatch}
- handler: {$handler}
- controller: {$controller}

## Generated Payload
```json
{$payloadJson}Submission Result

final_url: {$finalUrl}

status: {$status}

Response Headers (partial)
{$headers}
Response Body (partial)
{$bodyTrim}
Logs Snapshot (partial)
{$logsTrim}
Fix Instructions (for Ollama / AIOps Worker)

Identify the controller+method handling this route.

Reproduce failure using payload above.

If response is HTML but client expects JSON:

Ensure controller returns JSON when request is AJAX/fetch and/or when Accept contains application/json.

Fix validation gaps:

Required fields missing defaults

due_date fallback logic

recurring_account normalization

Ensure error logging includes exact file/line + payload context.

Add a focused regression test or repeatable CLI reproduction step.

Produce a PR with minimal diffs.

MD;
    }

    private function callAiOpsIngestJobFile(string $jobFile): array
    {
        // Use php spark aiops:ingest --job-file="..."
        $php = PHP_BINARY ?: 'php';

        $cmd = $php . ' ' . escapeshellarg(ROOTPATH . 'spark')
            . ' aiops:ingest --job-file=' . escapeshellarg($jobFile);

        $output = [];
        $code = 0;

        @exec($cmd . ' 2>&1', $output, $code);

        return [
            'cmd' => $cmd,
            'exit_code' => $code,
            'output' => implode("\n", $output),
        ];
    }
}