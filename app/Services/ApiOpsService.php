<?php

declare(strict_types=1);

namespace App\Services;

class ApiOpsService
{
    /**
     * Generate a grouped fix plan for failed API audit entries.
     *
     * @param array<string, mixed> $auditReport
     * @return array<string, mixed>
     */
    public function generateFixPlan(array $auditReport): array
    {
        $failures = $auditReport['endpoints'] ?? [];
        $grouped = [];

        foreach ($failures as $endpoint) {
            if (($endpoint['status'] ?? '') !== 'fail') {
                continue;
            }

            $type = $endpoint['failure_classification'] ?? 'UNKNOWN';
            $grouped[$type][] = $endpoint;
        }

        $recommendations = [];
        foreach ($grouped as $type => $items) {
            $recommendations[$type] = [
                'count' => count($items),
                'suggestions' => $this->suggestFixes($type),
                'endpoints' => array_map(static function (array $item): array {
                    return [
                        'id' => $item['id'] ?? null,
                        'route' => $item['route'] ?? null,
                        'controller' => $item['controller'] ?? null,
                        'method' => $item['method'] ?? null,
                    ];
                }, $items),
            ];
        }

        return [
            'generated_at' => date('c'),
            'failure_groups' => $recommendations,
            'notes' => [
                'This is a stubbed plan. Implement automated remediation after validating audit baselines.',
            ],
        ];
    }

    /**
     * @return array<int, string>
     */
    private function suggestFixes(string $classification): array
    {
        return match ($classification) {
            'ROUTE_MISSING' => [
                'Register the route in app/Config/Routes.php or update docs/api/schematic.yaml.',
                'Confirm controller namespace and method signature.',
            ],
            'AUTH_BLOCKED' => [
                'Document required auth headers or session requirements in schematic.yaml.',
                'Add guardrails or provide a service token for automated audits.',
            ],
            'EXCEPTION_THROWN' => [
                'Check exception logs for stack traces and dependency failures.',
                'Add defensive checks for missing services or config values.',
            ],
            'INVALID_RESPONSE' => [
                'Normalize JSON responses and include consistent status/message keys.',
                'Add validation error payloads with explicit error codes.',
            ],
            'PERFORMANCE_DEGRADED' => [
                'Profile slow calls and cache expensive queries.',
                'Add timing logs and alerts for downstream service latency.',
            ],
            default => [
                'Review endpoint behavior and update audit expectations.',
            ],
        };
    }
}
