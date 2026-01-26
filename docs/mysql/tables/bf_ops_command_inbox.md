# bf_ops_command_inbox

## Source
- Migration: _None_
- Model:
- Code references: app/Models/OpsCommandInboxModel.php:9, app/Commands/OpsFetchCommands.php:13, docs/ops/control_plane_assumptions.md:27, docs/cron/jobs/ops_analyze_commands.md:17, docs/cron/jobs/ops_fetch_commands.md:4, docs/sql/mysql.md:51, docs/sql/mysql.md:53, docs/spark/categories/system/ops-analyze-commands.md:13, docs/spark/categories/system/ops-fetch-commands.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_command_inbox` (
  `ai_summary` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- ai_summary TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_ops_command_inbox`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

