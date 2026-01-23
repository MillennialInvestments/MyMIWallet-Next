-- Table: bf_users_debt_accounts
-- Sources: code: app/Models/AccountsModel.php:50, app/Models/AccountsModel.php:95, app/Models/AccountsModel.php:101, app/Models/AccountsModel.php:398, app/Models/AccountsModel.php:472, app/Models/AccountsModel.php:486, app/Models/AccountsModel.php:551, app/Models/UserModel.php:466, app/Models/WalletModel.php:147, app/Models/WalletModel.php:306, app/Models/WalletModel.php:312, app/Models/WalletModel.php:331, app/Models/WalletModel.php:529, app/Models/WalletModel.php:971, app/Models/WalletModel.php:1169, app/Models/WalletModel.php:1372, app/Models/WalletModel.php:1688, app/Models/WalletModel.php:1734, app/Models/WalletModel.php:1764, app/Models/WalletModel.php:1842, app/Models/WalletModel.php:1958, app/Models/WalletModel.php:2107, app/Models/WalletModel.php:2128, app/Models/BudgetModel.php:580, app/Models/BudgetModel.php:592, app/Models/BudgetModel.php:608, app/Models/BudgetModel.php:902, app/Models/BudgetModel.php:1103, app/Models/BudgetModel.php:1273, app/Models/BudgetModel.php:1316, app/Modules/Management/Controllers/WalletsController.php:352, app/Modules/User/Views/Wallets/Wallet_Manager.php:273, app/Modules/User/Views/Budget/Account_Manager-12232023.php:133, app/Modules/User/Views/Budget/Account_Manager-12232023.php:146, app/Modules/User/Views/Budget/Account_Manager-12232023.php:147, app/Modules/User/Views/Budget/Account_Manager-12232023.php:148, app/Modules/User/Views/Budget/Account_Manager-12232023.php:203, app/Modules/User/Views/Budget/Account_Manager-12232023.php:204, app/Modules/User/Views/Budget/Account_Manager-12232023.php:205, app/Modules/User/Views/Budget/Account_Manager-12232023.php:257, app/Modules/User/Views/Budget/Account_Manager.php:139, app/Modules/User/Views/Budget/index/Account_Manager-new.php:102, app/Modules/User/Views/Budget/index/Account_Manager-new.php:103, app/Modules/User/Views/Budget/Account_Manager-12152023.php:132, app/Modules/User/Views/Budget/Account_Manager-12152023.php:149, app/Modules/User/Views/Budget/Account_Manager-12152023.php:150, app/Modules/User/Views/Budget/Account_Manager-12152023.php:189, app/Modules/User/Controllers/OnboardingWalkthroughController.php:215, app/Modules/User/Controllers/OnboardingWalkthroughController.php:216, app/Modules/User/Controllers/OnboardingWalkthroughController.php:230, app/Modules/User/Controllers/DashboardController.php:1368, app/Services/BudgetService.php:2611, app/Services/OnboardingProgressService.php:293, app/Services/OnboardingProgressService.php:294, app/Services/OnboardingProgressService.php:295, app/Services/OnboardingProgressService.php:298, app/Libraries/MyMIWallets.php:267, docs/onboarding/budget_investments_quick_setup.md:11, docs/onboarding/budget_investments_quick_setup.md:27, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:15, docs/testing/auth_onboarding_test_plan.md:30, docs/chatgpt/codex_executive_director/summary.md:16
-- Suspected columns: id, user_id
CREATE TABLE IF NOT EXISTS `bf_users_debt_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_debt_accounts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_debt_accounts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_debt_accounts' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_debt_accounts` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_debt_accounts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_debt_accounts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_debt_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

