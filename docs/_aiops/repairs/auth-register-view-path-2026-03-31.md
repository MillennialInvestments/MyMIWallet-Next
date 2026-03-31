# Auth Register View Path Repair (2026-03-31)

## Issue Summary
`/register` rendering path triggered `trim(NULL, '/')` path normalization failures.

## Evidence
- Trace path included `BaseController::safeView()` and `AuthController::_render()`.

## Root Cause
View path values were not fully guarded before path normalization and render dispatch.

## Files Changed
- `app/Controllers/BaseController.php`
- `app/Controllers/AuthController.php`

## Exact Fix Strategy
- Added null/invalid guards in `safeView()` and `_render()`.
- Normalized and validated view names before invoking `view()`.
- Added actionable critical logs when invalid view inputs are detected.

## Risks
- Low: stricter validation may surface pre-existing invalid view configuration earlier.

## Test Steps
- `php spark routes`
- Load `/register`

## Outcome
View resolution now fails safely with explicit logs instead of fatal null-trim behavior.
