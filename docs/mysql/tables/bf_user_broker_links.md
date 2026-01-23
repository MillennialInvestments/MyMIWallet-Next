-- Table: bf_user_broker_links
-- Sources: code: app/Libraries/MyMIUser.php:71, app/Libraries/MyMIUser.php:676, app/Libraries/MyMIUser.php:681, app/Libraries/MyMIUser.php:686
CREATE TABLE IF NOT EXISTS `bf_user_broker_links` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_user_broker_links' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_user_broker_links` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_user_broker_links`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_user_broker_links'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_user_broker_links'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

