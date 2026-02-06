# bf_mymicoin_overview

## Source
- Migration: _None_
- Model:
- Code references: app/Models/MyMICoinModel.php:8, app/Models/InvestmentModel.php:172, docs/aiops/artifacts/db-drift/20260201-181038/summary.md:147, docs/aiops/artifacts/db-drift/20260201-184402/summary.md:147, docs/aiops/migration_model_audit.md:141, docs/aiops/migration_model_audit.md:202, docs/_aiops/doc-change-log.md:1742

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_mymicoin_overview` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `unix_timestamp` varchar(32) NULL DEFAULT NULL,
  `current_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `month` varchar(32) NULL DEFAULT NULL,
  `day` varchar(32) NOT NULL DEFAULT NULL,
  `year` varchar(32) NULL DEFAULT NULL,
  `time` varchar(32) NULL DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'Incomplete',
  `beta` varchar(32) NULL DEFAULT NULL,
  `wallet_id` varchar(64) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `user_email` varchar(512) NULL DEFAULT NULL,
  `reward` varchar(32) NOT NULL DEFAULT 'No',
  `reward_type` varchar(128) NULL DEFAULT NULL,
  `initial_value` varchar(64) NULL DEFAULT NULL,
  `current_value` varchar(32) NULL DEFAULT NULL,
  `available_coins` varchar(64) NULL DEFAULT NULL,
  `new_availability` varchar(32) NULL DEFAULT NULL,
  `minimum_coin_amount` varchar(32) NULL DEFAULT NULL,
  `initial_coin_value` varchar(32) NULL DEFAULT NULL,
  `coin_value` varchar(64) NULL DEFAULT NULL,
  `amount` varchar(32) NULL DEFAULT NULL,
  `total` varchar(32) NULL DEFAULT NULL,
  `total_cost` varchar(32) NULL DEFAULT NULL,
  `gas_fee` varchar(32) NULL DEFAULT 0.014914,
  `trans_fee` varchar(32) NULL DEFAULT 0.60,
  `trans_percent` varchar(32) NOT NULL DEFAULT 0.60
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- unix_timestamp varchar(32) NULL
- current_date datetime NOT NULL
- month varchar(32) NULL
- day varchar(32) NOT NULL
- year varchar(32) NULL
- time varchar(32) NULL
- status varchar(32) NOT NULL
- beta varchar(32) NULL
- wallet_id varchar(64) NULL
- user_id int NULL
- user_email varchar(512) NULL
- reward varchar(32) NOT NULL
- reward_type varchar(128) NULL
- initial_value varchar(64) NULL
- current_value varchar(32) NULL
- available_coins varchar(64) NULL
- new_availability varchar(32) NULL
- minimum_coin_amount varchar(32) NULL
- initial_coin_value varchar(32) NULL
- coin_value varchar(64) NULL
- amount varchar(32) NULL
- total varchar(32) NULL
- total_cost varchar(32) NULL
- gas_fee varchar(32) NULL
- trans_fee varchar(32) NULL
- trans_percent varchar(32) NOT NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_mymicoin_overview`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_mymicoin_overview'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_mymicoin_overview'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

