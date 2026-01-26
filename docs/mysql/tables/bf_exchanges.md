# bf_exchanges

## Source
- Migration: _None_
- Model:
- Code references: app/Libraries/MyMIExchange.php:313, app/Models/ExchangeModel.php:8, app/Models/ExchangeModel.php:57, app/Models/ExchangeModel.php:153, app/Models/ExchangeModel.php:342, app/Models/ExchangeModel.php:358, app/Models/ExchangeModel.php:368, app/Models/MyMICoinModel.php:43, app/Models/MyMICoinModel.php:51, app/Models/MyMIGoldModel.php:49, app/Models/MyMIGoldModel.php:57, app/Models/SolanaModel.php:8, app/Modules/Exchange/Views/Order_Buy_Manager.php:167, app/Modules/Exchange/Views/Order_Sell_Manager.php:167, app/Modules/Management/Views/Assets/Distribute.php:9, app/Modules/Management/Views/Users/Assets.php:9

## Create table
```sql
CREATE TABLE IF NOT EXISTS `bf_exchanges` (
  `id` int NOT NULL DEFAULT NULL AUTO_INCREMENT,
  `status` varchar(32) NOT NULL DEFAULT 'No',
  `alt_cur` varchar(32) NULL DEFAULT 'No',
  `int_cur` varchar(32) NULL DEFAULT 'No',
  `api_url` varchar(256) NULL DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP DEFAULT_GENERATED,
  `creator` varchar(45) NULL DEFAULT NULL,
  `market_pair` varchar(32) NULL DEFAULT NULL,
  `market` varchar(32) NULL DEFAULT NULL,
  `description` varchar(32) NULL DEFAULT NULL,
  `total_coins` varchar(32) NULL DEFAULT NULL,
  `coins_available` varchar(32) NULL DEFAULT NULL,
  `total_volume` varchar(32) NULL DEFAULT 0,
  `initial_value` varchar(32) NULL DEFAULT NULL,
  `current_value` varchar(32) NULL DEFAULT NULL,
  `coin_value` varchar(32) NULL DEFAULT NULL,
  `gas_fee` varchar(32) NOT NULL DEFAULT 0.014914,
  `trans_percent` varchar(32) NOT NULL DEFAULT 0.058,
  `trans_fee` varchar(32) NOT NULL DEFAULT 0.60,
  `image_icon` varchar(512) NULL DEFAULT NULL,
  `icon` varchar(64) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

## Required columns
- id int NOT NULL
- status varchar(32) NOT NULL
- alt_cur varchar(32) NULL
- int_cur varchar(32) NULL
- api_url varchar(256) NULL
- datetime timestamp NOT NULL
- creator varchar(45) NULL
- market_pair varchar(32) NULL
- market varchar(32) NULL
- description varchar(32) NULL
- total_coins varchar(32) NULL
- coins_available varchar(32) NULL
- total_volume varchar(32) NULL
- initial_value varchar(32) NULL
- current_value varchar(32) NULL
- coin_value varchar(32) NULL
- gas_fee varchar(32) NOT NULL
- trans_percent varchar(32) NOT NULL
- trans_fee varchar(32) NOT NULL
- image_icon varchar(512) NULL
- icon varchar(64) NULL

## Required indexes
- _No indexes defined_

## Verification
```sql
SHOW CREATE TABLE `bf_exchanges`;
```

```sql
SELECT COLUMN_NAME, COLUMN_TYPE, IS_NULLABLE, COLUMN_DEFAULT, EXTRA
FROM information_schema.columns
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges'
ORDER BY ORDINAL_POSITION;
```

```sql
SELECT INDEX_NAME, NON_UNIQUE, COLUMN_NAME, SEQ_IN_INDEX
FROM information_schema.statistics
WHERE table_schema = DATABASE() AND table_name = 'bf_exchanges'
ORDER BY INDEX_NAME, SEQ_IN_INDEX;
```

