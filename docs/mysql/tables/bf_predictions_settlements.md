-- Table: bf_predictions_settlements
-- Sources: migrations: 2025-09-09-000070_CreatePredictionsSettlementsPayouts.php | code: app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:28, app/Database/Migrations/2025-09-09-000070_CreatePredictionsSettlementsPayouts.php:56, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:138, docs/predictions/README.md:48, docs/predictions/mysql-migrations.md:120
CREATE TABLE IF NOT EXISTS `bf_predictions_settlements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` INT(11) UNSIGNED NOT NULL,
  `winning_option_id` INT(11) UNSIGNED NOT NULL,
  `resolver_user_id` INT(11) UNSIGNED NULL,
  `resolution_note` TEXT NULL,
  `resolved_at` DATETIME NOT NULL,
  `created_at` DATETIME NULL,
  PRIMARY KEY (`id`),
  KEY `market_id` (`market_id`),
  KEY `resolver_user_id` (`resolver_user_id`),
  FOREIGN KEY (`market_id`) REFERENCES `bf_predictions_markets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`winning_option_id`) REFERENCES `bf_predictions_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`resolver_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'market_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `market_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'winning_option_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `winning_option_id` INT(11) UNSIGNED NOT NULL', 'SELECT ''column winning_option_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'resolver_user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `resolver_user_id` INT(11) UNSIGNED NULL', 'SELECT ''column resolver_user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'resolution_note');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `resolution_note` TEXT NULL', 'SELECT ''column resolution_note already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'resolved_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `resolved_at` DATETIME NOT NULL', 'SELECT ''column resolved_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND column_name = 'created_at');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD COLUMN `created_at` DATETIME NULL', 'SELECT ''column created_at already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND index_name = 'market_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD INDEX `market_id` (`market_id`)', 'SELECT ''index market_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @idx_exists := (SELECT COUNT(*) FROM information_schema.statistics WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements' AND index_name = 'resolver_user_id');
SET @sql := IF(@idx_exists = 0, 'ALTER TABLE `bf_predictions_settlements` ADD INDEX `resolver_user_id` (`resolver_user_id`)', 'SELECT ''index resolver_user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Verification
SHOW CREATE TABLE `bf_predictions_settlements`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_predictions_settlements'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

