# bf_mdit_webhook_events

## Source
- Migration: 2026-04-01-000100_CreateMditPhase1Tables.php
- Model:
- Code references: app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:147, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:164, app/Database/Migrations/2026-04-01-000100_CreateMditPhase1Tables.php:170, app/Models/MDIT/MditWebhookEventModel.php:10, docs/aiops/migration_model_audit.md:131, docs/aiops/migration_model_audit.md:238, docs/_aiops/doc-change-log.md:1574

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mdit_webhook_events` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider` VARCHAR(64) NOT NULL,
  `event_id` VARCHAR(191) NOT NULL,
  `event_type` VARCHAR(64) NOT NULL,
  `payload_json` LONGTEXT NOT NULL,
  `payload_hash` VARCHAR(128) NOT NULL,
  `received_on` DATETIME NULL,
  `processed_on` DATETIME NULL,
  `status` VARCHAR(32) NOT NULL DEFAULT 'RECEIVED',
  `error_message` VARCHAR(512) NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provider_event_id` (`provider`, `event_id`),
  KEY `status` (`status`),
  KEY `received_on` (`received_on`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- provider VARCHAR(64) NOT NULL
- event_id VARCHAR(191) NOT NULL
- event_type VARCHAR(64) NOT NULL
- payload_json LONGTEXT NOT NULL
- payload_hash VARCHAR(128) NOT NULL
- received_on DATETIME NULL
- processed_on DATETIME NULL
- status VARCHAR(32) NOT NULL
- error_message VARCHAR(512) NULL

## Required indexes
- PRIMARY (id)
- provider_event_id (provider, event_id) [UNIQUE]
- status (status)
- received_on (received_on)

## Verification
```sql
SHOW CREATE TABLE `bf_mdit_webhook_events`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_webhook_events'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mdit_webhook_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

