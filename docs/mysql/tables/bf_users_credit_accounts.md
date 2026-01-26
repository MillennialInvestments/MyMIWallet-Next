# bf_users_credit_accounts

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIWallets.php:265, app/Models/AccountsModel.php:49, app/Models/AccountsModel.php:83, app/Models/AccountsModel.php:89, app/Models/AccountsModel.php:336, app/Models/AccountsModel.php:365, app/Models/AccountsModel.php:374, app/Models/AccountsModel.php:466, app/Models/AccountsModel.php:557, app/Models/BudgetModel.php:382, app/Models/BudgetModel.php:477, app/Models/BudgetModel.php:489, app/Models/BudgetModel.php:500, app/Models/BudgetModel.php:514, app/Models/BudgetModel.php:570, app/Models/BudgetModel.php:1096, app/Models/AlertsModel.php:1622, app/Models/WalletModel.php:108, app/Models/WalletModel.php:138, app/Models/WalletModel.php:269, app/Models/WalletModel.php:274, app/Models/WalletModel.php:282, app/Models/WalletModel.php:287, app/Models/WalletModel.php:300, app/Models/WalletModel.php:970, app/Models/WalletModel.php:1168, app/Models/WalletModel.php:1365, app/Models/WalletModel.php:1685, app/Models/WalletModel.php:1731, app/Models/WalletModel.php:1761, app/Models/WalletModel.php:1841, app/Models/WalletModel.php:1957, app/Models/WalletModel.php:2106, app/Models/WalletModel.php:2127, app/Models/UserModel.php:460, app/Modules/Management/Controllers/WalletsController.php:352, app/Modules/User/Controllers/OnboardingWalkthroughController.php:195, app/Modules/User/Controllers/OnboardingWalkthroughController.php:196, app/Modules/User/Controllers/OnboardingWalkthroughController.php:210, app/Modules/User/Controllers/DashboardController.php:1393, app/Modules/User/Views/Investments/index/active_table.php:83, app/Modules/User/Views/Investments/index/historical_table.php:82, app/Modules/User/Views/Wallets/Wallet_Manager.php:136, app/Modules/User/Views/Wallets/Wallet_Manager.php:254, app/Services/BudgetService.php:2611, app/Services/OnboardingProgressService.php:282, app/Services/OnboardingProgressService.php:283, app/Services/OnboardingProgressService.php:284, app/Services/OnboardingProgressService.php:287, docs/wallets/wallets_workflow.md:13, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/chatgpt/codex_executive_director/summary.md:15, docs/onboarding/budget_investments_quick_setup.md:11, docs/onboarding/budget_investments_quick_setup.md:27, docs/testing/auth_onboarding_test_plan.md:30

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_credit_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `beta` varchar(45) NULL DEFAULT 0,
  `status` varchar(45) NULL DEFAULT 0,
  `active` varchar(45) NULL DEFAULT 1,
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
  `bank_name` varchar(512) NULL DEFAULT NULL,
  `nickname` varchar(32) NULL DEFAULT NULL,
  `account_number` varchar(512) NULL DEFAULT NULL,
  `credit_limit` varchar(32) NULL DEFAULT NULL,
  `current_balance` varchar(32) NULL DEFAULT NULL,
  `available_balance` varchar(32) NULL DEFAULT NULL,
  `credit_status` varchar(256) NULL DEFAULT NULL,
  `due_date` varchar(255) NULL DEFAULT NULL,
  `payment_due` varchar(45) NULL DEFAULT NULL,
  `interest_rate` varchar(45) NULL DEFAULT 0.18,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- beta varchar(45) NULL
- status varchar(45) NULL
- active varchar(45) NULL
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
- bank_name varchar(512) NULL
- nickname varchar(32) NULL
- account_number varchar(512) NULL
- credit_limit varchar(32) NULL
- current_balance varchar(32) NULL
- available_balance varchar(32) NULL
- credit_status varchar(256) NULL
- due_date varchar(255) NULL
- payment_due varchar(45) NULL
- interest_rate varchar(45) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_credit_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_credit_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

