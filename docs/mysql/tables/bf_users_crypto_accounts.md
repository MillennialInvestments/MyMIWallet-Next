# bf_users_crypto_accounts

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIWallets.php:266, app/Models/AccountsModel.php:391, app/Models/BudgetModel.php:532, app/Models/BudgetModel.php:545, app/Models/BudgetModel.php:549, app/Models/SolanaModel.php:555, app/Models/WalletModel.php:292, app/Models/WalletModel.php:642, app/Models/WalletModel.php:973, app/Models/WalletModel.php:1171, app/Models/WalletModel.php:1386, app/Models/WalletModel.php:1694, app/Models/WalletModel.php:1740, app/Models/WalletModel.php:1770, app/Models/WalletModel.php:1961, app/Models/WalletModel.php:1978, app/Models/WalletModel.php:2109, app/Models/WalletModel.php:2130, app/Models/UserModel.php:444, app/Modules/Management/Controllers/WalletsController.php:355, app/Services/WalletService.php:379, app/Services/WalletService.php:480, app/Services/WalletService.php:1085, docs/wallets/wallets_workflow.md:14, docs/functional_inventory/docs_to_code_map.md:51, docs/functional_inventory/docs_to_code_map.md:165, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:227, docs/_aiops/doc-change-log.md:1922

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_crypto_accounts` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(50) NULL DEFAULT NULL,
  `deleted` tinyint(1) NULL DEFAULT 0,
  `current_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `beta` tinyint(1) NULL DEFAULT 0,
  `date` date NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `user_email` varchar(255) NULL DEFAULT NULL,
  `username` varchar(255) NULL DEFAULT NULL,
  `account_id` varchar(255) NULL DEFAULT NULL,
  `purchase_type` varchar(50) NULL DEFAULT NULL,
  `wallet_id` varchar(255) NULL DEFAULT NULL,
  `nickname` varchar(255) NULL DEFAULT NULL,
  `account_type` varchar(50) NULL DEFAULT NULL,
  `access_code` varchar(255) NULL DEFAULT NULL,
  `refresh_token` varchar(255) NULL DEFAULT NULL,
  `broker_id` varchar(255) NULL DEFAULT NULL,
  `broker` varchar(255) NULL DEFAULT NULL,
  `account_number` varchar(255) NULL DEFAULT NULL,
  `amount` decimal(15,2) NULL DEFAULT NULL,
  `initial_value` decimal(15,2) NULL DEFAULT NULL,
  `available_funds` decimal(15,2) NULL DEFAULT NULL,
  `net_worth` decimal(15,2) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(50) NULL
- deleted tinyint(1) NULL
- current_timestamp datetime NOT NULL
- beta tinyint(1) NULL
- date date NULL
- time time NULL
- user_id int NULL
- user_email varchar(255) NULL
- username varchar(255) NULL
- account_id varchar(255) NULL
- purchase_type varchar(50) NULL
- wallet_id varchar(255) NULL
- nickname varchar(255) NULL
- account_type varchar(50) NULL
- access_code varchar(255) NULL
- refresh_token varchar(255) NULL
- broker_id varchar(255) NULL
- broker varchar(255) NULL
- account_number varchar(255) NULL
- amount decimal(15,2) NULL
- initial_value decimal(15,2) NULL
- available_funds decimal(15,2) NULL
- net_worth decimal(15,2) NULL
- created_on datetime NULL
- updated_on datetime NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_crypto_accounts`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_crypto_accounts'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_crypto_accounts'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

