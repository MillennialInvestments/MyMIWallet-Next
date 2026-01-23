-- Table: bf_predictions_trades
-- Sources: migrations: 2025-09-09-000040_CreatePredictionsTrades.php | code: app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:34, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:39, app/Models/Predictions/TradesModel.php:7, app/Models/Predictions/SettlementsModel.php:7, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:45, docs/predictions/mysql-migrations.md:66
CREATE TABLE IF NOT EXISTS `bf_predictions_trades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) UNSIGNED NOT NULL,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `stake_asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `stake_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `fee_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `fill_odds_bips` INT(11) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `option_id` (`option_id`),
  FOREIGN KEY (`order_id`) REFERENCES `bf_predictions_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'order_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `order_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column order_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'market_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `market_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'option_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `option_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'stake_asset');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `stake_asset` VARCHAR(20) NOT NULL DEFAULT ''MIMG''', 'SELECT ''column stake_asset already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'stake_amount');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `stake_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column stake_amount already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'fee_amount');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `fee_amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column fee_amount already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'fill_odds_bips');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `fill_odds_bips` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column fill_odds_bips already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'order_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `order_id` (`order_id`)', 'SELECT ''index order_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades' AND index_name = 'option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_trades` ADD INDEX `option_id` (`option_id`)', 'SELECT ''index option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_trades`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_trades'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

