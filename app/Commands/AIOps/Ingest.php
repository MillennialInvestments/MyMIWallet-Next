<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\AIOps\InstructionService;
use CodeIgniter\CLI\CLI;
use Throwable;

class Ingest extends SafeBaseCommand
{
    protected $group       = 'AIOps - Run';
    protected $name        = 'aiops:ingest';
    protected $description = 'Ingest AI instruction text and enqueue for AIOps worker (analysis + patch + PR prep)';

    protected $usage = 'aiops:ingest [--text="..."] [--file=/path/file.txt] [--auto-pr] [--dry-run] [--severity=LOW|MEDIUM|HIGH]';

    public function run(array $params)
    {
        $argv = $_SERVER['argv'] ?? [];

        $text     = $this->getArgvOption($argv, 'text');
        $file     = $this->getArgvOption($argv, 'file');
        $severity = $this->getArgvOption($argv, 'severity');

        $autoPR = $this->hasArgvFlag($argv, 'auto-pr');
        $dryRun = $this->hasArgvFlag($argv, 'dry-run');

        if (! $text && ! $file && $this->stdinHasData()) {
            $text = trim((string) stream_get_contents(STDIN));
        }

        if (! $text && $file) {
            if (! is_file($file)) {
                CLI::error("File not found: {$file}");
                return EXIT_ERROR;
            }
            $text = (string) file_get_contents($file);
        }

        if (! $text) {
            CLI::error('Provide --text="..." OR --file=/path/to/file.txt OR pipe input.');
            CLI::newLine();
            CLI::write('Examples:');
            CLI::write('  php spark aiops:ingest --text="Hello world"');
            CLI::write('  php spark aiops:ingest --file=/tmp/instructions.txt');
            CLI::write('  cat /tmp/instructions.txt | php spark aiops:ingest');
            return EXIT_ERROR;
        }

        CLI::write('🧠 Ingesting instruction...');
        CLI::write('Length: ' . strlen($text) . ' chars');

        $service = new InstructionService();
        $result = [
            'id' => null,
            'status' => 'skipped',
            'risk' => 'unknown',
            'classification' => 'unknown',
        ];

        try {
            $result = $service->enqueueInstruction(
                text: $text,
                source: 'ssh',
                autoPR: $autoPR,
                dryRun: $dryRun,
                severityOverride: $severity
            );
        } catch (Throwable $e) {
            CLI::write('⚠ Unable to enqueue instruction: ' . $e->getMessage(), 'yellow');
        }

        $frontendIncidents = $this->detectFrontendIncidents($text);
        $frontendReport = null;
        $storedCount = 0;
        $priorityRan = false;

        if ($frontendIncidents !== []) {
            $storedCount = $this->storeFrontendIncidents($frontendIncidents);
            $frontendReport = $this->writeFrontendIncidentReport($frontendIncidents);
            $this->writeSafeFetchTemplate();

            try {
                command('aiops:priority:build --source=frontend');
                $priorityRan = true;
            } catch (Throwable $e) {
                CLI::write('⚠ Failed to run aiops:priority:build --source=frontend: ' . $e->getMessage(), 'yellow');
            }

            $this->printFrontendSummary($frontendIncidents);
            CLI::write('Stored incidents: ' . $storedCount);
            if ($frontendReport !== null) {
                CLI::write('Frontend report: ' . $frontendReport);
            }
            CLI::write('Priority injection: ' . ($priorityRan ? 'executed' : 'failed'), $priorityRan ? 'green' : 'yellow');
        }

        CLI::newLine();
        CLI::write('Instruction ID: ' . ($result['id'] ?? 'n/a'));
        CLI::write('Status: ' . ($result['status'] ?? 'queued'));
        CLI::write('Risk: ' . ($result['risk'] ?? 'TBD'));
        CLI::write('Classification: ' . ($result['classification'] ?? 'TBD'));
        CLI::write('Next: php spark aiops:worker --once');

        return EXIT_SUCCESS;
    }

