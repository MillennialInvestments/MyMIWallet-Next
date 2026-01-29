# spark:ops:work

## Purpose
Process AiOps task queue items, claim locks, and record task runs.

## Usage
php spark ops:work 10 --lock=15

## Arguments
- `limit` (int) – Maximum number of tasks to process (default: 10).

## Options
- `--lock` (int) – Lock duration in minutes (default: 15).
- `--dry-run` – Preview without claiming tasks.

## What It Touches
- Database tables: `bf_aiops_tasks`, `bf_aiops_task_runs`
- Files/directories: Optional `writable/triage/patches` in safe mode.
- Cache: None
- External APIs: None (unless task handlers call them).

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (updates queue/jobs/runs)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Every 5–15 minutes or hourly.

## Related Commands
- spark:ops:fetch-commands
- spark:ops:analyze-commands

## Failure Modes
- No tasks available (worker exits cleanly).
- Handler exceptions (task marked failed, run logged).

## Status
- Existing
