# bf_users_coin_purchases

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:284, app/Models/ExchangeModel.php:282, app/Models/MyMICoinModel.php:68, app/Models/MyMICoinModel.php:96, app/Models/MyMIGoldModel.php:36, app/Models/MyMIGoldModel.php:74, app/Models/MyMIGoldModel.php:101, app/Models/MyMIGoldModel.php:107, app/Models/MyMIGoldModel.php:114, app/Models/MyMIGoldModel.php:124, app/Models/MyMIGoldModel.php:147, app/Models/MyMIGoldModel.php:162, app/Models/MyMIGoldModel.php:173, app/Models/PublicModel.php:80, app/Models/WalletModel.php:434, app/Models/InvestmentModel.php:79, app/Models/InvestmentModel.php:479, app/Models/InvestmentModel.php:512, app/Models/InvestmentModel.php:519, app/Models/InvestmentModel.php:828, app/Modules/Management/Views/Web_Design/Test_Page/data-distribution.php:64, app/Modules/User/Views/Wallets/Feature_Manager.php:83, app/Modules/User/Views/Wallets/Purchase_Coins_Transaction.php:69, app/Modules/User/Views/Wallets/Purchase_Manager.php:69, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:224, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:224, docs/_aiops/doc-change-log.md:2147

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_coin_purchases` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `unix_timestamp` varchar(32) NULL DEFAULT NULL,
  `current_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `month` varchar(32) NULL DEFAULT NULL,
  `day` varchar(32) NULL DEFAULT NULL,
  `year` varchar(32) NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'Incomplete',
  `beta` varchar(32) NULL DEFAULT NULL,
  `wallet_id` varchar(64) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `user_email` varchar(512) NULL DEFAULT NULL,
  `reward` varchar(32) NOT NULL DEFAULT 'No',
  `reward_type` varchar(128) NULL DEFAULT NULL,
  `feature` varchar(128) NULL DEFAULT NULL,
  `coin` varchar(32) NULL DEFAULT NULL,
  `initial_value` varchar(64) NULL DEFAULT NULL,
  `current_value` varchar(32) NULL DEFAULT NULL,
  `available_coins` varchar(64) NULL DEFAULT NULL,
  `new_availability` varchar(32) NULL DEFAULT NULL,
  `minimum_coin_amount` varchar(32) NULL DEFAULT NULL,
  `initial_coin_value` varchar(64) NULL DEFAULT NULL,
  `new_coin_value` varchar(64) NULL DEFAULT NULL,
  `amount` varchar(32) NULL DEFAULT NULL,
  `total` varchar(32) NULL DEFAULT NULL,
  `total_cost` varchar(32) NULL DEFAULT NULL,
  `total_fees` varchar(32) NULL DEFAULT NULL,
  `gas_fee` varchar(32) NULL DEFAULT 0.007457,
  `trans_fee` varchar(32) NULL DEFAULT 0.60,
  `trans_percent` varchar(32) NULL DEFAULT 0.058,
  `user_gas_fee` varchar(32) NULL DEFAULT NULL,
  `user_trans_fee` varchar(32) NULL DEFAULT NULL,
  `user_trans_percent` varchar(32) NULL DEFAULT NULL,
  `referral_id` varchar(32) NULL DEFAULT NULL,
  `redirect_url` text NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- unix_timestamp varchar(32) NULL
- current_date datetime NOT NULL
- month varchar(32) NULL
- day varchar(32) NULL
- year varchar(32) NULL
- time varchar(32) NULL
- status varchar(32) NOT NULL
- beta varchar(32) NULL
- wallet_id varchar(64) NULL
- user_id int NULL
- user_email varchar(512) NULL
- reward varchar(32) NOT NULL
- reward_type varchar(128) NULL
- feature varchar(128) NULL
- coin varchar(32) NULL
- initial_value varchar(64) NULL
- current_value varchar(32) NULL
- available_coins varchar(64) NULL
- new_availability varchar(32) NULL
- minimum_coin_amount varchar(32) NULL
- initial_coin_value varchar(64) NULL
- new_coin_value varchar(64) NULL
- amount varchar(32) NULL
- total varchar(32) NULL
- total_cost varchar(32) NULL
- total_fees varchar(32) NULL
- gas_fee varchar(32) NULL
- trans_fee varchar(32) NULL
- trans_percent varchar(32) NULL
- user_gas_fee varchar(32) NULL
- user_trans_fee varchar(32) NULL
- user_trans_percent varchar(32) NULL
- referral_id varchar(32) NULL
- redirect_url text NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_coin_purchases`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_coin_purchases'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_coin_purchases'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