    /**
     * @return array<int, array{incident_type:string,source_file:string,endpoint:?string,message:string,severity:string,raw_blob:string,line_number:?int,status:string}>
     */
    private function detectFrontendIncidents(string $text): array
    {
        $incidents = [];
        $lines = preg_split('/\r\n|\r|\n/', $text) ?: [];

        foreach ($lines as $lineIndex => $line) {
            $line = trim((string) $line);
            if ($line === '') {
                continue;
            }

            $lineNumber = $lineIndex + 1;
            $lower = strtolower($line);
            $sourceFile = $this->extractSourceFile($line) ?? 'unknown';
            $sourceLine = $this->extractSourceLine($line);

            if (
                str_contains($lower, 'violates the following content security policy')
                || str_contains($lower, 'applying inline style')
                || str_contains($lower, 'executing inline script')
            ) {
                if (str_contains($lower, 'inline style') || str_contains($lower, 'style-src')) {
                    $incidents[] = $this->incidentRow('csp_style', $sourceFile, null, $line, 'MEDIUM', $lineNumber, $sourceLine);
                }

                if (str_contains($lower, 'inline script') || str_contains($lower, 'script-src')) {
                    $incidents[] = $this->incidentRow('csp_script', $sourceFile, null, $line, 'HIGH', $lineNumber, $sourceLine);
                }

                continue;
            }

            if (preg_match('/GET\s+([^\s]+)\s+404/i', $line, $match) === 1) {
                $endpoint = $this->extractApiPath($match[1]);
                if ($endpoint !== null && str_starts_with($endpoint, '/API/')) {
                    $incidents[] = $this->incidentRow('api_404', $sourceFile, $endpoint, $line, 'HIGH', $lineNumber, $sourceLine);
                    continue;
                }
            }

            if (str_contains($lower, "unexpected token '<'") && (str_contains($lower, 'fetch') || str_contains($lower, 'json'))) {
                $incidents[] = $this->incidentRow('json_parse', $sourceFile, null, $line, 'HIGH', $lineNumber, $sourceLine);
                continue;
            }

            if (str_contains($lower, 'duplicate pixel id')) {
                $incidents[] = $this->incidentRow('duplicate_pixel', $sourceFile, null, $line, 'LOW', $lineNumber, $sourceLine);
                continue;
            }
        }

        return $incidents;
    }

    /**
     * @return array{incident_type:string,source_file:string,endpoint:?string,message:string,severity:string,raw_blob:string,line_number:?int,status:string}
     */
    private function incidentRow(string $incidentType, string $sourceFile, ?string $endpoint, string $line, string $severity, int $lineNumber, ?int $sourceLine): array
    {
        return [
            'incident_type' => $incidentType,
            'source_file' => $sourceFile,
            'endpoint' => $endpoint,
            'message' => $line,
            'severity' => $severity,
            'raw_blob' => $line,
            'line_number' => $sourceLine ?? $lineNumber,
            'status' => 'new',
        ];
    }

    private function extractApiPath(string $uri): ?string
    {
        $candidate = trim($uri);
        if ($candidate === '') {
            return null;
        }

        if (str_starts_with($candidate, '/')) {
            return strtok($candidate, '?') ?: $candidate;
        }

        $parts = parse_url($candidate);
        if (! is_array($parts)) {
            return null;
        }

        $path = $parts['path'] ?? null;
        if (! is_string($path) || $path === '') {
            return null;
        }

        return strtok($path, '?') ?: $path;
    }

    private function extractSourceFile(string $line): ?string
    {
        if (preg_match('/\b([A-Za-z][A-Za-z0-9_-]{2,})\s*:\s*\d+\b/', $line, $match) === 1) {
            return $match[1];
        }

        if (preg_match('/\(([A-Za-z][A-Za-z0-9_-]{2,})\s*:\s*\d+\)/', $line, $match) === 1) {
            return $match[1];
        }

        return null;
    }

    private function extractSourceLine(string $line): ?int
    {
        if (preg_match('/\b[A-Za-z][A-Za-z0-9_-]{2,}\s*:\s*(\d+)\b/', $line, $match) === 1) {
            return (int) $match[1];
        }

        return null;
    }

