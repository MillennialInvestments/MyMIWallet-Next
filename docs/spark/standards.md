## Overview

Supplemental operational documentation entry for this Spark scope.

## Operational Purpose

Provide standardized runbook sections for operators and developers.

## Command Inventory

- See local command tables and linked inventories.

## Command Reference

- Reference command blocks in this file or parent category docs.

## Dependencies

- Use `docs/spark/_spark_command_dependencies.json` for relationship data.

## Execution Workflows

- Run category bootstrap, diagnostics, and validation sequences as applicable.

## Operational Playbooks

- Incident triage: logs, services, routes, and database diagnostics.

## Troubleshooting

- Use `php spark ops:commands:audit`, `php spark ops:commands:missing`, and runtime diagnostics.

## Related Commands

- `ops:commands:audit`
- `ops:commands:missing`
- `spark:commands:graph`

---

# Spark Command Standards

## Baseline requirements
All Spark commands **must**:
- Extend `SafeBaseCommand`.
- Use clear, consistent `$group` naming.
- Log start + completion events (CLI output and `log_message`).
- Never silently fail; every failure must emit CLI output and log entries.
- Provide `usage` and `arguments/options` metadata when parameters exist.

## Destructive safeguards
Commands that delete or irreversibly alter data **must**:
- Require `--approve` (or equivalent explicit confirmation).
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
