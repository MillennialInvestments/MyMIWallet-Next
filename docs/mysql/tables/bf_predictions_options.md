-- Table: bf_predictions_options
-- Sources: migrations: 2025-09-09-000020_CreatePredictionsOptions.php | code: app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:29, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:26, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:32, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:33, app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:35, app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:27, app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:32, app/Models/Predictions/OptionsModel.php:7, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:43, docs/predictions/mysql-migrations.md:30
CREATE TABLE IF NOT EXISTS `bf_predictions_options` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `label` VARCHAR(150) NOT NULL,
  `odds_bips` INT(11) NOT NULL DEFAULT 0,
  `liquidity_gold` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000,
  `is_winner` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `market_id_label` (`market_id`, `label`),
  KEY `is_winner` (`is_winner`),
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'market_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `market_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'label');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `label` VARCHAR(150) NOT NULL', 'SELECT ''column label already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'odds_bips');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `odds_bips` INT(11) NOT NULL DEFAULT 0', 'SELECT ''column odds_bips already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'liquidity_gold');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `liquidity_gold` DECIMAL(20,8) NOT NULL DEFAULT 0.00000000', 'SELECT ''column liquidity_gold already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'is_winner');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `is_winner` TINYINT(1) NOT NULL DEFAULT 0', 'SELECT ''column is_winner already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND index_name = 'market_id_label');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD INDEX `market_id_label` (`market_id`, `label`)', 'SELECT ''index market_id_label already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options' AND index_name = 'is_winner');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_options` ADD INDEX `is_winner` (`is_winner`)', 'SELECT ''index is_winner already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_options`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_options'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

