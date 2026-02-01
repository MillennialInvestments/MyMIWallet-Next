# bf_marketing_content_fingerprints

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:116

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_content_fingerprints` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `summary_id` bigint unsigned NOT NULL DEFAULT NULL,
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `fp64` bigint unsigned NOT NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- summary_id bigint unsigned NOT NULL
- platform varchar(32) NOT NULL
- fp64 bigint unsigned NOT NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_content_fingerprints`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_content_fingerprints'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_content_fingerprints'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

