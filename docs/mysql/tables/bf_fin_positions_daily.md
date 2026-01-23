-- Table: bf_fin_positions_daily
-- Sources: code: app/Models/Fin/PositionDailyModel.php:8, app/Services/Fin/RiskService.php:95, app/Services/Fin/RiskService.php:104, app/Services/Fin/RiskService.php:107
-- Suspected columns: user_id, date
CREATE TABLE IF NOT EXISTS `bf_fin_positions_daily` (
  `user_id` TEXT NULL,
  `date` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_fin_positions_daily' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_fin_positions_daily` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_fin_positions_daily' AND column_name = 'date');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_fin_positions_daily` ADD COLUMN `date` TEXT NULL', 'SELECT ''column date already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_fin_positions_daily`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_positions_daily'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_fin_positions_daily'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

