# API Audit Fix Report Addendum

Timestamp: 2026-02-09 (post-audit remediation)
Artifact: `docs/aiops/artifacts/api-audit/20260209-112136`

## 1) Mandatory Classification Pass (all 502 failures)

Based on `report.json` (161 failed endpoints), failures were bucketed by route pattern:

- **Expected Internal / CRON / CLI**: **123**
  - Examples: `/API/AIOps/*`, `/API/AiOps/*`, `/API/Alerts/*`, `/API/Discord/*`, `/API/Email/*`, `/API/DripCampaign/*`
- **Expected Authenticated User APIs**: **20**
  - Examples: `/API/Budget/*`, `/API/Chat/me`, `/API/Investments/*`
- **Public APIs (must work)**: **5**
  - Examples: `/API/Health`, `/API/Health/spark`, `/API/Docs/index`, `/API/Docs/view`
- **Legacy / Deprecated / Stubbed**: **13**
  - Remainder not clearly mapped to public or authenticated user behavior.

## 2) Endpoints fixed in this patch

### Internal/CLI guard hardening (intentional 403 instead of runtime crash)

- `GET /API/AIOps/health`
  - Added explicit internal-access gate (`is_cli()` or `internalToken->allowed()`).
  - Added exception safety + structured API error logging.
- `GET /API/AiOps/status`
  - Added internal-or-auth gate (`auth()->id()` or internal token).
  - Added exception safety + structured API error logging.

### Shared API base hardening

- `App\Modules\APIs\Controllers\UserController`
  - Service initialization now fails safely (logs missing service instead of fatal).
  - Added reusable guards:
    - `requireAuthenticatedUser()` → 401
    - `requireInternalAccess()` → 403/500 with logs

### Public docs stability (must not 502)

- `GET /API/Docs/index`
- `GET /API/Docs/view`
  - Wrapped execution in `try/catch`.
  - On dependency/IO errors, returns stable JSON payload with safe defaults (`[]` / empty content) and logs.

## 3) Endpoints intentionally blocked (after patch behavior)

The following classes are now explicitly blocked when unauthenticated/internal token is missing:

- Internal AIOps health/status routes now return **403 Forbidden** with JSON (`Internal endpoint`) instead of accidental upstream 502.

## 4) Deprecated endpoints

No additional deprecations were introduced in this patch.

## 5) Logging improvements added

Added `log_message()` instrumentation for:

- Missing internal authorization on protected internal endpoints.
- Missing service initialization in API user base controller.
- Unexpected internal exceptions converted to stable API responses.

## 6) Remaining known failures

This patch addresses core structural guardrails and high-impact controller hardening for representative failed classes. Remaining 502s should be remediated in follow-up passes using the same pattern:

1. classify by endpoint type,
2. add guard first,
3. catch/normalize runtime failures,
4. preserve existing auth/internal protections.

No security protections were removed in this remediation.

## 7) Additional remediation pass (follow-up)

This follow-up pass addressed concrete breakage from the failed list where method/controller behavior could still crash:

- `GET /Search`
  - Removed hard dependencies on missing model classes (`TradeAlertModel`, `ProjectModel`) and switched to table-aware DB queries.
  - Endpoint now always returns stable JSON with empty datasets when optional tables are unavailable.
- `GET /API/AI/Notes`
  - Added exception handling around note retrieval to prevent uncaught assistant errors.
- `GET /API/ContentEngine/posts` and `GET /API/ContentEngine/topIdeas`
  - Added defensive validation and exception handling with normalized API failures.
- `GET /API/Investments`
  - Fixed controller method to return an explicit JSON response instead of rendering/returning null in API context.
  - Replaced invalid `getCurrentUserId()` calls with `resolveCurrentUserId()` to avoid fatal "undefined method" errors.
- Internal token guards in `AIOps`/`AiOps`
  - Hardened `internalToken` service resolution with try/catch so missing service wiring no longer causes accidental fatals.
