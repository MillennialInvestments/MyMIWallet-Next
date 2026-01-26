# bf_permissions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/PermissionModel.php:8, docs/ops/auth/03-database.md:9, docs/ops/auth/03-database.md:20, docs/ops/auth/03-database.md:23, docs/ops/auth/09-authorization.md:6, docs/ops/auth/09-authorization.md:21, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/functional_inventory/docs_to_code_map.md:113, docs/health/health_test_checklist.md:113, docs/health/modules/auth.md:108

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_permissions` (
  `slug` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- slug TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_permissions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_permissions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_permissions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

