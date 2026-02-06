# bf_marketing_buffer_posts

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:111, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:111, docs/_aiops/doc-change-log.md:1583

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_buffer_posts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `source_id` int NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `platform_content` json NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected','scheduled') NULL DEFAULT 'pending',
  `scheduled_date` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- source_id int NULL
- title varchar(255) NULL
- summary text NULL
- platform_content json NULL
- status enum('pending','approved','rejected','scheduled') NULL
- scheduled_date datetime NULL
- created_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_buffer_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_buffer_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_buffer_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

