# bf_content_posts

## Source
- Migration: _None_
- Model:
- Code references: app/Models/ContentPostModel.php:11, docs/content_engine/overview.md:37, docs/content_engine/security.md:11, docs/content_engine/sql_patch_notes.md:9, docs/content_engine/troubleshooting.md:15, docs/content_engine/troubleshooting.md:20, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:46, docs/aiops/migration_model_audit.md:89, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1106, docs/spark/categories/marketing/content-ingest-sample.md:13, docs/spark/categories/marketing/contentengine-smoke.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_content_posts` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `idea_id` int unsigned NOT NULL DEFAULT NULL,
  `platform` enum('tradingview','stocktwits','tiktok','youtube','facebook','discord') NOT NULL DEFAULT NULL,
  `title` varchar(255) NULL DEFAULT NULL,
  `body` text NULL DEFAULT NULL,
  `hashtags` text NULL DEFAULT NULL,
  `cta` text NULL DEFAULT NULL,
  `payload_json` text NULL DEFAULT NULL,
  `status` enum('draft','approved','sent','failed') NOT NULL DEFAULT 'draft',
  `last_error` text NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- idea_id int unsigned NOT NULL
- platform enum('tradingview','stocktwits','tiktok','youtube','facebook','discord') NOT NULL
- title varchar(255) NULL
- body text NULL
- hashtags text NULL
- cta text NULL
- payload_json text NULL
- status enum('draft','approved','sent','failed') NOT NULL
- last_error text NULL
- created_at datetime NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_content_posts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_content_posts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_content_posts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

