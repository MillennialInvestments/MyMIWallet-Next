# bf_marketing_promotions

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:134

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_promotions` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL DEFAULT NULL,
  `title` varchar(128) NOT NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `starts_at` datetime NULL DEFAULT NULL,
  `ends_at` datetime NULL DEFAULT NULL,
  `landing_url` varchar(1024) NOT NULL DEFAULT NULL,
  `meta_json` json NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- code varchar(64) NOT NULL
- title varchar(128) NOT NULL
- active tinyint(1) NOT NULL
- starts_at datetime NULL
- ends_at datetime NULL
- landing_url varchar(1024) NOT NULL
- meta_json json NULL
- created_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_promotions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_promotions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_promotions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

