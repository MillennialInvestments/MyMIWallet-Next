-- Table: bf_investment_stock_listing
-- Sources: code: app/Models/AccountsModel.php:442, app/Models/AccountsModel.php:535, app/Models/AccountsModel.php:542, app/Models/WalletModel.php:514, app/Models/WalletModel.php:627, app/Models/WalletModel.php:635, app/Models/PublicModel.php:60, app/Models/AlertsModel.php:81, app/Models/TrackerModel.php:36, app/Models/TrackerModel.php:43, app/Models/TrackerModel.php:51, app/Models/InvestmentModel.php:89, app/Models/MyMICoinModel.php:236, app/Models/MyMICoinModel.php:242, app/Models/MyMICoinModel.php:263, app/Libraries/MyMIInvestments.php:1492
CREATE TABLE IF NOT EXISTS `bf_investment_stock_listing` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_investment_stock_listing' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_investment_stock_listing` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_investment_stock_listing`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_stock_listing'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_investment_stock_listing'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

