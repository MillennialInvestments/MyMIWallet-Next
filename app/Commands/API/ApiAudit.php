<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use Config\App;
use Config\Services;
use CodeIgniter\CLI\CLI;
use RuntimeException;

class ApiAudit extends SafeBaseCommand
{
    protected $group = 'aiops';
    protected $name = 'api:audit';
    protected $description = 'Audit API endpoints defined in docs/api/schematic.yaml and capture runtime health.';

    private const RESPONSE_PREVIEW_LIMIT = 1200;
    private const PERFORMANCE_THRESHOLD_MS = 2000;

    public function run(array $params)
    {
        $this->parseParams($params);
        log_message('info', '[spark:api:audit] Started', ['params' => $params]);

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, null);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $schematicPath = ROOTPATH . 'docs/api/schematic.yaml';
        if (! is_file($schematicPath)) {
            CLI::error('Missing schematic.yaml at ' . $schematicPath);
            return EXIT_ERROR;
        }

        $entries = $this->loadSchematic($schematicPath);
        if ($entries === []) {
            CLI::error('No endpoints found in schematic.yaml');
            return EXIT_ERROR;
        }

        $requester = new ApiAuditRequester();
        $report = [
            'generated_at' => date('c'),
            'timestamp' => $resolved['timestamp'],
            'summary' => [
                'total' => count($entries),
                'skipped' => 0,
                'passed' => 0,
                'failed' => 0,
            ],
            'endpoints' => [],
        ];

        $rows = [];

        foreach ($entries as $entry) {
            $audit = $this->auditEndpoint($requester, $entry);
            $report['endpoints'][] = $audit;

            if ($audit['skipped']) {
                $report['summary']['skipped']++;
            } elseif ($audit['status'] === 'pass') {
                $report['summary']['passed']++;
            } else {
                $report['summary']['failed']++;
            }

            $rows[] = [
                $audit['id'],
                $audit['http_method'],
                $audit['route'] ?? 'n/a',
                $audit['status'],
                $audit['status_code'] ?? 'n/a',
            $audit['response_time_ms'] ?? 'n/a',
            $audit['failure_classification'] ?? '-',
        ];
    }

    CLI::newLine();
    CLI::table($rows, ['id', 'method', 'route', 'status', 'code', 'ms', 'failure']);

    $summaryLines = [
        '# API Audit Report',
        '',
        '- Timestamp: ' . $resolved['timestamp'],
        '- Total endpoints: ' . $report['summary']['total'],
        '- Passed: ' . $report['summary']['passed'],
        '- Failed: ' . $report['summary']['failed'],
        '- Skipped: ' . $report['summary']['skipped'],
        '',
        '## Endpoints',
    ];

    foreach ($report['endpoints'] as $endpoint) {
        $summaryLines[] = sprintf(
            '- %s %s: %s (%s)',
            $endpoint['http_method'],
            $endpoint['route'] ?? 'n/a',
            $endpoint['status'],
            $endpoint['status_code'] ?? 'n/a'
        );
    }

    $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;
    $report['artifact_dir'] = $resolved['dir'];

    if (! ArtifactHelper::writeArtifacts($resolved['dir'], $summary, $report)) {
        return EXIT_ERROR;
    }

    CLI::newLine();
    CLI::write('Report saved to ' . $resolved['dir'], 'green');

    log_message('info', '[spark:api:audit] Completed', [
        'summary' => $report['summary'],
        'report_path' => $resolved['dir'],
    ]);

        return EXIT_SUCCESS;
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function loadSchematic(string $path): array
    {
        $raw = trim((string) file_get_contents($path));
        if ($raw === '') {
            return [];
        }

        $decoded = json_decode($raw, true);
        if (! is_array($decoded)) {
            throw new RuntimeException('schematic.yaml must be valid JSON (YAML-compatible).');
        }

        return $decoded;
    }

