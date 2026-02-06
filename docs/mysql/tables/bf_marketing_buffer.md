# bf_marketing_buffer

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MarketingModel.php:282, app/Models/MarketingModel.php:289, app/Models/MarketingModel.php:312, app/Models/MarketingModel.php:352, app/Models/MarketingModel.php:372, app/Models/MarketingModel.php:385, app/Models/MarketingModel.php:600, app/Models/MarketingModel.php:1011, app/Models/MarketingModel.php:1043, app/Models/MarketingModel.php:1207, app/Models/MarketingModel.php:1406, app/Models/MarketingModel.php:2372, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:110, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:110, docs/_aiops/doc-change-log.md:1580

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_buffer` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `keyword` varchar(255) NULL DEFAULT NULL,
  `summary` text NOT NULL DEFAULT NULL,
  `score` float NULL DEFAULT 0,
  `tag_score` float NULL DEFAULT 0,
  `category` varchar(100) NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected','promoted') NULL DEFAULT 'pending',
  `platforms` text NULL DEFAULT NULL,
  `post_id` int NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `tfidf_score` decimal(5,2) NULL DEFAULT 0.00,
  `auto_suggest` tinyint(1) NULL DEFAULT 0,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `schedule_interval` int NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- keyword varchar(255) NULL
- summary text NOT NULL
- score float NULL
- tag_score float NULL
- category varchar(100) NULL
- status enum('pending','approved','rejected','promoted') NULL
- platforms text NULL
- post_id int NULL
- created_at datetime NULL
- updated_at datetime NULL
- tfidf_score decimal(5,2) NULL
- auto_suggest tinyint(1) NULL
- scheduled_at datetime NULL
- schedule_interval int NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_buffer`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_buffer'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_buffer'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

