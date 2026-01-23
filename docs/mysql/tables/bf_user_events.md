# bf_user_events

## Source
- Migration: app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php
- Model:
- Code references: app/Services/EventTracker.php, app/Modules/Management/Controllers/AuthFunnelController.php, app/Commands/AuthFunnelCheck.php

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
SHOW CREATE TABLE bf_user_events;
```
