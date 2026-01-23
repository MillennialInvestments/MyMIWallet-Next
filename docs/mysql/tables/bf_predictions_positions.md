-- Table: bf_predictions_positions
-- Sources: migrations: 2025-09-09-000050_CreatePredictionsPositions.php | code: app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:49, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:33, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:38, app/Models/Predictions/PositionsModel.php:7, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:46, docs/predictions/mysql-migrations.md:84
CREATE TABLE IF NOT EXISTS `bf_predictions_positions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) UNSIGNED NOT NULL,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `option_id` INT(11) UNSIGNED NOT NULL,
  `avg_entry_odds_bips` INT(11) NOT NULL DEFAULT 0,
  `stake_asset` VARCHAR(20) NOT NULL DEFAULT 'MIMG',
  `stake_total` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `payout_max` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_market_id_option_id` (`user_id`, `market_id`, `option_id`),
  KEY `user_id` (`user_id`),
  KEY `market_id` (`market_id`),
  KEY `option_id` (`option_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `user_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'market_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `market_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'option_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `option_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'avg_entry_odds_bips');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `avg_entry_odds_bips` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column avg_entry_odds_bips already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'stake_asset');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `stake_asset` VARCHAR(20) NOT NULL DEFAULT ''MIMG''', 'SELECT ''column stake_asset already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'stake_total');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `stake_total` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column stake_total already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'payout_max');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `payout_max` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column payout_max already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD INDEX `user_id` (`user_id`)', 'SELECT ''index user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD INDEX `option_id` (`option_id`)', 'SELECT ''index option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions' AND index_name = 'user_id_market_id_option_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_positions` ADD UNIQUE INDEX `user_id_market_id_option_id` (`user_id`, `market_id`, `option_id`)', 'SELECT ''index user_id_market_id_option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_positions`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_positions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

