# bf_redirect_links

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:688, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:183, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:183, docs/_aiops/doc-change-log.md:1904

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_redirect_links` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL DEFAULT NULL,
  `final_url` text NOT NULL DEFAULT NULL,
  `platform` varchar(50) NULL DEFAULT NULL,
  `post_id` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- slug varchar(255) NOT NULL
- final_url text NOT NULL
- platform varchar(50) NULL
- post_id int NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_redirect_links`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_redirect_links'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_redirect_links'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

