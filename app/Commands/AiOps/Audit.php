<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\SubsCommandTrait;

class Audit extends SafeBaseCommand
{
    use SubsCommandTrait;

    protected $group = 'AI-Ops';
    protected $name = 'aiops:audit';
    protected $description = 'Audit aiops runtime, orchestration routes, and n8n/docs readiness';
    protected $options = [
        '--json' => 'Output JSON payload.',
    ];

    public function run(array $params)
    {
        $this->parseParams($params);
        $json = $this->optBool('json');

        $issues = [];

        if (! is_file(ROOTPATH . 'aiops/bridge-8500.js')) {
            $issues[] = 'Missing bridge-8500.js';
        }

        if (! is_file(ROOTPATH . 'aiops/bin/n8n-start-safe.sh')) {
            $issues[] = 'Missing n8n start wrapper';
        }

        $status = $this->mgr()->status('aiops.n8n');
        if (($status['running'] ?? false) && ! ($status['port_listening'] ?? false)) {
            $issues[] = 'PID alive but n8n port not listening';
        }

        $orchestration = $this->auditOrchestrationReadiness();
        foreach ($orchestration['issues'] as $issue) {
            $issues[] = $issue;
        }

        $report = [
            'status' => empty($issues) ? 'ok' : 'degraded',
            'issues' => $issues,
            'checked_at' => date('c'),
            'n8n' => $status,
            'orchestration' => $orchestration,
        ];

        $jsonPath = $this->writeDoc('audits', 'aiops-audit-' . date('Y-m-d') . '.json', $report);
        $report['report'] = $jsonPath;

        $mdRelPath = 'docs/_aiops/audits/orchestration-audit-' . date('Y-m-d') . '.md';
        $mdAbsPath = ROOTPATH . $mdRelPath;
        @mkdir(dirname($mdAbsPath), 0775, true);
        file_put_contents($mdAbsPath, $this->buildOrchestrationMarkdown($orchestration));
        $report['orchestration']['markdown_report'] = $mdAbsPath;

        $this->emit($report, $json);
        return empty($issues) ? EXIT_SUCCESS : EXIT_ERROR;
    }

