# bf_investments_news

## Source
- Migration: _None_
- Model:
- Code references: app/Modules/APIs/Models/InvestmentsNewsModel.php:9, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:99, docs/_aiops/doc-change-log.md:1427

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_investments_news` (
  `id` int unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `email_message_id` varchar(191) NULL DEFAULT NULL,
  `source_email` varchar(191) NULL DEFAULT NULL,
  `provider` varchar(191) NULL DEFAULT NULL,
  `headline` varchar(255) NULL DEFAULT NULL,
  `subject` varchar(255) NOT NULL DEFAULT NULL,
  `body` text NOT NULL DEFAULT NULL,
  `category` varchar(64) NOT NULL DEFAULT 'news',
  `status` varchar(32) NOT NULL DEFAULT 'new',
  `received_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `updated_at` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int unsigned NOT NULL
- email_message_id varchar(191) NULL
- source_email varchar(191) NULL
- provider varchar(191) NULL
- headline varchar(255) NULL
- subject varchar(255) NOT NULL
- body text NOT NULL
- category varchar(64) NOT NULL
- status varchar(32) NOT NULL
- received_at datetime NULL
- created_at datetime NOT NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_investments_news`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investments_news'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investments_news'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

