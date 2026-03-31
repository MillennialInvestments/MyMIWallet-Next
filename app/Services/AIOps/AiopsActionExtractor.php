<?php

declare(strict_types=1);

namespace App\Services\AIOps;

class AiopsActionExtractor
{
    /** @param list<array<string,mixed>> $errors @return list<array<string,mixed>> */
    public function extract(array $errors): array
    {
        $actions = [];
        foreach ($errors as $error) {
            $classification = (string) ($error['classification'] ?? 'generic_boot_failure');
            $actions[] = $this->mapToAction($classification, $error);
        }

        // Deduplicate same target/classification
        $out = [];
        foreach ($actions as $action) {
            $key = ($action['classification'] ?? 'unknown') . '|' . ($action['target_file'] ?? 'unknown');
            if (! isset($out[$key])) {
                $out[$key] = $action;
            }
        }

        return array_values($out);
    }

    /** @param array<string,mixed> $error @return array<string,mixed> */
    private function mapToAction(string $classification, array $error): array
    {
        $default = [
            'type' => 'patch',
            'priority' => 'medium',
            'classification' => $classification,
            'target_file' => (string) ($error['app_file'] ?? 'app/Controllers/BaseController.php'),
            'target_symbol' => null,
            'summary' => 'Investigate and repair runtime error.',
            'recommended_fix' => 'Add guard clauses, normalize inputs, and update CI4 APIs where needed.',
            'evidence' => $error['raw_message'] ?? '',
            'safe_to_autopatch' => false,
            'status' => 'queued',
        ];

        return match ($classification) {
            'protected_property_access' => array_merge($default, [
                'priority' => 'high',
                'target_file' => 'app/Modules/Blog/Controllers/HowItWorksController.php',
                'summary' => 'Replace direct protected request property access with CI4 accessor methods.',
                'recommended_fix' => 'Use $this->request->getUri(), getPath(), and URI segment APIs.',
                'safe_to_autopatch' => true,
            ]),
            'request_csrf_rejected' => array_merge($default, [
                'priority' => 'high',
                'target_file' => 'app/Filters/CsrfDebugFilter.php',
                'summary' => 'Review token propagation, method handling, AJAX headers, and justified exclusions.',
                'recommended_fix' => 'Bridge known CSRF header variants and log route-level diagnostics for Budget account flows.',
                'safe_to_autopatch' => false,
            ]),
            'null_view_path_or_namespace' => array_merge($default, [
                'priority' => 'high',
                'target_file' => 'app/Controllers/BaseController.php',
                'summary' => 'Guard null view names/paths and normalize namespaced view resolution.',
                'recommended_fix' => 'Validate and sanitize view names before trim/path normalization; add actionable logs.',
                'safe_to_autopatch' => true,
            ]),
            default => $default,
        };
    }
}
