-- Table: bf_users_retirement_plans
-- Sources: code: app/Models/InvestmentModel.php:596, app/Models/InvestmentModel.php:1289, app/Models/InvestmentModel.php:1299, app/Models/InvestmentModel.php:1319, app/Models/InvestmentModel.php:1518, app/Models/InvestmentModel.php:1525, app/Models/InvestmentModel.php:1527, app/Models/InvestmentModel.php:1552
-- Suspected columns: user_id
CREATE TABLE IF NOT EXISTS `bf_users_retirement_plans` (
  `user_id` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_plans' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_retirement_plans` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_retirement_plans`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_plans'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_retirement_plans'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

