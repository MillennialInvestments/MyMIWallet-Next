# bf_ops_command_inbox

## Source
- Migration: app/Database/Migrations/2026-03-15-000100_CreateAiOpsTaskPipelineTables.php
- Model: app/Models/OpsCommandInboxModel.php

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_ops_command_inbox` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `message_id` VARCHAR(255) NULL,
  `from_email` VARCHAR(255) NULL,
  `subject` VARCHAR(255) NULL,
  `raw_body` LONGTEXT NULL,
  `parsed_json` JSON NULL,
  `ai_plan_json` JSON NULL,
  `ai_summary` TEXT NULL,
  `security_flags` JSON NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'New',
  `meta_json` JSON NULL,
  `received_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `received_at` (`received_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

> If your MySQL version does not support `JSON` (or you are on MariaDB), use `LONGTEXT` for JSON columns and validate payloads with `aiops_normalize_json()`.

## Required columns
- message_id VARCHAR(255)
- from_email VARCHAR(255)
- subject VARCHAR(255)
- raw_body LONGTEXT
- parsed_json JSON or LONGTEXT
- ai_plan_json JSON or LONGTEXT
- ai_summary TEXT
- security_flags JSON or LONGTEXT
- status VARCHAR(32)
- meta_json JSON or LONGTEXT
- received_at DATETIME

## Required indexes
- PRIMARY KEY (`id`)
- KEY `status` (`status`)
- KEY `received_at` (`received_at`)

## Verification
```sql
SHOW CREATE TABLE `bf_ops_command_inbox`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_ops_command_inbox'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```
