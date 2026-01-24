# spark:auth:smoke

## Purpose
Run a safe authentication smoke test and record health results for ops visibility.

## Usage
php spark auth:smoke

## Arguments
- None.

## What It Touches
- Database tables: `users` (test user), `bf_auth_health_runs`
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (creates/updates test user, records health run)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily (or hourly for higher observability).

## Related Commands
- spark:auth:audit
- spark:auth:funnel-check

## Failure Modes
- Database unavailable.
- Test user cannot be created/updated.
- Health run insert failure.

## Implementation
- File: `app/Commands/Auth/Smoke.php`
- Service: `app/Services/AuthSmokeService.php`

## Example Output
```
Starting auth:smoke
Auth smoke test
status: PASS
score: 100
summary: Auth smoke test succeeded
```

## Status
- Implemented
