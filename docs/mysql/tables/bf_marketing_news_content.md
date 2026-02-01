# bf_marketing_news_content

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/APIs/Models/MarketingNewsContentModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:127, docs/_aiops/doc-change-log.md:1496

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_marketing_news_content` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NULL DEFAULT NULL,
  `email_subject` varchar(255) NULL DEFAULT NULL,
  `email_body` text NULL DEFAULT NULL,
  `source_type` varchar(50) NULL DEFAULT NULL,
  `source_url` varchar(512) NULL DEFAULT NULL,
  `content_type` varchar(50) NULL DEFAULT NULL,
  `keywords` text NULL DEFAULT NULL,
  `summary` text NULL DEFAULT NULL,
  `related_tickers` text NULL DEFAULT NULL,
  `date_received` datetime NULL DEFAULT NULL,
  `date_processed` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `status` varchar(20) NULL DEFAULT 'In Review',
  `error_log` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- title varchar(255) NULL
- email_subject varchar(255) NULL
- email_body text NULL
- source_type varchar(50) NULL
- source_url varchar(512) NULL
- content_type varchar(50) NULL
- keywords text NULL
- summary text NULL
- related_tickers text NULL
- date_received datetime NULL
- date_processed datetime NULL
- status varchar(20) NULL
- error_log text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_marketing_news_content`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_news_content'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_marketing_news_content'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

