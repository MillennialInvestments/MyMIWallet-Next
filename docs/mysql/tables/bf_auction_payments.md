-- Table: bf_auction_payments
-- Sources: code: app/Models/AuctionPaymentModel.php:7, docs/functional_inventory/docs_to_code_map.md:14, docs/functional_inventory/docs_to_code_map.md:51, docs/auctions/auction-schema.md:82
CREATE TABLE IF NOT EXISTS `bf_auction_payments` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auction_payments' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auction_payments` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_auction_payments`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_payments'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_payments'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

