# Migration Dry-Run

## Overview
`migrate:dry-run` scans the CI4 migrations directory, compares against the migrations table, and prints a Markdown plan of pending migrations **without applying** them.

## Run
```bash
php spark migrate:dry-run
```

## Output (Markdown plan)
The command outputs a Markdown plan containing:
- Migration class name
- Filename
- Estimated batch number (next batch)
- Affected tables (best-effort)

Example output:
```md
## Migration Dry-Run Plan

- Estimated batch: **3**
- Pending migrations: **2**

| Migration | Filename | Estimated Batch | Affected Tables |
| --- | --- | --- | --- |
| CreateUsers | 2024-10-01-000000_CreateUsers.php | 3 | users |
| AddIndexToAlerts | 2024-11-02-000100_AddIndexToAlerts.php | 3 | alerts |
```

## Notes
- Table detection is best-effort and scans for common migration operations like `createTable`, `addColumn`, etc.
- If the migrations table is missing, the command assumes no migrations have been applied.
