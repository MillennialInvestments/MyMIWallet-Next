<?php

declare(strict_types=1);

namespace App\Services\AIOps;

use App\Models\AIOps\FormTestModel;
use CodeIgniter\Config\Services;

/**
 * Sends one generated form submission (GT-FORM-HARNESS-001).
 *
 * execute() refuses to send anything, and writes nothing to the database,
 * unless $options['policy'] is an allowed FormSubmissionPolicy decision.
 * Use plan() to preview the request without sending it.
 */
class FormTestExecutor
{
    /**
     * Preview the request that execute() would send. No network, no DB.
     */
    public function plan(array $analysis, int $formIndex = 0): array
    {
        $form = $this->selectForm($analysis, $formIndex);
        if ($form === null) {
            return ['ok' => false, 'status' => 'BLOCKED', 'reason' => 'no_form'];
        }

        $names = array_map(static fn ($i) => is_array($i) ? (string) ($i['name'] ?? '') : (string) $i, (array) ($form['inputs'] ?? []));

        return [
            'ok'      => true,
            'status'  => 'SKIPPED',
            'reason'  => 'dry_run',
            'method'  => strtoupper((string) ($form['method'] ?? 'GET')),
            'action'  => (string) ($form['action'] ?? ''),
            'payload' => $this->generatePayload($names),
        ];
    }

