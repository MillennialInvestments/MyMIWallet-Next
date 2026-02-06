# bf_exchanges_orders

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:276, app/Models/AnalyticalModel.php:412, app/Models/AnalyticalModel.php:434, app/Models/AnalyticalModel.php:443, app/Models/AnalyticalModel.php:455, app/Models/APIModel.php:48, app/Models/APIModel.php:61, app/Models/APIModel.php:71, app/Models/APIModel.php:80, app/Models/APIModel.php:90, app/Models/AssetsModel.php:154, app/Models/ExchangeModel.php:162, app/Models/ExchangeModel.php:173, app/Models/ExchangeModel.php:184, app/Models/ExchangeModel.php:195, app/Models/ExchangeModel.php:206, app/Models/ExchangeModel.php:212, app/Models/ExchangeModel.php:218, app/Models/ExchangeModel.php:288, app/Models/MyMICoinModel.php:58, app/Models/MyMICoinModel.php:82, app/Models/MyMIGoldModel.php:64, app/Models/SolanaModel.php:345, app/Models/WalletModel.php:426, app/Models/InvestmentModel.php:59, app/Models/InvestmentModel.php:822, app/Modules/Exchange/Views/Order_Buy_Manager.php:22, app/Modules/Exchange/Views/Order_Buy_Manager.php:128, app/Modules/Exchange/Views/Order_Buy_Manager.php:156, app/Modules/Exchange/Views/Order_Buy_Manager.php:204, app/Modules/Exchange/Views/Order_Event_Manager.php:22, app/Modules/Exchange/Views/Order_Sell_Manager.php:22, app/Modules/Exchange/Views/Order_Sell_Manager.php:128, app/Modules/Exchange/Views/Order_Sell_Manager.php:156, app/Modules/Exchange/Views/Order_Sell_Manager.php:204, app/Modules/Management/Views/Assets/Distribute/By_User.php:200, app/Modules/Management/Views/Users/Assets.php:189, app/Modules/Management/Views/Web_Design/includes/Test_Content.php:45, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:74, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:74, docs/_aiops/doc-change-log.md:1376

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges_orders` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `auction_id` int unsigned NULL DEFAULT NULL,
  `project_id` int unsigned NULL DEFAULT NULL,
  `token_id` int unsigned NULL DEFAULT NULL,
  `active` int NOT NULL DEFAULT 0,
  `status` varchar(32) NOT NULL DEFAULT 'Open',
  `unix_timestamp` varchar(32) NULL DEFAULT NULL,
  `current_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `created_at` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `month` varchar(32) NULL DEFAULT NULL,
  `day` varchar(32) NULL DEFAULT NULL,
  `year` varchar(32) NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `trade_type` varchar(32) NULL DEFAULT NULL,
  `beta` varchar(32) NULL DEFAULT NULL,
  `user_id` varchar(32) NULL DEFAULT NULL,
  `user_email` varchar(512) NULL DEFAULT NULL,
  `trading_account` varchar(32) NULL DEFAULT NULL,
  `wallet_id` varchar(128) NULL DEFAULT NULL,
  `market_pair` varchar(32) NULL DEFAULT NULL,
  `market` varchar(32) NULL DEFAULT NULL,
  `initial_value` varchar(32) NULL DEFAULT NULL,
  `available_coins` varchar(32) NULL DEFAULT NULL,
  `amount` varchar(32) NULL DEFAULT NULL,
  `remaining_amount` varchar(32) NULL DEFAULT NULL,
  `minimum_purchase` varchar(32) NULL DEFAULT NULL,
  `total` varchar(32) NULL DEFAULT NULL,
  `remaining_coins` varchar(32) NULL DEFAULT NULL,
  `gas_fee` varchar(32) NULL DEFAULT NULL,
  `user_gas_fee` varchar(32) NULL DEFAULT NULL,
  `trans_percent` varchar(32) NULL DEFAULT NULL,
  `user_trans_percent` varchar(32) NULL DEFAULT NULL,
  `trans_fee` varchar(32) NULL DEFAULT NULL,
  `user_trans_fees` varchar(32) NULL DEFAULT NULL,
  `fees` varchar(32) NULL DEFAULT NULL,
  `total_cost` varchar(32) NULL DEFAULT NULL,
  `current_value` varchar(32) NULL DEFAULT NULL,
  `new_availability` varchar(32) NULL DEFAULT NULL,
  `initial_coin_value` varchar(32) NULL DEFAULT NULL,
  `new_coin_value` varchar(32) NULL DEFAULT NULL,
  `quoted_price` decimal(12,4) NULL DEFAULT NULL,
  `requested_units` int unsigned NULL DEFAULT NULL,
  `filled_units` int unsigned NULL DEFAULT 0,
  `amount_usd` decimal(14,2) NULL DEFAULT NULL,
  `bid_status` enum('pending','accepted','partial','rejected','expired','paid','failed') NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- auction_id int unsigned NULL
- project_id int unsigned NULL
- token_id int unsigned NULL
- active int NOT NULL
- status varchar(32) NOT NULL
- unix_timestamp varchar(32) NULL
- current_date datetime NOT NULL
- created_at datetime NULL
- month varchar(32) NULL
- day varchar(32) NULL
- year varchar(32) NULL
- time varchar(32) NULL
- trade_type varchar(32) NULL
- beta varchar(32) NULL
- user_id varchar(32) NULL
- user_email varchar(512) NULL
- trading_account varchar(32) NULL
- wallet_id varchar(128) NULL
- market_pair varchar(32) NULL
- market varchar(32) NULL
- initial_value varchar(32) NULL
- available_coins varchar(32) NULL
- amount varchar(32) NULL
- remaining_amount varchar(32) NULL
- minimum_purchase varchar(32) NULL
- total varchar(32) NULL
- remaining_coins varchar(32) NULL
- gas_fee varchar(32) NULL
- user_gas_fee varchar(32) NULL
- trans_percent varchar(32) NULL
- user_trans_percent varchar(32) NULL
- trans_fee varchar(32) NULL
- user_trans_fees varchar(32) NULL
- fees varchar(32) NULL
- total_cost varchar(32) NULL
- current_value varchar(32) NULL
- new_availability varchar(32) NULL
- initial_coin_value varchar(32) NULL
- new_coin_value varchar(32) NULL
- quoted_price decimal(12,4) NULL
- requested_units int unsigned NULL
- filled_units int unsigned NULL
- amount_usd decimal(14,2) NULL
- bid_status enum('pending','accepted','partial','rejected','expired','paid','failed') NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges_orders`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_orders'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges_orders'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

