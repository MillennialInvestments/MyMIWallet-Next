# bf_permission_role

## Source
- Migration: _None_
- Model:
- Code references: app/Models/PermissionRoleModel.php:8, docs/ops/auth/03-database.md:9, docs/ops/auth/03-database.md:23, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/aiops/migration_model_audit.md:151, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1787, docs/health/health_test_checklist.md:113, docs/health/modules/auth.md:108

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_permission_role` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_permission_role`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_permission_role'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_permission_role'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

