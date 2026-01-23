-- Table: bf_users_watchlist
-- Sources: code: app/Models/InvestmentModel.php:150, app/Models/InvestmentModel.php:586, app/Models/InvestmentModel.php:625, app/Modules/User/Controllers/OnboardingWalkthroughController.php:329, app/Modules/User/Controllers/OnboardingWalkthroughController.php:342, app/Services/SetupStatusService.php:242, app/Services/SetupStatusService.php:246, app/Services/WeeklyStreamService.php:111, app/Services/WeeklyStreamService.php:112, app/Services/OnboardingProgressService.php:333, app/Services/OnboardingProgressService.php:337, docs/onboarding/budget_investments_quick_setup.md:13, docs/testing/auth_onboarding_test_plan.md:34, docs/chatgpt/codex_executive_director/summary.md:20, docs/health/modules/investments.md:10, docs/health/health_test_checklist.md:231, docs/health/health_test_checklist.md:234
-- Suspected columns: user_id
CREATE TABLE IF NOT EXISTS `bf_users_watchlist` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_watchlist' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_watchlist` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_watchlist`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_watchlist'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_watchlist'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

