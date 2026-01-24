# spark:aiops:seed

## Purpose
Seed default AI Ops caps and pricing configuration to ensure guardrails exist for AI-driven automation.

## Usage
php spark aiops:seed

## Arguments
- None.

## What It Touches
- Database tables: `bf_ai_ops_caps`
- Files/directories: None
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (upserts caps rows)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand during setup or when caps change.

## Related Commands
- spark:gap:sync

## Failure Modes
- Missing `bf_ai_ops_caps` table.
- Database connection errors.
- Transaction failures (see CLI output).

## Status
- Existing
