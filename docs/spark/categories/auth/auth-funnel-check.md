# spark:auth:funnel-check

## Purpose
Check auth funnel sanity using recent user events and emit alerts on drop-offs.

## Usage
php spark auth:funnel-check

## Arguments
- None.

## What It Touches
- Database tables: `bf_user_events` (read)
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Daily or hourly depending on traffic.

## Related Commands
- spark:auth:smoke
- spark:auth:audit

## Failure Modes
- Missing `bf_user_events` table.
- No recent events to analyze.

## Implementation
- File: `app/Commands/Auth/FunnelCheck.php`
- Service: `app/Services/Spark/AuthFunnelCheckService.php`

## Example Output
```
Starting auth:funnel-check
Auth funnel check (last 24h)
activation_email_sent: 12
activate_success: 11
register_success: 10
login_success: 9
resend_activation_requested: 1
```

## Status
- Implemented
