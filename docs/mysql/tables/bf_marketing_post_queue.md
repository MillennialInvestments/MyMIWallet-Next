# bf_marketing_post_queue

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:3, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:8, app/Modules/Management/Documents/Marketing/MarketingOpRunbook.md:33, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:133, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:133, docs/_aiops/doc-change-log.md:1661

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_post_queue` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` enum('queued','posting','posted','failed') NOT NULL DEFAULT 'queued',
  `platform` varchar(32) NOT NULL DEFAULT NULL,
  `template_id` int unsigned NULL DEFAULT NULL,
  `summary_id` bigint unsigned NULL DEFAULT NULL,
  `payload_title` varchar(255) NULL DEFAULT NULL,
  `payload_body` text NULL DEFAULT NULL,
  `payload_media` varchar(512) NULL DEFAULT NULL,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `posted_at` datetime NULL DEFAULT NULL,
  `retries` tinyint unsigned NOT NULL DEFAULT 0,
  `error_message` varchar(512) NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- status enum('queued','posting','posted','failed') NOT NULL
- platform varchar(32) NOT NULL
- template_id int unsigned NULL
- summary_id bigint unsigned NULL
- payload_title varchar(255) NULL
- payload_body text NULL
- payload_media varchar(512) NULL
- scheduled_at datetime NULL
- posted_at datetime NULL
- retries tinyint unsigned NOT NULL
- error_message varchar(512) NULL
- created_at datetime NOT NULL
- updated_at datetime NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_post_queue`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_post_queue'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_post_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

