# bf_email_open_tracking

## Source
- Migration: _None_
- Model:
- Code references: app/Models/Marketing/EmailOpenTrackingModel.php:10, docs/aiops/migration_model_audit.md:135, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1202

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_open_tracking` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_open_tracking`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_open_tracking'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_open_tracking'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

