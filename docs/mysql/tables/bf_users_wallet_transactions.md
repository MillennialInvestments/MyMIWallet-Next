-- Table: bf_users_wallet_transactions
-- Sources: code: app/Models/AccountsModel.php:163, app/Models/AccountsModel.php:206, app/Models/AccountsModel.php:221, app/Models/AccountsModel.php:235, app/Models/AccountsModel.php:243, app/Models/AccountsModel.php:251, app/Models/AccountsModel.php:260, app/Models/AccountsModel.php:269, app/Models/AccountsModel.php:321, app/Models/AccountsModel.php:326, app/Models/WalletModel.php:67, app/Models/WalletModel.php:72, app/Models/WalletModel.php:89, app/Models/WalletModel.php:176, app/Models/WalletModel.php:206, app/Models/WalletModel.php:356, app/Models/WalletModel.php:369, app/Models/WalletModel.php:382, app/Models/WalletModel.php:391, app/Models/WalletModel.php:400, app/Models/WalletModel.php:409, app/Models/WalletModel.php:418, app/Models/PlaidModel.php:125, app/Models/ReferralModel.php:199, app/Models/ReferralModel.php:228, app/Models/AnalyticalModel.php:419, app/Models/TransactionModel.php:10, app/Models/MyMICoinModel.php:126, app/Models/MyMICoinModel.php:184, app/Models/MyMICoinModel.php:196, app/Models/MyMICoinModel.php:208, app/Models/MyMICoinModel.php:215, app/Models/MyMICoinModel.php:222, app/Models/MyMICoinModel.php:229, app/Modules/User/Controllers/WalletsController.php:2049, app/Services/BlockchainService.php:118
CREATE TABLE IF NOT EXISTS `bf_users_wallet_transactions` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet_transactions' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallet_transactions` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_wallet_transactions`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet_transactions'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet_transactions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

