# spark:revenue:scan

## Purpose
Scan the repository for monetizable features and generate revenue stream documentation.

## Usage
php spark revenue:scan

## Arguments
- None.

## What It Touches
- Database tables: None
- Files/directories: Reads repo files and writes to `docs/revenue_streams/`.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (generates documentation files)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes (low risk)
- Suggested schedule: Monthly.

## Related Commands
- spark:codex:review

## Failure Modes
- File permissions prevent docs write.
- Large repos may slow scans.

## Status
- Existing
