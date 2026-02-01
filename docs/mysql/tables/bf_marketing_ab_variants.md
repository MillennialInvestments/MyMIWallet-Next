# bf_marketing_ab_variants

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:105

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_ab_variants` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `test_id` bigint unsigned NOT NULL DEFAULT NULL,
  `template_id` int unsigned NOT NULL DEFAULT NULL,
  `weight` float NOT NULL DEFAULT 0.5,
  `wins` int unsigned NOT NULL DEFAULT 0,
  `trials` int unsigned NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- test_id bigint unsigned NOT NULL
- template_id int unsigned NOT NULL
- weight float NOT NULL
- wins int unsigned NOT NULL
- trials int unsigned NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_ab_variants`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_ab_variants'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_ab_variants'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

