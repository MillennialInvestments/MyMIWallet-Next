# spark:cache:audit

## Purpose
Scan the repository for unsafe cache key usage patterns and report risky keys.

## Usage
php spark cache:audit

## Arguments
- None.

## What It Touches
- Database tables: None
- Files/directories: Reads PHP files across the repo (excluding vendor, writable, node_modules, system, builds).
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: On-demand during code audits.

## Related Commands
- spark:db:inventory

## Failure Modes
- Large repos may slow scans.
- Filesystem permission issues.

## Status
- Existing
