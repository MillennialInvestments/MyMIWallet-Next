-- Table: bf_user_employment
-- Sources: migrations: 2026-02-01-000100_CreateUserOnboardingTables.php | code: app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:101, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:145, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:151, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:152, app/Modules/User/Controllers/OnboardingWalkthroughController.php:73, app/Modules/User/Controllers/OnboardingWalkthroughController.php:82, app/Services/OnboardingProgressService.php:236, app/Services/OnboardingProgressService.php:240, docs/testing/auth_onboarding_test_plan.md:23
CREATE TABLE IF NOT EXISTS `bf_user_employment` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `employment_type` VARCHAR(40) NULL,
  `company_name` VARCHAR(160) NULL,
  `business_name` VARCHAR(160) NULL,
  `job_title` VARCHAR(120) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'employment_type');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `employment_type` VARCHAR(40) NULL', 'SELECT ''column employment_type already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'company_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `company_name` VARCHAR(160) NULL', 'SELECT ''column company_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'business_name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `business_name` VARCHAR(160) NULL', 'SELECT ''column business_name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'job_title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `job_title` VARCHAR(120) NULL', 'SELECT ''column job_title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_employment` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_employment` ADD UNIQUE INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_user_employment`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_employment'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

