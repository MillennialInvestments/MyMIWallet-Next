-- Table: bf_campaign_auto_logs
-- Sources: code: app/Modules/Management/Controllers/EmailController.php:55, app/Modules/Management/Controllers/EmailController.php:56, app/Modules/Management/Controllers/EmailController.php:57, app/Modules/Management/Controllers/EmailController.php:58
-- Suspected columns: campaign_id, created_at
CREATE TABLE IF NOT EXISTS `bf_campaign_auto_logs` (
  `campaign_id` TEXT NULL,
  `created_at` TEXT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_campaign_auto_logs' AND column_name = 'campaign_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_campaign_auto_logs` ADD COLUMN `campaign_id` TEXT NULL', 'SELECT ''column campaign_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_campaign_auto_logs' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_campaign_auto_logs` ADD COLUMN `created_at` TEXT NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_campaign_auto_logs`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_campaign_auto_logs'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_campaign_auto_logs'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

