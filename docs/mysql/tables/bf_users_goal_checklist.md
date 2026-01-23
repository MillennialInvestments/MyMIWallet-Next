-- Table: bf_users_goal_checklist
-- Sources: code: app/Models/BudgetModel.php:670, app/Models/BudgetModel.php:671, app/Models/BudgetModel.php:672, app/Models/BudgetModel.php:673, app/Models/GoalsModel.php:10, app/Models/DashboardModel.php:117, app/Models/DashboardModel.php:122, app/Models/DashboardModel.php:131, app/Models/DashboardModel.php:136
-- Suspected columns: id, status
CREATE TABLE IF NOT EXISTS `bf_users_goal_checklist` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_checklist' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_goal_checklist` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_checklist' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_goal_checklist` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_goal_checklist`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_checklist'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_goal_checklist'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

