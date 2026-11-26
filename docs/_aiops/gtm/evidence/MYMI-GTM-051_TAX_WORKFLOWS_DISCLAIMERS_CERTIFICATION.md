# MYMI-GTM-051: Certify Tax Workflows and Disclaimers

## Status
READY FOR REVIEW / CERTIFIED.

- **PR:** Pending
- **Completed UTC:** 2026-11-23T20:30:00Z
- **Domain:** Extended product domains (W4)
- **Gate:** None required (Money switches remain OFF)

## Summary of Changes
- **Session-User IDOR Protection & Authorization Guards (`App\Modules\User\Tax\Controllers\Tax`):**
  - Remediated serious IDOR vulnerabilities where `ajaxSaveLine()`, `ajaxRecalc()`, and `ajaxSaveAllocation()` accepted unverified `return_id` from client payloads without ownership validation.
  - Added strict session user resolution (`auth()->id() ?? service('authentication')->id() ?? session()->get('user_id')`) and ownership checks:
    - Verifies `$return = $this->taxReturnModel->find($returnId); if (! $return || (int) ($return['user_id'] ?? 0) !== $this->currentUserId) return $this->failForbidden('Access denied');`.
    - Returns 401 Unauthorized for unauthenticated callers.
    - Returns 403 Forbidden for cross-user manipulation attempts.
- **Tax Disclaimers & Legal Compliance Across Platform:**
  - Added the official MyMI Wallet Tax Disclaimer banner across all tax views:
    - `App\Modules\User\Tax\Views\index.php`
    - `App\Modules\User\Tax\Views\view.php`
    - `App\Modules\User\Tax\Views\edit.php`
    - `App\Modules\User\Tax\Views\preview.php`
    - `App\Modules\User\Views\Investments\resources\tax_report.php`
  - Injected legal disclaimer metadata into tax export pipelines (`Tax::exportJson` and `Tax::exportCsv`):
    - JSON payload includes top-level `disclaimer` string clearly stating MyMI Wallet is not a CPA, tax attorney, or registered tax advisory firm, and that calculations do not constitute official tax advice.
    - CSV export includes a formal `Disclaimer` row section.
- **Admin Tax Configuration Defense-in-Depth (`App\Config\Routes.php`, `App\Modules\Management\TaxAdmin\Controllers\TaxConfig`):**
  - Hardened `Admin/Tax` route group by adding `role:admin,team` filter alongside `login` filter.
  - Bounded 6 unbounded `findAll()` query patterns in `TaxConfig` (`templates`, `jurisdictions`, `rates`) with `findAll(100)`.
  - Bound user return query in `Tax::index()` with `findAll(50)`.
- **Date & Period Safety:**
  - Verified `Tax::validDate()` regex and `DateTime` format guards to prevent malformed date strings from throwing unhandled 500 exceptions.
  - Verified return period start / end ordering validation in `Tax::create()`.
- **Comprehensive Test Suite (`Tests\Unit\Tax\TaxWorkflowsDisclaimersTest`):**
  - 8 unit tests with 56 assertions covering:
    - Tax return creation, filing period validation, line item prefilling from template, and active jurisdiction allocation seeding.
    - Line item amount persistence and mathematical recalculation (Line 11 deduction sum, Line 12 net taxable, Line 26 total tax due).
    - Jurisdiction taxable allocation updates, effective rate resolution, and tax due calculations.
    - Controller authorization and IDOR attack rejection (cross-user modifications rejected with 403 Forbidden).
    - JSON and CSV export generation containing required legal disclaimers.
    - Date format validation.
    - Admin authorization enforcement (`TaxConfig::ensureAdmin()`).
    - Presence of official Tax Disclaimer banner across all 5 user tax and investment views.

## Verification Proof
- `vendor/bin/phpunit tests/unit/Tax/TaxWorkflowsDisclaimersTest.php`: 8 tests, 56 assertions, OK (100% PASS).
- `vendor/bin/phpunit --testsuite unit`: 581 tests, 2970 assertions, OK (100% PASS).
- `php spark routes:verify-handlers`: 158 known gaps, 0 new, 0 fixed but still in baseline (PASS).
- `bash tests/smoke/form-certification-smoke.sh`: ALL FORM CERTIFICATION SMOKE TESTS PASSED (PASS 293, FAIL 22 <= 22 baseline).
- `php spark api:filters-check`: No CRITICAL filter coverage gaps detected.
- `php spark api:rate-limit-check`: Rate-limit coverage check passed.
- `php spark ops:model-limit:audit`: 0 unsafe patterns in Tax or TaxAdmin.
- `git diff --check`: 0 errors.

## Risks & Mitigations
- **Risk:** User assumes tax reports generated are official tax filings.
  - **Mitigation:** Clear, prominent disclaimer banners added to every screen and export file, explicitly advising users to consult a licensed CPA before filing.
- **Risk:** Cross-user tampering with tax calculations or deductions.
  - **Mitigation:** Strict session-user ownership validation on all AJAX mutations (`ajaxSaveLine`, `ajaxRecalc`, `ajaxSaveAllocation`).

## Rollback Plan
- Revert feature branch commit or PR merge commit. No database schema changes were made.
