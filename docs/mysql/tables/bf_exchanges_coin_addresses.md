-- Table: bf_exchanges_coin_addresses
-- Sources: code: app/Models/SolanaModel.php:55, app/Models/SolanaModel.php:106, app/Models/SolanaModel.php:146, app/Libraries/MyMIDigibyte.php:32, app/Libraries/MyMIDigibyte.php:58, app/Libraries/MyMIBitcoin.php:65
CREATE TABLE IF NOT EXISTS `bf_exchanges_coin_addresses` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_coin_addresses' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_coin_addresses` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges_coin_addresses`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_coin_addresses'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_coin_addresses'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

