-- Table: bf_users_coin_purchases
-- Sources: code: app/Models/AccountsModel.php:284, app/Models/WalletModel.php:434, app/Models/MyMIGoldModel.php:36, app/Models/MyMIGoldModel.php:74, app/Models/MyMIGoldModel.php:101, app/Models/MyMIGoldModel.php:107, app/Models/MyMIGoldModel.php:114, app/Models/MyMIGoldModel.php:124, app/Models/MyMIGoldModel.php:147, app/Models/MyMIGoldModel.php:162, app/Models/MyMIGoldModel.php:173, app/Models/PublicModel.php:80, app/Models/ExchangeModel.php:282, app/Models/InvestmentModel.php:79, app/Models/InvestmentModel.php:479, app/Models/InvestmentModel.php:512, app/Models/InvestmentModel.php:519, app/Models/InvestmentModel.php:828, app/Models/MyMICoinModel.php:68, app/Models/MyMICoinModel.php:96, app/Modules/Management/Views/Web_Design/Test_Page/data-distribution.php:64, app/Modules/User/Views/Wallets/Feature_Manager.php:83, app/Modules/User/Views/Wallets/Purchase_Coins_Transaction.php:69, app/Modules/User/Views/Wallets/Purchase_Manager.php:69
CREATE TABLE IF NOT EXISTS `bf_users_coin_purchases` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_coin_purchases' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_coin_purchases` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_coin_purchases`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_coin_purchases'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_coin_purchases'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

