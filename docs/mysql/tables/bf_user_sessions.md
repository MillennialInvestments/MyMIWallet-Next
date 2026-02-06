# bf_user_sessions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/UserSessionModel.php:8, docs/aiops/migration_model_audit.md:193, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:2063, docs/health/health_test_checklist.md:14, docs/health/health_test_checklist.md:93, docs/health/modules/auth.md:89

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_sessions` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_sessions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_sessions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_sessions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

