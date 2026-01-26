# bf_users_bank_transactions

## Source
- Migration: _None_
- Model:
- Code references: docs/budgeting/architecture.md:12, docs/OVERVIEW.md:284, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:20, docs/functional_inventory/docs_to_code_map.md:51, docs/gap-audit/unresolved_questions.md:4

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_bank_transactions` (
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
SHOW CREATE TABLE `bf_users_bank_transactions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_transactions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_transactions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

