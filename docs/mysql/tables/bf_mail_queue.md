# bf_mail_queue

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MailQueueModel.php:10, docs/health/health_test_checklist.md:570, docs/spark/categories/alerts/mail-send-test.md:14, docs/spark/categories/alerts/mail-send.md:13

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mail_queue` (
  `id` bigint unsigned NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `module` varchar(32) NOT NULL DEFAULT 'system',
  `provider` varchar(32) NULL DEFAULT NULL,
  `to_email` varchar(191) NOT NULL DEFAULT NULL,
  `subject` varchar(191) NOT NULL DEFAULT NULL,
  `html` mediumtext NULL DEFAULT NULL,
  `text` mediumtext NULL DEFAULT NULL,
  `status` enum('queued','sending','sent','failed') NOT NULL DEFAULT 'queued',
  `attempts` int NOT NULL DEFAULT 0,
  `last_error` varchar(255) NULL DEFAULT NULL,
  `scheduled_at` datetime NULL DEFAULT NULL,
  `sent_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id bigint unsigned NOT NULL
- module varchar(32) NOT NULL
- provider varchar(32) NULL
- to_email varchar(191) NOT NULL
- subject varchar(191) NOT NULL
- html mediumtext NULL
- text mediumtext NULL
- status enum('queued','sending','sent','failed') NOT NULL
- attempts int NOT NULL
- last_error varchar(255) NULL
- scheduled_at datetime NULL
- sent_at datetime NULL
- created_at datetime NOT NULL
- updated_at datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_mail_queue`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mail_queue'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mail_queue'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