    /**
     * @param array<int, array{incident_type:string,source_file:string,endpoint:?string,message:string,severity:string,raw_blob:string,line_number:?int,status:string}> $incidents
     */
    private function storeFrontendIncidents(array $incidents): int
    {
        try {
            $db = \Config\Database::connect();
            $stored = 0;

            foreach ($incidents as $incident) {
                $ok = $db->table('bf_frontend_incidents')->insert([
                    'incident_type' => $incident['incident_type'],
                    'source_file' => $incident['source_file'],
                    'endpoint' => $incident['endpoint'],
                    'message' => $incident['message'],
                    'severity' => $incident['severity'],
                    'raw_blob' => $incident['raw_blob'],
                    'created_at' => date('Y-m-d H:i:s'),
                    'processed_at' => null,
                    'status' => $incident['status'],
                ]);

                if ($ok) {
                    $stored++;
                }
            }

            return $stored;
        } catch (Throwable $e) {
            CLI::write('⚠ Unable to persist frontend incidents: ' . $e->getMessage(), 'yellow');
            return 0;
        }
    }

    /**
     * @param array<int, array{incident_type:string,source_file:string,endpoint:?string,message:string,severity:string,raw_blob:string,line_number:?int,status:string}> $incidents
     */
    private function writeFrontendIncidentReport(array $incidents): string
    {
        $dir = ROOTPATH . 'docs/_aiops/frontend';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $timestamp = date('Ymd-Hi');
        $relativePath = 'docs/_aiops/frontend/frontend-incident-report-' . $timestamp . '.md';
        $fullPath = ROOTPATH . $relativePath;

        $highCount = count(array_filter($incidents, static fn(array $row): bool => in_array($row['severity'], ['HIGH', 'CRITICAL'], true)));
        $subsystems = array_values(array_unique(array_map(static fn(array $row): string => $row['source_file'], $incidents)));
        sort($subsystems);

        $cspStyle = array_values(array_filter($incidents, static fn(array $row): bool => $row['incident_type'] === 'csp_style'));
        $cspScript = array_values(array_filter($incidents, static fn(array $row): bool => $row['incident_type'] === 'csp_script'));
        $api404 = array_values(array_filter($incidents, static fn(array $row): bool => $row['incident_type'] === 'api_404'));
        $jsonParse = array_values(array_filter($incidents, static fn(array $row): bool => $row['incident_type'] === 'json_parse'));

        $endpointCounts = [];
        foreach ($api404 as $row) {
            $endpoint = $row['endpoint'] ?? 'unknown';
            $endpointCounts[$endpoint] = ($endpointCounts[$endpoint] ?? 0) + 1;
        }
        ksort($endpointCounts);

        $lines = [];
        $lines[] = '# Frontend Incident Report';
        $lines[] = '';
        $lines[] = '## Executive Summary';
        $lines[] = '- Generated: ' . date('c');
        $lines[] = '- Total incidents: ' . count($incidents);
        $lines[] = '- High severity count: ' . $highCount;
        $lines[] = '- Affected subsystems: ' . ($subsystems === [] ? 'none' : implode(', ', $subsystems));
        $lines[] = '- Risk level: ' . $this->highestSeverity($incidents);
        $lines[] = '';
        $lines[] = '## CSP Violations';
        $lines[] = '### style-src';
        if ($cspStyle === []) {
            $lines[] = '- none';
        } else {
            foreach ($cspStyle as $row) {
                $lines[] = sprintf('- %s:%s — %s', $row['source_file'], (string) ($row['line_number'] ?? '?'), $row['message']);
            }
        }
        $lines[] = '';
        $lines[] = '### script-src';
        if ($cspScript === []) {
            $lines[] = '- none';
        } else {
            foreach ($cspScript as $row) {
                $lines[] = sprintf('- %s:%s — %s', $row['source_file'], (string) ($row['line_number'] ?? '?'), $row['message']);
            }
        }

        $lines[] = '';
        $lines[] = '## API Endpoint Failures';
        if ($endpointCounts === []) {
            $lines[] = '- none';
        } else {
            foreach ($endpointCounts as $endpoint => $count) {
                $lines[] = '- `' . $endpoint . '` — count: ' . $count;
            }
        }

        $lines[] = '';
        $lines[] = '## Root Cause Analysis';
        if ($api404 !== [] || $jsonParse !== []) {
            $lines[] = '- JSON parse errors occur when frontend fetch logic expects JSON but receives an HTML 404 payload.';
            $lines[] = '- Missing or mismatched API routes under `/API/*` produce 404 responses that cascade into parse failures.';
        } else {
            $lines[] = '- No API 404/JSON parse coupling detected in this ingest run.';
        }

        $lines[] = '';
        $lines[] = '## Fix Strategy (Non-breaking)';
        $lines[] = '- Add safe fetch guard: check `response.ok` before parsing body.';
        $lines[] = '- Verify response content type includes `application/json` before `response.json()`.';
        $lines[] = '- Verify API route definitions and route groups in `app/Config/Routes.php`.';
        $lines[] = '- Confirm rewrite behavior and `index.php` path assumptions in Nginx/CI4 routing.';
        $lines[] = '- Deduplicate Meta Pixel initialization in shared layout files.';

        file_put_contents($fullPath, implode("\n", $lines) . "\n");

        return $relativePath;
    }

