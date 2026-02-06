# bf_aiops_email_processed

## Source
- Migration: 2026-03-20-000100_CreateAiOpsEmailScanTables.php
- Model:
- Code references: app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:46, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:65, app/Database/Migrations/2026-03-20-000100_CreateAiOpsEmailScanTables.php:107, app/Models/AiOpsEmailProcessedModel.php:11, docs/aiops/scrapers/alerts-email-scan.md:25

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_aiops_email_processed` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `mailbox` VARCHAR(190) NOT NULL,
  `imap_uid` BIGINT UNSIGNED NOT NULL,
  `message_id` VARCHAR(255) NULL,
  `from_email` VARCHAR(255) NULL,
  `subject` VARCHAR(255) NULL,
  `received_at` DATETIME NULL,
  `processed_at` DATETIME NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'stored',
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mailbox_imap_uid` (`mailbox`, `imap_uid`),
  KEY `received_at` (`received_at`),
  KEY `from_email` (`from_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT UNSIGNED NOT NULL
- mailbox VARCHAR(190) NOT NULL
- imap_uid BIGINT UNSIGNED NOT NULL
- message_id VARCHAR(255) NULL
- from_email VARCHAR(255) NULL
- subject VARCHAR(255) NULL
- received_at DATETIME NULL
- processed_at DATETIME NULL
- status VARCHAR(32) NOT NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- mailbox_imap_uid (mailbox, imap_uid) [UNIQUE]
- received_at (received_at)
- from_email (from_email)

## Verification
```sql
SHOW CREATE TABLE `bf_aiops_email_processed`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_email_processed'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_aiops_email_processed'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

