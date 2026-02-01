# bf_users_bank_accounts

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIWallets.php:264, app/Models/AccountsModel.php:48, app/Models/AccountsModel.php:71, app/Models/AccountsModel.php:77, app/Models/AccountsModel.php:125, app/Models/AccountsModel.php:331, app/Models/AccountsModel.php:355, app/Models/AccountsModel.php:455, app/Models/AccountsModel.php:461, app/Models/BudgetModel.php:405, app/Models/BudgetModel.php:423, app/Models/PlaidModel.php:141, app/Models/PlaidModel.php:155, app/Models/WalletModel.php:99, app/Models/WalletModel.php:118, app/Models/WalletModel.php:128, app/Models/WalletModel.php:250, app/Models/WalletModel.php:256, app/Models/WalletModel.php:264, app/Models/WalletModel.php:456, app/Models/WalletModel.php:467, app/Models/WalletModel.php:476, app/Models/WalletModel.php:483, app/Models/WalletModel.php:615, app/Models/WalletModel.php:696, app/Models/WalletModel.php:700, app/Models/WalletModel.php:969, app/Models/WalletModel.php:1167, app/Models/WalletModel.php:1358, app/Models/WalletModel.php:1673, app/Models/WalletModel.php:1682, app/Models/WalletModel.php:1728, app/Models/WalletModel.php:1758, app/Models/WalletModel.php:1840, app/Models/WalletModel.php:1956, app/Models/WalletModel.php:2105, app/Models/WalletModel.php:2126, app/Models/UserModel.php:454, app/Modules/Management/Controllers/WalletsController.php:351, app/Modules/User/Controllers/DashboardController.php:1399, app/Modules/User/Views/Budget/Details.php:9, app/Modules/User/Views/Investments/index/active_table.php:39, app/Modules/User/Views/Investments/index/historical_table.php:38, app/Modules/User/Views/Wallets/Wallet_Manager.php:75, app/Modules/User/Views/Wallets/Wallet_Manager.php:195, docs/budgeting/architecture.md:11, docs/wallets/wallets_workflow.md:12, docs/OVERVIEW.md:284, docs/functional_inventory/docs_to_code_map.md:8, docs/functional_inventory/docs_to_code_map.md:20, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:219, docs/_aiops/doc-change-log.md:1895

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_bank_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `beta` varchar(45) NULL DEFAULT 0,
  `active` int NULL DEFAULT 0,
  `status` varchar(45) NULL DEFAULT 0,
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
  `bank_account_owner` varchar(32) NULL DEFAULT NULL,
  `bank_name` varchar(512) NULL DEFAULT NULL,
  `routing_number` varchar(512) NULL DEFAULT NULL,
  `account_number` varchar(512) NULL DEFAULT NULL,
  `verify_account` varchar(32) NULL DEFAULT NULL,
  `ach_enabled` varchar(45) NULL DEFAULT 0,
  `nickname` varchar(32) NULL DEFAULT NULL,
  `balance` varchar(45) NULL DEFAULT 0,
  `current_balance` varchar(32) NULL DEFAULT NULL,
  `available_balance` varchar(32) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- beta varchar(45) NULL
- active int NULL
- status varchar(45) NULL
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
- bank_account_owner varchar(32) NULL
- bank_name varchar(512) NULL
- routing_number varchar(512) NULL
- account_number varchar(512) NULL
- verify_account varchar(32) NULL
- ach_enabled varchar(45) NULL
- nickname varchar(32) NULL
- balance varchar(45) NULL
- current_balance varchar(32) NULL
- available_balance varchar(32) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_bank_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_bank_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

