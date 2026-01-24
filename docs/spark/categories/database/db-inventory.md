# spark:db:inventory

## Purpose
Scan code and migrations to inventory MyMI Wallet tables and generate integrity docs/SQL adjustments.

## Usage
php spark db:inventory [options]

## Arguments
- --write-docs (int) – Write `/docs/mysql` files (default: 1).
- --write-sql (int) – Write SQL adjustment files (default: 1).
- --limit (int) – Limit number of tables processed (0 = no limit).
- --db-group (string) – Database group to inspect (default: `default`).

## What It Touches
- Database tables: Reads schema across configured database.
- Files/directories: Writes `writable/db_inventory/` and `/docs/mysql` outputs.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data (generates inventory/docs files)
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: Yes
- Suggested schedule: Monthly or after schema changes.

## Related Commands
- spark:db:apply-docs

## Failure Modes
- Database connection errors.
- File permissions prevent writing to `writable/db_inventory` or `/docs/mysql`.

## Status
- Existing
