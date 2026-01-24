# spark:db:apply-docs

## Purpose
Compile SQL from `docs/mysql` markdown docs and apply statements with audit logging.

## Usage
php spark db:apply-docs [options]

## Arguments
- --dry-run (bool) – Compile SQL without executing statements.
- --db-group (string) – Database group to use (default: `default`).

## What It Touches
- Database tables: Executes compiled SQL; writes audit rows into `bf_ops_schema_audit` (created if missing).
- Files/directories: Writes logs under `writable/db_inventory/` and reads `scripts/extract_sql_from_md.sh`.
- Cache: None
- External APIs: None

## Read / Write Classification
- ✅ Read-only
- ⚠️ Writes data
- ❌ Destructive (requires confirmation)

## Cron Suitability
- Safe for CRON: No
- Suggested schedule: Manual only with operator review.

## Related Commands
- spark:db:inventory

## Failure Modes
- SQL extraction script missing.
- Database connection errors.
- SQL execution errors (check `writable/db_inventory/*.log`).

## Implementation
- File: `app/Commands/Database/ApplyDocs.php`
- Service: `app/Services/Spark/DbApplyDocsService.php`

## Example Output
```
Starting db:apply-docs
Dry-run complete. SQL compiled only.
executed_statements: 0
log_path: /path/to/writable/db_inventory/apply_2024-03-02_120000.log
```

## Status
- Implemented
