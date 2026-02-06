# bf_marketing_search_enrichment_log

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:140, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:140, docs/_aiops/doc-change-log.md:1688

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_search_enrichment_log` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NOT NULL DEFAULT NULL,
  `engine_used` enum('bing','google') NOT NULL DEFAULT NULL,
  `result_count` int NULL DEFAULT 0,
  `status` enum('success','failed') NULL DEFAULT 'success',
  `error_message` text NULL DEFAULT NULL,
  `response_time_ms` int NULL DEFAULT NULL,
  `searched_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- keyword varchar(255) NOT NULL
- engine_used enum('bing','google') NOT NULL
- result_count int NULL
- status enum('success','failed') NULL
- error_message text NULL
- response_time_ms int NULL
- searched_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_search_enrichment_log`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_search_enrichment_log'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_search_enrichment_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

