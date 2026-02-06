# bf_investment_alert_jobs

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AlertJobModel.php:8, docs/aiops/migration_model_audit.md:65, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1460

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investment_alert_jobs` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investment_alert_jobs`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_jobs'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_alert_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

