<?php

declare(strict_types=1);

namespace App\Libraries\Ops\Analyzers;

use App\Libraries\Ops\Issue;
use Config\Services;

class Psr4Analyzer
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function analyze(): array
    {
        $audit = Services::psr4AuditService()->audit();
        $issues = $audit['issues'] ?? [];
        $summary = $audit['summary'] ?? [];

        if ($issues === []) {
            return [];
        }

        $grouped = [];
        foreach ($issues as $issue) {
            $class = $issue['class'] ?? $issue['file'] ?? 'unknown';
            $grouped[$class][] = $issue;
        }

        $results = [];
        foreach ($grouped as $class => $classIssues) {
            $results[] = Issue::build([
                'domain' => 'dev',
                'severity' => 'P1',
                'title' => sprintf('PSR-4 violations for %s', $class),
                'evidence' => [
                    'summary' => $summary,
                    'issues' => $classIssues,
                ],
                'suggested_fix' => [
                    'Rename files/classes to match PSR-4.',
                    'Remove legacy suffixes or duplicated class definitions.',
                    'Re-run audit:psr4 to confirm.',
                ],
                'ai_prompt' => sprintf('Fix PSR-4 violations for %s. Use audit:psr4 details.', $class),
                'owner' => 'human',
                'status' => 'open',
            ]);
        }

        return $results;
    }
}