    /**
     * @param array<string, mixed> $entry
     * @return array<string, mixed>
     */
    private function auditEndpoint(ApiAuditRequester $requester, array $entry): array
    {
        $id = (string) ($entry['id'] ?? 'unknown');
        $httpMethod = strtoupper((string) ($entry['http_method'] ?? 'UNKNOWN'));
        $route = $entry['route'] ?? null;
        $expectedKeys = $entry['expected_response_keys'] ?? [];
        $testStrategy = (string) ($entry['test_strategy'] ?? 'skip');

        $audit = [
            'id' => $id,
            'controller' => $entry['controller'] ?? null,
            'method' => $entry['method'] ?? null,
            'route' => $route,
            'http_method' => $httpMethod,
            'skipped' => false,
            'status' => 'fail',
            'status_code' => null,
            'response_time_ms' => null,
            'response_preview' => null,
            'validation_passed' => false,
            'failure_classification' => null,
            'recommended_fix' => null,
            'notes' => [],
        ];

        if ($testStrategy === 'skip' || $route === null) {
            $audit['skipped'] = true;
            $audit['status'] = 'skip';
            if ($route === null) {
                $audit['failure_classification'] = 'ROUTE_MISSING';
                $audit['recommended_fix'] = 'Register the route in app/Config/Routes.php or update schematic.yaml.';
            }
            return $audit;
        }

        if ($httpMethod !== 'GET') {
            $audit['skipped'] = true;
            $audit['status'] = 'skip';
            $audit['notes'][] = 'Non-GET requests are skipped to avoid side effects.';
            return $audit;
        }

        $uri = ltrim($route, '/');
        $start = microtime(true);

        try {
            $response = $requester->get($uri);
            $durationMs = (int) round((microtime(true) - $start) * 1000);

            $statusCode = $response->getStatusCode();
            $body = (string) $response->getBody();
            $preview = $this->truncate($body, self::RESPONSE_PREVIEW_LIMIT);

            $audit['status_code'] = $statusCode;
            $audit['response_time_ms'] = $durationMs;
            $audit['response_preview'] = $preview;

            $validation = $this->validateResponse($statusCode, $body, $expectedKeys);
            $audit['validation_passed'] = $validation['passed'];

            if ($validation['passed'] && $statusCode < 500 && $durationMs < self::PERFORMANCE_THRESHOLD_MS) {
                $audit['status'] = 'pass';
                return $audit;
            }

            $audit['status'] = 'fail';
            $classification = $this->classifyFailure($statusCode, $body, $durationMs, $validation['passed']);
            $audit['failure_classification'] = $classification['type'];
            $audit['recommended_fix'] = $classification['recommendation'];
            if ($validation['notes'] !== []) {
                $audit['notes'] = array_merge($audit['notes'], $validation['notes']);
            }
        } catch (\Throwable $error) {
            $audit['status'] = 'fail';
            $audit['failure_classification'] = 'EXCEPTION_THROWN';
            $audit['recommended_fix'] = 'Inspect logs for exceptions and add guards around service dependencies.';
            $audit['notes'][] = $error->getMessage();
        }

        return $audit;
    }

    /**
     * @param array<int, string> $expectedKeys
     * @return array{passed: bool, notes: array<int, string>}
     */
    private function validateResponse(int $statusCode, string $body, array $expectedKeys): array
    {
        $notes = [];

        if ($statusCode >= 500) {
            return ['passed' => false, 'notes' => ['Server error response']];
        }

        if (trim($body) === '') {
            return ['passed' => false, 'notes' => ['Empty response body']];
        }

        $decoded = null;
        $isJson = false;
        $trimmed = trim($body);
        if (str_starts_with($trimmed, '{') || str_starts_with($trimmed, '[')) {
            $decoded = json_decode($body, true);
            $isJson = json_last_error() === JSON_ERROR_NONE;
            if (! $isJson) {
                return ['passed' => false, 'notes' => ['Malformed JSON response']];
            }
        }

        if ($expectedKeys !== [] && $isJson && is_array($decoded)) {
            foreach ($expectedKeys as $key) {
                if (! array_key_exists($key, $decoded)) {
                    $notes[] = sprintf('Missing expected key: %s', $key);
                }
            }
        }

        return ['passed' => $notes === [], 'notes' => $notes];
    }

    /**
     * @return array{type: string, recommendation: string}
     */
    private function classifyFailure(int $statusCode, string $body, int $durationMs, bool $validationPassed): array
    {
        if ($statusCode === 404) {
            return [
                'type' => 'ROUTE_MISSING',
                'recommendation' => 'Confirm route registration in app/Config/Routes.php and update docs/api/schematic.yaml.',
            ];
        }

        if (in_array($statusCode, [401, 403], true)) {
            return [
                'type' => 'AUTH_BLOCKED',
                'recommendation' => 'Verify auth filters, tokens, or session requirements for this endpoint.',
            ];
        }

        if ($statusCode >= 500) {
            return [
                'type' => 'EXCEPTION_THROWN',
                'recommendation' => 'Inspect server logs for stack traces and ensure dependencies are available.',
            ];
        }

        if ($durationMs >= self::PERFORMANCE_THRESHOLD_MS) {
            return [
                'type' => 'PERFORMANCE_DEGRADED',
                'recommendation' => 'Profile slow calls, add caching, or review downstream service latency.',
            ];
        }

        if (! $validationPassed || trim($body) === '') {
            return [
                'type' => 'INVALID_RESPONSE',
                'recommendation' => 'Normalize JSON responses and ensure required keys are always returned.',
            ];
        }

        return [
            'type' => 'INVALID_RESPONSE',
            'recommendation' => 'Validate response payloads and ensure API contracts are met.',
        ];
    }

    private function truncate(string $value, int $limit): string
    {
        if (mb_strlen($value) <= $limit) {
            return $value;
        }

        return mb_substr($value, 0, $limit) . '…';
    }
}

class ApiAuditRequester
{
    /**
     * @return ApiAuditHttpResponse
     */
    public function get(string $uri, array $params = []): ApiAuditHttpResponse
    {
        /** @var App $app */
        $app = config('App');
        $baseUri = rtrim((string) ($app->baseURL ?? ''), '/');

        if ($baseUri === '') {
            throw new RuntimeException('App.baseURL is not configured; unable to audit API routes over HTTP.');
        }

        $requestUrl = $baseUri . '/' . ltrim($uri, '/');
        if ($params !== []) {
            $requestUrl .= '?' . http_build_query($params);
        }

        $client = Services::curlrequest([
            'http_errors' => false,
            'timeout' => 15,
            'verify' => false,
        ]);

        $response = $client->request('GET', $requestUrl);

        return new ApiAuditHttpResponse($response->getStatusCode(), (string) $response->getBody());
    }
}

class ApiAuditHttpResponse
{
    public function __construct(private readonly int $statusCode, private readonly string $body)
    {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
