# bf_marketing_pages_missing

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:130

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_pages_missing` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL DEFAULT NULL,
  `full_url` varchar(500) NOT NULL DEFAULT NULL,
  `controller` varchar(100) NULL DEFAULT NULL,
  `method` varchar(100) NULL DEFAULT NULL,
  `status` enum('pending','ignored','complete') NULL DEFAULT 'pending',
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- slug varchar(255) NOT NULL
- full_url varchar(500) NOT NULL
- controller varchar(100) NULL
- method varchar(100) NULL
- status enum('pending','ignored','complete') NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_pages_missing`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_pages_missing'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_pages_missing'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

