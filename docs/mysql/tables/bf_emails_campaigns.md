# bf_emails_campaigns

## Source
- Migration: _None_
- Model:
- Code references: docs/aiops/artifacts/db-drift/20260201-181038/summary.md:67

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_emails_campaigns` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT NULL,
  `content` text NOT NULL DEFAULT NULL,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- title varchar(255) NOT NULL
- content text NOT NULL
- scheduled_at datetime NULL
- created_at timestamp NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_emails_campaigns`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_emails_campaigns'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_emails_campaigns'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

