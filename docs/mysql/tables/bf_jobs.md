-- Table: bf_jobs
-- Sources: code: app/Models/JobModel.php:8, app/Modules/Status/Controllers/HealthController.php:41, app/Libraries/Queue/Queue.php:28, app/Libraries/Queue/Queue.php:38, app/Libraries/Queue/Queue.php:48, app/Libraries/Queue/Queue.php:57
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_jobs` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_jobs' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_jobs` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_jobs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_jobs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_jobs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

