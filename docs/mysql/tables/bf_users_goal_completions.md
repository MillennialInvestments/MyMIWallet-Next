-- Table: bf_users_goal_completions
-- Sources: code: app/Models/BudgetModel.php:671, app/Models/BudgetModel.php:672, app/Models/BudgetModel.php:672, app/Models/BudgetModel.php:674, app/Models/DashboardModel.php:141, app/Models/DashboardModel.php:147, app/Modules/User/Views/Dashboard/Goals/Daily/browser_table.php:84
-- Suspected columns: goal_id, user_id
CREATE TABLE IF NOT EXISTS `bf_users_goal_completions` (
  `goal_id` TEXT NULL,
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_completions' AND column_name = 'goal_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_goal_completions` ADD COLUMN `goal_id` TEXT NULL', 'SELECT ''column goal_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_completions' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_goal_completions` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_goal_completions`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_completions'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_completions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

