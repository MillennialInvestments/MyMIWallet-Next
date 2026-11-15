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

        // A PHP-built action such as /Projects/Commit/{php} (an echo tag in the view) cannot be
        // resolved from the view file, so submitting it only tests the placeholder.
        if (str_contains($action, '{') || str_contains($action, '<?')) {
            return [
                'ok'             => false,
                'status'         => 'BLOCKED',
                'reason'         => 'dynamic_action_url',
                'test_id'        => null,
                'error_detected' => false,
                'analysis'       => $analysis,
            ];
        }

        // Guest-only auth forms (sign in, sign up, reset, activation) create
        // accounts, send mail or end the tester's session when posted with
        // junk. The auth-smoke tests cover them.
        $session = $this->session();
        if ($session !== null && $session->wantsLogin()) {
            $session->ensureLoggedIn();
            if (! $session->isLoggedIn()) {
                // Submitting signed out only produces 401s and noise.
                return [
                    'ok'             => false,
                    'status'         => 'BLOCKED',
                    'reason'         => 'tester_sign_in_failed',
                    'test_id'        => null,
                    'error_detected' => false,
                    'analysis'       => $analysis,
                ];
            }
        }
        if ($session !== null && self::isGuestAuthForm($action)) {
            return [
                'ok'             => false,
                'status'         => 'SKIPPED',
                'reason'         => 'guest_auth_form',
                'test_id'        => null,
                'error_detected' => false,
                'analysis'       => $analysis,
            ];
        }

        $payload = $this->generatePayload($inputs);
        $row['generated_payload'] = json_encode($payload, JSON_UNESCAPED_SLASHES);

        $since = date('Y-m-d H:i:s');
        $submitResult = $this->submit($method, $action, $payload);

        $row['response_status']  = $submitResult['status'] ?? null;
        $row['response_headers'] = $submitResult['headers'] ?? null;
        $row['response_body']    = $submitResult['body'] ?? null;

        // Only log lines written during this submit count; older errors in
        // the day's log used to fail every later form.
        $newErrors = self::errorLinesSince($since);
        $logsSnapshot = implode("\n", $newErrors);
        $row['logs_snapshot'] = $logsSnapshot;

        $verdict = self::classify((int) ($row['response_status'] ?? 0), (string) ($submitResult['location'] ?? ''), (string) $row['response_body'], $newErrors);
        $errorDetected = $verdict['fail'];
        $row['error_detected'] = $errorDetected ? 1 : 0;

        $id = $model->insert($row, true);

        return [
            'ok' => true,
            'note' => $verdict['note'],
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

    private ?FormTestSession $session = null;
    private bool $sessionResolved = false;

    /** Lets a caller (or a test) give the executor a session; otherwise it is read from env once. */
    public function useSession(?FormTestSession $session): void
    {
        $this->session = $session;
        $this->sessionResolved = true;
    }

    /** @return list<string> What the staging session did (signed in, refused, ...). Empty when no session was used. */
    public function sessionNotes(): array
    {
        return $this->sessionResolved && $this->session !== null ? $this->session->notes() : [];
    }

    private function session(): ?FormTestSession
    {
        if (! $this->sessionResolved) {
            $this->session = FormTestSession::fromEnv();
            $this->sessionResolved = true;
        }

        return $this->session;
    }

    public static function isGuestAuthForm(string $action): bool
    {
        $path = strtolower(trim((string) (parse_url($action, PHP_URL_PATH) ?? $action), '/'));
        $path = preg_replace('~^index\.php/~', '', $path);

        return (bool) preg_match('~^(login|register(/.*)?|forgot(-password)?|resend-activation|auth/.*|reset-password.*)$~', $path);
    }

    /**
     * PASS/FAIL for one live submit.
     * - 2xx: pass unless the body or new log lines show an error
     * - 3xx: pass (the handler answered with a redirect) unless it sent the
     *   signed-in tester to /login
     * - 400/422: pass, the handler rejected the generated junk input
     * - anything else, or new ERROR/CRITICAL log lines: fail
     *
     * @param list<string> $newErrors
     * @return array{fail: bool, note: string}
     */
    public static function classify(int $status, string $location, string $body, array $newErrors): array
    {
        if ($newErrors !== []) {
            return ['fail' => true, 'note' => 'log: ' . mb_substr($newErrors[0], 0, 160)];
        }
        if ($status === 0) {
            return ['fail' => true, 'note' => mb_substr($body, 0, 160)];
        }
        if ($status >= 300 && $status < 400) {
            $path = (string) (parse_url($location, PHP_URL_PATH) ?? '');
            if (preg_match('~/login$~i', $path)) {
                return ['fail' => true, 'note' => 'redirected to /login (not allowed for the tester, or session lost)'];
            }

            return ['fail' => false, 'note' => 'redirect to ' . ($path !== '' ? $path : '?')];
        }
        if ($status === 400 || $status === 422) {
            return ['fail' => false, 'note' => 'rejected the generated input (validation)'];
        }
        if ($status >= 400) {
            return ['fail' => true, 'note' => 'HTTP ' . $status];
        }
        $hay = strtolower($body);
        foreach (['fatal error', 'uncaught exception', 'whoops!', 'undefined variable', 'undefined array key', 'call to undefined method', 'databaseexception', 'sqlstate'] as $signal) {
            if (str_contains($hay, $signal)) {
                return ['fail' => true, 'note' => 'page shows: ' . $signal];
            }
        }

        return ['fail' => false, 'note' => 'HTTP ' . $status];
    }

    /** @return list<string> ERROR/CRITICAL/ALERT/EMERGENCY lines the site logged since $since. */
    public static function errorLinesSince(string $since, ?string $logDir = null, int $max = 5): array
    {
        $file = rtrim($logDir ?? (WRITEPATH . 'logs'), '/') . '/log-' . substr($since, 0, 10) . '.php';
        if (! is_readable($file)) {
            return [];
        }
        $out = [];
        foreach (file($file, FILE_IGNORE_NEW_LINES) ?: [] as $line) {
            if (preg_match('/^(ERROR|CRITICAL|ALERT|EMERGENCY) - (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}) --> (.*)$/', $line, $m) && $m[2] >= $since) {
                $out[] = $m[1] . ' ' . $m[3];
                if (count($out) >= $max) {
                    break;
                }
            }
        }

        return $out;
    }

    /**
     * Response headers as text. headers() holds Header objects (a list of them
     * for repeated headers such as Set-Cookie), so read each as a line.
     */
    public static function headerText($response): string
    {
        $text = '';
        foreach ($response->headers() as $name => $header) {
            $values = [];
            foreach (is_array($header) ? $header : [$header] as $h) {
                $values[] = $h->getValueLine();
            }
            $text .= $name . ': ' . implode(', ', $values) . "\n";
        }

        return $text;
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

        // Do not follow redirects: the handler's own answer (usually a 303) is
        // the result, and following it only tests the next page.
        $client = Services::curlrequest([
            'timeout' => 25,
            'http_errors' => false,
            'allow_redirects' => false,
        ], null, null, false);

        try {
            $options = [
                'headers' => [
                    'Accept' => 'application/json, text/html;q=0.9,*/*;q=0.8',
                ],
            ];

            // STAGING-002: on staging, submit as the signed-in test account.
            $session = $this->session();
            if ($session !== null) {
                $payload = $session->preparePayload($method, $payload);
                $extra = $session->requestOptions();
                $options['headers'] = array_merge($options['headers'], (array) ($extra['headers'] ?? []));
                unset($extra['headers']);
                $options += $extra;
            }

            if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                // Prefer form_params for classic forms
                $options['form_params'] = $payload;
            } else {
                // For GET forms
                $options['query'] = $payload;
            }

            $resp = $client->request($method, $url, $options);
            if ($session !== null) {
                $session->absorb($resp);
            }

            $headers = self::headerText($resp);

            return [
                'status' => $resp->getStatusCode(),
                'headers' => $headers,
                'body' => (string) $resp->getBody(),
                'final_url' => $url,
                'location' => $resp->hasHeader('Location') ? $resp->getHeaderLine('Location') : '',
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