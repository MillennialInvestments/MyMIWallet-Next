# bf_marketing_ideas

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:533, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:124, docs/_aiops/doc-change-log.md:1493

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_ideas` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT NULL,
  `description` text NULL DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `assigned_to` int NULL DEFAULT NULL,
  `priority` enum('low','medium','high') NULL DEFAULT 'medium',
  `status` enum('draft','review','approved') NULL DEFAULT 'draft',
  `platforms` json NULL DEFAULT NULL,
  `additional_info` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- title varchar(255) NOT NULL
- description text NULL
- created_by int NOT NULL
- created_on datetime NULL
- assigned_to int NULL
- priority enum('low','medium','high') NULL
- status enum('draft','review','approved') NULL
- platforms json NULL
- additional_info text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_ideas`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_ideas'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_ideas'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