    /**
     * @return array<string, mixed>
     */
    private function auditOrchestrationReadiness(): array
    {
        $issues = [];
        $checks = [];

        $routesPath = ROOTPATH . 'app/Config/Routes.php';
        $routesSource = is_file($routesPath) ? (string) file_get_contents($routesPath) : '';
        $apiProtection = $this->checkApiOrchestrationFilter($routesSource);
        $checks['route_protection'] = $apiProtection;
        foreach ($apiProtection['issues'] as $issue) {
            $issues[] = $issue;
        }

        $templates = glob(ROOTPATH . 'docs/n8n/templates/*.json') ?: [];
        $templateRel = array_map(
            static fn(string $path): string => str_replace(ROOTPATH, '', $path),
            $templates
        );
        sort($templateRel);

        $requiredTemplates = [
            'docs/n8n/templates/nightly_platform_digest.json',
            'docs/n8n/templates/aiops_watchdog.json',
            'docs/n8n/templates/log_spike_alert.json',
            'docs/n8n/templates/docs_gap_codex_handoff.json',
            'docs/n8n/templates/chat_health_guard.json',
            'docs/n8n/templates/market_content_push.json',
        ];

        $missingTemplates = array_values(array_diff($requiredTemplates, $templateRel));
        if ($missingTemplates !== []) {
            $issues[] = 'Missing n8n templates: ' . implode(', ', $missingTemplates);
        }

        $checks['n8n_templates'] = [
            'status' => $missingTemplates === [] ? 'ok' : 'degraded',
            'found' => $templateRel,
            'required' => $requiredTemplates,
            'missing' => $missingTemplates,
        ];

        $requiredDocs = [
            'docs/api/internal-orchestration.md',
            'docs/n8n/README.md',
        ];

        $missingDocs = [];
        foreach ($requiredDocs as $doc) {
            if (! is_file(ROOTPATH . $doc)) {
                $missingDocs[] = $doc;
            }
        }

        if ($missingDocs !== []) {
            $issues[] = 'Missing orchestration docs: ' . implode(', ', $missingDocs);
        }

        $checks['documentation'] = [
            'status' => $missingDocs === [] ? 'ok' : 'degraded',
            'required' => $requiredDocs,
            'missing' => $missingDocs,
        ];

        return [
            'status' => empty($issues) ? 'ok' : 'degraded',
            'issues' => $issues,
            'checks' => $checks,
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function checkApiOrchestrationFilter(string $routesSource): array
    {
        $issues = [];

        if ($routesSource === '') {
            return [
                'status' => 'degraded',
                'issues' => ['Unable to read app/Config/Routes.php for orchestration filter check'],
                'expected_routes' => [],
                'outside_internal_group' => [],
            ];
        }

        $groupNeedle = "$routes->group('API', ['filter' => 'internalToken'], static function($routes) {";
        $groupStart = strpos($routesSource, $groupNeedle);

        if ($groupStart === false) {
            return [
                'status' => 'degraded',
                'issues' => ['Missing internalToken API group in Routes.php'],
                'expected_routes' => [],
                'outside_internal_group' => [],
            ];
        }

        $blockStart = $groupStart + strlen($groupNeedle);
        $depth = 1;
        $len = strlen($routesSource);
        $i = $blockStart;

        while ($i < $len && $depth > 0) {
            $char = $routesSource[$i];
            if ($char === '{') {
                $depth++;
            } elseif ($char === '}') {
                $depth--;
            }
            $i++;
        }

        $groupBlock = substr($routesSource, $blockStart, max(0, $i - $blockStart - 1));

        $expectedRoutes = [
            'Ops/healthcheck',
            'Ops/app/update',
            'Ops/commands',
            'AIOps/snapshot',
            'AIOps/gaps/docs',
            'AIOps/watch',
            'Logs/summary',
            'ContentEngine/run',
            'ContentEngine/drafts/(:segment)',
            'Chat/health',
            'Chat/usage',
        ];

        $missingExpected = [];
        foreach ($expectedRoutes as $route) {
            if (strpos($groupBlock, "'{$route}'") === false) {
                $missingExpected[] = $route;
            }
        }

        if ($missingExpected !== []) {
            $issues[] = 'Missing expected internal orchestration routes: ' . implode(', ', $missingExpected);
        }

        preg_match_all('/\$routes->(?:get|post|match)\(\s*[\[\]\'\",\s]*\'API\/([^\']+)\'/', $routesSource, $matches);
        $outsideCandidates = [];

        foreach (($matches[1] ?? []) as $path) {
            $isOrchestrationPrefix = preg_match('/^(Ops|AIOps|Logs|ContentEngine|Chat)\//', $path) === 1;
            if (! $isOrchestrationPrefix) {
                continue;
            }

            if (strpos($groupBlock, "'{$path}'") === false) {
                $outsideCandidates[] = 'API/' . $path;
            }
        }

        if ($outsideCandidates !== []) {
            $issues[] = 'Orchestration API routes found outside internalToken group: ' . implode(', ', $outsideCandidates);
        }

        return [
            'status' => empty($issues) ? 'ok' : 'degraded',
            'issues' => $issues,
            'expected_routes' => $expectedRoutes,
            'missing_expected' => $missingExpected,
            'outside_internal_group' => array_values(array_unique($outsideCandidates)),
        ];
    }

    private function buildOrchestrationMarkdown(array $orchestration): string
    {
        $status = strtoupper((string) ($orchestration['status'] ?? 'unknown'));
        $checkedAt = date('c');

        $lines = [];
        $lines[] = '# Orchestration Audit - ' . date('Y-m-d');
        $lines[] = '';
        $lines[] = '- Status: **' . $status . '**';
        $lines[] = '- Checked at: `' . $checkedAt . '`';
        $lines[] = '';

        if (! empty($orchestration['issues'])) {
            $lines[] = '## Issues';
            foreach ($orchestration['issues'] as $issue) {
                $lines[] = '- ' . $issue;
            }
            $lines[] = '';
        }

        $checks = $orchestration['checks'] ?? [];
        foreach ($checks as $checkName => $check) {
            $label = ucwords(str_replace('_', ' ', (string) $checkName));
            $lines[] = '## ' . $label;
            $lines[] = '- Status: **' . strtoupper((string) ($check['status'] ?? 'unknown')) . '**';

            if (isset($check['missing']) && is_array($check['missing']) && $check['missing'] !== []) {
                $lines[] = '- Missing:';
                foreach ($check['missing'] as $missing) {
                    $lines[] = '  - `' . $missing . '`';
                }
            }

            if (isset($check['found']) && is_array($check['found'])) {
                $lines[] = '- Found:';
                foreach ($check['found'] as $found) {
                    $lines[] = '  - `' . $found . '`';
                }
            }

            $lines[] = '';
        }

        return implode("\n", $lines) . "\n";
    }
}
