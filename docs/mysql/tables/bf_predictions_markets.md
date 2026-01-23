-- Table: bf_predictions_markets
-- Sources: migrations: 2025-09-09-000010_CreatePredictionsMarkets.php | code: app/Database/Migrations/2025-09-09-000060_CreatePredictionsLiquidity.php:28, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:25, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:48, app/Database/Migrations/2025-09-09-000050_CreatePredictionsPositions.php:31, app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php:32, app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:36, app/Database/Migrations/2025-09-09-000010_CreatePredictionsMarkets.php:41, app/Database/Migrations/2025-09-09-000030_CreatePredictionsOrders.php:34, app/Database/Migrations/2025-09-09-000020_CreatePredictionsOptions.php:26, app/Models/Predictions/MarketsModel.php:7, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:42, docs/predictions/mysql-migrations.md:7
CREATE TABLE IF NOT EXISTS `bf_predictions_markets` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(150) NULL,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NULL,
  `category` VARCHAR(100) NOT NULL DEFAULT 'General',
  `resolution_source` VARCHAR(150) NOT NULL DEFAULT 'Admin/Oracle',
  `currency_mode` ENUM('GOLD_CENTRIC','MULTI_ASSET') NOT NULL DEFAULT 'GOLD_CENTRIC',
  `state` ENUM('DRAFT','OPEN','LOCKED','RESOLVED','CANCELED') NOT NULL DEFAULT 'OPEN',
  `open_at` DATETIME NULL,
  `lock_at` DATETIME NULL,
  `resolve_at` DATETIME NULL,
  `created_by` INT(11) UNSIGNED NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `state` (`state`),
  KEY `category` (`category`),
  KEY `lock_at` (`lock_at`),
  KEY `created_by` (`created_by`),
  FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'slug');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `slug` VARCHAR(150) NULL', 'SELECT ''column slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'title');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `title` VARCHAR(255) NOT NULL', 'SELECT ''column title already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'description');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `description` TEXT NULL', 'SELECT ''column description already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'category');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `category` VARCHAR(100) NOT NULL DEFAULT ''General''', 'SELECT ''column category already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'resolution_source');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `resolution_source` VARCHAR(150) NOT NULL DEFAULT ''Admin/Oracle''', 'SELECT ''column resolution_source already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'currency_mode');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `currency_mode` ENUM(''GOLD_CENTRIC'',''MULTI_ASSET'') NOT NULL DEFAULT ''GOLD_CENTRIC''', 'SELECT ''column currency_mode already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'state');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `state` ENUM(''DRAFT'',''OPEN'',''LOCKED'',''RESOLVED'',''CANCELED'') NOT NULL DEFAULT ''OPEN''', 'SELECT ''column state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'open_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `open_at` DATETIME NULL', 'SELECT ''column open_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'lock_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `lock_at` DATETIME NULL', 'SELECT ''column lock_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'resolve_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `resolve_at` DATETIME NULL', 'SELECT ''column resolve_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'created_by');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `created_by` INT(11) UNSIGNED NULL', 'SELECT ''column created_by already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND column_name = 'updated_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD COLUMN `updated_at` DATETIME NULL', 'SELECT ''column updated_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'state');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `state` (`state`)', 'SELECT ''index state already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'category');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `category` (`category`)', 'SELECT ''index category already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'lock_at');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `lock_at` (`lock_at`)', 'SELECT ''index lock_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'created_by');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD INDEX `created_by` (`created_by`)', 'SELECT ''index created_by already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets' AND index_name = 'slug');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_markets` ADD UNIQUE INDEX `slug` (`slug`)', 'SELECT ''index slug already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_markets`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_markets'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