    public function execute(array $analysis, array $options = []): array
    {
        $policy = $options['policy'] ?? null;
        if (! is_array($policy) || ($policy['allowed'] ?? false) !== true) {
            return [
                'ok'             => false,
                'status'         => 'BLOCKED',
                'reason'         => is_array($policy) ? (string) ($policy['reason'] ?? 'policy_denied') : 'policy_missing',
                'test_id'        => null,
                'error_detected' => false,
                'analysis'       => $analysis,
            ];
        }

        $selected = $this->selectForm($analysis, (int) ($options['form_index'] ?? 0));
        if ($selected !== null) {
            $analysis['form'] = [
                'action' => $selected['action'] ?? '',
                'method' => $selected['method'] ?? 'GET',
                'inputs' => array_map(static fn ($i) => is_array($i) ? (string) ($i['name'] ?? '') : (string) $i, (array) ($selected['inputs'] ?? [])),
            ];
            $analysis['route'] = $selected['route'] ?? ($analysis['route'] ?? []);
        }

        $model = new FormTestModel();

        $source = $analysis['source'] ?? ['type' => 'text', 'value' => ''];
        $ok     = (bool)($analysis['ok'] ?? false);

        $row = [
            'source_type' => (string)($source['type'] ?? ''),
            'source_value' => (string)($source['value'] ?? ''),
            'form_action' => null,
            'http_method' => null,
            'controller_class' => null,
            'route_match' => null,
            'generated_payload' => null,
            'response_status' => null,
            'response_headers' => null,
            'response_body' => null,
            'error_detected' => 0,
            'logs_snapshot' => null,
            'patch_job_created' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (!$ok) {
            $row['error_detected'] = 1;
            $row['response_body']  = $analysis['error'] ?? 'Unknown analyze failure.';
            $row['logs_snapshot']  = $this->tailLogFile(20000);

            $id = $model->insert($row, true);

            return [
                'ok' => false,
                'test_id' => $id,
                'analysis' => $analysis,
                'row' => $row,
            ];
        }

        $form = $analysis['form'] ?? [];
        $route = $analysis['route'] ?? [];

        $action = (string)($form['action'] ?? '');
        $method = strtoupper((string)($form['method'] ?? 'GET'));
        $inputs = (array)($form['inputs'] ?? []);

        $row['form_action'] = $action;
        $row['http_method'] = $method;
        $row['controller_class'] = (string)($route['controller'] ?? '');
        $row['route_match'] = (string)($route['route'] ?? '');

        // STAGING-001: never submit to a target on the destructive skip list.
        $skipReason = FormSubmissionPolicy::destructiveReason($action);
        if ($skipReason !== null) {
            return [
                'ok'             => false,
                'status'         => 'SKIPPED',
                'reason'         => 'destructive_target: ' . $skipReason,
                'test_id'        => null,
                'error_detected' => false,
                'analysis'       => $analysis,
            ];
        }

        $payload = $this->generatePayload($inputs);
        $row['generated_payload'] = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $submitResult = $this->submit($method, $action, $payload);

        $row['response_status']  = $submitResult['status'] ?? null;
        $row['response_headers'] = $submitResult['headers'] ?? null;
        $row['response_body']    = $submitResult['body'] ?? null;

        $logsSnapshot = $this->tailLogFile(50000);
        $row['logs_snapshot'] = $logsSnapshot;

        $errorDetected = $this->detectError($row['response_status'], (string)$row['response_body'], (string)$logsSnapshot);
        $row['error_detected'] = $errorDetected ? 1 : 0;

        $id = $model->insert($row, true);

        return [
            'ok' => true,
            'test_id' => $id,
            'analysis' => $analysis,
            'payload' => $payload,
            'submit' => $submitResult,
            'error_detected' => $errorDetected,
            'row' => $row,
        ];
    }

    private function selectForm(array $analysis, int $index): ?array
    {
        $forms = (array) ($analysis['forms'] ?? []);
        if ($forms !== []) {
            return $forms[$index] ?? null;
        }

        return isset($analysis['form']) && is_array($analysis['form']) ? $analysis['form'] : null;
    }

    private function generatePayload(array $inputs): array
    {
        $payload = [];

        foreach ($inputs as $name) {
            $n = strtolower((string)$name);

            if ($n === '' || $n === 'csrf_test_name' || str_contains($n, 'csrf')) {
                continue;
            }

            // Common patterns
            if (str_contains($n, 'email')) {
                // Synthetic identity on a reserved TLD (RFC 2606): never a real inbox.
                $payload[$name] = 'aiops-form-test+' . date('YmdHis') . '@example.test';
                continue;
            }

            if (str_contains($n, 'phone')) {
                $payload[$name] = '318555' . rand(1000, 9999);
                continue;
            }

            if (str_contains($n, 'amount') || str_contains($n, 'balance') || str_contains($n, 'price') || str_contains($n, 'income')) {
                $payload[$name] = (string) number_format((float)rand(10, 2500) + (rand(0, 99) / 100), 2, '.', '');
                continue;
            }

            if (str_contains($n, 'date') || str_contains($n, 'due')) {
                $payload[$name] = date('Y-m-d');
                continue;
            }

            if (str_contains($n, 'recurring')) {
                $payload[$name] = 'Yes';
                continue;
            }

            if (str_contains($n, 'name') || str_contains($n, 'title')) {
                $payload[$name] = 'AIOps Test ' . date('Y-m-d H:i:s');
                continue;
            }

            if (str_contains($n, 'url') || str_contains($n, 'link')) {
                $payload[$name] = 'https://example.test/' . date('YmdHis');
                continue;
            }

            // Default
            $payload[$name] = 'test_' . substr(md5($name . microtime(true)), 0, 10);
        }

        // Provide a safe fallback payload if no inputs were detected
        if (empty($payload)) {
            $payload['aiops_probe'] = '1';
        }

        return $payload;
    }

    private function submit(string $method, string $action, array $payload): array
    {
        helper(['url']);

        $method = strtoupper($method ?: 'GET');

        // Resolve URL: action may be blank, relative, or full
        $url = $action;
        if ($url === '' || $url === '#') {
            // Cannot infer current page in CLI; return a structured failure
            return [
                'status' => 0,
                'headers' => '',
                'body' => 'Cannot submit: form action is blank.',
            ];
        }

        if (!preg_match('#^https?://#i', $url)) {
            $url = site_url(ltrim($url, '/'));
        }

        $client = Services::curlrequest([
            'timeout' => 25,
            'http_errors' => false,
            'allow_redirects' => true,
        ]);

        try {
            $options = [
                'headers' => [
                    'Accept' => 'application/json, text/html;q=0.9,*/*;q=0.8',
                ],
            ];

            if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                // Prefer form_params for classic forms
                $options['form_params'] = $payload;
            } else {
                // For GET forms
                $options['query'] = $payload;
            }

            $resp = $client->request($method, $url, $options);

            $headers = '';
            foreach ($resp->getHeaders() as $k => $vals) {
                $headers .= $k . ': ' . implode(', ', $vals) . "\n";
            }

            return [
                'status' => $resp->getStatusCode(),
                'headers' => $headers,
                'body' => (string) $resp->getBody(),
                'final_url' => $url,
            ];
        } catch (\Throwable $e) {
            return [
                'status' => 0,
                'headers' => '',
                'body' => 'Submit exception: ' . $e->getMessage(),
                'final_url' => $url,
            ];
        }
    }

    private function detectError(?int $status, string $body, string $logs): bool
    {
        if ($status === null) {
            return true;
        }

        if ($status >= 400 || $status === 0) {
            return true;
        }

        $hay = strtolower($body . "\n" . $logs);

        $signals = [
            'fatal error',
            'uncaught exception',
            'codeigniter\\',
            'whoops!',
            'critical -',
            'error -',
            'undefined variable',
            'undefined array key',
            'call to undefined method',
            'unsupported operand types',
            'memory exhausted',
            'databaseexception',
            'sqlstate',
        ];

        foreach ($signals as $s) {
            if (str_contains($hay, $s)) {
                return true;
            }
        }

        return false;
    }

    private function tailLogFile(int $maxBytes): string
    {
        $file = WRITEPATH . 'logs/log-' . date('Y-m-d') . '.log';
        if (!is_file($file)) {
            return '';
        }

        $size = filesize($file);
        if ($size === false || $size <= 0) {
            return '';
        }

        $fh = @fopen($file, 'rb');
        if (!$fh) {
            return '';
        }

        $start = max(0, $size - $maxBytes);
        fseek($fh, $start);
        $data = stream_get_contents($fh);
        fclose($fh);

        return $data === false ? '' : $data;
    }
}