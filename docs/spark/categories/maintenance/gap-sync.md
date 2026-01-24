# spark:gap:sync

## Purpose
Enrich the gap tracker CSV with defaults, code evidence, and produce a report for next work.

## Usage
php spark gap:sync [--limit=25] [--priority=P1] [--dry-run] [--report-only]

## Arguments
- --limit (int) – Max rows to process (default: 25).
- --priority (string) – Filter by priority (e.g., P0–P3).
- --dry-run (bool) – Do not write CSV changes.
- --report-only (bool) – Write report only, skip CSV update.

## What It Touches
- Database tables: `bf_ai_ops_caps`, `bf_ai_ops_runs`, `bf_ai_ops_usage`, `bf_ai_ops_events`
- Files/directories: Reads/writes `docs/gap_tracker/gap_tracker.csv`; writes reports to `docs/gap_tracker/reports/`.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (CSV updates, AI Ops run logs)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes (with `--dry-run` for reporting)
- Suggested schedule: Weekly or on-demand.

## Related Commands
- spark:aiops:seed

## Failure Modes
- Missing gap tracker CSV file.
- AI Ops caps block execution.
- File permissions prevent CSV/report writes.

## Status
- Existing
