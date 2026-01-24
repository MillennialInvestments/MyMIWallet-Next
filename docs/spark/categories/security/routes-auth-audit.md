# spark:routes:auth-audit

## Purpose
Audit public routes for unauthenticated access regressions and ensure expected status codes.

## Usage
php spark routes:auth-audit

## Arguments
- None.

## What It Touches
- Database tables: None
- Files/directories: None
- Cache: None
- External APIs: HTTP requests to configured `baseURL` routes.

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (HTTP requests may hit webhook endpoints)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes (ensure webhooks tolerate test traffic)
- Suggested schedule: Weekly.

## Related Commands
- spark:auth:audit
- spark:auth:smoke

## Failure Modes
- Base URL misconfigured.
- Route returns unexpected status codes.

## Status
- Existing
