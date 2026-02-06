# bf_user_permission_overrides

## Source
- Migration: _None_
- Model:
- Code references: app/Models/UserPermissionOverrideModel.php:8, docs/ops/auth/03-database.md:9, docs/ops/auth/03-database.md:23, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/aiops/migration_model_audit.md:192, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:2054

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_permission_overrides` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_permission_overrides`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_permission_overrides'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_permission_overrides'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

