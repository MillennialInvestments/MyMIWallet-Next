# CI4 Logging Source of Truth

This document is the canonical way to validate logging across web requests, Spark commands, AIOPS workers, and CRON in MyMI Wallet.

## How logging works

- Logging goes through CI4 `log_message()` and `Config\Logger`.
- Two handlers run for each accepted log level:
  - `App\Log\Handlers\DatabaseLoggerHandler` (DB sink + safe fallback file)
  - `CodeIgniter\Log\Handlers\FileHandler` (daily file sink)
- Daily file format is `writable/logs/log-YYYY-MM-DD.php`.
- If DB logging fails, DB handler writes `writable/logs/db_logger_fallback.log` and must not block file logging.

## Canonical test command (single command)

Run this command:

```bash
php spark logs:test
```

What it verifies:
- Writes `debug`, `info`, and `error` entries through CI runtime.
- Confirms today’s log file exists/writes.
- Confirms DB log row(s) exist **or** DB fallback file was used.
- Outputs `overall=PASS|FAIL`.

You can also run:

```bash
php spark logs:healthcheck
```

`logs:healthcheck` provides the same sink validation with explicit healthcheck-oriented output.

## Enable debug safely

Use `.env`:

```dotenv
# Allows all levels: emergency..debug
AIOPS_FORCE_DEBUG=true
```

When enabled, logger threshold resolves to all levels regardless of other threshold settings.

You can still use `LOG_THRESHOLD` for normal operation, for example:

```dotenv
LOG_THRESHOLD=emergency,alert,critical,error
```

## Cache reset after config changes

After logger/config changes, run:

```bash
php spark ops:config:reset
```

This clears writable cache artifacts that can mask config updates.

## What NOT to do

- Do **not** use `php -r "log_message(...)"` for logging tests.
- `php -r` does not bootstrap full CI4 runtime and is not a supported logging verification path.
- Use Spark commands (`logs:test`/`logs:healthcheck`) or real HTTP requests only.
