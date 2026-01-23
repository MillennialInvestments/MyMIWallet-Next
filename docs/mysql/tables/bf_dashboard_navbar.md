-- Table: bf_dashboard_navbar
-- Sources: code: app/Models/DesignModel.php:70, app/Models/DesignModel.php:78, app/Models/DesignModel.php:86
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_dashboard_navbar` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_navbar' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_dashboard_navbar` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_dashboard_navbar`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_navbar'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_dashboard_navbar'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

