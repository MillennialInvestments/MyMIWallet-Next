<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class AiopsPatchPlanner
{
    /** @param list<array<string,mixed>> $actions @return list<array<string,mixed>> */
    public function build(array $actions): array
    {
        $plans = [];
        foreach ($actions as $idx => $action) {
            $plans[] = [
                'id' => 'PLAN-' . str_pad((string) ($idx + 1), 3, '0', STR_PAD_LEFT),
                'target_file' => $action['target_file'] ?? 'unknown',
                'why_file_chosen' => $action['summary'] ?? 'Direct evidence in logs points to this file.',
                'methods_to_inspect' => $this->methodsForTarget((string) ($action['target_file'] ?? '')),
                'patch_strategy' => $action['recommended_fix'] ?? 'Apply conservative runtime-safe guard.',
                'regression_risks' => 'Potential behavior changes in request validation/rendering paths.',
                'tests_to_run' => [
                    'php spark logs:errors',
                    'php spark aiops:all --logs-only',
                    'php spark aiops:repairs',
                    'php spark routes',
                    'php spark cache:clear',
                ],
            ];
        }

        return $plans;
    }

    /** @return list<string> */
    private function methodsForTarget(string $target): array
    {
        return match ($target) {
            'app/Modules/Blog/Controllers/HowItWorksController.php' => ['show', 'commonData', 'initController'],
            'app/Filters/CsrfDebugFilter.php' => ['before', 'logLoginCsrfDebug'],
            'app/Controllers/BaseController.php' => ['safeView', 'normalizeAppOverridesFolder'],
            'app/Controllers/AuthController.php' => ['_render', 'register'],
            default => ['initController'],
        };
    }
}