    private function writeSafeFetchTemplate(): void
    {
        $dir = ROOTPATH . 'docs/_aiops/patches';
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }

        $path = $dir . '/frontend-safe-fetch-template.js';
        $content = <<<'JS'
async function safeFetchJson(url) {
    const response = await fetch(url);

    if (!response.ok) {
        console.error('Fetch failed:', response.status);
        return null;
    }

    const contentType = response.headers.get('content-type') || '';

    if (!contentType.includes('application/json')) {
        console.error('Invalid JSON response');
        return null;
    }

    return response.json();
}
JS;

        file_put_contents($path, $content . "\n");
    }

    /**
     * @param array<int, array{incident_type:string,source_file:string,endpoint:?string,message:string,severity:string,raw_blob:string,line_number:?int,status:string}> $incidents
     */
    private function printFrontendSummary(array $incidents): void
    {
        $counts = [
            'csp_style' => 0,
            'csp_script' => 0,
            'api_404' => 0,
            'json_parse' => 0,
            'duplicate_pixel' => 0,
        ];

        foreach ($incidents as $incident) {
            $type = $incident['incident_type'];
            if (isset($counts[$type])) {
                $counts[$type]++;
            }
        }

        CLI::newLine();
        CLI::write('FRONTEND INCIDENT SUMMARY');
        CLI::write('--------------------------');
        CLI::write('CSP style violations: ' . $counts['csp_style']);
        CLI::write('CSP script violations: ' . $counts['csp_script']);
        CLI::write('API 404 endpoints: ' . $counts['api_404']);
        CLI::write('JSON parse errors: ' . $counts['json_parse']);
        CLI::write('Duplicate pixel: ' . $counts['duplicate_pixel']);
        CLI::newLine();
        CLI::write('Highest severity: ' . $this->highestSeverity($incidents));
        CLI::newLine();
        CLI::write('NEXT RECOMMENDED STEP:');

        if ($counts['api_404'] > 0 || $counts['json_parse'] > 0) {
            CLI::write('php spark aiops:routes:scan --filter=Investments');
            CLI::newLine();
            CLI::write('OR');
            CLI::newLine();
            CLI::write('php spark aiops:repair:plan --incident-type=api_404');
            return;
        }

        CLI::write('php spark aiops:priority:build --source=frontend');
    }

    /**
     * @param array<int, array{severity:string}> $incidents
     */
    private function highestSeverity(array $incidents): string
    {
        $levels = ['LOW' => 1, 'MEDIUM' => 2, 'HIGH' => 3, 'CRITICAL' => 4];
        $max = 'LOW';

        foreach ($incidents as $incident) {
            $severity = strtoupper((string) ($incident['severity'] ?? 'LOW'));
            if (($levels[$severity] ?? 0) > ($levels[$max] ?? 0)) {
                $max = $severity;
            }
        }

        return $max;
    }

    private function getArgvOption(array $argv, string $key): ?string
    {
        $needleEq = '--' . $key . '=';
        $needle   = '--' . $key;

        foreach ($argv as $i => $arg) {
            if (str_starts_with((string) $arg, $needleEq)) {
                $val = substr((string) $arg, strlen($needleEq));
                return $val !== '' ? $val : null;
            }

            if ($arg === $needle) {
                $next = $argv[$i + 1] ?? null;
                if ($next !== null && ! str_starts_with((string) $next, '--')) {
                    return (string) $next;
                }
            }
        }

        return null;
    }

    private function hasArgvFlag(array $argv, string $flag): bool
    {
        $needle = '--' . $flag;
        foreach ($argv as $arg) {
            if ($arg === $needle) {
                return true;
            }
        }

        return false;
    }

    private function stdinHasData(): bool
    {
        return function_exists('posix_isatty') ? ! posix_isatty(STDIN) : false;
    }
}
