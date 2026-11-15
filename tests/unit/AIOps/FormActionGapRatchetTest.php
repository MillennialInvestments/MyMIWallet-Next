<?php

declare(strict_types=1);

namespace Tests\Unit\AIOps;

use App\Services\AIOps\FormDebugSeederAuditService;
use PHPUnit\Framework\TestCase;

/**
 * GT-FORM-ROUTES-001 ratchet: every form or JS request in app/Views and
 * app/Modules whose action + method does not resolve to a defined route is
 * listed in tests/baseline/form-action-gaps.txt.
 *
 * - A new broken form action fails this test.
 * - A fixed one must be removed from the baseline (the list only shrinks).
 *
 * Regenerate after a fix: php spark aiops:form:test --scan-all --write-gap-baseline
 */
final class FormActionGapRatchetTest extends TestCase
{
    public const BASELINE = 'tests/baseline/form-action-gaps.txt';

    public function testFormActionGapsOnlyShrink(): void
    {
        $report = (new FormDebugSeederAuditService())->run(['write_reports' => false]);
        $current = FormDebugSeederAuditService::gapLines($report['forms']);

        $baseline = [];
        foreach (file(ROOTPATH . self::BASELINE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [] as $line) {
            if ($line !== '' && $line[0] !== '#') {
                $baseline[] = $line;
            }
        }

        $new   = array_values(array_diff($current, $baseline));
        $fixed = array_values(array_diff($baseline, $current));

        $this->assertSame([], $new, "New form actions without a matching route (fix the form or the route):\n" . implode("\n", $new));
        $this->assertSame([], $fixed, "These gaps are fixed; remove them from " . self::BASELINE . ":\n" . implode("\n", $fixed));
    }
}
