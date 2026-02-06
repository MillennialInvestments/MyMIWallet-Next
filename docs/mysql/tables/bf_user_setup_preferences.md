# bf_user_setup_preferences

## Source
- Migration: 2026-02-15-000200_CreateUserSetupPreferences.php
- Model:
- Code references: app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:11, app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:52, app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:58, app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:59, app/Services/SetupStatusService.php:74, app/Services/SetupStatusService.php:78, app/Services/SetupStatusService.php:97, app/Services/SetupStatusService.php:108, docs/codex/reviews/Spark-Analysis-2026-02-01.md:587, docs/_aiops/doc-change-log.md:2066

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_user_setup_preferences` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `dismiss_all` TINYINT(1) NOT NULL DEFAULT 0,
  `dismiss_budget` TINYINT(1) NOT NULL DEFAULT 0,
  `dismiss_wallets` TINYINT(1) NOT NULL DEFAULT 0,
  `dismiss_dashboard` TINYINT(1) NOT NULL DEFAULT 0,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id INT(11) UNSIGNED NOT NULL
- user_id INT(11) UNSIGNED NOT NULL
- dismiss_all TINYINT(1) NOT NULL
- dismiss_budget TINYINT(1) NOT NULL
- dismiss_wallets TINYINT(1) NOT NULL
- dismiss_dashboard TINYINT(1) NOT NULL
- updated_at DATETIME NULL

## Required indexes
- PRIMARY (id)
- user_id (user_id) [UNIQUE]
- user_id (user_id)

## Verification
```sql
SHOW CREATE TABLE `bf_user_setup_preferences`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

