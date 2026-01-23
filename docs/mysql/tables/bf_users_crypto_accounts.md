-- Table: bf_users_crypto_accounts
-- Sources: code: app/Models/AccountsModel.php:391, app/Models/UserModel.php:444, app/Models/WalletModel.php:292, app/Models/WalletModel.php:642, app/Models/WalletModel.php:973, app/Models/WalletModel.php:1171, app/Models/WalletModel.php:1386, app/Models/WalletModel.php:1694, app/Models/WalletModel.php:1740, app/Models/WalletModel.php:1770, app/Models/WalletModel.php:1961, app/Models/WalletModel.php:1978, app/Models/WalletModel.php:2109, app/Models/WalletModel.php:2130, app/Models/BudgetModel.php:532, app/Models/BudgetModel.php:545, app/Models/BudgetModel.php:549, app/Models/SolanaModel.php:555, app/Modules/Management/Controllers/WalletsController.php:354, app/Services/WalletService.php:379, app/Services/WalletService.php:480, app/Services/WalletService.php:1085, app/Libraries/MyMIWallets.php:266, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:14
CREATE TABLE IF NOT EXISTS `bf_users_crypto_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_crypto_accounts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_crypto_accounts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_crypto_accounts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_crypto_accounts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_crypto_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

