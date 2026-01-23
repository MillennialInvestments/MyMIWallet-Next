-- Table: bf_predictions_payouts
-- Sources: migrations: 2025-09-09-000070_CreatePredictionsSettlementsPayouts.php | code: app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:50, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:55, app/Models/Predictions/PayoutsModel.php:7, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:136, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:49, docs/predictions/README.md:112, docs/predictions/mysql-migrations.md:135
CREATE TABLE IF NOT EXISTS `bf_predictions_payouts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `position_id` INT(11) UNSIGNED NOT NULL,
  `asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `status` ENUM('PENDING','SENT','FAILED') NOT NULL DEFAULT 'PENDING',
  `tx_ref` VARCHAR(100) NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `position_id` (`position_id`),
  KEY `status` (`status`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`position_id`) REFERENCES `bf_predictions_positions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'market_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `market_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'position_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `position_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column position_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'asset');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `asset` VARCHAR(20) NOT NULL DEFAULT ''MIMG''', 'SELECT ''column asset already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'amount');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column amount already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `status` ENUM(''PENDING'',''SENT'',''FAILED'') NOT NULL DEFAULT ''PENDING''', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'tx_ref');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `tx_ref` VARCHAR(100) NULL', 'SELECT ''column tx_ref already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'position_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `position_id` (`position_id`)', 'SELECT ''index position_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts' AND index_name = 'status');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_payouts` ADD INDEX `status` (`status`)', 'SELECT ''index status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_payouts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_payouts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

