# bf_users_wallet

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIUsers.php:390, app/Libraries/MyMIUser.php:356, app/Models/AccountsModel.php:297, app/Models/AccountsModel.php:302, app/Models/AccountsModel.php:309, app/Models/AccountsModel.php:315, app/Models/AccountsModel.php:448, app/Models/AccountsModel.php:509, app/Models/AccountsModel.php:528, app/Models/AccountsModel.php:567, app/Models/AccountsModel.php:574, app/Models/AccountsModel.php:580, app/Models/AnalyticalModel.php:520, app/Models/AnalyticalModel.php:536, app/Models/AnalyticalModel.php:552, app/Models/BudgetModel.php:458, app/Models/DashboardModel.php:71, app/Models/ExchangeModel.php:252, app/Models/ExchangeModel.php:260, app/Models/ExchangeModel.php:268, app/Models/MyMICoinModel.php:114, app/Models/MyMICoinModel.php:119, app/Models/MyMICoinModel.php:131, app/Models/MyMICoinModel.php:137, app/Models/MyMICoinModel.php:143, app/Models/MyMICoinModel.php:150, app/Models/MyMICoinModel.php:156, app/Models/MyMICoinModel.php:166, app/Models/MyMICoinModel.php:176, app/Models/PlaidModel.php:49, app/Models/PlaidModel.php:93, app/Models/PublicModel.php:68, app/Models/SolanaModel.php:163, app/Models/SolanaModel.php:233, app/Models/SolanaModel.php:440, app/Models/SolanaModel.php:453, app/Models/SolanaModel.php:460, app/Models/SolanaModel.php:492, app/Models/SolanaModel.php:499, app/Models/SolanaModel.php:506, app/Models/SolanaModel.php:578, app/Models/TrackerModel.php:58, app/Models/WalletModel.php:9, app/Models/WalletModel.php:62, app/Models/WalletModel.php:165, app/Models/WalletModel.php:187, app/Models/WalletModel.php:212, app/Models/WalletModel.php:243, app/Models/WalletModel.php:448, app/Models/WalletModel.php:488, app/Models/WalletModel.php:521, app/Models/WalletModel.php:539, app/Models/WalletModel.php:550, app/Models/WalletModel.php:559, app/Models/WalletModel.php:570, app/Models/WalletModel.php:579, app/Models/WalletModel.php:597, app/Models/WalletModel.php:605, app/Models/WalletModel.php:669, app/Models/WalletModel.php:674, app/Models/WalletModel.php:679, app/Models/WalletModel.php:683, app/Models/WalletModel.php:691, app/Models/WalletModel.php:939, app/Models/WalletModel.php:1269, app/Models/WalletModel.php:1273, app/Models/WalletModel.php:1282, app/Models/WalletModel.php:1405, app/Models/WalletModel.php:1444, app/Models/WalletModel.php:1446, app/Models/WalletModel.php:1488, app/Models/WalletModel.php:1672, app/Models/WalletModel.php:1777, app/Models/WalletModel.php:1789, app/Models/WalletModel.php:1893, app/Models/WalletModel.php:1947, app/Models/WalletModel.php:1985, app/Models/WalletModel.php:2022, app/Models/WalletModel.php:2027, app/Models/WalletModel.php:2041, app/Models/InvestmentModel.php:486, app/Models/UserModel.php:423, app/Models/UserModel.php:433, app/Modules/APIs/Controllers/SolanaController.php:169, app/Modules/APIs/Controllers/WalletsController.php:369, app/Modules/Exchange/Controllers/SolanaController.php:320, app/Modules/Management/Controllers/WalletsController.php:275, app/Modules/Management/Controllers/WalletsController.php:396, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:105, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:133, app/Modules/Management/Views/Web_Design/Content_Creator/Management/Wallets/Generate_Wallet.php:71, app/Modules/Management/Views/Web_Design/Content_Creator/Management/Wallets/Generate_Wallet.php:81, app/Modules/User/Controllers/WalletsController.php:1055, app/Modules/User/Views/Investments/Account_Manager.php:85, app/Modules/User/Views/Investments/index/active_table.php:189, app/Modules/User/Views/Investments/index/active_table.php:193, app/Modules/User/Views/Investments/index/historical_table.php:144, app/Modules/User/Views/Investments/index/historical_table.php:148, app/Modules/User/Views/Wallets/Details.php:64, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:71, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:97, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:71, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:97, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:73, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:99, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:46, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:60, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:121, app/Modules/User/Views/Wallets/Link_Account/Confirm.php:212, app/Modules/User/Views/Wallets/Link_Account/Details.php:66, app/Modules/User/Views/Wallets/Link_Account/Details.php:157, app/Modules/User/Views/Wallets/Link_Account (Original)/Success.php:35, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:71, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:97, app/Modules/User/Views/Wallets/Wallet_Manager.php:94, app/Modules/User/Views/Wallets/Wallet_Manager.php:154, app/Modules/User/Views/Wallets/Wallet_Manager.php:212, app/Modules/User/Views/Wallets/Wallet_Manager.php:293, app/Modules/User/Views/Wallets/Wallet_Manager.php:305, app/Services/SetupStatusService.php:170, app/Services/SetupStatusService.php:174, app/Services/SetupStatusService.php:175, app/Services/SetupStatusService.php:178, docs/wallets/wallets_workflow.md:8, docs/wallets/wallets_workflow.md:11, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:256, docs/aiops/migration_model_audit.md:195, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:2024

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_wallet` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(45) NULL DEFAULT 0,
  `active` varchar(5) NULL DEFAULT 1,
  `deleted` varchar(45) NULL DEFAULT 0,
  `beta` varchar(32) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT NULL,
  `default_wallet` varchar(32) NULL DEFAULT 'No',
  `exchange_wallet` varchar(32) NULL DEFAULT 'No',
  `premium_wallet` varchar(45) NULL DEFAULT 'No',
  `ach_enabled` varchar(45) NULL DEFAULT 0,
  `market_pair` varchar(32) NULL DEFAULT 'USD',
  `market` varchar(32) NULL DEFAULT 'MYMI',
  `user_id` varchar(32) NULL DEFAULT NULL,
  `user_email` varchar(512) NULL DEFAULT NULL,
  `username` varchar(128) NULL DEFAULT NULL,
  `broker_id` varchar(128) NULL DEFAULT NULL,
  `broker` varchar(512) NULL DEFAULT NULL,
  `broker_account_owner` varchar(45) NULL DEFAULT NULL,
  `public_token` varchar(512) NULL DEFAULT NULL,
  `request_id` varchar(512) NULL DEFAULT NULL,
  `account_id` varchar(45) NULL DEFAULT NULL,
  `item_id` varchar(512) NULL DEFAULT NULL,
  `access_token` text NULL DEFAULT NULL,
  `refresh_token` text NULL DEFAULT NULL,
  `purchase_type` varchar(45) NULL DEFAULT NULL,
  `wallet_type` varchar(512) NULL DEFAULT NULL,
  `amount` varchar(32) NULL DEFAULT 0,
  `initial_value` varchar(32) NULL DEFAULT 0,
  `nickname` varchar(512) NULL DEFAULT NULL,
  `broker_products` text NULL DEFAULT NULL,
  `routing_numbers` text NULL DEFAULT NULL,
  `broker_logo` text NULL DEFAULT NULL,
  `broker_primary_color` varchar(7) NULL DEFAULT NULL,
  `available_products` text NULL DEFAULT NULL,
  `billed_products` text NULL DEFAULT NULL,
  `consent_expiration_time` datetime NULL DEFAULT NULL,
  `error` text NULL DEFAULT NULL,
  `products` text NULL DEFAULT NULL,
  `update_type` varchar(255) NULL DEFAULT NULL,
  `webhook` text NULL DEFAULT NULL,
  `notifications` int NULL DEFAULT 0,
  `auto_staking` int NULL DEFAULT 0,
  `withdrawal_limit` varchar(32) NULL DEFAULT NULL,
  `transaction_fees` varchar(32) NULL DEFAULT NULL,
  `linked_account_id` int NULL DEFAULT NULL,
  `account_number` varchar(128) NULL DEFAULT NULL,
  `credit_limit` decimal(10,2) NULL DEFAULT NULL,
  `investment_type` varchar(128) NULL DEFAULT NULL,
  `crypto_type` varchar(128) NULL DEFAULT NULL,
  `provider` enum('plaid','metamask','phantom','robinhood','snaptrade') NOT NULL DEFAULT NULL,
  `credentials` json NULL DEFAULT NULL,
  `category` varchar(32) NOT NULL DEFAULT 'financial',
  `label` varchar(191) NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(45) NULL
- active varchar(5) NULL
- deleted varchar(45) NULL
- beta varchar(32) NULL
- created_on datetime NULL
- default_wallet varchar(32) NULL
- exchange_wallet varchar(32) NULL
- premium_wallet varchar(45) NULL
- ach_enabled varchar(45) NULL
- market_pair varchar(32) NULL
- market varchar(32) NULL
- user_id varchar(32) NULL
- user_email varchar(512) NULL
- username varchar(128) NULL
- broker_id varchar(128) NULL
- broker varchar(512) NULL
- broker_account_owner varchar(45) NULL
- public_token varchar(512) NULL
- request_id varchar(512) NULL
- account_id varchar(45) NULL
- item_id varchar(512) NULL
- access_token text NULL
- refresh_token text NULL
- purchase_type varchar(45) NULL
- wallet_type varchar(512) NULL
- amount varchar(32) NULL
- initial_value varchar(32) NULL
- nickname varchar(512) NULL
- broker_products text NULL
- routing_numbers text NULL
- broker_logo text NULL
- broker_primary_color varchar(7) NULL
- available_products text NULL
- billed_products text NULL
- consent_expiration_time datetime NULL
- error text NULL
- products text NULL
- update_type varchar(255) NULL
- webhook text NULL
- notifications int NULL
- auto_staking int NULL
- withdrawal_limit varchar(32) NULL
- transaction_fees varchar(32) NULL
- linked_account_id int NULL
- account_number varchar(128) NULL
- credit_limit decimal(10,2) NULL
- investment_type varchar(128) NULL
- crypto_type varchar(128) NULL
- provider enum('plaid','metamask','phantom','robinhood','snaptrade') NOT NULL
- credentials json NULL
- category varchar(32) NOT NULL
- label varchar(191) NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_wallet`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

