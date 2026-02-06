# bf_feature_flags

## Source
- Migration: _None_
- Model:
- Code references: app/Models/FeatureFlagModel.php:9, docs/exports_schema.md:203, docs/exports_schema.md:204, docs/functional_inventory/docs_to_code_map.md:50, docs/functional_inventory/docs_to_code_map.md:51, docs/aiops/migration_model_audit.md:106, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1391

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_feature_flags` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_feature_flags`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_feature_flags'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_feature_flags'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

