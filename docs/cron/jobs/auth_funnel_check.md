# Auth Funnel Sanity Check

**Command**: `php spark auth:funnel-check`

## Purpose
Runs a daily sanity check on key authentication funnel events and logs alerts if the funnel breaks (activation and login drop-offs) or if resend activation requests spike.

## Suggested Schedule
Run once per day:

```
0 6 * * * cd /var/www/mymiwallet && php spark auth:funnel-check
```

## Alert Rules
- Activation email sent > 0 and activation success = 0 (last 24h)
- Register success > 0 and login success = 0 (last 24h)
- Resend activation requests spike (last 24h vs 7-day baseline)

## Notes
- Alerts are emitted with `log_message('error'| 'warning')` so existing log handlers can notify support.
- Requires the `bf_user_events` table from the auth funnel migration.
