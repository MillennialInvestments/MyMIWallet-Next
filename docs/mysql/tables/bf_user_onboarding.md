-- Table: bf_user_onboarding
-- Sources: migrations: 2026-02-01-000100_CreateUserOnboardingTables.php | code: app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:11, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:51, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:159, app/Database/Migrations/2026-02-01-000100_CreateUserOnboardingTables.php:160, app/Models/UserModel.php:174, app/Models/UserModel.php:362, app/Models/UserModel.php:363, app/Models/UserModel.php:382, app/Services/OnboardingProgressService.php:20, app/Services/OnboardingProgressService.php:21, app/Services/OnboardingProgressService.php:28, app/Services/OnboardingProgressService.php:57, app/Services/OnboardingProgressService.php:83, app/Services/OnboardingProgressService.php:171, app/Libraries/MyMIOnboarding.php:89, docs/onboarding/budget_investments_quick_setup.md:8, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:90, docs/operations/05-database.md:26, docs/testing/auth_onboarding_test_plan.md:6
CREATE TABLE IF NOT EXISTS `bf_user_onboarding` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `steps_json` TEXT NULL,
  `first_verified_login_at` DATETIME NULL,
  `walkthrough_started_at` DATETIME NULL,
  `walkthrough_completed_at` DATETIME NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'steps_json');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `steps_json` TEXT NULL', 'SELECT ''column steps_json already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'first_verified_login_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `first_verified_login_at` DATETIME NULL', 'SELECT ''column first_verified_login_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'walkthrough_started_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `walkthrough_started_at` DATETIME NULL', 'SELECT ''column walkthrough_started_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'walkthrough_completed_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `walkthrough_completed_at` DATETIME NULL', 'SELECT ''column walkthrough_completed_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_user_onboarding` ADD UNIQUE INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_user_onboarding`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_onboarding'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

