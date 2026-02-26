<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Services\ApiGovernanceService;
use CodeIgniter\CLI\CLI;
use Config\Database;

class ApiAudit extends SafeBaseCommand
{
    protected $group = 'API';
    protected $name = 'api:audit';
    protected $description = 'Institutional API governance audit: routes, permissions, filters, rate limits, and versioning.';

    public function run(array $params)
    {
        $runUuid = bin2hex(random_bytes(8));
        $svc = new ApiGovernanceService();
        $scan = $svc->scan($runUuid);

        $stamp = date('Ymd-His');
        $dir = ROOTPATH . 'docs/APIs/audit/' . $stamp . '_' . $runUuid;
        @mkdir($dir, 0775, true);

        $this->writeInventoryDocs($scan);
        $this->writeCoverageDocs($scan);
        $this->writeOpenApi($scan);
        try {
            $this->persistAudit($scan);
        } catch (\Throwable $e) {
            CLI::write('DB persistence skipped: ' . $e->getMessage(), 'yellow');
        }

        $lines = [
            '# API Governance Audit Report',
            '- Timestamp: ' . $scan['metadata']['timestamp'],
            '- Run UUID: ' . $scan['metadata']['run_uuid'],
            '- Environment: ' . $scan['metadata']['environment'],
            '- Summary Counts: ' . json_encode($scan['metadata']['summary']),
            '',
            '## Actionable Remediation List',
        ];
        foreach ($scan['remediations'] as $item) {
            $lines[] = sprintf('- [%s] %s => %s', $item['severity'], $item['endpoint'], $item['remediation']);
        }

        $body = implode(PHP_EOL, $lines) . PHP_EOL;
        file_put_contents($dir . '/report.md', $body);
        @mkdir(ROOTPATH . 'docs/APIs/audit', 0775, true);
        file_put_contents(ROOTPATH . 'docs/APIs/audit/latest.md', $body);

        CLI::write('Audit completed: ' . $dir, 'green');
        return EXIT_SUCCESS;
    }

    private function writeInventoryDocs(array $scan): void
    {
        @mkdir(ROOTPATH . 'docs/APIs', 0775, true);
        file_put_contents(ROOTPATH . 'docs/APIs/_inventory_routes.md', $this->renderRoutesInventory($scan));
        file_put_contents(ROOTPATH . 'docs/APIs/_inventory_controllers.md', $this->renderControllersInventory($scan));
        file_put_contents(ROOTPATH . 'docs/APIs/_inventory_filters.md', $this->renderFiltersInventory($scan));
        file_put_contents(ROOTPATH . 'docs/APIs/_inventory_rate_limits.md', $this->renderRateInventory($scan));
    }

    private function writeCoverageDocs(array $scan): void
    {
        @mkdir(ROOTPATH . 'docs/security', 0775, true);
        file_put_contents(ROOTPATH . 'docs/security/filter-coverage.md', $this->renderFilterCoverage($scan));
        file_put_contents(ROOTPATH . 'docs/APIs/rate-limit-coverage.md', $this->renderRateCoverage($scan));
        file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', $this->renderDeprecations($scan));
    }

