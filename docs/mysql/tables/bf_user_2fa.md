# bf_user_2fa

## Source
- Migration: _None_
- Model:
- Code references: app/Models/UserTwoFactorModel.php:9, docs/ops/auth/03-database.md:8, docs/ops/auth/03-database.md:18, docs/ops/auth/04-controller-contracts.md:45, docs/ops/auth/08-2fa.md:7, docs/ops/auth/08-2fa.md:12, docs/ops/auth/99-final-report.md:10, docs/ops/auth/99-final-report.md:26, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:107, docs/functional_inventory/docs_to_code_map.md:108, docs/functional_inventory/docs_to_code_map.md:112, docs/functional_inventory/docs_to_code_map.md:119

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_2fa` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL

## Required indexes
- PRIMARY (id)

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

