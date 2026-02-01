# bf_users_debt_accounts

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIWallets.php:267, app/Models/AccountsModel.php:50, app/Models/AccountsModel.php:95, app/Models/AccountsModel.php:101, app/Models/AccountsModel.php:398, app/Models/AccountsModel.php:472, app/Models/AccountsModel.php:486, app/Models/AccountsModel.php:551, app/Models/BudgetModel.php:580, app/Models/BudgetModel.php:592, app/Models/BudgetModel.php:608, app/Models/BudgetModel.php:902, app/Models/BudgetModel.php:1103, app/Models/BudgetModel.php:1273, app/Models/BudgetModel.php:1316, app/Models/WalletModel.php:147, app/Models/WalletModel.php:306, app/Models/WalletModel.php:312, app/Models/WalletModel.php:331, app/Models/WalletModel.php:529, app/Models/WalletModel.php:971, app/Models/WalletModel.php:1169, app/Models/WalletModel.php:1372, app/Models/WalletModel.php:1688, app/Models/WalletModel.php:1734, app/Models/WalletModel.php:1764, app/Models/WalletModel.php:1842, app/Models/WalletModel.php:1958, app/Models/WalletModel.php:2107, app/Models/WalletModel.php:2128, app/Models/UserModel.php:466, app/Modules/Management/Controllers/WalletsController.php:353, app/Modules/User/Controllers/OnboardingWalkthroughController.php:215, app/Modules/User/Controllers/OnboardingWalkthroughController.php:216, app/Modules/User/Controllers/OnboardingWalkthroughController.php:230, app/Modules/User/Controllers/DashboardController.php:1401, app/Modules/User/Views/Budget/Account_Manager-12152023.php:132, app/Modules/User/Views/Budget/Account_Manager-12152023.php:149, app/Modules/User/Views/Budget/Account_Manager-12152023.php:150, app/Modules/User/Views/Budget/Account_Manager-12152023.php:189, app/Modules/User/Views/Budget/Account_Manager-12232023.php:133, app/Modules/User/Views/Budget/Account_Manager-12232023.php:146, app/Modules/User/Views/Budget/Account_Manager-12232023.php:147, app/Modules/User/Views/Budget/Account_Manager-12232023.php:148, app/Modules/User/Views/Budget/Account_Manager-12232023.php:203, app/Modules/User/Views/Budget/Account_Manager-12232023.php:204, app/Modules/User/Views/Budget/Account_Manager-12232023.php:205, app/Modules/User/Views/Budget/Account_Manager-12232023.php:257, app/Modules/User/Views/Budget/Account_Manager.php:139, app/Modules/User/Views/Budget/index/Account_Manager-new.php:102, app/Modules/User/Views/Budget/index/Account_Manager-new.php:103, app/Modules/User/Views/Wallets/Wallet_Manager.php:273, app/Services/BudgetService.php:2611, app/Services/OnboardingProgressService.php:293, app/Services/OnboardingProgressService.php:294, app/Services/OnboardingProgressService.php:295, app/Services/OnboardingProgressService.php:298, docs/wallets/wallets_workflow.md:15, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/chatgpt/codex_executive_director/summary.md:16, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:228, docs/_aiops/doc-change-log.md:1925, docs/onboarding/budget_investments_quick_setup.md:11, docs/onboarding/budget_investments_quick_setup.md:27, docs/testing/auth_onboarding_test_plan.md:30

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_debt_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `beta` varchar(45) NULL DEFAULT 0,
  `status` varchar(45) NULL DEFAULT 0,
  `active` int NULL DEFAULT 0,
  `deleted` varchar(45) NULL DEFAULT 0,
  `current_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `date` varchar(32) NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `user_id` varchar(32) NULL DEFAULT NULL,
  `user_email` varchar(32) NULL DEFAULT NULL,
  `username` varchar(512) NULL DEFAULT NULL,
  `wallet_id` varchar(128) NULL DEFAULT NULL,
  `fl_loginId` varchar(128) NULL DEFAULT NULL,
  `fl_institution_id` varchar(64) NULL DEFAULT NULL,
  `account_type` varchar(32) NULL DEFAULT NULL,
  `debtor` varchar(512) NULL DEFAULT NULL,
  `nickname` varchar(32) NULL DEFAULT NULL,
  `account_status` varchar(45) NULL DEFAULT NULL,
  `account_number` varchar(512) NULL DEFAULT NULL,
  `due_date` varchar(45) NULL DEFAULT NULL,
  `credit_limit` varchar(32) NULL DEFAULT NULL,
  `credit_status` varchar(45) NULL DEFAULT NULL,
  `current_balance` varchar(32) NULL DEFAULT NULL,
  `available_balance` varchar(32) NULL DEFAULT NULL,
  `monthly_payment` varchar(32) NULL DEFAULT NULL,
  `interest_rate` varchar(45) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- beta varchar(45) NULL
- status varchar(45) NULL
- active int NULL
- deleted varchar(45) NULL
- current_timestamp datetime NOT NULL
- date varchar(32) NULL
- time varchar(32) NULL
- user_id varchar(32) NULL
- user_email varchar(32) NULL
- username varchar(512) NULL
- wallet_id varchar(128) NULL
- fl_loginId varchar(128) NULL
- fl_institution_id varchar(64) NULL
- account_type varchar(32) NULL
- debtor varchar(512) NULL
- nickname varchar(32) NULL
- account_status varchar(45) NULL
- account_number varchar(512) NULL
- due_date varchar(45) NULL
- credit_limit varchar(32) NULL
- credit_status varchar(45) NULL
- current_balance varchar(32) NULL
- available_balance varchar(32) NULL
- monthly_payment varchar(32) NULL
- interest_rate varchar(45) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_debt_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_debt_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_debt_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

