# bf_users_trades

## Source
- Migration: _None_
- Model:
- Code references: app/Models/AccountsModel.php:135, app/Models/AccountsModel.php:144, app/Models/AccountsModel.php:189, app/Models/AccountsModel.php:197, app/Models/AnalyticalModel.php:498, app/Models/AnalyticalModel.php:513, app/Models/AssetsModel.php:127, app/Models/AssetsModel.php:163, app/Models/PublicModel.php:74, app/Models/TrackerModel.php:75, app/Models/TrackerModel.php:82, app/Models/TrackerModel.php:91, app/Models/TrackerModel.php:101, app/Models/TrackerModel.php:111, app/Models/TrackerModel.php:119, app/Models/TrackerModel.php:128, app/Models/TrackerModel.php:137, app/Models/TrackerModel.php:145, app/Models/TrackerModel.php:154, app/Models/TrackerModel.php:162, app/Models/TrackerModel.php:171, app/Models/TrackerModel.php:180, app/Models/TrackerModel.php:189, app/Models/TrackerModel.php:199, app/Models/InvestmentModel.php:8, app/Models/InvestmentModel.php:178, app/Models/InvestmentModel.php:186, app/Models/InvestmentModel.php:208, app/Models/InvestmentModel.php:216, app/Models/InvestmentModel.php:295, app/Models/InvestmentModel.php:316, app/Models/InvestmentModel.php:401, app/Models/InvestmentModel.php:438, app/Models/InvestmentModel.php:467, app/Models/InvestmentModel.php:684, app/Models/InvestmentModel.php:690, app/Models/InvestmentModel.php:696, app/Models/InvestmentModel.php:704, app/Models/InvestmentModel.php:713, app/Models/InvestmentModel.php:1084, app/Models/InvestmentModel.php:1103, app/Models/InvestmentModel.php:1116, app/Models/InvestmentModel.php:1147, app/Models/InvestmentModel.php:1182, app/Models/InvestmentModel.php:1356, app/Models/InvestmentModel.php:1382, app/Models/InvestmentModel.php:1401, app/Models/InvestmentModel.php:1496, app/Models/InvestmentModel.php:1532, app/Models/InvestmentModel.php:1606, app/Models/InvestmentModel.php:1616, app/Models/InvestmentModel.php:1626, app/Models/InvestmentModel.php:1636, app/Models/InvestmentModel.php:1646, app/Modules/Exchange/Views/Order_Buy_Manager.php:158, app/Modules/Exchange/Views/Order_Buy_Manager.php:159, app/Modules/Exchange/Views/Order_Sell_Manager.php:158, app/Modules/Exchange/Views/Order_Sell_Manager.php:159, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:259, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:297, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:311, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:336, app/Modules/Management/Views/Web_Design/Content_Creator/FLinks/Flinks_API.php:391, app/Modules/Management/Views/Web_Design/Test_Page/trade_tracker.php:3, app/Modules/User/Views/Budget/Details.php:150, app/Modules/User/Views/Investments/Account_Manager.php:117, app/Modules/User/Views/Investments/index/Performance_Overview.php:5, app/Modules/User/Views/Wallets/Details/wallets.php:244, app/Modules/User/Views/Wallets/Details.php:134, app/Modules/User/Views/Wallets/Link_Account/Account-Information.php:5, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:219, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:257, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:271, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:296, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php:351, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:219, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:257, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:271, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:296, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php:351, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:221, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:259, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:273, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:298, app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php:353, app/Modules/User/Views/Wallets/Link_Account (Original)/Account-Information.php:5, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:219, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:257, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:271, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:296, app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php:351, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:253, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:253, docs/aiops/migration_model_audit.md:119, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:2258, docs/health/health_test_checklist.md:269, docs/health/modules/investments.md:45

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_users_trades` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `order_id` varchar(45) NULL DEFAULT NULL,
  `existing_order_id` varchar(45) NULL DEFAULT NULL,
  `active` int NOT NULL DEFAULT 0,
  `status` varchar(32) NULL DEFAULT NULL,
  `deleted` varchar(45) NULL DEFAULT 0,
  `saved_sorting` json NULL DEFAULT NULL,
  `submitted_date` varchar(45) NULL DEFAULT NULL,
  `created_by` varchar(45) NULL DEFAULT NULL,
  `created_on` datetime NULL DEFAULT NULL,
  `modified_on` datetime NULL DEFAULT NULL,
  `updated_on` datetime NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP,
  `modified_by` varchar(45) NULL DEFAULT NULL,
  `user_id` varchar(45) NULL DEFAULT NULL,
  `user_email` varchar(45) NULL DEFAULT NULL,
  `username` varchar(45) NULL DEFAULT NULL,
  `trading_account_id` varchar(45) NULL DEFAULT NULL,
  `trading_account` varchar(45) NULL DEFAULT NULL,
  `trading_account_tag` varchar(45) NULL DEFAULT NULL,
  `order_status` varchar(45) NULL DEFAULT NULL,
  `category` varchar(45) NULL DEFAULT NULL,
  `trade_type` varchar(45) NULL DEFAULT NULL,
  `purchase_type` varchar(50) NULL DEFAULT NULL,
  `closed` varchar(128) NULL DEFAULT NULL,
  `symbol_id` varchar(45) NULL DEFAULT NULL,
  `symbol` varchar(45) NULL DEFAULT NULL,
  `symbol_tag` varchar(45) NULL DEFAULT NULL,
  `key` varchar(45) NULL DEFAULT NULL,
  `current_price` varchar(45) NULL DEFAULT 0,
  `entry_price` varchar(32) NULL DEFAULT 0,
  `close_price` varchar(32) NULL DEFAULT 0,
  `net_gains` varchar(45) NULL DEFAULT 0,
  `open_date` varchar(32) NULL DEFAULT NULL,
  `open_year` varchar(45) NULL DEFAULT NULL,
  `open_month` varchar(45) NULL DEFAULT NULL,
  `open_day` varchar(45) NULL DEFAULT NULL,
  `open_time` varchar(32) NULL DEFAULT NULL,
  `position_type` varchar(50) NULL DEFAULT NULL,
  `close_date` varchar(32) NULL DEFAULT NULL,
  `closed_year` varchar(45) NULL DEFAULT NULL,
  `closed_month` varchar(45) NULL DEFAULT NULL,
  `closed_day` varchar(45) NULL DEFAULT NULL,
  `close_time` varchar(32) NULL DEFAULT NULL,
  `price_target` varchar(45) NULL DEFAULT 0,
  `stop_loss` varchar(45) NULL DEFAULT 0,
  `total_trade_cost` varchar(45) NULL DEFAULT 0,
  `expiration` varchar(32) NULL DEFAULT NULL,
  `shares` varchar(32) NULL DEFAULT 0,
  `remaining_position` decimal(15,2) NULL DEFAULT NULL,
  `remaining_shares` varchar(45) NULL DEFAULT 0,
  `number_of_contracts` varchar(45) NULL DEFAULT 0,
  `strike` varchar(32) NULL DEFAULT 0,
  `wallet` varchar(32) NULL DEFAULT NULL,
  `details` text NULL DEFAULT NULL,
  `trade_log_details` text NULL DEFAULT NULL,
  `premium` varchar(32) NULL DEFAULT NULL,
  `variation_perc` varchar(45) NULL DEFAULT NULL,
  `variation` varchar(45) NULL DEFAULT NULL,
  `closed_perc` varchar(45) NULL DEFAULT NULL,
  `closed_ref` varchar(45) NULL DEFAULT NULL,
  `closed_list` varchar(5128) NULL DEFAULT '[]',
  `on_open_fees` varchar(45) NULL DEFAULT NULL,
  `on_close_fees` varchar(45) NULL DEFAULT NULL,
  `total_fees` varchar(45) NULL DEFAULT NULL,
  `json_user_fields` json NULL DEFAULT NULL,
  `stats_interpolated_fields` varchar(5128) NOT NULL DEFAULT '[]',
  `testText` tinytext NULL DEFAULT NULL,
  `fund_type` varchar(50) NULL DEFAULT NULL,
  `bond_type` varchar(50) NULL DEFAULT NULL,
  `company_name` varchar(255) NULL DEFAULT NULL,
  `equity_percentage` float NULL DEFAULT NULL,
  `startup_name` varchar(255) NULL DEFAULT NULL,
  `investment_stage` varchar(50) NULL DEFAULT NULL,
  `derivative_type` varchar(50) NULL DEFAULT NULL,
  `item_name` varchar(255) NULL DEFAULT NULL,
  `item_type` varchar(50) NULL DEFAULT NULL,
  `currency_type` varchar(50) NULL DEFAULT NULL,
  `amount` float NULL DEFAULT NULL,
  `bank_name` varchar(255) NULL DEFAULT NULL,
  `interest_rate` float NULL DEFAULT NULL,
  `fund_name` varchar(255) NULL DEFAULT NULL,
  `provider_name` varchar(255) NULL DEFAULT NULL,
  `annuity_type` varchar(50) NULL DEFAULT NULL,
  `account_type` varchar(50) NULL DEFAULT NULL,
  `coverage_type` varchar(50) NULL DEFAULT NULL,
  `security_type` varchar(50) NULL DEFAULT NULL,
  `index_name` varchar(50) NULL DEFAULT NULL,
  `pm_unit_of_measurement` varchar(50) NULL DEFAULT NULL,
  `pm_storage_costs` float NULL DEFAULT NULL,
  `ib_country_of_origin` varchar(50) NULL DEFAULT NULL,
  `ib_currency` varchar(50) NULL DEFAULT NULL,
  `ib_local_exchange` varchar(50) NULL DEFAULT NULL,
  `strategy_id` int NULL DEFAULT NULL,
  `goal_id` int NULL DEFAULT NULL,
  `ema_3` decimal(10,4) NULL DEFAULT NULL,
  `ema_8` decimal(10,4) NULL DEFAULT NULL,
  `ema_9` decimal(10,4) NULL DEFAULT NULL,
  `ema_13` decimal(10,4) NULL DEFAULT NULL,
  `ema_21` decimal(10,4) NULL DEFAULT NULL,
  `ema_34` decimal(10,4) NULL DEFAULT NULL,
  `ema_48` decimal(10,4) NULL DEFAULT NULL,
  `ema_100` decimal(10,4) NULL DEFAULT NULL,
  `ema_200` decimal(10,4) NULL DEFAULT NULL,
  `sma_50` decimal(10,4) NULL DEFAULT NULL,
  `sma_200` decimal(10,4) NULL DEFAULT NULL,
  `macd` decimal(10,4) NULL DEFAULT NULL,
  `rsi` decimal(10,4) NULL DEFAULT NULL,
  `volume` decimal(10,4) NULL DEFAULT NULL,
  `ema_3_8` varchar(10) NULL DEFAULT NULL,
  `ema_8_13` varchar(10) NULL DEFAULT NULL,
  `ema_13_34` varchar(10) NULL DEFAULT NULL,
  `ema_34_48` varchar(10) NULL DEFAULT NULL,
  `ema_consensus` varchar(10) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- order_id varchar(45) NULL
- existing_order_id varchar(45) NULL
- active int NOT NULL
- status varchar(32) NULL
- deleted varchar(45) NULL
- saved_sorting json NULL
- submitted_date varchar(45) NULL
- created_by varchar(45) NULL
- created_on datetime NULL
- modified_on datetime NULL
- updated_on datetime NULL
- modified_by varchar(45) NULL
- user_id varchar(45) NULL
- user_email varchar(45) NULL
- username varchar(45) NULL
- trading_account_id varchar(45) NULL
- trading_account varchar(45) NULL
- trading_account_tag varchar(45) NULL
- order_status varchar(45) NULL
- category varchar(45) NULL
- trade_type varchar(45) NULL
- purchase_type varchar(50) NULL
- closed varchar(128) NULL
- symbol_id varchar(45) NULL
- symbol varchar(45) NULL
- symbol_tag varchar(45) NULL
- key varchar(45) NULL
- current_price varchar(45) NULL
- entry_price varchar(32) NULL
- close_price varchar(32) NULL
- net_gains varchar(45) NULL
- open_date varchar(32) NULL
- open_year varchar(45) NULL
- open_month varchar(45) NULL
- open_day varchar(45) NULL
- open_time varchar(32) NULL
- position_type varchar(50) NULL
- close_date varchar(32) NULL
- closed_year varchar(45) NULL
- closed_month varchar(45) NULL
- closed_day varchar(45) NULL
- close_time varchar(32) NULL
- price_target varchar(45) NULL
- stop_loss varchar(45) NULL
- total_trade_cost varchar(45) NULL
- expiration varchar(32) NULL
- shares varchar(32) NULL
- remaining_position decimal(15,2) NULL
- remaining_shares varchar(45) NULL
- number_of_contracts varchar(45) NULL
- strike varchar(32) NULL
- wallet varchar(32) NULL
- details text NULL
- trade_log_details text NULL
- premium varchar(32) NULL
- variation_perc varchar(45) NULL
- variation varchar(45) NULL
- closed_perc varchar(45) NULL
- closed_ref varchar(45) NULL
- closed_list varchar(5128) NULL
- on_open_fees varchar(45) NULL
- on_close_fees varchar(45) NULL
- total_fees varchar(45) NULL
- json_user_fields json NULL
- stats_interpolated_fields varchar(5128) NOT NULL
- testText tinytext NULL
- fund_type varchar(50) NULL
- bond_type varchar(50) NULL
- company_name varchar(255) NULL
- equity_percentage float NULL
- startup_name varchar(255) NULL
- investment_stage varchar(50) NULL
- derivative_type varchar(50) NULL
- item_name varchar(255) NULL
- item_type varchar(50) NULL
- currency_type varchar(50) NULL
- amount float NULL
- bank_name varchar(255) NULL
- interest_rate float NULL
- fund_name varchar(255) NULL
- provider_name varchar(255) NULL
- annuity_type varchar(50) NULL
- account_type varchar(50) NULL
- coverage_type varchar(50) NULL
- security_type varchar(50) NULL
- index_name varchar(50) NULL
- pm_unit_of_measurement varchar(50) NULL
- pm_storage_costs float NULL
- ib_country_of_origin varchar(50) NULL
- ib_currency varchar(50) NULL
- ib_local_exchange varchar(50) NULL
- strategy_id int NULL
- goal_id int NULL
- ema_3 decimal(10,4) NULL
- ema_8 decimal(10,4) NULL
- ema_9 decimal(10,4) NULL
- ema_13 decimal(10,4) NULL
- ema_21 decimal(10,4) NULL
- ema_34 decimal(10,4) NULL
- ema_48 decimal(10,4) NULL
- ema_100 decimal(10,4) NULL
- ema_200 decimal(10,4) NULL
- sma_50 decimal(10,4) NULL
- sma_200 decimal(10,4) NULL
- macd decimal(10,4) NULL
- rsi decimal(10,4) NULL
- volume decimal(10,4) NULL
- ema_3_8 varchar(10) NULL
- ema_8_13 varchar(10) NULL
- ema_13_34 varchar(10) NULL
- ema_34_48 varchar(10) NULL
- ema_consensus varchar(10) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_users_trades`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_users_trades'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_users_trades'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

