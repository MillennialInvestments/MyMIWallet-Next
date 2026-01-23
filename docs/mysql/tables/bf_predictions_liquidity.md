-- Table: bf_predictions_liquidity
-- Sources: migrations: 2025-09-09-000060_CreatePredictionsLiquidity.php | code: app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:31, app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:36, app/Models/Predictions/LiquidityModel.php:7, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:47, docs/predictions/mysql-migrations.md:103
CREATE TABLE IF NOT EXISTS `bf_predictions_liquidity` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `provider_user_id` INT(11) UNSIGNED NOT NULL,
  `asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `state` ENUM('ACTIVE','REMOVED') NOT NULL DEFAULT 'ACTIVE',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `market_id_option_id` (`market_id`, `option_id`),
  KEY `provider_user_id` (`provider_user_id`),
  KEY `state` (`state`),
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`provider_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'market_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `market_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'option_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `option_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'provider_user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `provider_user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column provider_user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'asset');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `asset` VARCHAR(20) NOT NULL DEFAULT ''MIMG''', 'SELECT ''column asset already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'amount');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `amount` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column amount already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'state');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `state` ENUM(''ACTIVE'',''REMOVED'') NOT NULL DEFAULT ''ACTIVE''', 'SELECT ''column state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND index_name = 'market_id_option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD INDEX `market_id_option_id` (`market_id`, `option_id`)', 'SELECT ''index market_id_option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND index_name = 'provider_user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD INDEX `provider_user_id` (`provider_user_id`)', 'SELECT ''index provider_user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity' AND index_name = 'state');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_liquidity` ADD INDEX `state` (`state`)', 'SELECT ''index state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_liquidity`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_liquidity'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

