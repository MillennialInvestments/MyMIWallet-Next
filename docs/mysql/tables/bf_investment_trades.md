-- Table: bf_investment_trades
-- Sources: code: app/Modules/APIs/Controllers/ChatController.php:153, app/Modules/APIs/Controllers/ChatController.php:154, app/Modules/APIs/Controllers/ChatController.php:174, app/Modules/APIs/Controllers/ChatController.php:175, app/Modules/APIs/Controllers/ChatController.php:189, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:84, docs/notes/2025-12-01-feature-corrections.md:40
CREATE TABLE IF NOT EXISTS `bf_investment_trades` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trades' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_trades` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_trades`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trades'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_trades'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