    private function writeOpenApi(array $scan): void
    {
        @mkdir(ROOTPATH . 'docs/APIs/openapi', 0775, true);
        $spec = [
            'openapi' => '3.0.3',
            'info' => ['title' => 'MyMI Wallet API', 'version' => 'v1'],
            'paths' => [],
            'components' => ['securitySchemes' => ['bearerAuth' => ['type' => 'http', 'scheme' => 'bearer']]],
        ];
        foreach ($scan['routes'] as $r) {
            if (($r['is_api'] ?? 0) !== 1 || $r['version'] === 'none') {
                continue;
            }
            $path = '/' . ltrim($r['uri'], '/');
            $verb = strtolower($r['http_methods']);
            $spec['paths'][$path][$verb] = [
                'summary' => $r['controller'] . '::' . $r['action'],
                'description' => 'Required filters: ' . implode(', ', $r['filters']),
                'responses' => ['200' => ['description' => 'OK']],
                'x-required-permission' => $this->extractPermission($r['filters']),
                'x-rate-limit' => $r['has_rate_limit'] ? 'ratelimit filter enabled' : 'missing',
            ];
        }
        file_put_contents(ROOTPATH . 'docs/APIs/openapi/openapi.v1.json', json_encode($spec, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function persistAudit(array $scan): void
    {
        $db = Database::connect();
        $runData = [
            'run_uuid' => $scan['metadata']['run_uuid'],
            'started_at' => date('Y-m-d H:i:s'),
            'finished_at' => date('Y-m-d H:i:s'),
            'environment' => $scan['metadata']['environment'],
            'git_commit' => trim((string) @shell_exec('git rev-parse --short HEAD')),
            'summary_json' => json_encode($scan['metadata']['summary']),
        ];
        $db->table('bf_api_audit_runs')->insert($runData);
        $runId = (int) $db->insertID();

        foreach ($scan['routes'] as $r) {
            $endpointId = $this->upsertEndpoint($db, $r);
            $this->upsertRule($db, $endpointId, $r);
            foreach ($r['findings'] as $finding) {
                $db->table('bf_api_audit_findings')->insert([
                    'run_id' => $runId,
                    'endpoint_id' => $endpointId,
                    'severity' => $r['severity'],
                    'category' => 'governance',
                    'finding' => $finding,
                    'remediation' => $finding,
                    'evidence_json' => json_encode($r),
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }

    private function upsertEndpoint($db, array $r): int
    {
        $table = $db->table('bf_api_endpoints');
        $existing = $table->where('uri', $r['uri'])->where('http_methods', $r['http_methods'])->get()->getRowArray();
        $data = [
            'uri' => $r['uri'], 'http_methods' => $r['http_methods'], 'controller' => $r['controller'], 'action' => $r['action'],
            'module' => $r['module'], 'is_api' => $r['is_api'], 'version' => $r['version'], 'discovered_at' => date('Y-m-d H:i:s'),
        ];
        if ($existing) {
            $table->where('id', $existing['id'])->update($data);
            return (int) $existing['id'];
        }
        $table->insert($data);
        return (int) $db->insertID();
    }

    private function upsertRule($db, int $endpointId, array $r): void
    {
        $table = $db->table('bf_api_endpoint_rules');
        $existing = $table->where('endpoint_id', $endpointId)->get()->getRowArray();
        if ($existing && (int) ($existing['is_manual_override'] ?? 0) === 1) {
            return;
        }
        $data = [
            'endpoint_id' => $endpointId,
            'requires_auth' => $r['auth_required'] ? 1 : 0,
            'required_group' => null,
            'required_permission' => $this->extractPermission($r['filters']),
            'filters_expected' => json_encode($r['filters']),
            'rate_limit_policy' => $r['has_rate_limit'] ? 'default' : null,
            'is_cli_only' => 0,
            'internal_token_required' => in_array('internaltoken', $r['filters'], true) ? 1 : 0,
            'is_manual_override' => $existing['is_manual_override'] ?? 0,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if ($existing) {
            $table->where('id', $existing['id'])->update($data);
            return;
        }
        $data['created_at'] = date('Y-m-d H:i:s');
        $table->insert($data);
    }

    private function extractPermission(array $filters): ?string
    {
        foreach ($filters as $f) {
            if (str_starts_with($f, 'permission')) {
                return $f;
            }
        }
        return null;
    }

    private function renderRoutesInventory(array $scan): string { return "# Routes Inventory\n\n- Timestamp: {$scan['metadata']['timestamp']}\n- Run UUID: {$scan['metadata']['run_uuid']}\n\n" . implode("\n", array_map(fn($r) => sprintf('- %s `%s` => `%s::%s`', $r['http_methods'], $r['uri'], $r['controller'], $r['action']), $scan['routes'])) . "\n"; }
    private function renderControllersInventory(array $scan): string { return "# Controllers Inventory\n\n- Count: " . count($scan['controllers']) . "\n\n" . implode("\n", array_map(fn($c) => "- `{$c['controller']}::{$c['action']}`", $scan['controllers'])) . "\n"; }
    private function renderFiltersInventory(array $scan): string { return "# Filter Inventory\n\n" . implode("\n", array_map(fn($r) => "- {$r['http_methods']} `{$r['uri']}` filters=" . implode(',', $r['filters']), $scan['routes'])) . "\n"; }
    private function renderRateInventory(array $scan): string { return "# Rate Limit Inventory\n\n" . implode("\n", array_map(fn($r) => "- {$r['http_methods']} `{$r['uri']}` has_rate_limit=" . ($r['has_rate_limit'] ? 'yes':'no'), $scan['routes'])) . "\n"; }
    private function renderFilterCoverage(array $scan): string { return "# Filter Coverage\n\n" . implode("\n", array_map(fn($r) => "- [{$r['severity']}] {$r['http_methods']} `{$r['uri']}` " . implode('; ', $r['findings']), $scan['routes'])) . "\n"; }
    private function renderRateCoverage(array $scan): string { return "# Rate Limit Coverage\n\n" . implode("\n", array_map(fn($r) => "- {$r['http_methods']} `{$r['uri']}` policy=" . ($r['has_rate_limit'] ? 'configured':'missing'), $scan['routes'])) . "\n"; }
    private function renderDeprecations(array $scan): string { return "# API Deprecations\n\nLegacy `/API/*` routes should migrate to `/API/v1/*`; keep aliases temporarily.\n"; }
}
