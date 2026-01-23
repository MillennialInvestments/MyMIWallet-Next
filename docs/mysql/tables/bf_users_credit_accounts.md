-- Table: bf_users_credit_accounts
-- Sources: code: app/Models/AccountsModel.php:49, app/Models/AccountsModel.php:83, app/Models/AccountsModel.php:89, app/Models/AccountsModel.php:336, app/Models/AccountsModel.php:365, app/Models/AccountsModel.php:374, app/Models/AccountsModel.php:466, app/Models/AccountsModel.php:557, app/Models/UserModel.php:460, app/Models/WalletModel.php:108, app/Models/WalletModel.php:138, app/Models/WalletModel.php:269, app/Models/WalletModel.php:274, app/Models/WalletModel.php:282, app/Models/WalletModel.php:287, app/Models/WalletModel.php:300, app/Models/WalletModel.php:970, app/Models/WalletModel.php:1168, app/Models/WalletModel.php:1365, app/Models/WalletModel.php:1685, app/Models/WalletModel.php:1731, app/Models/WalletModel.php:1761, app/Models/WalletModel.php:1841, app/Models/WalletModel.php:1957, app/Models/WalletModel.php:2106, app/Models/WalletModel.php:2127, app/Models/BudgetModel.php:382, app/Models/BudgetModel.php:477, app/Models/BudgetModel.php:489, app/Models/BudgetModel.php:500, app/Models/BudgetModel.php:514, app/Models/BudgetModel.php:570, app/Models/BudgetModel.php:1096, app/Models/AlertsModel.php:1620, app/Modules/Management/Controllers/WalletsController.php:351, app/Modules/User/Views/Wallets/Wallet_Manager.php:136, app/Modules/User/Views/Wallets/Wallet_Manager.php:254, app/Modules/User/Views/Investments/index/historical_table.php:82, app/Modules/User/Views/Investments/index/active_table.php:83, app/Modules/User/Controllers/OnboardingWalkthroughController.php:195, app/Modules/User/Controllers/OnboardingWalkthroughController.php:196, app/Modules/User/Controllers/OnboardingWalkthroughController.php:210, app/Modules/User/Controllers/DashboardController.php:1367, app/Services/BudgetService.php:2611, app/Services/OnboardingProgressService.php:282, app/Services/OnboardingProgressService.php:283, app/Services/OnboardingProgressService.php:284, app/Services/OnboardingProgressService.php:287, app/Libraries/MyMIWallets.php:265, docs/onboarding/budget_investments_quick_setup.md:11, docs/onboarding/budget_investments_quick_setup.md:27, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/wallets/wallets_workflow.md:13, docs/testing/auth_onboarding_test_plan.md:30, docs/chatgpt/codex_executive_director/summary.md:15
-- Suspected columns: id, user_id, status
CREATE TABLE IF NOT EXISTS `bf_users_credit_accounts` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` TEXT NULL,
  `status` TEXT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Column adjustments
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts' AND column_name = 'id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_credit_accounts` ADD COLUMN `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT', 'SELECT ''column id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts' AND column_name = 'user_id');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_credit_accounts` ADD COLUMN `user_id` TEXT NULL', 'SELECT ''column user_id already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
SET @col_exists := (SELECT COUNT(*) FROM information_schema.columns WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts' AND column_name = 'status');
SET @sql := IF(@col_exists = 0, 'ALTER TABLE `bf_users_credit_accounts` ADD COLUMN `status` TEXT NULL', 'SELECT ''column status already exists''');
PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- Index adjustments

-- Verification
SHOW CREATE TABLE `bf_users_credit_accounts`;
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts'
ORDER BY ORDINAL_POSITION;
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;

