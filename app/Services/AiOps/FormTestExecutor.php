<?php

declare(strict_types=1);

namespace App\Services\AiOps;

use App\Models\AiOps\FormTestModel;
use CodeIgniter\Config\Services;

class FormTestExecutor
{
    public function execute(array $analysis, array $options = []): array
    {
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
                $payload[$name] = 'test+' . date('YmdHis') . '@example.com';
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
                $payload[$name] = 'https://example.com/' . date('YmdHis');
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
            'allow_redirects' => ['max' => 3, 'strict' => true],
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
                'body' => mb_substr((string) $resp->getBody(), 0, 120000),
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
