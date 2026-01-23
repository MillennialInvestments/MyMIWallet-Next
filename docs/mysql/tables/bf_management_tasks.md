-- Table: bf_management_tasks
-- Sources: code: app/Views/themes/dashboard/layouts/metadata-information.php:85, app/Views/themes/dashboard/layouts/metadata-information.php:99, app/Models/AnalyticalModel.php:220, app/Models/AnalyticalModel.php:235, app/Models/AnalyticalModel.php:560, app/Models/AnalyticalModel.php:569, app/Modules/Management/Controllers/ServicesController.php:199
CREATE TABLE IF NOT EXISTS `bf_management_tasks` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_management_tasks' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_management_tasks` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_management_tasks`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_management_tasks'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_management_tasks'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

