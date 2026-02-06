# bf_marketing_search_engine_usage

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:1938, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:139, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:139, docs/_aiops/doc-change-log.md:1685

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_search_engine_usage` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `engine` varchar(20) NOT NULL DEFAULT NULL,
  `usage_count` int NULL DEFAULT 1,
  `used_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- engine varchar(20) NOT NULL
- usage_count int NULL
- used_at datetime NOT NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_search_engine_usage`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_search_engine_usage'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_search_engine_usage'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

