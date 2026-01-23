-- Table: bf_users_bank_accounts
-- Sources: code: app/Models/AccountsModel.php:48, app/Models/AccountsModel.php:71, app/Models/AccountsModel.php:77, app/Models/AccountsModel.php:125, app/Models/AccountsModel.php:331, app/Models/AccountsModel.php:355, app/Models/AccountsModel.php:455, app/Models/AccountsModel.php:461, app/Models/UserModel.php:454, app/Models/WalletModel.php:99, app/Models/WalletModel.php:118, app/Models/WalletModel.php:128, app/Models/WalletModel.php:250, app/Models/WalletModel.php:256, app/Models/WalletModel.php:264, app/Models/WalletModel.php:456, app/Models/WalletModel.php:467, app/Models/WalletModel.php:476, app/Models/WalletModel.php:483, app/Models/WalletModel.php:615, app/Models/WalletModel.php:696, app/Models/WalletModel.php:700, app/Models/WalletModel.php:969, app/Models/WalletModel.php:1167, app/Models/WalletModel.php:1358, app/Models/WalletModel.php:1673, app/Models/WalletModel.php:1682, app/Models/WalletModel.php:1728, app/Models/WalletModel.php:1758, app/Models/WalletModel.php:1840, app/Models/WalletModel.php:1956, app/Models/WalletModel.php:2105, app/Models/WalletModel.php:2126, app/Models/BudgetModel.php:405, app/Models/BudgetModel.php:423, app/Models/PlaidModel.php:141, app/Models/PlaidModel.php:155, app/Modules/Management/Controllers/WalletsController.php:350, app/Modules/User/Views/Wallets/Wallet_Manager.php:75, app/Modules/User/Views/Wallets/Wallet_Manager.php:195, app/Modules/User/Views/Budget/Details.php:9, app/Modules/User/Views/Investments/index/historical_table.php:38, app/Modules/User/Views/Investments/index/active_table.php:39, app/Modules/User/Controllers/DashboardController.php:1366, app/Libraries/MyMIWallets.php:264, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:20, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:12, docs/OVERVIEW.md:284, docs/budgeting/architecture.md:11
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_users_bank_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_accounts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_bank_accounts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_bank_accounts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_accounts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

