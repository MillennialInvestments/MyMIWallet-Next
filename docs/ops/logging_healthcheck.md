# Logging Healthcheck Playbook

## Overview
Use this playbook to validate that **both** log sinks are working:
- Files: `writable/logs/log-YYYY-MM-DD.php`
- Database: `bf_error_logs`

Artifacts added:
- CLI: `php spark logs:healthcheck`
- HTTP: `GET /API/Management/logHealthcheck`
- Ops script: `scripts/ops/log_healthcheck.sh`

## Prerequisites
- Set `LOG_HEALTHCHECK_ENABLE=true` in the environment serving the HTTP endpoint.
- Optional controls:
  - `LOG_HEALTHCHECK_TOKEN=<secret>` (matched against `X-Log-Healthcheck-Token` header or `?token=` query)
  - `LOG_HEALTHCHECK_ALLOWED_IPS=127.0.0.1,10.0.0.0/24` (exact IP match list)
  - `LOGGER_ALERT_EMAIL` for warning/error email alerts from the DB handler.

## CLI: php spark logs:healthcheck
Runs three log_message calls (DEBUG/INFO/ERROR), checks file growth, and queries `bf_error_logs` for a recent marker.

```
php spark logs:healthcheck
```

Expected fields:
- `file_log_ok=true`
- `db_log_ok=true`
- `overall=PASS`

## HTTP: /API/Management/logHealthcheck
- Method: `GET`
- Path: `/API/Management/logHealthcheck`
- Protection: requires `LOG_HEALTHCHECK_ENABLE=true` **and** either a valid token/IP allow-list **or** an authenticated admin session.

Example:

```
curl -ksS -H "X-Log-Healthcheck-Token: $LOG_HEALTHCHECK_TOKEN" \
  "https://<host>/API/Management/logHealthcheck"
```

Response shape:

```json
{
  "status": "ok",
  "file_log_ok": true,
  "db_log_ok": true,
  "marker": "hexstring",
  "timestamp": "2025-12-21T00:00:00Z"
}
```

## Daily ops wrapper: scripts/ops/log_healthcheck.sh
The script runs the CLI check, calls the HTTP endpoint, tails the latest log, and exits non-zero on failure.

```
LOG_HEALTHCHECK_URL="https://<host>/API/Management/logHealthcheck" \
LOG_HEALTHCHECK_TOKEN="<token-if-required>" \
bash scripts/ops/log_healthcheck.sh
```

Outputs:
- CLI section (mirrors `php spark logs:healthcheck`)
- HTTP section (JSON response)
- Tail of the latest log file (last 50 lines)
- Final PASS/FAIL summary