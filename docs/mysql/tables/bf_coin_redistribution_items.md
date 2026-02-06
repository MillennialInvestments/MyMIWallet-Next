# bf_coin_redistribution_items

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:42, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:42, docs/_aiops/doc-change-log.md:1178

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_coin_redistribution_items` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `redistribution_id` int unsigned NOT NULL DEFAULT NULL,
  `user_id` int unsigned NOT NULL DEFAULT NULL,
  `old_units` bigint unsigned NOT NULL DEFAULT NULL,
  `topup_units` bigint unsigned NOT NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- redistribution_id int unsigned NOT NULL
- user_id int unsigned NOT NULL
- old_units bigint unsigned NOT NULL
- topup_units bigint unsigned NOT NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_coin_redistribution_items`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_coin_redistribution_items'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_coin_redistribution_items'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

