# bf_applications

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:10, app/Models/AnalyticalModel.php:7, app/Models/AnnouncementsModel.php:10, app/Models/APIModel.php:10, app/Models/DesignModel.php:10, app/Models/PlaidModel.php:8, app/Models/PublicModel.php:8, app/Models/SubscribeModel.php:8, app/Models/TrackerModel.php:8, docs/aiops/migration_model_audit.md:58, docs/aiops/migration_model_audit.md:59, docs/aiops/migration_model_audit.md:67, docs/aiops/migration_model_audit.md:68, docs/aiops/migration_model_audit.md:93, docs/aiops/migration_model_audit.md:152, docs/aiops/migration_model_audit.md:170, docs/aiops/migration_model_audit.md:186, docs/aiops/migration_model_audit.md:189, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1088

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_applications` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_applications`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_applications'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_applications'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

