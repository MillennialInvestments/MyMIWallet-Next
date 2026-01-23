-- Table: bf_user_setup_preferences
-- Sources: migrations: 2026-02-15-000200_CreateUserSetupPreferences.php | code: app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:11, app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:52, app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:58, app/Database/Migrations/2026-02-15-000200_CreateUserSetupPreferences.php:59, app/Services/SetupStatusService.php:74, app/Services/SetupStatusService.php:78, app/Services/SetupStatusService.php:97, app/Services/SetupStatusService.php:108
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

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'dismiss_all');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `dismiss_all` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column dismiss_all already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'dismiss_budget');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `dismiss_budget` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column dismiss_budget already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'dismiss_wallets');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `dismiss_wallets` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column dismiss_wallets already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'dismiss_dashboard');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `dismiss_dashboard` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column dismiss_dashboard already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_setup_preferences` ADD UNIQUE INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_user_setup_preferences`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_setup_preferences'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

