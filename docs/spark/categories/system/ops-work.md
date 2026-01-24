# spark:ops:work

## Purpose
Process operations queue items and dispatch registered jobs.

## Usage
php spark ops:work --limit=25

## Arguments
- --limit (int) – Maximum number of jobs to process (default: 25).

## What It Touches
- Database tables: `bf_ops_queue`, `bf_ops_jobs`, `bf_ops_job_runs`
- Files/directories: None
- Cache: None
- External APIs: Depends on job handlers.

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
- Unknown job key in queue.
- Handler exceptions (job marked failed).

## Status
- Existing
