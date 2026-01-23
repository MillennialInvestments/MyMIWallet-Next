-- Table: bf_user_profiles
-- Sources: migrations: 2026-02-01-000100_CreateUserOnboardingTables.php | code: app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:54, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:98, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:155, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:156, app/Models/ProfileModel.php:11, app/Modules/User/Controllers/OnboardingWalkthroughController.php:55, app/Modules/User/Controllers/OnboardingWalkthroughController.php:64, app/Services/SetupStatusService.php:228, app/Services/SetupStatusService.php:232, app/Services/OnboardingProgressService.php:222, app/Services/OnboardingProgressService.php:226, app/Libraries/Privacy/DataExportService.php:16, app/Libraries/Privacy/DataErasureService.php:13, docs/testing/auth_onboarding_test_plan.md:23
CREATE TABLE IF NOT EXISTS `bf_user_profiles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `first_name` VARCHAR(120) NULL,
  `last_name` VARCHAR(120) NULL,
  `email` VARCHAR(255) NULL,
  `phone` VARCHAR(40) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'first_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `first_name` VARCHAR(120) NULL', 'SELECT ''column first_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'last_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `last_name` VARCHAR(120) NULL', 'SELECT ''column last_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'email');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `email` VARCHAR(255) NULL', 'SELECT ''column email already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'phone');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `phone` VARCHAR(40) NULL', 'SELECT ''column phone already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_profiles` ADD UNIQUE INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_user_profiles`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_profiles'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

