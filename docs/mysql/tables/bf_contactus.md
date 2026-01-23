-- Table: bf_contactus
-- Sources: code: app/Models/AlertsModel.php:52, app/Models/AlertsModel.php:52, app/Models/AlertsModel.php:53, app/Models/AlertsModel.php:53, app/Models/AlertsModel.php:54, app/Models/AlertsModel.php:54, app/Models/DesignModel.php:20, app/Models/DesignModel.php:20, app/Models/DesignModel.php:21, app/Models/DesignModel.php:21, app/Models/DesignModel.php:22, app/Models/DesignModel.php:22, app/Models/AnnouncementsModel.php:20, app/Models/AnnouncementsModel.php:20, app/Models/AnnouncementsModel.php:21, app/Models/AnnouncementsModel.php:21, app/Models/AnnouncementsModel.php:22, app/Models/AnnouncementsModel.php:22, app/Models/DashboardModel.php:29, app/Models/DashboardModel.php:30, app/Models/DashboardModel.php:31, app/Models/AnalyticalModel.php:18, app/Models/AnalyticalModel.php:19, app/Models/AnalyticalModel.php:20, app/Models/APIModel.php:20, app/Models/APIModel.php:20, app/Models/APIModel.php:21, app/Models/APIModel.php:21, app/Models/APIModel.php:22, app/Models/APIModel.php:22
-- Suspected columns: Name, id, email, phone, name
CREATE TABLE IF NOT EXISTS `bf_contactus` (
  `Name` TEXT NULL,
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` TEXT NULL,
  `phone` TEXT NULL,
  `name` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_contactus' AND column_name = 'Name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_contactus` ADD COLUMN `Name` TEXT NULL', 'SELECT ''column Name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_contactus' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_contactus` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_contactus' AND column_name = 'email');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_contactus` ADD COLUMN `email` TEXT NULL', 'SELECT ''column email already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_contactus' AND column_name = 'phone');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_contactus` ADD COLUMN `phone` TEXT NULL', 'SELECT ''column phone already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_contactus' AND column_name = 'name');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_contactus` ADD COLUMN `name` TEXT NULL', 'SELECT ''column name already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_contactus`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_contactus'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_contactus'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

