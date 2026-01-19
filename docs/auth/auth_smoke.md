# Auth Smoke Tests (CLI + Nightly)

## Overview
The auth smoke test validates the authentication stack without using HTTP routes. It provisions a dedicated test user, attempts login, checks session identity in a CLI-safe way, and generates a password reset token at the model level. Every run is recorded in `bf_auth_health_runs` for history and alerts.

- Command: `php spark auth:smoke`
- Dedicated test user: `auth_smoke@mymiwallet.local` (password `TestPassword123!`)
- DB history table: `bf_auth_health_runs`

## What the smoke test validates
1. Database connectivity.
2. Dedicated test user provisioning and activation state.
3. Auth login attempt via the Myth/Auth service.
4. Session regeneration (CLI-safe identity check).
5. Password reset token generation (model-level, no emails).

## Nightly cron example (DreamHost)
Run daily at **3:15 AM America/Chicago**:

```bash
15 3 * * * php /home/mymiteam/mymiwallet/site/current/spark auth:smoke >> /home/mymiteam/mymiwallet/site/current/writable/logs/auth_smoke.log 2>&1
```

Optional: run every 6 hours for tighter monitoring:

```bash
0 */6 * * * php /home/mymiteam/mymiwallet/site/current/spark auth:smoke >> /home/mymiteam/mymiwallet/site/current/writable/logs/auth_smoke.log 2>&1
```

## Sample CLI output
```text
Auth smoke test
----------------------------------------
status: PASS
score: 100
summary: All checks passed.
run_id: 123
duration_ms: 412
server: mymi-prod-01
build_tag: 9f1c2ab

- db_connection: PASS (Connected)
- test_user: PASS (User exists id=123)
- auth_login: PASS (attempt() ok)
- session_regen: PASS (session regenerated)
- reset_token: PASS (token created)
```

## Sample DB row (bf_auth_health_runs)
```json
{
  "id": 123,
  "run_at": "2026-02-25 03:15:02",
  "status": "PASS",
  "score": 100,
  "summary": "All checks passed.",
  "details_json": "{\"steps\":[{\"key\":\"db_connection\",\"status\":\"PASS\",\"message\":\"Connected\"}]}...",
  "duration_ms": 412,
  "server": "mymi-prod-01",
  "build_tag": "9f1c2ab"
}
```

## Alerting behavior
On failure, the command logs an error entry using `log_message('error', '[AUTH_SMOKE] FAIL', ...)` with the run id and details. The database logger handler will persist the error and trigger alert email delivery per existing rules.
