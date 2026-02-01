# bf_email_campaigns

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:60

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_campaigns` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NULL DEFAULT NULL,
  `subject` varchar(255) NULL DEFAULT NULL,
  `body` text NULL DEFAULT NULL,
  `recipient_group` varchar(100) NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `status` enum('Draft','Sent') NULL DEFAULT 'Draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- title varchar(255) NULL
- subject varchar(255) NULL
- body text NULL
- recipient_group varchar(100) NULL
- created_at datetime NULL
- status enum('Draft','Sent') NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_email_campaigns`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_campaigns'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

