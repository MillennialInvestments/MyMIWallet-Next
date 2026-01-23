-- Table: bf_auction_settlements
-- Sources: code: app/Models/AuctionSettlementModel.php:7, app/Models/AuctionSettlementModel.php:32, app/Models/AuctionSettlementModel.php:106, app/Models/AuctionSettlementModel.php:132, app/Models/AuctionSettlementModel.php:159, app/Models/AuctionSettlementModel.php:181, app/Models/AuctionLotModel.php:78, app/Libraries/FMVEngine.php:50, docs/functional_inventory/docs_to_code_map.md:14, docs/functional_inventory/docs_to_code_map.md:51, docs/auctions/auction-schema.md:53
CREATE TABLE IF NOT EXISTS `bf_auction_settlements` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_auction_settlements' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_auction_settlements` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_auction_settlements`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_settlements'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_auction_settlements'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

