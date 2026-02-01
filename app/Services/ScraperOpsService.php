<?php

namespace App\Services;

class ScraperOpsService
{
    public function generateScraperFixPlan(array $auditReport): array
    {
        $records = $auditReport['records'] ?? [];
        $buckets = [];

        foreach ($records as $record) {
            $failures = $record['failures'] ?? [];
            foreach ($failures as $failure) {
                $type = $failure['failure_type'] ?? 'UNKNOWN';
                $buckets[$type][] = $failure;
            }
        }

        $plans = [];
        foreach ($buckets as $type => $failures) {
            $plans[] = [
                'failure_type' => $type,
                'count' => count($failures),
                'suggested_actions' => $this->suggestActions($type, $failures),
            ];
        }

        return $plans;
    }

    private function suggestActions(string $failureType, array $failures): array
    {
        return match ($failureType) {
            'CATEGORY_MISSING' => [
                'Add explicit category fallback when email_type/type is missing or mismatched.',
                'Align inbox routing rules with expected source tables.',
            ],
            'PARSE_FAILED' => [
                'Expand symbol/keyword extraction rules for new alert/news formats.',
                'Add parser guardrails for empty subjects or truncated bodies.',
            ],
            'SCHEMA_INVALID' => [
                'Add schema validation before insert to enforce required fields and min lengths.',
                'Backfill missing metadata (symbols, identifiers) from raw inbox data.',
            ],
            'UNSAFE_CONTENT' => [
                'Apply stricter HTML sanitization on email_body/content before storage.',
                'Strip scripts/iframes and normalize encoding during intake.',
            ],
            'DB_INSERT_FAILED' => [
                'Verify downstream insert logic and ensure final tables receive processed records.',
                'Add retry envelopes around insert failures with logging of db errors.',
            ],
            'UI_BREAK_RISK' => [
                'Populate presentation-safe defaults for missing title/summary/date fields.',
                'Guard dashboard renderers against null fields before template rendering.',
            ],
            'DUPLICATE_DETECTED' => [
                'Strengthen email_identifier/message_hash de-duplication in temp tables.',
                'Add unique constraints or idempotency keys for scraper inserts.',
            ],
            default => [
                'Review audit output for root cause and add targeted guardrails.',
            ],
        };
    }
}
