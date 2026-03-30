# Spark Runtime Validation & Errors

Validation executed on **2026-03-27 (UTC)**.

## Command Results

| Command | Exit Code | Result |
|---|---:|---|
| `php spark` | 0 | Passed; command table renders. Non-blocking `stty` warning appears in non-TTY environment. |
| `php spark list` | 0 | Passed; command table renders. |
| `php spark logs:summarize --dry-run` | 1 | Failed due to missing daily log file (`log-2026-03-27.php/.log`) and unavailable DB logger backend in this environment. |
| `php spark aiops:status --json` | 0 | Completed with degraded status due to unavailable dependencies (`lsof`, n8n health endpoint, DB connection). |
| `php spark gighop:health` | 1 | Failed: command not discovered at runtime; requires follow-up on command discovery/registration wiring. |

## Captured Error Snippets

- `No log file found. Checked: .../writable/logs/log-2026-03-27.php, .../writable/logs/log-2026-03-27.log`
- `[MyMIDBLoggerHandler Fallback] Unable to connect to the database. Main connection [MySQLi]: Connection refused`
- `Command "gighop:health" not found.`

## Follow-Up Actions

1. Ensure CLI environment has runtime dependencies (`lsof`, n8n runtime directory, DB access) for full AIOps health checks.
2. Verify command autoload/discovery policy after Console configuration changes.
3. Seed/create expected daily log files (or improve `logs:summarize` fallback behavior) for first-run safety.
