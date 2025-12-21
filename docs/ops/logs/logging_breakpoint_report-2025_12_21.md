# Logging Breakpoint Report — 2025-12-21

## Context
- Last known log line: **2025-12-19 14:15:01** (file + DB stopped afterwards).
- Deployments on 2025-12-19 pulled in commits `7e2f83d` and `5280db7` with no logger changes but shipped artifacts that omitted `writable/logs/` and still lacked a registered DB logger.

## Breakpoint (git)
- **Range:** `d6ed033` (2025-12-18) ➜ `5280db7` (2025-12-19).
- **Chosen breakpoint:** `5280db7a217e81a69dadb783e96e41aee1d3bead` — first deployment after the last log entry.
- **Files in scope:** no logger edits, but runtime packaging excluded `writable/logs/` (ignored by `.gitignore`) and the codebase still only registered the `FileHandler`, leaving the system with no working sink once the log directory disappeared.

## Why it broke
- **File sink:** `WRITEPATH/logs` was missing on the deployed node; `FileHandler` could not create `log-YYYY-MM-DD.php`, so `log_message()` silently failed to write.
- **DB sink:** `App\Log\Handlers\DatabaseLoggerHandler` was not shipped; an unused copy of `Logger.php` under `app/ConfigO` referenced it, but the active config never loaded it. With the file sink failing, there was no secondary sink.

## Fix applied
- Added `App\Log\Handlers\DatabaseLoggerHandler` with recursion guards, schema-aware inserts, DB-failure fallback file, and optional email alerts.
- Updated `app/Config/Logger.php` to auto-create `WRITEPATH/logs`, clamp thresholds (prod ≥3), and register both File + DB handlers (DB first to ensure persistence even if the file sink falters).
- Added CLI + HTTP healthchecks and an ops wrapper script to verify both sinks on demand and during daily ops.