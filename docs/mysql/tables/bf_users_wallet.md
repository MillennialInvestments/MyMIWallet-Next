-- Table: bf_users_wallet
-- Sources: code: app/Models/AccountsModel.php:297, app/Models/AccountsModel.php:302, app/Models/AccountsModel.php:309, app/Models/AccountsModel.php:315, app/Models/AccountsModel.php:448, app/Models/AccountsModel.php:509, app/Models/AccountsModel.php:528, app/Models/AccountsModel.php:567, app/Models/AccountsModel.php:574, app/Models/AccountsModel.php:580, app/Models/UserModel.php:423, app/Models/UserModel.php:433, app/Models/WalletModel.php:9, app/Models/WalletModel.php:62, app/Models/WalletModel.php:165, app/Models/WalletModel.php:187, app/Models/WalletModel.php:212, app/Models/WalletModel.php:243, app/Models/WalletModel.php:448, app/Models/WalletModel.php:488, app/Models/WalletModel.php:521, app/Models/WalletModel.php:539, app/Models/WalletModel.php:550, app/Models/WalletModel.php:559, app/Models/WalletModel.php:570, app/Models/WalletModel.php:579, app/Models/WalletModel.php:597, app/Models/WalletModel.php:605, app/Models/WalletModel.php:669, app/Models/WalletModel.php:674, app/Models/WalletModel.php:679, app/Models/WalletModel.php:683, app/Models/WalletModel.php:691, app/Models/WalletModel.php:939, app/Models/WalletModel.php:1269, app/Models/WalletModel.php:1273, app/Models/WalletModel.php:1282, app/Models/WalletModel.php:1405, app/Models/WalletModel.php:1444, app/Models/WalletModel.php:1446, app/Models/WalletModel.php:1488, app/Models/WalletModel.php:1672, app/Models/WalletModel.php:1777, app/Models/WalletModel.php:1789, app/Models/WalletModel.php:1893, app/Models/WalletModel.php:1947, app/Models/WalletModel.php:1985, app/Models/WalletModel.php:2022, app/Models/WalletModel.php:2027, app/Models/WalletModel.php:2041, app/Models/BudgetModel.php:458, app/Models/PublicModel.php:68, app/Models/PlaidModel.php:49, app/Models/PlaidModel.php:93, app/Models/SolanaModel.php:163, app/Models/SolanaModel.php:233, app/Models/SolanaModel.php:440, app/Models/SolanaModel.php:453, app/Models/SolanaModel.php:460, app/Models/SolanaModel.php:492, app/Models/SolanaModel.php:499, app/Models/SolanaModel.php:506, app/Models/SolanaModel.php:578, app/Models/TrackerModel.php:58, app/Models/ExchangeModel.php:252, app/Models/ExchangeModel.php:260, app/Models/ExchangeModel.php:268, app/Models/DashboardModel.php:71, app/Models/AnalyticalModel.php:520, app/Models/AnalyticalModel.php:536, app/Models/AnalyticalModel.php:552, app/Models/InvestmentModel.php:486, app/Models/MyMICoinModel.php:114, app/Models/MyMICoinModel.php:119, app/Models/MyMICoinModel.php:131, app/Models/MyMICoinModel.php:137, app/Models/MyMICoinModel.php:143, app/Models/MyMICoinModel.php:150, app/Models/MyMICoinModel.php:156, app/Models/MyMICoinModel.php:166, app/Models/MyMICoinModel.php:176, app/Modules/Management/Views/Web_Design/Content_Creator/Management/Wallets/Generate_Wallet.php:71, app/Modules/Management/Views/Web_Design/Content_Creator/Management/Wallets/Generate_Wallet.php:81, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:105, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:133, app/Modules/Management/Controllers/WalletsController.php:274, app/Modules/Management/Controllers/WalletsController.php:395, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:71, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:97, app/Modules/User/Views/Wallets/Link_Account/Details.php:66, app/Modules/User/Views/Wallets/Link_Account/Details.php:157, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:71, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:97, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:73, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:99, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:46, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:60, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:121, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:212, app/Modules/User/Views/Wallets/Details.php:64, app/Modules/User/Views/Wallets/Wallet_Manager.php:94, app/Modules/User/Views/Wallets/Wallet_Manager.php:154, app/Modules/User/Views/Wallets/Wallet_Manager.php:212, app/Modules/User/Views/Wallets/Wallet_Manager.php:293, app/Modules/User/Views/Wallets/Wallet_Manager.php:305, app/Modules/User/Views/Wallets/Link_Account (Original)/Success.php:35, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:71, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:97, app/Modules/User/Views/Investments/Account_Manager.php:85, app/Modules/User/Views/Investments/index/historical_table.php:144, app/Modules/User/Views/Investments/index/historical_table.php:148, app/Modules/User/Views/Investments/index/active_table.php:189, app/Modules/User/Views/Investments/index/active_table.php:193, app/Modules/User/Controllers/WalletsController.php:1054, app/Modules/APIs/Controllers/WalletsController.php:368, app/Modules/APIs/Controllers/SolanaController.php:167, app/Modules/Exchange/Controllers/SolanaController.php:318, app/Services/SetupStatusService.php:170, app/Services/SetupStatusService.php:174, app/Services/SetupStatusService.php:175, app/Services/SetupStatusService.php:178, app/Libraries/MyMIUser.php:356, app/Libraries/MyMIUsers.php:390, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:8, docs/wallets/wallets_workflow.md:11
-- Suspected columns: id, user_id, active, market, default
CREATE TABLE IF NOT EXISTS `bf_users_wallet` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` TEXT NULL,
  `active` TEXT NULL,
  `market` TEXT NULL,
  `default` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallet` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallet` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet' AND column_name = 'active');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallet` ADD COLUMN `active` TEXT NULL', 'SELECT ''column active already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet' AND column_name = 'market');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallet` ADD COLUMN `market` TEXT NULL', 'SELECT ''column market already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet' AND column_name = 'default');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_wallet` ADD COLUMN `default` TEXT NULL', 'SELECT ''column default already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_wallet`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

