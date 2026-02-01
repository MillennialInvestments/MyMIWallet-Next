# bf_marketing_best_times

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:108

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_best_times` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `dow` tinyint unsigned NOT NULL DEFAULT NULL,
  `hour_utc` tinyint unsigned NOT NULL DEFAULT NULL,
  `score` float NOT NULL DEFAULT 0,
  `sample` int unsigned NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- platform varchar(32) NOT NULL
- dow tinyint unsigned NOT NULL
- hour_utc tinyint unsigned NOT NULL
- score float NOT NULL
- sample int unsigned NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_best_times`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_best_times'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_best_times'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

