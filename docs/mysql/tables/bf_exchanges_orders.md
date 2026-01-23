-- Table: bf_exchanges_orders
-- Sources: code: app/Models/AccountsModel.php:276, app/Models/WalletModel.php:426, app/Models/MyMIGoldModel.php:64, app/Models/SolanaModel.php:345, app/Models/ExchangeModel.php:162, app/Models/ExchangeModel.php:173, app/Models/ExchangeModel.php:184, app/Models/ExchangeModel.php:195, app/Models/ExchangeModel.php:206, app/Models/ExchangeModel.php:212, app/Models/ExchangeModel.php:218, app/Models/ExchangeModel.php:288, app/Models/AnalyticalModel.php:412, app/Models/AnalyticalModel.php:434, app/Models/AnalyticalModel.php:443, app/Models/AnalyticalModel.php:455, app/Models/AssetsModel.php:154, app/Models/APIModel.php:48, app/Models/APIModel.php:61, app/Models/APIModel.php:71, app/Models/APIModel.php:80, app/Models/APIModel.php:90, app/Models/InvestmentModel.php:59, app/Models/InvestmentModel.php:822, app/Models/MyMICoinModel.php:58, app/Models/MyMICoinModel.php:82, app/Modules/Management/Views/Users/Assets.php:189, app/Modules/Management/Views/Web_Design/includes/Test_Content.php:45, app/Modules/Management/Views/Assets/Distribute/By_User.php:200, app/Modules/Exchange/Views/Order_Buy_Manager.php:22, app/Modules/Exchange/Views/Order_Buy_Manager.php:128, app/Modules/Exchange/Views/Order_Buy_Manager.php:156, app/Modules/Exchange/Views/Order_Buy_Manager.php:204, app/Modules/Exchange/Views/Order_Sell_Manager.php:22, app/Modules/Exchange/Views/Order_Sell_Manager.php:128, app/Modules/Exchange/Views/Order_Sell_Manager.php:156, app/Modules/Exchange/Views/Order_Sell_Manager.php:204, app/Modules/Exchange/Views/Order_Event_Manager.php:22
CREATE TABLE IF NOT EXISTS `bf_exchanges_orders` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_orders' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_exchanges_orders` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_exchanges_orders`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_orders'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_orders'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

