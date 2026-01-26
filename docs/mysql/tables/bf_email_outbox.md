# bf_email_outbox

## Source
- Migration: 2026-03-05-000100_CreateEmailOutbox.php
- Model:
- Code references: app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:73, app/Database/Migrations/2026-03-05-000100_CreateEmailOutbox.php:78, app/Libraries/DbInventory/InventoryScanner.php:13, app/Libraries/DbInventory/SqlGenerator.php:9, app/Models/EmailOutboxModel.php:11, docs/spark/categories/alerts/mail-send-test.md:14

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_email_outbox` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NULL,
  `to_email` VARCHAR(190) NOT NULL,
  `subject` VARCHAR(190) NOT NULL,
  `type` VARCHAR(50) NOT NULL,
  `status` VARCHAR(20) NOT NULL DEFAULT 'queued',
  `error_message` VARCHAR(255) NULL,
  `provider` VARCHAR(50) NOT NULL DEFAULT 'smtp',
  `meta_json` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  `sent_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NULL
- to_email VARCHAR(190) NOT NULL
- subject VARCHAR(190) NOT NULL
- type VARCHAR(50) NOT NULL
- status VARCHAR(20) NOT NULL
- error_message VARCHAR(255) NULL
- provider VARCHAR(50) NOT NULL
- meta_json TEXT NULL
- created_at DATETIME NOT NULL
- sent_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- type (type)
- status (status)
- created_at (created_at)

## Verification
```sql
SHOW CREATE TABLE `bf_email_outbox`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_email_outbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

