<?php

declare(strict_types=1);

namespace App\Libraries\Ops\Analyzers;

use App\Libraries\Ops\Issue;
use App\Services\ConfigLintService;

class ConfigLintAnalyzer
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function analyze(): array
    {
        $service = new ConfigLintService();
        $lint = $service->lint();

        if (! ($lint['ok'] ?? false)) {
            return [
                Issue::build([
                    'domain' => 'dev',
                    'severity' => 'P1',
                    'title' => 'Config lint failed to run',
                    'evidence' => [
                        'error' => $lint['error'] ?? 'Unknown error',
                    ],
                    'suggested_fix' => [
                        'Ensure Config/Services.php exists and is readable.',
                        'Re-run config:lint after fixing the issue.',
                    ],
                    'ai_prompt' => 'Investigate Config lint failure in Config/Services.php.',
                    'owner' => 'human',
                    'status' => 'open',
                ]),
            ];
        }

        $results = $lint['results'] ?? [];
        $issues = [];

        foreach ($results as $serviceName => $result) {
            if (($result['status'] ?? 'OK') === 'OK') {
                continue;
            }

            $issues[] = Issue::build([
                'domain' => 'dev',
                'severity' => 'P1',
                'title' => sprintf('Config lint %s: Services::%s', strtolower((string) $result['status']), $serviceName),
                'evidence' => [
                    'service' => $serviceName,
                    'message' => $result['message'] ?? '',
                ],
                'suggested_fix' => [
                    'Update Config/Services.php to match CI4 signatures.',
                    'Re-run config:lint to confirm.',
                ],
                'ai_prompt' => sprintf('Fix Config lint issue for Services::%s.', $serviceName),
                'owner' => 'human',
                'status' => 'open',
            ]);
        }

        return $issues;
    }
}
