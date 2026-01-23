-- Table: bf_exchanges_blockchains
-- Sources: code: app/Models/ExchangeModel.php:319, app/Modules/Exchange/Views/Coin_Listing_Asset_Information/list_fields.php:32, app/Modules/Exchange/Views/Application_Manager.php:119, app/Modules/Exchange/Views/Application_Manager.php:153
CREATE TABLE IF NOT EXISTS `bf_exchanges_blockchains` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_blockchains' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_blockchains` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges_blockchains`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_blockchains'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_blockchains'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

