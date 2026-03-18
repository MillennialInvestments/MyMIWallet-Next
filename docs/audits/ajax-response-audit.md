# AJAX Response Audit

## Findings
1. Shared fetch utilities did not provide a first-class premium-required error type.
2. Budget dashboard loading treated premium denials like generic failures.
3. Older raw `fetch()` and `$.ajax()` calls across the app still return inconsistent payload shapes.

## Fixes Applied
- Added `PremiumAccessError` to `authFetch.js`.
- Updated `fetchJSON()` to detect 403 premium payloads and surface them consistently.
- Added budget-dashboard handling to redirect cleanly to `/Memberships` when premium access is required.

## Remaining Risks
- Legacy `$.ajax()` handlers in dashboard layout scripts still use ad-hoc success/error callbacks.
- Several API controllers still mix `{status,data}` and framework `fail*()` helpers, so full normalization remains incomplete.
