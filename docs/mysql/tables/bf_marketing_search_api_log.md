# bf_marketing_search_api_log

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:871, app/Models/MarketingModel.php:1926, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:138, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:138, docs/_aiops/doc-change-log.md:1682

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_search_api_log` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `query` varchar(255) NOT NULL DEFAULT NULL,
  `source` varchar(50) NOT NULL DEFAULT NULL,
  `response_code` int NULL DEFAULT NULL,
  `success` tinyint(1) NULL DEFAULT 0,
  `ip_address` varchar(45) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- query varchar(255) NOT NULL
- source varchar(50) NOT NULL
- response_code int NULL
- success tinyint(1) NULL
- ip_address varchar(45) NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_search_api_log`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_search_api_log'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_search_api_log'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

