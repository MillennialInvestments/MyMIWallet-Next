# bf_user_2fa

## Source
- Migration: _None_
- Model:
- Code references: app/Models/UserTwoFactorModel.php:9, docs/ops/auth/03-database.md:8, docs/ops/auth/03-database.md:18, docs/ops/auth/04-controller-contracts.md:45, docs/ops/auth/08-2fa.md:7, docs/ops/auth/08-2fa.md:12, docs/ops/auth/99-final-report.md:10, docs/ops/auth/99-final-report.md:26, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/functional_inventory/docs_to_code_map.md:108, docs/functional_inventory/docs_to_code_map.md:112, docs/functional_inventory/docs_to_code_map.md:119, docs/aiops/migration_model_audit.md:194, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:2033

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_2fa` (
  `md` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- md TEXT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_user_2fa`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_2fa'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_2fa'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

