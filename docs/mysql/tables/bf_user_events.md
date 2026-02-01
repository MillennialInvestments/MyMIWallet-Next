# bf_user_events

## Source
- Migration: 2026-03-01-000100_CreateUserEvents.php
- Model:
- Code references: app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:11, app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:64, app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:70, app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:71, app/Libraries/DbInventory/InventoryScanner.php:12, app/Libraries/DbInventory/SqlGenerator.php:8, app/Modules/Management/Controllers/AuthFunnelController.php:103, app/Modules/Management/Controllers/AuthFunnelController.php:107, app/Modules/Management/Controllers/AuthFunnelController.php:143, app/Modules/Management/Controllers/AuthFunnelController.php:147, app/Modules/Management/Controllers/AuthFunnelController.php:168, app/Modules/Management/Controllers/AuthFunnelController.php:172, app/Modules/Management/Controllers/AuthFunnelController.php:197, app/Modules/Management/Controllers/AuthFunnelController.php:201, app/Services/EventTracker.php:20, app/Services/EventTracker.php:54, app/Services/Spark/AuthFunnelCheckService.php:13, app/Services/Spark/AuthFunnelCheckService.php:16, app/Services/Spark/AuthFunnelCheckService.php:54, app/Services/Spark/AuthFunnelCheckService.php:79, docs/cron/jobs/auth_funnel_check.md:22, docs/_aiops/doc-change-log.md:1829, docs/spark/categories/auth/auth-funnel-check.md:13, docs/spark/categories/auth/auth-funnel-check.md:32, docs/spark/roadmap.md:9, docs/spark/inventory.md:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_events` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NULL,
  `event_key` VARCHAR(64) NOT NULL,
  `event_group` VARCHAR(32) NOT NULL,
  `referral_code` VARCHAR(64) NULL,
  `ip` VARCHAR(45) NULL,
  `user_agent` VARCHAR(255) NULL,
  `meta_json` LONGTEXT NULL,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `event_key` (`event_key`),
  KEY `event_group` (`event_group`),
  KEY `referral_code` (`referral_code`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id BIGINT(20) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NULL
- event_key VARCHAR(64) NOT NULL
- event_group VARCHAR(32) NOT NULL
- referral_code VARCHAR(64) NULL
- ip VARCHAR(45) NULL
- user_agent VARCHAR(255) NULL
- meta_json LONGTEXT NULL
- created_at DATETIME NOT NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id)
- event_key (event_key)
- event_group (event_group)
- referral_code (referral_code)
- created_at (created_at)

## Verification
```sql
SHOW CREATE TABLE `bf_user_events`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_events'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

