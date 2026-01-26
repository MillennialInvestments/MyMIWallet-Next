# bf_users_wallet_transactions

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:163, app/Models/AccountsModel.php:206, app/Models/AccountsModel.php:221, app/Models/AccountsModel.php:235, app/Models/AccountsModel.php:243, app/Models/AccountsModel.php:251, app/Models/AccountsModel.php:260, app/Models/AccountsModel.php:269, app/Models/AccountsModel.php:321, app/Models/AccountsModel.php:326, app/Models/AnalyticalModel.php:419, app/Models/MyMICoinModel.php:126, app/Models/MyMICoinModel.php:184, app/Models/MyMICoinModel.php:196, app/Models/MyMICoinModel.php:208, app/Models/MyMICoinModel.php:215, app/Models/MyMICoinModel.php:222, app/Models/MyMICoinModel.php:229, app/Models/PlaidModel.php:125, app/Models/ReferralModel.php:199, app/Models/ReferralModel.php:228, app/Models/TransactionModel.php:10, app/Models/WalletModel.php:67, app/Models/WalletModel.php:72, app/Models/WalletModel.php:89, app/Models/WalletModel.php:176, app/Models/WalletModel.php:206, app/Models/WalletModel.php:356, app/Models/WalletModel.php:369, app/Models/WalletModel.php:382, app/Models/WalletModel.php:391, app/Models/WalletModel.php:400, app/Models/WalletModel.php:409, app/Models/WalletModel.php:418, app/Modules/User/Controllers/WalletsController.php:2050, app/Services/BlockchainService.php:118

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_wallet_transactions` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `transaction_id` varchar(128) NULL DEFAULT NULL,
  `status` varchar(45) NULL DEFAULT NULL,
  `active` varchar(5) NULL DEFAULT 'Yes',
  `unix_timestamp` varchar(32) NULL DEFAULT NULL,
  `submitted_date` varchar(128) NULL DEFAULT NULL,
  `month` varchar(32) NULL DEFAULT NULL,
  `day` varchar(32) NULL DEFAULT NULL,
  `year` varchar(32) NULL DEFAULT NULL,
  `time` varchar(128) NULL DEFAULT NULL,
  `trans_type` varchar(128) NULL DEFAULT NULL,
  `currency` varchar(32) NULL DEFAULT NULL,
  `wallet_id` varchar(128) NULL DEFAULT NULL,
  `bank_account` varchar(32) NULL DEFAULT NULL,
  `broker` varchar(512) NULL DEFAULT NULL,
  `nickname` varchar(512) NULL DEFAULT NULL,
  `user_id` varchar(32) NULL DEFAULT NULL,
  `user_email` varchar(512) NULL DEFAULT NULL,
  `type` varchar(512) NULL DEFAULT NULL,
  `deposit_date` varchar(128) NULL DEFAULT NULL,
  `withdraw_date` varchar(128) NULL DEFAULT NULL,
  `amount` varchar(32) NULL DEFAULT NULL,
  `initial_amount` varchar(32) NULL DEFAULT NULL,
  `current_amount` varchar(32) NULL DEFAULT NULL,
  `fees` varchar(32) NULL DEFAULT NULL,
  `total_cost` varchar(32) NULL DEFAULT NULL,
  `large_transaction_flag` tinyint(1) NULL DEFAULT 0,
  `reviewed` tinyint(1) NULL DEFAULT 0,
  `reviewed_by` int NULL DEFAULT NULL,
  `reviewed_at` timestamp NULL DEFAULT NULL,
  `review_notes` text NULL DEFAULT NULL,
  `suspicious_pattern` tinyint(1) NULL DEFAULT 0,
  `pattern_details` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- transaction_id varchar(128) NULL
- status varchar(45) NULL
- active varchar(5) NULL
- unix_timestamp varchar(32) NULL
- submitted_date varchar(128) NULL
- month varchar(32) NULL
- day varchar(32) NULL
- year varchar(32) NULL
- time varchar(128) NULL
- trans_type varchar(128) NULL
- currency varchar(32) NULL
- wallet_id varchar(128) NULL
- bank_account varchar(32) NULL
- broker varchar(512) NULL
- nickname varchar(512) NULL
- user_id varchar(32) NULL
- user_email varchar(512) NULL
- type varchar(512) NULL
- deposit_date varchar(128) NULL
- withdraw_date varchar(128) NULL
- amount varchar(32) NULL
- initial_amount varchar(32) NULL
- current_amount varchar(32) NULL
- fees varchar(32) NULL
- total_cost varchar(32) NULL
- large_transaction_flag tinyint(1) NULL
- reviewed tinyint(1) NULL
- reviewed_by int NULL
- reviewed_at timestamp NULL
- review_notes text NULL
- suspicious_pattern tinyint(1) NULL
- pattern_details text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_wallet_transactions`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet_transactions'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_wallet_transactions'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

