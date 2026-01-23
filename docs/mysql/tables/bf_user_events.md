-- Table: bf_user_events
-- Sources: migrations: 2026-03-01-000100_CreateUserEvents.php | code: app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:11, app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:64, app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:70, app/Database/Migrations/2026-03-01-000100_CreateUserEvents.php:71, app/Modules/Management/Controllers/AuthFunnelController.php:103, app/Modules/Management/Controllers/AuthFunnelController.php:107, app/Modules/Management/Controllers/AuthFunnelController.php:143, app/Modules/Management/Controllers/AuthFunnelController.php:147, app/Modules/Management/Controllers/AuthFunnelController.php:168, app/Modules/Management/Controllers/AuthFunnelController.php:172, app/Modules/Management/Controllers/AuthFunnelController.php:197, app/Modules/Management/Controllers/AuthFunnelController.php:201, app/Commands/AuthFunnelCheck.php:21, app/Commands/AuthFunnelCheck.php:22, app/Commands/AuthFunnelCheck.php:70, app/Commands/AuthFunnelCheck.php:95, app/Services/EventTracker.php:20, app/Services/EventTracker.php:54, docs/cron/jobs/auth_funnel_check.md:22
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

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `user_id` INT(11) UNSIGNED NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'event_key');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `event_key` VARCHAR(64) NOT NULL', 'SELECT ''column event_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'event_group');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `event_group` VARCHAR(32) NOT NULL', 'SELECT ''column event_group already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'referral_code');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `referral_code` VARCHAR(64) NULL', 'SELECT ''column referral_code already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'ip');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `ip` VARCHAR(45) NULL', 'SELECT ''column ip already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'user_agent');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `user_agent` VARCHAR(255) NULL', 'SELECT ''column user_agent already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'meta_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `meta_json` LONGTEXT NULL', 'SELECT ''column meta_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_events` ADD COLUMN `created_at` DATETIME NOT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_events` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND index_name = 'event_key');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_events` ADD INDEX `event_key` (`event_key`)', 'SELECT ''index event_key already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND index_name = 'event_group');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_events` ADD INDEX `event_group` (`event_group`)', 'SELECT ''index event_group already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND index_name = 'referral_code');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_events` ADD INDEX `referral_code` (`referral_code`)', 'SELECT ''index referral_code already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_events' AND index_name = 'created_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_events` ADD INDEX `created_at` (`created_at`)', 'SELECT ''index created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_user_events`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_events'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_events'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

