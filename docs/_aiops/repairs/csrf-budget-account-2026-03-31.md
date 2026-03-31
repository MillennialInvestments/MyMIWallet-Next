# CSRF Budget Account Repair (2026-03-31)

## Issue Summary
Budget account requests were failing CSRF checks with "The action you requested is not allowed."

## Evidence
- Runtime trace through `app/Filters/CsrfDebugFilter.php`.
- Failures associated with Budget/Account request paths.

## Root Cause
Budget account POST flows can send CSRF tokens via header variants while token field is absent in POST payload.

## Files Changed
- `app/Filters/CsrfDebugFilter.php`

## Exact Fix Strategy
- Added conservative token fallback only for `budget/account` POST routes.
- Supports configured header plus fallback header variants.
- Added route-scoped diagnostics for login and budget-account paths without exposing raw token values.

## Risks
- Low-medium: modifies request POST payload in-memory for a narrow route family only.

## Test Steps
- `php spark logs:errors`
- Exercise Budget account POST/AJAX submissions with valid CSRF header.

## Outcome
CSRF debug filter now preserves native CSRF flow while supporting budget-account header-token propagation.
