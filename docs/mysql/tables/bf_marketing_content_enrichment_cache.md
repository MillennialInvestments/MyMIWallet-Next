# bf_marketing_content_enrichment_cache

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:148, app/Models/MarketingModel.php:154, app/Models/MarketingModel.php:657, app/Models/MarketingModel.php:923, app/Models/MarketingModel.php:1383, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:115, docs/_aiops/doc-change-log.md:1472

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_content_enrichment_cache` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `url` varchar(512) NULL DEFAULT NULL,
  `content` mediumtext NULL DEFAULT NULL,
  `last_enriched_at` datetime NULL DEFAULT NULL,
  `source_keywords` varchar(255) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- url varchar(512) NULL
- content mediumtext NULL
- last_enriched_at datetime NULL
- source_keywords varchar(255) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_content_enrichment_cache`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_content_enrichment_cache'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_content_enrichment_cache'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

