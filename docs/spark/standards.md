# Spark Command Standards

## Baseline requirements
All Spark commands **must**:
- Extend `BaseCommand`.
- Use clear, consistent `$group` naming.
- Log start + completion events (CLI output and `log_message`).
- Never silently fail; every failure must emit CLI output and log entries.
- Provide `usage` and `arguments/options` metadata when parameters exist.

## Destructive safeguards
Commands that delete or irreversibly alter data **must**:
- Require `--force` (or equivalent explicit confirmation).
- Echo impacted counts before execution.
- Log the operator, timestamp, and scope of data affected.

## Implementation guidelines
Commands should:
- Prefer Services/Libraries over raw inline logic.
- Reuse helpers/models wherever possible.
- Be idempotent where feasible (safe to re-run).
- Support `--dry-run` for write-heavy operations.
- Write structured logs for automation and dashboards.

## Documentation expectations
Each command must have a dedicated spec file in `docs/spark/categories/<category>/` using the standard template, including:
- Purpose
- Usage
- Arguments
- What it touches (DB/files/cache/APIs)
- Read/write classification
- Cron suitability
- Related commands
- Failure modes
- Status
