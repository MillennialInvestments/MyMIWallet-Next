-- Table: bf_users_invest_accounts
-- Sources: code: app/Models/AccountsModel.php:51, app/Models/AccountsModel.php:107, app/Models/AccountsModel.php:113, app/Models/AccountsModel.php:405, app/Models/AccountsModel.php:516, app/Models/AccountsModel.php:522, app/Models/UserModel.php:482, app/Models/WalletModel.php:156, app/Models/WalletModel.php:336, app/Models/WalletModel.php:341, app/Models/WalletModel.php:349, app/Models/WalletModel.php:650, app/Models/WalletModel.php:972, app/Models/WalletModel.php:1170, app/Models/WalletModel.php:1379, app/Models/WalletModel.php:1691, app/Models/WalletModel.php:1737, app/Models/WalletModel.php:1767, app/Models/WalletModel.php:1843, app/Models/WalletModel.php:1959, app/Models/WalletModel.php:1960, app/Models/WalletModel.php:2108, app/Models/WalletModel.php:2129, app/Models/BudgetModel.php:718, app/Modules/Management/Controllers/WalletsController.php:353, app/Modules/User/Views/Wallets/index/debt_summary/active_table.php:118, app/Modules/User/Views/Investments/index/active_table.php:127, app/Modules/User/Controllers/DashboardController.php:1369, app/Libraries/MyMIWallets.php:268, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:16
-- Suspected columns: id
CREATE TABLE IF NOT EXISTS `bf_users_invest_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_invest_accounts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_invest_accounts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_invest_accounts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_invest_accounts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_invest_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

