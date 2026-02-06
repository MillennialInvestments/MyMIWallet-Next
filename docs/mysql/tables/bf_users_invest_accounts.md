# bf_users_invest_accounts

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIWallets.php:268, app/Models/AccountsModel.php:51, app/Models/AccountsModel.php:107, app/Models/AccountsModel.php:113, app/Models/AccountsModel.php:405, app/Models/AccountsModel.php:516, app/Models/AccountsModel.php:522, app/Models/BudgetModel.php:718, app/Models/WalletModel.php:156, app/Models/WalletModel.php:336, app/Models/WalletModel.php:341, app/Models/WalletModel.php:349, app/Models/WalletModel.php:650, app/Models/WalletModel.php:972, app/Models/WalletModel.php:1170, app/Models/WalletModel.php:1379, app/Models/WalletModel.php:1691, app/Models/WalletModel.php:1737, app/Models/WalletModel.php:1767, app/Models/WalletModel.php:1843, app/Models/WalletModel.php:1959, app/Models/WalletModel.php:1960, app/Models/WalletModel.php:2108, app/Models/WalletModel.php:2129, app/Models/UserModel.php:482, app/Modules/Management/Controllers/WalletsController.php:354, app/Modules/User/Controllers/DashboardController.php:1402, app/Modules/User/Views/Investments/index/active_table.php:127, app/Modules/User/Views/Wallets/index/debt_summary/active_table.php:118, docs/wallets/wallets_workflow.md:16, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:232, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:232, docs/_aiops/doc-change-log.md:2180

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_invest_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(5) NULL DEFAULT 'Yes',
  `beta` varchar(32) NULL DEFAULT NULL,
  `deleted` varchar(45) NULL DEFAULT 0,
  `active` int NULL DEFAULT 0,
  `current_timestamp` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `date` varchar(32) NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `user_id` varchar(32) NULL DEFAULT NULL,
  `user_email` varchar(512) NULL DEFAULT NULL,
  `username` varchar(128) NULL DEFAULT NULL,
  `account_id` varchar(45) NULL DEFAULT NULL,
  `purchase_type` varchar(45) NULL DEFAULT NULL,
  `wallet_id` varchar(128) NULL DEFAULT NULL,
  `nickname` varchar(512) NULL DEFAULT NULL,
  `account_type` varchar(512) NULL DEFAULT NULL,
  `investment_type` varchar(128) NULL DEFAULT NULL,
  `investment_date` date NULL DEFAULT NULL,
  `symbol` varchar(32) NULL DEFAULT NULL,
  `investment_amount` decimal(12,2) NULL DEFAULT 0.00,
  `access_code` text NULL DEFAULT NULL,
  `refresh_token` text NULL DEFAULT NULL,
  `broker_id` varchar(128) NULL DEFAULT NULL,
  `broker` varchar(512) NULL DEFAULT NULL,
  `account_number` varchar(45) NULL DEFAULT NULL,
  `amount` varchar(32) NULL DEFAULT 0,
  `initial_value` varchar(32) NULL DEFAULT 0,
  `available_funds` varchar(45) NULL DEFAULT NULL,
  `net_worth` varchar(45) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(5) NULL
- beta varchar(32) NULL
- deleted varchar(45) NULL
- active int NULL
- current_timestamp datetime NULL
- date varchar(32) NULL
- time varchar(32) NULL
- user_id varchar(32) NULL
- user_email varchar(512) NULL
- username varchar(128) NULL
- account_id varchar(45) NULL
- purchase_type varchar(45) NULL
- wallet_id varchar(128) NULL
- nickname varchar(512) NULL
- account_type varchar(512) NULL
- investment_type varchar(128) NULL
- investment_date date NULL
- symbol varchar(32) NULL
- investment_amount decimal(12,2) NULL
- access_code text NULL
- refresh_token text NULL
- broker_id varchar(128) NULL
- broker varchar(512) NULL
- account_number varchar(45) NULL
- amount varchar(32) NULL
- initial_value varchar(32) NULL
- available_funds varchar(45) NULL
- net_worth varchar(45) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_invest_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_invest_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_invest_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

