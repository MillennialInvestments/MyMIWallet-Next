-- Table: bf_act_logger
-- Sources: code: app/Models/AnalyticalModel.php:260, app/Models/AnalyticalModel.php:274, app/Modules/Management/Views/Alerts/Trades.php:666, app/Libraries/MyMILogger.php:13
CREATE TABLE IF NOT EXISTS `bf_act_logger` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_act_logger' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_act_logger` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_act_logger`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_act_logger'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_act_logger'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

